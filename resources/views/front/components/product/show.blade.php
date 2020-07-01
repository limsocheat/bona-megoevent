@extends('layouts.app')

@section ('title', $product->name)

@section('content')

<style type="text/css">

</style>

<div class="container ">
    {{-- <h3>Product detail</h3> --}}
    <h1>{{$product->name}}</h1>
    <img src="{{$product->image}}" alt="">
   
</div>
@endsection