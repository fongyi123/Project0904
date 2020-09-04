<?php
session_start();
if (isset($_SESSION["maccount"])) {
  $maccount = $_SESSION["maccount"];
} else {
  if (!isset($_SESSION["maccount"])) {



    header("Location: login.php");
    exit();
  }
}
?>


<!DOCTYPE html>
<html>

<head>
  <style>
    
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

<body style="background:url('./img5/bank.jpg')round">
  <h1 align="center">線上網銀系統</h1>
  <form id="form1" name="form1" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <div align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;">
      <font color="#FFFFFF">歡迎使用網路銀行明細查詢</font>
    </div>
    <divalign="center" bgcolor="#CCCCCC"><a href="index.php">回首頁
      </a></div>
      <div style="width:auto;height:600px;">
        <div style="width:auto;height:600px;text-align:center;margin:0 auto;">
          <label>
            <font color="#000000">明細查詢結果 :
          </label>
          <?php
          $link = @mysqli_connect("localhost", "root", "root", "bankmember", 8889) or die(mysqli_connect_error());
          $result = mysqli_query($link, "set names utf8");
          $maccount = $_SESSION["maccount"];
          $sqlsecret = "SELECT * from detail";
          $result = mysqli_query($link, $sqlsecret);

          $total_records = mysqli_num_rows($result);  // 取得記錄數

          echo ($total_records);
          ?>
          <table border="1" cellspacing=0 cellspadding=0>
            <tr>
              <td>did</td>
              <td>daccount</td>
              <td>dtranstype</td>
              <td>dtrade</td>
              <td>dtransdate</td>
            </tr>
            <?php
            for ($i = 0; $i < $total_records; $i++) {
              $row = mysqli_fetch_assoc($result); //將陣列以欄位名索引   
            ?>
              <tr>
                <td>
                  <?php echo $row['did'];   ?>
                </td>
                <td>
                  <?php echo $row['daccount'];   ?>
                </td>
                <td>
                  <?php echo $row['dtranstype']; ?>
                </td>
                <td>
                  <?php echo $row['dtrade']; ?>
                </td>
                <td>
                  <?php echo $row['dtransdate']; ?>
                </td>
              </tr>
            <?php    }   ?>
          </table>
        </div>
      </div>
      </div>
      <div style=" background-color:SlateBlue;">
        <font color="#FFFFFF"><?= "Welcome! " . $maccount ?></font>
      </div>
  </form>
</body>

</html>