<?php
  define('DB_DATABASE','データベース名');
  define('DB_USERNAME','ユーザ名');
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
 $myname = "TAKAYOSHI";
      $myage = "35";
 try {
$stmt = $db -> prepare("INSERT INTO missiontable (id,name,age,i_date) VALUES ('', :name, :age, :i_date)");
$created_at = new DateTime();
$stmt -> bindParam(':name', $myname, PDO::PARAM_STR);
$stmt -> bindValue(':age', $myage, PDO::PARAM_STR);
$stmt -> bindValue(':i_date', $created_at->format('Y-m-d H:i:s'), PDO::PARAM_STR);
      $myname = "Yamamoto";
      $myage = "18";
$stmt -> execute();
   }catch(PDOException $e){
    echo "<br>An error occuerd ".$e->getMessage();
 }
?>
