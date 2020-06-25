@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Contact</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.contact.create') }}" class="btn btn-primary">New Contact</a>

    </div>
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Country</th>
                    <td>Conpany Name</td>
                    <td>Type</td>
                    <td>Message</td>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($locations as $location)
                <tr>

                    <td>{{ $location->id }}</td>
                    <td>{{ $location->name }}</td>
                    <td>{{ $location->address}}</td>
                    <td>{{ $location->description}}</td>
                    <td>{{ $location->active}}</td>

                    <td>
                 <a href="{{ route('admin.location.edit', $location->id) }}" class="btn btn-primary btn-sm"
                    style="float: left; margin-right: 5px">Edit</a>
                   {!! Form::open(['route' => ['admin.location.destroy', $location->id], 'onsubmit' => "return confirm('Are you sure?')",
                    'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody> --}}
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