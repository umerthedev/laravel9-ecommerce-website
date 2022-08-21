<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use App\Models\cod_order;
use App\Models\order;
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



   public function cod_orders()
   {
      $cod_order = cod_order::all();

      return view('admin.cod_order', compact('cod_order'));
   }
   public function op_orders()
   {
      $op_order = order::all();

      return view('admin.op_order', compact('op_order'));
   }

   public function delivered($id)
   {
      $order = cod_order::find($id);
      $order->delivery_status = 'Delivered';
      $order->save();
      return redirect()->back()->with('message', 'Product Status Change As Delivered');
   }
   public function cancel($id)
   {
      $order = cod_order::find($id);
      $order->delivery_status = 'Canceled';
      $order->save();
      return redirect()->back()->with('message', 'Order Canceled');
   }
   public function reset($id)
   {
      $order = cod_order::find($id);
      $order->delivery_status = 'Processing';
      $order->save();
      return redirect()->back()->with('message', 'Product Status Change As Processing');
   }
}
