<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $variants = ProductVariant::get(['product_variant_id', 'title', 'sell_price', 'status', 'discount_price', 'product_id']);
            return view('admin.modules.product.variant.index', compact('variants'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.variant.index')->with('error', 'Something Wrong...!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $products = Product::all();
            return view('admin.modules.product.variant.createOrUpdate', compact('products'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "Something Wrong...!");
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
        $validated = ProductVariant::query()->Validation($request->all());
        if($validated){
            try{ 
                DB::beginTransaction();
                $product = new ProductVariant();
                $product->title = $request->title;
                $product->product_id = $request->product_id;
                $product->sell_price = $request->sell_price;
                $product->discount_price = $request->discount_price;
                $product->total_quantity = $request->total_quantity;
                $product->alert_quantity = $request->alert_quantity;
                if (!empty($product)) {
                    DB::commit();
                    $product->save();
                    return redirect()->route('admin.variant.index')->with('success','Product Variant Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
            }
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
        
        try {
            ProductVariant::query()->FindId($id)->delete();
            return redirect()->route('admin.variant.index')->with('success','Product Variant Deleted Successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    
    }

    public function status($id)
    {
        try {
            $product = ProductVariant::query()->FindID($id); //self trait
            ProductVariant::query()->Status($product); // crud trait
            return redirect()->route('admin.variant.index')->with('warning','Product Variant Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
