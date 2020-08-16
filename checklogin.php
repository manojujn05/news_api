<?php
ob_start();
$username = '';
$userpwd = '';
if (isset($_REQUEST['username'])):
   if(!empty($_REQUEST['username'])):     
     $username = htmlspecialchars($_GET['username']);
   else:
       header("Location: index.php?login=failed");
        die();
   endif;
   else:
       header("Location: index.php?login=failed");
        die();
endif;

if (isset($_REQUEST['userpwd'])):
   if(!empty($_REQUEST['userpwd'])):     
     $userpwd = htmlspecialchars($_GET['userpwd']);
      
   else:
       header("Location: index.php?login=failed");
        die();
   endif;
   else:
       header("Location: index.php?login=failed");
        die();
endif;



$db_uname='';
$db_pwd='';

require 'db.php';

    $result = mysqli_query($conn,"SELECT * FROM login_details");    
    
    if (mysqli_num_rows($result) > 0) {       
  
    while ($row = $result->fetch_assoc()) {   
        $db_uname = $row["uname"];     
        $db_pwd = $row["pwd"];    
     }    
    }
    
    
     
    if($db_uname==$username):
        if($db_pwd==$userpwd):
            session_start();
            $_SESSION['usr'] = $username;
            header("Location: home.php?login=success");
        die();
        else:
            header("Location: index.php?login=failed");
        die();
        endif;
        else:
            header("Location: index.php?login=failed");
        die();
    endif;