  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootsnipp.css">

<?php
// var_dump 変数の中身を表示する
// Undefined index: codeが表示されている場合
// POST送信されていない

// エラーが表示されないときはPOST送信されている
  // var_dump($_POST["code"]);

// データベースとのやりとりの処理を記載

// // ステップ１ DBに接続する
require('dbconnect.php');


// ステップ２ SQL実行
  // SQLインジェクションを防ぐ！
  // プリペアドステートメントを使う

// 変数が存在しているかcheck
  if ((isset($_POST['code'])) && ($_POST['code'] != '')){
// POST送信されているとき(?は置き換えたい値がある場所に記述)
    $sql ='SELECT * FROM `survey`WHERE `code`=?;';

    // 置き換えたいデータを配列の形で保存しておく
    // $data[]と書くと配列の末尾に追加される
    // $data = $_POST['code']; -> $dataの中に1とか2とか記述された文字が格納される
    // $data = $_POST['code']; -> $data[0]の中に記述された文字が格納される
    $data[] = $_POST['code'];

        // SQL文を実行する準備
    // ->アロー演算子
    $stmt = $dbh->prepare($sql);
    // SQL文を実行
    $stmt->execute($data);

  }else{
// POST送信されていない
// 空文字が送られてきている
    $sql ='SELECT * FROM `survey`;';
    // SQL文を実行する準備
    // ->アロー演算子
    $stmt = $dbh->prepare($sql);
    // SQL文を実行
    $stmt->execute();
  }



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

  <form action="" method="POST">
  <p>検索したいcodeを入力してください。</p>  
  <input type="text" name="code">
  <input type="submit" value="検索">
  </form>

  <table class="table table-hover" id="task-table">
            <thead>
              <tr>
                <th>NickName</th>
                <th>Email</th>
                <th>Contents</th>
              </tr>
              <hr>
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
                <td>  <?php echo $record["nickname"]; ?><br></td>              
                <td>  <?php echo $record["email"]; ?><br></td>
                <td>  <?php echo $record["content"]; ?><br></td> 

            </tr>
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