<?php
ob_start();
include("db.php"); 
$categoryname='';
if (isset($_REQUEST['categoryname'])):
   if(!empty($_REQUEST['categoryname'])):     
     $categoryname = safe($conn,htmlspecialchars($_POST['categoryname']));
   else:
       header("Location: addCategory.php?add_cdata=empty");
        die();
   endif;
   else:
       header("Location: addCategory.php?add_cdata=empty");
        die();
endif;

$categoryimage = $_FILES['categoryimage']['name'];


 $query ="INSERT INTO `category`(category_name,category_image) VALUES ('$categoryname','$categoryimage')";
 $result =  mysqli_query($conn,$query); 

 
 if($result==1){    
        
         
   $file_path = 'upload/';

    $file_path = $file_path . basename( $_FILES['categoryimage']['name']);
    //echo $file_path;die;
    
    if(move_uploaded_file($_FILES['categoryimage']['tmp_name'], $file_path)) {
        
         header("Location: addCategory.php?add_cdata=success");         
    } else{        
        header("Location: addCategory.php?add_cdata=failed");
    }
 
} else {
    header("Location: addCategory.php?add_cdata=failed");
        die();
}

function safe($conn,$value){
   return mysqli_real_escape_string($conn,$value);
} 

