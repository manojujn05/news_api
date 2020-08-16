<?php
ob_start();
$cid = '';
if (isset($_REQUEST['cid'])):
   if(!empty($_REQUEST['cid'])):     
     $cid = htmlspecialchars($_GET['cid']);
   else:
       header("Location: addCategory.php?delete=failed");
        die();
   endif;
   else:
       header("Location: addCategory.php?delete=failed");
        die();
endif;

include("db.php"); 


$selQuery = "select * from news where category_id=".$cid;


 $resultselQuery =  mysqli_query($conn,$selQuery); 
    if (mysqli_num_rows($resultselQuery) > 0) :
        
        header("Location: addCategory.php?delete=exists");
        die();
        
    else:
        $query ="DELETE FROM `category` where id=".$cid;
       $result =  mysqli_query($conn,$query);
        header("Location: addCategory.php?delete=success");
        die();
    endif;

