<?php
if (isset($_GET['message'])) {
$boards = file('mission_2-2-6.txt',FILE_IGNORE_NEW_LINES);
$num =count($boards);  
$dataFile = "mission_2-2-6.txt";  
$date = new DateTime();
$str = $num  . '<>' . $_GET['name'] . '<>' . $_GET['comment']
        . '<>' . $date ->format('Y-m-d-H-i-s') . "\n";
$fp = fopen('mission_2-2-6.txt','a');
fwrite($fp, $str);
fclose($fp);
}
?>
<!DOCTYPE html>
<html lang = "ja">
<h1>簡易掲示板</h1>
<form action = "mission_2-2.php" method = "get">
名前:<input type = "text"  name ="name"/><br/>
コメント<INPUT TYPE = 'text' NAME = 'comment' SIZE = '30' ><BR>
<input type ="submit" name="message" value ="送信" />
</form>
</html>