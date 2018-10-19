<?php
?>
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
        <input type="button" id="reg_btn" name="formsubmit" value="Submit"/>
    </form>
    <?php
        $servername = "localhost";
        $dusername = "root";
        $dpassword = "password";
        $dbname = "camagru";
        $conn = mysqli_connect($servername, $dusername, $dpassword);
        if (!$conn)
        {
            die("Connection failed: " . mysqli_connect_error()."<br>");
        }
        mysqli_select_db($dbname, $conn);
        if ($_POST['formsubmit'] == "Submit")
        {
            $name = $_POST['firstname'];
            $surname = $_POST['surname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $sql = "INSERT INTO camagru (name, surname, username, email, password)
            VALUES ($name, $surname, $username, $email, $password)";
            mysqli_query($conn, $sql);
        }
    ?>
</div>
</body>
</html>