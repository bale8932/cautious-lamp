<?php
  define('DB_DATABASE','データベース');
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
 $sql = "CREATE TABLE IF NOT EXISTS`member`"
."("
."id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,"
."account VARCHAR(50) NOT NULL,"
."mail VARCHAR(50) NOT NULL,"
."password VARCHAR(128) NOT NULL,"
."flag TINYINT(1) NOT NULL DEFAULT 1"
.")ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;";
 
 


   try{
     $stmt = $db -> prepare($sql);
     $stmt -> execute();
    echo "<br>table created";
 } catch(PDOException $e){
    echo "<br>An error occuerd ".$e->getMessage();
 }

$sqr = 'SHOW TABLES';
$stmp = $db-> prepare($sqr);
$stmp -> execute();
while ($result = $stmp->fetch(PDO::FETCH_NUM)){
    $table_names[] = $result[0];
echo $result[0];
 echo '<br>';
}
 
?>