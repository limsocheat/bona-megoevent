@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Contact</h1>
@stop

@section('content')
<div class="card">

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
            <tbody>
                @foreach ($contacts as $contact)
                <tr>

                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->contact_number}}</td>
                    <td>{{ $contact->country}}</td>
                    <td>{{ $contact->company_name}}</td>
                    <td>{{ $contact->type}}</td>
                    <td>{{ $contact->message}}</td>

                    {{-- <td>
                 <a href="{{ route('admin.contact.edit', $contact->id) }}" class="btn btn-primary btn-sm"
                    style="float: left; margin-right: 5px">Edit</a>
                    {!! Form::open(['route' => ['admin.contact.destroy', $contact->id], 'onsubmit' => "return
                    confirm('Are you sure?')",
                    'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    {!! Form::close() !!}
                    </td> --}}
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