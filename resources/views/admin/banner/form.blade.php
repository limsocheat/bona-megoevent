<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('link', 'Link') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('new_image', 'Image') !!}
    <div class="mego-image-upload-preview-wrapper">
        <img id="mego-image-previewer" class="mego-image-upload-preview-img"
            src="{{ @$banner ? asset($banner->image_url) : asset('/images/event_feature_image_placeholder.png') }}" />
        <div class="logo-upload-button" id="mego-image-chooser">
            <i class="fa fa-arrow-circle-up d-none" aria-hidden="true"></i>
        </div>
        {!! Form::file('new_image', ['id' => 'mego-image-uploader', 'style' => 'display: none;']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('location', 'Location :') !!}
    {{ Form::select('location', ['header' => 'header', 'subheader1' => 'subheader1', 'subheader2' => 'subheader2'], null, ['id' => 'location','class' => 'form-control']) }}
</div>