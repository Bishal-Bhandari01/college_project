<?php
include "dbconn.php";
session_start();
$_SESSION['$useremail'];

$sql = "SELECT * FROM user WHERE email = '" . $_SESSION['$useremail'] . "'";
$result = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_assoc($result);

$sqli = "SELECT * FROM manageitem WHERE useremail = '" . $_SESSION['$useremail'] . "'";
$result = mysqli_query($conn, $sqli);
$row = mysqli_num_rows($result);

?>

<link rel="stylesheet" href="./assets/css/header1.css">

<nav class="navbar">
    <div class="max-width">
        <div class="logo">
            <p>logo</p>
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
                <div class="cartbtn">
                    <a href="managecart.php">
                        My Cart(<?php echo $row; ?>)
                    </a>
                </div>
            </li>
            <li>
                <div class="dropdown">
                    <button class="dropbtn"><?php echo $row1['username'] ?>
                    </button>
                    <form class="dropdown-content" method="POST">
                        <a href="setting.php/?id=<?php echo $row1['id']; ?>" class="a">Setting</a>
                        <input type="submit" class="a" name="logout" value="Log out"/>
                        <?php
                        if (isset($_POST['logout'])) {
                            session_destroy();
                            header('Location: login.php');
                        }
                        ?>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>