<?php
ob_start();
$quesid = '';
if (isset($_REQUEST['quesid'])):
   if(!empty($_REQUEST['quesid'])):     
     $quesid = htmlspecialchars($_GET['quesid']);
   else:
       header("Location: home.php?delete=failed");
        die();
   endif;
   else:
       header("Location: home.php?delete=failed");
        die();
endif;

include("db.php"); 


        $query ="DELETE FROM `news` where guide=".$quesid;
       $result =  mysqli_query($conn,$query);
        header("Location: home.php?delete=success");
        die();
  

