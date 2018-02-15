@extends('layouts/portal')

@section('title')
    Home - HijauHRM
@endsection

@section('content')

<div class="isiberita">

{{ isset($divisions) ? Form::open(['action'=>['DivisionsController@update', $divisions->id], 'method'=>'PUT']) : Form::open(['url'=>'/divisions/','method'=>'POST']) }}

    {{ Form::text('name', isset($divisions->name) ? $divisions->name : null, ['class'=>'form-control','placeholder'=>'masukan Nama']) }}
    {{ $errors->first('name') }}

    {{ Form::text('description', isset($divisions->description) ? $divisions->description : null, ['class'=>'form-control','placeholder'=>'masukan Description']) }}
    {{ $errors->first('description') }}

    {{ Form::integer('is_active', isset($divisions->is_active) ? $divisions->is_active : null, ['class'=>'form-control','placeholder'=>'masukan ']) }}
    {{ $errors->first('is_active') }}

    {{ Form::submit('kirim',['class'=>'btn btn-success']) }}

{{ Form::close() }}

</div>
@endsection