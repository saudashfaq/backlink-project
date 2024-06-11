<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBacklinkRate;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function index()
   {
      $cartItems = Cart::instance('cart')->content();
      return view('layouts.cart.add-to-cart',['cartItems' => $cartItems]);
   }

   public function addToCart(Request $request)
  {
      $product = WebsiteBacklinkRate::find($request->id);
      $website = $product->website;
      $price = $product->price;
      $url = $website->url;
      $cartItem= Cart::instance('cart')->add($product->id, $url, $request->quantity, $price)->associate('App\Models\WebsiteBacklinkRate');
   //   dd($cartItem);
      // $rowId = $cartItem->rowId;
      return redirect()->back()->with('message', 'Success ! Item added successfully');
   }

   public function updateCart(Request $request)
   {
      $rowId = $request->rowId;
      $quantity = $request->quantity;
      Cart::instance('cart')->update($rowId, $quantity);
      return redirect()->back()->with('message', 'Success ! Cart upated successfully');
   }

   public function deleteItem(Request $request)
   {
      $rowId = $request->rowId;
      Cart::instance('cart')->remove($rowId);
      return redirect()->back()->with('message', 'Success! Item removed from the cart');
   }
}
