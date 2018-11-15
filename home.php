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
        <a class="camagru" href="#home">Camagru</a>
        <a class="info" href="index.php" name='logout' >Logout</a>
        <a class="info" href="settings.php">Settings</a>
    </div>

    <div class="container">
        <div class="gallery"></div>
        <div class="gallery"></div>
        <div class="gallery"></div>
        <div class="gallery"></div>
        <div class="gallery"></div>
        <div class="gallery"></div>
    </div>
    
    <ul id="bottom">
     <a href="webcam/web.php"><img src="images/upload.png" alt="upload" id="upload"></a>
     <a href="profile.php"><img src="images/profile.png" alt="profile" id="profile"></a>
    </ul>
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