<?php
  define('DB_DATABASE','�f�[�^�x�[�X��');
  define('DB_USERNAME','���[�U��');
  define('DB_PASSWORD','�p�X���[�h');
  define('PDO_DSN','mysql:dbhost=localhost;dbname=' . DB_DATABASE);

  try{
    //DB�ڑ�
    $dbh = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo connected;
  } catch(PDOException $e){
    echo $e->getMessage();
    exit;
  }
 
 ?>
