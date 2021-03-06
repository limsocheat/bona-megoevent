@extends('layouts.app')

@section ('title','Cart')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <h1>Cart</h1>
            <div class="table-responsive">
                @if (Cart::getContent()->count() > 0)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-left"></th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th class="text-right">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr height="">
                            <td class="text-left">
                                {!! Form::open(['route' => ['cart.remove', $item->id], 'method' => "DELETE"]) !!}
                                <button class="btn btn-sm btn-danger mego-td-control" type="submit"><i
                                        class="fa fa-times" aria-hidden="true"></i></button>
                                {!! Form::close() !!}
                            </td>
                            <td><img src="{{ $item->associatedModel->image_url }}" class="mego-img-thumbnail" /> </td>
                            <td class="text-truncate">{{ $item->name }}</td>
                            @if ($item->associatedModel->quantity)
                            <td>
                                {!! Form::open(['route' => ['cart.update', $item->id], 'method' => "PUT", 'id' =>
                                'cart_form']) !!}
                                @php
                                $qualities = [];
                                for ($i=1; $i <= $item->associatedModel->quantity; $i++) {
                                    $qualities[$i] = $i;
                                    }
                                    @endphp
                                    {!! Form::select('quantity', $qualities, $item->quantity, ['class' =>
                                    'form-control', 'onChange' => 'this.form.submit()']) !!}
                                    {!! Form::close() !!}
                            </td>
                            @else
                            <td>1</td>
                            @endif
                            <td>{{ $item->price }}</td>
                            <td class="text-right">{{ $item->price * $item->quantity }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td class="text-right">{{ Cart::session(auth()->id())->getTotal() }}</td>
                        </tr>
                    </tbody>
                </table>
                @else
                <div class="col-sm-12 py-3">
                    <div class="text-center">
                        <img src="{{asset('images/cart_empty.png')}}" alt="" width="20%">
                    </div>
                </div>
                <div class="col-md-12 py-3">
                    <div class="alert alert-success">Your Shopping Cart is empty</div>
                </div>
                @endif
            </div>

            <div class="col mb-2">
                <div class="row">

                    <div class="col-sm-12  col-md-6">
                        <a href="{{ route('events') }}" class="btn btn-lg btn-block mego-gold-bg mb-4">Continue
                            Shopping</a>
                    </div>
                    @if (Cart::getContent()->count() > 0)
                    <div class="col-sm-12 col-md-6 text-right">
                        <a href="{{ route('checkout.index') }}" class="btn btn-lg btn-block mego-gold-bg">Checkout</a>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>


@endsection