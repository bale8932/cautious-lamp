<!DOCTYPE html>
<html lang = "ja">
<h1>簡易掲示板</h1>
<form action = "mission_2-1.php" method = "get">
名前:<input type = "text"  name ="name"/><br/>
コメント<INPUT TYPE = 'text' NAME = 'comment' SIZE = '30' ><BR>
<input type ="submit" name="message" value ="送信" />
</form>
<?php
echo $_GET['name'];
echo $_GET['comment'];
?>
</html>