@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							Buy Ticket
						</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Event Name</th>
										<th scope="col">Date and Time</th>
										<th scope="col">Price</th>
										<th scope="col">Quantity</th>
										<th scope="col">Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">{{ $event->id }}</th>
										<td>{{ $event->name }}</td>
										<td>{{ $event->display_start_date }} @ {{ $event->display_start_time }}</td>
										<td>${{ $price }}</td>
										<td>
											{!! Form::open(['route' => ['cart', $event->id], 'method' => "GET", 'id' => 'cart_form']) !!}	
												@php
													$qualities	= [];
													for ($i=1; $i <= $event->pax_max; $i++) { 
														$qualities[$i] = $i;
													}
												@endphp
												{!! Form::select('quantity', $qualities, $quantity, ['class' => 'form-control', 'onChange' => 'this.form.submit()']) !!}
											{!! Form::close() !!}
										</td>
										<td>${{ $subtotal }}</td>
									</tr>
									<tr>
										<td colspan="5" class="text-right font-weight-bold">
											Total
										</td>
										<td class="font-weight-bold">
											${{ $subtotal }}
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer text-right">
						{!! Form::open(['route' => ['checkout', $event->id], 'method' => 'GET', 'id' => 'checkout_form']) !!}
							{!! Form::hidden('quantity', $quantity) !!}
							<button type="submit" class="btn btn-primary" form="checkout_form">Checkout</button>
						{!! Form::close() !!}
					</div>
				</div>
        </div>
    </div>
</div>
@endsection
