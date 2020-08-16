<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Host: http://modichat.com/newsjaaga/api/ ");
$header = getallheaders();

if(($header['access_token']))
    {
        $token = $header['access_token'];
        include_once '../db.php';
        $sql = "select Id from user where token='$token'";
        $result  = mysqli_query($conn,$sql);
        $user_id = mysqli_fetch_row($result);
        // print_r($user_id);
        //getting the values 
        $sql = "SELECT category_name, title, description, image, source_title, source_link, videourl, city, state, postdate FROM `news`, category WHERE news.category_id = category.id and user_Id = $user_id[0]";

        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $news[] = $row;  
                }
                
                $response = array(
                    "type" => "success",
                    "message" => "News listing for user",
                    "News"  =>  json_encode($news)
                );
                http_response_code(200);
        } else {
                http_response_code(200);
                $response = array(
                    "type" => "success",
                    "message" => "No records found !"
                );
        }
    } else {

    }    


echo json_encode($response);
?>