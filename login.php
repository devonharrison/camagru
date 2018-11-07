<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="login.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <center><h1>Camagru</h1></center>
    <div>
        <center><h2>Login</h2></center>
        <form class="form" action="login.php" method="post">
            <label>Username:</label><br>
            <input type="text" name="username" class="inputvalues" placeholder="Enter a username"/><br>
            <label>Password:</label><br>
            <input type="password" name="password" class="inputvalues" placeholder="Enter a password"/><br>
            <button type="submit" id="login_btn" name="login">Login</button>
            <a href="forgotpw.php">Forgot your password?</a>
        </form>
    </div>
    <?php
        session_start();
        $servername = "localhost";
        $dusername = "root";
        $password = "password";
        $dbname = "camagru";
        $conn = mysqli_connect($servername, $dusername, $password, $dbname);
        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error()."<br>");
        }
        if (isset($_POST['login']))
        {
            $key = $_GET['key'];
            echo "hello".$key;
            if (empty($_POST['username']) || empty($_POST['password']))
            {
                echo "Empty field <br>";
            }
            else
            {
                $username = $_POST['username'];
                $password_1 = $_POST['password'];
                $qry = "SELECT username, password FROM users";
                $result = mysqli_query($conn, $qry);
                $u = 0;
                if (mysqli_num_rows($result) > 0)
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        if ($row['username'] == $username)
                        {
                            $pw = $row['password'];
                        }
                    }
                }
                if (isset($_GET['key']))
                {
                    
                    /*if (password_verify($username, $key))
                    {
                        if (password_verify($password_1, $pw) == TRUE)
                        {
                            header('Location: http://localhost:8080/camagru/home.php');
                            $_SESSION['username'] = $username;
                            $_SESSION['success'] = "You are now logged in";
                        }
                    }*/
                }
                $key = $_GET['key'];
                echo $key;
            }
        }
    ?>
</body>
</html>