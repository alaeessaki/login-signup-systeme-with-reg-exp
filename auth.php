<?php
$db = new PDO("mysql:host=localhost;dbname=youcode_store;charset=UTF8","root",'');

$sql = "SELECT * FROM users";
$stmt = $db->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['submit'])){
  foreach ($rows as $row){
      if($username==$row['username'] && $password==$row['password']){
          $_SESSION['auth']=$username;
          unset($_SESSION['error']);
          header('location:index.php?username='.$username);
          break;
      }
      else{
          $_SESSION['error'] = "username or password is unvalid";
          header('location:login.php');
      }
  }
}