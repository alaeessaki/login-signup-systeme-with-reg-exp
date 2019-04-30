<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>

<center>
    <h2>Login</h2>
    <fieldset style="width: 40%">
        <br>
        <form action="auth.php" method="post">
            <legend style="color:red"><?php if(isset($_SESSION['error'])){echo $_SESSION['error'];}?></legend><br>
            username : <input type="text" placeholder="username" name="username"><br><br>
            password : <input type="password" placeholder="password" name="password"><br><br>
            <input type="submit" value="login" name="submit">
            <p>you don't have accout yet? <a href="signup.php">sign-up</a></p>
        </form>
    </fieldset>
</center>
</body>
</html>
