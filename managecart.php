<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {

        } else {
            $_SESSION['cart'][0] = array(
                'item_name' => $_POST['producthidden_name'],
                'item_id' => $_GET['id'],
                'item_price' => $_POST['producthidden_price'],
                'item_quantity' => $_POST['quantity']
            );
            print_r($_SESSION['cart']);
        }
    }
}
?>