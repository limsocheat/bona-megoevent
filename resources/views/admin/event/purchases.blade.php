@extends('adminlte::page')

@section('title', 'Event Purchases')

@section('content_header')
    <h1>Event Purchases</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table id="datatable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Event</th>
                    <th>User</th>
                    <th>Quantity</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->event ? $purchase->event->name : null }}</td>
                    <td>{{ $purchase->user ? $purchase->user->name : null }}</td>
                    <td>{{ $purchase->quantity }}</td>
                    <td>{{ $purchase->display_created_at }}</td>
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