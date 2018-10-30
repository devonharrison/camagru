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
            <label>Username:</label><br>
            <input type="text" name="username" class="inputvalues" placeholder="Enter a username"/><br>
            <label>Password:</label><br>
            <input type="password" name="password" class="inputvalues" placeholder="Enter a password"/><br>
            <button type="submit" id="login_btn" name="login">Login</button>
        </form>
    </div>
</body>
</html>