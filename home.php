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
        <a class="camagru" href="home.php">Camagru</a>
        <a class="info" href="index.php" name='logout'>Logout</a>
        <a class="info" href="profile.php" name='signup'>Profile</a>
        <a class="info" href="webcam/web.php" name='upload' >Upload</a>
    </div>
    <div class="container">
    <div class="row">
        <?php
            session_start();
            $servername = "localhost";
            $dusername = "root";
            $password = "password";
            $dbname = "camagru";
            if ($_POST['logout'])
            {
                $_SESSION['logged_in'] = 'no';
                //session_unset();
                //session_destroy();
            }
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
</body>
</html>