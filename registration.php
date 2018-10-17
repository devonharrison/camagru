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
        <center><h2>Register</h2></center>
     <form class="form" action="register.php" method="post">
        <label>First name:</label><br>
        <input type="First name" class="inputvalues" placeholder="Enter first name"/><br>
        <label>Surname:</label><br>
        <input type="surname" class="inputvalues" placeholder="Enter surname"/><br>
        <label>Username:</label><br>
        <input type="text" class="inputvalues" placeholder="Enter a username"/><br>
        <label>Email address:</label><br>
        <input type="text" class="inputvalues" placeholder="Enter a valid email address"/><br>
        <label>Password:</label><br>
        <input type="password" class="inputvalues" placeholder="Enter a password"/><br>
        <label>Confirm Password:</label><br>
        <input type="password" class="inputvalues" placeholder="Confrim password"/><br>
        <input type="button" id="reg_btn" value="Register"/>
    </form>
</div>
</body>
</html>