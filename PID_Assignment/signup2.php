<?php
require_once("connDB.php");
session_start();

if (isset($_POST["btnHomema"])) {
    header("Location: index2.php");
    exit();
  }


if (isset($_POST["mabtn"])) {
    $maaccount = $_POST["maUserName"];
    $mapassword = $_POST["maPassword"];
    $sqlma = "INSERT INTO manager (maaccount, mapassword) values('$maaccount','$mapassword')";
    mysqli_query($link, $sqlma);
}
?>

<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- <style>
        body {
            background-color: lightblue;
        }
    </style> -->
</head>

<body style="background:url('./img/bookindex.jpg')round">
    <h1 align="center">線上購書商城</h1>
    <form id="form1" name="form1" method="post" action="signup2.php" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
        <div align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;">
            <font color="#FFFFFF">管理員系統 - 註冊</font>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">

            </div>
        </div>
        <div style="width:50%;height:600px;text-align:center;margin:0 auto;">
            <br>
            <br>
            <br>
            <br>
            <div>
                <label>
                    <font color="#000000">申請帳號 :
                </label>
                <input type="text" name="maUserName" id="txtUserName" pattern="\w{1,14}" required />
            </div>
            <br>
            <br>
            <div>
                <label>
                    <font color="#000000">申請密碼 :
                </label>
                <input type="password" name="maPassword" id="txtPassword" pattern="\w{1,14}" required />
            </div>
            <br>
            <br>
            <br>
            <div>
                <input type="submit" name="mabtn" id="mabtn" value="註冊" />
                <input type="reset" name="btnReset" id="btnReset" value="重設" />
                <input type="submit" name="btnHomema" id="btnHome" value="回首頁" />
            </div>
        </div>
        <div style="background-color:SlateBlue;">
            <font color="#FFFFFF">歡迎使用</font>
        </div>
        </div>
    </form>

</body>

</html>