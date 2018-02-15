@extends('layouts/portal')

@section('title')
    Home - PINKKY.com
@endsection

@section('content')
    
<ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#employees">employees</a></li>
    <li><a data-toggle="tab" href="#divisions">divisions</a></li>
    <li><a data-toggle="tab" href="#reimbursments">reimbursments</a></li>
    <li><a data-toggle="tab" href="#reimbursments">reimbursments</a></li>
</ul>


<div class="tab-content">
<div id="employees" class="tab-pane fade in active">
    <h3>Table Employees</h3>
    <table class="table table-hover">
        <thead>

            <td>{{ link_to('/tambah/create', '',['class'=>'btn btn-danger glyphicon glyphicon-plus']) }}</td>
        </thead>
        <tbody>
            @foreach($data_employees as $employees) 
                <tr>
                    <td>{{ $employees->id }}</td> 
                    <td>{{ $employees->first_name}}</td> 
                    <td>{{ $employees->last_name }}</td> 
                    <td>{{ $employees->profile }}</td> 
                    <td>{{ link_to('/tambah/'.$employees->id,'',['class'=>'btn btn-warning glyphicon glyphicon-forward']) }}</td>
                    <td>{{ link_to('/tambah/'.$employees->id.'/edit', '',['class'=>'btn btn-info glyphicon glyphicon-pencil']) }}</td>
                    
                    <td>
                        {{ Form::open(['action'=> ['EmployeesController@destroy', $employees->id], 'method'=>'DELETE']) }}
                            {{ Form::submit('Hapus',['class'=>"btn btn-success"]) }}
                        {{ Form::close() }}
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="divisions" class="tab-pane fade">
      <h3>Table Divisions</h3>
    <table class="table table-hover">
        <thead>
            <th>Id</th>
            <th>Nama </th>
            <td>{{ link_to('/divisions/create', '',['class'=>'btn btn-danger glyphicon glyphicon-plus']) }}</td>
        </thead>
        <tbody>
            @foreach($data_divisions as $divisions) 
                <tr>
                    <td>{{ $divisions->id }}</td> 
                    <td>{{ $divisions->name}}</td> 
                    <td>{{ link_to('/tambah/'.$divisions->id.'/edit', '',['class'=>'btn btn-info glyphicon glyphicon-pencil']) }}</td>
                    <td>
                        {{ Form::open(['action'=> ['DivisionsController@destroy', $divisions->id], 'method'=>'DELETE']) }}
                            {{ Form::submit('Hapus',['class'=>"btn btn-success"]) }}
                        {{ Form::close() }}
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="reimbursments" class="tab-pane fade">
      <h3>Table onleaves</h3>
    <table class="table table-hover">
        <thead>
            <th>Id </th>
            <th>Nama </th>
            <td>{{ link_to('/onleaves/create', '',['class'=>'btn btn-danger glyphicon glyphicon-plus']) }}</td>
        </thead>
        <tbody>
            @foreach($data_onleaves as $onleaves) 
                <tr>
                    <td>{{ $onleaves->id }}</td> 
                    <td>{{ $onleaves->notes}}</td> 
                    <td>{{ link_to('/tambah/'.$onleaves->id.'/edit', '',['class'=>'btn btn-info glyphicon glyphicon-pencil']) }}</td>
                    <td>
                        {{ Form::open(['action'=> ['onleavesController@destroy', $onleaves->id], 'method'=>'DELETE']) }}
                            {{ Form::submit('Hapus',['class'=>"btn btn-success"]) }}
                        {{ Form::close() }}
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="reimbursments" class="tab-pane fade">
      <h3>Table reimbursments</h3>
    <table class="table table-hover">
        <thead>
            <th>Id </th>
            <th>Nama </th>
            <td>{{ link_to('/reimbursments/create', '',['class'=>'btn btn-danger glyphicon glyphicon-plus']) }}</td>
        </thead>
        <tbody>
            @foreach($data_reimbursments as $reimbursments) 
                <tr>
                    <td>{{ $reimbursments->id}}</td> 
                    <td>{{ $reimbursments->status}}</td> 
                    <td>{{ link_to('/tambah/'.$reimbursments->id.'/edit', '',['class'=>'btn btn-info glyphicon glyphicon-pencil']) }}</td>
                    <td>
                        {{ Form::open(['action'=> ['reimbursmentsController@destroy', $reimbursments->id], 'method'=>'DELETE']) }}
                            {{ Form::submit('Hapus',['class'=>"btn btn-success"]) }}
                        {{ Form::close() }}
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
