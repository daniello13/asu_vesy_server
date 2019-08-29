<?php
//один столбец - id, 2 - номер терминала, 3 - значение веса, 4 - дата и время
//запрос вида http://moneto4ka.tk/newget.php?weight=2755&date=28-11-1997&time=10:39:47

if (!empty($_GET["weight"]) && !empty($_GET["date"]) && !empty($_GET["time"])) 
{
    
    echo $_GET["weight"];
    echo $_GET["date"];
    echo $_GET["time"];
    
    //echo ;
    
    
    
}
else { echo "Переменные не дошли. Проверьте все еще раз."; }

?>