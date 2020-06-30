@extends('layouts.app')

@section('title', 'Product')

@section('content')
<style>
    .card-horizontal {
    display: flex;
    flex: 1 1 auto;
    }
    #card-product{
        position: relative;
        width: auto;
        height: 225px;
    }
    #card-product img{
        max-width: auto;
        max-height: 147px;
        margin: 15px 0 15px 15px;
    }
    .card-body .card-text{
        color:#45f145;
        font-size: 16px;
    }
    #card-texts{
        margin-top:15%;
    }
    .add-to-cart{
        margin-top:29%;
        margin-right: 15px;
        margin-bottom: 15px;
    }

</style>
<div class="container">
    <div class="row my-2">
        <div class="col-md-12">
			<h1 class="text-left pl-0 mt-5 mb-3 font-weight-bold" id="h1">Highlighted Events</h1>
        </div>
        <div class="col-md-4 mb-4">
            @include('front.components.product.card')
        </div>
    </div>
</div>
@endsection