<?php
  define('DB_DATABASE','�f�[�^�x�[�X��');
  define('DB_USERNAME','���[�U�[��');
  define('DB_PASSWORD','�p�X���[�h');
  define('PDO_DSN','mysql:dbhost=localhost;;charset=utf8;dbname=' . DB_DATABASE);

  try{
    //DB�ڑ�
    $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo connected;
 } catch(PDOException $e){
    echo $e->getMessage();
    exit;
  }
 $sql = "CREATE TABLE IF NOT EXISTS`17goisgod`"
."("
. "`id` INT auto_increment primary key,"
. "`name` VARCHAR(255),"
. "`y` VARCHAR(4),"
. "`m` VARCHAR(4),"
. "`d` VARCHAR(4),"
. "`week` INT,"
. "`a1` INT(11),"
. "`a2` INT,"
. "`a3` INT,"
. "`a4` INT,"
. "`MEMO` TEXT,"
. "`i_date` DATETIME"
.");";

   try{
     $stmt = $db -> prepare($sql);
     $stmt -> execute();
    echo "<br>table created";
 } catch(PDOException $e){
    echo "<br>An error occuerd ".$e->getMessage();
 }
?>