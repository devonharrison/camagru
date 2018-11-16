<?php
/*
Login and Database information
*/
$servername = "localhost";
$dusername = "root";
$password = "password";
$dbname = "camagru";
$tbl_users = "users";

/*
Create connection
*/
try 
{
    $conn = new PDO("mysql:host=$servername", $dusername, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);;
    echo "[INFO] Connection successful<br>";
}
catch(PDOException $e)
{
    echo "[INFO] " . $e->getMessage() . "<br>";
}
/* create databse */
try
{
    $sql = "CREATE DATABASE $dbname";
    $conn->exec($sql);
    echo "[INFO] Database creation succesful<br>";
}
catch(PDOException $e)
{
    echo "[INFO] Database creation failed " . $e->getMessage() . "<br>";
}
/* Create tables */
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $users = "CREATE TABLE IF NOT EXISTS $tbl_users (
        user_id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
        name TEXT NOT NULL, surname TEXT NOT NULL, username TEXT NOT NULL,
        email TEXT NOT NULL, password TEXT NOT NULL, verified TEXT NOT NULL)";
    $conn->exec($users);
    echo "[INFO] User table created successfully<br>";
    /* Image table */
    $images = "CREATE TABLE IF NOT EXISTS images (  
        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    $conn->exec($images);
    echo "[INFO] Image table created successfully<br>";
    /*Comments table */
    $comments = "CREATE TABLE IF NOT EXISTS comments (
        id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        uid VARCHAR(128) NOT NULL,
        date VARCHAR(128) NOT NULL,
        message TEXT NOT NULL)";
    $conn->exec($comments);
    echo "[INFO] Comment table creation successful<br>";
}
catch(PDOException $e)
{
    echo "[INFO] " . $e->getMessage();
}
$conn = null;
?>