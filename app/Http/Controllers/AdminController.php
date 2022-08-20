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

   public function edit_category($id)
   {
      $cat = catagory::find($id);
      return view('admin.update_category', compact('cat'));
   }

   public function update_category(Request $request, $id)
   {
      $data = catagory::find($id);
      $data->catagory_name = $request->category;
      $data->save();

      // return view('admin.catagory')->with('message', 'Category updated Successfully');
      return redirect()->back()->with('message', 'Category updated Successfully');
   }



   public function order()
   {
      return view('admin.order_lists');
   }
}
