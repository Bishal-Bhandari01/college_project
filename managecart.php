<?php
session_start();
$_SESSION['$useremail'];
include "dbconn.php";

if ($conn) {

    $getuser = "SELECT * FROM user WHERE email = '".$_SESSION['$useremail']."'";
    $getuserdata = mysqli_query($conn, $getuser);
    $getuser = mysqli_fetch_assoc($getuserdata);

    $username = $getuser['username'];
    $usercontact = $getuser['contact'];
    $useremail = $getuser['email'];

    $id = $_GET['id'];
    
    //  to display id result
    $sql = "select * from `product` where product_id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $product_name = $row['product_name'];
    $product_price = $row['product_price'];
    $product_category = $row['category'];
    $product_image = $row['image'];
    
    $sqli = "INSERT INTO manageitem(`username`,`useremail`,`productname`,`productprice`,`category`,`product_image`)VALUES('$username','$useremail','$product_name','$product_price','$product_category','$product_image')";
    $result1 = mysqli_query($conn, $sqli);

    header("Location: user.php");

}