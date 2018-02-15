<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\divisions;
use App\employees;
use App\onleaves;
use App\reimbursments;
use Validator;

class DivisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $divisions = divisions::all();
        return view('tambah',['data_divisions'=>$divisions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('form_divisions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validasi = validator::make($request->all(), divisions::validasi() );
        if($validasi->fails()) return back()
        ->withInput()
        ->withErrors($validasi);

        $tamp = divisions::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'is_active'=>$request->is_active,
        ]);
        
        return redirect ('/tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employees = employees::where('id', '=', $id)->get();
        return view('tambah',['data_employees'=>$employees]);
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
        $divisions = divisions::find($id);
        return view('form_divisions',['divisions'=>$divisions]);
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
        divisions::find($id)->update($request->all());
        return redirect ('/tambah');
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
        divisions::destroy($id);
        return redirect ('/tambah');
    }
}
