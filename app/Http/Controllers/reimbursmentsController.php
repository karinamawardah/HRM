<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\divisions;
use App\employees;
use App\reimbursments;
use App\onleaves;
use Validator;

class reimbursmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reimbursments = reimbursments::all();
        return view('tambah',['data_reimbursments'=>$reimbursments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('form_reimbursments');
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
        $validasi = validator::make($request->all(), reimbursments::validasi() );
        if($validasi->fails()) return back()
        ->withInput()
        ->withErrors($validasi);

        $tamp = reimbursments::create([
            'employee_id'=>$request->employee_id,
            'date'=>$request->date,
            'amount'=>$request->notes,
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
        $reimbursments = reimbursments::find($id);
        return view('tambah',['data_reimbursments'=>$reimbursments]);
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
        $reimbursments = reimbursments::find($id);
        return view('form_reimbursments',['reimbursments'=>$reimbursments]);
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
        reimbursments::find($id)->update($request->all());
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
        reimbursments::destroy($id);
        return redirect ('/tambah');
    }
}
