<?php
// require_once("connDB.php");

session_start();
if (isset($_SESSION["meaccount"])) {
  $meaccount = $_SESSION["meaccount"];
  // echo $_SESSION["maccount"];
  if (isset($_GET['withdrawal'])) {

    $dtrade = $_GET['moneyc'];
    $date = ('Y-m-d H:i:s');
    $link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());
    $result = mysqli_query($link, "set names utf8");
    $meaccount = $_SESSION["meaccount"];
    $sqlsele = "SELECT mbalance from member where meaccount = '$meaccount'";
    $result = mysqli_query($link, $sqlsele);
    $mbalance["mbalance"] = mysqli_fetch_assoc($result);
    $intmbalance = implode(",", $mbalance["mbalance"]);
    if (isset($_GET['moneyc'])) {
      $intmbalance = $intmbalance - $dtrade;
      // var_dump($intmbalance);
      echo "<script>alert('$intmbalance'); </script>";
      $link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());
      $result = mysqli_query($link, "set names utf8");
      $sqlsaving = "UPDATE member set mbalance = '$intmbalance' where meaccount = '$meaccount'";
      mysqli_query($link, $sqlsaving);

      $date = date('Y-m-d H:i:s');
      $maccount = $_SESSION["meaccount"];
      $sqlinto = "INSERT INTO detail (daccount, dtranstype, dtrade, dtransdate) values('$maccount','withdrawal','$dtrade','$date')";
      mysqli_query($link, $sqlinto);
    }
  }
} else {
  if (!isset($_SESSION["meaccount"])) {
    header("Location: login.php");
    exit();
  }
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
  <title>Lag - Member Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>

<body style="background:url('./img/bookindex.jpg')round">
  <h1 align="center">線上購書商城</h1>
  <form id="form1" name="form1" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2"">
    <div align=" center" bgcolor="#CCCCCC" style="background-color:SlateBlue;">
    <font color="#FFFFFF">我的購物車</font>
    </div>
    <div align="center" bgcolor="#CCCCCC"><a href="index.php">回首頁</a></div>
    <div>
      <div style="width:auto;height:600px;">
        <div style="width:50%;height:600px;text-align:center;margin:0 auto;"><br><br><br><br>
          <div>
            <label>
              <font color="#000000">選購商品總金額 :
            </label>
            <input type="text" name="moneyc" id="money" />
            <input type="submit" name="withdrawal" id="withdrawal" value="確定送出訂單" />
          </div>
        </div>
      </div>
      <div style="background-color:SlateBlue;">
      <font color="#FFFFFF"><?= "Welcome! " . $meaccount ?></font>
    </div>
    </div>
    
  </form>
</body>

</html>