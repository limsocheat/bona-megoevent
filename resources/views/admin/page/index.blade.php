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
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Slug</th>
                    <th>Title</th>
                    <th class="mego-action-button">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
						
                        <td>{{ $page->slug }}</td>
                        <td>{{ $page->title }}</td>
                        <td>
                            <a href="{{ route('admin.page.edit', $page->id) }}" class="btn btn-primary btn-sm mego-button-edit">Edit</a>
                            {!! Form::open(['route' => ['admin.page.destroy', $page->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
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