<?php
$response = array();
require 'inc/config.php';
    if(isset($_GET['cityid']))
	{
	extract($_GET);
	$qs="select * from news INNER JOIN cities_list ON news.city_id=cities_list.city_id where news.city_id='$cityid'";
	$data = mysqli_query($con,$qs);
	if (mysqli_num_rows($data) > 0) 
	{
    $response["posts"] = array();
    while ($row = mysqli_fetch_array($data)) 
	{
            $quotes = array();
            $quotes["guid"] = $row["guide"]; 
            $quotes["title"] = $row["title"];                
            $quotes["category"] = $row["category_id"];     
            $quotes["city_name"] = $row["city_name"];     
            $quotes["postdate"] = $row["postdate"];
			$quotes["source_title"] = $row["source_title"];
            $quotes["source_link"] = $row["source_link"];
		    $quotes["imgurl"] = $row["image"];
		    $quotes["description"] = $row["description"];
            $quotes["video_id"] = $row["videourl"];                
			array_push($response["posts"], $quotes);
     }
           $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
	} 
	else 
	{
    // no tagss found
    $response["success"] = 0;
    $response["message"] = "No News posts found";
    // echo no users JSON
    echo json_encode($response);
	}
	}
	else
	{
	$response["success"] = 0;
    $response["message"] = "City id not given or found";
	 echo json_encode($response);
	}
	
