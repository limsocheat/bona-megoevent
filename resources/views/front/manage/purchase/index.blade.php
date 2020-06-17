@extends('layouts.app')

@section('title', 'Purchase')

@section('content')
    <div class="container py-4">
        <h2>Purchase</h2>

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
                        <td>{{ $purchase->quantity }}</td>
                        <td>{{ $purchase->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection