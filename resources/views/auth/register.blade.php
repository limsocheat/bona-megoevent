@extends('layouts.app')

@section('title', 'Register')
<style>
.form-wizard {
  color: #888888;
  padding: 30px;
}
.form-wizard .wizard-form-radio {
  display: inline-block;
  margin-left: 5px;
  position: relative;
}
.form-wizard .wizard-form-radio input[type="radio"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  background-color: #dddddd;
  height: 25px;
  width: 25px;
  display: inline-block;
  vertical-align: middle;
  border-radius: 50%;
  position: relative;
  cursor: pointer;
}
.form-wizard .wizard-form-radio input[type="radio"]:focus {
  outline: 0;
}
.form-wizard .wizard-form-radio input[type="radio"]:checked {
  background-color: #fb1647;
}
.form-wizard .wizard-form-radio input[type="radio"]:checked::before {
  content: "";
  position: absolute;
  width: 10px;
  height: 10px;
  display: inline-block;
  background-color: #ffffff;
  border-radius: 50%;
  left: 1px;
  right: 0;
  margin: 0 auto;
  top: 8px;
}

.form-wizard .wizard-form-radio input[type="radio"] ~ label {
  padding-left: 10px;
  cursor: pointer;
}
.form-wizard .form-wizard-header {
  text-align: center;
}

.form-wizard .wizard-fieldset {
  display: none;
}
.form-wizard .wizard-fieldset.show {
  display: block;
}
.form-wizard .wizard-form-error {
  display: none;
  background-color: #d70b0b;
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  height: 2px;
  width: 100%;
}

/* .form-wizard .form-control {
  font-weight: 300;
  height: auto !important;
  padding: 15px;
  color: #888888;
  background-color: #f1f1f1;
  border: none;
}
.form-wizard .form-control:focus {
  box-shadow: none;
} */
.form-wizard .form-group {
  position: relative;
  margin: 25px 0;
}
/* .form-wizard .wizard-form-text-label {
  position: absolute;
  left: 10px;
  top: 16px;
  transition: 0.2s linear all;
}
.form-wizard .focus-input .wizard-form-text-label {
  color: #c5b358;
  top: -18px;
  transition: 0.2s linear all;
  font-size: 12px;
} */
.form-wizard .form-wizard-steps {
  margin: 30px 0;
}
.form-wizard .form-wizard-steps li {
  width: 25%;
  float: left;
  position: relative;
}
.form-wizard .form-wizard-steps li::after {
  background-color: #f3f3f3;
  content: "";
  height: 5px;
  left: 0;
  position: absolute;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  width: 100%;
  border-bottom: 1px solid #dddddd;
  border-top: 1px solid #dddddd;
}
.form-wizard .form-wizard-steps li span {
  background-color: #dddddd;
  border-radius: 50%;
  display: inline-block;
  height: 40px;
  line-height: 40px;
  position: relative;
  text-align: center;
  width: 40px;
  z-index: 1;
}
/* .form-wizard .form-wizard-steps li:last-child::after {
  width: 50%;
} */
.form-wizard .form-wizard-steps li.active span, .form-wizard .form-wizard-steps li.activated span {
  background-color: #c5b358;
  color: #ffffff;
}
.form-wizard .form-wizard-steps li.active::after, .form-wizard .form-wizard-steps li.activated::after {
  background-color: #c5b358;
  /* left: 50%; */
  border-color: #c5b358;
}
.form-wizard .form-wizard-steps li.activated::after {
  width: 100%;
  border-color: #c5b358;
}
.form-wizard .form-wizard-steps li:last-child::after {
  left: 0;
}
/* .form-wizard .wizard-password-eye {
  position: absolute;
  right: 32px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
} */
/* selecttion */
.box {
				color: #fff;
				padding: 20px;
				display: none;
				margin-top: 20px;
			}
			.Individual {
				background: #c5b358;
			}


}
/* email validation */



input {
    width: 100%;
}

.message {
    font: 15px ;
    display: none;
    width: 100%;
    padding: 30px;
    left: 0;
    color: #fff;
}

.error {
    margin-top: 20px;
    color: red;
    margin-left: -21px;
}

.success {
    color: green;
}

</style>
@section('content')

	<div class="container py-4">
        <div class="row justify-content-center">	
            <div class="col-lg-8 col-md-8">
                <div class="form-wizard">
                    <div class="card">
                        <div class="card-body">
                             <div class="form-wizard-header">
                                <h2><strong>Sign Up Your User Account</strong></h2>
                                  <p>Fill all form field to go next step</p>
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
                              <ul class="list-unstyled form-wizard-steps clearfix">
                                <li class="active"><span>1</span></li>
                                <li><span>2</span></li>
                                <li><span>3</span></li>
                                <li><span>4</span></li>
                              </ul>
                               </div>
                              {!! Form::open(['route' => 'register', 'method' => 'POST','role' =>'form', 'id' => 'msform', 'files' => true])!!}
                                <fieldset class="wizard-fieldset show">
                                    <h2>Register</h2>
                                      @include('auth.components.singup')
                                    <div class="form-group clearfix">
                                        <a href="javascript:;" class=" form-wizard-next-btn btn mego-gold-bg  float-right">Next</a>
                                    </div>
                                </fieldset>	
                                <fieldset class="wizard-fieldset">
                                     <h2>Profile</h2>
                                     @include('auth.components.profile')
                                    <div class="form-group clearfix">
                                        <a href="javascript:;" class="form-wizard-previous-btn btn btn btn-secondary float-left">Previous</a>
                                        <a href="javascript:;" class="form-wizard-next-btn btn mego-gold-bg   float-right">Next</a>
                                    </div>
                                </fieldset>	
                                <fieldset class="wizard-fieldset">
                                     <h2>Company Profile</h2>
                                    @include('auth.components.company')
                                    <div class="form-group clearfix">
                                        <a href="javascript:;" class="form-wizard-previous-btn btn btn btn-secondary float-left">Previous</a>
                                         <a href="javascript:;" class="form-wizard-next-btn btn mego-gold-bg   float-right">Next</a>
                                       
                                </fieldset>	
                                <fieldset class="wizard-fieldset">
                                  <h5>Payment Information</h5>
                            
                              
                                  <div class="form-group clearfix">
                                    <a href="javascript:;" class="form-wizard-previous-btn btn btn btn-secondary float-left">Previous</a>
                                    <button  type="submit" class="form-wizard-next-btn btn mego-gold-bg float-right">Create</button>
                                   
                                  </div>
						                    </fieldset>	
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	



