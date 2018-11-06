<!DOCTYPE html>
<html>
    <head>
        <title>Forgot password</title>
        <link rel="stylesheet" href="login.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <center><h1>Camagru</h1></center>
    <div>
        <center><h2>Forgot password</h2></center>
        <form class="form" action="login.php" method="post">
            <label>Email:</label><br>
            <input type="text" name="email" class="inputvalues" placeholder="Confirm email address"/><br>
            <button id="login_btn" type="submit" name="send">Send email</button>
        </form>
    </div>
    <?php
        $servername = "localhost";
        $dusername = "root";
        $password = "password";
        $dbname = "camagru";
        $conn = mysqli_connect($servername, $dusername, $password, $dbname);
        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error()."<br>");
        }
        if (isset($_POST['send']))
        {
            $qry = "SELECT username, email FROM users";
            $result = mysqli_query($conn, $qry);
            if (mysqli_num_rows($result) > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    if ($row['email'] == $_POST['email'])
                    {
                        $email = $_POST['email'];
                        break ;
                    }
                }
            }
            //still not working
            $hash = password_hash($email, PASSWORD_DEFAULT);
            $uniquelink = "http://localhost:8080/camagru/changepw.php?action=set&key=".$hash;
            $subject = "Camagru password change";
            $body = $uniquelink;
            $headers = "From: noreply@camagru.com";
            mail ($email, $subject, $body, $headers);
        }
    ?>
</body>
</html>