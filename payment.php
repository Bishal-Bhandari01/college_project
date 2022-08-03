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
    $useremail = $_SESSION['$useremail'];

    ?>

    <main class="home" style="
                position: relative;
                width: 50%;">
        <div class="max-width">
            <div class="table-content" style="width: 85%;
                    text-align: center;">
                <table class="card">
                    <?php
                    $sqli = "SELECT * FROM manageitem WHERE useremail='$useremail'";
                    $result = mysqli_query($conn, $sqli);
                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr class="cards-content">
                                <td><img src="./assets/pictures/<?php echo $row['product_image'] ?>" style="width:100px;margin-top: 5px; height: auto;"></td>
                                <td>
                                    <div><?php echo $row['productname'] ?></div>
                                </td>
                                <td>
                                    <div>Brand: <?php echo $row['category'] ?></div>
                                </td>
                                <td>
                                    <p>Rs. <?php echo $row['productprice'] ?></p>
                                    <input id="amount" type="hidden" value="<?php echo $row['productprice'] ?>">
                                </td>
                                <td>
                                    <input type="number" id="qty" style="width: 40px;" name="qty" value="1" onchange="changedValue()">
                                </td>
                                <td>
                                    <p id="total" name="total"></p>
                                </td>
                                <td class="button">
                                    <a href="manageitemdel.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to remove it.')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    } ?>
                </table>
            </div>
            <div class="paymentbox">
                <div class="form-control">
                    <p class="text">Order Id</p>
                    <p id="orderid"></p>
                </div>
                <div class="form-control">
                    <p class="text">Total Amount</p>
                    <p id="totalamount"></p>
                </div>
                <div class="form-control">
                    <p class="text">Address</p>
                    <input type="text" required>
                </div>
                <div class="payment">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input type="button" class="paymentbtn" name="submit" value="Place an order">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        var tendigit = Math.floor(Math.random() * 1000000000000);
        document.getElementById("orderid").innerHTML = "#" + tendigit;

        function changedValue() {
            let val = parseInt(document.getElementById("qty").value);
            let currentAmount = parseInt(document.getElementById("amount").value);

            let total = document.getElementById("total");
            let totalamount = val * currentAmount;
            console.log(currentAmount);
            total.innerHTML = totalamount;
        }
    </script>
</body>

</html>