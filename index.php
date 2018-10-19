<?php?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Camagru</title>
    <link rel="stylesheet" href="home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div style="margin:auto">
        <div id="home">
            <div id="left"><h3>skdjfb</h3></div>
            <div id="right">
                <center><h2>Register</h2></center>
            <form class="register" action="confirmation.php" method="post">
                <label>First name:</label><br>
                <input type="text" name="name" class="inputvalues" placeholder="Enter first name"/><br>
                <label>Surname:</label><br>
                <input type="text" name="surname" class="inputvalues" placeholder="Enter surname"/><br>
                <label>Username:</label><br>
                <input type="text" class="inputvalues" placeholder="Enter a username"/><br>
                <label>Email address:</label><br>
                <input type="text" class="inputvalues" placeholder="Enter a valid email address"/><br>
                <label>Password:</label><br>
                <input type="password" class="inputvalues" placeholder="Enter a password"/><br>
                <label>Confirm Password:</label><br>
                <input type="password" class="inputvalues" placeholder="Confrim password"/><br>
                <input type="submit" id="reg_btn" value="Register"/>
            </form>
            </div>
        </div>
    </div>
</body>
</html>