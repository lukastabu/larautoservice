<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Mechanic;
use App\Models\Repair;
use App\Models\Autoservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
 
        return view('order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autoservices = Autoservice::all();

        return view('order.create', [
            'autoservices' => $autoservices,
        ]);
    }
    public function submit(Request $request, int $aID)
    {
        $mechanics = Mechanic::all();
        $repairs = Repair::all();
        $autoservice = Autoservice::where('id', $aID)->first();

        return view('order.submit', [
            'autoservice' => $autoservice,
            'mechanics' => $mechanics,
            'repairs' => $repairs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order -> autoservice_id = $request -> autoservice_id;
        $order -> mechanic_id = $request -> mechanic_id;
        $order -> repair_id = $request -> repair_id;
        $order -> user_id = Auth::user()->id;
        
        $order->save();

        return redirect()->route('order-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
