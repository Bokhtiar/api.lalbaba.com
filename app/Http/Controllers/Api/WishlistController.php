<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $wishlists = Wishlist::query()->Delivery($request->type)->where('user_id', Auth::id())
            ->where('order_id', null)->get();
            return $this->SuccessResponse($wishlists);
        } catch (\Throwable $th) {
            return $this->ErrorResponse($th->getMessage());
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Wishlist::where('product_id',$request->id)->where('order_id',null)
            ->where('user_id',Auth::id())->first()){
            $message = "Already Added Successfully...!";
            return $this->SuccessResponse($message);
        }else{
            $product = Product::find($request->id);
            Wishlist::create([
                'user_id'=> Auth::id(),
                'product_id'=> $request->id,
                'type' => $request->type,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image,
            ]);
            $message = "Wishlist Added Successfully...!";
            return $this->SuccessResponse($message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
