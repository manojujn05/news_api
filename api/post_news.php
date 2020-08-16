<?php
// required headers
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Host: http://modichat.com/newsjaaga/api/ ");
$header = getallheaders();
print_r($header);

function isTheseParametersAvailable($params){
		
    foreach($params as $param){
        if(!isset($_POST[$param])){
            return false; 
        }
    }
    return true; 
}
    if(($header['access_token']))
    {
        $token = $header['access_token'];
        include_once '../db.php';
        // print_r($token);
        //getting the values 
        $sql = "select Id from user where token='$token'";
        $result  = mysqli_query($conn,$sql);
        $user_id = mysqli_fetch_row($result);
        if(isset($user_id)){
        $user  = $user_id[0];
       
        if(isTheseParametersAvailable(array('category_id','title','description','image','source_title','source_link','videourl','city','state')))
        {
         include_once '../db.php';
    
       
					
            //getting the values 
            $category_id    = $_POST['category_id'];
            $title          = $_POST['title'];
            $description    = $_POST['description'];
            $image          = $_POST['image'];
            $source_title   = $_POST['source_title'];
            $source_link    = $_POST['source_link'];
            $videourl       = $_POST['videourl'];
            $city           = $_POST['city'];
            $state          = $_POST['state'];

           

            if (mysqli_num_rows($result) > 0) 
            {
            // Email already exists   

                $sql = "insert into news (category_id,title,description,image,source_title,source_link,videourl,city,state ) values('$category_id','$title','$description','$image','$source_title','$source_link','$videourl','$city','$state')";
                $result = mysqli_query($conn, $sql);
                if($result)
                {
                    http_response_code(200);
                    $response = array(
                        "type" => "success",
                        "message" => "News posted successfully."
                    );
                }

                echo $point_sql     = "update user set points = points + 5 where Id = $user";
                $result_update = mysqli_query($conn, $point_sql);
            } else {
                http_response_code(404);
                $response = array(
                    "type"    => "error",
                    "message" => "Invalid credentials."
                );
            
            }
         
        } else 
        {
            http_response_code(404);
            $response = array(
                "type" => "error",
                "message" => "Required parameters are missing"
            );
        }
    }else {
        http_response_code(404);
            $response = array(
                "type" => "error",
                "message" => "Invalid credentials or token expire, please login again"
            );
    }
    } else 
    {
            http_response_code(404);
            $response = array(
                "type" => "error",
                "message" => "Unauthorized access."
            );
    }
    echo json_encode($response);
?>