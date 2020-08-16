<?php
$conn = mysqli_connect('localhost', 'root', '', 'modict5p_newsg');
if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}
mysqli_select_db($conn, "modict5p_newsg");
?>

