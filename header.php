<?php
include "./dbconn.php";
session_start();
$_SESSION['$useremail'];
?>
<style>
    button {
        background: none;
        transition: all 0.5s ease-in-out;
    }

    button:hover {
        background: crimson;
    }
</style>
<nav class="navbar" style="background:gray;
            border-radius:0">
    <div class="max-width">
        <div class="logo">
            <img src="./assets/pictures/project_logo.png" style="width:60px;
                                                                height:25px;
                                                                filter:brightness(0) invert(1);">
        </div>
        <ul>
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <p><?php echo $_SESSION['$useremail']; ?></p>
            </li>
            <li>
                <a href="./admin.php">
                    <button type="button" style="width: 5rem;height: 35px; border:2px solid crimson; border-radius: 7px;color: white; text-align: center;">logout <?php session_destroy(); ?></button>
                </a>
            </li>
        </ul>
    </div>
</nav>