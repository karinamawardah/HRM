<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employees;
use App\divisions;
use App\onleaves;
use App\reimbursments;
use Validator,File;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_employees = employees::all();
        $data_divisions = divisions::all();
        $data_onleaves = onleaves::all();
        $data_reimbursment = reimbursments::all();
        
        return view('tambah',compact('data_divisions','data_onleaves','data_employees','data_reimbursments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $divisions = divisions::pluck('nama_divisions','id');
        $onleaves = onleaves::pluck('nama_onleaves','id');
        $reimbursments = reimbursment::pluck('nama_onleaves','id');
        
        
        return view('form_employees',compact('divisions','onleaves','reimbursments'));
    
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
        $validasi = validator::make($request->all(), employees::validasi() );
        if($validasi->fails()) return back()
        ->withInput()
        ->withErrors($validasi);

        $nama_file = time().'.'.$request->photo->getClientOriginalExtension();
        $tamp = employees::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'profile'=>$request->profile,
            'photo'=>$nama_file,
            'division_id'=>$request->division_id
        ]);
        
        $request->photo->move(public_path(),$nama_file);

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
        $employees = employees::with('onleaves')->with('divisions')->with('reimbursments')->find($id);
        return view('tambah',['data'=>$employees]);
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
        $divisions = divisions::pluck('nama_divisions','id');
        $onleaves = onleaves::pluck('nama_onleaves','id');
        $reimbursments = reimbursment::pluck('nama_onleaves','id');
        
        $employees = employees::find($id);
        return view('form_employees',compact('divisions','onleaves','reimbursments','employees'));
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
        $validasi = validator::make($request->all(),employees::validasi() );
        if($validasi->fails()) return back()
        ->withInput()
        ->withErrors($validasi);

        $nama_file = time().'.'.$request->file('photo')->getClientOriginalExtension();
        $employees = employees::find($id);
        File::delete(public_path('uploads').'/'.$employees->photo);
        $employees->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'profile'=>$request->profile,
            'photo'=>$nama_file,
            'division_id'=>$request->division_id
        ]);
        
        $request->photo->move(public_path(),$nama_file);
       
        return redirect ('/tambah/'.$id);
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
        employees::destroy($id);
        return redirect ('/tambah');
    }
}
