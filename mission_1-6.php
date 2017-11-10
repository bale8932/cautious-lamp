<html>
<head>
<form action="mission_1-6.php" method="get">
 <input type="text" name="message">
 <imput type="submit" value="S"/>
</form>
</head>
<body>
<?php
$message=$_GET['message'];
if ($message){
$fp = fopen('mission_1-6.txt','a');
fputs($fp,$message."\n");
fclose($fp);
}
?>
</body>
</html>