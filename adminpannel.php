<?php
include "./dbconn.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <!-- css link -->
    <link rel="stylesheet" href="./assets/css/adminpannel.css">
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="navbar">
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
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                        <button type="submit" class="logout" name="logout">Log out</button>
                    </form>
                </li>
            </ul>
        </div>
    </header>

    <section class="home" style="
        display: flex;
        justify-content: center;
    ">
        <div class="max-width">
            <div class="buttonssection">
                <button onclick="addperson()" style="width:100px;height:30px;
                    border-radius:12px; border:none;
                    background-color: green;color:#fff;
                    margin-left: 70px;">
                    Add person
                </button>
                <button onclick="additems()" style="width:100px;height:30px;
                    border-radius:12px; border:none;
                    background-color: green;color:#fff">
                    Add items
                </button>
            </div><br>
            <script>
                function addperson() {
                    window.location.href = "adduserandadmin.php";
                }

                function additems() {
                    window.location.href = "addcategory.php";
                }
            </script>
        </div>
    </section>

    <main class="cardone">
        <div class="max-width">
            <div class="cardcontent">
                <?php
                $sqli = "SELECT * FROM product";
                $result = mysqli_query($conn, $sqli);
                $row = mysqli_num_rows($result);
                echo '<p style="
                    opacity: 70%;
                    font-size: 30px;
                ">
                        ' . $row . '
                    </p>';
                ?>
                <p>Total Product</p>
            </div>
        </div>
    </main>

    <main class="cardtwo">
        <div class="max-width">
            <div class="cardcontent">
            <?php
                $sqli = "SELECT * FROM user";
                $result = mysqli_query($conn, $sqli);
                $row = mysqli_num_rows($result);
                echo '<p style="
                    opacity: 70%;
                    font-size: 30px;
                ">
                        ' . $row . '
                    </p>';
                ?>
                <p>Total Users</p>
            </div>
        </div>
    </main>

    <main class="cardthree">
        <div class="max-width">
            <div class="cardcontent">
                <p style="
                    opacity: 70%;
                    font-size: 30px;
                ">50</p>
                <p>Total Order</p>
            </div>
        </div>
    </main>


    <?php
    if ($conn) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_destroy();
            echo "<script>alert('Successfully logout.')";
            header("location: admin.php");
        }
    }
    ?>

</body>

</html>