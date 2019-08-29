<?php 
require_once 'env.php';
$headers = 'From: ' . "\r\n" .    
				'Reply-To: ' . "\r\n" .    
				'X-Mailer: PHP/' . phpversion();
$body_mail = '';
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link)); 
$query ="SELECT * FROM datainblack";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
    $body_mail = "Номер терминала  Полученный вес  Дата и время \n";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        
        for ($j = 1 ; $j < 4 ; ++$j) $body_mail = $body_mail.$row[$j]."\t";
        $body_mail = $body_mail."\n";
        
    }
}
mail("@gmail.com", "My Subject", $body_mail, $headers); 
?>
