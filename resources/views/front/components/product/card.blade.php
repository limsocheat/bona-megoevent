<div class="card event-card" id="card-product">
  <div class="card-title pt-3 mb-0">
    <a href="{{ route('show.product', $product->id) }}" class="text-decoration-none">
      <h4 class="ml-5 mr-5 mb-0 font-weight-bold text-truncate ">{{$product->name}}</h4>
    </a>
  </div>
  <div class="card-horizontal">

    <div class="img-square-wrapper">
      <a href="{{ route('show.product', $product->id) }}"><img class="" src="{{$product->image_url}}"
          alt="Card image cap"></a>
    </div>
    <div class="card-body p-0" id="card-texts">
      <a href="{{ route('show.product', $product->id) }}">
        <h4 class="card-price">${{$product->price}}</h4>
        <p class="card-text">In Stock</p>
      </a>
    </div>
    <div class="add-to-cart">
	  {!! Form::open(['route' => ['cart.add', $product->id], 'method' => 'POST']) !!}
		     {!! Form::submit('Add To Cart', ['class' => 'btn btn-primary p-1']) !!}
      {!! Form::close() !!}
    </div>
  </div>
</div>
