<?php
 $connect = mysqli_connect("localhost", "root", "password", "camagru");
    function setComments($connect)
    {
        if (isset($_POST['commentSubmit']))
        {
            $uid = $_POST['$uid'];
            $date = $_POST['$date'];
            $message = $_POST['$message'];

            $sql = "INSERT INTO comments(uid, date, message) VALUES ('$uid', '$date', '$message')";
            $result = $connect->query($sql);
        }
    }
?>