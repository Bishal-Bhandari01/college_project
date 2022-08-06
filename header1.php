<?php
include "dbconn.php";
session_start();
$_SESSION['$useremail'];
if (!$_SESSION['$useremail']) {
    header('Location: ./login.php');
} else {

    $sql = "SELECT * FROM user WHERE email = '" . $_SESSION['$useremail'] . "'";
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result);
?>

    <link rel="stylesheet" href="./assets/css/header1.css">

    <nav class="navbar">
        <div class="max-width">
            <div class="logo">
                <img src="./assets/pictures/project_logo.png" style="width:60px;
                                                                height:25px;
                                                                filter:brightness(0) invert(1);">
            </div>
            <ul>
                <li>
                    <a href="user.php">Home</a>
                </li>
                <li>
                    <a href="contactus.php">Contact us</a>
                </li>
                <li>
                    <a href="aboutus.php">About us</a>
                </li>

                <li>
                    <div class="cartbtn">
                        <?php
                        $count = 0;
                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                        }
                        ?>
                        <a href="./payment.php">
                            My Cart( <?php echo $count; ?> )
                        </a>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button class="dropbtn"><?php echo $row1['username'] ?>
                        </button>
                        <form class="dropdown-content" method="POST">
                            <input type="submit" class="a" name="logout" value="Log out" />
                            <?php
                            if (isset($_POST['logout'])) {
                                session_destroy();
                                header('Location: ../login.php');
                            }
                            ?>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<?php

}
?>