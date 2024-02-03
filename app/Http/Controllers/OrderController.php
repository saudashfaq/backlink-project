<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(StoreOrderRequest $request)
    {
        // Validation (you can customize this based on your requirements)
        $request->validate([
            // Add your validation rules here
        ]);

        // Create the order
        Order::create($request->all());

        // Redirect to the index page or any other page as needed
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function edit(Order $order)
    {
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
}
