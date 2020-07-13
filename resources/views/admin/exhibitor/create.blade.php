@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Exhibitor</h1>
@stop

@section('content')
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
<div class="card">
    {!! Form::open(['route' => ['admin.exhibitor.store'], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
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
                <img id="imagePreview" class="rounded mx-auto" src="{{ asset('upload/camera.png') }}" alt="" style="width:200px;height:200px">
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
                {!! Form::select('active', [true => 'Active', false => 'Inactive'], null, [ 'class' => 'form-control']) !!}
            </div>
            <div>
                <div class="form-group">
                   <h5 class="text-primary">Create User</h5>
                </div>
            </div>
            <div class="form-group row">
                    <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>
                    <div class="col-md-12">
                         <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                         @error('name')
                           <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                           </span>
                          @enderror
               </div>
             </div>
             <div class="form-group row">
                            <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                         @enderror
                </div>
            </div>
             <div class="form-group row">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
              </div>
              <div class="form-group row">
                            <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                       </div>
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
