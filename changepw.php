<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Change Password</title>
        <link rel="stylesheet" href="login.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <center><h1>Camagru</h1></center>
    <div>
        <center><h2>Forgot password</h2></center>
        <form class="form" action="login.php" method="post">
            <label>User name:</label><br>
            <input type="text" name="username" class="inputvalues" placeholder="Enter username"/><br>
            <label>Unique code:</label><br>
            <input type="text" name="ucode" class="inputvalues" placeholder="Enter code"/><br>
            <label>New password:</label><br>
            <input type="password" name="password" class="inputvalues" placeholder="Enter new password"/><br>
            <label>Confirm password:</label><br>
            <input type="password" name="cpassword" class="inputvalues" placeholder="Confirm new password"/><br>
            <button type="submit" id="login_btn" name="change">Change password</button>
        </form>
    </div>
    <?php
        session_start();
        $servername = "localhost";
        $dusername = "root";
        $password = "password";
        $dbname = "camagru";
        $DB_DSN='mysql:host=localhost;dbname=camagru';
        if (isset($_POST['change']))
        {
            if (empty($_POST['password']) || empty($_POST['cpassword']) || empty($_POST['ucode']) || empty($_POST['username']))
            {
                echo "Empty field <br>";
            }
            else
            {
                $pw = $_POST['cpassword'];
                $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                try
                {
                    $conn = new PDO($DB_DSN, $dusername, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    if (password_verify($pw, $hash) == TRUE)
                    {
                        if ($_POST['ucode'] == $_SESSION['code'] && $_POST['username'] == $_SESSION['username'])
                        {
                            $username = $_POST['username'];
                            $check = "SELECT username, email FROM users";
                            $res = $conn->query($check);
                            while ($new = $res->fetch())
                            {
                                if ($new['username'] == $username)
                                {
                                    $qry = "UPDATE users SET password=$hash WHERE username=$username";
                                    $conn->query($qry);
                                }
                            }
                        }
                    }
                }
                catch(PDOException $e)
                {
                    echo "[INFO] " . $e->getMessage();
                }
            }
        }
    ?>
</body>
</html>