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

//getting the values 
$sql = "select distinct(city_state) from cities order by city_state";
$result = mysqli_query($conn,$sql);
$nstate = [];
if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          
           array_push($nstate, 
           ['state' => $row['city_state']]);
        }
       
        $response = array(
            "type"    => "success",
            "message" => "State list",
            "state"   =>  json_encode($nstate)
        );
            
        http_response_code(200);
} else {
        http_response_code(200);
        $response = array(
            "type"    => "error",
            "message" => "No records found."
        );
}

echo json_encode($response, JSON_FORCE_OBJECT);
?>