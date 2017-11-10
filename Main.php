<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: Logout.php");
    exit;
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>メイン</title>
    </head>
    <body>
        <h1>メイン画面</h1>
        <!-- ユーザーIDにHTMLタグが含まれても良いようにエスケープする -->
        <p>ようこそ<u><?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?></u>さん</p>  <!-- ユーザー名をechoで表示 -->
        <ul>
            <li><a href="Logout.php">ログアウト</a></li>
        </ul>
    </body>
</html>
<?php
if (isset($_POST['message']) && empty($_POST["hidden1"])) {
$name = $_POST['name'];
echo $name;
$comment = $_POST['comment'];
echo $comment;
$password = htmlspecialchars($_SESSION["PASS"], ENT_QUOTES);
echo $password;
$writepas = $password . "<>" . $num;
$boards = file('mission_2-2-6.txt',FILE_IGNORE_NEW_LINES);
$num =count($boards);
$dataFile = "mission_2-2-6.txt";   
$date = new DateTime();
$str = $num  . '<>' . $_POST['name'] . '<>' . $_POST['comment']
        . '<>' . $date ->format('Y-m-d-H-i-s') ."\n";
$fp = fopen('mission_2-2-6.txt','a');
fwrite($fp, $str);
fclose($fp);
$fp2 = fopen ("mission_2-6.txt","a");
fputs ($fp2, $writepas."\n");

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
if (isset($_POST['message']) && isset($_POST['hidden1'])) {
        $contents = file("mission_2-2-6.txt");
  $fp1 = fopen('mission_2-2-6.txt','w');
  $edit_num =  $_POST['hidden1'];
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
<h1>地域ボランティア活動報告掲示板</h1>
<form action = "Main.php" method = "post">
<input type="hidden" name="hidden1" value="<?php echo $simEdit[0] ;?>">
名前:<input type = "text"  name ="name" value = "<?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?>"/><br/>
コメント<INPUT TYPE = 'text' NAME = 'comment' SIZE = '30' value = "<?php echo $simEdit[2] ;?>" ><BR>
<input type ="submit" name="message" value ="送信" />
</form>
<form action="Main.php" method="post"> 
     削除対象番号<input type="text" name="deleteNO"> 
ログインパスワードを入力してください<input type="text" name="password2"/><br/>
 <input type="submit" name="delete" value="削除"> 
</form>
 <form action="Main.php" method="post">
     編集対象番号<input type="text" name="name3" size="30" value="<?php echo($_POST['name3']);?> "/><br />
ログインパスワードを入力してください<input type="text" name="password3" value="<?php echo($_POST['password3']);?>"/><br/>
            <input type="submit" name="edit" value ="編集">
</form>
 <form action="torokuform_3-6.php" method="post">
 <input type="submit" name="toroku" value ="登録フォームへ">
<?php
$contents = @file('mission_2-2-6.txt');
foreach($contents as $lines){
$liness = str_replace("<>","",$lines);
 echo $lines."<br />\n";
}
?>
</html>