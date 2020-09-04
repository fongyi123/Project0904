<?php
require_once("connDB.php");

session_start();
if (isset($_SESSION["maccount"])) {
  $maccount = $_SESSION["maccount"];
  if (isset($_GET['balancechk'])) {

    $date = ('Y-m-d H:i:s');
    $link = @mysqli_connect("localhost", "root", "root", "bankmember", 8889) or die(mysqli_connect_error());
    $result = mysqli_query($link, "set names utf8");
    $maccount = $_SESSION["maccount"];
    $sql = "SELECT mbalance from member where maccount = '$maccount'";
    $result = mysqli_query($link, $sql);
    $mbalance["mbalance"] = mysqli_fetch_assoc($result);
    $intmbalance = implode(",", $mbalance["mbalance"]);
    // var_dump("$maccount");
    echo "<script>alert('尊貴的$maccount 大佬您好，您的餘額為：$intmbalance'); </script>";
  }

} else {
  if (!isset($_SESSION["maccount"])) {

    header("Location: login.php");
    exit();
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Lag - Member Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body style="background:url('./img5/bank.jpg')round">
  <h1 align="center">線上網銀系統</h1>
  <form id="form1" name="form1" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <div align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;">
      <font color="#FFFFFF">歡迎使用網路銀行餘額查詢</font>
    </div>
    <divalign="center" bgcolor="#CCCCCC"><a href="index.php">回首頁</a></div>
      <div style="width:auto;height:600px;">
        <div style="width:50%;height:600px;text-align:center;margin:0 auto;">
          <br>
          <br>
          <br>
          <br>
          <div>
            <label>
              <font color="#000000">餘額查詢 :
            </label>
            <input type="submit" name="balancechk" id="balancechk" value="開始查詢" />
          </div>
        </div>
      </div>
      <div style="background-color:SlateBlue;">
        <font color="#FFFFFF"><?= "Welcome! " . $maccount ?></font>
      </div>
  </form>
</body>

</html>