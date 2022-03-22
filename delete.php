<?php include "./dbconn.php";

$id=$_GET['id'];
$delQuery = "DELETE FROM product WHERE product_id=$id";
if(mysqli_query($conn, $delQuery)){
    echo "<script>alert('successfully deleted');</script>";
}
else{
    echo "<script>alert('Unable to delete');</script>";
}
header("location: addcategory.php");?>
