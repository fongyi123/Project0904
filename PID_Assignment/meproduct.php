<?php
// require_once("connDB.php");
session_start();
if (isset($_SESSION["meaccount"])) {
  $meaccount = $_SESSION["meaccount"];
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
  <form id="form1" name="form1" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">

    <div align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;">
      <font color="#FFFFFF">商品選購</font>
    </div>
    <div align="center" bgcolor="#CCCCCC"><a href="index.php">回首頁</a></div>
      <?php
        $link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());
        $result = mysqli_query($link, "set names utf8");
        $maaccount = $_SESSION["maaccount"];
        $sqlsecret = "SELECT * from product";
        $result = mysqli_query($link, $sqlsecret);

        $total_records = mysqli_num_rows($result);  // 取得記錄數

        // echo ($total_records);
        ?>
        

        <table border="1" cellspacing=0 cellspadding=0>
          <tr>
            <td>商品編號</td>
            <td>商品名稱</td>
            <td>商品價格</td>
            <td>商品數量</td>
            <td>商品描述</td>
            <td>商品圖片</td>
            <td>編輯功能</td>

          </tr>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {

          ?>
            <tr>
              <td>
                <?php echo $row['prid'];   ?>
              </td>
              <td>
                <?php echo $row['prname'];   ?>
              </td>
              <td>
                <?php echo $row['prprice']; ?>
              </td>
              <td>
                <?php echo $row['prquantity']; ?>
              </td>
              <td>
                <?php echo $row['prdescript']; ?>
              </td>
              <td>
              <img id=<?php echo $row['primg']; ?> src="./img/<?php echo $row['primg']; ?>"  width="10%" height="10%">
              </td>
              <td>
                <button type="submit" name="deletenew" id="deletenew" class="btn btn-danger" value="<?php echo $row['prid'] ?>">加入購物車</button>
                <?php
                 ?>
              </td>
            </tr>
          <?php    }   ?>
        </table>

      <div style="background-color:SlateBlue;">
        <font color="#FFFFFF"><?= "Welcome! " . $meaccount ?></font>
      </div>
  </form>
</body>

</html>