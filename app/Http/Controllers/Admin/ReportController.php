<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function today()
    {
        $orders = Order::whereDate('created_at', Carbon::today())->get();
        $pageTitle = "Current Today Report";
        $total_order = $orders->count();
        return view('admin.modules.report.report', compact('orders', 'pageTitle', 'total_order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function yesterday()
    {
        $orders = Order::whereDate('created_at', Carbon::yesterday())->get();
        $pageTitle = "Current Yesterday Report";
        $total_order = $orders->count();
        return view('admin.modules.report.report', compact('orders', 'pageTitle', 'total_order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function month(Request $request)
    {
        $orders = Order::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get();
        $pageTitle = "Current Month Report";
        $total_order = $orders->count();
        return view('admin.modules.report.report', compact('orders', 'pageTitle', 'total_order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function year()
    {
        $orders = Order::whereYear('created_at', date('Y'))->get();
        $pageTitle = "Current Year Report";
        $total_order = $orders->count();
        return view('admin.modules.report.report', compact('orders', 'pageTitle', 'total_order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function week()
    {
        $orders = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $pageTitle = "Current Week Report";
        $total_order = $orders->count();
        return view('admin.modules.report.report', compact('orders', 'pageTitle', 'total_order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        if ($request->endDate == null) {
            $start_date = Carbon::parse($request->startDate)
                ->toDateTimeString();

            $orders = Order::whereDate('created_at', $start_date)->get();
        } else {
            $start_date = Carbon::parse($request->startDate)
                ->toDateTimeString();

            $end_date = Carbon::parse($request->endDate)
                ->toDateTimeString();

            $orders = Order::where('created_at', [
                $start_date, $end_date
            ])->get();
        }


        $pageTitle = "Filter Date To Date Report";
        $total_order = $orders->count();
        return view('admin.modules.report.DateFilter', compact('orders', 'pageTitle', 'total_order'));
    }
}
