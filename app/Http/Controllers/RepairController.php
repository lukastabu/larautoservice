<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Autoservice;
use Illuminate\Http\Request;


class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $repairs = Repair::all();

        return view('repair.index', ['repairs' => $repairs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autoservices = Autoservice::all();

        return view('repair.create', ['autoservices' => $autoservices]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRepairRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $repair = new Repair;

        $repair -> repair = $request->repair;

        $repair -> price = $request->price;

        $repair -> duration = $request->duration;

        $repair -> autoservice_id = $request->autoservice_id;

        $repair -> save();

        return redirect()->route('repair-index')->with('success', 'New Repair service is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function show(int $rID)
    {
        $repair = Repair::where('id', $rID)->first();
 
        return view('repair.show', ['repair' => $repair]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function edit(Repair $repair)
    {
        $autoservices = Autoservice::all();

        return view('repair.edit', [
            'repair' => $repair,
            'autoservices' => $autoservices,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepairRequest  $request
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repair $repair)
    {
        $repair -> repair = $request->repair;

        $repair -> price = $request->price;

        $repair -> duration = $request->duration;

        $repair -> autoservice_id = $request->autoservice_id;

        $repair -> save();

        return redirect()->route('repair-index')->with('success', 'Repair service is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repair $repair)
    {
        $repair -> delete();
        return redirect()->back()->with('success', 'Repair is deleted ');
    }
}
