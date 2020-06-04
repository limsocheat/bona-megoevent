@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Banner</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.banner.create') }}" class="btn btn-primary">New Banner</a>
       
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Link</th>
					<th>Image</th>
                    <th>Location</th>
                    <th style="width: 120px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                    <tr>
                        <td>{{ $banner->name }}</td>
						<td>{{ $banner->link}}</td>
						<td><img src="{{ $banner->image_url }}" class="rounded mx-auto" alt="" ></td>
						<td>{{ $banner->location}}</td>
                        <td>
                            <a href="{{ route('admin.banner.edit', $banner->id) }}" class="btn btn-primary btn-sm" style="float: left; margin-right: 5px">Edit</a>
                            {!! Form::open(['route' => ['admin.banner.destroy', $banner->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
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