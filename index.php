<?php include './dbconn.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online shoe store</title>
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- CSS link -->
    <link rel="stylesheet" href="./assets/css/main.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <nav class="navbar" style="border-radius: 0px;">
        <div class="max-width">
            <div class="logo">
                <img src="./assets/pictures/project_logo.png" alt="project_logo"
                style="width: 50px; height:auto; background: invert(1)">
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
                    <a href="login.php">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="someCard">
        <div class="max-width">
            <?php

            $selected_query = "SELECT * FROM product";
            $result = mysqli_query($conn, $selected_query);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="card">
                        <div class="prodimg"
                        style="
                            width: 100%;
                            height: 45%;
                        ">
                            <img src="./assets/pictures/<?php echo $row['image'] ?>" style="width:120px; height: auto">
                        </div>
                        <div class="container">
                            <h5><?php echo $row['product_name'] ?></h5>
                            <p>Price: <?php echo $row['product_price'] ?></p>
                            <p>category: <?php echo $row['category'] ?></p>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            Thank you for visiting our site
        </div>
    </footer>

    <script src="./assets/js/main.js"></script>
</body>

</html>