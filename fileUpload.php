<?php
    $currentDir = getcwd();
    $uploads = "/Documents/";

    $erros = [];

    $fileExtensions = ['jpeg', 'png', 'jpg', 'gif']; //which files to be uploaded

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName = $_FILES['myfile']['tmp_name'];
    $fileTyoe = $_FILES['myfile']['type'];
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