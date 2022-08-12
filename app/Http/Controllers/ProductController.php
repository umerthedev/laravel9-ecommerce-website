<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catagory;


class ProductController extends Controller
{
    public function view_product()
    {
        $catagory = catagory::all();
        return view('admin.product',compact('catagory'));
    }

    public function add_product()
    {
           

    }
}
