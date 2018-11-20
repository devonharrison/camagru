<?php
    $img = $_POST['image'];
    $servername = "localhost";
    $dusername = "root";
    $password = "password";
    $dbname = "camagru";
    $nme = "tumi";
    
    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $str = "INSERT INTO images (image, name) VALUES ('$img', '$nme')";
        $conn->exec($str);
        echo "image uploaded";
        header('Location: web.php');
    }
    catch(PDOException $e)
    {
        echo "[INFO] " . $e->getMessage();
    }

  
?>