<?php
require_once("connDB.php");
session_start();
if (isset($_SESSION["maaccount"])) {
  $meaccount = $_SESSION["maaccount"];
} else {
  if (!isset($_SESSION["maaccount"])) {
    header("Location: login2.php");
    exit();
  }
}
if (isset($_GET["okButton"])) {
  $prnamenew = $_GET["prnamenew"];
  $prpricenew = $_GET["prpricenew"];
  $prquantitynew = $_GET["prquantitynew"];
  $prdescriptnew = $_GET["prdescriptnew"];
  $primgnew = $_GET["primgnew"];

  $sqlnew = "INSERT INTO product (prname, prprice, prquantity, prdescript, primg) values('$prnamenew','$prpricenew','$prquantitynew','$prdescriptnew','$primgnew')";
  mysqli_query($link, $sqlnew);
}  

if (isset($_GET["deletenew"])) {
  $deleten = $_GET["deletenew"];

  $sqldelete = "DELETE  FROM product WHERE prid = '$deleten' ";
  mysqli_query($link, $sqldelete);
}
?>
<!DOCTYPE html>
<html>

<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: lightblue;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
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
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.toast.js"></script>

</head>

<body style="background:url('./img/bookindex.jpg')round">
  <h1 align="center">線上購書商城</h1>
  <form id="form1" name="form1" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
    <div align="center" bgcolor="#CCCCCC" style="background-color:SlateBlue;">
      <font color="#FFFFFF">商品管理</font>
    </div>
    <div align="center" bgcolor="#CCCCCC"><a href="index2.php">回首頁</a></div>
    
        <label>
          <font color="#000000">商品列表 :
        </label>
        <?php
        $link = @mysqli_connect("localhost", "root", "root", "shopping", 8889) or die(mysqli_connect_error());
        $result = mysqli_query($link, "set names utf8");
        $maaccount = $_SESSION["maaccount"];
        $sqlsecret = "SELECT * from product";
        $result = mysqli_query($link, $sqlsecret);

        $total_records = mysqli_num_rows($result);  // 取得記錄數

        echo ($total_records);
        ?>
        <input type="button" name="addnewpro" id="addnewpro" class="btn btn-success" value="上架商品" />

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
                <input type="submit" name="updatenew" id="updatenew" class="btn btn-info" value="編輯" />
                <button type="submit" name="deletenew" id="deletenew" class="btn btn-danger" value="<?php echo $row['prid'] ?>">刪除</button>
                <?php
                 ?>
              </td>
            </tr>
          <?php    }   ?>
        </table>
     
    </div>
    <div style=" background-color:SlateBlue;">
      <font color="#FFFFFF"><?= "Welcome! " . $maaccount ?></font>
    </div>

    <!-- 對話盒 -->
    <div id="newsModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>上架/編輯</h4>
          </div>
          <div class="modal-body">
            <form enctype="multipart/form-data" >
              <div class="form-group">
                <label for="titleTextBox">
                  商品名稱
                </label>
                <input type="text" name="prnamenew" id="prnamenew" class="form-control" placeholder="請輸入商品名稱" />
              </div>
              <div class="form-group">
                <label for="ymdTextBox">
                  商品價格
                </label>
                <input type="text" name="prpricenew" id="prpricenew" class="form-control" placeholder="請輸入商品價格">
              </div>
              <div class="form-group">
                <label for="ymdTextBox">
                  商品數量
                </label>
                <input type="text" name="prquantitynew" id="prquantitynew" class="form-control" placeholder="請輸入商品數量">
              </div>
              <div class="form-group">
                <label for="ymdTextBox">
                  商品描述
                </label>
                <input type="text" name="prdescriptnew" id="prdescriptnew" class="form-control" placeholder="請輸入商品描述">
              </div>
              <div class="form-group">
                <label for="ymdTextBox">
                  商品圖片
                </label>
                <input type="file" name="primgnew" id="primgnew" class="form-control" placeholder="請輸入商品圖片">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <div class="pull-right">
              <input type="submit" name="okButton" id="okButton" class="btn btn-success" value="確定" />
              <input type="submit" name="cancelButton" id="cancelButton" class="btn btn-default" data-dismiss="modal" value="取消" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /對話盒 -->
  </form>
  <script>
    $("#addnewpro").click(function() {
      // alert("OK");
      $("#newsModal").modal({
        backdrop: "static"
      });
    })
  </script>
</body>

</html>