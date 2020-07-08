@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="row">
        <div class="col-md-6">
            <h1 class="float-left">Edit Event</h1>
            <div class="btn {{ $event->status == 'published' ? 'btn-success' : 'btn-outline-primary'  }} float-left ml-5">{{ $event->status }}</div>
        </div>
        <div class="col-md-6 text-right">
            @if ($event->payment)
                You have paid <strong>{{ Money::SGD($event->payment->total) }}</strong>
            @else
                <a href="{{ route('manage.event_payment.create') }}?event_id={{ $event->id }}" class="btn btn-primary">Make Payment & Publish</a>
            @endif
        </div>
        @if ($event->readonly)
            <div class="col-md-12">
                <div class="alert alert-info">
                    You have made payment & published this event! Some fields will be disable.
                </div>
            </div>
        @endif
    </div>

    <style>
        .entry:not(:first-of-type)
        {
            margin-top: 10px;
        }
        .company-wrapper{
            position: relative;
            height: 141px;
            width: 358px;
            overflow: hidden;
            transition: all .3s ease;
        }
        .company-wrapper:hover #preview-logo-pic {
            opacity: .5;
        }
        .company-wrapper #preview-logo-pic {
            height: 100%;
            width: 100%;
            transition: all .3s ease;
        
        }
        
        .company-wrapper #preview-logo-pic:after {
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
        
        .company-wrapper .logo-upload-button {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }
    </style>

    {!! Form::model($event, ['route' => ['manage.event.update', $event->id], 'method' => 'PUT', 'files' => true]) !!}

    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item ">
                    <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="home" aria-selected="true">Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="image-tab" data-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="false">Image & Video</a>
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
                    <a class="nav-link" id="schedule-venue-tab" data-toggle="tab" href="#schedule-venue" role="tab" aria-controls="schedule-venue" aria-selected="false">Schedule & Venue</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                    
                    <div class="form-group">
                        {!! Form::label('name', 'Event Name') !!}
                        {!! Form::text('name', null, ['placeholder' => 'Event Name', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('type_id', 'Type') !!}
                        {!! Form::select('type_id', $types, null, ['placeholder' => 'Select', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id', 'Category') !!}
                        {!! Form::select('category_id', $categories, null, ['placeholder' => 'Select', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('location_id', 'Event Location') !!}
                        {!! Form::select('location_id', $event_locations, null, ['placeholder' => 'Select', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="tab-pane" id="image" role="tabpanel" aria-labelledby="image-tab">
                    <div class="row">
{{-- 
                        <div class="col-md-12 pt-3">
                            <label class="active">Feature Image</label>
                            <button type="button" class="btn btn-gold btn-gold mb-2" id="feature-image-chooser">Choose Image</button>
                            {!! Form::file('image', ['id' => 'feature-image-uploader', 'style' => 'display: none;']) !!}
                        </div>

                        <div class="col-md-12">
                            <img src="{{ $event->imageUrl ? $event->imageUrl : asset('/images/event_feature_image_placeholder.png') }}" id="feature-image-previewer" alt="Feature Image Previewer">
                        </div> --}}
                        <div class="col-md-12 pt-3">
                            <label class="active">Feature Image</label>
                            <div class="form-group mb-3">
                                <div class="company-wrapper" id="profile-preview">
                                    {{-- <img id="feature-image-previewer" class="preview-img"
                                        src="{{  asset('/images/event_feature_image_placeholder.png') }}" alt="Preview Image" width="358"
                                        height="141" /> --}}
                                        <img src="{{ $event->imageUrl ? $event->imageUrl : asset('/images/event_feature_image_placeholder.png') }}"
                                            id="feature-image-previewer" alt="Feature Image Previewer" width="358"
                                            height="141">
                                    <div class="logo-upload-button" id="feature-image-chooser">
                                        <i class="fa fa-arrow-circle-up d-none" aria-hidden="true"></i>
                                    </div>
                                    {!! Form::file('image', ['id' => 'feature-image-uploader', 'style' => 'display: none;']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pt-3">
                            <div class="input-field">
                                <label class="active">Banners</label>
                                <div class="banners-uploader" style="padding-top: .5rem;"></div>
                            </div>
                        </div>

                        {{-- <div class="col-md-12 pt-3">
                            <label class="active">Floor Plan</label>
                            <button type="button" class="btn btn-gold btn-gold mb-2" id="floor-plan-image-chooser">Choose Image</button>
                            {!! Form::file('floor_plan_image', ['id' => 'floor-plan-image-uploader', 'style' => 'display: none;']) !!}
                        </div>
                        <div class="col-md-12">
                            <img src="{{ $event->floorImage ? $event->floorImage : asset('/images/event_feature_image_placeholder.png') }}"
                                id="floor-plan-image-previewer" alt="Feature Image Previewer">
                        </div> --}}
                        <div class="col-md-12 pt-3">
                            <label class="active">Floor Plan</label>
                            <div class="form-group mb-3">
                                <div class="company-wrapper" id="profile-preview">
                                    <img src="{{ $event->floorImage ? $event->floorImage : asset('/images/event_feature_image_placeholder.png') }}"
                                        id="floor-plan-image-previewer" alt="Feature Image Previewer" width="358" height="141">
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
                                @foreach ($event->videos as $video)
                                    <div class="entry input-group col-xs-3">
                                        <input class="form-control" name="videos[]" value="{{ $video->url }}" type="text" placeholder="video url" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger btn-remove" type="button">
                                                <span class="fa fa-minus"></span>
                                            </button>
                                        </span>
                                    </div>
                                @endforeach
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('start_date', 'Start Date') !!}
                                {!! Form::date('start_date', null, ['placeholder' => 'Start Date', 'class' => 'form-control', 'id' => 'StartDate', 'readonly' => $event->readonly]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('start_time', 'Start Time') !!}
                                {!! Form::time('start_time', null, ['placeholder' => 'Start Time', 'class' => 'form-control', 'readonly' => $event->readonly]) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('end_date', 'End Date') !!}
                                {!! Form::date('end_date', null, ['placeholder' => 'End Date', 'class' => 'form-control', 'id' => 'EndDate', 'readonly' => $event->readonly]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('end_time', 'End Time') !!}
                                {!! Form::time('end_time', null, ['placeholder' => 'End Time', 'class' => 'form-control', 'readonly' => $event->readonly]) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('early_bird_date', 'Early Bird Last Date') !!}
                                {!! Form::date('early_bird_date', null, ['placeholder' => 'Early Bird Last Date', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="booth" role="tabpanel" aria-labelledby="booth-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('diamond_max', 'Diamond Pax') !!}
                                {!! Form::number('diamond_max', null, ['placeholder' => 'Diamond Pax', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('gold_max', 'Gold Pax') !!}
                                {!! Form::number('gold_max', null, ['placeholder' => 'Gold Pax', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('silver_max', 'Silver Pax') !!}
                                {!! Form::number('silver_max', null, ['placeholder' => 'Silver Pax', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('bronze_max', 'Bronze Pax') !!}
                                {!! Form::number('bronze_max', null, ['placeholder' => 'Bronze Pax', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="tab-pane" id="fee" role="tabpanel" aria-labelledby="fee-tab">
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('pax_min', 'Min Pax') !!}
                                {!! Form::number('pax_min', null, ['placeholder' => 'Min Pax', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('pax_max', 'Max Pax') !!}
                                {!! Form::number('pax_max', null, ['placeholder' => 'Max Pax', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('pax_min_last_date', 'Min Pax Last Date') !!}
                                {!! Form::number('pax_min_last_date', null, ['placeholder' => 'Min Pax Last Date', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('price', 'Event Price') !!}
                                {!! Form::number('price', null, ['placeholder' => 'Event Price', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('early_bird_price', 'Early Bird Price') !!}
                                {!! Form::number('early_bird_price', null, ['placeholder' => 'Early Bird Price', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('group_price', 'Group Price Per Pax') !!}
                                {!! Form::number('group_price', null, ['placeholder' => 'Group Price Per Pax', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('group_min_pax', 'Group Price Minimum No of Pax') !!}
                                {!! Form::number('group_min_pax', null, ['placeholder' => 'Group Price Minimum No of Pax', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="schedule-venue" role="tabpanel" aria-labelledby="schedule-venue">
                    @include('front.components.event.tab.schedule_venue')
                </div>
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
        </div>
    </div>
        
    {!! Form::close() !!}
</div>

<script type="text/javascript">
    jQuery(document).ready(function($){

        var banners   = <?php echo json_encode($event->banners); ?>;
        var preloaded = [];
        banners.forEach((element, index) => {
            preloaded.push({id: element.id, src: "<?php echo asset('/upload/') ?>" +"/"+ element.image});
        });

        $('.banners-uploader').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'images',
            preloadedInputName: 'old'
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
