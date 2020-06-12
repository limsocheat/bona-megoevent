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
        .txt-line-height p{
            margin-bottom:2px;
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
        
                <form class="text-capitalize ">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Name*</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Email*</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Contact Number</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Contact Number">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Country</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Country">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Company Name</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Company Name">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Type</label>
                        <select id="inputState" class="form-control">
                            <option selected>Enquiry </option>
                            <option>Testimonial</option>
                            <option>Feedback</option>
                            <option>Advertiser</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <p></p>
                </form>
            </div>
            <div class="col-sm-6 mt-4 p-auto txt-line-height">
                <p style="font-size: 1.2rem;">If you have a question regarding a specific development project or IT funding please let us know how we can be of
                service to you.</p>  
                <div id="map-container-google-1" class="z-depth-1-half map-container" style="width:auto; height:auto;">
                    <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                        style="border:1; width:100%; height:300px;" allowfullscreen></iframe>
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