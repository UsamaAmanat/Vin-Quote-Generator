            <form method="POST">
                <input class="textbox-form2" name="platenum"  type="text" placeholder="Enter Plate Number" required>
                <select name="statecode" class="form-control"><option value="">-- Select --</option> <option value="AL">AL</option> <option value="AK">AK</option> <option value="AZ">AZ</option> <option value="AR">AR</option> <option value="CA">CA</option> <option value="CO">CO</option> <option value="CT">CT</option> <option value="DE">DE</option> <option value="DC">DC</option> <option value="FL">FL</option> <option value="GA">GA</option> <option value="HI">HI</option> <option value="ID">ID</option> <option value="IL">IL</option> <option value="IN">IN</option> <option value="IA">IA</option> <option value="KS">KS</option> <option value="KY">KY</option> <option value="LA">LA</option> <option value="ME">ME</option> <option value="MD">MD</option> <option value="MA">MA</option> <option value="MI">MI</option> <option value="MN">MN</option> <option value="MS">MS</option> <option value="MO">MO</option> <option value="MT">MT</option> <option value="NE">NE</option> <option value="NV">NV</option> <option value="NH">NH</option> <option value="NJ">NJ</option> <option value="NM">NM</option> <option value="NY">NY</option> <option value="NC">NC</option> <option value="ND">ND</option> <option value="OH">OH</option> <option value="OK">OK</option> <option value="OR">OR</option> <option value="PA">PA</option> <option value="RI">RI</option> <option value="SC">SC</option> <option value="SD">SD</option> <option value="TN">TN</option> <option value="TX">TX</option> <option value="UT">UT</option> <option value="VT">VT</option> <option value="VA">VA</option> <option value="WA">WA</option> <option value="WV">WV</option> <option value="WI">WI</option> <option value="WY">WY</option></select>
                <input class="textbox-form2" name="zipcodenum" type="text" placeholder="Enter ZIP Code" required>
                <input class="textbox-form2" name="milesnum" type="text" placeholder="Enter Miles" >
                <input class="textbox-form3" name="submitplate" type="submit">
              </form>



<?php

if(isset($_POST['submitplate'])){

	$plate = $_POST['platenum'];
	$state = $_POST['statecode'];

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
		"x-rapidapi-key: 9c6aa90608msh3af7b03bc632227p148534jsna318158200ae"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$data = json_decode($response,true);
    print_r($data);
    echo "<br>";
	echo $data["data"]["vin"]; 
}




}	

?>