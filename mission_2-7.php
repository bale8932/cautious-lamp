<?php
  define('DB_DATABASE','データベース名');
  define('DB_USERNAME','ユーザ名');
  define('DB_PASSWORD','パスワード');
  define('PDO_DSN','mysql:dbhost=localhost;dbname=' . DB_DATABASE);

  try{
    //DB接続
    $dbh = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo connected;
  } catch(PDOException $e){
    echo $e->getMessage();
    exit;
  }
 
 ?>
