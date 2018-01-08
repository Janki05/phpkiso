<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootsnipp.css">
  <title></title>
</head>
<body>
 <form class="form-horizontal" >
 <div class="form-group">
  <div class = "row col-md-4 col-md-offset-4 registeration">
  <div class="panel panel-default">
  <div class="panel-heading">
  <h1>入力内容確認</h1>
  <?php if($_POST["nickname"] == ""){
    echo 'ニックネームを表示してください';
  }else{ ?>
    ようこそ<?php echo htmlspecialchars($_POST["nickname"]); ?>様<br>
 <?php  } ?>
  </div>

  <div class="panel-heading">
  <?php if($_POST["email"] == ""){
    echo 'メールアドレスを表示してください';
  }else{ ?>
    メールアドレスは<?php echo htmlspecialchars($_POST ["email"]); ?>になります<br>
 <?php  } ?>
<br>
</div>
</form>

  <div class="panel-heading">
  <?php if($_POST["content"] == ""){
    echo 'Messageを表示してください';
  }else{ ?>
    問い合わせ内容は<?php echo htmlspecialchars($_POST ["content"]); ?>になります<br>
 <?php  } ?>
<br>
</div>

  </form>

<!-- ようこそ、<?php echo $_POST["nickname"]; ?>様<br>
メールアドレス：<?php echo $_POST["email"]; ?><br>
お問い合わせ内容：<?php echo $_POST["content"]; ?><br> -->


<?php if (($_POST['nickname'] != "") && ($_POST['email'] != "") && ($_POST['content'] != "")){ ?>

  <form method="POST" action="thanks.php">
  <input type="hidden" name="nickname" value="<?php echo $_POST["nickname"]; ?>">
  <input type="hidden" name="email" value="<?php echo $_POST["email"]; ?>">
  <input type="hidden" name="content" value="<?php echo $_POST["content"]; ?>">
  <input type="button" class="btn btn-price btn-success btn-lg" value="戻る" onclick="history.back();">

  <input type="submit" class="btn btn-price btn-success btn-lg" value="OK">
</form>
 <?php  } ?>
<?php include('Copyright.php');?>
</body>
</html>