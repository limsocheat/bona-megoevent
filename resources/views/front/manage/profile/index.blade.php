@extends('layouts.app')

@section('title', 'Profile')
@section('content')

<style>
    .avatar-wrapper {
        position: relative;
        height: 100px;
        width: 100px;
        float:right;
        margin:50px auto;
        border-radius: 50%;
        overflow: hidden;
        /* box-shadow: 1px 1px 15px -5px black; */
        transition: all .3s ease;
    }

    .profile-pic {
        height: 100%;
        width: 100%;
        transition: all .3s ease;
    }

    .profile-pic:after {
        content: "";
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        font-size: 90px;
        background: #ecf0f1;
        color: #34495e;
        text-align: center;

    }

    .upload-button {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }

   .fa-cloud-upload-alt {
        position: absolute;
        font-size: 1px;
        top: 0;
        left: 0;
        text-align: center;
        opacity: 0;
        transition: all .3s ease;
        color: #34495e;
    }
</style>

<div class="container py-4">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <div class="card">
                {!! Form::model($user, ['route' => ['manage.profile.update'], 'method' => 'PUT']) !!}
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('name', 'User Name') !!}
                        {!! Form::text('name', null, ['placeholder' => 'user name', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-Mail Address') !!}
                        {!! Form::email('email', null, ['placeholder' => 'enter email address', 'class' =>
                        'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('type', 'Type') !!}
                        {!! Form::select('type', ['individual' => 'Individual', 'company' => 'Company'], null,
                        ['placeholder' => 'select', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                        <small id="passwordHelp" class="form-text text-muted">Leave empty to keep unchanged.</small>
                    </div>
                </div>
                <div class="card-footer ">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="col-md-6">

            <div class="card">
                {!! Form::open(['route' => ['manage.profile.update'], 'method' => 'PUT']) !!}
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('first_name', 'First Name') !!}
                        {!! Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control'])
                        !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('last_name', 'Last Name') !!}
                        {!! Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('avatar', 'User Avatar') !!}
                        {!! Form::text('avatar', null, ['placeholder' => 'User Avatar', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group rounded" style="height: 100px;">
                        {!! Form::label('avatar', 'Avatar') !!}
                        <div class="avatar-wrapper">
                            {{-- <img class="profile-pic" src="" /> --}}
                            <img class="profile-pic rounded mx-auto" src="{{ asset('upload/') }}" alt="" style="height:100px">
                            <div class="upload-button">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <input class="file-upload" type="file" accept="image/*" />
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('job_title', 'Job Title') !!}
                        {!! Form::text('job_title', null, ['placeholder' => 'Job Title', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('country_id', 'Country') !!}
                        {!! Form::select('country_id', $countries, null, ['placeholder' => 'Country', 'class' =>
                        'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Address') !!}
                        {!! Form::text('address', null, ['placeholder' => 'Address', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone', 'Tel') !!}
                        {!! Form::text('phone', null, ['placeholder' => 'Tel', 'class' => 'form-control']) !!}
                    </div>
                    {{-- <div class="form-group">
                            {!! Form::label('type', 'Type') !!}
                            {!! Form::select('type', ['individual' => 'Individual', 'company' => 'Company'], null, ['placeholder' => 'select', 'class' => 'form-control']) !!}
                        </div> --}}
                    {{-- <div class="form-group">
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

            @if ($user->type == "company")

            @if ($user->company)
            <div class="card">
                {!! Form::model($user->company, ['route' => ['manage.company.update', $user->company->id], 'method' =>
                'PUT']) !!}
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('name', 'Company Name') !!}
                        {!! Form::text('name', null, ['placeholder' => 'company name', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('registration_number', 'Registration Number') !!}
                        {!! Form::text('registration_number', null, ['placeholder' => 'xxxxxxxx', 'class' =>
                        'form-control']) !!}
                    </div>
                </div>
                <div class="card-footer ">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
                </div>
                {!! Form::close() !!}
            </div>
            @else
            <div class="card">
                {!! Form::open(['route' => ['manage.company.store'], 'method' => 'POST']) !!}
                <div class="card-body">
                    <div class="form-group">
                        {!! Form::label('name', 'Company Name') !!}
                        {!! Form::text('name', null, ['placeholder' => 'company name', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('registration_number', 'Registration Number') !!}
                        {!! Form::text('registration_number', null, ['placeholder' => 'xxxxxxxx', 'class' =>
                        'form-control']) !!}
                    </div>
                </div>
                <div class="card-footer ">
                    {!! Form::submit('Create', ['class' => 'btn btn-primary']); !!}
                </div>
                {!! Form::close() !!}
            </div>
            @endif
            @endif
        </div>

    </div>

</div>
<script>
    $(document).ready(function() {
    
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }   
        
        $(".file-upload").on('change', function(){
        readURL(this);
        });
        
        $(".upload-button").on('click', function() {
        $(".file-upload").click();
        });
    });
</script>
@endsection