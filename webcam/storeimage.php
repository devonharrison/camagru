<?php
    $img = $_POST['image'];
    $servername = "localhost";
    $dusername = "root";
    $password = "password";
    $dbname = "camagru";
<<<<<<< HEAD

    // $folderPath = "../upload/";
  
    // $image_parts = explode(";base64,", $img);
    // $image_type_aux = explode("image/", $image_parts[0]);
    // $image_type = $image_type_aux[1];
  
    // $image_base64 = base64_decode($image_parts[1]);
    // $fileName = uniqid() . '.png';
  
    // $file = $folderPath . $fileName;
    // file_put_contents($file, $image_base64);
  
    // print_r($fileName);
=======
    $nme = "tumi";
    
>>>>>>> e154ab29da68b93042588f5318f9d7f9864abd63
    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $str = "INSERT INTO images (image) VALUES ('$img')";
        $conn->exec($str);
        echo "image uploaded";
        header('Location: web.php');
    }
    catch(PDOException $e)
    {
        echo "[INFO] " . $e->getMessage();
    }

  
?>