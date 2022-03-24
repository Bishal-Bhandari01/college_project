<?php include "./dbconn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Linking CSS -->
    <link rel="stylesheet" href="./assets/css/addproduct.css">
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <nav class="navbar" style="border-radius: 0px;">
        <div class="max-width">
            <div class="logo">
                <img src="./assets/pictures/project_logo.png" class="logopic" style="width:60px;height:25px;filter: brightness(0) invert(1);">
            </div>
            <ul>
                <li>
                    <a href="adminpannel.php">Home</a>
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
    <section>
        <div class="max-width">
            <div class="addbtn2">
                <button id="btn" onclick="addprod()" style="
                    position: absolute;
                    right: 10%;
                    top: 14%;
                    background: green;
                    color: #fff;
                    border-radius: 8px;
                    width: 90px;
                    border: none;
                    height: 30px;
                ">Add product</button>
            </div>
            <script>
                function addprod() {
                    var form = document.getElementById("formtwo");
                    form.style.display = "block";
                }
                </script>
        </div>
    </section>
    <section class="main">
        <div class="max-width">

            <form id="formtwo" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" style="position: relative;
            left: 35%;
            padding-top: 8rem;
            display: none;">
                <h1 class="title">Add Product</h1>
                <div class="username">
                    <label> Product Name</label><br>
                    <input type="text" name="prodname" placeholder="  Enter product name" class="prodname" required>
                </div>
                <div class="username">
                    <label> Price</label><br>
                    <input type="number" name="prodprice" placeholder=" Enter price" class="prodprice" required>
                </div>
                <div class="username">
                    <label>Category: </label>
                    <select name="selectcate" id="selectcate" class="prodctae">
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


    <?php

    if ($conn) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $prod_name = $_POST["prodname"];
            $prod_price = $_POST["prodprice"];
            $prod_cate = $_POST["selectcate"];
            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $folder = "assets/pictures/" . $filename;
            $sqli = "INSERT INTO `product`(`product_name`, `product_price`, `category`, `image`) VALUES ('" . $prod_name . "','" . $prod_price . "','" . $prod_cate . "','" . $filename . "')";

            move_uploaded_file($tempname, $folder);

            if (mysqli_query($conn, $sqli)) {
                echo "<script>
                        window.location.href = './adminpannel.php';
                        alert('data has been updated');
                    </script>";
            }
        }
    }
    ?>

    <section>
        <div class="max-width">
            <div class="title" style="
                position: relative;
                left: 40%;
                margin-top: 140px;
            ">
                <h1>Products</h1>
            </div>
            <div class="lte" style="
                position: relative;
                width: 100%;
                margin-top:15%;   
            ">
                <table style="
                    width: 85%;
                    text-align: center;
                ">
                    <tr style="
                        background: crimson;
                    ">
                        <th>S.N</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $selected_query = "SELECT * FROM product";
                    $result = mysqli_query($conn, $selected_query);
                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row['product_id'] ?></td>
                                <td><img src="./assets/pictures/<?php echo $row['image'] ?>" style="width:80px;margin-top: 5px; height: auto;"></td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td><?php echo $row['product_price'] ?></td>
                                <td><?php echo $row['category'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['product_id'] ?>" style="margin-right: 10px;">Edit</a>
                                    <a href="delete.php?id=<?php echo $row['product_id'] ?>" onclick="return confirm('Are you sure you want to delete this')">delete</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>

</body>

</html>