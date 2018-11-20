<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Camagru</title>
    <link rel="stylesheet" href="home.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <a href="home.php">Camagru</a>
    <ul>
        <li><a href="webcam/web.php">Upload</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="index.php">Logout</a></li>
    </ul>
        
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