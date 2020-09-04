<?php
require_once("connDB.php");
session_start();

if (isset($_POST["btnHomeme"])) {
    header("Location: index.php");
    exit();
}


if (isset($_POST["sibtnme"])) {
    $meaccount = $_POST["meaccount"];
    $mepassword = $_POST["mepassword"];
    $mename = $_POST["mename"];
    $mebirthday = $_POST["mebirthday"];
    $memail = $_POST["memail"];
    $mephone = $_POST["mephone"];
    $meaddress = $_POST["meaddress"];

    $sqlme = "INSERT INTO member (meaccount, mepasswd,mename,mebirthday,memail,mephone,meaddress) values('$meaccount','$mepassword','$mename','$mebirthday','$memail','$mephone','$meaddress')";
    mysqli_query($link, $sqlme);
}
?>

<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <style>
        body {
            background-image: "./img/bookindex.jpg";
        }
    </style>
</head>

<body style="background:url('./img/bookindex.jpg')round">
    <h1 align="center">線上購書商城</h1>
    <form id="form1" name="form1" method="post" action="signup.php" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2" >
        <div align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;">
            <font color="#FFFFFF">會員系統 - 註冊</font>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">

            </div>
        </div>
        <div style="width:100%;height:600px;text-align:center;margin:0 auto;">
            <br>
            <br>
            <div>
                <label>
                    <font color="#000000">申請帳號 :
                </label>
                <input type="text" name="meaccount" id="txtUserName" pattern="\w{1,14}" required />
            </div>
            <br>
            <div>
                <label>
                    <font color="#000000">申請密碼 :
                </label>
                <input type="password" name="mepassword" id="txtPassword" pattern="\w{1,14}" required />
            </div>
            <br>
            <div>
                <label>
                    <font color="#000000">填寫姓名 :
                </label>
                <input type="text" name="mename" id="txtUserName"  />
            </div>
            <br>
            <div>
                <label>
                    <font color="#000000">出生日期 :
                </label>
                <input type="text" name="mebirthday" id="txtUserName"  />
            </div>
            <br>
            <div>
                <label>
                    <font color="#000000">電子信箱 :
                </label>
                <input type="text" name="memail" id="txtUserName"  />
            </div>
            <br>
            <div>
                <label>
                    <font color="#000000">聯絡電話 :
                </label>
                <input type="text" name="mephone" id="txtUserName"  />
            </div>
            <br>
            <div>
                <label>
                    <font color="#000000">聯絡地址 :
                </label>
                <input type="text" name="meaddress" id="txtUserName"  />
            </div>
            <br>
            <div>
                <input type="submit" name="sibtnme" id="sibtnme" value="註冊" />
                <input type="reset" name="btnReset" id="btnReset" value="重設" />
                <input type="submit" name="btnHomeme" id="btnHome" value="回首頁" />
            </div>
        </div>
        <div style="background-color:SlateBlue;">
            <font color="#FFFFFF">歡迎使用</font>
        </div>
        </div>
    </form>

</body>

</html>