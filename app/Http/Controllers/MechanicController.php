<?php

namespace App\Http\Controllers;

use App\Models\Autoservice;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mechanics = Mechanic::all();

        return view('mechanic.index', ['mechanics' => $mechanics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autoservices = Autoservice::all();

        return view('mechanic.create', ['autoservices' => $autoservices]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMechanicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mechanic = new Mechanic;

        $mechanic -> name = $request->name;

        $mechanic -> photo = $request->photo;

        $mechanic -> rating = $request->rating;

        $mechanic -> autoservice_id = $request->autoservice_id;

        $mechanic -> save();

        return redirect()->route('mechanic-index')->with('success', 'New Mechanic is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function show(int $aID)
    {
        $mechanic = Mechanic::where('id', $aID)->first();
 
        return view('mechanic.show', ['mechanic' => $mechanic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function edit(Mechanic $mechanic)
    {
        $autoservices = Autoservice::all();

        return view('mechanic.edit', [
            'mechanic' => $mechanic,
            'autoservices' => $autoservices,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMechanicRequest  $request
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mechanic $mechanic)
    {
        $mechanic -> name = $request->name;

        $mechanic -> photo = $request->photo;

        $mechanic -> rating = $request->rating;

        $mechanic -> autoservice_id = $request->autoservice_id;

        $mechanic -> save();

        return redirect()->route('mechanic-index')->with('success', 'Mechanic is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mechanic  $mechanic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mechanic $mechanic)
    {
        $mechanic -> delete();
        return redirect()->back()->with('success', 'Mechanic is deleted ');
    }
}
