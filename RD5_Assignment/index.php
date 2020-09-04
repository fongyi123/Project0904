<?php
require_once("connDB.php");

session_start();
if (isset($_SESSION["maccount"])) {
  $maccount = $_SESSION["maccount"];
} else {
  $maccount = "Guest";
}
if (isset($_GET["login"])) {
  header("Location: login.php");
  exit();
}
if (isset($_GET["signup"])) {
  header("Location: signup.php");
  exit();
}
if (isset($_GET["logout"])) {
  header("Location: login.php?logout=1");
  exit();
}

if (isset($_GET["savings"])) {
  header("Location: savings.php");
  exit();
}
if (isset($_GET["withdrawal"])) {
  header("Location: withdrawal.php");
  exit();
}
if (isset($_GET["balancechk"])) {
  header("Location: balancechk.php");
  exit();
}
if (isset($_GET["secret"])) {
  header("Location: secret.php");
  exit();
}


?>
<!DOCTYPE html >
<html>

<head>
  <style>
    body {
      background-color: lightblue;
    }
  </style>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Lab - index</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>

<body style="background:url('./img5/bank.jpg')round">
  <h1 align="center">線上網銀系統</h1>
  <form width="100%" height="200" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <div align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;">
      <font color="#FFFFFF">會員系統 - 首頁</font>
    </div>
    <div>服務項目</div>
    <div> 
      
      <div style="width:auto;height:600px;">
      <div>   
        <?php if ($maccount == "Guest") { ?>
          <input name="login" type="submit" class="btn btn-primary" color="white" value="登入"></input>
          <input name="signup" type="submit" class="btn btn-primary" color="white" value="註冊"></input>
        <?php } else { ?>
          <input name="logout" type="submit" class="btn btn-primary" value="登出"></input>
        <?php } ?>
        <input name="savings" type="submit" class="btn btn-primary" href="savings.php" value="存款"></input>
        <input name="withdrawal" type="submit" class="btn btn-primary" href="withdrawal.php" value="提款"></input>
        <input name="balancechk" type="submit" class="btn btn-primary" href="balancechk.php" value="餘額查詢"></input>
        <input name="secret" type="submit" class="btn btn-primary" href="secret.php" value="明細查詢"></input>
      </div>
      </div>
      <div style="background-color:SlateBlue;">
        <font color="#FFFFFF"><?= "Welcome! " . $maccount ?></font>
      </div>
    </div>
  </form>
</body>
</html>