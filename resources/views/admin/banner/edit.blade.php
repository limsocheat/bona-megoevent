@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Banner</h1>
@stop

@section('content')
<div class="card">
    {!! Form::model($banner,['route' => ['admin.banner.update',$banner->id], 'method' => 'PUT','enctype'=>'multipart/form-data']) !!}
          @csrf
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['placeholder' => 'name', 'class' => 'form-control']) !!}
            </div>
			<div class="form-group">
                {!! Form::label('link', 'Link') !!}
                {!! Form::text('link', null, ['placeholder' => 'link', 'class' => 'form-control']) !!}
			</div>
			<div class="form-group">
                
				{!! Form::label('new_image', 'Logo :') !!}
               <input name="new_image" type="file" id="new_image" />
                 <img id="imagePreview" class="rounded mx-auto" src="{{ asset('upload/'.$banner->image) }}" alt="" style="width:200px;height:200px">
            </div>
			<div class="form-group">
                {!! Form::label('location', 'Location :') !!}
                 {{ Form::select('location', ['header' => 'header', 'subheader1' => 'subheader1', 'subheader2' => 'subheader2'], null, ['id' => 'location','class' => 'form-control']) }}
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
    })
</script>
@stop
