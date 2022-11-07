<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="{{URL::to('/')}}/assets/css/driverApplicationForm.css" rel="stylesheet">


<script language="JavaScript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<!-- <script language="JavaScript" type="text/javascript" src="{{URL::to('/')}}/assets/js/driverApplicationForm.js"></script> -->


</head>
<body>

<!-- MultiStep Form -->
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform">
            <!-- progressbar -->
            <ul id="progressbar">
                <!-- <li class="active">Personal Details</li> -->
                <li id="step1">Personal Details</li>
                <li>Social Profiles</li>
                <li>Account Setup</li>
            </ul>
            <!-- fieldsets -->
          
            <fieldset class="active" id="info">
                <section id="highlights">
                    <div class=""  style=" padding:10px;">
                    <h3 class="fs-title animate-charcter" >Welcome to Astra TMS..!</h3>
                    <hr>
                        <div class="col-md-4 " id="course">
                            <div>
                                <h1 class="fs-title" style="font-size: 12px;">Required Documents</h1>
                                <hr>
                                <ul style= "text-align:left;padding-left:15px;font-size:18px;">
                                    <li>Driving license</li>
                                    <li>Employment Reports</li>
                                    <li>Accident Reports</li>
                                    <li>Violations Reports</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 ">
                            <div>
                                <center><h4 id="auto" style="color:green;font-weight: bold">*Here, Define the steps to process your application.*</h4></center>
                                <div style="margin-top:16px; margin-right:auto; margin-left:30px">
                                    <ul style= "text-align:left;padding-left:15px;font-size:16px;color:black;">
                                        <li class="">Applicant Details.</li>
                                        <li class="">Employment Record.</li>
                                        <li class="">Declaration of Employment Status.</li>
                                        <li class="">Accidents for Past Three (3) Years.</li>
                                        <li class="">Traffic Convictions & Forfeitures for Past Three (3) Years.</li>
                                        <li class="">Accidents for Past Three (3) Years.</li>
                                        <li class="">Driver Experience(Type of Equipment).</li>
                                        <li class="">Driving State.</li>
                                        <li class="">Certification of Violations.</li>
                                        <li class="">Driver Statement of On-Duty Hours.</li>
                                        <li class="">Alcohol and Controlled Substances.</li>

                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <button class="button" id="fillForm" ><span>Fill Form  </span></button>                                    
                        </div>
                    </div>
                </section>
            </fieldset>
            <fieldset id="step1">
                <h2 class="fs-title">Personal Details</h2>
                <h3 class="fs-subtitle">Tell us something more about you</h3>
                <input type="text" name="fname" placeholder="First Name"/>
                <input type="text" name="lname" placeholder="Last Name"/>
                <input type="text" name="phone" placeholder="Phone"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Social Profiles</h2>
                <h3 class="fs-subtitle">Your presence on the social network</h3>
                <input type="text" name="twitter" placeholder="Twitter"/>
                <input type="text" name="facebook" placeholder="Facebook"/>
                <input type="text" name="gplus" placeholder="Google Plus"/>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            
            <fieldset>
                <h2 class="fs-title">Create your account</h2>
                <h3 class="fs-subtitle">Fill in your credentials</h3>
                <input type="text" name="email" placeholder="Email"/>
                <input type="password" name="pass" placeholder="Password"/>
                <input type="password" name="cpass" placeholder="Confirm Password"/>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset>
        
        </form>
    </div>
</div>
<!-- /.MultiStep Form -->

<script>
$("#fillForm").click(function(){
    $("#info").removeClass("active");
    $("#step1").addClass("active");
});
$(document).ready(function(){

 
    //jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches



$(".next").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  next_fs = $(this).parent().next();
  
  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
  
  //show the next fieldset
  next_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
      next_fs.css({'left': left, 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".previous").click(function(){
  if(animating) return false;
  animating = true;
  
  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();
  
  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
  
  //show the previous fieldset
  previous_fs.show(); 
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    }, 
    duration: 800, 
    complete: function(){
      current_fs.hide();
      animating = false;
    }, 
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".submit").click(function(){
  return false;
})
});
</script>
</body>
</html>