<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

function isTheseParametersAvailable($params){
		
    foreach($params as $param){
        if(!isset($_GET[$param])){
            return false; 
        }
    }
    return true; 
}

include_once '../db.php';

 if(isTheseParametersAvailable(array('state'))){
					
        //getting the values 
        $state = $_GET['state']; 
        $sql = "select city_name from cities where city_state= '$state'";
        $result = mysqli_query($conn,$sql);
       
        if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $cities[] = $row[0];  
                }
                $response = array(
                    "type" => "success",
                    "message" => "Cities list",
                    "cities"  =>  json_encode($cities)
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
}  else {
    http_response_code(400);
    $response = array(
        "type" => "error",
        "message" => "Required parameters are not available."
    );
}
echo json_encode($response);
?>