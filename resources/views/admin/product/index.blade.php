@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Product</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">New Product</a>
       
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
					<th  class="mego-action-button">Name</th>
					<th>Image</th>
                    <th>Category_name</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Sold</th>
                    <th>Available </th>
                    <th class="mego-action-description">Description</th>
                    <th class="mego-action-button">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
						<td>{{ $product->name}}</td>
                        <td><img src="{{ $product->image_url }}" class="rounded mx-auto mego-datatable-image"></td>
                        <td>{{ $product->category ?$product->category->name :null}}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->color}}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->sold_quantity }}</td>
                        <td>{{ $product->available_quantity }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary btn-sm mego-button-edit">Edit</a>
                            {!! Form::open(['route' => ['admin.product.destroy', $product->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
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

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection