<?php
$lines = file('mission_1-6.txt');
foreach ($lines as $line_num
=>$line) {
   echo "<b>
{$line_num}
</b> " . htmlspecialchars($line) . "<br />\n";
}
$html = implode('', file('mission_1-6.txt'));
$trimmed = file('mission_1-6.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
?>
