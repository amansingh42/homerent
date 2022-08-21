<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = Assets::paginate(10);

        return view('assets.index',compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assets.create');
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
            'name' => 'required',
            'price' => 'required',
            'on_rent' => 'required'
        ]);

        $check = Assets::where('name',strtolower($request->name))->first();

        if($check){
            return redirect()->route('assets.create')->with('error','Asset already exist.');
        }
        Assets::create(['name'=>$request->name,'price'=>$request->price,'on_rent'=>$request->on_rent]);

        return redirect()->route('assets.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function show(Assets $assets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function edit(Assets $assets,$id)
    {
        $asset = Assets::where('id',$id)->first();
        return view('assets.edit',compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assets $assets,$id)
    {
        $request->validate([
            'name'  => 'required',
            'price' =>  'required',
            'on_rent' => 'required'
        ]);

        $check = Assets::where('id',$id)->first();

        if($check){
            $check->update(['name'=>$request->name,'price'=>$request->price,'on_rent'=>$request->on_rent]);
            
            return redirect()->route('assets.index')->with('success','Asset Updated Successfully');
        }

        return redirect()->route('assets.index')->with('error','No data found for this asset');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assets $assets,$id)
    {
        if($assets->where('id',$id)->first()){
            $assets->where('id',$id)->delete();
        }
        
        return redirect()->route('assets.index');
    }
}
