<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Host: http://modichat.com/newsjaaga/api/ ");
$city_sql = '';
$state_sql = '';
if(isset($_GET['city'])) {
    $city = $_GET['city'];
    $city_sql = "and city = '$city'";
}    
if(isset($_GET['state'])) {
    $state = $_GET['state'];
    $state_sql = "and state = '$state'";
}   
if(isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}   

include_once '../db.php';
//getting the values 
$sql = "SELECT guide,category_name, title, description, image_type, image, source_title, source_link, videourl, city, state, postdate FROM `news`, category WHERE news.category_id = category.id ". $city_sql . $state_sql ."order by guide";

$result = mysqli_query($conn,$sql);
$images = array();
if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $news[] = $row;  
            // print_r($row);
            if($row['image_type'] == 3)
            {
                $imgs_sql = "SELECT image from gallery where news_id =".$row['guide'];
                $imgs_res = mysqli_query($conn,$imgs_sql);
                while ($imgs = mysqli_fetch_assoc($imgs_res)) {
                    $images[] = $imgs; 
                }
                if(count($images) > 0){
                array_push($news,$images);
                }
            }
        }
        
        //print_r($news);
        $response = array(
            "type" => "success",
            "message" => "News listing",
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
print_r($response);
 //header('Content-type: application/json');


?>