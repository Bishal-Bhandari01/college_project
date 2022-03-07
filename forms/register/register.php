<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- css link -->
    <link rel="stylesheet" href="register.css">
    <!-- Adding fonts fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
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
            <div class="data"></div>
            <div class="form">
                <form id="form" action="/">
                    <h1 class="title">Sign up</h1>
                    <div class="username">
                        <input 
                         type="text"
                         class="uname"
                         name="uname"
                         id="username"
                         placeholder="Enter your valid username.">
                         <div class="em"
                         style="color:red"></div>
                    </div>
                    <div class="username">
                        <input 
                         type="email"
                         class="email"
                         id="email"
                         name="email"
                         placeholder="Enter your valid email."
                         style="margin-top: 10px;">
                         <div class="em"
                         style="color:red"></div>
                    </div>
                    <div class="username">
                        <input 
                         type="password"
                         class="uname"
                         name="password"
                         id="password"
                         placeholder="Enter your valid password"
                         style="margin-top: 10px;">
                         <div class="em"
                         style="color:red"></div>
                    </div>
                    
                    <button class="btn" type="submit">Register</button>
                    <div class="create">
                        <p class="text">Do have account:</p>
                        <a href="../login/login.php" class="log">
                            Login
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="register.js"></script>
</body>
</html>