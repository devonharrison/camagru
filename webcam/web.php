<?php
    session_start();
    date_default_timezone_set('Africa/CapeTown');
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
    <div class="header">
        <a class="camagru" href="../home.php">Camagru</a>
        <div class="header-right">
          <a class="info" href="../index.php" name='logout'>Logout</a>
          <a class="info" href="../profile.php" name='profile'>Profile</a>
        </div>
    </div>

  <div class="camera">
  <form method="POST">
    <video id="video" width="0" height="0" autoplay></video>
    <canvas id="canvas" width="640" height="480">
    </canvas>
    <a><img src="../images/camera_icon.png" alt="capture" id="snap"></a>
    <input type="hidden" name="image" id="img">
    <canvas id="canvas2" width="640" height="480"></canvas>
    
    
    <button type="Submit" class="btn btn-success" name="save">Save</button>
  </form>
    <?php
        if (isset($_POST['save']))
        {
          if ($_SESSION['logged_in'] == 'no')
          {
            header('Location: ../login.php');
          }
          else
          {
            $img = $_POST['image'];
            $servername = "localhost";
            $dusername = "root";
            $password = "password";
            $dbname = "camagru";
            $name = $_SESSION['username'];
            try
            {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $str = "INSERT INTO images (image, name) VALUES ('$img', '$name')";
                $conn->exec($str);
                header('Refresh:2 ; url="../home.php"');
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

  </div>

   <div class="filter">
    <img class="stickers" name="kakashi" src="../stickers/kakashi.png" alt="kakashi.png">
    <img class="stickers" name="titan" src="../stickers/titan.png" alt="titan.png">
    <img class="stickers" name="vegeta" src="../stickers/vegeta.png" alt="vegeta.png">
    <img class="stickers" name="wall" src="../stickers/wall.png" alt="wall.png">
    <img class="stickers" name="kagura" src="../stickers/kagura.png" alt="kagura.png">
  </div>
  <script>
    var video = document.getElementById('video');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var canvas2 = document.getElementById('canvas2');
    var context2 = canvas2.getContext('2d');
    var stickers = document.querySelectorAll( '.stickers' );

    //go thru every sticker and assign event listener
    console.log(stickers[1]);
    stickers.forEach( function( item ){
        item.onclick = function(){
            console.log( item );
        }
    })

    // Get access to the camera!
    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
    {
      navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream)
      {
          video.srcObject = stream;
      });
    }
    var image = new Image();
    image.src = '../stickers/titan.png';
    setInterval(() => {
	    context.drawImage(video, 0, 0, 640, 480);
        context.drawImage(image,0,0,640,480);
    }, 16);

    // Trigger photo take
    document.getElementById("snap").addEventListener("click", function() {
	    context2.drawImage(video, 0, 0, 640, 480);
        context2.drawImage(image,0,0,640,480);
        document.getElementById("img").value = canvas2.toDataURL();
    });
  </script>
</body>
</html>