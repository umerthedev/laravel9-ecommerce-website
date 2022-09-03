<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\product;
use App\Models\cod_order;
use App\Models\order;
use App\Models\cart;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    // index
    public function index()
    {
        // $usertype = Auth::user()->usertype;
        // if ($usertype == '0')
        // {
        //     // $totalcart = cart::all()->count();
        //        $totalcart = cart::where('user_id', $usertype)->count();
        //     return view('home.userpage', compact('totalcart'));
        // }else{
       
        $product = product::paginate(6);
        return view('home.userpage', compact('product'));
      
    
    }


    // user role 
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1')
        {
            $total_product = product::all()->count();
            $total_Codorder = cod_order::all()->count();
            $OnlinePayOrder = order::all()->count();
            $total_user = user::all()->count();
            $order = cod_order::all();
            $total_revenue = 0;
            foreach($order  as $order)
            {
                $total_revenue =$total_revenue + $order->price;
            }
            $total_delivery = cod_order::where('delivery_status', '=','delivered')->get()->count();
            $total_processing = cod_order::where('delivery_status', '=','processing')->get()->count();
            $total_category = cod_order::all()->count();
            return view('admin.home',compact('total_product','total_Codorder','OnlinePayOrder','total_user','total_revenue','total_delivery','total_processing','total_category'));
        } else {
            $product = product::paginate(6);
            return view('home.userpage', compact('product'));
        }
    }
   
}
