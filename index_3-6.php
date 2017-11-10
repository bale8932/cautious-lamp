<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <h1>本登録が完了しました</h1>
</head>
   <body>
 <!-- 入力エリア -->
    <div class="input_area">
        <form action="login_3-9.php" method="post" id="contact_form">
            <input type="submit" value="ログインフォームへ">
        </form>
    </div>
    <!-- //入力エリア -->
    <hr>
    <!-- 投稿表示エリア -->
    <div class="list">
    </div>
    <!-- // 投稿表示エリア-->
</body>
</html>
<?php
  define('DB_DATABASE','データベース名');
  define('DB_USERNAME','ユーザー名');
  define('DB_PASSWORD','パスワード');
  define('PDO_DSN','mysql:dbhost=localhost;;charset=utf8;dbname=' . DB_DATABASE);
 try{
    //DB接続
    $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`"
    )
   );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
  } catch(PDOException $e){
    echo $e->getMessage();
    exit;
  }
  $db->beginTransaction();
 try {
 
        $smt = $db -> query("SET NAMES utf8;");// データの保存
 $smt = $db -> prepare("INSERT INTO blur (name,pass,userid,i_date) VALUES ( :name, :pass, :userid, :i_date)");
        $myname = $_POST['name'];
        $mypass = $_POST['pass'];
        $myid = $_POST['userid'];
        $created_at = new DateTime();
        $smt -> bindParam(':userid', $myid, PDO::PARAM_STR);  
        $smt -> bindParam(':name', $myname, PDO::PARAM_STR);
        $smt -> bindParam(':pass', $mypass, PDO::PARAM_STR);
        $smt -> bindValue(':i_date',$created_at->format('Y-m-d H:i:s'), PDO::PARAM_STR);
        $smt -> execute();
 
    }catch(PDOExeption $e){
            echo "<br>An error occuerd ".$e->getMessage();
 }

 try {
 $sql = "SELECT * FROM blur";
$stmt = $db -> query("SET NAMES utf8;");
// SQLステートメントを実行し、結果を変数に格納
$stmt = $db->query($sql);
 
// foreach文で配列の中身を一行ずつ出力
foreach ($stmt as $row) {
 
  // データベースのフィールド名で出力
  echo $row['userid'].':'.$row['name'].'：'.$row['pass'].':'.$row['i_date'];
 
  // 改行を入れる
  echo '<br>';
} }catch(PDOExeption $e){
            echo "<br>se error occuerd ".$e->getMessage();
 }
?>