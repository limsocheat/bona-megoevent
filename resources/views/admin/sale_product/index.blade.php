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
                    <th>Imgae</th>
                    <th>Product</th>
                    <th>Quantity</th>
					<th>Price</th>
					<th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($saleproducts as $saleproduct)
                    <tr>
                        <td><img src="{{  $saleproduct->product ? $saleproduct->product->image_url  : null}}" class="rounded mx-auto" alt=""  width="50" height="50"></td>
						<td>{{ $saleproduct->product ? $saleproduct->product->name :null }}</td>
                        <td>{{ $saleproduct->quantity}}</td>
                        <td>{{ $saleproduct->price}}</td>
                        <td>
                            <a href="{{route('show.product', $saleproduct->id)}}" target="_blank" class="btn btn-success btn-sm" style="float: left; margin-right: 5px">View</a>
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