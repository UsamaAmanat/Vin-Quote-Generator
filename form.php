<?php
    include("header.php");
?>


<!-- VIN DECODE START-->




<?php

$vin = "N/A";
$year = "N/A"; 
$make = "N/A";
$model =  "N/A";
$engine = "N/A";
$style = "N/A";
$madein = "N/A";
$zipcode = "N/A";
$miles = "N/A";

if(isset($_POST['submitwvin'])){
	
	$vin = "N/A";
	$year = $_POST['year']; 
	$make = $_POST['make'];
	$model =  $_POST['model'];
	$engine = "N/A";
	$style = "N/A";
	$madein = "N/A";
	$zipcode = $_POST['zip'];
	$miles = $_POST['miles'];


}
else if(isset($_POST['submitvin'])){

$vin = $_POST['vinnum'];
$zipcode = $_POST['zipcodenum']; 
$miles = $_POST['milesnum']; 

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://vindecoder.p.rapidapi.com/decode_vin?vin="."$vin",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: vindecoder.p.rapidapi.com",
		"x-rapidapi-key: b8486fcde4msh0efd2f057e2d59cp18493fjsn811d86f32215"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$data = json_decode($response,true);

	$result = $data["success"];

	if($result == "true"){

	$year = $data["specification"]["year"]; 
	$make = $data["specification"]["make"];
	$model =  $data["specification"]["model"];
	$engine = $data["specification"]["engine"];
	$style = $data["specification"]["style"];
	$madein = $data["specification"]["made_in"];
	}
	else{
		header("Location: getoffer.php");
	}
}
}

