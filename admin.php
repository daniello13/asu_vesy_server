<?php
require_once 'env.php';
session_start();
if($_GET['do'] == 'logout'){
 unset($_SESSION['admin']);
 session_destroy();
}
if(!$_SESSION['admin']){
 header("Location: enter.php");
 exit;
}
?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Данные</title>
  <script
		src="https://code.jquery.com/jquery-1.12.3.min.js"
		integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
		crossorigin="anonymous"></script>
	<script src="add_comment.js"></script>
  <style type="text/css">
   table {
font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
font-size: 14px;
border-collapse: collapse;
text-align: center;
}
th, td:first-child {
background: #AFCDE7;
color: white;
padding: 10px 20px;
}
th, td {
border-style: solid;
border-width: 0 1px 1px 0;
border-color: white;
}
td {
text-align: right;
background: #D8E6F3;
padding: 4px;
}
th:first-child, td:first-child {
text-align: left;
}
  </style>
 </head> 
 <body>
     <a href="admin.php?do=logout">Выход</a>
     <a href="on-off.php">Включения и отключения</a>
<?php

$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link)); 
$query ="SELECT * FROM 6mi_datainblack";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
    echo "<table><tr><th>Id</th><th>Дата</th><th>Время</th><th>Номер терминала</th><th>Вес, кг</th><th>Комментарий</th><th></th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        $date=substr($row[3], 0, 10);
        $time = substr($row[3], 11, 8);
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$date</td>";
        echo "<td>$time</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo '<td><textarea name="comment">';echo $row[4];echo '</textarea></td>'; 
        echo '<td><button name="save_comment">Сохранить комментарий</button></td>'; 
        echo "</tr>";
    }
    echo "</table>";
}
?>
 </body>
</html>