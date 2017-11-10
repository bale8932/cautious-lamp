<?php 
$dbLink = mysql_connect("localhost","ユーザー名","パスワード");
	if (!$dbLink){
		echo "接続失敗";
	}
        // DB選択
	mysql_select_db("データベース名",$dbLink);
 $sql = ("SELECT fileData FROM items WHERE id = '" . $_GET['id']."'"); 
$fileData= mysql_query($sql, $dbLink) or die('QueryFault:' . mysql_error()); 
$row=mysql_fetch_row($fileData);

$content=sprintf('Content-Type:%s; codecs=\'avc1.640029,mp4a.40.2\'',$_GET['fileType']); 
header($content); 
echo $row[0]; 
?>