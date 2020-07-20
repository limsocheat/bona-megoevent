@extends('layouts.app')

@section('title', 'Event Payment')

@section('content')
<div class="py-4 container">
    <div class="card">
        <div class="card-header">
            <h3 class="font-weight-bold">Event Payment <small>{{ $event->name }}</small></h3>
        </div>
        <div class="card-body">
            <div class="row">
                @if (\Session::has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {!! \Session::get('error') !!}
                    </div>
                </div>
                @endif
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Event Details</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Name
                                                </td>
                                                <td>
                                                    {{ $event->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Start
                                                </td>
                                                <td>
                                                    {{ $event->display_start_date }} @ {{ $event->display_start_time }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    End
                                                </td>
                                                <td>
                                                    {{ $event->display_end_date }} @ {{ $event->display_end_time }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Products</h3>
                                </div>
                                <div class="card-body">
                                    {!! Form::open(['route' => ['event.event_product.add', $event->id], 'method' =>
                                    'POST', 'class' => 'row']) !!}
                                    <div class="col-md-9">
                                        {!! Form::select('product_id', $products, null, ['placeholder' => 'Choose add on
                                        product', 'class' => 'form-control', 'disabled' => $event->readonly])
                                        !!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::submit('Add', ['class' => 'btn btn-block mego-gold-bg']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="spacer"></div>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($event->event_products as $product)
                                                    <tr>
                                                        <td>{{ $product->product ? $product->product->name : 'N/A' }}
                                                        </td>
                                                        <td>{{ $product->quantity }}</td>
                                                        <td>{{ Money::SGD($product->price) }}</td>
                                                        <td>
                                                            {!! Form::open(['route' => ['event.event_product.remove',
                                                            $event->id],'method' => "DELETE"]) !!}
                                                            {!! Form::hidden('product_id', $product->product->id) !!}
                                                            {!! Form::submit('X', ['class' => 'btn btn-sm
                                                            btn-danger']) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="text-right" colspan="3">
                                                            Total
                                                        </td>
                                                        <td>
                                                            {{ Money::SGD($event->total_product_price) }}
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Order Details</h3>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Total Hours
                                            <span
                                                class="badge badge-primary badge-pill">{{ $event->total_hours }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Total Grid Block
                                            <span
                                                class="badge badge-primary badge-pill">{{ $event->total_grid_block }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Grid Block Value
                                            <span
                                                class="badge badge-primary badge-pill">{{ Money::SGD(\Setting::get('event.grid_block_value')) }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Total Grid Block Price
                                            <span
                                                class="badge badge-primary badge-pill">{{ Money::SGD($event->total_grid_block_price) }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Total Product Price
                                            <span
                                                class="badge badge-primary badge-pill">{{ Money::SGD($event->total_product_price) }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Total 7% Tax
                                            <span
                                                class="badge badge-primary badge-pill">{{ Money::SGD($event->total_tax) }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Total Final Price
                                            <span
                                                class="badge badge-primary badge-pill">{{ Money::SGD($event->total_final_price) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="spacer"></div>

                            {!! Form::open(['route' => ['manage.event_payment.store'], 'method' => 'POST']) !!}
                            {!! Form::hidden('event_id', $event->id) !!}
                            {!! Form::submit('Place Order & Publish', ['class' => 'btn mego-gold-bg btn-block']); !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection