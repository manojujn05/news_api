<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../db.php';

					
        //getting the values 
      
        $sql = "select id,category_name from category";
        $result = mysqli_query($conn,$sql);
       
        if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_row($result)) {
                    $cities[] = $row;  
                }
               
                $response = array(
                    "type" => "success",
                    "message" => "Categories list",
                    "category"  =>  json_encode($cities)
                );
                http_response_code(200);
        } else {
                http_response_code(200);
                $response = array(
                    "type" => "error",
                    "message" => "No records found."
                );
        }
       
        // echo json_encode($response);

echo json_encode($response);
?>