<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confectionery;
use App\Models\Category;
use App\Models\Order;
use App\Models\SimpleOrder;
use App\Models\OrderStatus;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category = null)
    {
        $confectioneries = Confectionery::all();
        if ($category == null)
            return view('shop.index', ['confectioneries' => $confectioneries, 'categories' => Category::all()]);
        else{

            $my_category = Category::where('name', urldecode(ucfirst($category)))->first();
            $new_confectioneries = $my_category->confectioneries;
            return view('shop.index', ['confectioneries' => $my_category->confectioneries, 'categories' => null]);
        }
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
    public function store(Request $request, $category, $product_id)
    {
        $confectionery = Confectionery::find($product_id);

        //Order status 1 - in the cart,
        $myOrder = new SimpleOrder();
        $myOrder->amount = $request->input('count');
        $myOrder->confectionery()->associate($confectionery);

        $orderStatus = OrderStatus::where('name', 'In the cart')->first();
        $myOrder->order->order_status()->associate($orderStatus);
        $myOrder->save();
        $myOrder->order->address = $request->input('address');
        $myOrder->order->phone = $request->input('phone');

        $myprice = $confectionery->price;
        if($confectionery->discounts != null){
            foreach ($confectionery->discounts as $discount) {
                $myprice -= round($myprice * $discount->percent / 100, 2);
            }
        }
        $myOrder->order->price = $myprice;
        $taste = $request->input('taste');
        $myOrder->order->add_info = nl2br("Taste: ".$taste." \n\r ".$request->input('add_info'));

        //$myOrder->save();
        $myOrder->order->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category, $product_id)
    {
        $confectionery = Confectionery::find($product_id);
        return view('shop.show', ['confectionery' => $confectionery]);
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
