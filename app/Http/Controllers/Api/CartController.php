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
        return $this->SuccessResponse($carts);
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
            dd($update);
            if($request->qty == 1){
                
                $update['quantity']  = $update->quantity + 1;
                $update->save();
            }else{
                $update['quantity'] = $update->quantity - 1;
                $update->save();
            }

            $message = "Quantity Update Successfully...!";
            return $this->SuccessResponse($message);
        }else{
            $product = Product::find($request->id);

            Cart::create([
                'user_id'=> Auth::id(),
                'product_id'=> $request->id,
                'property_id' => $request->property_id,
                'type' => $request->type,
                'product_name' => $product->name,
                'product_price' => $product->regular_price,
                'product_image' => $product->image,
                'ip_address'=> request()->ip(),
            ]);
            $message = "Card Added Successfully...!";
            return $this->SuccessResponse($message);
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
