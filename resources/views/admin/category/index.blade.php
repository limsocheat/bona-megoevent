@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Category</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">New Category</a>

    </div>
    <div class="card-body">
        <table class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>

                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        @if ($category->active)
                        <div class="badge badge-primary">Active</div>
                        @else
                        <div class="badge badge-secondary">Inactive</div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary btn-sm"
                            style="float: left; margin-right: 5px">Edit</a>
                        {!! Form::open(['route' => ['admin.category.destroy', $category->id], 'onsubmit' => "return
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

@section('js')
<script>
    $(document).ready(function() {
            $('#example').DataTable();
        } );
</script>
@endsection