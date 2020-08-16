<?php
$response = array();
require 'inc/config.php';
    $result = mysqli_query($con,"SELECT * FROM corona_cases where id='1';");
	if (mysqli_num_rows($result) > 0) 
	{
    $response["cases"] = array();
    while ($row = $result->fetch_assoc()) 
	{
            $cases = array();
            $cases["total_confirmed"] = $row["total_cases"]; 
            $cases["total_discharged"] = $row["total_discharged"];                
            $cases["total_deaths"] = $row["total_deaths"];                
            $cases["total_active"] = $row["total_active"];                
            $cases["updated_on"] = $row["updated_on"];                
			array_push($response["cases"], $cases);
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
