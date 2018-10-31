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
        <center><h2>Forgot password</h2></center>
        <form class="form" action="login.php" method="post">
            <label>New password:</label><br>
            <input type="password" name="password" class="inputvalues" placeholder="Enter new password"/><br>
            <label>Confirm password:</label><br>
            <input type="password" name="cpassword" class="inputvalues" placeholder="Confirm new password"/><br>
            <button type="submit" id="login_btn" name="change">Change password</button>
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
            if (isset($_POST['change']))
            {
                if (empty($_POST['password']) || empty($_POST['cpassword']))
                {
                    echo "Empty field <br>";
                }
                else
                {
                    $pw = $_POST['cpassword'];
                    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    if (password_verify($pw, $hash) == TRUE)
                    {
                        $qry = "UPDATE password FROM users";
                        $result = mysqli_query($conn, $qry);
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                if ($row['email'] == $email)
                                {
                                    $subject = "Camagru password change";
                                    $body = "http://localhost:8080/camagru/.php";
                                    $headers = "From: noreply@camagru.com";
                                    mail ($email, $subject, $body, $headers);
                                }
                            }
                        }
                    }
                }
            }
    ?>
</body>
</html>