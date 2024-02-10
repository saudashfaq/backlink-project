<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Models\Website;
use App\Models\Category;
use App\Models\User;
use App\Models\WebsiteBacklinkRate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all websites from the database along with websiteBacklinkRates one cheepest record
        $websites = Website::take(10)->with(['websiteBacklinkRates', 'categories'])->orderBy('id',  'desc')->get();

        // Pass the websites to the view
        return view('websites.index', ['websites' => $websites]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('websites.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWebsiteRequest $request)
    {
        try {

            // Create a new website instance
            $website = new Website();

            // Fill the website instance with request data
            $website->fill($request->validated());

            // Set is_visible attribute
            $website->is_visible = $request->has('is_visible') ? true : false;
            $website->user_id = User::findOrFail(rand(1, 20))->id;

            // Save the website to the database
            $website->save();

            // Attach categories
            $website->categories()->attach($request->input('categories', []));

            // Handle creation of website backlink rates
            if ($request->has('backlink_rates')) {
                foreach ($request->input('backlink_rates') as $rateData) {
                    $rate = new WebsiteBacklinkRate();
                    $rate->fill($rateData);
                    $rate->user_id = $website->user_id;
                    $website->websiteBacklinkRates()->save($rate);
                }
            }

            // Set success message
            Session::flash('success', 'Website created successfully.');
        } catch (Exception $e) {
            // Log the error
            Log::error('Error occurred while creating website: ' . $e->getMessage());
            dd($e);
            // Set error message
            Session::flash('error', 'Failed to create website. Please try again.');
        }

        // Redirect back to the index page with a success message
        return redirect()->route('websites.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {

        $website = Website::where('id', $id)->with(['websiteBacklinkRates', 'categories'])->first();

        return view('websites.show', ['website' => $website]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $website = Website::findOrfail($id);
        $website_backlink_rates = $website->websiteBacklinkRates()->get();
        $categories = Category::select('id', 'name')->get();
        return view('websites.edit', ['website' => $website, 'categories' => $categories, 'website_backlink_rates' => $website_backlink_rates]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWebsiteRequest $request, $id)
    {
        try {

            // Find the website by ID
            $website = Website::findOrFail($id);

            $user_id = $website->user_id;


            $validated_request = $request->validated();
            $validated_request['is_visible'] = $request->has('is_visible') ?? false;
            // Update website details
            $website->update($validated_request);

            // Sync categories
            $website->categories()->sync($request->input('categories', []));

            // Update website backlink rates
            $backlinkRatesData = $request->input('backlink_rates', []);
            $existingRatesIds = $website->websitebacklinkrates->pluck('id')->toArray();

            foreach ($backlinkRatesData as $index => $rateData) {
                //If record is not in DB then it needs user_id for this new record
                if (!isset($rateData['id'])) {
                    $rateData['user_id'] = $user_id;
                }

                $rate = $website->websitebacklinkrates()->updateOrCreate(['id' => $rateData['id'] ?? null], $rateData);
                if ($rate) {
                    $key = array_search($rate->id, $existingRatesIds);
                    if ($key !== false) {
                        unset($existingRatesIds[$key]);
                    }
                }
            }

            // Remove remaining backlink rates that are not updated
            if (!empty($existingRatesIds)) {
                $website->websitebacklinkrates()->whereIn('id', $existingRatesIds)->delete();
            }

            Session::flash('success', 'Website has been successfully edited.');
        } catch (Exception $e) {
            Log::error("An exception occured when updating a website: " . $e->getMessage());
            Session::flash('error', 'There was an issue saving your changes. Please try again later.');
        }

        return redirect()->route('websites.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id )
    {
        try {


            $website = Website::findOrFail($id);
            // Detach categories if there's a many-to-many relationship
            $website->categories()->detach();

            // Delete the websiteBacklinkRates
            $website->websiteBacklinkRates()->delete();

            // Delete the website
            $website->delete();
            Session::flash('success', 'Website deleted successfully');

        } catch (Exception $e) {
            
            Log::error("An error occurred deleting a website: " . $e->getMessage());
            dd($e);
            Session::flash('error', 'Error deleting website.  Please try again later.');
        }

        // Redirect to the index page or any other page as needed
        return redirect()->route('websites.index');
    }
}
