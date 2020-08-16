<?php
$response = array();
require 'inc/config.php';
    $result = mysqli_query($con,"SELECT * FROM cities_list;");
	if (mysqli_num_rows($result) > 0) 
	{
    $response["cities"] = array();
    while ($row = $result->fetch_assoc()) 
	{
            $cities = array();
            $cities["city_id"] = $row["city_id"]; 
            $cities["city_name"] = $row["city_name"];                
			array_push($response["cities"], $cities);
     }
           $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
	} 
	else 
	{
    // no tagss found
    $response["success"] = 0;
    $response["message"] = "No tags found";
    // echo no users JSON
    echo json_encode($response);
	}
