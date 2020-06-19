@extends('layouts.app')

@section('title', 'Check Out')

@section('content')
<div class="container py-5">
	<div class="row">
		<div class="col-md-12 order-md-1">

			<div class="row">
				@if (\Session::has('error'))
				<div class="alert alert-danger">
					{!! \Session::get('error') !!}
				</div>
				@endif
				<div class="col-md-6">
					{!! Form::model($user, ['route' => 'manage.purchase.store', 'method' => 'POST']) !!}
					<div class="card">
						<div class="card-header">
							<h4 class="font-weight-bold">Billing Address</h4>
						</div>
						<div class="card-body">
							<div class="card-text">
								<div class="row">
									<div class="col-md-6 mb-3">
										<div class="form-group">
											{!! Form::label('profile[first_name]', 'First Name') !!}
											{!! Form::text('profile[first_name]', null, ['placeholder' => 'enter first
											name', 'class' => 'form-control', 'readonly' => false]) !!}
										</div>
									</div>
									<div class="col-md-6 mb-3">
										<div class="form-group">
											{!! Form::label('profile[last_name]', 'Last Name') !!}
											{!! Form::text('profile[last_name]', null, ['placeholder' => 'enter last
											name', 'class' => 'form-control', 'readonly' => false]) !!}
										</div>
									</div>
								</div>

								<div class="mb-3">
									<div class="form-group">
										{!! Form::label('profile[address]', 'Address') !!}
										{!! Form::text('profile[address]', null, ['placeholder' => 'enter address',
										'class' => 'form-control', 'readonly' => false]) !!}
									</div>
								</div>
								<div class="mb-3">
									<div class="form-group">
										{!! Form::label('profile[phone]', 'Phone') !!}
										{!! Form::text('profile[phone]', null, ['placeholder' => 'Phone Number', 'class'
										=> 'form-control', 'readonly' => false]) !!}
									</div>
								</div>
								<div class="mb-3">
									<div class="form-group">
										{!! Form::label('email', 'E-Mail') !!}
										{!! Form::email('email', null, ['placeholder' => 'enter email', 'class' =>
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
							<h4 class="font-weight-bold">Your Order</h4>
						</div>
						<div class="card-body">
							<div class="card-text">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th scope="col">Event Name</th>
											<th scope="col">Date/Time</th>
											<th scope="col">Price</th>
											<th scope="col">Quantity</th>
											<th scope="col">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>{{ $event->name }}</td>
											<td>{{ $event->display_start_date }} @ {{ $event->display_start_time }}</td>
											<td>${{ $price }}</td>
											<td> {{ $quality }}</td>
											<td>${{ $subtotal }}</td>
										</tr>
										<tr>
											<td colspan="4" class="text-right font-weight-bold">
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
					</div>

					<p>&nbsp;</p>
					{!! Form::hidden('event_id', $event->id) !!}
					{!! Form::hidden('quantity', $quality) !!}
					<button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>

	</div>
	@endsection