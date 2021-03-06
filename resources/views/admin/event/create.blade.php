@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Event</h1>
@stop

@section('content')
<!-- Styles -->
<link type="text/css" rel="stylesheet" href="{{ asset('/plugins/image-uploader/image-uploader.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <h1 class="pb-3">Create Event</h1>

<style>
    .entry:not(:first-of-type){
        margin-top: 10px;
    }
    .btn-upload {
        border: 2px solid #C5B358;
        color: white;
        background-color: #C5B358;
    }
    .entry:not(:first-of-type) {
        margin-top: 10px;
    }
    .preview-wrapper{
        position: relative;
        height: auto;
        width: 900px;
        max-width: 100%;
        overflow: hidden;
        transition: all .2s ease;
    }
    .preview-wrapper img{
        height: auto;
        width: 900px;
        max-width: 100%;
    }
    .preview-wrapper:hover {
        transform: scale(1.02);
        cursor: pointer;
    }
    .preview-wrapper:hover #preview-logo-pic {
        opacity: .5;
    }
    .preview-wrapper #preview-logo-pic {
        height: 100%;
        width: 100%;
        transition: all .3s ease;
    
    }
    
    .preview-wrapper #preview-logo-pic:after {
        font-family: FontAwesome;
        content: "\f007";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        font-size: 300px;
        background: #ecf0f1;
        color: #34495e;
        text-align: center;
    }
    
    .preview-wrapper .logo-upload-button {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }
</style>
<div class="row">
    <div class="col-md-12">
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
    </div>
</div>
{!! Form::open(['route' => 'admin.event.store', 'method' => "POST", 'files' => true]) !!}
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="home" aria-selected="true">Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="image-tab" data-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="false">Image & Video</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="date-tab" data-toggle="tab" href="#date" role="tab" aria-controls="date" aria-selected="false">Date and Time</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="booth-tab" data-toggle="tab" href="#booth" role="tab" aria-controls="booth" aria-selected="false">Booth</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="fee-tab" data-toggle="tab" href="#fee" role="tab" aria-controls="fee" aria-selected="false">Fee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="venue-tab" data-toggle="tab" href="#venue" role="tab" aria-controls="venue"
                        aria-selected="false">Venue</a>
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
                                    <img src="{{  asset('/images/event_feature_image_placeholder.png') }}" id="feature-image-previewer"
                                        alt="Feature Image Previewer">
                                    <div class="logo-upload-button" id="feature-image-chooser">
                                        <i class="fa fa-arrow-circle-up d-none" aria-hidden="true"></i>
                                    </div>
                                    {!! Form::file('image', ['id' => 'feature-image-uploader', 'style' => 'display: none;']) !!}
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
                                    <img src="{{  asset('/images/event_feature_image_placeholder.png') }}" id="floor-plan-image-previewer"
                                        alt="Preview Image" width="358" height="141">
                                    <div class="logo-upload-button" id="floor-plan-image-chooser">
                                        <i class="fa fa-arrow-circle-up d-none" aria-hidden="true"></i>
                                    </div>
                                    {!! Form::file('floor_plan_image', ['id' => 'floor-plan-image-uploader', 'style' =>
                                    'display: none;']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-3">
                            <label class="active">Videos</label>
                            <div class="controls"> 
                                <div class="entry input-group col-xs-3">
                                    <input class="form-control" name="videos[]" type="text" placeholder="video url" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-success btn-add" type="button">
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
                            {!! Form::select('venue_id', $venues, null, ['placeholder' => 'Venue Block', 'class' =>
                            'form-control']) !!}
                        </div>
                        <div class="col-md-12">
                            {!! Form::label('venue_level', 'Venue Level') !!}
                            {!! Form::select('venue_level', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5], null,
                            ['placeholder' => 'Venue Level', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
        </div>
    </div>
            
{!! Form::close() !!}

@stop

@section('plugins.Datatables', true)

@section('js')
<script type="text/javascript" src="{{ asset('/plugins/image-uploader/image-uploader.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
   $(document).ready(function(){

        $('.input-images-1').imageUploader({
            imagesInputName: 'images',
        });

        $('#StartDate').datepicker({
            todayBtn:  1,
            autoclose: true,
            format: "yyyy-mm-dd"
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#EndDate').datepicker('setStartDate', minDate);
        });

        $('#EndDate').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        }).on('changeDate', function (selected) {
            var maxDate = new Date(selected.date.valueOf());
            $('#StartDate').datepicker('setEndDate', maxDate);
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