@extends('front.manage.layout.index')

@section('title', 'Profile')

@section('content_profile')

<div class="col-md-10" style="margin-top: -25px">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (\Session::has('success'))
                <div class="alert alert-success">
                    {!! \Session::get('success') !!}
                </div>
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <div class="card">
                    {!! Form::model($user, ['route' => ['manage.profile.update'], 'method' => 'PUT', 'files' => true])
                    !!}
                    <div class="card-body">
                        <div class="form-group" style="height: 110px;">
                            <div class="mego-avatar-wrapper">
                                <img class="profile-pic"
                                    src="{{$user->profile ? $user->profile->avatarUrl : "http://simpleicon.com/wp-content/uploads/account.png" }}" />
                                <div class="upload-button">
                                    <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                </div>
                                {{ Form::file('profile[image]', ['id' => "profileImage", "class" => "file-upload",'type' =>'file','accept'=>'image/*']) }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('profile[first_name]', 'First Name') !!}
                                    {!! Form::text('profile[first_name]', null, ['placeholder' => 'First Name', 'class'
                                    =>
                                    'form-control', 'required' => true])
                                    !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('profile[last_name]', 'Last Name') !!}
                                    {!! Form::text('profile[last_name]', null, ['placeholder' => 'Last Name', 'class' =>
                                    'form-control', 'required' => true]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('type', 'Type') !!}
                            {!! Form::select('type', ['individual' => 'Individual', 'company' => 'Company'], null,
                            ['placeholder' => 'Select', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('profile[job_title]', 'Job Title') !!}
                            {!! Form::text('profile[job_title]', null, ['placeholder' => 'Job Title', 'class' =>
                            'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('profile[country_id]', 'Country') !!}
                            {!! Form::select('profile[country_id]', $countries, null, ['placeholder' => 'Country','class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('profile[address]', 'Address') !!}
                            {!! Form::text('profile[address]', null, ['placeholder' => 'Address', 'class' =>
                            'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('profile[phone]', 'Tel') !!}
                            {!! Form::text('profile[phone]', null, ['placeholder' => '(xxx)-xxx-xxxx', 'class' =>
                            'form-control phone-format',])
                            !!}
                        </div>

                    </div>
                    <div class="card-footer ">
                        {!! Form::submit('Save', ['class' => 'btn mego-gold-bg']); !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="col-md-6 ">
                <div class="col-md-12 mb-3">
                    <div class="card">
                        {!! Form::model($user, ['route' => ['manage.profile.re_password'], 'method' => 'PUT', 'files' =>
                        true])!!}
                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('name', 'User Name') !!}
                                {!! Form::text('name', null, ['placeholder' => 'user name', 'class' => 'form-control'
                                ,'readonly' => true]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'E-Mail Address') !!}
                                {!! Form::email('email', null, ['placeholder' => 'enter email address', 'class'
                                =>'form-control' ,'readonly' => true]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                <small id="passwordHelp" class="form-text text-muted">Leave empty to keep
                                    unchanged.</small>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('password_confirmation', 'Password Confirmation') !!}
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                <small id="passwordHelp" class="form-text text-muted">Leave empty to keep
                                    unchanged.</small>
                            </div>
                        </div>
                        <div class="card-footer ">
                            {!! Form::submit('Save', ['class' => 'btn mego-gold-bg']); !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-md-12">
                    @if ($user->type == "company")
                    @if ($user->company)
                    <div class="card">
                        {!! Form::model($user->company, ['route' => ['manage.company.update', $user->company->id],
                        'method'
                        => 'PUT', 'files' => true ]) !!}
                        <div class="card-body">
                            <div class="form-group" style="height: 110px;">
                                <div class="mego-company-wrapper" id="profile-preview">
                                    <img id="logoPreview" class="preview-img"
                                        src="{{ $user->company ? $user->company->logoUrl : "http://simpleicon.com/wp-content/uploads/account.png" }}"
                                        alt="Preview Image" width="100" height="100" />
                                    <div class="logo-upload-button">
                                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                    </div>
                                    {{ Form::file('logo', ['id' => "logoImage", "class" => "browse-input"]) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', 'Company Name') !!}
                                {!! Form::text('name', null, ['placeholder' => 'Company Name', 'class' =>
                                'form-control'])
                                !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('registration_number', 'Registration Number') !!}
                                {!! Form::text('registration_number', null, ['placeholder' => 'xxxxxxxx', 'class' =>
                                'form-control']) !!}
                            </div>
                        </div>
                        <div class="card-footer ">
                            {!! Form::submit('Save', ['class' => 'btn mego-gold-bg']); !!}
                        </div>
                        {!! Form::close() !!}
                    </div>

                    @else

                    <div class="card">
                        {!! Form::open(['route' => ['manage.company.store'], 'method' => 'POST', 'files' => true]) !!}
                        <div class="card-body">
                            <div class="form-group" style="height: 110px;">
                                <div class="form-group" style="height: 110px;">
                                    <div class="mego-company-wrapper" id="profile-preview">
                                        <img id="logoPreview" class="preview-img"
                                            src="http://simpleicon.com/wp-content/uploads/account.png"
                                            alt="Preview Image" width="100" height="100" />
                                        <div class="logo-upload-button">
                                            <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                        </div>
                                        {{ Form::file('logo', ['id' => "logoImage", "class" => "browse-input"]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('name', 'Company Name') !!}
                                {!! Form::text('name', null, ['placeholder' => 'Company Name', 'class' =>
                                'form-control',
                                'required' => true]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('registration_number', 'Registration Number') !!}
                                {!! Form::text('registration_number', null, ['placeholder' => 'xxxxxxxx', 'class' =>
                                'form-control' , 'required' => true]) !!}
                            </div>
                        </div>
                        <div class="card-footer ">
                            {!! Form::submit('Create', ['class' => 'btn mego-gold-bg']); !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    @endif
                    @endif
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        Events Registered as Exhibitor
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Organizer</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->exhibitions as $exhibition)
                                    <tr>
                                        <td>
                                            {{ $exhibition->name }}
                                        </td>
                                        <td>
                                            {{ $exhibition->organizer ? $exhibition->organizer->name: null}}
                                        </td>
                                        <td>
                                            {{ $exhibition->display_start_date }} @
                                            {{ $exhibition->display_start_time }}
                                        </td>
                                        <td>
                                            {{ $exhibition->display_end_date }} @ {{ $exhibition->display_end_time }}
                                        </td>
                                        <td>
                                            <a href="{{ route('event', $exhibition->id) }}"
                                                class="btn mego-gold-bg">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
                reader.onload = function (e) {
                    $('.profile-pic').attr('src', e.target.result);
                    }
                    
                reader.readAsDataURL(input.files[0]);
            }
        }  
        $(".file-upload").on('change', function () {
        readURL(this);
        });
        
            $(".upload-button").on('click', function () {
            $(".file-upload").click();
        });

        $("#logoImage").change(function() {
            
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#logoPreview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]);
            }
               
        });

        $(".logo-upload-button").on('click', function () {
        $(".browse-input").click();
        });
    });
    /***phone number format***/
    $(".phone-format").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        return false;
        }
        var curchr = this.value.length;
        var curval = $(this).val();
        if (curchr == 3 && curval.indexOf("(") <= -1) {
        $(this).val("(" + curval + ")" + "-");
        } else if (curchr == 4 && curval.indexOf("(") > -1) {
        $(this).val(curval + ")-");
        } else if (curchr == 5 && curval.indexOf(")") > -1) {
        $(this).val(curval + "-");
        } else if (curchr == 9) {
        $(this).val(curval + "-");
        $(this).attr('maxlength', '14');
        }
    });
</script>

@endsection