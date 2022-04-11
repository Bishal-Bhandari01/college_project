<?php include 'dbconn.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="./assets/css/productdetail.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>

    <nav class="navbar">
        <div class="max-width">
            <div class="logo">
                <p>logo</p>
            </div>
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Contact us</a>
                </li>
                <li>
                    <a href="#">About us</a>
                </li>
                <li>
                    <a href="./payment.html">
                        <i class="fas fa-shopping-cart" name="shopping_cart"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="product">
        <div class="max-width">
            <form style="width:100%; display: inline-block; height: 300px;" action="managecart.php" method="POST">
                <?php

                $id = $_GET['id'];

                $selected_query = "SELECT * FROM product WHERE product_id=$id";
                $result = mysqli_query($conn, $selected_query);
                $row = mysqli_fetch_assoc($result);

                ?>
                <img src="./assets/pictures/<?php echo $row['image'] ?>" />
                <div class="somedetails">
                    <h3 class="productname"><?php echo $row['product_name'] ?></h3>
                    <input type="hidden" name="producthidden_name" value="<?php echo $row['product_name'] ?>" />
                    <p class="price">Price: Rs. <span><?php echo $row['product_price'] ?></span></p>
                    <input type="hidden" name="producthidden_price" value="<?php echo $row['product_price'] ?>" />
                    <label>Quantity: </label>
                    <input type="button" id="minus" onclick="minus()" value="-">
                    <input type="text" style="text-align:center" class="category" id="value" name="quantity" value="1">
                    <input type="button" id="plus" onclick="plus()" value="+">
                </div>
                <div class="order">
                    <input type="button" name="add_to_cart" class="orderbtn" value="Order now" />
                </div>
        </div>
        </form>
    </section>

    <main class="description">
        <div class="max-width">
            <div class="desc">
                <h1>Description</h1>
            </div>
        </div>
    </main>
    <script>
        function plus() {
            var value = parseInt(document.getElementById('value').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('value').value = value;
        }

        function minus() {
            var value = parseInt(document.getElementById('value').value, 10);
            value = isNaN(value) ? 0 : value;
            value--;
            document.getElementById('value').value = value;
        }
    </script>
</body>

</html>