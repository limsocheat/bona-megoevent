@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Option</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.option.create') }}" class="btn btn-primary">New Option</a>
       
    </div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
					<th>Name</th>
					<th>Type</th>
                    <th>Description</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($options as $option)
                    <tr>
                     
						<td>{{ $option->name }}</td>
						<td>{{ $option->type}}</td>
                        <td>{{ $option->description }}</td>
                        <td>{{ $option->active}}</td>
                     
                        <td>
                            <a href="{{ route('admin.option.edit', $option->id) }}" class="btn btn-primary btn-sm" style="float: left; margin-right: 5px">Edit</a>
                            {!! Form::open(['route' => ['admin.option.destroy', $option->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
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