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
<div class="top">
        <a class="camagru" href="#home">Camagru</a>
        <a class="info" href="login.php" name='login' >Login</a>
        <a class="info" href="signup.php" name='signup'>Sign-up</a>
    </div>

    <div class="row">
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
    </div>
    <?php
        $_SESSION['logged_in'] = "no";
    ?>
</body>
</html>