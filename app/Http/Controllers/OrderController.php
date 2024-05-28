<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\User;
use App\Models\Website;
use App\Models\WebsiteBacklinkRate;
use Illuminate\Support\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', ['orders' => $orders]);
    }

    public function viewOrdersAsSeller($order_status = null)
    {
        /** @var User $user */
        $user_id = 3; //TODO:enable this auth()->user();


        $websiteId = request()->query('website_id');
        $websites = Website::where('user_id', '=', $user_id)->get();
        $selectedWebsite = null;
        if ($websiteId != null) {
            $selectedWebsite = Website::find($websiteId);
        } elseif (count($websites)) {
            $selectedWebsite = $websites[0];
            $websiteId = $selectedWebsite->id;
        }

        $orders = Order::where('seller_id', '=', $user_id)
            ->with(['website' => function ($query) {
                $query->select('id', 'url'); // Select only the 'id' and 'url' columns from the website table
            }])
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('orders.view-orders-as-seller', [
            'orders' => $orders
        ]);
    }

    public function create()
    {
        $users = User::select('id', 'email')->whereHas('websites')->get();
        $websites = Website::select('id', 'url')->with('websiteBacklinkRates')->whereHas('websiteBacklinkRates')->get();
        // dd($websites);
        return view('orders.create', ['users' => $users, 'websites' => $websites]);
    }

    public function provideDetailsToOrderBacklink($website_id, $rate_id)
    {
        //User should have balance to purchase this website and backlink rate otherwise take him to add funds

        //Show the form to get the details of backlink url and phrases as per the maximum allowed backlinks

        //make a validation to validate website_id should not belong to this current user

        if (true /* TODO:uncomment !auth()->user()->websites()->where('id',$website_id)->exists()*/) {
            $website = Website::findOrFail($website_id);
            //$rate = WebsiteBacklinkRate::where('rate_id', $rate_id)->first();

            return view('orders.provide-details-to-order-backlink', [

                "website" => $website,

                "rate" => $website->websiteBacklinkRates()->where('id', $rate_id)->first(),
            ]);
        }
    }

    public function store(StoreOrderRequest $request, $rate_id)
    {
        //Website and rate id selected should not belong to the current  user

        //User should have balance to purchase this website and backlink rate

        //All goes well, deduct balance from the current user account

        //Order done

        $backlink_rate      = WebsiteBacklinkRate::where('id', $rate_id)->first();
        $website            = $backlink_rate->website()->first(); //TODO:validate ->where(['user_id', '!=' , auth()->user()->id]);
        $validated_request  = $request->validated();
        $instructions       = $validated_request['instructions'];
        $phrases            = $validated_request['Phrases'];
        $links              = $validated_request['Links'];

        $links_and_phrases = array();

        for ($x = 1; $x < $backlink_rate->max_number_of_links; $x++) {
            $links_and_phrases[] = [
                'link' => $links[$x],
                'phrase' => $phrases[$x]
            ];
        }


        $order = new Order();
        // Create the order
        $order->buyer_id = 2; //TODO: update
        $order->seller_id = 3; //TODO: update    
        $order->website_id = $website->id;
        $order->website_backlink_rate_id = $backlink_rate->id;
        $order->order_amount = $backlink_rate->price;
        $order->order_details = $links_and_phrases;
        $order->instructions = $instructions;
        $order->order_status = OrderStatusEnum::OPEN;
        $order->order_status_updated_at =  Carbon::now(); //TODO: update

        $order->save();

        // Redirect to the index page or any other page as needed
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function edit(Order $order, $id)
    {
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        // Validation (you can customize this based on your requirements)
        $request->validate([
            // Add your validation rules here
        ]);

        // Update the order
        $order->update($request->all());

        // Redirect to the index page or any other page as needed
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        // Delete the order
        $order->delete();

        // Redirect to the index page or any other page as needed
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }

    // Example of redirecting to splash screen after adding to cart
    public function add_to_cart($id, $website_id, $rate_id)
    {
        // Retrieve the authenticated user (if needed)
        // $user = auth()->user();
        $website = Website::findOrFail($website_id);
        $rate = WebsiteBacklinkRate::where('id', $rate_id)->where('website_id', $website_id)->firstOrFail();
        $cartItem = Cart::instance('cart')->content()->where('id', $rate_id)->first();

        if ($cartItem) {
            return redirect()->route('websites.index')->with('info', 'Item is already in your cart.');
        } else {
            Cart::instance('cart')->add($rate->id, $website->url, 1, $rate->price)->associate('App\Models\WebsiteBacklinkRate');
            return redirect()->back()->with('success', 'Item added to cart successfully.');
        }
    }

    public function viewCart()
    {
        $cartItems = Cart::instance('cart')->content();
        return view('layouts.cart.add-to-cart', ['cartItems' => $cartItems]);
    }

    public function updateCart(Request $request)
    {
        $rowId = $request->rowId;
        $quantity = $request->quantity;
        Cart::instance('cart')->update($rowId, $quantity);
        return redirect()->route('view.cart')->with('success', 'Cart updated successfully.');
    }

    public function deleteItem(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('view.cart')->with('success', 'Item removed from the cart');
    }
}
