@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Slide</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.slide.create') }}" class="btn btn-primary">New Slide</a>
       
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th style="width: 300px">Sub Title</th>
					<th>Image</th>
					<th>Location</th>
                    <th style="width: 120px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slides as $slide)
                    <tr>
                        <td>{{ $slide->title }}</td>
						<td>{{ $slide->sub_title}}</td>
						<td><img src="{{ $slide->image_url }}" class="rounded mx-auto" alt=""  style="height:100px;"></td>
						<td>{{ $slide->location}}</td>
                        <td>
                            <a href="{{ route('admin.slide.edit', $slide->id) }}" class="btn btn-primary btn-sm" style="float: left; margin-right: 5px">Edit</a>
                            {!! Form::open(['route' => ['admin.slide.destroy', $slide->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
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