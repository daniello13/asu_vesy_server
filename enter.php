<!DOCTYPE html>
<html>
   
<head>
  <meta charset="UTF-8">
  <title>Log In</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<?php
require_once 'env.php';
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
 
// выполняем операции с базой данных

// закрываем подключение
mysqli_close($link);
session_start();
/*if($_SESSION['admin']){
 header("Location: admin.php");
 exit;
}*/
$admin = 'admin';
$pass = '46928742ccb550acd74092d740058f34';
if($_POST['submit']){
 if($admin == $_POST['user'] AND $pass == md5($_POST['pass'])){
  $_SESSION['admin'] = $admin;
  header("Location: admin.php");
  exit;
 }else echo '<p>Логин или пароль неверны!</p>';
}
?>
<body>
  <h1>Sign In Form</h1>
<div id="wrapper">
        <form id="signin" method="post" name="theForm">
                <input type="text" id="user" name="user" placeholder="username" />
                <input type="password" id="pass" name="pass" placeholder="password" />
                <button type="submit" name="submit" value="submit">&#xf0da;</button> 
        </form>
</div>


</body>
</html>
