@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Exhibitor</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.exhibitor.create') }}" class="btn btn-primary">New Exhibitor</a>
       
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>User Name</th>
                     <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
					<th>Logo</th>
                    <th>Phone</th>
					<th>Address</th>
                    <th>active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exhibitors as $exhibitor)
                    <tr>
                        <td>{{ $exhibitor->user ? $exhibitor->user->name:null }}</td>
                         <td>{{ $exhibitor->user ?$exhibitor->user->email :null}}</td>
                        <td>{{ $exhibitor->first_name }}</td>
                        <td>{{ $exhibitor->last_name }}</td>
                        <td><img src="{{ $exhibitor->image_url }}" class="rounded mx-auto" alt="" width="50" height="50"></td>
                        <td>{{ $exhibitor->phone}}</td>
                        <td>{{ $exhibitor->address}}</td>
                        <td>
                            @if ($exhibitor->active)
                            <div class="badge badge-primary">Active</div>
                            @else
                            <div class="badge badge-secondary">Inactive</div>
                            @endif
                        </td>
                     
                        <td>
                            <a href="{{ route('admin.exhibitor.edit', $exhibitor->id) }}" class="btn btn-primary btn-sm" style="float: left; margin-right: 5px">Edit</a>
                            {!! Form::open(['route' => ['admin.exhibitor.destroy', $exhibitor->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
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