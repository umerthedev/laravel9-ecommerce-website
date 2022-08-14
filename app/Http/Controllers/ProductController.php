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
        return view('admin.product', compact('catagory'));
    }

    public function add_product(Request $request)
    {
        $product = new product;

        $product->ID = $request->id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->disprice;
        $product->quantity = $request->quantity;
        $product->catagory = $request->catagory;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;

        $product->save();


        return redirect()->back()->with('message', 'Product Added Successfully');;
    }

    public function show_product()
    {
        $product = product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = product::find($id);
        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function product_edit($id)
    {
        $product = product::find($id);
        $catagory = catagory::all();

        return view('admin.product_edit', compact('product', 'catagory'));
    }

    public function UpdateProduct(Request $request, $id)
    {
        $product = product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->disprice;
        $product->quantity = $request->quantity;
        $product->catagory = $request->catagory;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }
        $product->save();


        // return view('admin.show_product')->with('message', 'Product updated Successfully');
        return redirect()->back()->with('message', 'Product updated Successfully');
    }

    public function product_details($id)
    {
        $product = product::find($id);
        return view('home.product_details', compact('product'));
    }
}
