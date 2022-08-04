<?php
include './dbconn.php';
$id = $_GET['id'];
$del = "DELETE FROM manageitem WHERE id='$id'";
mysqli_query($conn, $del);
if(mysqli_query($conn, $del)){
    header('Location: ./payment.php');
}
