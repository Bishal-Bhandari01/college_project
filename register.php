<?php include "../../dbconn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- css link -->
    <link rel="stylesheet" href="register.css">
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- JQuery files -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
</head>



<body>

    <header class="navbar">
        <div class="max-width">
            <div class="logo">
                <img src="../../pictures/project_logo.png" style="width:60px;height:25px;filter: brightness(0) invert(1);">
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
    </header>

    <main class="home">
        <div class="max-width">
            <div class="data"></div>
            <div class="form">
                <form id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h1 class="title">Sign up</h1>
                    <div class="username">
                        <input type="text" class="uname" name="uname" id="username" placeholder="Enter your valid username." required>
                        <div id="usernameerror" style="color:red">
                        </div>
                    </div>
                    <div class="username">
                        <input type="email" class="email" id="email" name="email" placeholder="Enter your valid email." style="margin-top: 10px;" required>
                        <div id="emailerror" style="color:red"></div>
                    </div>
                    <div class="username">
                        <input type="password" class="uname" name="password" id="password" placeholder="Enter your valid password." style="margin-top: 10px;" required>
                        <div id="passworderrorlength" style="color:red"></div>
                    </div>
                    <div class="username">
                        <input type="number" class="uname" name="contactnumber" id="contact" placeholder="Enter your valid number." style="margin-top: 10px;" required>
                    </div>

                    <button class="btn" type="submit" name="register">Register</button>
                    <div class="create">
                        <p class="text">Do have account:</p>
                        <a href="../login/login.php" class="log">
                            Login
                        </a>
                    </div>

                </form>

                <?php

                if ($conn) {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $user_exist_query = "SELECT * FROM `user` WHERE `email` = '".trim($_POST['email'])."'";

                        $result = mysqli_query($conn, $user_exist_query);

                        if ($result) {

                            if (mysqli_num_rows($result) > 0) {
                                $result_fetch = mysqli_fetch_assoc($result);
                                if ($result_fetch['email'] == $_POST['email']) {
                                    echo "<script>alert('Email already exists');
                                                    window.location.href='../login/login.php';</script>";
                                }
                            } else {
                                $password = trim($_POST['password']);
                                $hashed_password = md5($password);
                                $sqli = "INSERT INTO `user` (`username`, `email` , `Password`, `contact`) VALUES ('" .trim($_POST['uname'])."', '".trim($_POST['email'])."','".$hashed_password."','".trim($_POST['contactnumber'])."')";
                                if (mysqli_query($conn, $sqli)) {
                                    echo "<script>alert('Registed sucessfully');
                                                    window.location.href='../login/login.php';</script>";
                                }
                            }
                        } else {
                            echo "<script>alert('hellow')</script>";
                        }
                    }
                }


                ?>

            </div>
        </div>
    </main>
    <!-- <script type="text/javascript" src="register.js"></script> -->
</body>

</html>