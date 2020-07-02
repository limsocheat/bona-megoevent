@extends('layouts.app')

@section('title', 'Purchase')

@section('content')
<div class="container py-4">

    <div class="card mb-4">
        <div class="card-header">
            <h2>Event Purchase</h2>
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
            <h2>Product Purchase</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Total</th>
                            <th>Created At</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                        <tr>
                            <td>{{ $sale->id }}</td>
                            <td>{{ $sale->user ? $sale->user->name : null }}</td>
                            <td>{{ $sale->total }}</td>
                            <td>{{ $sale->display_created_at }}</td>
                            <td><a href="{{ route('manage.sale.show', $sale->id) }}" class="btn btn-primary">View</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection