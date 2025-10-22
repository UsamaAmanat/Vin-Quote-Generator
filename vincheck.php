<?php
	$postdata = http_build_query(
		array(
				'format' => 'json',
				'data' => '1FDAF57FXXEC55502'
			)
	);
	$opts = array('http' =>
		array(
			'method' => 'POST',
			'content' => $postdata
		)
	);
	$apiURL = "https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVINValuesBatch/";
	$context = stream_context_create($opts);
	$fp = fopen($apiURL, 'rb', false, $context);
	if(!$fp)
	{
		echo "in first if";
	}
	$response = @stream_get_contents($fp);
	if($response == false)
	{
		echo "in second if";
	}
    echo $response;
    $data = json_decode($response,true);
    
    echo $data["Results"][0]["Manufacturer"]; echo "<br>";
    echo $data["Results"][0]["Model"];echo "<br>";
    echo $data["Results"][0]["Make"];echo "<br>";
    echo $data["Results"][0]["ModelYear"];echo "<br>";
    echo $data["Results"][0]["Series"];echo "<br>";
    echo $data["Results"][0]["Doors"];echo "<br>";

    

?>