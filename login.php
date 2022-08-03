<?php
include './dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- css link -->
    <link rel="stylesheet" href="./assets/css/login.css">
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <?php include "./header.php"; ?>

    <main class="home">
        <div class="max-width">
            <div class="data">
                <div class="logo">
                    WARK
                </div>
                <div class="sub">
                    <p>Good shoes take you good places.</p>
                    <p>Let make our journey.</p>
                </div>
            </div>
            <div class="form">
                <form id="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h1 class="title">Sign In</h1>
                    <div class="username">
                        <input type="email" class="email" id="email" name="email" placeholder="Enter your valid email">
                    </div>
                    <div class="username">
                        <input type="password" class="email" name="password" placeholder="Enter your valid password" style="margin-top: 10px;" id="password">
                    </div>
                    <button class="btn" type="submit" name="login">Login</button>
                    <?php
                    if ($conn) {
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $passd = trim($_POST['password']);
                            $useremail = trim($_POST['email']);

                            $query = "SELECT Password FROM user WHERE email = '" . $useremail . "'";

                            $stmt = mysqli_query($conn, $query);

                            $result = mysqli_fetch_assoc($stmt);

                            if (md5($passd) === $result['Password']) {
                                session_start();
                                $_SESSION['$useremail'] = $useremail;
                                header('location: user.php');
                            } else {
                                echo "<script>alert('Email or password does't match');</script>";
                            }
                        }
                    }

                    ?>
                    <div class="create">
                        <p class="text">Don't have account:</p>
                        <a href="./register.php" class="reg">
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