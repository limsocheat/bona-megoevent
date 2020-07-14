<div class="form-group">
	{!! Form::label('title', 'Title') !!}
	{!! Form::text('title', null, [ 'class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('sub_title', 'Sub Title') !!}
	{!! Form::text('sub_title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('new_image', 'Image') !!}
		<div class="mego-image-upload-preview-wrapper">
			<img id="mego-image-previewer" class="mego-image-upload-preview-img"
				src="{{ @$slide ? asset($slide->image_url) : asset('/images/event_feature_image_placeholder.png') }}" />
			<div class="logo-upload-button" id="mego-image-chooser">
				<i class="fa fa-arrow-circle-up d-none" aria-hidden="true"></i>
			</div>
		</div>
	{!! Form::file('new_image', ['id' => 'mego-image-uploader', 'style' => 'display: none;']) !!}
</div>
<div class="form-group">
	{!! Form::label('location', 'Location :') !!}
	{{ Form::select('location', ['fullscreen' => 'fullscreen', 'thumbnail' => 'thumbnail'], null, ['id' => 'location','class' => 'form-control']) }}
</div>