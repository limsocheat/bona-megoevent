@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Event</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.event.create') }}" class="btn btn-primary">New Event</a>
       
    </div>
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
                    <th>Exhibitors</th>
                    <th>Purchases</th>
                    <th>Tickets</th>
                    <th style="width: 100px;">Action</th>
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
                        <a href="{{ route('admin.event.exhibitors', $event->id) }}" class="btn btn-outline-primary">{{ count($event->exhibitors) }}</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.event.purchases', $event->id) }}" class="btn btn-outline-primary">{{ count($event->purchases) }}</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.event.tickets', $event->id) }}" class="btn btn-outline-primary">{{ count($event->tickets) }}</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-primary btn-sm" style="float: left; margin-right: 5px">Edit</a>
                        <a href="{{route('event', $event->id)}}" target="_blank" class="btn btn-success btn-sm" style="float: left; margin-right: 5px">View</a>
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