<?php
session_start();
// $_SESSION['$useremail'];
// include "dbconn.php";

// if ($conn) {

//     $getuser = "SELECT * FROM user WHERE email = '".$_SESSION['$useremail']."'";
//     $getuserdata = mysqli_query($conn, $getuser);
//     $getuser = mysqli_fetch_assoc($getuserdata);

//     $username = $getuser['username'];
//     $usercontact = $getuser['contact'];
//     $useremail = $getuser['email'];

//     $id = $_GET['id'];

//     //  to display id result
//     $sql = "select * from `product` where product_id=$id";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_assoc($result);

//     $product_name = $row['product_name'];
//     $product_price = $row['product_price'];
//     $product_category = $row['category'];
//     $product_image = $row['image'];

//     $sqli = "INSERT INTO manageitem(`username`,`useremail`,`productname`,`productprice`,`category`,`product_image`)VALUES('$username','$useremail','$product_name','$product_price','$product_category','$product_image')";
//     $result1 = mysqli_query($conn, $sqli);

//     header("Location: user.php");

// }
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {
            $myproducts = array_column($_SESSION['cart'], 'product_name');
            if (in_array($_POST['product_name'], $myproducts)) {
                echo "<script>window.location.href='user.php';</script>";
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('product_name' => $_POST['product_name'], 'price' => $_POST['price'], 'qty' => 1, 'image' => $_POST['image'], 'brand' => $_POST['category']);
                echo "<script>window.location.href='user.php';</script>";
            }
        } else {
            $_SESSION['cart'][0] = array('product_name' => $_POST['product_name'], 'price' => $_POST['price'], 'qty' => 1, 'image' => $_POST['image'], 'brand' => $_POST['brand']);
            echo "<script>window.location.href='user.php';</script>";
        }
    }

    if (isset($_POST['remove'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_name'] == $_POST['product_name']) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>
                window.location.href='payment.php';
                </script>";
            }
        }
    }
}
