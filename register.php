<?php include "./dbconn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
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
    padding: 0 50px;
    display: flex;
    justify-content: space-between;
}
.navbar{
    position: fixed;
    width: 100%;
    z-index: 999;
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
}

.form{
    margin-top:10%;
    text-align: center;
    width: 400px;
    height: 470px;
    border-radius: 30px;
    box-shadow: 6px 6px 10px -1px rgb(0 0 0 / 15%);
}
.title{
    margin-top:20px;
}
input{
    width: 350px;
    height: 35px;
    border: 1px solid;
    border-radius: 60px;
    margin-top: 30px;
    text-align: center;
}
.username input:focus{
    outline: 0;
}
.username.success input{
    border-color: rgb(10, 202, 10);
}
.username.error input{
    border-color: red;
}
.radio1{
    width:15px;
    height:15px;
}
.radio2{
    width:15px;
    height:15px;
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
}
.btn:hover{
    width: 170px;
    height:45px;
    font-size: 23px;
}
.text{
    font-size: 13px;
    font-weight: bold;
    margin-top: 30px;
    margin-bottom: 5px;
    color: gray;
}
.log{
    display: inline-block;
    padding: 7px 30px;
    width: 160px;
    height: 40px;
    text-align: center;
    text-decoration: none;
    color: #ffffff;
    background-color: green;
    border-radius: 60px;
    outline: none;
    transition: all 0.5s ease-in-out;
}
.log:hover{
    width: 170px;
    height: 45px;
    font-size: 23px;
}

</style>

    <header class="navbar">
        <div class="max-width">
            <div class="logo">
                <img src="./assets/pictures/project_logo.png" style="width:60px;height:25px;filter: brightness(0) invert(1);">
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
                                                    window.location.href='./login.php';</script>";
                                }
                            } else {
                                $password = trim($_POST['password']);
                                $hashed_password = md5($password);
                                $sqli = "INSERT INTO `user` (`username`, `email` , `Password`, `contact`) VALUES ('" .trim($_POST['uname'])."', '".trim($_POST['email'])."','".$hashed_password."','".trim($_POST['contactnumber'])."')";
                                if (mysqli_query($conn, $sqli)) {
                                    echo "<script>alert('Registed sucessfully');
                                                    window.location.href='./login.php';</script>";
                                }
                            }
                        }
                    }
                }
                ?>

            </div>
        </div>
    </main>
</body>

</html>