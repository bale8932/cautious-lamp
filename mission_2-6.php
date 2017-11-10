<?php
if (isset($_GET['message']) && empty($_GET["hidden1"])) {
$name = $_GET['name'];
echo $name;
$comment = $_GET['comment'];
echo $comment;
$password = $_GET['password'];
echo $password;
$writepas = $password . "<>" . $num;
$boards = file('mission_2-2-6.txt',FILE_IGNORE_NEW_LINES);
$num =count($boards);
$dataFile = "mission_2-2-6.txt";   
$date = new DateTime();
$str = $num  . '<>' . $_GET['name'] . '<>' . $_GET['comment']
        . '<>' . $date ->format('Y-m-d-H-i-s') ."\n";
$fp = fopen('mission_2-2-6.txt','a');
fwrite($fp, $str);
fclose($fp);
if (!empty($password)) {
$fp2 = fopen ("mission_2-6.txt","a");
fputs ($fp2, $writepas."\n");
}
}
if (isset($_POST['delete'])) {

$delete = $_POST['deleteNO'];  
      echo $pasData[0];
 $delCon = file("mission_2-2-6.txt");
     $pasCon = file("mission_2-6.txt"); 
      $password2 = $_POST['password2'];
        for($j = 0; $j < count($delCon) ; $j++) {  
           $delData = explode("<>", $delCon[$j]);
       for($r = 0; $r < count($pasCon) ; $r++) {  
           $pasData = explode("<>", $pasCon[$r]); 
           if ($delData[0] == $delete && $pasData[0] == $password2){
               array_splice($delCon, $j, 1); 
               array_splice($pasCon, $r, 1);
               file_put_contents("mission_2-2-6.txt", $delCon);
               file_put_contents("mission_2-6.txt",$pasCon);  
           }  
       }  
}
}
if (isset($_POST['edit']))
    {   $number3=$_POST['name3'];
       $password3=$_POST['password3'];
        $file_edit = file("mission_2-2-6.txt");
        $pass_file = file("mission_2-6.txt");
        for($l = 0;$l <count($file_edit); ++$l){
            $editData = explode("<>",$file_edit[$l]);
        for($t = 0; $t < count($pass_file) ; $t++) {  
           $edipasData = explode("<>", $pass_file[$t]);
           if ($editData[0] == $number3 && $edipasData[0] == $password3) {
            $simEdit = explode("<>", $file_edit[$l]);
                for($h = 0; $h < count($ediData); $h++){
                    $simEdit[$h] = mb_substr(trim($ediData[$h]), 0, -0);
  echo $simEdit ;              }    }
        }
    }
}
if (isset($_GET['message']) && isset($_GET['hidden1'])) {
        $contents = file("mission_2-2-6.txt");
  $fp1 = fopen('mission_2-2-6.txt','w');
  $edit_num =  $_GET['hidden1'];
  foreach($contents as $content) {
    $parts = explode("<>", $content);
    if($parts[0] == $edit_num){
  $date = new DateTime();
 $str2=  $edit_num  . '<>' . $_GET['name'] . '<>' . $_GET['comment']
        . '<>' . $date ->format('Y-m-d-H-i-s') ."\n";
      fwrite($fp1, $str2);
    } else {
      fwrite($fp1, "$content");
    }
  }
  fclose($fp1);
}

?>
<!DOCTYPE html>
<html lang = "ja">
<h1>簡易掲示板</h1>
<form action = "mission_2-6.php" method = "get">
<input type="hidden" name="hidden1" value="<?php echo $simEdit[0] ;?>">
名前:<input type = "text"  name ="name" value = "<?php echo $simEdit[1] ;?>"/><br/>
コメント<INPUT TYPE = 'text' NAME = 'comment' SIZE = '30' value = "<?php echo $simEdit[2] ;?>" ><BR>
パスワード:<input type="text" name="password" size="30"/><br/>
<input type ="submit" name="message" value ="送信" />
</form>
<form action="mission_2-6.php" method="post"> 
     削除対象番号<input type="text" name="deleteNO"> 
投稿する際に設定したパスワードを入力してください<input type="text" name="password2"/><br/>
 <input type="submit" name="delete" value="削除"> 
</form>
 <form action="mission_2-6.php" method="post">
     編集対象番号<input type="text" name="name3" size="30" value="<?php echo($_POST['name3']);?> "/><br />
投稿する際に設定したパスワードを入力してください<input type="text" name="password3" value="<?php echo($_POST['password3']);?>"/><br/>
            <input type="submit" name="edit" value ="編集">
</form>
<?php
$contents = @file('mission_2-2-6.txt');
foreach($contents as $lines){
$liness = str_replace("<>","",$lines);
 echo $lines."<br />\n";
}
?>
</html>
