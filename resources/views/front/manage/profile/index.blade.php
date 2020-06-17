@extends('layouts.app')

@section('title', 'Profile')
@section('content')

<style>
    .preview{
        padding: 10px;
        position: relative;
    }
    
    .preview i{
        color: white;
        font-size: 20px;
        transform: translate(7px,60px);
    }
    .preview-img{
        border-radius: 100%;
        box-shadow: 0px 0px 5px 2px rgba(0,0,0,0.7);
    }
    .browse-button{
        width: 100px;
        height: 100px;
        border-radius: 100%;
        position: absolute;
        top: 10px;
        left: 234px;
        background: linear-gradient(180deg, transparent, #6d6b6b);
        opacity: 0;
        transition: 0.3s ease;
    }
    
    .browse-button:hover{
        opacity: 1;
    }
    .browse-input{
        width: 100px;
        height: 100px;
        border-radius: 100%;
        transform: translate(-1px,-26px);
        opacity: 0;
    }
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                {!! Form::model($user, ['route' => ['manage.profile.update'], 'method' => 'PUT', 'files' => true]) !!}
                <div class="card-body">
                    <div class="form-group" style="height: 110px;">
                        <div class="preview text-center" style="height:125px;">
                            <img id="imagePreview"class="preview-img" src="{{ $user->profile && $user->profile->avatarUrl ? $user->profile->avatarUrl : "http://simpleicon.com/wp-content/uploads/account.png" }}" alt="Preview Image"
                                width="100" height="100" />
                            <div class="browse-button">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                {{-- <input id="new_image" class="browse-input" type="file" required name="UploadedFile" id="UploadedFile" /> --}}
                                {{ Form::file('profile[image]', ['id' => "new_image", "class" => "browse-input"]) }}
                            </div>
                            <span class="Error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('profile[first_name]', 'First Name') !!}
                                {!! Form::text('profile[first_name]', null, ['placeholder' => 'First Name', 'class' => 'form-control'])
                                !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('profile[last_name]', 'Last Name') !!}
                                {!! Form::text('profile[last_name]', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('type', 'Type') !!}
                        {!! Form::select('type', ['individual' => 'Individual', 'company' => 'Company'], null,
                        ['placeholder' => 'select', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('profile[job_title]', 'Job Title') !!}
                        {!! Form::text('profile[job_title]', null, ['placeholder' => 'Job Title', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('profile[country_id]', 'Country') !!}
                        {!! Form::select('profile[country_id]', $countries, null, ['placeholder' => 'Country', 'class' =>
                        'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('profile[address]', 'Address') !!}
                        {!! Form::text('profile[address]', null, ['placeholder' => 'Address', 'class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('profile[phone]', 'Tel') !!}
                        {!! Form::text('profile[phone]', null, ['placeholder' => 'Tel', 'class' => 'form-control']) !!}
                    </div>
                  
                    <hr>
                    
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
        $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
        });
    })
</script>

@endsection
