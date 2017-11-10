<?php
  define('DB_DATABASE','データベース名');
  define('DB_USERNAME','ユーザー名');
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
 $myname = "Tomura";
      $myage = "27";
 try {
$stmt = $db -> prepare("INSERT INTO missiontable (id,name,age,i_date) VALUES ('', :name, :age, :i_date)");
$created_at = new DateTime();
$stmt -> bindParam(':name', $myname, PDO::PARAM_STR);
$stmt -> bindValue(':age', $myage, PDO::PARAM_STR);
$stmt -> bindValue(':i_date', $created_at->format('Y-m-d H:i:s'), PDO::PARAM_STR);
      $myname = "Tamura";
      $myage = "41";
$stmt -> execute();
   }catch(PDOException $e){
    echo "<br>An error occuerd ".$e->getMessage();
 }
try {
$mgmt = $db -> prepare("SELECT * FROM jamiroquai WHERE id=:id");
$mgmt -> bindValue(':id', 1, PDO::PARAM_INT);
$mgmt -> execute();
 
if ($rows = $mgmt -> fetch()) {
    $name = $rows["name"];
    $age = $rows["pass"];
 echo $name;
 echo $age;
}
   }catch(PDOException $e){
    echo "<br>An error occuerd ".$e->getMessage();
 }
?>
