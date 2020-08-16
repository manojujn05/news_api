<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Host: http://modichat.com/newsjaaga/api/ ");
$header = getallheaders();
print_r($header);
if(($header['access_token'])){
    $token = $header['access_token'];
    include_once '../db.php';
   
    //getting the values 
    echo $sql = "select * from user where token='$token'";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result); 
            
            $response = array(
                "type" => "success",
                "message" => "User profile",
                "cities"  =>  json_encode($row)
            );
            http_response_code(200);
    } else {
            http_response_code(404);
            $response = array(
                "type" => "error",
                "message" => "Invalid credentials"
            );
    }

} else {
            http_response_code(404);
            $response = array(
                "type" => "error",
                "message" => "Unauthorized access."
            );
}

echo json_encode($response);
?>