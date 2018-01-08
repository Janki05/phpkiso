<?php
// ステップ１ DBに接続する
// 開発環境用
  $dsn = 'mysql:dbname=phpkiso;host=localhost';

// $user　DB接続用ユーザ名
// $password　DB接続用ユーザのPW
  $user = 'root';
  $password='';

// // 本番環境用
//   $dsn = 'mysql:dbname=LAA0918715-phpkiso;host=mysql103.phy.lolipop.lan';

// // $user　DB接続用ユーザ名
// // $password　DB接続用ユーザのPW
//   $user = 'LAA0918715';
//   $password='cebunexseed';
  
  // DB接続オブジェクト
  $dbh = new PDO($dsn, $user, $password);

// 今から実行するSQL文を文字コードutf8で送る設定（文字化け防止）
  $dbh->query('SET NAMES utf8');

?>