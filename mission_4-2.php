<?php
function ua_smt (){
$ua = $_SERVER['HTTP_USER_AGENT'];
$ua_list = array('iPhone','iPad','iPod','Android');
foreach ($ua_list as $ua_smt) {
if (strpos($ua,$ua_smt) !== false){return true;}
} return false;
}
require_once('Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';
if (ua_smt() == true) {
$smarty->assign('test1', 'スマートフォンで閲覧中です。');
 } else {$smarty->assign('test2', 'PCで閲覧中です。');
 }
$smarty->display('test_4-2.html');


?>
