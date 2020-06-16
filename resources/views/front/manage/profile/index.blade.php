@extends('layouts.app')

@section('title', 'Profile')
@section('content')
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
                            {!! Form::email('email', null, ['placeholder' => 'enter email address', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('type', 'Type') !!}
                            {!! Form::select('type', ['individual' => 'Individual', 'company' => 'Company'], null, ['placeholder' => 'select', 'class' => 'form-control']) !!}
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
                            {!! Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('last_name', 'Last Name') !!}
                            {!! Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('job_title', 'Job Title') !!}
                            {!! Form::text('job_title', null, ['placeholder' => 'Job Title', 'class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('type', 'Type') !!}
                            {!! Form::select('type', ['individual' => 'Individual', 'company' => 'Company'], null, ['placeholder' => 'select', 'class' => 'form-control']) !!}
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

            @if ($user->type == "company")

                @if ($user->company)
                    <div class="card">
                        {!! Form::model($user->company, ['route' => ['manage.company.update', $user->company->id], 'method' => 'PUT']) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    {!! Form::label('name', 'Company Name') !!}
                                    {!! Form::text('name', null, ['placeholder' => 'company name', 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('registration_number', 'Registration Number') !!}
                                    {!! Form::text('registration_number', null, ['placeholder' => 'xxxxxxxx', 'class' => 'form-control']) !!}
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
                                    {!! Form::text('registration_number', null, ['placeholder' => 'xxxxxxxx', 'class' => 'form-control']) !!}
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
@endsection