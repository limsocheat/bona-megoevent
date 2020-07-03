@extends('layouts.app')

@section ('title', $product->name)

@section('content')

<style type="text/css">
    .preview-pic img {
        max-width: auto;
        height: 332px;
        margin: auto;
        text-align: center;
    } 
    .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1; 
    }
    .tab-content {
        overflow: hidden; 
    }
    .card {
        margin-top: 50px;
        background: #ffff;
        padding: 3em;
        line-height: 1.5em; 
    }
    
    @media screen and (max-width: 868px) {
        .wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex; 
        } 
        .preview-pic img{
        width: auto;
        height: 332px;
        margin:0%;
        text-align: center;  
        }
    }
    
    .details {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column; 
    }
    .product-title{
        text-transform:capitalize;
        font-weight: bold; 
    }
    
    /* .checked, .price span {
        color: #ff9f1a; 
    } */
    
    .product-title, .product-description, .price {
        margin-bottom: 15px;
    }
    
    .product-title {
        margin-top: 0; 
    }
    .color:first-of-type {
        margin-left: 20px; 
    }
    
    .add-to-cart, .like {
        background: #3490dc;
        padding: 0.5em 0.5em;
        border: none;

        color: #fff;
    }
    .add-to-cart i, .like i{
        font-size: 20px;
    }
    .add-to-cart:hover, .like:hover {
        background: #646464fd;
        color: #fff;
    }
    
    .not-available {
        text-align: center;
        line-height: 2em; 
    }
    .not-available:before {
        font-family: fontawesome;
        content: "\f00d";
        color: #fff; 
    }
    
    .tooltip-inner {
        padding: 1.3em; 
    }
    
</style>

<div class="container ">
    {{-- <h3>Product detail</h3> --}}
    {{-- <h1>{{$product->name}}</h1>
    <img src="{{$product->image}}" alt=""> --}}
        <div class="card mb-5 p-3">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6 col-sm-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active text-center mt-4" id="pic-1">
                                <img src="{{$product->image_url}}" alt="product">
                            </div>
                        </div>
                    </div>
                    <div class="details col-md-6 p-3">
                        <h1>{{$product->name}}</h1>
                        <p class="product-description">A transformative triple‑camera system that adds tons of capability without complexity. An unprecedented leap in battery
                            life. And a mind‑blowing chip that doubles down on machine learning and pushes the boundaries of what a smartphone can
                            do. Welcome to the first iPhone powerful enough to be called Pro.</p>
                        <p class="price">current price: <span>${{ $product->price }}</span></p>
                        <p class="colors mb-4">colors: Black</p>
                        <div class="action">
                             {!! Form::open(['route' => ['cart.add', $product->id], 'method' => 'POST']) !!}
                                <button type="submit" class="add-to-cart btn btn-default mb-4" type="button">Add to Cart  <i class="fa fa-cart-plus pl-2 pr-2" aria-hidden="true"></i></button>
                             {!! Form::close() !!}
                            {{-- <button class="like btn btn-default mb-4" type="button"> Buy Now  <i class="fa fa-shopping-basket pl-3" aria-hidden="true"></i></span></button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection