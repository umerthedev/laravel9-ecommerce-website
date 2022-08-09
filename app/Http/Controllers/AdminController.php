<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;


class AdminController extends Controller
{
   public function view_catagory()
   {

    $data = catagory::all();
    return view('admin.catagory', compact('data'));
   }




   public function add_category(Request $request)
   {
    $data = new catagory;
    $data->catagory_name = $request->category;
    $data->save();

    return redirect()->back()->with('message', 'Category Added Successfully');
   }


   public function delete_category($id)
   {

    $data = catagory::find($id);
    $data->delete();
    
    return redirect()->back()->with('message', 'Category Deleted Successfully');
   }
}
