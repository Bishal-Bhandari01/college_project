<?php include"./dbconn.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JQuery files -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
</head>

<body>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Kanit',sans-serif;
        }
        .max-width {
            max-width: 1300px;
            padding: 0 60px;
            display: flex;
            justify-content: space-between;
        }
        .navbar{
            position: fixed;
            width: 100%;
            background:gray;
            padding: 20px 0;
            color: #fff;
        }
        .logo{
            font-size: 20px;
            font-weight: bold;
        }
        ul{
            float: right;
            margin-bottom: 5px;
        }

        ul li{
            display: inline-block;
        }
        ul li a{
            margin-right: 30px;
            color: #fff;
        }

        /* home start here */

        .home{
            width: 100%;
            height:100vh;
            text-align: left;
            overflow: hidden;
        }

        .form{
            display: flex;
            justify-content: center;
            position: absolute;
            top: 25%;
            right: 10%;
            text-align: center;
            width: 450px;
            height: 330px;
            border-radius: 30px;
            box-shadow: 6px 6px 10px -1px rgb(0 0 0 / 15%);
        }
        .title{
            margin-top:30px;
        }
        input{
            width: 350px;
            height: 35px;
            border: 1px solid;
            border-radius: 60px;
            margin-top: 30px;
            text-align: center;
        }
        .btn{
            width: 160px;
            height: 40px;
            font-size: 18px;
            border: 0;
            border-radius: 30px;
            background: green;
            color: #fff;
            margin-top: 20px;
            transition: all 0.5s ease-in-out;
            cursor: pointer;
        }
        .text{
            font-size: 13px;
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 5px;
            color: gray;
        }
    </style>

    <header class="navbar">
        <div class="max-width">
            <div class="logo">
                <img src="./assets/pictures/project_logo.png"
                    style="width:60px;height:25px;filter:brightness(0) invert(1);">
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
                <form id="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <h1 class="title">Sign In</h1>
                    <div class="adminform">
                        <input type="email" class="email" id="email" name="email" placeholder="Enter your valid email" required>
                        <p id="em" style="color:red;
                        font-size: 15px;"></p>
                    </div>
                    <div class="adminform">
                        <input type="password" class="uname" id="password" name="pword" placeholder="Enter your valid password" style="margin-top: 10px;" id="password" required>
                        <p id="em" style="color:red;
                        font-size: 15px;"></p>
                    </div>
                    <button class="btn" type="submit" name="login">Login</button>
                </form>
                <?php

                if($conn){
                    if($_SERVER['REQUEST_METHOD']=='POST') {

                        $passd = trim($_POST['pword']);
                        $ademail = trim($_POST['email']);
    
                        $sqli = "SELECT * FROM admin WHERE email='".$ademail."' AND password='".md5($passd)."'";

                        if($stmt = mysqli_prepare($conn,$sqli)){
    
                            mysqli_stmt_execute($stmt);
    
                            if (mysqli_stmt_num_rows($stmt) === 0) {
                                session_start();
                                echo "<script>window.location.href='adminpannel.php';</script>";
    
                            } else {
                                echo "<script>
                                    alert('Incorrect Email or Password.');
                                    </script>";
                            }
                        }
    
                    }
                }

                ?>

            </div>
        </div>
    </main>
    <script type="text/javascript" src="./assets/js/admin.js"></script>
</body>

</html>