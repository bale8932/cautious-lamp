<?php 
  // クラス読み込み
  require_once('Cache/Lite.php');

  // IDのセット
  $cache_id = '123456';
  // オプション
  $options = array(
      'cacheDir'                => '/tmp/',
      'caching'                 => 'true',  // キャッシュを有効に
      'automaticSerialization'  => 'true',  // 配列を保存可能に
      'lifeTime'                => 10,      // 10（生存時間：10秒）
      'automaticCleaningFactor' => 200,     // 自動で古いファイルを削除（1/200の確率で実行）
      'hashedDirectoryLevel'    => 1,       // ディレクトリ階層の深さ（高速になる）
  );

  // オブジェクトのnew
  $cache = new Cache_Lite($options); 
require_once('Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = 'templates/';
$smarty->compile_dir  = 'templates_c/';
  // キャッシュデータがあるかどうかの判別
  if ( $cache_data = $cache->get($cache_id) )
  {
    $smarty->assign('test1', 'キャッシュ使用<br>');
      $buff = $cache_data;
  }
  else
  {
      // キャッシュデータがない。APIからデータを読み込む処理
      // データ取得処理ここから
      // ……………………… $read_data にデータを入れておく
      $read_data = date('Y/m/d H:i:s');
      // データ取得処理ここまで
      
     $smarty->assign('test2', 'キャッシュ未使用<br>');
      $buff = $read_data;
      $cache->save($buff);
  }
 $smarty->display('test_4-3.html');
 print_r($buff);
?>
