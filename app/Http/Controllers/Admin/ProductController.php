<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Product::latest()->get(['product_id', 'image', 'name', 'type', 'status']);
            return view('admin.modules.product.index', compact('products'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->Active()->get(['category_id', 'name', 'status']);
        $subcategories = SubCategory::query()->Active()->get(['sub_category_id', 'name', 'status']);
        return view('admin.modules.product.createOrUpdate', compact('categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Product::query()->Validation($request->all());
        if($validated){
            try{ 
                $cat = Category::query()->FindId($request->category_id);
                $cat_name = $cat->name;
                DB::beginTransaction();
                $image = Product::query()->Image($request);
                $product = new Product;
                $product->name = $request->name;
                $product->category_id = $request->category_id;
                $product->subcategory_id = $request->subcategory_id;
                $product->category_name = $cat_name;

                $product->regular_price = $request->regular_price;
                $product->discount_price = $request->discount_price;
                $product->discount_percent = $request->discount_percent;
                $product->discount_tag = $request->discount_tag;
                $product->product_unit = $request->product_unit;

                $product->body = $request->body;
                $product->image = $image;
                $product->type = $request->type;
                $product->quantity = $request->quantity;
                $product->alert_quantity = $request->alert_quantity;
                $product->properties = $request->properties;
                
                if (!empty($product)) {
                    DB::commit();
                    $product->save();
                    return redirect()->route('admin.product.index')->with('success','Product Created successfully!');
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
        try {
            $show = Product::query()->FindId($id);
            return view('admin.modules.product.show', compact('show'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $categories = Category::query()->Active()->get(['category_id', 'name', 'status']);
            $subcategories = SubCategory::query()->Active()->get(['sub_category_id', 'name', 'status']);
            $edit = Product::query()->FindId($id);
            return view('admin.modules.product.createOrUpdate', compact('categories', 'edit','subcategories'));
        } catch (\Throwable $th) {
            throw $th;
        }
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
        $validated = Product::query()->Validation($request->all());
        if($validated){
            try{
                $cat = Category::query()->FindId($request->category_id);
                $cat_name = $cat->name;

                DB::beginTransaction();
                $product = Product::query()->FindId($id);
                $reqImage = $request->image;
                if($reqImage){
                    $image = Product::query()->Image($request);
                }else{
                    $ProductImage = $product->image;
                }

                $productU = $product->update([
                    'name' => $request->name,
                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'category_name' => $cat_name,
                    
                    'regular_price' => $request->regular_price,
                    'discount_price' => $request->discount_price,
                    'discount_percent' => $request->discount_percent,
                    'discount_tag' => $request->discount_tag,
                    'product_unit' => $request->product_unit,


                    'body' => $request->body,
                    'image' => $reqImage ? $image : $ProductImage,
                    'quantity' => $request->quantity,
                    'alert_quantity' => $request->alert_quantity,
                    'properties' => $request->properties,
                ]);

                if (!empty($productU)) {
                    DB::commit();
                    return redirect()->route('admin.product.index')->with('success','Product Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
            }
        }
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
            Product::query()->FindId($id)->delete();
            return redirect()->route('admin.product.index')->with('success','Product Deleted Successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function status($id)
    {
        try {
            $product = Product::query()->FindID($id); //self trait
            Product::query()->Status($product); // crud trait
            return redirect()->route('admin.product.index')->with('warning','Product Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
