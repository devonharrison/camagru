<?php
 
    function setComments($connect)
    {
        if (isset($_POST['commentSubmit']))
        {
            $uid = $_POST['uid'];
            $date = $_POST['date'];
            $message = $_POST['message'];
            $image_id = $_POST['image_id'];

            $sql = "INSERT INTO comments(uid, date, message, image_id) VALUES ('$uid', '$date', '$message', '$image_id')";
            $result = mysqli_query($connect,$sql);
        }
    }

    function getComments($connect)
    {
        $sql = "SELECT * FROM comments WHERE id=image_id";
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