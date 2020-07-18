@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Widget</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.widget.create') }}" class="btn btn-primary">New Widget</a>

    </div>
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th class="mego-action-button">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($widgets as $widget)
                <tr>

                    <td>{{ $widget->name }}</td>
                    <td>{{ $widget->location }}</td>
                    <td>
                        <a href="{{ route('admin.widget.edit', $widget->id) }}"
                            class="btn btn-primary btn-sm mego-button-edit">Edit</a>
                        {!! Form::open(['route' => ['admin.widget.destroy', $widget->id], 'onsubmit' => "return
                        confirm('Are you sure?')", 'method' => 'DELETE']) !!}
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