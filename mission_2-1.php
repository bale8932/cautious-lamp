<!DOCTYPE html>
<html lang = "ja">
<h1>�ȈՌf����</h1>
<form action = "mission_2-1.php" method = "get">
���O:<input type = "text"  name ="name"/><br/>
�R�����g<INPUT TYPE = 'text' NAME = 'comment' SIZE = '30' ><BR>
<input type ="submit" name="message" value ="���M" />
</form>
<?php
echo $_GET['name'];
echo $_GET['comment'];
?>
</html>