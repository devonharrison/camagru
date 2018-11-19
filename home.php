<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Camagru</title>
    <link rel="stylesheet" href="home.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <div class="top">
        <div class="menu">
            <img src="images/menu.png" alt="menu" id="icon">
            <div class="content">
                <a href="webcam/web.php">Upload</a>
                <a href="profile.php">Profile</a>
                <a href="index.php">Logout</a>
            </div>
        </div>
        <a class="camagru" href="#home">Camagru</a>
    </div>

    <div class="container">
    <div class="row">
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
        <div class="column"></div>
    </div>
</div>
    <?php
    session_start();
        if ($_POST['logout'])
        {
            session_unset();
            session_destroy();
        }
    ?>
</body>
</html>