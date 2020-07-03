@extends('layouts.app')

@section('title', 'View Product Purchase')

@section('content')
    <style type="text/css">
        .img-thumbnail {
            width: 70px;
            height: auto;
        }
    </style>
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                Sale # {{ $sale->id }}
                <div class="float-right">
                    Purchased By: {{ $sale->user ? $sale->user->name : null }} 
                    @ {{ $sale->display_created_at }}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th class="text-right">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sale->sale_products as $item)
                                <tr>
                                    <td><img src="{{ $item->product ? $item->product->image_url : null }}" class="img-thumbnail" /> </td>
                                    <td>{{ $item->product ? $item->product->name : null }}</td>
                                    <td>{{ $item->quantity }} </td>
                                    <td>{{ $item->price }}</td>
                                    <td class="text-right">{{ $item->price * $item->quantity }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total</td>
                                <td class="text-right">{{ $sale->total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

       
    </div>
@endsection