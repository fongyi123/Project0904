<?php
require_once('connDB.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="jquery/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="css/jquery.toast.css">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/app.js"></script>

  <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $("body").css("background-color", "lightblue")


    })
  </script>
  <style>
    h1 {
      color: rgb(0, 0, 0);
      text-align: center;
    }

    form {
      background-color: rgb(127, 224, 187);
      text-align: center;
    }

    select {
      width: 100%;
      padding: 16px 20px;
      border: none;
      border-radius: 4px;
      background-color: #f1f1f1;
    }

    button[type=submit] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    div {
      border-radius: 1px;
      padding: 2px;
    }

    div[class=card] {
      background-color: lightblue;
      margin-left: auto;
      margin-right: auto;

    }

    span.c {
      display: block;
      border: 1px solid blue;
    }
  </style>
</head>

<body style="background:url('./images/cloud.jpg')round">

  <h1>各縣市天氣查詢網站</h1>
  <form class="form-inline" method="POST" >
    <div class="form-group row">
      <label for="city" class="col-6 col-form-label">縣市選擇：</label>
      <div class="col-6">
        <select id="city" name="city" required="required" class="custom-select">
          <option value="臺北市">臺北市</option>
          <option value="新北市">新北市</option>
          <option value="桃園市">桃園市</option>
          <option value="臺中市">臺中市</option>
          <option value="臺南市">臺南市</option>
          <option value="高雄市">高雄市</option>
          <option value="基隆市">基隆市</option>
          <option value="新竹市">新竹市</option>
          <option value="嘉義市">嘉義市</option>
          <option value="新竹縣">新竹縣</option>
          <option value="苗栗縣">苗栗縣</option>
          <option value="彰化縣">彰化縣</option>
          <option value="南投縣">南投縣</option>
          <option value="雲林縣">雲林縣</option>
          <option value="嘉義縣">嘉義縣</option>
          <option value="屏東縣">屏東縣</option>
          <option value="宜蘭縣">宜蘭縣</option>
          <option value="花蓮縣">花蓮縣</option>
          <option value="臺東縣">臺東縣</option>
          <option value="澎湖縣">澎湖縣</option>
          <option value="金門縣">金門縣</option>
          <option value="連江縣">連江縣</option>
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="time" class="col-6 col-form-label">類型：
      </label>
      <div class="col-6">
        <select id="time" name="time" class="custom-select" required="required">
          <option value="RAIN">一小時降雨量</option>
          <option value="HOUR_24">一整天降雨量</option>
          <option value="current">當前天氣</option>
          <option value="ftomorrow">未來兩天</option>
          <option value="fweek">未來一週</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-8 col-12">
        <button id="btn" name="btn" type="submit" class="btn btn-primary" class="custom-select">開始查詢</button>

      </div>
    </div>
  </form >
  <div class="card" id="card">
    <div class="card1" id="id01">
      <img id=img01 src="./images/Taipei_101.jpg" alt="Taipei_101, Taipei, Taiwan" width="50%" height="auto" style="display: none;">
      <img id=img02 src="./images/Tamsui_red.jpg" alt="Fort Santo Domingo, New Taipei, Taiwan" width="50%" height="auto" style="display: none;">
      <img id=img03 src="./images/Taipei_101.jpg" alt="Taipei_101, Taipei, Taiwan" width="50%" height="auto" style="display: none;">
      <img id=img04 src="./images/Tamsui_red.jpg" alt="Fort Santo Domingo, New Taipei, Taiwan" width="50%" height="auto" style="display: none;">
      <img id=img05 src="./images/Taipei_101.jpg" alt="Taipei_101, Taipei, Taiwan" width="50%" height="auto" style="display: none;">
    </div>
    <!-- <div class="showData" id="id02" background-color=lightblue>
      <button onclick="myFunction()">Try it</button>


    </div> -->
    <div class="showData" id="id03" style="background:url('./images/cloud.jpg')round">
      <?php
      if (isset($_POST['btn'])) {
        $_SESSION["id2"] = $_POST['time'];
        if($_SESSION["id2"]== "fweek"){
          require_once('week.php');
        }
        elseif($_SESSION["id2"]== "ftomorrow"){
          require_once('twodays.php');
        }
        elseif($_SESSION["id2"]== "current"){
          require_once('now.php');
        }  
        else{
          require_once('rain.php');
        }
        
      }
      
      
      
     
      
      ?>

    </div>


  </div>
  <!-- <script type='text/javascript'> 
          var jsonData=JSON.parse('<?php echo $url; ?>'); //把抓到的資料給js的變數 
          console.log(jsonData); //可以看到該變數有資料了 
   </script>  -->
</body>

</html>