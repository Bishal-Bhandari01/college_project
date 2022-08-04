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
            <div class="table-content">
                <table style="
                    width: 90%;
                    text-align: center;">
                    <p style="text-align:center; font-size: 30px; margin-bottom: 5px;">My Cart</p>
                    <thead>
                        <td>Image</td>
                        <td>Name</td>
                        <td>Brand</td>
                        <td>Price (Rs.)</td>
                        <td>Quantity</td>
                        <td>Total (Rs.)</td>
                    </thead>
                    <tbody>
                        <?php
                        $sqli = "SELECT * FROM manageitem WHERE useremail='" . $_SESSION['$useremail'] . "'";
                        if ($response = mysqli_query($conn, $sqli)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <td><img src="./assets/pictures/<?php echo $row['product_image']; ?>"></td>
                                    <td><?php echo $row['productname']; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['productprice']; ?><imput type="hidden" class="iprices" value="<?php echo $row['productprice']; ?>"></td>
                                    <td><input type="number" name="qty" onchange="Total()" class="iqty" value="1"></td>
                                    <td>
                                        <p class="itotal"></p>
                                    </td>
                                    <td><a href="manageitemdel.php/id=<?php echo $row['id']; ?>">
                                            <i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script>
        // var tendigit = Math.floor(Math.random() * 1000000000000);
        // document.getElementById("orderid").innerHTML = "#" + tendigit;

        var iprice = parseInt(document.getElementsByClassName("iprice").value);
        var iqty = parseInt(document.getElementsByClassName("iqty").value);
        var itotal = parseInt(document.getElementsByClassName("itotal").value);

        function Total() {
            for (var i = 0; i <= iprice.length; i++) {
                itotal[i].innerHTML = parseInt(iprice[i].value) * parseInt(iqty[i].value);
            }
        }
        Total();
    </script>
</body>

</html>