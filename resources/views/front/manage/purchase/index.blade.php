@extends('layouts.app')

@section('title', 'Purchase')

@section('content')
<div class="container py-4">

    <div class="card mb-4">
        <div class="card-header">
            <h2>Purchase</h2>
        </div>
        <div class="card-body">
             <div class="table-responsive">
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
                            <td>{{ $purchase->display_created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Purchase</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sub Total</th>
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
    </div>
</div>
@endsection