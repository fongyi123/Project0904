<?php
require_once("connDB.php");
session_start();
if (isset($_GET["logout"])) {

  $_SESSION["meaccount"] = $meaccount;
  unset($_SESSION["logout"]);

  header("Location: index.php");
  exit();
}
if (isset($_POST["btnHome"])) {
  header("Location: index.php");
  exit();
}

if (isset($_POST["btnOK"])) {
  $meaccount = $_POST["meUserName"];
  $mepassword = $_POST["mePassword"];
  $sqlmelg = "select meaccount, mepasswd, mestatus from member where meaccount='$meaccount' and mepasswd='$mepassword' and mestatus='normal'";

  $result = mysqli_query($link, $sqlmelg);
  $row = mysqli_fetch_assoc($result);
  var_dump($result);
  if ($meaccount != null  &&  $mepassword != null && $row['meaccount'] == $meaccount && $row['mepasswd'] == $mepassword) {

    if (trim($meaccount) != "") {

      $_SESSION["meaccount"] = $meaccount;

      if (isset($_SESSION["lastPage"]))
        header(sprintf("Location: %s", $_SESSION["lastPage"]));
      else
        header("Location: index.php");
      exit();
    }
  } else {
    echo "<script>alert('帳號密碼錯誤');parent.location.href='login.php' </script>";
  }
}
?>

<!DOCTYPE html>

<head>
  <style>
    body {
      background-color: lightblue;
    }
  </style>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Lab - Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

</head>

<body style="background:url('./img/bookindex.jpg')round">
  <h1 align="center">線上購書商城</h1>

  <form id="form1" name="form1" method="post" action="login.php" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <div align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;">
      <font color="#FFFFFF">會員系統 - 登入</font>
    </div>
    <div style="width:50%;height:624px;text-align:center;margin:0 auto;"><br><br><br><br>
      <div>
        <label>
          <font color="#000000">帳號 :
        </label>
        <input type="text" name="meUserName" id="meUserName" pattern="\w{1,14}" required />
      </div><br><br>
      <div>
        <label>
          <font color="#000000">密碼 :
        </label>
        <input type="password" name="mePassword" id="mePassword" pattern="\w{1,14}" required />
      </div><br><br><br>
      <div>
        <input type="submit" name="btnOK" id="btnOK" value="登入" />
        <input type="reset" name="btnReset" id="btnReset" value="重設" />
        <input type="submit" name="btnHome" id="btnHome" value="回首頁" />
      </div>
    </div>
    <div style="background-color:SlateBlue;">
      <font color="#FFFFFF">歡迎加入本線上購書商城</font>
    </div>

  </form>
</body>

</html>