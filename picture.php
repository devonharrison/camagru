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

    <div class="container">
        <div class="row">
            <div class="column">
            <?php
                $id = $_GET['img'];
                try
                {
                    $conn = new PDO($DB_DSN, $dusername, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $e)
                {
                    echo "[INFO] " . $e->getMessage();
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>