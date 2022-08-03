<?php include "./dbconn.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add user</title>
    <link rel="stylesheet" href="./assets/css/adduser.css">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <style>
        .title {
            text-align: center;
        }

        input {
            width: 300px;
            height: 30px;
            border-radius: 7px;
            border: 1px solid #000;
            text-align: center;
        }

        .username {
            margin-top: 15px;
        }

        #selectrole {
            width: 300px;
            height: 28px;
            border-radius: 6px;
        }

        .btn {
            text-align: center;
            margin-top: 15px;
        }

        .addbtn {
            width: 120px;
            border-radius: 6px;
            border: none;
            height: 30px;
            background: rgb(3, 182, 3);
            color: #fff;
            font-size: 17px;
        }

        table,
        tr,
        th,
        td {
            border: 1px solid #000;
            height: 30px;
            border-collapse: collapse;
        }
        th{
            color: white;
        }
    </style>
    <?php include "./header.php" ?>
    <section style="
        display: flex;
        float: right;
    ">
        <div class="max-width">
            <div style="
                position:absolute;
                top: 14%;
                right: 8%
            ">
                <button id="js-btn" style="
                    width: 130px;
                    height: 30px;
                    border:none;
                    background: green;
                    color:#fff;
                    border-radius:8px;
                " onclick="animateform()">Add User/Admin</button>
            </div>
        </div>
    </section>
    <section class="main" id="section">
        <div class="max-width">
            <form id="form2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" style="position: relative;
            left: 40%;
            padding-top: 8rem;
            display: none">
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
                    <label>Role </label><br>
                    <input type="text" id="selectrole" name="role" value="user">
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
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $Role = $_POST['role'];
                    $password = trim($_POST['password']);
                    $hashed_password = md5($password);
                    $sqli = "INSERT INTO `" . $Role . "` (`username`, `email` , `Password`, `contact`) VALUES ('" . trim($_POST['username']) . "', '" . trim($_POST['email']) . "','" . $hashed_password . "','" . trim($_POST['contact_number']) . "')";
                    if (mysqli_query($conn, $sqli)) {
                        echo "<script>alert('Registed sucessfully');
                                window.location.href='./adminpannel.php';</script>";
                        "        
                        </script>";
                    }
                }
            }
            ?>
        </div>
    </section>




    <script>
        function animateform() {
            let section = document.getElementById("form2");
            if (section.style.display === "none") {
                section.style.display = "block";
            } else {
                section.style.display = "none";
            }
        }
    </script>

    <section>
        <div class="max-width">
            <div class="title" style="
                position: relative;
                left: 50%;
                margin-top: 140px;
            ">
                <h1>User</h1>
            </div>
            <div class="lte" style="
                position: relative;
                width: 100%;
                margin-top:15%;
                margin-left: 8%; 
                margin-bottom:15%;  
            ">
                <table style="
                    width: 90%;
                    text-align: center;
                ">
                    <tr style="
                        background: crimson;
                    ">
                        <th>S.N</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $selected_query = "SELECT * FROM user";
                    $result = mysqli_query($conn, $selected_query);
                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['contact'] ?></td>
                                <td>
                                    <a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this')" style="color: crimson">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
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