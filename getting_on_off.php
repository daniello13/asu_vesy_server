<?php
require_once 'env.php';
//запрос вида http://moneto4ka.tk/getting_on_off.php?message=data-on&date=28-03-2019&time=13:56:12

$link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));
if (!empty($_GET["message"]) && !empty($_GET["date"])&&!empty($_GET["time"])) 
{
    $message = mysqli_real_escape_string($link, $_GET["message"]);
    $date = mysqli_real_escape_string($link, $_GET["date"]);
    $time = mysqli_real_escape_string($link, $_GET["time"]);
    $query ="INSERT INTO `6mi_on-off` VALUES(NULL, '$message', '$date', '$time')";
    //echo $query;
    //echo "<br>";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    mysqli_close($link);
   
   
    
    
    
}
else { echo "Переменные не дошли. Проверьте все еще раз."; }

?>