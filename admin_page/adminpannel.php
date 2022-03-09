<?php 
$server = "localhost";
$username = "root";
$password = "";
$dbserver = "online_shoe_shop";

$conn = mysqli_connect($server, $username, $password, $dbserver);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <!-- css link -->
    <link rel="stylesheet" href="adminpannel.css">
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
                <img src="../pictures/project_logo.png"
                style="width:60px;height:25px; filter: brightness(0) invert(1);">
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
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                        <input type="button" class="logout" name="logout" value="logout">
                    </form>
                </li>
            </ul>
        </div>
    </header>

    <section class="home">
        <div class="max-width">
            <div class="category">
                <label class="cate">Category: </label>
                <select id="shoe_category">
                    <option>Select your category</option>
                    <option>Nike</option>
                    <option>Adidas</option>
                    <option>Gold Star</option>
                </select>
            </div>
            <div class="search">
                <input type="text" name="search" placeholder="Search..." id="searchinput">
                <button type="button" class="search-btn">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </section>


    <?php
    if($conn){
        session_start();
        if(isset($_POST['logout'])){
            echo "<script>alert('logout successful')";
            session_unset();
            header("location: ../forms/adminlogin/admin.php");
        }
    }
    
    
    ?>
    <script type="text/javascript" src="adminpannel.js"></script>
</body>
</html>