else if(isset($_POST['submitplate'])){

	$plate = $_POST['platenum'];
	$state = $_POST['statecode'];
	$zipcode = $_POST['zipcodenum']; 
	$miles = $_POST['milesnum']; 

	$curl = curl_init();

	curl_setopt_array($curl, [
	CURLOPT_URL => "https://vindecoder.p.rapidapi.com/api/v4/decode_plate",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "state="."$state"."&plate="."$plate",
	CURLOPT_HTTPHEADER => [
		"content-type: application/x-www-form-urlencoded",
		"x-rapidapi-host: vindecoder.p.rapidapi.com",
		"x-rapidapi-key: b8486fcde4msh0efd2f057e2d59cp18493fjsn811d86f32215"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {

	$data = json_decode($response,true);

	$resultt = $data["success"];

	if($resultt == 1){
	$vinnumber = $data["data"]["vin"]; 
	$vin = $vinnumber;
	}
	else{
		header("Location: getoffer.php");
	}
}


////dasdas
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://vindecoder.p.rapidapi.com/decode_vin?vin="."$vinnumber",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: vindecoder.p.rapidapi.com",
        "x-rapidapi-key: b8486fcde4msh0efd2f057e2d59cp18493fjsn811d86f32215"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$data = json_decode($response,true);

	$result = $data["success"];

	if($result == 1){

	$year = $data["specification"]["year"]; 
	$make = $data["specification"]["make"];
	$model =  $data["specification"]["model"];
	$engine = $data["specification"]["engine"];
	$style = $data["specification"]["style"];
	$madein = $data["specification"]["made_in"];
	}
	else{
		header("Location: getoffer.php");
	}
}



}
else{
	
	header("Location: index.php");
	exit();
}	

?>


<!-- PLATE DECODE END -->










<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #67454e;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 35px;
}

.slider.round:before {
  border-radius: 89px;
}
.btn_choose_sent input {
  border: 1px solid white;
  -webkit-appearance: none;
  display: block;
  margin: 10px;
  width: 18px;
  height: 18px;
  border-radius: 12px;
  cursor: pointer;
  vertical-align: middle;
  background-color: hsla(0,0%,0%,.2);
      background-image: -webkit-radial-gradient( #fff 0%, #fff 15%, #fff 28%, #fff 70% );
  background-repeat: no-repeat;
  -webkit-transition: background-position .15s cubic-bezier(.8, 0, 1, 1),
    -webkit-transform .25s cubic-bezier(.8, 0, 1, 1);
  outline: none;
}
.btn_choose_sent input:checked {
  -webkit-transition: background-position .2s .15s cubic-bezier(0, 0, .2, 1),
    -webkit-transform .25s cubic-bezier(0, 0, .2, 1);
}
.btn_choose_sent input:active {
  -webkit-transform: scale(1.5);
  -webkit-transition: -webkit-transform .1s cubic-bezier(0, 0, .2, 1);
}



/* The up/down direction logic */

.btn_choose_sent input,
.btn_choose_sent input:active {
  background-position: 0 24px;
}
.btn_choose_sent input:checked {
  background-position: 0 0;
}
.btn_choose_sent input:checked ~ input,
 .btn_choose_sent input:checked ~ input:active {
  background-position: 0 -24px;
}

.btn_choose_sent{
  font-weight:400;
	    background: #EF2D56;
    color: black;
    border: none; 
     border-radius: 3px;
    font-size: 17px;
    line-height: 10px;
    padding:  16px 20px 16px 38px;
    text-align: center;
    display: inline-block;
    text-decoration: none;
    margin-right: 30px;
    transition: all .3s;
    height: auto;
    cursor: pointer;
    position: relative;
    outline: none;
}

.btn_choose_sent input{
    position: absolute;
    left: 0;
    right: 0;
    /* z-index: 99; */
    top: 2px;
}

.btn_choose_sent input:after{
	 position: absolute;
    content: '';
    width: 15rem;
    left: 0;
    right: 0;
    /* background: red; */
    /* z-index: -1; */
    height: 40px;
    top: -10px;
}

.bg_btn_chose_1{
	background-color: white !important;
}
.pok:checked {
  border: 5px solid;
  background-color: #a13f43 !important;
  border-color: #a13f43 !important;
}

.bg_btn_chose_2{
	background-color: white !important;
}


.bg_btn_chose_3{
	background-color: white !important;
}


/*-=p=--=*/




.btn_choose_sent_check_b{
	  background: #EF2D56;
    color: #fff;
    box-shadow: 0 10px 20px rgba(125, 147, 178, .3);
    border: none; 
     border-radius: 3px;
    font-size: 16px;
    line-height: 10px;
    padding:  16px 20px 16px 46px;
    text-align: center;
    display: inline-block;
    text-decoration: none;
    margin-right: 30px;
    transition: all .3s;
    height: auto;
    cursor: pointer;
    position: relative;
    outline: none;
}

button.btn_choose_sent {
	font-size:16px;
	box-shadow: 2px 2px 10px -5px;
    /* border: 1px solid #67454e; */
    margin-top: 13px;
}







input#myFile {
    margin-right: auto;
    text-align: center;
    padding: 21px 20px;
    border: 2px solid #a13f43;
    width: 100%;
    justify-content: center;
    margin-left: auto;
}


.button {
	background      : #a13f43;
	border          : none;
	border-radius   : 3px;
	color           : white;
	display         : inline-block;
	font-size       : 19px;
	font-weight     : bolder;
	letter-spacing  : 0.02em;
	padding         : 5px 22px;
	text-align      : center;
	text-shadow     : 0px 1px 2px rgba(0, 0, 0, 0.75);
	text-decoration : none;
	text-transform  : uppercase;
	transition      : all 0.2s;
}

.btn:hover {
	background : #4499c9;
}

.btn:active {
	background : #49ADE5;
}

input[type="file"] {
	display : none;
}

#file-drag {
	border        : 2px dashed #55555573;
	border-radius : 7px;
	color         : #555;
	cursor        : pointer;
	display       : block;
	font-weight   : 400;
	margin        : 1em 0;
	padding       : 2em 0em;
	text-align    : center;
	transition    : background 0.3s, color 0.3s;
}

#file-drag:hover {
	background : #ddd;
}

#file-drag:hover,
#file-drag.hover {
	border-color : #3070A5;
	border-style : solid;
	box-shadow   : inset 0 3px 4px #888;
	color        : #3070A5;
}

#file-progress {
	display : none;
	margin  : 1em auto;
	width   : 100%;
}

#file-upload-btn {
	margin : auto;
}

#file-upload-btn:hover {
	background : #4499c9;
}

#file-upload-form {
	margin : auto;	
	width  : 100%;
}

progress {
	appearance    : none;
	background    : #eee;
	border        : none;
	border-radius : 3px;
	box-shadow    : 0 2px 5px rgba(0, 0, 0, 0.25) inset;
	height        : 30px;
}

