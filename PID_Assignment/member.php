<?php
require_once("connDB.php");

session_start();
if (isset($_SESSION["maaccount"])) {
  $maaccount = $_SESSION["maaccount"];
} else {
  if (!isset($_SESSION["maaccount"])) {
    header("Location: login2.php");
    exit();
  }
}
if (isset($_GET["Disablex"])) {
  $Disablex = $_GET["Disablex"];

  $sqlDisablex = "UPDATE `member` SET `mestatus` = 'Disable' WHERE `member`.`meid` = '$Disablex'; ";
  mysqli_query($link, $sqlDisablex);
}
if (isset($_GET["normalo"])) {
  $normalo = $_GET["normalo"];

  $sqlnormalo = "UPDATE `member` SET `mestatus` = 'normal' WHERE `member`.`meid` = '$normalo'; ";
  mysqli_query($link, $sqlnormalo);
}
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-color: lightblue;
    }
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th,td {
      text-align: left;
      padding: 8px;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2
    }
    th {
      background-color: #4CAF50;
      color: white;
    }
  </style>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Lag - Member Page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body style="background:url('./img/bookindex.jpg')round">
  <h1 align="center">線上購書商城</h1>
  <form id="form1" name="form1" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <div align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;">
      <font color="#FFFFFF">會員管理</font>
    </div>
    <div align="center" bgcolor="#CCCCCC"><a href="index2.php">回首頁</a></div>
      <div style="width:auto;height:600px;">
        <div style="width:auto;height:600px;text-align:center;margin:0 auto;">
          <label>
            <font color="#000000">會員列表 :
          </label>
          <?php
          $link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());
          $result = mysqli_query($link, "set names utf8");
          $maaccount = $_SESSION["maaccount"];
          $sqlsecret = "SELECT * from member";
          $result = mysqli_query($link, $sqlsecret);
          $total_records = mysqli_num_rows($result);  // 取得記錄數
          echo ($total_records);
          ?>
          <table border="1" cellspacing=0 cellspadding=0>
            <tr>
              <td>會員編號</td>
              <td>會員名稱</td>
              <td>會員帳號</td>
              <td>會員密碼</td>
              <td>會員生日</td>
              <td>會員權限</td>
              <td>會員信箱</td>
              <td>會員電話</td>
              <td>會員地址</td>
              <td>編輯功能</td>
            </tr>
            <?php
            for ($i = 0; $i < $total_records; $i++) {
              $row = mysqli_fetch_assoc($result); //將陣列以欄位名索引   
            ?>
              <tr>
                <td>
                  <?php echo $row['meid'];   ?>
                </td>
                <td>
                  <?php echo $row['mename'];   ?>
                </td>
                <td>
                  <?php echo $row['meaccount']; ?>
                </td>
                <td>
                  <?php echo $row['mepasswd']; ?>
                </td>
                <td>
                  <?php echo $row['mebirthday']; ?>
                </td>
                <td>
                  <?php echo $row['mestatus']; ?>
                </td>
                <td>
                  <?php echo $row['memail']; ?>
                </td>
                <td>
                  <?php echo $row['mephone']; ?>
                </td>
                <td>
                  <?php echo $row['meaddress']; ?>
                </td>
                <td>
                <button type="submit" name="Disablex" id="Disablex" class="btn btn-danger" value="<?php echo $row['meid'] ?>">禁用</button>
                <button type="submit" name="normalo" id="normalo" class="btn btn-success" value="<?php echo $row['meid'] ?>">啟用</button>
                <?php
                 ?>
              </td>
              </tr>
            <?php    }   ?>
          </table>
        </div>
      </div>
      </div>
      <div style=" background-color:SlateBlue;">
        <font color="#FFFFFF"><?= "Welcome! " . $maaccount ?></font>
      </div>
  </form>
</body>
</html>