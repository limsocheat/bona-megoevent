@extends('layouts.app')

@section ('title', "Contact")

@section('content')
<style>
    .hero-image {
        background-image: url(https://bona.com.sg/wp-content/uploads/2019/04/bg-image-12-1920x238.png);
        background-color: #cccccc;
        height: 130px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .hero-text {
        text-align: center;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
    }

    .txt-line-height p {
        margin-bottom: 2px;
        line-height: 1.5;
    }
</style>
<div class="container">
    <div class="hero-image mt-4">
        <div class="hero-text">
            <h1 style="font-size:48px">Contact Us</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mt-4 p-auto">

            @if (\Session::has('success'))
            <div class="alert alert-success">
                {!! \Session::get('success') !!}
            </div>
            @endif

            {!! Form::open(['route' => 'contact.submit', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name*') !!}
                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'required' => true])
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email*') !!}
                {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'required' =>
                true]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('contact_number', 'Contact Number') !!}
                {!! Form::text('contact_number', null, ['placeholder' => 'Contact Number', 'class' => 'form-control'])
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('country', 'Country') !!}
                {!! Form::text('country', null, ['placeholder' => 'Country', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('company_name', 'Company Name') !!}
                {!! Form::text('company_name', null, ['placeholder' => 'Company Name', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('type', 'Type') !!}
                {!! Form::select('type', ['Enquiry'=>'Enquiry', 'Testimonial'=>'Testimonial', 'Feedback'=>'Feedback', 'Advertiser'=>'Advertiser'], null,
                ['placeholder' => 'Select', 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('message', 'Message') !!}
                {!! Form::textarea('message', null, ['placeholder' => 'Message', 'class' => 'form-control']) !!}
            </div>
            <div class="col-md-12 p-0">
                {!! Captcha::display($attributes = [
                'data-type' => 'audio',
                ]) !!}
                @if ($errors->has('g-recaptcha-response'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
                @endif
            </div>
            <p></p>
            <button type="submit" class="btn mego-gold-bg">Submit</button>
            <p></p>
            {!! Form::close() !!}
        </div>
        <div class="col-sm-6 mt-4 p-auto txt-line-height">
            <p style="font-size: 1.2rem;">If you have a question regarding a specific development project or IT funding
                please let us know how we can be of
                service to you.</p>
            <div id="map-container-google-1" class="z-depth-1-half map-container" style="width:auto; height:auto;">
                <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" style="border:1; width:100%; height:300px;" allowfullscreen></iframe>
            </div>
            <h3>Data Protection Officer</h3>
            <p>For any queries or feedback on regards to PDPA, please contact our DPO</p>
            <p>Officer at:</p>
            <p>Contact Email: dpo@bona.com.sg</p>
            <p>Contact Number: 65-6741 3789</p>
        </div>
    </div>
</div>
@endsection