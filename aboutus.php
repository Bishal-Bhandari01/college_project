<?php include "./dbconn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: "Kanit", sans-serif;
            outline: none;
        }

        .max-width {
            max-width: 1200;
            padding: 0 80px;
            margin: auto;
            display: flex;
            justify-content: space-between;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            margin-top: 2px;
            border: none;
            color: white;
            background-color: inherit;
            font-family: inherit;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        .dropdown-content .a {
            width: 100%;
            color: black;
            padding: 8px 32px;
            background-color: #fff;
            border: none;
            font-size: 14px;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>

    <?php include "./header1.php"; ?>

</body>

</html>