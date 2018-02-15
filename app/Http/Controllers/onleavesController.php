<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\divisions;
use App\employees;
use App\onleaves;
use App\reimbursments;
use Validator;

class onleavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $onleaves = onleaves::all();
        return view('tambah',['data_onleaves'=>$onleaves]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('form_onleaves');
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
        $validasi = validator::make($request->all(), onleaves::validasi() );
        if($validasi->fails()) return back()
        ->withInput()
        ->withErrors($validasi);

        $tamp = onleaves::create([
            'employee_id'=>$request->employee_id,
            'date'=>$request->date,
            'notes'=>$request->notes,
            'status'=>$request->status,
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
        $onleaves = onleaves::find($id);
        return view('tambah',['data'=>$onleaves]);
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
        $onleaves = onleaves::find($id);
        return view('form_onleaves',['onleaves'=>$onleaves]);
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
        onleaves::find($id)->update($request->all());
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
        onleaves::destroy($id);
        return redirect ('/tambah');
    }
}
