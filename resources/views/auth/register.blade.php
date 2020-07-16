@extends('layouts.app')

@section('title', 'Register')
<style>
    #mego-multi-step #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #mego-multi-step #msform fieldset .form-card {
        border: 0 none;
        border-radius: 0px;
        padding: 20px 40px 30px 40px;
        box-sizing: border-box;
        position: relative
    }

    #mego-multi-step #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    #mego-multi-step #msform fieldset:not(:first-of-type) {
        display: none
    }

    #mego-multi-step #msform fieldset .form-card {
        text-align: left;
        color: #9E9E9E
    }

    #mego-multi-step #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px
    }

    #mego-multi-step #msform .action-button-previous:hover,
    #mego-multi-step #msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
    }

    #mego-multi-step select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px
    }

    #mego-multi-step select.list-dt:focus {
        border-bottom: 2px solid #bf9000
    }

    #mego-multi-step .card {
        z-index: 0;
        border: none;
        border-radius: 0.5rem;
        position: relative
    }

    #mego-multi-step .fs-title {
        font-size: 25px;
        color: #2C3E50;
        margin-bottom: 10px;
        font-weight: bold;
        text-align: left
    }

    #mego-multi-step #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #mego-multi-step #progressbar .active {
        color: #000000
    }

    #mego-multi-step #progressbar li {
        list-style-type: none;
        font-size: 12px;
        width: 30%;
        float: left;
        position: relative
    }

    #mego-multi-step #progressbar #register:before {
        font-family: FontAwesome;
        content: "\f234"
    }

    #mego-multi-step #progressbar #profile:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #mego-multi-step #progressbar #company:before {
        font-family: FontAwesome;
        content: "\f1ad"
    }


    #mego-multi-step #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 18px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #mego-multi-step #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #mego-multi-step #progressbar li.active:before,
    #mego-multi-step #progressbar li.active:after {
        background: #bf9000
    }

    #mego-multi-step .radio-group {
        position: relative;
        margin-bottom: 25px
    }

    #mego-multi-step .radio {
        display: inline-block;
        width: 204;
        height: 104;
        border-radius: 0;
        background: lightblue;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
        cursor: pointer;
        margin: 8px 2px
    }

    #mego-multi-step .radio:hover {
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
    }

    #mego-multi-step .radio.selected {
        box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
    }

    #mego-multi-step .fit-image {
        width: 100%;
        object-fit: cover
    }
</style>
@section('content')
<!-- MultiStep Form -->
<div class="container-fluid" id="mego-multi-step">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-4 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Sign Up Your User Account</strong></h2>
                <p>Fill all form field to go to next step</p>

                @if (count($errors) > 0)
                <div class="alert alert-danger text-left">
                    <strong>Sorry!</strong> Please check your input again.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12 mx-0">
                        {!! Form::open(['route' => 'register', 'method' => 'POST', 'id' => 'msform', 'files' => true])
                        !!}
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="register"><strong>Register</strong></li>
                            <li id="profile"><strong>Profile</strong></li>
                            <li id="company"><strong>Company</strong></li>
                        </ul> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                @include('auth.components.singup')
                            </div>
                            <input type="button" name="next" class="next  btn mego-gold-bg" value="Next Step"
                                id="signup-basic" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                @include('auth.components.profile')
                            </div>
                            <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
                            <input type="button" name="next" class="next  btn mego-gold-bg" value="Next Step"
                                id="signup-profile" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                @include('auth.components.company')
                            </div>
                            <input type="button" name="previous" class="previous btn btn-secondary" value="Previous" />
                            <input type="submit" class="next btn mego-gold-bg" value="Register" id="signup-company" />
                        </fieldset>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.MultiStep Form -->
<script type="text/javascript">
    $(document).ready(function(){
            var current_fs, next_fs, previous_fs;
            var opacity;

            $(".next").click(function(){

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                next_fs.show();
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $(".previous").click(function(){

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
            },
            duration: 600
            });
            });

            $('.radio-group .radio').click(function(){
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
            });

            $(".submit").click(function(){
            return false;
            });


// upload profile image
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
        //company

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

});
</script>
@endsection