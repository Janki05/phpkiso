  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootsnipp.css">

<?php
// データベースとのやりとりの処理を記載

// ステップ１ DBに接続する
  // $dsn = 'mysql:dbname=phpkiso;host=localhost';
  require('dbconnect.php');

  // DB接続オブジェクト
  $dbh = new PDO($dsn, $user, $password);

// 今から実行するSQL文を文字コードutf8で送る設定（文字化け防止）
  $dbh->query('SET NAMES utf8');

// ステップ２ SQL実行
  $sql = 'SELECT * FROM `survey`;';


// SQL文を実行する準備
// ->アロー演算子
$stmt = $dbh->prepare($sql);
// SQL文を実行
$stmt->execute();

// ステップ３　DB切断（オブジェクトを空っぽにしている）
// $dbh = null;

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>お問い合わせ一覧</title>
</head>
<body>
  <h1>お問い合わせ一覧</h1>
  <table class="table table-hover" id="task-table">
            <thead>
              <tr>
                <th>#</th>
                <th>NickName</th>
                <th>Email</th>
                <th>Contents</th>
                <th></th>
              </tr>
            </thead>

<?php

// 条件指定ができる繰り返し文
// while (1) 無限ループ

while (1) {
  # code...

// 一行取得
  $record = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($record == false){
      // 処理を中断する
      break;
    }

// 連想配列のキーがカラム名と同じものになっている！！！
    ?>
<!--   <table class="table table-hover" id="task-table"> -->

                <tr>
                <td>  <?php echo $record["code"]; ?><br>
                <td>  <?php echo $record["nickname"]; ?><br>
                <td>  <?php echo $record["email"]; ?><br></td>
                <td>  <?php echo $record["content"]; ?><br></td>
                <td>
                <a href="edit.php?code=<?php echo $record["code"]; ?>"> 
                <input type="button" class="btn btn-price btn-success btn-lg" value="編集">
                </a> 
                
                <a href="delete.php?code=<?php echo $record["code"]; ?>" onclick="return confirm('<?php echo $record["code"]; ?>を削除します、よろしいでしょうか？');">
                <input type="button" class="btn btn-price btn-success btn-lg" value="削除">
                </a>
                </td>


<!--             </tbody>
            </table>
 --><?php

// homework table or listタグで装飾をする

}


// ステップ３　DB切断（オブジェクトを空っぽにしている）
$dbh = null;
?>
</table>


<!-- 1<br>
のび太<br>
nobita@gmail.com<br>
ぼくのびた<br>
<hr>

2<br>
ドラえもん<br>
dora@gmail.com<br>
こんにちは<br>
<hr> -->


</body>
</html>