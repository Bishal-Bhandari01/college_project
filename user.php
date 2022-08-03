<?php
include './dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <?php include "./header1.php" ?>

    <section class="someCard" style="
        margin-left: 50px;
        padding-top: 100px;
    ">
        <div class="max-width">
            <?php

            $selected_query = "SELECT * FROM product";
            $result = mysqli_query($conn, $selected_query);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="card">
                        <div class="image" style="height: 120px;">
                            <img src="./assets/pictures/<?php echo $row['image'] ?>">
                        </div>
                        <div class="container">
                            <h5><?php echo $row['product_name'] ?></h5>
                            <p>Price: Rs.<?php echo $row['product_price'] ?></p>
                            <p>Brand: <?php echo $row['category'] ?></p>
                        </div>
                        <div class="buttons" style="align-self: space-between;">
                            <a href="managecart.php?id=<?php echo $row['product_id']; ?>">
                                <button style="border:none;
                        width: 100%;
                        height: 45px;
                        color: white;
                        border-radius: 8px;
                        background: green;
                        cursor:pointer;" class="modify-item">
                                    <i class="fas fa-shopping-cart">
                                    </i>
                                </button>
                            </a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        </div>
    </section>

</body>

</html>