<?php
//один столбец - id, 2 - номер терминала, 3 - значение веса, 4 - дата и время
//запрос вида moneto4ka.tk/getting_data.php?weight=2345.12
require_once 'env.php';
if (!empty($_GET["weight"])) 
{
   
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));
    $weight = mysqli_real_escape_string($link, $_GET["weight"]);
    date_default_timezone_set('Europe/Kiev');
    $date = date('Y-m-d H:i:s', time());
    //$date = date('d-m-Y H:i:sa');
   $date_t=date('d-m-Y', time());
   $time_t = date('H:i:s', time());
    $query ="INSERT INTO `6mi_datainblack` VALUES(NULL, 1, '$weight', '$date', NULL)";
    //echo $query;
    //echo "<br>";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    mysqli_close($link);
    
    
    
    
    
}
else { echo "Переменные не дошли. Проверьте все еще раз."; }

?>