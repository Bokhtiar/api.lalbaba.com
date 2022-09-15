<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class AbondoneCartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('order_id', null)->get();
        return view('admin.modules.abondone.index', compact('carts'));
    }

    public function update(Request $request, $id)
    {
        try {
            $update = Cart::find($id);
            $update->discount = $request->discount;
            $update->save();
            return redirect()->back()->with('success', 'abondone cart flat discount done');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
