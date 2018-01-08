<?php

// Step1
// DB connection
  // $dsn = 'mysql:dbname=phpkiso;host=localhost';
require('dbconnect.php');

  // A部分---------------------------------------------------------
  // var_dump($_POST["code"]);
  if (isset($_POST['code'])){
    // ボタンが押されたらUPDATE文を実行
    $sql = 'UPDATE `survey` SET `nickname`="'.$_POST["nickname"].'",`email`="'.$_POST["email"].'",`content`="'.$_POST['content'].'" WHERE `code` = '.$_POST['code'];
// var_dump($sql);
    $stmt = $dbh->prepare($sql);

    // SQL文を実行
    $stmt->execute();

    // 一覧へ戻る
    header('Location: view.php');

  }


  // A部分 終了 ----------------------------------------------------


  // B部分 開始 ----------------------------------------------------
// step2
// SQL execute
$sql = 'SELECT * FROM `survey` WHERE `code` = '.$_GET['code'];

// SQL文を実行する準備
// ->アロー演算子
$stmt = $dbh->prepare($sql);
// SQL文を実行
$stmt->execute();

// ヒント：ここにfetchしたdataを保存しておく代入文を記述。
$record = $stmt->fetch(PDO::FETCH_ASSOC);

// step3
// 接続の解除
$dbh = null;


?>



<!-- C部分 -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootsnipp.css">
  <title>お問い合わせ情報編集</title>
</head>
<body>
  <form method="POST" action="">
    <div>

      <style type="text/css">
    .form-adjust{
      font-size: 14px;
      line-height: 1;
    }
  </style>

    <div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">お問い合わせ情報編集 <small>contact us</small></h1>
            </div>

      <div>
      コード<br> 
      <?php echo $_GET['code']; ?>   
        <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>"><!-- 追加 -->
      </div>

        <strong>ニックネーム</strong><br>
<!--         <input type="text" name="nickname" style="width:100px"></div> -->
                       <div class="form-group">
                        <div class="input-group form-adjust">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                        </span>
                            <input type="text" name="nickname" style="width:500px" value="<?php echo $record['nickname'] ?>" class="form-control" id="name" placeholder="Enter Your Nick Name" /></div>
                        </div>
                        <div class="form-group">
    </div>
    <div>
        <strong>メールアドレス</strong><br>
<!--         <input type="text" name="email" style="width: 200px">
 -->                     <div class="form-group">
                         <div class="input-group form-adjust" >
                               <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                               </span>
                               <input type="text" name="email" style="width: 500px" value="<?php echo $record['email'] ?>" class="form-control" id="email" placeholder="Enter your email"/></div>
                        </div>
                        <div class="form-group">
    </div>
    <div>
        <strong>お問い合わせ内容</strong><br>
<!--         <textarea name="content" cols="40" rows="5"></textarea> -->
                              <div class="form-group">
                              <textarea name="content" cols="40" rows="20" ><?php echo $record['content'] ?></textarea>
                              </div>
                        </div>
                        <div class="form-group">
                        </div>
         
    </div>
    <input type="submit" value="送信">
  </form>

 <!--  <p>Copyright ALL Right Reserved
    著作権は私が持っています。©
  </p> -->
<?php include('Copyright.php');?>
</body>
</html>