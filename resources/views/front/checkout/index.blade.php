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
      <h4 class="mb-3 font-weight-bold">Billing Address</h4>
      	{!! Form::open(['route' => ['admin.banner.store'], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
				<div class="row">
						<div class="col-md-6 mb-3">
							<div class="form-group">
								{!! Form::label('first_name', 'First Name') !!}
								{!! Form::text('first_name', null, ['placeholder' => 'enter first name', 'class' => 'form-control']) !!}
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<div class="form-group">
								{!! Form::label('last_name', 'Last Name') !!}
								{!! Form::text('last_name', null, ['placeholder' => 'enter last name', 'class' => 'form-control']) !!}
							</div>
						</div>
				</div>

				<div class="mb-3">
					<div class="form-group">
						{!! Form::label('address', 'Address') !!}
						{!! Form::text('address', null, ['placeholder' => 'enter address', 'class' => 'form-control']) !!}
					</div>
				</div>
				<div class="mb-3">
					<div class="form-group">
						{!! Form::label('tell', 'Tell') !!}
						{!! Form::text('tell', null, ['placeholder' => 'enter tell', 'class' => 'form-control']) !!}
					</div>
				</div>
				<div class="mb-3">
					<div class="form-group">
						{!! Form::label('email', 'E-Mail') !!}
						{!! Form::email('email', null, ['placeholder' => 'enter email', 'class' => 'form-control']) !!}
					</div>
				</div>
				<hr class="mb-4">
				<button class="btn btn-primary btn-lg btn-block" type="submit">checkout</button>
		
	    {!! Form::close() !!}
    </div>
 
</div>
@endsection
