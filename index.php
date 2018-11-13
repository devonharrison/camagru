<?php?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Camagru</title>
    <link rel="stylesheet" href="index.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <ul>
        <li id="left"><a id="camagru" href="#home">Camagru</a></li>
        <li class="right"><a class="info" href="login.php">Login</a></li>
        <li class="right"><a class="info" href="signup.php">Sign-up</a></li>
    </ul>

    <div class="container">
        <div class="gallery"></div>
        <div class="gallery"></div>
        <div class="gallery"></div>
        <div class="gallery"></div>
        <div class="gallery"></div>
        <div class="gallery"></div>
    </div>
    <?php
        $_SESSION['logged_in'] = "no";
    ?>
</body>
</html>