  <div class="card event-card mb-4" id="card-product">
        <div class="card-title pt-3 mb-0">
        <h4 class="ml-5 mr-5 mb-0 font-weight-bold text-truncate">{{$product->name}}</h4>
        </div>
        <div class="card-horizontal">
            <div class="img-square-wrapper">
            <img class="" src="{{$product->image_url}}"
                    alt="Card image cap">
            </div>
            <div class="card-body p-0" id="card-texts">
              <h4 class="card-price">${{$product->price}}</h4>
                <p class="card-text">In Stock</p>
            </div>
            <div class="add-to-cart">
                <a href="#" class="btn btn-primary p-1">Add to Cart</a>
            </div>
        </div>
    </div>
    
     