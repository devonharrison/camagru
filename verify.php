<?php
    session_start();
    $key = $_GET['key'];
    $servername = "localhost";
    $dusername = "root";
    $password = "password";
    $dbname = "camagru";
    $conn = mysqli_connect($servername, $dusername, $password, $dbname);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error()."<br>");
    }
    if(password_verify($_SESSION['username'], $key))
    {
        $username = $_SESSION['username'];
        $qry = "SELECT username, user_id FROM users";
        $result = mysqli_query($conn, $qry);
        if (mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                if ($row['username'] == $username)
                {
                    $id = $row["user_id"];
                }
            }
        }
        $add = "UPDATE users SET verified='yes' WHERE user_id=$id";
        if (mysqli_query($conn, $add))
        {
            echo "Account information updated <br>";
        }
        $_SESSION['logged_in'] = "yes";
        //header('Location: http://localhost:8080/camagru/login.php');
        echo "User ". $_SESSION['username'] . " successfully registered <br>Please wait 3 seconds to be redirected to login page.";
    }
    else
    {
        $_SESSION['verified'] = "no";
    }
?>