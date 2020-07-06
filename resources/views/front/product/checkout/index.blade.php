@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h2>Checkout</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    @if (\Session::has('error'))
                        <div class="alert alert-danger">
                            {!! \Session::get('error') !!}
                        </div>
                    @endif
                    <div class="col-md-6">
                         {!! Form::model($user, ['route' => 'checkout.paypal.submit', 'method' => 'PUT']) !!}
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="font-weight-bold">Delivery</h4>
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    {!! Form::label('profile[first_name]', 'First Name') !!}
                                                    {!! Form::text('profile[first_name]', null, ['placeholder' => 'Enter First
                                                    name', 'class' => 'form-control', 'readonly' => false, 'required' => false]) !!}
                                                </div>
                                                @if ($errors->has('profile.first_name'))
                                                    <span class="text-danger">{{ $errors->first('profile.first_name') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    {!! Form::label('profile[last_name]', 'Last Name') !!}
                                                    {!! Form::text('profile[last_name]', null, ['placeholder' => 'Enter Last
                                                    name', 'class' => 'form-control', 'readonly' => false, 'required' => false]) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-group">
                                                {!! Form::label('profile[address]', 'Address') !!}
                                                {!! Form::text('profile[address]', null, ['placeholder' => 'Enter Address',
                                                'class' => 'form-control', 'readonly' => false, 'required' => false]) !!}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                {!! Form::label('profile[phone]', 'Phone') !!}
                                                {!! Form::text('profile[phone]', null, ['placeholder' => 'Phone Number', 'class'
                                                => 'form-control', 'readonly' => false, 'required' => false]) !!}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                {!! Form::label('email', 'E-Mail') !!}
                                                {!! Form::email('email', null, ['placeholder' => 'Enter Email', 'class' =>
                                                'form-control', 'readonly' => true]) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="font-weight-bold">Order Summary</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        @if (Cart::getContent()->count() > 0)
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th class="text-right">Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($items as $item)
                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td>
                                                                {{ $item->quantity }}
                                                            </td>
                                                            <td>{{ $item->price }}</td>
                                                            <td class="text-right">{{ $item->price * $item->quantity }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
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
                                            <div class="col-md-12 py-3" >
                                                <div class="alert alert-success">Your Shopping Cart is empty</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <p>&nbsp;</p>
                            @if (Cart::getContent()->count() > 0)
                                <button class="btn btn-dark btn-lg btn-block" type="submit">Pay With PayPal</button>
                            @else
                                <a href="{{ route('product') }}" class="btn btn-lg btn-block btn-dark mb-4">Continue Shopping</a>
                            @endif
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection