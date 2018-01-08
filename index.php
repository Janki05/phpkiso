<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootsnipp.css">
  <title>お問い合わせ</title>
</head>
<body>
  <form method="POST" action="check.php">
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
                <h1 class="h1">お問い合わせ情報入力 <small>contact us</small></h1>
            </div>
        <strong>ニックネーム</strong><br>
<!--         <input type="text" name="nickname" style="width:100px"></div> -->
                       <div class="form-group">
                        <div class="input-group form-adjust">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                        </span>
                            <input type="text" name="nickname" style="width:500px" class="form-control" id="name" placeholder="Enter Your Nick Name" /></div>
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
                               <input type="text" name="email" style="width: 500px" class="form-control" id="email" placeholder="Enter your email"/></div>
                        </div>
                        <div class="form-group">
    </div>
    <div>
        <strong>お問い合わせ内容</strong><br>
<!--         <textarea name="content" cols="40" rows="5"></textarea> -->
                              <div class="form-group">
                              <textarea name="content" cols="40" rows="20" id="message" class="form-control" placeholder="Message" style="width: 540px"></textarea>
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