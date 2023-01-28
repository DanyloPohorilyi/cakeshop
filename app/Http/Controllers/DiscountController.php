<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Confectionery;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discount.index', ['discounts' => Discount::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $confectioneries = Confectionery::pluck('name', 'id');
        return view('discount.create', ['confectioneries' => $confectioneries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $discount = new Discount();
        $discount->percent = $request->input('percent');
        $discount->save();

        $confectioneries = $request->input('confectioneries');
        foreach ($confectioneries as $conf_id ) {
            $discount->confectioneries()->attach($conf_id);
        }
        return redirect()->route('discount.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        return redirect()->route('discount.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        $confectioneries = Confectionery::pluck('name', 'id');
        return view('discount.edit', ['confectioneries' => $confectioneries, 'discount' => $discount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        $discount->percent = $request->input('percent');
        $discount->save();

        $discount->confectioneries()->detach();
        $confectioneries = $request->input('confectioneries');
        foreach ($confectioneries as $conf_id ) {
            $discount->confectioneries()->attach($conf_id);
        }
        return redirect()->route('discount.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $discount->confectioneries()->detach();
        $discount->delete();
        return redirect()->route('discount.index');
    }
}
