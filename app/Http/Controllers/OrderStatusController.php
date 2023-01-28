<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orderStatus.index', ['orderstatuses' => OrderStatus::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orderStatus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderS = new OrderStatus();
        $orderS->name = $request->input('name');
        $orderS->color = $request->input('color');
        $orderS->save();
        return redirect()->route('orderstatuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function show(OrderStatus $orderStatus)
    {
        return redirect()->route('orderstatuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function edit($orderStatus)
    {
        return view('orderStatus.edit', ['orderstatus' => OrderStatus::find($orderStatus)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $order_id)
    {
        $orderStatus = OrderStatus::find($order_id);
        $orderStatus->name = $request->input('name');
        $orderStatus->color = $request->input('color');
        $orderStatus->save();
        return redirect()->route('orderstatuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($order_id)
    {
        $orderStatus = OrderStatus::find($order_id);
        $orderStatus->delete();
        return redirect()->route('orderstatuses.index');
    }
}
