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
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="product">
        <div class="max-width">
            <div class="image">
                <img src="./assets/pictures/adidas.webp" />
            </div>
            <div class="productname">
                <h3>Some shoes</h3>
                <p class="price">Price: <span>1200</span></p>
                <div class="quantity">
                    <label>Quantity: </label>
                    <input type="number" class="category" name="quantity">
                </div>
            </div>
            <div class="order">
                <button class="orderbtn">Order now</button>
            </div>
        </div>
    </section>

</body>

</html>