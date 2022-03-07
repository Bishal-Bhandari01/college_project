<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- css link -->
    <link rel="stylesheet" href="login.css">
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.css" integrity="sha512-E+53kXnJyuZFSz75xSmTfCpUNj3gp9Bd80TeQQMTPJTVWDRHPOpEYczGwWtsZXvaiz27cqvhdH8U+g/NMYua3A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- JQuery files -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
</head>
<body>
    
    <header class="navbar">
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
                
            </ul>
        </div>
    </header>

    <main class="home">
        <div class="max-width">
            <div class="data">
                <div class="logo">
                    logo
                </div>
                <div class="sub">
                    <p>Good shoes take you good places.</p>
                    <p>Let make our journey.</p>
                </div>
            </div>
            <div class="form">
                <form id="form" action="/" method="GET">
                    <h1 class="title">Sign In</h1>
                    <div class="username">
                        <input 
                        type="email"
                        class="uname"
                        id="uname"
                        name="uname"
                        placeholder="Enter your valid email">
                        <p
                        class="em"
                        style="color:red;
                        font-size: 15px;"></p>
                    </div>
                    <div class="username">
                        <input 
                        type="password"
                        class="uname"
                        name="password"
                        placeholder="Enter your valid password"
                        style="margin-top: 10px;"
                        id="password">
                        <p
                        class="em"
                        style="color:red;
                        font-size: 15px;"></p>
                    </div>
                    <button class="btn" type="submit">Login</button>
                    <div class="create">
                        <p class="text">Don't have account:</p>
                        <a href="../register/register.php" class="reg">
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