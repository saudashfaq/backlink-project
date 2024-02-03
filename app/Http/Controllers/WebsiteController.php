<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Models\Website;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all websites from the database
        $websites = Website::take(10)->orderBy('id',  'desc')->get();

        // Pass the websites to the view
        return view('websites.index', ['websites' => $websites]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('websites.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWebsiteRequest $request)
    {
        // Validation passed, create the website
        $website = Website::create($request->validated());
        
        // Attach categories
        $website->categories()->attach($request->input('categories'));

        // Additional logic if needed

        return redirect()->route('websites.index')->with('success', 'Website created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Website $website)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Website $website)
    {
        return view('websites.edit', compact('website'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWebsiteRequest $request, Website $website)
    {
        // Validation passed, update the website
        $website->update($request->validated());

        // Sync categories
        $website->categories()->sync($request->input('categories'));

        // Additional logic if needed

        return redirect()->route('websites.index')->with('success', 'Website updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Website $website)
    {
        // Detach categories if there's a many-to-many relationship
        $website->categories()->detach();

        // Delete the website
        $website->delete();

        // Redirect to the index page or any other page as needed
        return redirect()->route('websites.index')->with('success', 'Website deleted successfully.');

    }
}
