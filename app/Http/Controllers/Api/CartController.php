<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())
                ->where('order_id', null)->get();
        
        $total_cart_price = 0;
        foreach ($carts as $c) {
            $total_cart_price += $c->total_price;
        }
        return response()->json([
            "status" => true,
            "data" => $carts,
            "message" => "Cart List..!",
            "total_cart_price" => $total_cart_price,
        ],200);
    }

    public function updatePrice($cart)
    {
        $price = Cart::find($cart->cart_id);
        $price->total_price = $price->quantity * $price->product_price;
        $price->save();
    }


    public function store(Request $request)
    {
        
        if(Cart::where('product_id',$request->id)->where('order_id',null)
            ->where('user_id',Auth::id())
            ->where('property_id',$request->property_id)
            ->first()){

            $update = Cart::where('product_id',$request->id)
            ->where('order_id',null)
            ->where('ip_address',request()->ip())
            ->where('property_id',$request->property_id)
            ->first();
          
            if($request->qty == 1){
                $update['quantity']  = $update->quantity + 1;
                $update->save();

                $this->updatePrice($update);

                $total_price = Cart::find($update->cart_id);
                $p = $total_price->total_price;

                $carts = Cart::where('user_id', Auth::id())
                                ->where('order_id', null)
                                ->get();
                $total_cart_price = 0;
                foreach ($carts as $c) {
                    $total_cart_price += $c->total_price;
                }

            }else{
                $update['quantity'] = $update->quantity - 1;
                $update->save();
                $this->updatePrice($update);

                $total_price = Cart::find($update->cart_id);
                $p = $total_price->total_price;
 

                $carts = Cart::where('user_id', Auth::id())
                                ->where('order_id', null)
                                ->get();

                $total_cart_price = 0;
                foreach ($carts as $c) {
                    $total_cart_price += $c->total_price;
                }
            }

            return response()->json([
                "status" => true,
                "message" => "Quantity updated successfully..!",
                "qty" => $update->quantity,
                "total_price" => $p,
                "total_cart_price" => $total_cart_price
            ],200);
        }else{
            $product = Product::find($request->id);
            
            $cart = Cart::create([
                'user_id'=> Auth::id(),
                'product_id'=> $request->id,
                'property_id' => $request->property_id,
                'type' => $request->type,
                'product_name' => $product->name,
                'product_price' => $product->regular_price,
                'product_image' => $product->image,
                'ip_address'=> request()->ip(),
            ]);
          
            $this->updatePrice($cart);

            $carts = Cart::where('user_id', Auth::id())
                        ->where('order_id',null)
                        ->get();

            $total_cart_price = 0;
            foreach ($carts as $c) {
                $total_cart_price += $c->total_price;
            }

            return response()->json([
                "status" => true,
                "message" => "Cart Added successfully..!",
                "qty" => 1,
                "total_cart_price" => $total_cart_price,
            ],200);
        }
    }


    public function update(Request $request)
    {
        try {
            $quantity = Cart::find($request->id);
            $quantity['quantity']=$request->quantity;
            $quantity->save();
            $message = "Quantity Update Successfully...!";
            return $this->SuccessResponse(($message));
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            return $this->ErrorResponse($error);
        }
    }
}
