<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        $type == "alltime" ? $type = 'alltime' : $type;
        $orders = Order::where('type', $type)->get(['order_id','f_name', 'l_name', 'email', 'phone', 'type', 'status']);
        return view('admin.modules.order.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Order::find($id);
        $carts = Cart::where('order_id', $id)->get();
        return view('admin.modules.order.show', compact('show', 'carts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function packed($id)
    {
        $model = Order::find($id);
        if($model->packed == 0){
            $model->packed = 1;
            $model->save();
            return back();
        }else{
            $model->packed = 0;
            $model->save();
            return back();
        }
    }

    public function out_for_delivery($id)
    {
        $model = Order::find($id);
        if($model->out_for_delivery == 0){
            $model->out_for_delivery = 1;
            $model->save();
            return back();
        }else{
            $model->out_for_delivery = 0;
            $model->save();
            return back();
        }
    }

    public function delivered($id)
    {
        $model = Order::find($id);
        if($model->delivered == 0){
            $model->delivered = 1;
            $model->save();
            return back();
        }else{
            $model->delivered = 0;
            $model->save();
            return back();
        }
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cart_destroy($id)
    {
        Cart::find($id)->delete();
        return back()->with('success', 'Cart Item Deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
