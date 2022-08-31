<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use App\Models\cod_order;
use RealRashid\SweetAlert\Facades\Alert;






class AddCartController extends Controller
{
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {

            $user = Auth::user();
            $userid =$user->id;
            $product = product::find($id);
            $product_exist_id = cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($product_exist_id)
            {
                $cart = cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;
                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price * $cart->quantity;
                } else {
                    $cart->price = $product->price * $cart->quantity;
                }
                $cart->save();
                Alert::success('Product Added Successfully','We Have Added Product To Cart');
                return redirect()->back(); 
            }
            else
            {
                $cart = new cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
                $cart->product_title = $product->title;
                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price * $request->quantity;
                } else {
                    $cart->price = $product->price * $request->quantity;
                }
                $cart->image = $product->image;
                $cart->product_id = $product->id;
                $cart->quantity = $request->quantity;
    
                $cart->save();
                Alert::success('Product Added Successfully','We Have Added Product To Cart');
                return redirect()->back();
            }

            $cart = new cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_title = $product->title;
            if ($product->discount_price != null) {
                $cart->price = $product->discount_price * $request->quantity;
            } else {
                $cart->price = $product->price * $request->quantity;
            }
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;

            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function show_cart()

    {
        if (Auth::id()) {
            $id = Auth::id();
            $cart = cart::where('user_id', '=', $id)->get();
            return view('home.show_cart', compact('cart'));
        } else {
            return redirect('register');
        }
    }

    public function remove_cart($id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id', '=', $userid)->get();
        // dd($data);

        foreach ($data as $data) {

            $order = new cod_order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'Cash On Delivery';
            $order->delivery_status = 'Processing';
            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message', 'Thanks For Your order, We Will Connect With You Soon!!!');
    }

    // Show Orders in header
    public function show_order()
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;
            $cod_order = cod_order::where('user_id','=',$userid)->get();
            return view('home.show_order',compact('cod_order'));
        }
        else
        {
            return redirect('login');
        }
    }
    public function cancel_order($id)
    {
        $cod_order = cod_order::find($id);
        $cod_order->delivery_status='You Canceled This Order';
        $cod_order->save();
        return redirect()->back()->with('message', 'Order Canceled Successfully!!!');   
    }
}
