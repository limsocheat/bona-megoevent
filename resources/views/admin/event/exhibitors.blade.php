@extends('adminlte::page')

@section('title', 'Event Tickets')

@section('content_header')
    <h1>Event Tickets</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <table id="datatable" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exhibitors as $exhibitor)
                <tr>
                    <td>
                        {{ $exhibitor->name }}
                    </td>
                    <td>{{ $exhibitor->email }}</td>
                    <td>{{ $exhibitor->profile ? $exhibitor->profile->phone : null }}</td>
                    <td>{{ $exhibitor->company ? $exhibitor->company->name : null }}</td>
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
        $('#datatable').DataTable();
    } );
</script>
@endsection