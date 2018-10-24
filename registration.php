<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body id="body">
    <div id="main">
        <center><h2>Registration</h2></center>
     <form class="form" action="registration.php" method="post">
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
        <button id="reg_btn" type="submit" class="btn" name="reg_user">Register</button>
    </form>
    <?php
        session_start();
        $errors = array();
        $username = "";
        $email    = "";
        $servername = "localhost";
        $dusername = "root";
        $password = "password";
        $dbname = "camagru";
        $conn = mysqli_connect($servername, $dusername, $password, $dbname);
        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error()."<br>");
        }
        /*checks if the register button is clicked, if clicked it saves all the information
        from the form in corresponding variables*/
        if (isset($_POST['reg_user']))
        {
            $firstname = $_POST['firstname'];
            $surname = $_POST['surname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password_1 = $_POST['password'];
            $password_2 =  $_POST['cpassword'];
            $hash = password_hash($password_1, PASSWORD_DEFAULT);
            if (password_verify($password_2, $hash) == TRUE)
            {
                $query = "INSERT INTO users (name, surname, username, email, password) VALUES('$firstname', '$surname', '$username',
                '$email', '$hash')";
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                echo "registered";
            }
            else
            {
                echo "Passwords do not match, please re-enter passwords";
            }
            mysqli_query($conn, $query);
        }
    ?>
</div>
</body>
</html>