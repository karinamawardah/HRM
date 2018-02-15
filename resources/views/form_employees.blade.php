@extends('layouts/portal')

@section('title')
    Home - HijauHRM
@endsection

@section('content')

<div class="isiberita">
{{ isset($employees->id) ? Form::open(['action'=>['EmployeesController@update', $employees->id], 'method'=>'PUT','files'=>true]) :  Form::open(['url' => '/tambah', 'method' => 'POST','files'=>true]) }}

    {{ Form::text('first_name', isset($employees->first_name) ? $employees->first_name : null, ['class'=>'form-control','placeholder'=>'masukan nama depan']) }}<br>
    {{ $errors->first('first_name') }}

    {{ Form::text('last_name', isset($employees->last_name) ? $employees->last_name : null, ['class'=>'form-control','placeholder'=>'masukan nama belakang']) }}<br>
    {{ $errors->first('last_name') }}

    {{ Form::text('profile', isset($employees->profile) ? $employees->profile : null, ['class'=>'form-control','placeholder'=>'masukan profile']) }}<br>
    {{ $errors->first('profile') }}

    {{ Form::file('photo') }}<br>
    {{ $errors->first('photo') }}

    {{ Form::text('division_id', isset($employees->division_id) ? $employees->division_id : null, ['class'=>'form-control','placeholder'=>'masukan Cuplikan Berita']) }}
    {{ $errors->first('division_id') }}

    {{ Form::submit('Kirim',['class'=>'btn btn-success']) }}

{{ Form::close() }}
</div>
@endsection