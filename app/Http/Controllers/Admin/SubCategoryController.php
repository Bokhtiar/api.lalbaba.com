<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $subcategories = SubCategory::latest()->get(['sub_category_id','name', 'image', 'category_id', 'status']);
            return view('admin.modules.subcategory.index', compact('subcategories'));
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
        $categories = Category::query()->Active()->get(['category_id', 'name']);
        return view('admin.modules.subcategory.createOrUpdate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = SubCategory::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $image = SubCategory::query()->Image($request);
                $subcategory = SubCategory::create([
                    'name' => $request->name,
                    'image' => $image,
                    'category_id' => $request->category_id
                ]);

                if (!empty($subcategory)) {
                    DB::commit();
                    return redirect()->route('admin.subcategory.index')->with('success','Sub category Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
            }
        }
    }



    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     try {
    //         $edit = Category::query()->FindId($id);
    //         return view('admin.modules.category.createOrUpdate', compact('edit'));
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $validated = Category::query()->Validation($request->all());
    //     if($validated){
    //         try{
    //             DB::beginTransaction();
    //             $category = Category::query()->FindId($id);
    //             $reqImage = $request->image;
    //             if($reqImage){
    //                 $image = Category::query()->Image($request);
    //             }else{
    //                 $categoryImage = $category->image;
    //             }
    //             $categoryU = $category->update([
    //                 'name' => $request->name,
    //                 'image' => $reqImage ? $image : $categoryImage,
    //             ]);

    //             if (!empty($categoryU)) {
    //                 DB::commit();
    //                 return redirect()->route('admin.category.index')->with('success','category Created successfully!');
    //             }
    //             throw new \Exception('Invalid About Information');
    //         }catch(\Exception $ex){
    //             return back()->withError($ex->getMessage());
    //             DB::rollBack();
    //         }
    //     }
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     try {
    //         Category::query()->FindId($id)->delete();
    //         return redirect()->route('admin.category.index')->with('success','category Deleted Successfully!');
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }

    public function status($id)
    {
        try {
            $subcategory = SubCategory::query()->FindID($id); //self trait
            SubCategory::query()->Status($subcategory); // crud trait
            return redirect()->route('admin.subcategory.index')->with('warning','Sub category Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
