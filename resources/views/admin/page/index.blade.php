@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Page</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.page.create') }}" class="btn btn-primary">New Page</a>
       
    </div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
					
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($types as $type)
                    <tr>
						
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->description }}</td>
                        <td>{{ $type->active}}</td>
                     
                        <td>
                            <a href="{{ route('admin.type.edit', $type->id) }}" class="btn btn-primary btn-sm" style="float: left; margin-right: 5px">Edit</a>
                            {!! Form::open(['route' => ['admin.type.destroy', $type->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach --}}
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