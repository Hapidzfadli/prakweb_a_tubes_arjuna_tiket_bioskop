<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Movie;
use App\Models\Order;
use App\Models\Seat;
use Illuminate\Http\Request;

class MemberTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listnavitem = Dashboard::getNavUser();
        $auth = auth()->user();
        $settlement = 'settlement';
        $capture = 'capture';
        $tiket = Order::with('payment:order_id,transaction_status,gross_amount')->whereHas('payment', function ($q) use ($settlement, $capture) {
            $q->where('transaction_status', '=', $settlement)->orWhere('transaction_status', '=', $capture);
        })->where('user_id', '=', $auth->id)->paginate(6);


        return view('dashboard.member.tiket.index', [
            'title' => 'Dashboard',
            'listnav' => $listnavitem,
            'auth' => $auth,
            'tiket' => $tiket,
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
        $auth = auth()->user();
        $orders = Dashboard::getRecentOrder();
        $tiket = $orders->where('order_id', '=', $id)->first();
        $movie = Movie::getDetails($tiket->id_movie);
        $listnavitem = Dashboard::getNavUser();
        return view('dashboard.member.tiket.show', [
            'title' => 'Ticket',
            'listnav' => $listnavitem,
            'auth' => $auth,
            'tiket' => $tiket,
            'movie' => $movie,
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
        //
    }
}
