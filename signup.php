<?php

$usernameError="";
$passwordError="";
$cpasswordErorr="";
$db = new PDO("mysql:host=localhost;dbname=youcode_store;charset=UTF8","root","");
if(isset($_POST['submit'])){
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    if(empty($_POST['user'])){
        $usernameError ="name is required";
    }
    else{
        if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            $usernameError ="invalid username, spaces are not allowed";
        }
    }
    if(empty($_POST['pass'])){
        $passwordError="password is required";
    }
    else{
        if(!preg_match("/^[a-zA-Z0-9]*$/",$password)){
            $passwordError = "invalid password no spaces are allowed and no spacial characters";
        }
    }

    if(empty($_POST['cpass'])){
        $cpasswordErorr="you must confirm your password";
    }
    else{
        if($password!=$cpassword){
            $cpasswordErorr = "passwords are not the same";
        }
    }
}
if(isset($_POST['submit']) && $cpasswordErorr==""  && $passwordError =="" && $usernameError==""){
    $sql = "INSERT INTO users VALUES(NULL,?,?)";

    $stmt =$db->prepare($sql);
    $stmt->bindValue(1,$username,PDO::PARAM_STR);
    $stmt->bindValue(2,$username,PDO::PARAM_STR);
    $stmt->execute();

    session_start();
    $_SESSION['auth']=$username;
    header("location:index.php?username=".$username);
}


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
    <h2>Signup</h2>
    <fieldset style="width: 40%">
        <br>
        <form action="" method="POST">
            username : <input type="text" placeholder="username" name="user"><br> <?php echo $usernameError?><br><br>
            password : <input type="password" placeholder="password" name="pass"><br> <?php echo $passwordError?><br><br>
            Confirm  : <input type="password" placeholder="password" name="cpass"><br> <?php echo $cpasswordErorr?><br><br>
            <input type="submit" value="signup" name="submit">
            <p>back to <a href="login.php">login</a></p>
        </form>
    </fieldset>
</center>

</body>
</html>
