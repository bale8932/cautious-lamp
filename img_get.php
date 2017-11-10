<?php
// DB接続
$dbLink = mysql_connect("localhost","ユーザー名","パスワード");
	if (!$dbLink){
		echo "接続失敗";
	}
        // DB選択
	mysql_select_db("データベース名",$dbLink);

// 画像データ取得
$sql = ("SELECT IMG FROM image24 WHERE ID = '" . $_GET['id']."'");
$result = mysql_query($sql, $dbLink);
$row = mysql_fetch_row($result);

// 画像ヘッダとしてjpegを指定（取得データがjpegの場合）
header("Content-Type: image/jpeg");

// バイナリデータを直接表示
echo $row[0];
?>