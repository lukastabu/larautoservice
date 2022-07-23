<?php

namespace App\Http\Controllers;

use App\Models\Autoservice;
use Illuminate\Http\Request;

class AutoserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $autoservices = Autoservice::all();
 
        return view('autoservice.index', ['autoservices' => $autoservices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('autoservice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAutoserviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $autoservice = new Autoservice;

        $autoservice -> office = $request->office;

        $autoservice -> address = $request->address;

        $autoservice -> phone = $request->phone;

        $autoservice -> save();

        return redirect()->route('autoservice-index')->with('success', 'New autoservice is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autoservice  $autoservice
     * @return \Illuminate\Http\Response
     */
    public function show(int $aID)
    {
        $autoservice = Autoservice::where('id', $aID)->first();
 
        return view('autoservice.show', ['autoservice' => $autoservice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autoservice  $autoservice
     * @return \Illuminate\Http\Response
     */
    public function edit(Autoservice $autoservice)
    {
        return view('autoservice.edit', ['autoservice' => $autoservice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAutoserviceRequest  $request
     * @param  \App\Models\Autoservice  $autoservice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autoservice $autoservice)
    {
        $autoservice -> office = $request->office;

        $autoservice -> address = $request->address;

        $autoservice -> phone = $request->phone;

        $autoservice -> save();

        return redirect()->route('autoservice-index')->with('success', 'Autoservice is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autoservice  $autoservice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autoservice $autoservice)
    {
        if($autoservice ->auto_mechanic->count()) {
            return redirect()->route('autoservice-index')->with('deleted', 'This Autoservice has linked Mechanics - deletion is not allowed');
        }
        elseif($autoservice ->auto_repair->count()) {
            return redirect()->route('autoservice-index')->with('deleted', 'This Autoservice has linked Repair services - deletion is not allowed');
        }
        elseif($autoservice ->auto_order->count()) {
            return redirect()->route('autoservice-index')->with('deleted', 'This Autoservice has linked Orders - deletion is not allowed');
        }
        $autoservice -> delete();
        return redirect()->back()->with('success', 'Autoservice is deleted ');
    }
}
