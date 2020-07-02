@extends('layouts.app')

@section ('title','Cart')

@section('content')
    <style type="text/css">
        .img-thumbnail {
            width: 70px;
            height: auto;
        }
    </style>
	<div class="container py-4">
    <div class="row">
        <div class="col-12">
			<h1>Cart</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sub Total</th>
                            <th class="text-right">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
							<tr>
								<td><img src="{{ $item->associatedModel->image_url }}" class="img-thumbnail" /> </td>
								<td>{{ $item->name }}</td>
                                <td>
                                    {!! Form::open(['route' => ['cart.update', $item->id], 'method' => "PUT", 'id' => 'cart_form']) !!}	
                                        @php
                                            $qualities	= [];
                                            for ($i=1; $i <= $item->associatedModel->quantity; $i++) { 
                                                $qualities[$i] = $i;
                                            }
                                        @endphp
                                        {!! Form::select('quantity', $qualities, $item->quantity, ['class' => 'form-control', 'onChange' => 'this.form.submit()']) !!}
                                    {!! Form::close() !!}
                                </td>
								<td>{{ $item->price }}</td>
								<td>{{ $item->price * $item->quantity }}</td>
								<td class="text-right">
                                    {!! Form::open(['route' => ['cart.remove', $item->id], 'method' => "DELETE"]) !!}
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i> </button> 
                                    {!! Form::close() !!}
                                </td>
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
			</div>

			<div class="col mb-2">
				<div class="row">
					<div class="col-sm-12  col-md-6">
						<a href="{{ route('product') }}" class="btn btn-block btn-light">Continue Shopping</a>
					</div>
					<div class="col-sm-12 col-md-6 text-right">
						<a href="{{ route('checkout.index') }}" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</a>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>


@endsection