<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Camagru</title>
    <link rel="stylesheet" href="index.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <div class="header">
        <a class="camagru" href="home.php">Camagru</a>
        <div class="header-right">
            <a class="info" href="index.php" name='logout'>Logout</a>
            <a class="info" href="profile.php" name='signup'>Profile</a>
        </div>
    </div>
    <form method="post">
        <button type="submit" id="login_btn" name="like">Like</button>
    </form>
            <?php
                include 'webcam/comment.inc.php';
                $servername = "localhost";
                $dusername = "root";
                $password = "password";
                $dbname = "camagru";
                $DB_DSN='mysql:host=localhost;dbname=camagru';
                $id = $_GET['img'];
                $user = $_GET['user'];
                try
                {
                    $conn = new PDO($DB_DSN, $dusername, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $str = "SELECT * FROM images";
                    $res = $conn->query($str);
                    echo '<div class="container">';
                    while ($new = $res->fetch())
                    {
                        if ($id == $new['id'])
                        {
                            $img = "<img src=\"".$new['image']."\">";
                            echo '<div class="img-con">';
                            echo $img;
                            echo $new['likes'];
                            echo '</div>';
                        }
                    }
                    echo "<form method='POST' action='".setComments($conn, $user, $id)."'>
                    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                    <textarea name='message'></textarea><br>
                    <button type='submit' name='commentSubmit'>Comment</button>
                    </form>";
                    $str = "SELECT * FROM comments";
                    $res = $conn->query($str);
                    echo '</div>';
                    echo '<div class="clearfix"></div>';
                    while ($new = $res->fetch())
                    {
                        if ($id == $new['image_id'] && $user == $new['username'])
                        {
                            echo $new['message'] . "<br>";
                        }
                    }
                }
                catch(PDOException $e)
                {
                    echo "[INFO] " . $e->getMessage();
                }
                if (isset($_POST['like']))
                {
                    try
                    {
                        $conn = new PDO($DB_DSN, $dusername, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $str = "SELECT * FROM images";
                        $res = $conn->query($str);
                        while ($new = $res->fetch())
                        {
                            if ($id == $new['id'])
                            {
                                $likes = $new['likes'];
                            }
                        }
                        $likes++;
                        $qry = "UPDATE images SET likes=$likes WHERE id=$id";
                        $conn->exec($qry);
                    }
                    catch (PDOException $e)
                    {
                        echo "[INFO] " . $e->getMessage();
                    }
                }
            ?>
</body>
</html>