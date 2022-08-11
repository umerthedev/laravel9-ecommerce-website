<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catagory;
use App\Models\product;


class ProductController extends Controller
{
    public function view_product()
    {
        $catagory = catagory::all();
        return view('admin.product',compact('catagory'));
    }

    public function add_product(Request $request)
    {
           $product = new product;
           $product->title=$request->title;
           $product->description=$request->title;
           $product->price=$request->price;
           $product->discount_price=$request->disprice;
           $product->quantity=$request->quantity;
           $product->catagory=$request->catagory;

           $image=$request->image;
           $imagename=time(). '.' .$image->getClientOriginalExtension();
           $request->image->move('product', $imagename);
           $product->image=$imagename;

           $product->save();


           return redirect()->back()->with('message', 'Product Added Successfully');;

    }

    public function show_product()
    {
        $product = product::all();
        return view('admin.show_product',compact('product'));
    }
}
