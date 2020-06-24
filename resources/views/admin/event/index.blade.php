@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Event</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Location</th>
                    <th>Purchases</th>
                    <th>Tickets</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{ $event->name}}</td>
                    <td>{{ $event->type ? $event->type->name : null }}</td>
                    <td>{{ $event->category ? $event->category->name : null}}</td>
                    <td>
                        {{ $event->display_start_date}}
                        {{ $event->display_start_time}}
                    </td>
                    <td>{{ $event->display_end_date}}
                        {{ $event->display_end_time}}
                    </td>
                    <td>{{ $event->location->name}}</td>
                    <td>
                        <a href="{{ route('admin.event.purchases', $event->id) }}" class="btn btn-outline-primary">{{ count($event->purchases) }}</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.event.tickets', $event->id) }}" class="btn btn-outline-primary">{{ count($event->tickets) }}</a>
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