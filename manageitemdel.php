<?php

include './dbconn.php';

$manageid = $_GET['id'];
$del = "DELETE FROM manageitem WHERE id = $manageid";
mysqli_query($conn, $del);
header("location: payment.php");
?>