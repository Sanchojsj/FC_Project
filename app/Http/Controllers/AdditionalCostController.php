<?php

namespace App\Http\Controllers;

use App\Models\AdditionalCost;
use Illuminate\Http\Request;

class AdditionalCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $additional_costs=AdditionalCost::all();
        return view('Admin.additional_cost_index')->with('additional_costs',$additional_costs);
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
        $additional_cost =new AdditionalCost([
            'additional_cost_name'=>$request->additional_cost_name,
            'price'=>$request->price,
            "body" =>$request->body,
        ]);

       $additional_cost->save();
       return redirect("/additional_cost_index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdditionalCosts  $additionalCosts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $additional_costs=AdditionalCost::findOrFail($id);
        return view('Admin.additional_cost_ver')->with('additional_costs',$additional_costs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdditionalCosts  $additionalCosts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $additional_costs=AdditionalCost::findOrFail($id);
        return view('Admin.additional_cost_editar')->with('additional_costs',$additional_costs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdditionalCosts  $additionalCosts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $additional_cost=AdditionalCost::findOrFail($id);
        $additional_cost->update([
            'additional_cost_name'=>$request->additional_cost_name,
            'price'=>$request->price,
            "body" =>$request->body,
        ]);

       return redirect("/additional_cost_index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdditionalCosts  $additionalCosts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $additional_costs=AdditionalCost::findOrFail($id);
        $additional_costs->delete();
        return back();
    }
}
