<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <h1>登録フォーム</h1>
</head>
   <body>
 <!-- 入力エリア -->
    <div class="input_area">
        <form action="./index_3-6.php" method="post" id="contact_form">
            <dl class="name">
                <dt>名前</dt>
                <dd><input type="text" name="name" value=""></dd>
            </dl>
            <dl class="pass">
                <dt>パスワード</dt>
                <dd><input type="text" name="pass" value=""></dd>
            </dl>
            <input type="hidden" name="eventId" value="save">
            <input type="submit" value="送信">
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