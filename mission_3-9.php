<?php
session_start();

// ログイン状態チェック
if (!isset($_SESSION["NAME"])) {
    header("Location: Logout_3-9.php");
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
  $attname = $_FILES["attachment_file"]["name"];
 echo $attname;
if (isset($_POST['message']) && empty($_POST["hidden1"])) {
	if (!empty($_FILES['upfile']["tmp_name"])) {
        $upfile = $_FILES["upfile"]["tmp_name"];

// ファイル取得
	$imgdat = file_get_contents($upfile);
	$imgdat = mysql_real_escape_string($imgdat);
	// DB接続
	$dbLink = mysql_connect("localhost","ユーザー名","パスワード");
	if (!$dbLink){
		echo "接続失敗";
	}
        // DB選択
	mysql_select_db("データベース名",$dbLink);

	// データ追加
	$sql = "INSERT INTO items (fileData) VALUES ('$imgdat')";

	$result = mysql_query($sql, $dbLink);
       $sql = 'select last_insert_id() from items';
$result = mysql_query($sql, $dbLink);
$row = mysql_fetch_array($result);
      mysql_close($dbLink);
	}
 
        // DB選択

 if (!empty($_FILES['attachment_file']["tmp_name"])) {
        $upfile2 = $_FILES["attachment_file"]["tmp_name"];
        $imgdat2 = file_get_contents($upfile2);
	$imgdat2 = mysql_real_escape_string($imgdat2);
	$dbLink2 = mysql_connect("localhost","ユーザー名","パスワード");
	if (!$dbLink2){
		echo "接続失敗";	
          }
        // DB選択
	mysql_select_db("データベース名",$dbLink2);
	// データ追加
	$sql2 = "INSERT INTO image24 (fileData) VALUES ('$imgdat2')";
	$result2 = mysql_query($sql2, $dbLink2);
     $last_id = mysql_insert_id();
     mysql_close($dbLink2);
}

$name = $_POST['name'];
$comment = $_POST['comment'];
$password = htmlspecialchars($_SESSION["PASS"], ENT_QUOTES);
$writepas = $password . "<>" . $num;
$boards = file('mission_2-2-6.txt',FILE_IGNORE_NEW_LINES);
$num =count($boards);
$dataFile = "mission_2-2-6.txt";   
$date = new DateTime();
$str = $num+1  . '<>' . $_POST['name'] . '<>' . $_POST['comment']. '<>' . $date ->format('Y-m-d-H-i-s') 
        . '<>' . $_FILES['attachment_file']['name']. '<>' . $last_id . '<>' . $_FILES['upfile']['name']. '<>' . $row[0] ."\n";
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
               array_splice($delCon, $j, 1, $delData[0]."<br />\n"); 
               file_put_contents("mission_2-2-6.txt", $delCon);  
           }  
       }  
 }
  // データベースに接続するphpファイルを呼びだす
require_once('db.php');

try{
 $sqli = "DELETE FROM image24 WHERE id = :id";
 
// 削除するレコードのIDは空のまま、SQL実行の準備をする
$stm = $db->prepare($sqli);
 
// 削除するレコードのIDを配列に格納する
$params = array(':id'=>$delData[5]);
 
// 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
$stm->execute($params);

$sqls = "DELETE FROM items WHERE id = :id";
 
// 削除するレコードのIDは空のまま、SQL実行の準備をする
$stms = $db->prepare($sqls);
 
// 削除するレコードのIDを配列に格納する
$param = array(':id'=>$delData[7]);
 
// 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
$stms->execute($param); 
// 削除完了のメッセージ
echo '削除完了しました';
  }catch(PDOException $e){
    echo $e->getMessage();
    exit;
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
              }    }
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
 $str2=  $edit_num  . '<>' . $_POST['name'] . '<>' . $_POST['comment']
        . '<>' . $date ->format('Y-m-d-H-i-s'). '<>' . $_FILES['attachment_file']['name']. '<>' . $myid2 . '<>' . $_FILES['upfile']['name']. '<>' . $myid ."\n";
      fwrite($fp1, $str2);
    } else {
      fwrite($fp1, "$content");
    }
  }
  fclose($fp1);
}
if (isset($_POST["submit2"])){
	$id2 = $_POST["id2"];
	if ($id2==""){
		print("IDが入力されていません。<BR>\n");
	} else {
		print("<video src=\"videoGet.php?id=" . $id2 . "\"></video>");
	}
}
if (isset($_POST["submit"])){
	$id = $_POST["id"];
	if ($id==""){
		print("IDが入力されていません。<BR>\n");
	} else {
		print("<img src=\"img_get.php?id=" . $id . "\">");
	}
}
?>
<!DOCTYPE html>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<h1>地域ボランティア活動報告掲示板</h1> 
<FORM method="POST" enctype="multipart/form-data" action="mission_3-9.php">
<input type="hidden" name="hidden1" value="<?php echo $simEdit[0] ;?>">
名前:<input type = "text"  name ="name" value = "<?php echo htmlspecialchars($_SESSION["NAME"], ENT_QUOTES); ?>"/><br/>
コメント<INPUT TYPE = 'text' NAME = 'comment' SIZE = '30' value = "<?php echo $simEdit[2] ;?>" ><BR>
<P>画像アップロード</P>
	画像パス：<INPUT type="file" name="attachment_file" size="30" value = "<?php echo $simEdit[4] ;?>"><BR>
	<P>動画アップロード</P>
	動画パス：<INPUT type="file" name="upfile" size="30" value = "<?php echo $simEdit[6] ;?>"><BR>
<input type ="submit" name="message" value ="送信" />
</FORM>
<FORM method="POST" action="mission_3-9.php">
	<P>画像の表示</P>
見たい画像のファイル名の右に付いている番号：<INPUT type="text" name="id">
	<INPUT type="submit" name="submit" value="表示">
	<BR><BR>
</FORM>
<FORM method="POST" action="mission_3-9.php">
	<P>動画の表示</P>
見たい動画のファイル名の右に付いている番号：<INPUT type="text" name="id2">
	<INPUT type="submit" name="submit2" value="再生">
	<BR><BR>
</FORM>
<form action="mission_3-9.php" method="post"> 
     削除対象番号<input type="text" name="deleteNO"> 
ログインパスワードを入力してください<input type="text" name="password2"/><br/>
 <input type="submit" name="delete" value="削除"> 
</form>
 <form action="mission_3-9.php" method="post">
     編集対象番号<input type="text" name="name3" size="30" value="<?php echo($_POST['name3']);?> "/><br />
ログインパスワードを入力してください<input type="text" name="password3" value="<?php echo($_POST['password3']);?>"/><br/>
            <input type="submit" name="edit" value ="編集">
<?php
$contents = @file('mission_2-2-6.txt');
foreach($contents as $lines){
 echo $lines."<br />\n";
}
?>
</html>