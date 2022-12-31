<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listnavitem = Dashboard::getNav();
        $auth = auth()->user();
        $orders = Order::with('user', 'payment')->latest('created_at')->paginate(6);

        return view('dashboard.admin.orders.index', [
            'title' => 'Dashboard',
            'listnav' => $listnavitem,
            'auth' => $auth,
            'orders' => $orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listnavitem = Dashboard::getNav();
        $auth = auth()->user();
        $details = Dashboard::getRecentOrder()->where('order_id', '=', $id)->first();

        $ppn = ($details->total_price / 100) * 11;
        $price = floor($details->total_price - $ppn);

        return view('dashboard.admin.orders.show', [
            'title' => 'Details Order',
            'listnav' => $listnavitem,
            'auth' => $auth,
            'detail' => $details,
            'ppn' => $ppn,
            'price' => $price
        ]);
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
        $order = Order::where('order_id', '=', $id)->first();
        Order::destroy($order->order_id);
        return back()->with('messege', 'Order has been deleted!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf($id)
    {
        $listnavitem = Dashboard::getNav();
        $auth = auth()->user();
        $details = Dashboard::getRecentOrder()->where('order_id', '=', $id)->first();

        $ppn = ($details->total_price / 100) * 11;
        $price = floor($details->total_price - $ppn);

        return view('dashboard.admin.orders.preview', [
            'title' => 'Details Order',
            'listnav' => $listnavitem,
            'auth' => $auth,
            'detail' => $details,
            'ppn' => $ppn,
            'price' => $price
        ]);
    }

    public function downloadPDF($id)
    {
        $listnavitem = Dashboard::getNav();
        $auth = auth()->user();
        $details = Dashboard::getRecentOrder()->where('order_id', '=', $id)->first();

        $ppn = ($details->total_price / 100) * 11;
        $price = floor($details->total_price - $ppn);

        $pdf = Pdf::loadView('dashboard.admin.orders.download', [
            'title' => 'Details Order',
            'listnav' => $listnavitem,
            'auth' => $auth,
            'detail' => $details,
            'ppn' => $ppn,
            'price' => $price
        ]);

        return $pdf->download('invoice.pdf');;
    }
}
