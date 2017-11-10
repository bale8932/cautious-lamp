<html>
<head>
<form action="mission_1-5.php" method="get">
 <input type="text" name="message">
 <imput type="submit" value="S">
</form>
</head>
<body>
<?php
$message=$_GET['message'];
if ($message){
$fp = fopen('mission_1-5.txt','w');
fputs($fp,$message);
fclose($fp);
}
?>
</body>
</html>