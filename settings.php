<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Settings</title>
        <link rel="stylesheet" href="login.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <center><h1>Camagru</h1></center>
    <div>
        <center><h2>Settings</h2></center>
        <form class="form" method="post">
            <label>New Username:</label><br>
            <input type="text" name="username" class="inputvalues" placeholder="Enter new username"/><br>
            <label>New Email:</label><br>
            <input type="text" name="email" class="inputvalues" placeholder="Enter new username"/><br>
            <label>New Password:</label><br>
            <input type="password" name="password" class="inputvalues" placeholder="Enter new password"/><br>
            <label>Confirm New Password:</label><br>
            <input type="password" name="cpassword" class="inputvalues" placeholder="Confirm new password"/><br>
            <button type="submit" id="login_btn" name="update">Update</button>
        </form>
    </div>
    <?php
        function updateInfo($valueName, $value, $id)
        {
            $servername = "localhost";
            $dusername = "root";
            $password = "password";
            $dbname = "camagru";
            $DB_DSN='mysql:host=localhost;dbname=camagru';
            if ($valueName == 'email' || $valueName == 'username')
            {
                try
                {
                    $conn = new PDO($DB_DSN, $dusername, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $str = "SELECT * FROM users";
                    $res = $conn->query($str);
                    $u = 0;
                    while ($new = $res->fetch())
                    {
                        if ($new['username'] == $username)
                        {
                            echo "Username " . $username . " already taken<br>";
                            $u = 1;
                        }
                        if ($new['email'] == $email)
                        {
                            echo "Email address " . $email . " already used<br>";
                            $u = 1;
                        }
                    }
                    if ($u == 0)
                    {
                        if ($valueName == 'username')
                        {
                            $add = "UPDATE users SET username=$value WHERE user_id=$id";
                            if ($conn->query($add))
                            {
                                echo "Username updated successfully<br>";
                            }
                        }
                        if ($valueName == 'email')
                        {
                            $add = "UPDATE users SET email=$value WHERE user_id=$id";
                            if ($conn->query($add))
                            {
                                echo "Email updated successfully<br>";
                            }
                        }
                    }
                }
                catch(PDOException $e)
                {
                    echo "[INFO] " . $e->getMessage() . "<br>";
                }
            }
            if ($valueName == 'password')
            {
                try
                {
                    $conn = new PDO($DB_DSN, $dusername, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $add = "UPDATE users SET password=$value WHERE user_id=$id";
                    if ($conn->query($add))
                    {
                        echo "Password updated successfully<br>";
                    }
                }
                catch(PDOException $e)
                {
                    echo "[INFO] " . $e->getMesssage();
                }
            }
        }
        if (isset($_POST['update']))
        {
            $id = $_SESSION['id'];
            if (!empty($_POST['username']))
            {
                $value = $_POST['username'];
                updateInfo('username', $username, $id);
            }
            if (!empty($_POST['email']))
            {
                $value = $_POST['email'];
                updateInfo('email', $email, $id);
            }
            if (!empty($_POST['password']))
            {
                if (empty($_POST['cpassword']))
                {
                    echo "Please confrim password";
                }
                else
                {
                    $hash = password_hash($_POST['password']);
                    if (password_verify($_POST['cpassword'], $hash) == TRUE)
                    {
                        $value = $hash;
                        updateInfo('password', $value, $id);
                    }
                    else
                    {
                        echo "Passwords do not match";
                    }
                }
            }
        }
        $conn = null;
    ?>
</body>
</html>
