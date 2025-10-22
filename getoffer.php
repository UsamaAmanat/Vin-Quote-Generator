<?php
    include("header.php");
?>

<style>
.fade:not(.show) {
    opacity: 1;
}

label {
    color: black;
}
.textbox-form2 {
    color: black;
    background-color: #ffffff99;
    margin-top: 0px;
    width: 100%;
    padding: 8px;
    /* border-radius: 7px; */
    border: 1px solid #857c7c;
}
input[type="submit"] {
    padding: 8px 0px;
    width: 100%;
    border: 2px solid #67454e !important;
    background-color: #a13f43;
    border-radius: 5px !important;
    color: white;

    font-size: 16px !important;
}
</style>

<div style="height:100px"></div>

<div class="container">
  <div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>VIN not found!</strong> We could not find your VIN with the information you provided.
  </div>

<h5>Continue selling your vehicle without VIN/Plate</h5>

<form action="form.php" method="POST">
<div class="row">
	 <br>
	<div class="col-md-6">
    <label for="">Type</label>
    <select name="statecode" style="height: 44px;" class="textbox-form2" required ><option disabled selected hidden value="">Select Vehicle Type</option> <option value="">Car</option><option value="">Truck</option><option value="">RV</option><option value="">SUV</option><option value="">Motorcycle</option> </select>

	
	
	<label for="">Year</label>
	<input type="text" id="forminput" name="year" required>
	
	</div>
	<div class="col-md-6">
	<label for="">Model</label>
	<input type="text" id="forminput" name="model" required> 
	
	<label for="">Maker</label>
	<input type="text" id="forminput" name="make" required>
	</div>

	</div>


    <div class="row">
	 <br>
	<div class="col-md-6">
	<label for="">Miles</label>
	<input type="text" id="forminput" name="miles" required>

	
	</div>
	<div class="col-md-6">
	<label for="">Zip</label>
	<input type="text" id="forminput" name="zip" required>
	</div>
	</div>
    <br>
    <input type="submit" value="Submit" class="btn" name="submitwvin" required>

    </form>








  </div>
<div style="height:100px"></div>
<?php
    include("footer.php");
?>

