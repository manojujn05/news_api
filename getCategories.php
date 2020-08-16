<?php
$response = array();
require 'db.php';
    $result = mysqli_query($conn,"SELECT * FROM category;")  ;
 
    if (mysqli_num_rows($result) > 0) {
        
    $response["category"] = array();
    
    while ($row = $result->fetch_assoc()) {
             
            $category = array();
            $catid = $row["id"]; 
            $category["id"] = $catid;
            $category["category_name"] = $row["category_name"];                
            $category["category_image"] = $row["category_image"];     
            
           
          array_push($response["category"], $category);
          }
           $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no tagss found
    $response["success"] = 0;
    $response["message"] = "No tags found";
    // echo no users JSON
    echo json_encode($response);
}
