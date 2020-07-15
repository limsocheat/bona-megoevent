<div class="form-group">
	{!! Form::label('name', 'Name') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('pricing', 'Pricing') !!}
	{!! Form::text('pricing', null, ['class' => 'form-control','id' =>
	'digitsOnly']) !!}
</div>

<div class="form-group">
	{!! Form::label('total', 'Total Per Event') !!}
	{!! Form::number('total', null, ['class' => 'form-control','id' =>
	'digitsOnly']) !!}
</div>

<div class="form-group">
    {!! Form::label('new_image', 'Booth Image') !!}
    <div class="mego-image-upload-preview-wrapper">
        <img id="mego-image-previewer" class="mego-image-upload-preview-img"
            src="{{ @$booth_type ? asset($booth_type->image_url) : asset('/images/event_feature_image_placeholder.png') }}" />
        <div class="logo-upload-button" id="mego-image-chooser">
            <i class="fa fa-arrow-circle-up d-none" aria-hidden="true"></i>
        </div>
        {!! Form::file('new_image', ['id' => 'mego-image-uploader', 'style' => 'display: none;']) !!}
    </div>
</div>

<div class="form-group">
	{!! Form::label('vip_speech', 'Vip Speech :') !!}
	{{ Form::select('vip_speech', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{!! Form::label('vip_moderator', 'Vip Moderator:') !!}
	{{ Form::select('vip_moderator', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{!! Form::label('ads_event', 'Banner Ads on Event Front Page') !!}
	{!! Form::number('ads_event', null, ['class' =>
	'form-control','id' => 'digitsOnly']) !!}
</div>

<div class="form-group">
	{!! Form::label('banner_ads_homepage', 'Banner Ads on Homepage') !!}
	{!! Form::number('banner_ads_homepage', null, ['class' =>
	'form-control','id' => 'digitsOnly']) !!}
</div>

<div class="form-group">
	{!! Form::label('number_products', 'Number of Products') !!}
	{!! Form::text('number_products', null, ['class' =>
	'form-control','id' => 'digitsOnly']) !!}
</div>

<div class="form-group">
	{!! Form::label('auction', 'Auction :') !!}
	{{ Form::select('auction', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{!! Form::label('leads', 'Leads') !!}
	{!! Form::text('leads', null, ['class' => 'form-control','id' => 'digitsOnly'])
	!!}
</div>

<div class="form-group">
	{!! Form::label('live_chat', 'Live Chat:') !!}
	{{ Form::select('live_chat', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{!! Form::label('surveys', 'Surveys :') !!}
	{{ Form::select('surveys', ['Yes' => 'Yes', 'No' => 'No'], null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	{!! Form::label('description', 'Description') !!}
	{!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>