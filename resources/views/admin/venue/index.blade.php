@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Venue</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.venue.create') }}" class="btn btn-primary">New Venue</a>
       
    </div>
    <div class="card-body">
        <table class="table" style="width:100%">
            <thead>
                <tr>
					<th>Name</th>
					<th>Size</th>
                    <th>Width</th>
                    <th>Length</th>
                    <th>Description</th>
                    <th class="mego-action-button">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($venues as $venue)
                    <tr>
                     
						<td>{{ $venue->name }}</td>
						<td>{{ $venue->size }}</td>
                        <td>{{ $venue->width }}</td>
						<td>{{ $venue->length}}</td>
						<td>{{ $venue->description}}</td>

                     
                        <td>
                            <a href="{{ route('admin.venue.edit', $venue->id) }}" class="btn btn-primary btn-sm mego-button-edit" >Edit</a>
                            {!! Form::open(['route' => ['admin.venue.destroy', $venue->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('plugins.Datatables', true)

