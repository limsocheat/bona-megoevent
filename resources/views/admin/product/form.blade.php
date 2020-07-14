<div class="form-group">
	{!! Form::label('name', 'Name') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('new_image', 'Image') !!}
		<div class="mego-image-upload-preview-wrapper">
			<img id="mego-image-previewer" class="mego-image-upload-preview-img"
				src="{{ @$product ? asset($product->image_url) : asset('/images/event_feature_image_placeholder.png') }}" />
			<div class="logo-upload-button" id="mego-image-chooser">
				<i class="fa fa-arrow-circle-up d-none" aria-hidden="true"></i>
			</div>
		</div>
	 {!! Form::file('new_image', ['id' => 'mego-image-uploader', 'style' => 'display: none;']) !!}
</div>
<div class="form-group">
	{!! Form::label('category_id', 'Category') !!}
	{!! Form::select('category_id', $categories, null, ['placeholder' => 'Select', 'class' => 'form-control'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('price', 'Price') !!}
	{!! Form::text('price', null, ['class' => 'form-control','id' => 'digitsOnly']) !!}
</div>

<div class="form-group">
	{!! Form::label('quantity', 'Quantity') !!}
	{!! Form::text('quantity', null, ['class' => 'form-control','id' => 'digitsOnly']) !!}
</div>

<div class="form-group">
	{!! Form::label('color', 'Color') !!}
	{!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'Description') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
