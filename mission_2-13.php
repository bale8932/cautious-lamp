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
 $myname = "TAKAYOSHI";
      $myage = "24";
 try {
$stmt = $db -> prepare("INSERT INTO missiontable (id,name,age,i_date) VALUES ('', :name, :age, :i_date)");
$created_at = new DateTime();
$stmt -> bindParam(':name', $myname, PDO::PARAM_STR);
$stmt -> bindValue(':age', $myage, PDO::PARAM_STR);
$stmt -> bindValue(':i_date', $created_at->format('Y-m-d H:i:s'), PDO::PARAM_STR);
      $myname = "Suzuki";
      $myage = "18";
$stmt -> execute();
   }catch(PDOException $e){
    echo "<br>An error occuerd ".$e->getMessage();
 }
$query =" UPDATE missiontable SET name= :name,age= :age,i_date= :i_date WHERE id = :id ";
 try {
$stmt2 = $db -> prepare($query);
$Days = new DateTime();
$myid = "1";
$stmt2 -> bindParam(':name', $myname, PDO::PARAM_STR);
$stmt2 -> bindParam(':age', $myage, PDO::PARAM_STR);
$stmt2 -> bindValue(':i_date', $Days->format('Y-m-d H:i:s'), PDO::PARAM_STR);
$stmt2 -> bindValue(':id', $myid, PDO::PARAM_INT);
$myname = "Oguri";
$myage = "24";

$stmt2 -> execute();
 }catch(PDOException $e){
  echo "<br>Second error occuerd ".$e->getMessage();
 }
?>
