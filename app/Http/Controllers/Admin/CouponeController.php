<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $coupones = Coupon::latest()->get();
            return view('admin.modules.coupone.index', compact('coupones'));
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
        return view('admin.modules.coupone.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Coupon::query()->Validation($request->all());
        if ($validated) {
            try {
                DB::beginTransaction();
                $coupone = Coupon::create([
                    'title' => $request->title,
                    'discount' => $request->discount,
                    'code' => $request->code
                ]);

                if (!empty($coupone)) {
                    DB::commit();
                    return redirect()->route('admin.coupone.index')->with('success', 'Coupone Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            } catch (\Exception $ex) {
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
        $edit = Coupon::find($id);
        return view('admin.modules.coupone.createOrUpdate', compact('edit'));
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
        $validated = Coupon::query()->Validation($request->all());
        $update = Coupon::find($id);
        if ($validated) {
            try {
                DB::beginTransaction();
                $coupone = $update->update([
                    'title' => $request->title,
                    'discount' => $request->discount,
                    'code' => $request->code
                ]);

                if (!empty($coupone)) {
                    DB::commit();
                    return redirect()->route('admin.coupone.index')->with('success', 'Coupone Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            } catch (\Exception $ex) {
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
            Coupon::find($id)->delete();
            return redirect()->route('admin.coupone.index')->with('success','Coupone Deleted Successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function status($id)
    {
        try {
            $coupone = Coupon::find($id); //self trait
            Coupon::query()->Status($coupone); // crud trait
            return redirect()->route('admin.coupone.index')->with('warning','coupone Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