progress[value]::-webkit-progress-value {
	background :
		-webkit-linear-gradient(-45deg, 
			transparent 33%,
			rgba(0, 0, 0, .2) 33%, 
			rgba(0,0, 0, .2) 66%,
			transparent 66%),
		-webkit-linear-gradient(right,
			#005f95,
			#07294d);
	background :
		linear-gradient(-45deg, 
			transparent 33%,
			rgba(0, 0, 0, .2) 33%, 
			rgba(0,0, 0, .2) 66%,
			transparent 66%),
		linear-gradient(right,
			#005f95,
			#07294d);
	background-size : 60px 30px, 100% 100%, 100% 100%;
	border-radius   : 3px;
}

progress[value]::-moz-progress-bar {
	background :
	-moz-linear-gradient(-45deg, 
		transparent 33%,
		rgba(0, 0, 0, .2) 33%, 
		rgba(0,0, 0, .2) 66%,
		transparent 66%),
	-moz-linear-gradient(right,
		#005f95,
		#07294d);
	background :
		linear-gradient(-45deg, 
			transparent 33%,
			rgba(0, 0, 0, .2) 33%, 
			rgba(0,0, 0, .2) 66%,
			transparent 66%),
		linear-gradient(right,
			#005f95,
			#07294d);
	background-size : 60px 30px, 100% 100%, 100% 100%;
	border-radius   : 3px;
}

/* ul {
	list-style-type : none;
	margin          : 0;
	padding         : 0;
} */
input[type="submit"] {
    padding: 8px 0px;
    width: 100%;
    border: none;
    background-color: #a13f43;
    color: white;
    margin-top: 48px;
}
/*Raheek*/
#forminput {
    width: 100%;
    background-color: transparent !important;
    padding: 5px;
    font-size: 17.75px;
    border: 1px solid #b0a5a5;
    border-radius: 5px;
    box-shadow: none !important;
}	
label {
    font-weight: 300 !important;
    color: black;
    font-size: 15px !important;
}input[type="submit"] {
    padding: 8px 0px;
    width: 100%;
    border: 2px solid #67454e !important;
    background-color: #a13f43;
    border-radius: 5px !important;
    color: white;
    margin-top: 48px;
    font-size: 16px !important;
}
table, th, td {
	border: 1px solid #b0a5a5 !important;
  padding:20px;
  border-collapse: collapse;
  text-align: center;
}
tr:nth-child(even) {
  background-color: #eae9e9 ;
}
td>h5 {
    color: #6c6c6c;
}
</style>

<form action="process.php" name="myform" method="POST" onsubmit="return validateForm()"  enctype="multipart/form-data">
<div class="container">
<div class="row formhead" >
<h1 class="formh1">Fill out this form and get the best buy deal from us for your vehicle</h1>
</div>
</div>


<div class="container"  style="overflow-x:auto">

<table class="table" >
<h3 style="color:#a13f43; font-weight:bolder;">Your Vehicle Information</h3> 

  <tr>
    <td><h5 >Vehcile VIN</h5></td>
	<td><h5 >Maker</h5></td>
	<td><h5 >Year</h5></td>
	<td><h5>Model</h5></td>
	<td><h5 >Engine</h5></td>
	<td><h5 >Style</h5></td>
	<td><h5 >Made in</h5></td>
	<td><h5 >Miles</h5></td>
	<td><h5 >Zip Code</h5></td>
	



    

    
    
  </tr>
  <tr>

    <td><h5><?php echo $vin ?></h5></td>
	<td><h5><?php echo $make ?></h5></td>
	<td><h5><?php echo $year ?></h5></td>
	<td><h5><?php echo $model ?></h5></td>
	<td><h5><?php echo $engine ?></h5></td>
	<td><h5><?php echo $style ?></h5></td>
	<td><h5><?php echo $madein ?></h5></td>
	<td><h5><?php echo $miles ?></h5></td>
	<td><h5><?php echo $zipcode ?></h5></td>


	<input type="hidden" value="<?php echo $vin; ?>" name="vin">
	<input type="hidden" value="<?php echo $make; ?>" name="make">
	<input type="hidden" value="<?php echo $year; ?>" name="year">
	<input type="hidden" value="<?php echo $model; ?>" name="model">
	<input type="hidden" value="<?php echo $engine; ?>" name="engine">
	<input type="hidden" value="<?php echo $style; ?>" name="style">
	<input type="hidden" value="<?php echo $madein; ?>" name="madein">
	<input type="hidden" value="<?php echo $miles; ?>" name="miles">
	<input type="hidden" value="<?php echo $zipcode; ?>" name="zipcode">

  </tr>
</table>
</div>


<br>

<div class="container">
<div class="row">
    <div class="col-md-6">
    <!-- <h3 style="color:#a13f43; font-weight:600;">Your Vehicle Information</h3> 
    <h5 class="formh5">Vehcile VIN: <strong>  <?php echo $vin ?></h5></strong>
    <h5 class="formh5">Maker:<strong>  <?php echo $make ?></h5></strong>
    <h5 class="formh5">Year:<strong>  <?php echo $year ?></h5></strong>
    <h5 class="formh5">Model:<strong>  <?php echo $model ?></h5></strong>
    <h5 class="formh5">Engine:<strong>  <?php echo $engine ?></h5></strong>
    <h5 class="formh5">Style:<strong>  <?php echo $style ?> </h5></strong>
    <h5 class="formh5">Made in:<strong>  <?php echo $madein ?></h5></strong> -->

	<!-- <h5> Are you replacing this vehicle?</h5>
        <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
        </label> -->

		<h5>Does your vehicle need any repairs?</h5>
        <label class="switch">
        <input type="checkbox" name="vehiclerepairs" id="additionalinput2"   onclick="checkCheckbox2()">
        <span class="slider round"></span>
        </label>

        <h5 class="filhalhid2"  >Estimate the cost of mechanical and/or cosmetic repairs?</h5>
        <input type="text" name="repaircost" class="filhalhid2"  id="forminput" value="$">



    </div>
    <div class="col-md-6">
        
    
        <h5>Does your car have a payoff with a bank or lender?</h5>
        <label class="switch">
        <input type="checkbox" name="payoff" id="additionalinput"   onclick="checkCheckbox()">
        <span class="slider round"></span>
        </label>

        <h5 class="filhalhid"  >Payoff Amount</h5>
        <input type="text" name="payoffamount" class="filhalhid"   id="forminput" value="$">
        
    </div>
	<div class="col-md-4">

	</div>

</div>
<br>
    <div class="row">
        <div class="col-md-12">
            <h5>Previous Damage History</h5>
            <button type="button" class="btn_choose_sent bg_btn_chose_1">
                <input type="radio" name="pdamage" checked  class="pok" value="No Previous Damage"  />No Previous Damage
            </button>
            <button type="button" class="btn_choose_sent bg_btn_chose_2">
                <input type="radio" name="pdamage" class="pok" value="Minor Damage" />Minor Damage
            </button>
            <button type="button" class="btn_choose_sent bg_btn_chose_3">
                <input type="radio" name="pdamage" class="pok" value="Accident History" />Accident History
            </button>
            <button type="button" class="btn_choose_sent bg_btn_chose_3">
                <input type="radio" name="pdamage" class="pok" value="Previous Airbag Deployed(Repaired)"/>Previous Airbag Deployed(Repaired)
            </button>
        </div>
    </div>

    <br><br> 
    <h5>Are you replacing this vehicle?</h5>
        <label class="switch">
        <input type="checkbox" id="additionalinput2"  name="replacevehicle">
        <span class="slider round"></span>
        </label>
<!-- 
        <h5 class="filhalhid2"  >Estimate the cost of mechanical and/or cosmetic repairs?</h5>
        <input type="text" class="filhalhid2" id="forminput" value="$"> -->
  <br><br>

        <p>If your vehicle has positive after market options (lift kit, supercharger, modified exhaust, etc.), or negative conditions (service lights, body damage, accident on carfax/auto check, hail damage, etc.) please disclose below. The amount you disclose for estimated repairs is crucial to the accuracy of our offer.</p>
        <input type="text" id="forminput"  placeholder="Color, options, trim level, leather, roof, nav, tire condition, describe any problems that we need to know." name="cardesc">

<br><br>

        <h5>Upload your car photos</h5>
          

          <!-- CHANGE THE ACTION TO THE PHP SCRIPT THAT WILL PROCESS THE FILE VIA AJAX -->
<!-- <form id="file-upload-form" action="" > -->
	<input id="file-upload"  type="file"  name="image[]"  multiple />
	<label for="file-upload" id="file-drag">
		Select a file to upload
		<br />OR
		<br />Drag a file into this box
		
		<br /><br /><span id="file-upload-btn" class="button">Add a file</span>
	</label>
	
	<progress id="file-progress" value="0">
		<span>0</span>%
	</progress>
	
	<output for="file-upload" id="messages"></output>
<!-- </form> -->

<?php
// $fn = (isset($_SERVER['HTTP_X_FILE_NAME']) ? $_SERVER['HTTP_X_FILE_NAME'] : false);
// $targetDir = './';

// if ($fn) {
//           	if (isFileValid($fn)) {
//           		// AJAX call
//           		file_put_contents(
//           			$targetDir . $fn,
//           			file_get_contents('php://input')
//           		);
//           		removeFile($fn);
//           	}
// }

// function removeFile($file) {
// 	unlink($targetDir . $file);
// }
?>


<h5>You Personal Information</h5>
	<div class="row">
	 <br>
	<div class="col-md-6">
	<label for="">First Name</label>
	<input type="text" id="forminput" name="fname" required>
	
	<label for="">Email</label>
	<input type="text" id="forminput" name="email" required>
	
	</div>
	<div class="col-md-6">
	<label for="">Last Name</label>
	<input type="text" id="forminput" name="lname" required>
	
	<label for="">Phone</label>
	<input type="text" id="forminput" name="phone" required>
	</div>

	</div>
	<input class="btn" type="submit" value="Submit" name="subform">
</div>  
</form>
<div style="height:100px;"></div>


<script>

function validateForm() {
  var x = document.forms["myform"]["image[]"].value;
  if (x == "") {
    alert("Kindly upload images");
    return false;
  }
}

</script>


<script>
    function checkCheckbox(){
 var yes = document.getElementById("additionalinput");  
  if (yes.checked == true){  
    console.log("Hpgadsa");
    $(".filhalhid").addClass("visibleon");
  }
  else{
    console.log("ok");
    $(".filhalhid").removeClass("visibleon");
  }  
}

function checkCheckbox2(){
 var yes = document.getElementById("additionalinput2");  
  if (yes.checked == true){  
    console.log("Hpgadsa");
    $(".filhalhid2").addClass("visibleon");
  }
  else{
    console.log("ok");
    $(".filhalhid2").removeClass("visibleon");
  }  
}
(function() {
	function Init() {
		var fileSelect = document.getElementById('file-upload'),
			fileDrag = document.getElementById('file-drag'),
			submitButton = document.getElementById('submit-button');

		fileSelect.addEventListener('change', fileSelectHandler, false);

		// Is XHR2 available?
		var xhr = new XMLHttpRequest();
		if (xhr.upload) 
		{
			// File Drop
			fileDrag.addEventListener('dragover', fileDragHover, false);
			fileDrag.addEventListener('dragleave', fileDragHover, false);
			fileDrag.addEventListener('drop', fileSelectHandler, false);
		}
	}

	function fileDragHover(e) {
		var fileDrag = document.getElementById('file-drag');

		e.stopPropagation();
		e.preventDefault();
		
		fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
	}

	function fileSelectHandler(e) {
		// Fetch FileList object
		var files = e.target.files || e.dataTransfer.files;

		// Cancel event and hover styling
		fileDragHover(e);

		// Process all File objects
		for (var i = 0, f; f = files[i]; i++) {
			parseFile(f);
			uploadFile(f);
		}
	}

	function output(msg) {
		var m = document.getElementById('messages');
		m.innerHTML = msg;
	}

	function parseFile(file) {
		output(
			'<ul>'
			+	'<li>Name: <strong>' + encodeURI(file.name) + '</strong></li>'
			+	'<li>Type: <strong>' + file.type + '</strong></li>'
			+	'<li>Size: <strong>' + (file.size / (1024 * 1024)).toFixed(2) + ' MB</strong></li>'
			+ '</ul>'
		);
	}

	function setProgressMaxValue(e) {
		var pBar = document.getElementById('file-progress');

		if (e.lengthComputable) {
			pBar.max = e.total;
		}
	}

	function updateFileProgress(e) {
		var pBar = document.getElementById('file-progress');

		if (e.lengthComputable) {
			pBar.value = e.loaded;
		}
	}

	function uploadFile(file) {

		var xhr = new XMLHttpRequest(),
			fileInput = document.getElementById('class-roster-file'),
			pBar = document.getElementById('file-progress'),
			fileSizeLimit = 1024;	// In MB
		if (xhr.upload) {
			// Check if file is less than x MB
			if (file.size <= fileSizeLimit * 1024 * 1024) {
				// Progress bar
				pBar.style.display = 'inline';
				xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
				xhr.upload.addEventListener('progress', updateFileProgress, false);

				// File received / failed
				xhr.onreadystatechange = function(e) {
					if (xhr.readyState == 4) {
						// Everything is good!
						
						// progress.className = (xhr.status == 200 ? "success" : "failure");
						// document.location.reload(true);
					}
				};

				// Start upload
				xhr.open('POST', document.getElementById('file-upload-form').action, true);
				xhr.setRequestHeader('X-File-Name', file.name);
				xhr.setRequestHeader('X-File-Size', file.size);
				xhr.setRequestHeader('Content-Type', 'multipart/form-data');
				xhr.send(file);
			} else {
				output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
			}
		}
	}

	// Check for the various File API support.
	if (window.File && window.FileList && window.FileReader) {
		Init();
	} else {
		document.getElementById('file-drag').style.display = 'none';
	}
})();
</script>


<?php
    include("footer.php");
?>

