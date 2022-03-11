<?php include"./dbconn.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- css link -->
    <link rel="stylesheet" href="./assets/css/admin.css">
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

    <header class="navbar">
        <div class="max-width">
            <div class="logo">
                <img src="../../pictures/project_logo.png"
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
                <form id="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                    <h1 class="title">Sign In</h1>
                    <div class="adminform">
                        <input type="email" class="email" id="email" name="email" placeholder="Enter your valid email">
                        <p id="em" style="color:red;
                        font-size: 15px;"></p>
                    </div>
                    <div class="adminform">
                        <input type="password" class="uname" id="password" name="pword" placeholder="Enter your valid password" style="margin-top: 10px;" id="password">
                        <p id="em" style="color:red;
                        font-size: 15px;"></p>
                    </div>
                    <button class="btn" name="login">Login</button>
                </form>
                <?php

                if($conn){
                    if (isset($_POST['login'])) {

                        

                        $passd = trim($_POST['pword']);
                        $ademail = trim($_POST['email']);
    
                        $sqli = "SELECT * FROM admin WHERE email='".$ademail."' AND password='".$passd."'";

                        if($stmt = mysqli_prepare($conn,$sqli)){
    
                            mysqli_stmt_execute($stmt);
    
                            if (mysqli_stmt_num_rows($stmt) == 0) {
                                session_start();
                                $_SESSION['email'] = $ademail;
                                header("location: adminpannel.php");
    
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