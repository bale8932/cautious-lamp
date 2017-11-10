<?php
  // password_verfy()はphp 5.5.0以降の関数のため、バージョンが古くて使えない場合に使用
// セッション開始
session_start();
// データベース名
define('DB_DATABASE','co_682_it_3919_com');
  define('DB_USERNAME','co-682.it.3919.c');
  define('DB_PASSWORD','XRtuj8Vjv');
  define('PDO_DSN','mysql:dbhost=localhost;;charset=utf8;dbname=' . DB_DATABASE);
// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["id"])) {  // emptyは値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["pass"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

    if (!empty($_POST["id"]) && !empty($_POST["pass"])) {
        // 入力したユーザIDを格納
        $userid = $_POST["id"];

        // 2. ユーザIDとパスワードが入力されていたら認証する
        
        // 3. エラー処理
        try { 
         $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`"
        )
        );
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->prepare('SELECT * FROM jamiroquai WHERE id = ?');
            $stmt->execute(array($userid));

            $password = $_POST["pass"];

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($password == $row['pass'] && $userid == $row['id']) {

                    // 入力したIDのユーザー名を取得
                    $id = $row['id'];
                    $sql = "SELECT * FROM jamiroquai WHERE id = $id";  //入力したIDからユーザー名を取得
                    $stmt = $db->query($sql);
                    foreach ($stmt as $row) {
                        $row['name'];  // ユーザー名
                    }
                    $_SESSION["NAME"] = $row['name'];
                    $_SESSION["PASS"] = $row['pass'];
                    header("Location: Main.php");  // メイン画面へ遷移
                    exit();  // 処理終了
                } else {
                    // 認証失敗
                    $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
                }
            } else {
                // 4. 認証成功なら、セッションIDを新規に発行する
                // 該当データなし
                $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
            }
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            //$errorMessage = $sql;
            // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
            // echo $e->getMessage();
        }
    }
}
?>

<!doctype html>
<html>
    <head>
            <meta charset="UTF-8">
            <title>ログイン</title>
    </head>
    <body>
        <h1>ログイン画面</h1>
        <form id="loginForm" name="loginForm" action="" method="POST">
            <fieldset>
                <legend>ログインフォーム</legend>
                <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                <label for="userid">ユーザーID</label><input type="text" id="id" name="id" placeholder="ユーザーIDを入力" value="<?php if (!empty($_POST["id"])) {echo htmlspecialchars($_POST["id"], ENT_QUOTES);} ?>">
                <br>
                <label for="password">パスワード</label><input type="password" id="pass" name="pass" value="" placeholder="パスワードを入力">
                <br>
                <input type="submit" id="login" name="login" value="ログイン">
            </fieldset>
        </form>
        <br>
        <form action="torokuform_3-6.php">
            <fieldset>          
                <legend>新規登録フォーム</legend>
                <input type="submit" value="新規登録">
            </fieldset>
        </form>
    </body>
</html>

