<div class="form-group">
	{!! Form::label('first_name', 'Frist Name') !!}
	{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('last_name', 'Last Name') !!}
	{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('new_image', 'Image') !!}
    <div class="mego-image-upload-preview-wrapper">
        <img id="mego-image-previewer" class="mego-image-upload-preview-img"
            src="{{ @$exhibitor ? asset($exhibitor->image_url) : asset('/images/event_feature_image_placeholder.png') }}" />
        <div class="logo-upload-button" id="mego-image-chooser">
            <i class="fa fa-arrow-circle-up d-none" aria-hidden="true"></i>
        </div>
        {!! Form::file('new_image', ['id' => 'mego-image-uploader', 'style' => 'display: none;']) !!}
    </div>
</div>
<div class="form-group">
	{!! Form::label('phone', 'Phone') !!}
	{!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('address', 'Address') !!}
	{!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('active', 'Active') !!}
	{!! Form::select('active', [true => 'Active', false => 'Inactive'], null, [ 'class' => 'form-control']) !!}
</div>