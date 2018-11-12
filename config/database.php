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
$conn = mysqli_connect($servername, $dusername, $password);
/*
Check connection
*/
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error()."<br>");
}

/* 
Create database if it hasn't been already
*/
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (mysqli_query($conn, $sql))
{
    echo "Database created successfully<br>";
}
else
{
    echo "Error creating database: " . mysqli_error($conn)."<br>";
}

/*
Refresh connection
*/
$conn = mysqli_connect($servername, $dusername, $password, $dbname);
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error()."<br>");
}

/*
User Table
*/
$sql = "CREATE TABLE IF NOT EXISTS $tbl_users (
	user_id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
	name TEXT NOT NULL, surname TEXT NOT NULL, username TEXT NOT NULL,
    email TEXT NOT NULL, password TEXT NOT NULL)";
	
if (mysqli_query($conn, $sql)) {
	echo "User Table created successfully<br>";
} else {
	echo "Error creating table: ".mysqli_error($conn)."<br>";
}

/*
image table
*/

$sql1 = "CREATE TABLE IF NOT EXISTS images (  
     id int(11) NOT NULL AUTO_INCREMENT,  
     name blob NOT NULL,  
     PRIMARY KEY (id)  
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";
   if (mysqli_query($conn, $sql1))
   {
       echo "Image Table created successfully<br>";
    }
    else
    {
        echo "Error creating table: ".mysqli_error($conn)."<br>";
    }

$sql2 = "CREATE TABLE IF NOT EXISTS comments (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    uid VARCHAR(128) NOT NULL,
    date VARCHAR(128) NOT NULL,
    message TEXT NOT NULL
    )";
    if (mysqli_query($conn, $sql2))
    {
        echo "Comment Table created successfully<br>";
    }
    else
    {
        echo "Error creating table: ".mysqli_error($conn)."<br>";
    }
/*
$sql = "INSERT INTO $tbl_user (user_id, user_title) VALUES
(1, ''),

if (mysqli_query($conn, $sql)) {
    echo "User created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
}
*/

mysqli_close($conn);
?>