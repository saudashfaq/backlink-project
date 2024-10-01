<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Tld;
use App\Repositories\CartRepository;
use App\Http\Controllers\AppBaseController;
use Darryldecode\Cart\Cart;
use App\Models\Website;
use FontLib\Table\Type\name;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash as FlashFlash;
use mysql_xdevapi\Table;
use Response;
use Symfony\Component\Routing\Route;

class CartController extends AppBaseController
{


    public function add($websiteTop)
    {

        $webs = Website::find($websiteTop);
        //return view('carts.show')->with('webs', $webs);


        \DB::table('carts')->insert([
            'user_id' => Auth::id(),
            'website_id' => $webs->id,
            'quantity' => '1',
        ]);
//        dd($webs->id);

        //return dd($webs->id);
        return back()->with('success', "$webs->name Successfully added to cart!");
    }

    public function cart($id)
    {
        //$cont = count($id);
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to access the cart.');
        }

        $cant = \DB::table('carts')->first();
//        dd($cant);
//        dd($id);
        //$canti = \DB::table('carts')->select('website_id')->get();

        //return dd($id);

        if ($id > 0) {
            $seller_id = $cant->user_id;
//            dd($seller_id);
            $website_id = $cant->website_id;
            dd($website_id);
            //$datos = Website::where('id', $canti);
            //return dd($datos);
            return view('carts.show', [
                'seller_id' => $seller_id,
                'website_id' => $website_id
            ]);
        } else {
            // return view('pages.marketplace')->with();
            return redirect()->route('marketplace')->with('warning', 'Cart is Empty, Please add at least one product in the cart');
        }


    }

    public function removeit($id)
    {
        if ($id > 0) {
            //$producto = Producto::where('id', $request->id)->firstOrFail();
            \DB::table('carts')->where('website_id', $id)->delete();
            //return dd($removeit);
            $verify = \DB::table('carts')->count();
            //return dd($verify);
            if ($verify > 0) {
                //return dd('1');
                return back()->with('success', "Producto eliminado con éxito de su carrito.");

            } else {
                return view('welcome');
            }
        }

    }

    public function clear()
    {

        \DB::table('carts')->delete();

        return back()->with('success', "The shopping cart has successfully been added to the shopping cart!");
    }


    public function buyPlan(Request $request)
    {

        // return response()->json([
        //     'name' => 'Abigail',
        //     'state' => 'CA',
        // ]);

        // DD($request);
        $urlName = $request['name'];
        $id = $request['id'];
        $price = 0;
        $name = "";

        switch ($id) {
            case 'DA':
                # code...
                $price = 100;
                $name = "DA Jumper";
                break;

            case 'DAP':
                # code...
                $price = 120;
                $name = "DA Jumper Premium";
                break;

            case 'JET':
                # code...

                $price = 130;
                $name = "Jetpack";
                break;
        }


        return view('buy.planBusiness', [
                'price' => $price,
                'name' => $name,
                'urlName' => $urlName
            ]
        );


    }

    /*
    public function orderDetail(){
        if(count(\Session::get('cart')) <= 0) return redirect()->route('welcome.index');
        $cart = \Session::get('cart');
        $total = $this->total();

        return view('cart.order-detail')
            ->with('cart', $cart)
            ->with('total', $total);
    }


    private function total()
    {
        $cart = \Session::get('cart');
        $total = 0;
        foreach($cart as $item){
            $total += $item->price * $item->quantity;
        }
        return $total;
    }

    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        Cart::add(array(
            'id' => $request->id?$request->id:'1', // inique row ID
            'name' => $request->name?$request->name:'example',
            'price' =>$request->price?$request->price:20.20,
            'quantity' => $request->quantity?$request->quantity:1,
            'attributes' => array(
                'color' => $request->color?$request->color:'green',
                'size' => $request->size?$request->size:'Big',
            )
        ));
        return back();
    }

    public function destroy($cart)
    {
        Cart::remove($cart);
        return back();
    }
    */
}
