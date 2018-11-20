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

    <div class="container">
<<<<<<< HEAD
            
=======
        <div class="row">
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
        </div>
>>>>>>> 2e66e7700cc8205171dd8e1c47a923a7ccdccc2e
    </div>

    <?php
        $_SESSION['logged_in'] = "no";
    ?>
</body>
</html>