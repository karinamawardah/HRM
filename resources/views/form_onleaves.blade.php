@extends('layouts/portal')

@section('title')
    Home - HijauHRM
@endsection

@section('content')

<div class="isiberita">
{{ isset($onleaves) ? Form::open(['action'=>['onleavesController@update', $onleaves->id], 'method'=>'PUT']) : Form::open(['url'=>'/onleaves/','method'=>'POST']) }}

    {{ Form::integer('employee_id', isset($onleaves->employee_id) ? $onleaves->employee_id : null, ['class'=>'form-control','placeholder'=>'masukan Nama Penulis']) }}
    {{ $errors->first('employee_id') }}

    {{ Form::datetime('date', isset($onleaves->date) ? $onleaves->date : null, ['class'=>'form-control','placeholder'=>'masukan tanggal']) }}
    {{ $errors->first('date') }}

    {{ Form::text('notes', isset($onleaves->notes) ? $onleaves->notes : null, ['class'=>'form-control','placeholder'=>'masukan notes']) }}
    {{ $errors->first('notes') }}

    {{ Form::text('status', isset($onleaves->status) ? $onleaves->status : null, ['class'=>'form-control','placeholder'=>'masukan status']) }}
    {{ $errors->first('status') }}


    {{ Form::submit('kirim',['class'=>'btn btn-success']) }}

{{ Form::close() }}
</div>
@endsection