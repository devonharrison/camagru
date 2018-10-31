<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Camera</title>
  <link rel="stylesheet" href="web.css">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
  <ul>
      <li id="left"><a id="camagru" href="#home">Camagru</a></li>
      <li class="right"><a class="info" href="index.php">Logout</a></li>
      <li class="right"><a class="info" href="#">Settings</a></li>
  </ul>
  <div id="parent">
  <div>
    <video id="video" width="0" height="0" autoplay></video>
    <canvas id="canvas" width="640" height="480"></canvas>
    <a href="#"><img src="../images/camera_icon.png" alt="capture" id="snap"></a>
    <canvas id="canvas2" width="640" height="480"></canvas>
    <script src="webcam.js"></script>
  </div>
</div>
</body>
</html>