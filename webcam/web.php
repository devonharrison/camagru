<?php
    session_start();
    date_default_timezone_set('Africa/CapeTown');
    include 'dbh.inc.php';
    include 'comment.inc.php';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Camera</title>
  <link rel="stylesheet" href="web.css">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <div class="top">
        <a class="camagru" href="home.php">Camagru</a>
        <a class="info" href="index.php" name='logout'>Logout</a>
        <a class="info" href="profile.php" name='profile'>Profile</a>
    </div>

  <div class="camera">
  <form method="POST">
    <video id="video" width="0" height="0" autoplay></video>
    <canvas id="canvas" width="640" height="480"></canvas>
    <a><img src="../images/camera_icon.png" alt="capture" id="snap"></a>
    <input type="hidden" name="image" id="img">
    <canvas id="canvas2" width="640" height="480"></canvas>
    <script src="webcam.js"></script>
    <button type="Submit" class="btn btn-success" name="save">Save</button>
  </form>
    <?php
        if (isset($_POST['save']))
        {
          if ($_SESSION['logged_in'] == 'no')
          {
            echo "Must be logged in to upload image";
          }
          else
          {
            $img = $_POST['image'];
            $servername = "localhost";
            $dusername = "root";
            $password = "password";
            $dbname = "camagru";
            $name = "";
            try
            {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $str = "INSERT INTO images (image, name) VALUES ('$img', '$name')";
                $conn->exec($str);
                echo "image uploaded";
                header('Location: web.php');
            }
            catch(PDOException $e)
            {
                echo "[INFO] " . $e->getMessage();
            }
          }
        }
    ?>
  </div>

  <div id="upload">
    <form action="../fileUpload.php" method="POST" enctype="multipart/form-data">
        <label>Upload a File:</label>
        <input type="file" name="file" id="image">
        <input type="submit" name="but_upload" value="Save name">
    </form>
    <?php
        echo"<form method='POST' action='".setComments($connect)."'>
        <input type='hidden' name='uid' value='Anonymous'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <textarea name='message'></textarea><br>
        <button type='submit' name='commentSubmit'>Comment</button>
        </form>";
        getComments($connect);
  ?>
  </div>

</body>
</html>