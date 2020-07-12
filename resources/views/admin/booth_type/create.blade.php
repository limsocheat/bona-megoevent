@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Booth Type</h1>
@stop

@section('content')
<div class="card">
    {!! Form::open(['route' => ['admin.booth_type.store'], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['placeholder' => 'name', 'class' => 'form-control']) !!}
			</div>
			
         	<div class="form-group">
                {!! Form::label('pricing', 'Pricing') !!}
                {!! Form::text('pricing', null, ['placeholder' => 'Pricing', 'class' => 'form-control','id' => 'digitsOnly']) !!}
			</div>

			<div class="form-group">
                {!! Form::label('total', 'Total Per Event') !!}
                {!! Form::text('total', null, ['placeholder' => 'Total Per Event', 'class' => 'form-control','id' => 'digitsOnly']) !!}
            </div>

            <div class="form-group">
				{!! Form::label('new_image', ' Booth Image :') !!}
               <input name="new_image" type="file" id="new_image" />
                <img id="imagePreview" class="rounded mx-auto" src="{{ asset('upload/camera.png') }}" alt="" style="height:200px">
            </div>
            
            <div class="form-group">
                 {!! Form::label('vip_speech', 'Vip Speech :') !!}
                 {{ Form::select('vip_speech', ['Yes' => 'Yes', 'No' => 'No'], null, ['placeholder' => 'Select','class' => 'form-control']) }}
             </div>

             <div class="form-group">
                 {!! Form::label('vip_moderator', 'Vip Moderator:') !!}
                 {{ Form::select('vip_moderator', ['Yes' => 'Yes', 'No' => 'No'], null, ['placeholder' => 'Select','class' => 'form-control']) }}
             </div>

             <div class="form-group">
                {!! Form::label('ads_event', 'Banner Ads on Event Front Page') !!}
                {!! Form::number('ads_event', null, ['placeholder' => 'Banner Ads on Event Front Page', 'class' => 'form-control','id' => 'digitsOnly']) !!}
            </div>
            
             <div class="form-group">
                {!! Form::label('banner_ads_homepage', 'Banner Ads on Homepage') !!}
                {!! Form::number('banner_ads_homepage', null, ['placeholder' => 'Banner Ads on Homepage', 'class' => 'form-control','id' => 'digitsOnly']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('number_products', 'Number of Products') !!}
                {!! Form::text('number_products', null, ['placeholder' => 'Number of Products', 'class' => 'form-control','id' => 'digitsOnly']) !!}
            </div>

            <div class="form-group">
                 {!! Form::label('auction', 'Auction :') !!}
                 {{ Form::select('auction', ['Yes' => 'Yes', 'No' => 'No'], null, ['placeholder' => 'Select','class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {!! Form::label('leads', 'Leads') !!}
                {!! Form::text('leads', null, ['placeholder' => 'Leads', 'class' => 'form-control','id' => 'digitsOnly']) !!}
            </div>

            <div class="form-group">
                 {!! Form::label('live_chat', 'Live Chat:') !!}
                 {{ Form::select('live_chat', ['Yes' => 'Yes', 'No' => 'No'], null, ['placeholder' => 'Select','class' => 'form-control']) }}
            </div>

            <div class="form-group">
                 {!! Form::label('surveys', 'Surveys :') !!}
                 {{ Form::select('surveys', ['Yes' => 'Yes', 'No' => 'No'], null, ['placeholder' => 'Select','class' => 'form-control']) }}
            </div>

			<div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::text('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}
            </div>
           
        </div>
        <div class="card-footer ">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
        </div>
    {!! Form::close() !!}
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery('#digitsOnly').keypress(function(event){
	if(event.which !=8 && isNaN(String.fromCharCode(event.which))){
		event.preventDefault();
	}
		console.log(event.which);

    });
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
    })
</script>
@stop
