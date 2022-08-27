<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerBundle;
use App\Models\Product;
use Illuminate\Http\Request;

class BannerBundleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannerBundles = BannerBundle::get(['banner_bundle_id', 'title', 'status']);
        return view('admin.modules.banner_bundle.index', compact('bannerBundles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::query()->Active()->get(['product_id', 'name']);
        return view('admin.modules.banner_bundle.createOrUpdate', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = BannerBundle::query()->Image($request);
        BannerBundle::create([
            'title'  => $request->title,
            'image'  => $image,
            'body'   => $request->body,
            'products'    => json_encode($request->products)
        ]);

        return redirect()->route('admin.banner-bundle.index')->with('success', "Banner Bundle Created Successfully...!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $show = BannerBundle::find($id);
        return view('admin.modules.banner_bundle.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        
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
            BannerBundle::query()->FindId($id)->delete();
            return redirect()->route('admin.banner-bundle.index')->with('success','Banner Bundle Deleted Successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * bundle offer status 
     */
    public function status($id)
    {
        try {
            $banner = BannerBundle::query()->FindID($id); //self trait
            BannerBundle::query()->Status($banner); // crud trait
            return redirect()->route('admin.banner-bundle.index')->with('warning','Banner Bundle Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->back()->with('Something Went Wrong..!');
        }
    }
}
