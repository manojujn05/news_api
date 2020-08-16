<?php
$serverKey = '5f2b5cdbe5194f10b3241568fe4e2b24';
function isTheseParametersAvailable($params){
		
    foreach($params as $param){
        if(!isset($_POST[$param])){
            return false; 
        }
    }
    return true; 
}
if(isset($_POST)) {
    include_once '../db.php';
    require_once('../includes/jwt.php') ;
           
    // create a token
    $payloadArray = array();
    $payloadArray['userId'] = $email;
    $nbf = strtotime("-1 week");
    $exp = strtotime("+1 week");
    if (isset($nbf)) {$payloadArray['nbf'] = $nbf;}
    if (isset($exp)) {$payloadArray['exp'] = $exp;}
    $token = JWT::encode($payloadArray, $serverKey);

    // return to caller
    // $returnArray = array('token' => $token);
    $jsonEncodedReturnArray = json_encode($token);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
   
    if(isTheseParametersAvailable(array('email','password'))){
					
        //getting the values 
        $email = $_POST['email']; 
        $password = md5($_POST['password']);
        echo $sql = "select email from user where email= '$email' and pass = '$password'";
        $result = mysqli_query($conn,$sql);

        echo $usql = "update user set token= '$jsonEncodedReturnArray' where email = '$email'";
        $result1 = mysqli_query($conn,$usql);
       
        if (mysqli_num_rows($result) > 0) {
                $response = array(
                    "type" => "success",
                    "token" => $jsonEncodedReturnArray,
                    "message" => "Login successful."
                );
        } else {
                $response = array(
                    "type" => "error",
                    "message" => "Invalid username/password."
                );
        }
        } else {
                $response = array(
                    "type" => "error",
                    "message" => "Required parameters are not available."
                );
        }
        echo json_encode($response);
}
?>