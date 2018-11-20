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
        <div class="menu">
            <img src="images/menu.png" alt="menu" id="icon">
            <div class="content">
                <a href="webcam/web.php">Upload</a>
                <a href="profile.php">Profile</a>
                <a href="index.php">Logout</a>
            </div>
        </div>
    </div>

    <div class="container">
    <div class="row">
        <?php
        
        $servername = "localhost";
        $dusername = "root";
        $password = "password";
        $dbname = "camagru";
            try
            {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $str = "SELECT * FROM images";
                $res = $conn->query($str);
                while ($new = $res->fetch())
                {
                    $fig = "<figure>";
                    $img = "<img src=\"".$new['image']."\">";
                    $capt = "<figcaption>".$new['name']."</figcaption>";
                    $cl = "</figure>";
                    echo $fig.$img.$capt.$cl;
                }
            }
            catch(PDOException $e)
            {
                echo "[INFO] " . $e->getMessage();
            }
        ?>
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