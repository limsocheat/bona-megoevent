@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Exhibitor</h1>
@stop

@section('content')
<div class="card">
    {!! Form::model($exhibitor,['route' => ['admin.exhibitor.update',$exhibitor->id], 'method' => 'PUT','enctype'=>'multipart/form-data']) !!}
          @csrf
        <div class="card-body">
             <div class="form-group">
                {!! Form::label('first_name', 'Frist Name') !!}
                {!! Form::text('first_name', null, ['placeholder' => 'first_name', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('last_name', 'Last Name') !!}
                {!! Form::text('last_name', null, ['placeholder' => 'last_name', 'class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('new_image', 'Logo :') !!}
               <input name="new_image" type="file" id="new_image" />
                <img id="imagePreview" class="rounded mx-auto" src="{{ asset($exhibitor->logo) }}" alt="" style="width:200px;height:200px">
            </div>
			<div class="form-group">
                {!! Form::label('phone', 'Phone') !!}
                {!! Form::text('phone', null, ['placeholder' => 'phone', 'class' => 'form-control']) !!}
            </div>
    
			<div class="form-group">
                {!! Form::label('address', 'Address') !!}
                {!! Form::text('address', null, ['placeholder' => 'address', 'class' => 'form-control']) !!}
			</div>
			 <div class="form-group">
                {!! Form::label('active', 'Active') !!}
                {!! Form::text('active', null, ['placeholder' => 'description', 'class' => 'form-control']) !!}
            </div>
            {{-- <div>
                <div class="form-group">
                   <h5 class="text-primary">Create User</h5>
                </div>
            </div>
          <div class="form-group">
                {!! Form::label('name', 'User Name') !!}
                {!! Form::text('name', null, ['placeholder' => 'user name', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'E-Mail Address') !!}
                {!! Form::email('email', null, ['placeholder' => 'enter email address', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <small id="passwordHelp" class="form-text text-muted">Leave empty to keep unchanged.</small>
            </div> --}}

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
