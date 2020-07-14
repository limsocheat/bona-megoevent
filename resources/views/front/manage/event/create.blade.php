@extends('front.manage.layout.index')

@section('title', 'Events')

@section('content_profile')
<div class="col-md-10" style="margin-top: -25px">
    <div class="container py-4">
        <h1 class="pb-3">Create Event</h1>

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Sorry!</strong> Please check your input again.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!! Form::open(['route' => 'manage.event.store', 'method' => "POST", 'files' => true]) !!}
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab"
                            aria-controls="home" aria-selected="true">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="image-tab" data-toggle="tab" href="#image" role="tab"
                            aria-controls="image" aria-selected="false">Image & Video</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="date-tab" data-toggle="tab" href="#date" role="tab" aria-controls="date"
                            aria-selected="false">Date and Time</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="booth-tab" data-toggle="tab" href="#booth" role="tab"
                            aria-controls="booth" aria-selected="false">Booth</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="fee-tab" data-toggle="tab" href="#fee" role="tab" aria-controls="fee"
                            aria-selected="false">Fee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="venue-tab" data-toggle="tab" href="#venue" role="tab"
                            aria-controls="venue" aria-selected="false">Venue</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                        @include('front.components.event.tab.detail')
                    </div>

                    <div class="tab-pane " id="image" role="tabpanel" aria-labelledby="image-tab">
                        <div class="row">

                            <div class="col-md-12 pt-3">
                                <label class="active">Feature Image</label>
                                <div class="form-group mb-3">
                                    <div class="preview-wrapper" id="profile-preview">
                                        <img id="feature-image-previewer" class="preview-img"
                                            src="{{  asset('/images/event_feature_image_placeholder.png') }}"
                                            alt="Preview Image" width="358" height="141" />
                                        <div class="logo-upload-button" id="feature-image-chooser">
                                            <i class="fa fa-arrow-circle-up d-none" aria-hidden="true"></i>
                                        </div>
                                        {!! Form::file('image', ['id' => 'feature-image-uploader', 'style' => 'display:
                                        none;']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-field">
                                    <label class="active">Banners</label>
                                    <div class="input-images-1" style="padding-top: .5rem;"></div>
                                </div>
                            </div>
                            <div class="col-md-12 pt-3">
                                <label class="active">Floor Plan</label>
                                <div class="form-group mb-3">
                                    <div class="preview-wrapper" id="profile-preview">
                                        <img src="{{  asset('/images/event_feature_image_placeholder.png') }}"
                                            id="floor-plan-image-previewer" alt="Preview Image" width="358"
                                            height="141">
                                        <div class="logo-upload-button" id="floor-plan-image-chooser">
                                            <i class="fa fa-arrow-circle-up d-none" aria-hidden="true"></i>
                                        </div>
                                        {!! Form::file('floor_plan_image', ['id' => 'floor-plan-image-uploader', 'style'
                                        =>
                                        'display: none;']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 pt-3">
                                <label class="active">Videos</label>
                                <div class="controls">
                                    <div class="entry input-group col-xs-3">
                                        <input class="form-control" name="videos[]" type="text"
                                            placeholder="video url" />
                                        <span class="input-group-btn">
                                            <button class="btn mego-gold-bg btn-add" id="btn-gold" type="button">
                                                <span class="fa fa-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="date" role="tabpanel" aria-labelledby="date-tab">
                        @include('front.components.event.tab.date_time')
                    </div>
                    <div class="tab-pane" id="booth" role="tabpanel" aria-labelledby="booth-tab">
                        @include('front.components.event.tab.booth')
                    </div>
                    <div class="tab-pane" id="fee" role="tabpanel" aria-labelledby="fee-tab">
                        @include('front.components.event.tab.fee')
                    </div>

                    <div class="tab-pane" id="venue" role="tabpanel" aria-labelledby="venue-tab">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::label('venue_id', 'Venue Block') !!}
                                {!! Form::select('venue_id', $venues, null, ['class' =>
                                'form-control']) !!}
                            </div>
                            <div class="col-md-12">
                                {!! Form::label('venue_level', 'Venue Level') !!}
                                {!! Form::select('venue_level', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], null,
                                ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn mego-gold-bg']); !!}
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($){


        if( document.getElementById("feature-image-uploader").files.length == 0 ){
            $(':input[type="submit"]').prop('disabled', true);
        } else {
            $(':input[type="submit"]').prop('disabled', false);
        }

        $("#feature-image-uploader").change(function() {
            if( document.getElementById("feature-image-uploader").files.length == 0 ){
                $(':input[type="submit"]').prop('disabled', true);
            } else {
                $(':input[type="submit"]').prop('disabled', false);
            }
        })

        $('.input-images-1').imageUploader({
            imagesInputName: 'images',
        });

        $(document).on('click', '.btn-add', function(e)
        {
            e.preventDefault();

            var controlForm = $('.controls'),
                currentEntry = $(this).parents('.entry:first'),
                newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                .removeClass('btn-add').addClass('btn-remove')
                .removeClass('btn-success').addClass('btn-danger')
                .html('<span class="fa fa-minus"></span>');
        }).on('click', '.btn-remove', function(e)
        {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });

        $("#feature-image-chooser").click(function() {
            $("#feature-image-uploader").click();
        });

        $("#feature-image-uploader").change(function() {
            
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#feature-image-previewer').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });
        
        $("#floor-plan-image-chooser").click(function() {
            $("#floor-plan-image-uploader").click();
        });
        
        $("#floor-plan-image-uploader").change(function() {
        
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#floor-plan-image-previewer').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });

    });
</script>
@endsection