<script type="text/javascript">
  jQuery(document).ready(function($) {

    $('#register-account-type').change(function() {
      if(this.value == 'company')
      {
        $('#register-company-name').addClass('wizard-required');
        $('#register-company-number').addClass('wizard-required');
      } else {
        $('#register-company-name').removeClass('wizard-required');
        $('#register-company-number').removeClass('wizard-required');
      }
    });

	// click on next button
	jQuery('.form-wizard-next-btn').click(function() {
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		var next = jQuery(this);
		var nextWizardStep = true;
		parentFieldset.find('.wizard-required').each(function(){
			var thisValue = jQuery(this).val();

			if( thisValue == "") {
				jQuery(this).siblings(".wizard-form-error").slideDown();
				nextWizardStep = false;
			}
			else {
				jQuery(this).siblings(".wizard-form-error").slideUp();
			}
		});
		if( nextWizardStep) {
			next.parents('.wizard-fieldset').removeClass("show","400");
			currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
			next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
			jQuery(document).find('.wizard-fieldset').each(function(){
				if(jQuery(this).hasClass('show')){
					var formAtrr = jQuery(this).attr('data-tab-content');
					jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
						if(jQuery(this).attr('data-attr') == formAtrr){
							jQuery(this).addClass('active');
							var innerWidth = jQuery(this).innerWidth();
							var position = jQuery(this).position();
							jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
						}else{
							jQuery(this).removeClass('active');
						}
					});
				}
			});
		}
	});
	//click on previous button
	jQuery('.form-wizard-previous-btn').click(function() {
		var counter = parseInt(jQuery(".wizard-counter").text());;
		var prev =jQuery(this);
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		prev.parents('.wizard-fieldset').removeClass("show","400");
		prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
		currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
		jQuery(document).find('.wizard-fieldset').each(function(){
			if(jQuery(this).hasClass('show')){
				var formAtrr = jQuery(this).attr('data-tab-content');
				jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
					if(jQuery(this).attr('data-attr') == formAtrr){
						jQuery(this).addClass('active');
						var innerWidth = jQuery(this).innerWidth();
						var position = jQuery(this).position();
						jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
					}else{
						jQuery(this).removeClass('active');
					}
				});
			}
		});
	});
	//click on form submit button
	jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		parentFieldset.find('.wizard-required').each(function() {
			var thisValue = jQuery(this).val();
			if( thisValue == "" ) {
				jQuery(this).siblings(".wizard-form-error").slideDown();
			}
			else {
				jQuery(this).siblings(".wizard-form-error").slideUp();
			}
		});
	});
  	//click on form submit button
	jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		parentFieldset.find('.wizard-required').each(function() {
			var thisValue = jQuery(this).val();
			if( thisValue == "" ) {
				jQuery(this).siblings(".wizard-form-error").slideDown();
			}
			else {
				jQuery(this).siblings(".wizard-form-error").slideUp();
			}
		});
	});
	// focus on input field check empty or not
	jQuery(".form-control").on('focus', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().addClass("focus-input");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
		}
	}).on('blur', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().removeClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideDown("3000");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideUp("3000");
		}
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

    //select company and Individual
    $("select").change(function () {
					$(this).find("option:selected").each(function () {
						var optionValue = $(this).attr("value");
						if (optionValue) {
							$(".box").not("." + optionValue).hide();
							$("." + optionValue).show();
						} else {
							$(".box").hide();
						}
					});
				}).change();

        // var regExp = /^\w*(\.\w*)?@\w*\.[a-z]+(\.[a-z]+)?$/;
        var regExp = /^([\w\.\+]{1,})([^\W])(@)([\w]{1,})(\.[\w]{1,})+$/;

        $('[type="email"]').on('keyup', function () {
            $('.message').hide();
            regExp.test($(this).val()) ? $('.message.success').show() : $('.message.error')
                .show();
        });

       
});

 //validation password
        function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('error-nwl');
    var goodColor = "#c5b358";
    var badColor = "#ff4d4d";
 	
    if(pass1.value.length > 7)
    {
        pass1.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "character number ok!"
    }
    else
    {
        pass1.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " you have to enter at least 8 digit!"
        return;
    }
  
    if(pass1.value == pass2.value)
    {
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "ok!"
    }
	else
    {
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = " These passwords don't match"
    }
}  
    


</script>
@endsection