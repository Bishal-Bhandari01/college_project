<?php
include "dbconn.php";
session_start();
$_SESSION['$email'];

if (!$_SESSION['$email']) {
    header('Location: ./login.php');
} else {

    $sql = "SELECT * FROM admin WHERE email = '" . $_SESSION['$email'] . "'";
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
                    <a href="#">Contact us</a>
                </li>
                <li>
                    <a href="#">About us</a>
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
                                header('Location: ./login.php');
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