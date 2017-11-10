<?php
if (isset($_GET['message'])) {
$name = $_GET['name'];
echo $name;
$comment = $_GET['comment'];
echo $comment;
$boards = file('mission_2-2-6.txt',FILE_IGNORE_NEW_LINES);
$num = count($boards);
$dataFile = "mission_2-2-6.txt";  
$date = new DateTime();
$str = $num  . '<>' . $_GET['name'] . '<>' . $_GET['comment']
        . '<>' . $date ->format('Y-m-d-H-i-s') . "\n";
$fp = fopen('mission_2-2-6.txt','a');
fwrite($fp, $str);
fclose($fp);
}

if (isset($_POST['delete'])) {

$delete = $_POST['deleteNO']; 
       $delCon = file("mission_2-2-6.txt");  
       for ($j = 0; $j < count($delCon) ; $j++) {  
           $delData = explode("<>", $delCon[$j]);
           print_r($delete);
           if ($delData[0] == $delete ) {  
               array_splice($delCon, $j, 1);  
               file_put_contents("mission_2-2-6.txt", $delCon);  
           }  
       }  
}
?>
<!DOCTYPE html>
<html lang = "ja">
<h1>簡易掲示板</h1>
<form action = "mission_2-4.php" method = "get">
名前:<input type = "text"  name ="name"/><br/>
コメント<INPUT TYPE = 'text' NAME = 'comment' SIZE = '30' value = "<?php echo $editData[2] ;?>" ><BR>
<input type ="submit" name="message" value ="送信" />
</form>
<form action="mission_2-4.php" method="post"> 
     削除対象番号<input type="text" name="deleteNO"> 
         <input type="submit" name="delete" value="削除"> 
     </form>
 </form>
<?php
$contents = @file('mission_2-2-6.txt');
foreach($contents as $lines){
$liness = str_replace("<>","",$lines);
 echo $liness."<br />\n";
}
?>
</html>
