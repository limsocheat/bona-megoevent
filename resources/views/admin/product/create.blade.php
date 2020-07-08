@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Product</h1>
@stop

@section('content')
<div class="card">
    {!! Form::open(['route' => ['admin.product.store'], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
          @csrf
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>

			<div class="form-group">
				{!! Form::label('new_image', 'Logo :') !!}
               <input name="new_image" type="file" id="new_image" />
                <img id="imagePreview" class="rounded mx-auto" src="{{ asset('upload/camera.png') }}" alt="" style="width:200px;height:200px">
            </div>

             <div class="form-group">
                        {!! Form::label('category_id', 'Category') !!}
                        {!! Form::select('category_id', $categories, null, ['placeholder' => 'Select', 'class' => 'form-control']) !!}
             </div>

			<div class="form-group">
                {!! Form::label('price', 'Price') !!}
                {!! Form::text('price', null, ['placeholder' => 'Price', 'class' => 'form-control','id' => 'digitsOnly']) !!}
            </div>
    
			<div class="form-group">
                {!! Form::label('quantity', 'Quantity') !!}
                {!! Form::text('quantity', null, ['placeholder' => 'Quantity', 'class' => 'form-control','id' => 'digitsOnly']) !!}
            </div>
            
             <div class="form-group">
                {!! Form::label('color', 'Color') !!}
                {!! Form::text('color', null, ['placeholder' => 'color', 'class' => 'form-control']) !!}
            </div>

			 <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}
            </div>
           
        </div>
         
        <div class="card-footer ">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
        </div>
    {!! Form::close() !!}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $("#new_image").change(function() {
            readURL(this);
        });
    });
    jQuery('#digitsOnly').keypress(function(event){
	if(event.which !=8 && isNaN(String.fromCharCode(event.which))){
		event.preventDefault();
	}
		console.log(event.which);

    });
</script>
@stop
