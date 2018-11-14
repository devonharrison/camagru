<?php
 
    function setComments($connect)
    {
        if (isset($_POST['commentSubmit']))
        {
            $uid = $_POST['uid'];
            $date = $_POST['date'];
            $message = $_POST['message'];

            $sql = "INSERT INTO comments(uid, date, message) VALUES ('$uid', '$date', '$message')";
            $result = mysqli_query($connect,$sql);
        }
    }

    function getComments($connect)
    {
        $sql = "SELECT * FROM comments";
        $result = mysqli_query($connect,$sql);
        if (mysqli_fetch_assoc($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['uid']. "<br>";
                echo $row['message']. "<br>";
            }
        }
    }
?>