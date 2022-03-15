<?php include "./dbconn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link rel="stylesheet" href="./assets/css/adduser.css">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JQuery files -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
</head>
<body>
    <style>
        .title{
            text-align: center;
        }
        input{
            width: 300px;
            height: 30px;
            border-radius: 7px;
            border: 1px solid #000;
            text-align: center;
        }
        .username{
            margin-top: 15px;
        }
        #selectrole{
            width: 255px;
            height: 28px;
            border-radius: 6px;
            margin-left: 5px;
        }
        .btn{
            text-align: center;
            margin-top: 15px;
        }
        .addbtn{
            width: 120px;
            border-radius: 6px;
            border: none;
            height: 30px;
            background: rgb(3, 182, 3);
            color: #fff;
            font-size: 17px;
        }
    </style>
    <nav class="navbar" style="border-radius: 0px;">
        <div class="max-width">
            <div class="logo">
                <img src="./assets/pictures/project_logo.png" class="logopic"
                style="width:60px;height:25px;filter: brightness(0) invert(1);">
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
    <main class="main">
        <div class="max-width">
            <form id="form2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"
            style="position: relative;
            left: 40%;
            padding-top: 8rem;">
                <h1 class="title">Add User</h1>
                <div class="username">
                    <label> Username</label><br>
                    <input type="text" name="username" placeholder="  Enter Username" required>
                </div>
                <div class="username">
                    <label> Email</label><br>
                    <input type="email" name="email" placeholder=" Enter user email" required>
                </div>
                <div class="username">
                    <label> Password</label><br>
                    <input type="password" name="password" placeholder=" Enter password" required>
                </div>
                <div class="username">
                    <label>Role: </label>
                    <select name="select" id="selectrole">
                        <option value="---" style="text-align: center;">---</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="username">
                    <label>Contact Number</label><br>
                    <input type="number" name="contact_number" placeholder=" Enter user contact number" required>
                </div>
                <div class="btn">
                    <button type="submit" name="add_user" class="addbtn">Add User</button>
                </div>
            </form>
            <?php
            if ($conn) {
                echo "connected";
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $selected_request = $_POST['select'];

                    echo $selected_request;
                    $user_exist_query = "SELECT * FROM `".$selected_request."` WHERE `email` = '".trim($_POST['email'])."'";

                    $result = mysqli_query($conn, $user_exist_query);

                    if ($result) {

                        if (mysqli_num_rows($result) > 0 && $selected_request == "---") {
                            $result_fetch = mysqli_fetch_assoc($result);
                            if ($result_fetch['email'] == $_POST['email']) {
                                echo "<script>alert('Email already exists');</script>";
                            }
                        } else {
                            $password = trim($_POST['password']);
                            $hashed_password = md5($password);
                            $sqli = "INSERT INTO `".$selected_request."` (`username`, `email` , `Password`, `contact`) VALUES ('" .trim($_POST['username'])."', '".trim($_POST['email'])."','".$hashed_password."','".trim($_POST['contact_number'])."')";
                            if (mysqli_query($conn, $sqli)) {
                                echo "<script>alert('Registed sucessfully');
                                                window.location.href='../login/login.php';</script>";
                            }
                        }
                    }
                }
            }
            ?>
        </div>
    </main>
</body>

</html>