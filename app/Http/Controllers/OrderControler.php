<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderControler extends Controller
{
    public function index()
    {
        if (!Auth::check()){
            return  redirect('login')->with('error','Please login first');
        }
        $orders = Order::with('website')
            ->where('buyers_id', Auth::id())
            ->get();

        return view('publisher.orders', ['orders' => $orders]);
    }
}
