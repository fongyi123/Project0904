<?php
require_once("connDB.php");

session_start();
if (isset($_SESSION["meaccount"])) {
  $meaccount = $_SESSION["meaccount"];
} else {
  $meaccount = "Guest";
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

if (isset($_GET["meproduct"])) {
  header("Location: meproduct.php");
  exit();
}
if (isset($_GET["cart"])) {
  header("Location: cart.php");
  exit();
}

if (isset($_GET["orders"])) {
  header("Location: orders.php");
  exit();
}

?>
<!DOCTYPE html>
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

<body style="background:url('./img/bookindex.jpg')round">
  <h1 align="center">線上購書商城</h1>
  <form width="100%" height="200" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <div align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;">
      <font color="#FFFFFF">會員系統 - 首頁</font>
    </div>
    <div align="center" bgcolor="#CCCCCC">功能選單</6></div>
    <div class="form-group row">
      <div class="offset-2 col-8">
        <?php if ($meaccount == "Guest") { ?>
          <input name="login" type="submit" class="btn btn-primary" color="white" value="登入"></input>
          <input name="signup" type="submit" class="btn btn-primary" color="white" value="註冊"></input>
        <?php } else { ?>
          <input name="logout" type="submit" class="btn btn-primary" value="登出"></input>
        <?php } ?>
        <input name="meproduct" type="submit" class="btn btn-primary" href="meproduct.php" value="商品選購"></input>
        <input name="cart" type="submit" class="btn btn-primary" href="cart.php" value="我的購物車"></input>
        <input name="orders" type="submit" class="btn btn-primary" href="orders.php" value="訂單查詢"></input>
      </div>
      <div style="width:auto;height:584px; background-color:lightblue;">


      </div>
      
    </div>
    <div style="background-color:SlateBlue;">
        <font color="#FFFFFF"><?= "Welcome! " . $meaccount ?></font>
      </div>
  </form>
</body>

</html>