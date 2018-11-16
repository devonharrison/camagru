<?php
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
  <ul>
      <li id="left"><a id="camagru" href="#home">Camagru</a></li>
      <li class="right"><a class="info" href="../index.php">Logout</a></li>
      <li class="right"><a class="info" href="../settings.php">Settings</a></li>
  </ul>

  <div id="camera">
  <form method="POST" action="storeimage.php">
    <video id="video" width="0" height="0" autoplay></video>
    <canvas id="canvas" width="640" height="480"></canvas>
    <a href="#"><img src="../images/camera_icon.png" alt="capture" id="snap"></a>
    <input type="hidden" name="image" id="img">
    <canvas id="canvas2" width="640" height="480"></canvas>
    <script src="webcam.js"></script>
    <button type="Submit" class="btn btn-success">Save</button>
  </div>

  <div id="upload">
    <form action="../fileUpload.php" method="POST" enctype="multipart/form-data">
        <label>Upload a File:</label>
        <input type="file" name="file" id="image">
        <input type="submit" name="but_upload" value="Save name" >
    </form>
  </div>
  <?php
    echo"<form method='POST' action='".setComments($connect)."'>
    <input type='hidden' name='uid' value='Anonymous'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <button type='submit' name='commentSubmit'>Comment</button>
    </form>";
    getComments($connect);
  ?>
</body>
</html>