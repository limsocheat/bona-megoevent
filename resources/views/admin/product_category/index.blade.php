@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Product category</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.product_category.create') }}" class="btn btn-primary">New Product category</a>
       
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
					<th>Active</th>
					<th class="mego-action-button">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_categories as $product_category)
                    <tr>
                        <td>{{ $product_category->name }}</td>
						<td>{{ $product_category->description}}</td>
						<td>
                            @if ($product_category->active)
                            <div class="badge badge-primary">Active</div>
                            @else
                            <div class="badge badge-secondary">Inactive</div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.product_category.edit', $product_category->id) }}" class="btn btn-primary btn-sm mego-button-edit">Edit</a>
                            {!! Form::open(['route' => ['admin.product_category.destroy', $product_category->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
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
