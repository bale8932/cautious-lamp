<?php
  define('DB_DATABASE','データーベース名');
  define('DB_USERNAME','ユーザー名);
  define('DB_PASSWORD','パスワード');
  define('PDO_DSN','mysql:dbhost=localhost;;charset=utf8;dbname=' . DB_DATABASE);

  try{
    //DB接続
    $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo connected;
 } catch(PDOException $e){
    echo $e->getMessage();
    exit;
  }
 $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA= 'データベース名' AND TABLE_NAME= 'image'";
$stmt = $db->query($sql);
if ( !$stmt ) {
echo $db->errorInfo();
exit();
}

while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
echo $row["COLUMN_NAME"] . "\n";
}

$db = null;

?>