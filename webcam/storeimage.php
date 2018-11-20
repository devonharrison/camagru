<?php
    $img = $_POST['image'];
    $servername = "localhost";
    $dusername = "root";
    $password = "password";
    $dbname = "camagru";
    $name = "";
    // $folderPath = "../upload/";
  
    // $image_parts = explode(";base64,", $img);
    // $image_type_aux = explode("image/", $image_parts[0]);
    // $image_type = $image_type_aux[1];
  
    // $image_base64 = base64_decode($image_parts[1]);
    // $fileName = uniqid() . '.png';
  
    // $file = $folderPath . $fileName;
    // file_put_contents($file, $image_base64);
  
    // print_r($fileName);
    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $str = "INSERT INTO images (image, name) VALUES ('$img', '$name')";
        $conn->exec($str);
        echo "image uploaded";
        header('Location: web.php');
    }
    catch(PDOException $e)
    {
        echo "[INFO] " . $e->getMessage();
    }

  
?>