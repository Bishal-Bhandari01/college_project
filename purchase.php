<?php
include './dbconn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['purchase'])) {
        $sqli = "INSERT INTO `ordermanager`(`fullname`, `address`, `contactno.`, `paymode`) VALUES ('" . $_POST['fname'] . "','" . $_POST['address'] . "','" . $_POST['contact'] . "','Cash On Delivery')";
        if (mysqli_query($conn, $sqli)) {
            $ordersql = "INSERT INTO `userorder`(`product_name`, `product_price`, `quantity`) VALUES (?,?,?)";
            $stmt = mysqli_prepare($conn, $ordersql);
            if ($stmt) {
                mysqli_stmt_bind_param($product_name,$price,$qty,$total);
                foreach ($_SESSION['cart'] as $key => $value){
                    $product_name = $value['product_name'];
                    $price =  $value['price'];
                    $qty = $value['qty'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo "<script>window.location.href='user.php';</script>";
            } else {
                echo "<script>
                window.location.href='payment.php'
                </script>";
            }
        }
        else
        {
            echo "<script>window.location.href='payment.php'</script>";
        }
    }
}
