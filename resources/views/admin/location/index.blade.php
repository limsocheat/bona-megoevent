@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Location</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.location.create') }}" class="btn btn-primary">New Location</a>

    </div>
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Description</th>
                    <td>Active</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                <tr>

                    <td>{{ $location->id }}</td>
                    <td>{{ $location->name }}</td>
                    <td>{{ $location->address}}</td>
                    <td>{{ $location->description}}</td>
                    <td>
                        @if ($location->active)
                        <div class="badge badge-primary">Active</div>
                        @else
                        <div class="badge badge-secondary">Inactive</div>
                        @endif
                    </td>

                    <td>
                 <a href="{{ route('admin.location.edit', $location->id) }}" class="btn btn-primary btn-sm"
                    style="float: left; margin-right: 5px">Edit</a>
                   {!! Form::open(['route' => ['admin.location.destroy', $location->id], 'onsubmit' => "return confirm('Are you sure?')",
                    'method' => 'DELETE']) !!}
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

