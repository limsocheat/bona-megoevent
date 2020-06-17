@extends('layouts.app')

@section('title', 'Check Out')

@section('content')
 <div class="container py-5">
  <div class="row">
    {{-- <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Product name</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$12</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Second product</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$8</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Third item</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$20</strong>
        </li>
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div> --}}
    <div class="col-md-12 order-md-1">
			
			<div class="row">
				@if (\Session::has('error'))
					<div class="alert alert-danger">
						{!! \Session::get('error') !!}
					</div>
				@endif
				<div class="col-md-6">
					{!! Form::model($user, ['route' => 'manage.profile.update', 'method' => 'PUT']) !!}
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
												{!! Form::text('profile[first_name]', null, ['placeholder' => 'enter first name', 'class' => 'form-control']) !!}
											</div>
										</div>
										<div class="col-md-6 mb-3">
											<div class="form-group">
												{!! Form::label('profile[last_name]', 'Last Name') !!}
												{!! Form::text('profile[last_name]', null, ['placeholder' => 'enter last name', 'class' => 'form-control']) !!}
											</div>
										</div>
									</div>

									<div class="mb-3">
										<div class="form-group">
											{!! Form::label('profile[address]', 'Address') !!}
											{!! Form::text('profile[address]', null, ['placeholder' => 'enter address', 'class' => 'form-control']) !!}
										</div>
									</div>
									<div class="mb-3">
										<div class="form-group">
											{!! Form::label('profile[phone]', 'Phone') !!}
											{!! Form::text('profile[phone]', null, ['placeholder' => 'Phone Number', 'class' => 'form-control']) !!}
										</div>
									</div>
									<div class="mb-3">
										<div class="form-group">
											{!! Form::label('email', 'E-Mail') !!}
											{!! Form::email('email', null, ['placeholder' => 'enter email', 'class' => 'form-control']) !!}
										</div>
									</div>
								</div>
							</div>
						</div>	
					{!! Form::close() !!}
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
											<td>{{ $event->start_date }} {{ $event->start_time }}</td>
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
					{!! Form::open(['route' => ['manage.purchase.store'], 'method' => 'POST']) !!}
						  {!! Form::hidden('event_id', $event->id) !!}
						  {!! Form::hidden('quantity', $quality) !!}
						<button class="btn btn-primary btn-lg btn-block" type="submit">checkout</button>
	    			{!! Form::close() !!}
				</div>
			</div>	
    </div>
 
</div>
@endsection
