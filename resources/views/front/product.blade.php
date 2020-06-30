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
        width:400px;
        height: 225px;
    }
    #card-product img{
        max-width: auto;
        max-height: 147px;
        margin: 15px;
    }
    .card-body .card-text{
        color:#45f145;
        font-size: 20px;
    }
    #card-texts{
        margin-top:9%;
    }
    .add-to-cart{
        margin-top:28%;
        margin-right: 15px;
        margin-bottom: 15px;
    }

</style>
    <div class="container">
		<div class="row my-4">
            {{-- <div class="col-md-4 mb-4"> --}}
                @include('front.components.product.card')
            {{-- </div> --}}
		</div>
	</div>
@endsection