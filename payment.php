<?php
include "./dbconn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Payment</title>
    <link rel="stylesheet" href="./assets/css/payment.css">
</head>

<body>
    <?php
    include "./header1.php";
    $_SESSION['$useremail'];

    ?>

    <main class="home">
        <div class="max-width">
            <div class="whole">
                <div class="table-content">
                    <table style="
                    width: 90%;
                    text-align: center;">
                        <h1 style="text-align:center; margin-bottom: 5px;">My Cart</h1>
                        <thead>
                            <td>S.N</td>
                            <td>Image</td>
                            <td>Name</td>
                            <td>Brand</td>
                            <td>Price (Rs.)</td>
                            <td>Quantity</td>
                            <td>Total (Rs.)</td>
                        </thead>
                        <tbody style="text-align: center;">
                            <?php
                            $total = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $row) {
                                    $sr = $key + 1;
                                    echo "
                                        <tr>
                                        <td>$sr</td>
                                        <td><img src='./assets/pictures/$row[image]' alt='product_image'/></td>
                                        <td>$row[product_name]</td>
                                        <td>$row[brand]</td>
                                        <td>$row[price]<input type='hidden' class='iprice' value='$row[price]'></td>
                                        <td><input type='number' value='$row[qty]' min='1' max='100' onchange='Total()' name='iqty' class='iqty' ></td>
                                        <td class='itotal' name='itotal'></td>
                                        <td>
                                        <form action='managecart.php' method='POST'>
                                        <button name='remove' style='background: transparent;border: none; font-size: 20px;'><i class='fa-solid fa-trash' style='color: crimson;'></i></button>
                                        <input type='hidden' name='product_name' value='$row[product_name]' >
                                        </form>
                                        </td>
                                        </tr>
                                        ";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="makepurchase">
                    <div class="purchase-box">
                        <form action="purchase.php" method="POST" class="type-payment">
                            <div class="payment-money">
                                <p class="title">Total:</p>
                                <p class="totalprice" id="gtotal"></p>
                            </div>
                            <div class="form">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="name" type="text" name="fname">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="address" type="text" name="address">
                                </div>
                                <div class="form-group">
                                    <label>Phone/Telephone Number</label>
                                    <input class="contact" type="number" name="contact">
                                </div>
                            </div>
                            <div class="checkbox">
                                <input type="radio" class="radio" checked> Cash On Delivery
                            </div>
                            <button class="btn" name="purchase">Make a purchase.</button>
                        </form>
                    </div>
                </div>
            </div>
    </main>
    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName("iprice");
        var iqty = document.getElementsByClassName("iqty");
        var itotal = document.getElementsByClassName("itotal");
        var gtotal = document.getElementById("gtotal");

        function Total() {
            gt = 0;
            for (var i = 0; i < iprice.length; i++) {
                itotal[i].innerHTML = (iprice[i].value) * (iqty[i].value);
                gt = gt + (iprice[i].value) * (iqty[i].value);
            }
            gtotal.innerText = "Rs. " + gt;
        }
        Total();
    </script>
</body>

</html>