<?php
$response = array();
require 'db.php';

$category_id = $_GET['guid'];

    $result = mysqli_query($conn,"SELECT * FROM news where guide =".$category_id);
 
    if (mysqli_num_rows($result) > 0) {
        
    $response["data"] = array();
    
    while ($row = $result->fetch_assoc()) {             
            $quotes = array();
			$file_folder = "upload/";
			$full_path = 'http://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/'.$file_folder;
			$quotes["guid"] = $row["guide"]; 
            $quotes["title"] = $row["title"];                
            $quotes["category"] = $row["category_id"];     
            $quotes["postdate"] = $row["postdate"];
			$quotes["source_title"] = $row["source_title"];
            $quotes["source_link"] = $row["source_link"];
		    $quotes["imgurl"] = $full_path.$row["image"];
		    $quotes["description"] = $row["description"];
            $quotes["video_id"] = $row["videourl"];  
          array_push($response["data"], $quotes);
          }
           

    // echoing JSON response
    echo json_encode($response);
} else {
    // no tagss found
    $response["success"] = 0;
    $response["message"] = "No tags found";
    // echo no users JSON
    echo json_encode($response);
}

