<?php
    $currentDir = getcwd();
    $uploads = "/downloads/";

    $erros = [];

    $fileExtensions = ['jpeg', 'png', 'jpg']; //which files to be uploaded

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['name'];
?>