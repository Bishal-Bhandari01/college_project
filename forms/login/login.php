<?php 
include '../../dbconn.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- css link -->
    <link rel="stylesheet" href="login.css">
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JQuery files -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
</head>

<body>

    <nav class="navbar" style="background:gray;
            border-radius:0">
        <div class="max-width">
            <div class="logo">
                <img src="../../pictures/project_logo.png" style="width:60px;
                                                                height:25px;
                                                                filter:brightness(0) invert(1);">
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

            </ul>
        </div>
    </nav>

    <main class="home">
        <div class="max-width">
            <div class="data">
                <div class="logo">
                    logo
                </div>
                <div class="sub">
                    <p>Good shoes take you good places.</p>
                    <p>Let make our journey.</p>
                </div>
            </div>
            <div class="form">
                <form id="form" action="/" method="GET">
                    <h1 class="title">Sign In</h1>
                    <div class="username">
                        <input type="email" class="uname" id="uname" name="uname" placeholder="Enter your valid email">
                    </div>
                    <div class="username">
                        <input type="password" class="uname" name="password" placeholder="Enter your valid password" style="margin-top: 10px;" id="password">
                    </div>
                    <button class="btn" type="submit" name="login">Login</button>
                    <?php

                    if ($conn) {
                        if (isset($_POST['login'])) {
                            $passd = trim($_POST['pword']);
                            $useremail = trim($_POST['email']);

                            $sqli = "SELECT * FROM user WHERE email='" . $useremail . "' AND password='" . $passd . "'";

                            if ($stmt = mysqli_prepare($conn, $sqli)) {

                                mysqli_stmt_execute($stmt);

                                if (mysqli_stmt_num_rows($stmt) == 0) {
                                    session_start();
                                    header("location: ../../users/user.php");
                                } else {
                                    echo "<script>
                                    alert('Incorrect Email or Password.');
                                    </script>";
                                }
                            }
                        }
                    }

                    ?>
                    <div class="create">
                        <p class="text">Don't have account:</p>
                        <a href="../register/register.php" class="reg">
                            Register
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </main>
    <script type="text/javascript" src="login.js"></script>
</body>

</html>