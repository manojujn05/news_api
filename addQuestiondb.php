<?php
ob_start();
include("db.php"); 


$title = safe($conn,htmlspecialchars($_POST['title']));
$desc = safe($conn,htmlspecialchars($_POST['description']));
$catid = safe($conn,htmlspecialchars($_POST['categoryid']));
$source_name = safe($conn,htmlspecialchars($_POST['source_title']));
$source_link = safe($conn,htmlspecialchars($_POST['source_link']));
$videourl = safe($conn,htmlspecialchars($_POST['videourl']));
$datepost = safe($conn,htmlspecialchars($_POST['postdate']));

$newsimage = $_FILES['newsimage']['name']; 

if(!$newsimage){
    $newsimage='blank';
}
 
$query ="INSERT INTO `news`(title,image,category_id,source_title,source_link,videourl,description,postdate) VALUES ('$title','$newsimage','$catid','$source_name','$source_link','$videourl','$desc','$datepost')";
 
 //echo $query;die;
 $result =  mysqli_query($conn,$query); 
 
 if($result==1){   
    
     if(!($newsimage=='blank')){
    $file_path = 'upload/';
    $file_path = $file_path . basename( $_FILES['newsimage']['name']);    
    if(move_uploaded_file($_FILES['newsimage']['tmp_name'], $file_path)) {        
         header("Location: addQuestion.php?add_cdata=success");         
    } else{        
        header("Location: addQuestion.php?add_cdata=failed");
    }
     }else {
         header("Location: addQuestion.php?add_cdata=success");   
     }
 
} else {
    header("Location: addQuestion.php?add_cdata=failed");
        die();
}

function safe($conn,$value){
   return mysqli_real_escape_string($conn,$value);
} 

