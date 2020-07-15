@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sale Product</h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Created At</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->user ? $sale->user->name : null }}</td>
                    <td>{{ $sale->total }}</td>
                    <td>{{ $sale->display_created_at }}</td>
                    <td><a href="{{ route('admin.sales.show', $sale->id) }}" class="btn btn-primary">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('plugins.Datatables', true)

