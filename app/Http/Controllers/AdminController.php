<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use App\Models\cod_order;
use App\Models\order;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use PDF;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Notifications\Notification as NotificationsNotification;

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


   // Cash on delivery controller
   public function cod_orders()
   {
      $cod_order = cod_order::all();

      return view('admin.cod_order', compact('cod_order'));
   }
   // SSl Payment controller
   public function op_orders()
   {
      $op_order = order::all();

      return view('admin.op_order', compact('op_order'));
   }
   // delivery done controller
   public function delivered($id)
   {
      $order = cod_order::find($id);
      $order->delivery_status = 'Delivered';
      $order->payment_status = 'Paid';
      $order->save();
      return redirect()->back()->with('message', 'Product Status Change As Delivered');
   }
   // order cancel controller
   public function cancel($id)
   {
      $order = cod_order::find($id);
      $order->delivery_status = 'Canceled';
      $order->save();
      return redirect()->back()->with('message', 'Order Canceled');
   }
   // order reset controller
   public function reset($id)
   {
      $order = cod_order::find($id);
      $order->delivery_status = 'Processing';
      $order->payment_status = 'Cash On Delivery';
      $order->save();
      return redirect()->back()->with('message', 'Product Status Change As Processing');
   }

   // Invoice PDF Download controller

   public function print_pdf($id)
   {
      $cod_order = cod_order::find($id);
      $pdf = PDF::loadView('admin.pdf', compact('cod_order'));
      return $pdf->download('Invoice.pdf');
   }

   // Send Mail Function
   public function send_mail($id)
   {
      $cod_order = cod_order::find($id);
      return view('admin.mail_info', compact('cod_order'));
   }

   public function send_user_email(Request $request, $id)
   {
      $cod_order = cod_order::find($id);

      $details = [

         'greeting' => $request->greeting,
         'firstline' => $request->firstline,
         'body' => $request->body,
         'ebutton' => $request->ebutton,
         'url' => $request->url,
         'lastline' => $request->lastline,

      ];
      Notification::send($cod_order, new SendEmailNotification($details));
      return redirect()->back('message', 'Mail Sent Successfully');
   }
}
