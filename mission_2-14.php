<?php
  define('DB_DATABASE','�f�[�^�x�[�X��');
  define('DB_USERNAME','���[�U�[��');
  define('DB_PASSWORD','�p�X���[�h');
  define('PDO_DSN','mysql:dbhost=localhost;dbname=' . DB_DATABASE);

  try{
    //DB�ڑ�
    $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo connected;
  } catch(PDOException $e){
    echo $e->getMessage();
    exit;
  }
try{
 $sql = "DELETE FROM missiontable WHERE id = :id";
 
// �폜���郌�R�[�h��ID�͋�̂܂܁ASQL���s�̏���������
$stmt = $db->prepare($sql);
 
// �폜���郌�R�[�h��ID��z��Ɋi�[����
$params = array(':id'=>2);
 
// �폜���郌�R�[�h��ID���������ϐ���execute�ɃZ�b�g����SQL�����s
$stmt->execute($params);
 
// �폜�����̃��b�Z�[�W
echo '�폜�������܂���';
  }catch(PDOException $e){
    echo $e->getMessage();
    exit;
  }
 ?>