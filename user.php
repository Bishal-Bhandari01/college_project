<?php include './dbconn.php' ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User</title>
        <link rel="stylesheet" href="./assets/css/user.css">
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
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
            <section class="home">
                <div class="max-width">
                    <div class="category">
                        <label class="cate">Category: </label>
                        <select id="shoe_category">
                            <option value="casual">Casual</option>
                                <option value="">Adidas</option>
                                =======
                                <option>Select your category</option>
                                <option>Nike</option>
                                <option>Adidas</option>
                                <option>Gold Star</option>
                        </select>
                    </div>
                    <div class="search">
                        <input type="text" name="search" placeholder="Search..." id="searchinput">
                        <button type="button" class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                </div>
            </section>

            <section class="someCard" style="
        margin-left: 100px;
    ">
                <div class="max-width">
                    <?php

                    $selected_query = "SELECT * FROM product";
                    $result = mysqli_query($conn, $selected_query);
                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <div class="card">
                                <img src="./assets/pictures/<?php echo $row['image'] ?>" style="width:50%; height: 24%">
                                <div class="container">
                                    <h5><?php echo $row['product_name'] ?></h5>
                                    <p>Price: <?php echo $row['product_price'] ?></p>
                                    <p>category: <?php echo $row['category'] ?></p>
                                </div>
                                <a href="product_detail.php?id=<?php echo $row['product_id'] ?>" class="orderbtn">
                                    More Info
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </section>


    </body>

    </html>