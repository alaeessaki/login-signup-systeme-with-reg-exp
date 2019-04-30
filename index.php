<?php
require_once 'auth.inc.php';
$username=$_GET['username'];

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
<h2>Welcome to home page<?php echo " ".$username?></h2>
<a href="page.php">go to second page</a>
<a href="logout.php">logout</a>
</body>
</html>
