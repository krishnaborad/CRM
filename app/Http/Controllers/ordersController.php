<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\order;
use App\category;
use App\image;
use App\company;
use Mail;
class ordersController extends Controller
{
    public function index()
    {


        $products = product::all();
        $orders = order::all();
        $categorys = category::all();
        $companys = company::all();
        return view('admin.orders.order', compact('products','orders' ,'categorys','companys'));
    }
    public function orders(Request $request,$id)
    {

        $product = product::find($id);

        $order = new order;
        $order->product_id = $request->input('product_id');
        $order->prise = $request->input('prise');
        $order->product_code = $request->input('product_code');
        $order->category_id = $request->input('category_id');
        $order->custmer_name = $request->input('custmer_name');
        $order->email = $request->input('email');
        $order->custmer_phone = $request->input('custmer_phone');
        $order->custmer_address = $request->input('custmer_address');
        $order->save();

    }
    public function show($id)
    {
        $products = product::find($id);
        $order = order::find($id);
        return view('admin.orders.show', compact('order','products'));

    }
    public function delete($id)
    {
        $order = order::find($id);
        $order->delete();
        return redirect('admin/orders');
    }
    public function deleteall(Request $request)
    {
        if(!$request->has('delete_id') || empty($request->input('delete_id')))
         {
              return back()->withError("Selection required!");
          }
       order::whereIn('id', $request->input('delete_id'))->delete();
       return back()->withMessage("Deleted successfully!");


   }

   public function sendMail()
   {
        $data['title'] = "Test it from HDTutu.com";

        Mail::send('admin.emails.email', $data, function($message)
        {
            $message->to('krishnaborad13@gmail.com', 'krishna borad')->subject('Welcome to the Laravel 4 Auth App!');
        });
        dd("Mail Sent successfully");
    }
    
}
