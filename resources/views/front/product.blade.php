@extends('layouts.app')

@section('title', 'Product')

@section('content')
<div class="container">
    <div class="row my-2 py-2">
        <div class="col-md-12">
            <div class="card py-3">
                @include('front.components.product.filter')
            </div>
        </div>
        <div class="col-md-12">
            <h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold" id="h1">Products</h1>
        </div>
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            @include('front.components.product.card')
        </div>
        @endforeach
    </div>
</div>
@endsection