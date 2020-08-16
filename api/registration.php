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
       
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
   
    if(isTheseParametersAvailable(array('name','email','mobile','password'))){
					
        //getting the values 
        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $password = md5($_POST['password']);
        $mobile = $_POST['mobile']; 
        $sql = "select email from user where email= '$email'";
        $result = mysqli_query($conn,$sql);
       
        if (mysqli_num_rows($result) > 0) {
         // Email already exists   
         $response = array(
            "type" => "error",
            "message" => "Email already in use."
        );
        } else {
            require_once('../includes/jwt.php') ;
           
            // create a token
            $payloadArray = array();
            $payloadArray['userId'] = $email;
            if (isset($nbf)) {$payloadArray['nbf'] = $nbf;}
            if (isset($exp)) {$payloadArray['exp'] = $exp;}
            $token = JWT::encode($payloadArray, $serverKey);

            // return to caller
            // $returnArray = array('token' => $token);
            $jsonEncodedReturnArray = json_encode($token);
            $sql = "insert into user (name,email,mobile,pass,token) values('$name','$email','$mobile','$password','$jsonEncodedReturnArray')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $response = array(
                    "type" => "success",
                    "token" => $jsonEncodedReturnArray,
                    "message" => "You have registered successfully."
                );
            }
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