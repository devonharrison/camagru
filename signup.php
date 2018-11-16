<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="signup.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <center><h1>Camagru</h1></center>
    <div>
        <center><h2>Sign-up</h2></center>
     <form class="form" action="signup.php" method="post">
        <label>First name:</label><br>
        <input type="text" name="firstname" class="inputvalues" placeholder="Enter first name"/><br>
        <label>Surname:</label><br>
        <input type="text" name="surname" class="inputvalues" placeholder="Enter surname"/><br>
        <label>Username:</label><br>
        <input type="text" name="username" class="inputvalues" placeholder="Enter a username"/><br>
        <label>Email address:</label><br>
        <input type="text" name="email" class="inputvalues" placeholder="Enter a valid email address"/><br>
        <label>Password:</label><br>
        <input type="password" name="password" class="inputvalues" placeholder="Enter a password"/><br>
        <label>Confirm Password:</label><br>
        <input type="password" name="cpassword" class="inputvalues" placeholder="Confrim password"/><br>
        <button id="reg_btn" type="submit" name="reg_user">Register</button>
    </form>
    <?php
        $errors = array();
        $username = "";
        $email    = "";
        $servername = "localhost";
        $dusername = "root";
        $password = "password";
        $dbname = "camagru";
        $DB_DSN='mysql:host=localhost;dbname=camagru';

        /*checks if the register button is clicked, if clicked it saves all the information
        from the form in corresponding variables*/
        if (isset($_POST['reg_user']))
        {
            if (empty($_POST['firstname']) || empty($_POST['surname']) || empty($_POST['username']) ||
            empty($_POST['email']) || empty($_POST['password']) || empty($_POST['cpassword']))
            {
                echo "Empty field <br>";
            }
            else
            {
                $firstname = $_POST['firstname'];
                $surname = $_POST['surname'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password_1 = $_POST['password'];
                $password_2 =  $_POST['cpassword'];
                $hash = password_hash($password_1, PASSWORD_DEFAULT);
                try
                {
                    $conn = new PDO($DB_DSN, $dusername, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = $conn->prepare("SELECT username, email FROM users");
                    echo "erfgeqrwgrtyjhuyj";
                    $sql->excecute();
                    while ($result = $sql->fetch(PDO::FETCH_ASSOC))
                    {
                        echo $result['username'] . "<br>";
                    }
                    echo "ergewrgwerg";
                }
                catch(PDOException $e)
                {
                    echo "Error: " . $e->getMessage();
                }
                /*$qry = "SELECT username, email FROM users";
                $result = mysqli_query($conn, $qry);
                $u = 0;
                if (mysqli_num_rows($result) > 0)
                {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        if ($row['username'] == $username)
                        {
                            echo "Username ".$username." taken.<br>";
                            $u = 1;
                        }
                        if ($row['email'] == $email)
                        {
                            echo "Email ".$email." already used.<br>";
                            $u = 1;
                        }
                    }
                }
                if ($u == 0)
                {
                    if (password_verify($password_2, $hash) == TRUE)
                    {
                        $_SESSION['username'] = $username;
                        $_SESSION['password'] = $hash;
                        $_SESSION['email'] = $email;
                        $add = "INSERT INTO users (name, surname, username, email, password, verified) VALUES('$firstname',
                        '$surname', '$username', '$email', '$hash', 'no')";
                        mysqli_query($conn, $add);
                        $hash = password_hash($usernamem, PASSWORD_DEFAULT);
                        /* sends confirmation email with link to login page 
                        $subject = "Camagru registration confirmation";
                        $body = "Please click the following link to confirm your registration for your Camagru account. " . 
                        "http://localhost:8080/camagru/verify.php?key=".$hash;
                        $headers = "From: noreply@camagru.com";
                        mail ($email, $subject, $body, $headers);
                        echo "Confirmation email sent to ".$email."<br>";
                    }
                    else
                    {
                        echo "Passwords do not match, please re-enter passwords";
                    }
                }*/
            }
        }
        $conn = null;
    ?>
</div>
</body>
</html>