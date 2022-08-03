<?php include 'dbconn.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Details</title>
    <!-- css link -->
    <link rel="stylesheet" href="./assets/css/addproduct.css">
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <nav class="navbar">
        <div class="max-width">
            <div class="logo">
                <img src="./assets/pictures/project_logo.png" style="width:60px;height:25px; filter: brightness(0) invert(1);">
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
                    <a href="./admin.php">
                        <i class="fas fa-solid fa-user" style="color:black"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="main">
        <div class="max-width">

            <?php
            $id = $_GET['id'];

            $sqli = "SELECT * FROM product WHERE product_id=$id";
            $result = mysqli_query($conn,$sqli);
            $row = mysqli_fetch_assoc($result);

            ?>
            <form id="formtwo" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" style="position: relative;
            left: 35%;
            padding-top: 8rem;">
                <h1 class="title">Edit Product</h1>
                <div class="username">
                    <label> Product Name</label><br>
                    <input type="text" name="prodname" value="<?php echo $row['product_name']; ?>" class="prodname" required>
                </div>
                <div class="username">
                    <label> Price</label><br>
                    <input type="text" name="prodprice" value="Rs. <?php echo $row['product_price'];?>" class="prodprice" required>
                </div>
                <div class="username">
                    <label>Brands: </label>
                    <select name="selectcate" id="selectcate"cy class="prodctae">
                        <option value="---" style="text-align: center;">---</option>
                        <option value="Nike">Nike</option>
                        <option value="Adidas">Adidas</option>
                        <option value="Goldstar">GoldStar</option>
                    </select>
                </div>
                <div class="username">
                    <label>Upload Image</label><br>
                    <input type="file" name="uploadfile" class="prodimg" style="
                        border-radius: 0px;
                        border: none;
                        width: 350px;
                    " />
                </div>
                <div class="btn">
                    <button type="submit" name="add_product" class="addbtn">Add</button>
                </div>
            </form>
        </div>
    </section>

</body>

</html>