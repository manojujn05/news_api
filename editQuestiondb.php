<?php

ob_start();
include("db.php");
$qid = safe($conn,htmlspecialchars($_POST['qid']));
$title = safe($conn,htmlspecialchars($_POST['title']));
$description = safe($conn,htmlspecialchars($_POST['description']));
$catid = safe($conn,htmlspecialchars($_POST['categoryid']));
$source_name = safe($conn,htmlspecialchars($_POST['source_title']));
$source_link = safe($conn,htmlspecialchars($_POST['source_link']));
$videourl = safe($conn,htmlspecialchars($_POST['videourl']));
$datepost = safe($conn,htmlspecialchars($_POST['postdate']));
$quesimage = $_FILES['quesimage']['name'];
 


$query = '';
if ($quesimage) :
    $query = "UPDATE news set title='$title',description='$description',category_id='$catid',source_title='$source_name',source_link='$source_link',videourl='$videourl',postdate='$datepost',image='$quesimage' where guide=$qid";

else :
    $query = "UPDATE news set title='$title',description='$description',category_id='$catid',source_title='$source_name',source_link='$source_link',videourl='$videourl',postdate='$datepost' where guide=$qid";
endif;




$result = mysqli_query($conn, $query);


if ($result == 1) {
    if ($quesimage) {
        $file_path = 'upload/';

        $file_path = $file_path . basename($_FILES['quesimage']['name']);
        if (move_uploaded_file($_FILES['quesimage']['tmp_name'], $file_path)) {

            header("Location: home.php?add_rdata=success");
        } else {
            header("Location: home.php?add_rdata=failed");
        }
    }
 else {
        header("Location: home.php?add_cdata=success");
    }
    
} else {
    header("Location: home.php?add_cdata=failed");
    die();
}

function safe($conn, $value) {
    return mysqli_real_escape_string($conn,$value);
}
