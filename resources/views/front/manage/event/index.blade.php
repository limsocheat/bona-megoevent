@extends('layouts.app')

@section('title', 'Events')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-left">Manage Event</h2>
                    <a class="btn btn-primary float-right" href="{{ route('manage.event.create') }}">New Event</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Orders</th>
                            <th>Tickets</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->type ? $event->type->name : null }}</td>
                                <td>{{ $event->category ? $event->category->name : null }}</td>
                                <td>{{ $event->display_start_date }} @ {{ $event->display_start_time }}</td>
                                <td>{{ $event->display_end_date }} @ {{ $event->display_end_time }}</td>
                                <td><a href="{{ route('manage.order.index') }}?event_id={{ $event->id }}" class="btn btn-outline-primary">{{ count($event->purchases) }}</a></td>
                                <td><a href="{{ route('manage.order_ticket.index') }}?event_id={{ $event->id }}" class="btn btn-outline-primary">{{ count($event->tickets) }}</a></td>
                                <td>
                                    <a href="{{ route('manage.event.edit', $event->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection