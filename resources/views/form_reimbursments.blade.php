@extends('layouts/portal')

@section('title')
    Home - HijauHRM
@endsection

@section('content')

<div class="isiberita">
{{ isset($reimbursments) ? Form::open(['action'=>['reimbursmentsController@update', $reimbursments->id], 'method'=>'PUT']) : Form::open(['url'=>'/reimbursments/','method'=>'POST']) }}

    {{ Form::integer('employee_id', isset($reimbursments->employee_id) ? $reimbursments->employee_id : null, ['class'=>'form-control','placeholder'=>'masukan id']) }}
    {{ $errors->first('employee_id') }}

    {{ Form::datetime('date', isset($reimbursments->date) ? $reimbursments->date : null, ['class'=>'form-control','placeholder'=>'masukan tanggal']) }}
    {{ $errors->first('date') }}

    {{ Form::float('amount', isset($reimbursments->amount) ? $reimbursments->amount : null, ['class'=>'form-control','placeholder'=>'masukan amount']) }}
    {{ $errors->first('amount') }}

    {{ Form::text('status', isset($reimbursments->status) ? $reimbursments->status : null, ['class'=>'form-control','placeholder'=>'masukan status']) }}
    {{ $errors->first('status') }}


    {{ Form::submit('kirim',['class'=>'btn btn-success']) }}

{{ Form::close() }}
</div>
@endsection