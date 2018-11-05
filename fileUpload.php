<?php
   // include("./config/database.php");
    $currentDir = getcwd();
    $uploads = "Documents/";
    $connect = mysqli_connect("localhost", "root", "amogelang", "camagru");

    $erros = [];

    $fileExtensions = array('jpeg', 'png', 'jpg', 'gif'); //which files to be uploaded

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $picName = basename($fileName);
    $tagertFilePath = $uploads . $picName;
    $picType = strtolower(pathinfo($targertFilePath,PATHINFO_EXTENSION));
    $fileExtension = strtolower(end(explode('.', $fileName)));


    $uploadPath = $currentDir . $uploadDirectory . basename($fileName);

  /*  if (isset($_POST['submit']))
    {
        // convert to base64
        $image_base64 = base64_encode(file_get_contents($fileTmpName));
        $image = 'data:image/' .$picType. ';base64,' .$image_base64;
        //$file = addslashes(file_get_contents($fileTmpName));  
        $query = "INSERT INTO images(name) VALUES ('".$image."')";  
        if(mysqli_query($connect, $query))  
        {  
             echo '<script>alert("Image Inserted into Database")</script>';  
        }  
    }*/

    if (isset($_POST['submit']))
    {
        if ( in_array($picType, $fileExtensions))
        {
           // $erros[] =  "Please choose a photo";
           // convert to base64
           $image_base64 = base64_encode(file_get_contents($fileTmpName));
           $image = 'data:image/' .$picType. ';base64,' .$image_base64;
           //$file = addslashes(file_get_contents($fileTmpName));  
           $query = "INSERT INTO images(id)(name) VALUES ('".$image."')";  
            mysqli_query($connect, $query);
            move_uploaded_file($fileTmpName, $upload.$fileName);
        /*{  
             echo '<script>alert("Image Inserted into Database")</script>';  
        } */ 
        }

        if($fileSize > 10000000000)
        {
            $erros[] = " file to big";
        }

        

        if(empty($erros))
        {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            if($didUpload)
            {
                echo "The file " . basename($fileName). " has been uploaded";
            }
            else
            {
                echo " Something went wrong. Try again or contact the very cool admin";
            }
        }
        else
        {
            foreach ($erros as $erros)
            {
                echo $error . "these are the errors" . " \n";
            }
        }
    }
?>