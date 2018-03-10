<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
use App\image;
use App\company;
use App\order;
use DB;
use PDF;
class product_showController extends Controller
{

       public function index()
       {
           $products = product::all();
           $images = image::all();
           $orders = order ::with('product');
           return view('frontend.product_show', compact('products','images','orders'));

       }


       public function order($id)
       {


           $product = product::find($id);
           $orders = order::all();
           $categorys = category::all();
           $companys = company::all();
           return view('frontend.order', compact('product','orders','categorys','companys'));

       }


       public function send(Request $request,$id)
       {
           $this->validate($request, [
           'custmer_name'=>'required',
           'email' => 'required|email|unique:users',
           'custmer_phone'=>'required|numeric',
           'custmer_address'=>'required',

       ]);

            $order = new order();
            $order->product_id = $request->input('product_id');
            $order->prise = $request->input('prise');
            $order->product_code = $request->input('product_code');
            $order->category_id = $request->input('category_id');
            $order->custmer_name = $request->input('custmer_name');
            $order->email = $request->input('email');
            $order->custmer_phone = $request->input('custmer_phone');
            $order->custmer_address = $request->input('custmer_address');
            $order->save();

            \Session::flash('flash_message','Ordered Successfully.');
            return redirect('frontend/order/'.$id);
       }


       public function show($id)
       {
           $product = product::find($id);
           $categorys = category::all();
           $companys = company::all();
           return view('frontend.product_details' ,compact ('product','categorys','image','companys'));
       }
}
