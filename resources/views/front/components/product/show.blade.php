@extends('layouts.app')

@section ('title', $product->name)

@section('content')

<style type="text/css">
    img {
        max-width: 100%;
    }
    
    .preview {
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
    @media screen and (max-width: 996px) {
        .preview {
            margin-bottom: 20px;
        } 
    }
    
    .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1; 
    }
    
    .preview-thumbnail.nav-tabs {
        border: none;
        margin-top: 15px; 
    }
    .preview-thumbnail.nav-tabs li {
        width: 18%;
        margin-right: 2.5%; 
    }
    .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block; 
    }
    .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0;
    }
    .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0; 
    }
    
    .tab-content {
        overflow: hidden; 
    }
    .tab-content img {
        width: 100%;
        -webkit-animation-name: opacity;
        animation-name: opacity;
        -webkit-animation-duration: .3s;
        animation-duration: .3s; 
    }
    
    .card {
        margin-top: 50px;
        background: #ffff;
        padding: 3em;
        line-height: 1.5em; 
    }
    
    @media screen and (min-width: 997px) {
        .wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex; 
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
    
    .colors {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1; 
    }
    
    .product-title, .price, .sizes, .colors {
        text-transform:capitalize;
        font-weight: bold; 
    }
    
    .checked, .price span {
        color: #ff9f1a; 
    }
    
    .product-title, .rating, .product-description, .price, .vote, .sizes {
        margin-bottom: 15px;
    }
    
    .product-title {
        margin-top: 0; 
    }
    
    .size {
        margin-right: 10px; 
    }
    .size:first-of-type {
        margin-left: 40px; 
    }
    
    .color {
        display: inline-block;
        vertical-align: middle;
        margin-right: 10px;
        height: 2em;
        width: 2em;
        border-radius: 2px; 
    }
    .color:first-of-type {
        margin-left: 20px; 
    }
    
    .add-to-cart, .like {
        background: #3490dc;
        padding: 1.2em 1.5em;
        border: none;
        text-transform: UPPERCASE;
        font-weight: bold;
        color: #fff;
        -webkit-transition: background .3s ease;
        transition: background .3s ease; 
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
                    <div class="preview col-md-6">
    
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                                <img src="{{$product->image}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="details col-md-6 p-3">
                        <h1>{{$product->name}}</h1>
                        <p class="product-description">A transformative triple‑camera system that adds tons of capability without complexity. An unprecedented leap in battery
                            life. And a mind‑blowing chip that doubles down on machine learning and pushes the boundaries of what a smartphone can
                            do. Welcome to the first iPhone powerful enough to be called Pro.</p>
                        <h4 class="price">current price: <span>${{ $product->price }}</span></h4>
                        <h5 class="colors mb-4">colors: Black</h5>
                        <div class="action">
                             {!! Form::open(['route' => ['cart.add', $product->id], 'method' => 'POST']) !!}
                                <button type="submit" class="add-to-cart btn btn-default mr-4 mb-4" type="button">Add to Cart  <i class="fa fa-cart-plus pl-3" aria-hidden="true"></i></button>
                             {!! Form::close() !!}
                            {{-- <button class="like btn btn-default mb-4" type="button"> Buy Now  <i class="fa fa-shopping-basket pl-3" aria-hidden="true"></i></span></button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection