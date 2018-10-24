<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Camagru</title>
        <link rel="stylesheet" href="login.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body id="body">
    <div id="main">
        <center><h2>Login</h2></center>
     <form class="form" action="login.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username" class="inputvalues" placeholder="Enter a username"/><br>
        <label>Email address:</label><br>
        <input type="text" name="email" class="inputvalues" placeholder="Enter a valid email address"/><br>
        <label>Password:</label><br>
        <input type="password" name="password" class="inputvalues" placeholder="Enter a password"/><br>
        <button type="submit" class="btn" name="login">Login</button>
    </form>
</div>
</body>
</html>