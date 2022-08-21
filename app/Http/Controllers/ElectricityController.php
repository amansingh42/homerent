<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\Electricity;
use Illuminate\Http\Request;

class ElectricityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elec_reading = Electricity::all();

        return view('elec-reading.index',compact('elec_reading'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assets = Assets::where('on_rent',true)->get();
        return view('elec-reading.create',compact('assets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'aid'  => 'required',
            'asset_price' => 'required',
            'month' => 'required',
            'year'  => 'required',
            'p_reading'  =>  'required',
            'c_reading'  =>   'required|gt:p_reading',
            'price_per_unit' => 'required|max:15'
        ]);

        $check = Electricity::where('aid',$request->aid)->where('month',$request->month)->where('year',$request->year)->first();

        if($check){
            return redirect()->route('elec-reading.index')->with('error','Electricity reading already saved for this asset for following month and year.');
        }

        Electricity::create([
            'aid' => $request->aid,
            'a_price' => $request->asset_price,
            'month' => $request->month, 
            'year' => $request->year,
            'p_reading' => $request->p_reading,
            'c_reading' => $request->c_reading,
            'per_unit'  => $request->price_per_unit 
        ]);

        return redirect()->route('elec-reading.index')->with('success','Electricity reading added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function show(Electricity $electricity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function edit(Electricity $electricity,$id)
    {
        $elec = Electricity::where('id',$id)->first();
        $assets = Assets::where('on_rent',true)->get();

        return view('elec-reading.edit',compact('elec','assets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Electricity $electricity,$id)
    {
        $request->validate([
            // 'aid'  => 'required',
            // 'asset_price' => 'required',
            'month' => 'required',
            'year'  => 'required',
            'p_reading'  =>  'required',
            'c_reading'  =>   'required|gt:p_reading',
            'price_per_unit' => 'required|max:15'
        ]);

        $electricity->where('id',$id)->update(['month' => $request->month,'year' => $request->year , 'p_reading' => $request->p_reading, 'c_reading' => $request->c_reading,'per_unit' => $request->price_per_unit]);
        
        return redirect()->route('elec-reading.index')->with('success','Readings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Electricity  $electricity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Electricity $electricity,$id)
    {
        $check = $electricity->where('id',$id)->first();

        if(!$check){
            return redirect()->route('elec-reading.index')->with('error','No data found.');
        }

        $electricity->where('id',$id)->delete();

        return redirect()->route('elec-reading.index')->with('success','Delete Process completed successfully');
    }
}
