@extends('layouts.app')

@section('title', 'Purchase')

@section('content')
<div class="container py-4">

    <div class="card">
        <div class="card-header">
            <h2>Manage Order <small>For Organizer</small></h2>
        </div>
        <div class="card-body">
            <table class="table">
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
                        <td><a href="{{ route('manage.order_ticket.index') }}?purchase_id={{ $purchase->id }}&event_id={{ $purchase->event->id }}" class="btn btn-outline-primary">{{ $purchase->quantity }}</a></td>
                        <td>{{ $purchase->display_created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection