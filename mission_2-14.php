<?php
  define('DB_DATABASE','データベース名');
  define('DB_USERNAME','ユーザー名');
  define('DB_PASSWORD','パスワード');
  define('PDO_DSN','mysql:dbhost=localhost;dbname=' . DB_DATABASE);

  try{
    //DB接続
    $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo connected;
  } catch(PDOException $e){
    echo $e->getMessage();
    exit;
  }
try{
 $sql = "DELETE FROM missiontable WHERE id = :id";
 
// 削除するレコードのIDは空のまま、SQL実行の準備をする
$stmt = $db->prepare($sql);
 
// 削除するレコードのIDを配列に格納する
$params = array(':id'=>2);
 
// 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
$stmt->execute($params);
 
// 削除完了のメッセージ
echo '削除完了しました';
  }catch(PDOException $e){
    echo $e->getMessage();
    exit;
  }
 ?>