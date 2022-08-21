<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Assets;
use App\Models\Electricity;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::all();

        return view('bill.index',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assests = Assets::where('on_rent',1)->pluck('id')->toArray();
        $asset_count = count($assests);

        $elec_reading = Electricity::where('month',$request->month)->where('year',$request->year)->whereIn('aid',$assests)->get();
        
        if($asset_count == count($elec_reading)){
            $a_total = 0;
            $elec_reaading_total = 0;
            $total = 0;

            foreach($elec_reading as $elec){
                $a_total += $elec->a_price;
                $elec_reaading_total += ($elec->c_reading - $elec->p_reading) * $elec->per_unit;

                $total = $a_total + $elec_reaading_total;
            }

            Bill::create(['month' => $request->month, 'year' => $request->year, 'paid' => 0, 'pending' => $total, 'total' => $total]);

            return redirect()->route('bill.index')->with('success','Bill created successfully');
        }
        
        return redirect()->route('bill.create')->with('error','You have missed to fill electricity bill for same month fill it to create bill.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        return view('bill.edit',compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $request->validate([
            'paid' => 'required',
            'pending_rent'  => 'required',
        ]);

        $bill->update([
            'paid' => $request->paid, 'pending' => $request->pending_rent
        ]);

        return redirect()->route('bill.index')->with('success','Bill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {

        $bill->delete();

        return redirect()->route('bill.index');
    }
}
