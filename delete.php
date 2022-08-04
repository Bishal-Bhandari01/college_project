<?php include "./dbconn.php";
$id=$_GET['id'];
$delQuery = "DELETE FROM product WHERE product_id=$id";
mysqli_query($conn,$delQuery);
header("location: addcategory.php");?>
