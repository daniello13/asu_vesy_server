<? php>
//запрос вида moneto4ka.tk/getting_total.php?total=2345.12

require_once 'env.php';
if (!empty($_GET["total"])) 
{
   
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));
    $weight = mysqli_real_escape_string($link, $_GET["total"]);
    date_default_timezone_set('Europe/Kiev');
    $date = date('Y-m-d H:i:s', time());
    //$date = date('Y-m-d H:i:sa');
   
    $query ="INSERT INTO `6mi_total_in_day` VALUES(NULL,'$weight')";
    //echo $query;
    //echo "<br>";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    mysqli_close($link);
   
    
    
    
}
else { echo "Переменные не дошли. Проверьте все еще раз."; }

?>