@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Booth Type</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.booth_type.create') }}" class="btn btn-primary">New Booth Type</a>
       
    </div>
    <div class="card-body">
        <table class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Pricing</th>
                    <th>Total Per Event</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($booth_types as $booth_type)
                    <tr>
                     
                        <td>{{ $booth_type->name }}</td>
                        <td>{{ $booth_type->pricing }}</td>
                        <td>{{ $booth_type->total}}</td>
                        <td>{{ $booth_type->description}}</td>
                     
                        <td>
                            <a href="{{ route('admin.booth_type.edit', $booth_type->id) }}" class="btn btn-primary btn-sm" style="float: left; margin-right: 5px">Edit</a>
                            {!! Form::open(['route' => ['admin.booth_type.destroy', $booth_type->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
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