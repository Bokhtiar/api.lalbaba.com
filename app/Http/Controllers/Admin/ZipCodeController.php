<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ZipBundle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZipCodeController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zipBundles = ZipBundle::get(['zip_bundle_id', 'title', 'price']);
        return view('admin.modules.zipCode.index', compact('zipBundles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.zipCode.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = ZipBundle::query()->Validation($request->all());
        if($validated){
            try{ 
                DB::beginTransaction();
                $zipBundle = ZipBundle::create([
                    'title'  => $request->title,
                    'price'  => $request->price,
                    'body'   => $request->body,
                    'zip_codes'    => json_encode($request->zip_codes)
                ]);
                
                if (!empty($zipBundle)) {
                    DB::commit();
                    return redirect()->route('admin.zip-code.index')->with('success','Zip Code Created successfully!');
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
        $show = ZipBundle::find($id);
        return view('admin.modules.zipCode.show', compact('show'));
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
            ZipBundle::find($id)->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
