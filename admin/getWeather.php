<?php
		if(isset($_GET))
		{
		extract($_GET);
		
		}
			

	// Replace with your API key
	$api_key = "e9de5e96860e4936addc93b5b9cdce52";
	$today=date('Y-m-d');
	
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api.weatherbit.io/v2.0/current?lat=$lat&lon=$long&key=$api_key",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	
));
echo "<h2>Json Format</h2><br>";
echo $json_string = curl_exec($curl);
$parsed_json = json_decode($json_string);

	
$forecasts = $parsed_json->data;
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else 
{
echo "<h2>Json Decoded HTML Format</h2><br>";
foreach ($forecasts as $forecast) 
		{
		echo "City: ".$date = $forecast->city_name."<br>";
		echo "Date: ".$date = $forecast->datetime."<br>";
		echo "Description: ".$desc = $forecast->weather->description."<br>";
		echo "Clouds: ".$desc = $forecast->clouds."<br>";
		echo "Temperature: ".$desc = $forecast->temp."<br>";
		echo "Feels like: ".$desc = $forecast->app_temp."<br>";
		echo "Humidity: ".$desc = $forecast->rh."%<br>";
		echo "Wind Speed: ".$desc = $forecast->wind_spd."m/s<br>";
		echo "Wind Direction: ".$desc = $forecast->wind_cdir_full."<br>";
		echo "Visibility: ".$desc = $forecast->vis."KM<br>";
		echo "AQI: ".$desc = $forecast->aqi."<br>";
		echo "Precipitation: ".$desc = $forecast->precip."<br>";
		}
	
}

?>