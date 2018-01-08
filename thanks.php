<?php
// 扱いやすいように変数に代入
  $nickname = htmlspecialchars($_POST["nickname"]);
  $email = htmlspecialchars($_POST["email"]);
  $content = htmlspecialchars($_POST ["content"]);


// データベースとのやりとりの処理を記載

// ステップ１ DBに接続する
// データベース接続文字列
// mysql:接続するDBの種類
// dbname DB名
// host パソコンのアドレス　localhostこのプログラムが存在している場所と同じサーバ
// 空欄を入れないように記述する
//   $dsn = 'mysql:dbname=phpkiso;host=localhost';

// // $user　DB接続用ユーザ名
// // $password　DB接続用ユーザのPW
//   $user = 'root';
//   $password='';
  
//   // DB接続オブジェクト
//   $dbh = new PDO($dsn, $user, $password);

// // 今から実行するSQL文を文字コードutf8で送る設定（文字化け防止）
//   $dbh->query('SET NAMES utf8');
require('dbconnect.php');

// ステップ２ SQL実行
  $sql = 'INSERT INTO `survey` (`nickname`,`email`,`content`) VALUES ("'.$nickname.'","'.$email.'","'.$content.'");';


// SQL文を実行する準備
// ->アロー演算子
$stmt = $dbh->prepare($sql);
// SQL文を実行
$stmt->execute();

// ステップ３　DB切断（オブジェクトを空っぽにしている）
$dbh = null;


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootsnipp.css">
  <title>送信完了</title>
</head>
<body>
  <form class="form-horizontal" >
 <div class="form-group">
  <div class = "row col-md-4 col-md-offset-4 registeration">
  <div class="panel panel-default">
  <div class="panel-heading">
  <h1>お問い合わせありがとうございました！</h1>
  </div>
  <form class="form-horizontal" >
  <div class="form-group">
  <div class="panel-heading">
  <h3>お問い合わせ内容</h3>
  <form class="form-horizontal" >
  <div class="form-group">
  <div class="panel-heading">
  ニックネーム：<?php echo htmlspecialchars($_POST["nickname"]); ?><br>
  <form class="form-horizontal" >
 <div class="form-group">
  <div class="panel-heading">
  メールアドレス：<?php echo htmlspecialchars($_POST["email"]); ?><br>
  <form class="form-horizontal" >
  <div class="form-group">
  <div class="panel-heading">
  お問い合わせ内容：<?php echo htmlspecialchars($_POST ["content"]); ?><br>

<?php include('Copyright.php');?>
</body>
</html>