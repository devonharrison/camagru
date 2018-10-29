<?php
    $currentDir = getcwd();
    $uploads = "/Documents/";
    $connect = mysqli_connect("localhost", "root", "amogelang", "camagru");

    $erros = [];

    $fileExtensions = ['jpeg', 'png', 'jpg', 'gif']; //which files to be uploaded

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $fileExtension = strtolower(end(explode('.', $fileName)));

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName);

    if (isset($_POST['submit']))
    {
        if (! in_array($fileExtension, $fileExtensions))
        {
            $erros[] =  "Please choose a photo";
        }

        if($fileSize > 10000000000)
        {
            $erros[] = " file to big";
        }

        if(empty($erros))
        {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            $fileName = addslashes(file_get_contents($fileTmpName));  
            $query = "INSERT INTO tbl_images VALUES ('$fileTmpName', '$fileName')";  
            if(mysqli_query($connect, $query))  
            {  
                 echo '<script>alert("Image Inserted into Database")</script>';  
            }  
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