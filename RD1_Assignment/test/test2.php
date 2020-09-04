
<?php
    // // 雨量
    // $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON";  // Your json data url
    // $data = file_get_contents($url);  // PHP get data from url
    // $json = json_decode($data, true);  // Decode json data
    // // 處理取得的 json 資料
    // var_dump($json['records']['locations'][0]['location']);   


    //  $ins_qry = 'INSERT INTO json_table(jsonvalues) values ("'.$json.'")';
    //  $exec_qry = mysqli_query($link,$ins_qry);
    // $connect->close();
    
    // $host="localhost";
    // $user="root";
    // $pass="root";
    // $db="OPENDATA";
    // $port=8889;
    // // mysql_query("SET NAMES 'utf8'");
    // // mysql_select_db($dbname);
    // $connect= new mysqli($host,$user,$pass,$db,$port) or die("ERROR:could not connect to the database!!!");

    // $datasetDescription = $contenct['datasetDescription'];
    // $locationName = $connect['locationName'];
    // $elementName = $connect['elementName'];
    // $description = $connect['description'];
    // $startTime = $connect['startTime'];
    // $endTime = $connect['endTime'];
    // $dataTime = $connect['dataTime'];
    // $value = $connect['value'];

    // $query = "insert into weather(datasetDescription, locationName, elementName, description, startTime, endTime, dataTime, value) values('$datasetDescription','$locationName','$elementName','$description','$startTime','$endTime','$value')";
    // $sql = "SELECT * FROM weather";
    // 處理取得的 json 資料
 
    // $query = "SELECT * FROM weather";

    // $result = mysql_query("SELECT * FROM weather"); 
    // while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    //   　printf ("datasetDescription: %s  locationName: %s", $datasetDescription, $locationName);
    // }
  // $result = mysqli_query($link, $sql);
	

    // $commandText = "select * from weather";
    // $result = mysqli_query($link, $data);
    
    // echo 'Weather <br>';
    // echo "<table><tr><th>Column</th><th>Type</th><th>Null</th><th>Key</th></tr>";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
            $handle = fopen("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON","rb");
            $content = "";
            while (!feof($handle)) {
                $content .= fread($handle, 10000);
            }
            fclose($handle);

            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "OPENDATA";
            $port = 8889;

            

            $conn = new mysqli($servername, $username, $password, $dbname, $port);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $content = json_decode($content);
            foreach ($content as $key => $value) {
                $sql = "INSERT INTO locations (id, name, toldescribe, tel, address, picture1, px, py, opentime, changetime) VALUES 
                ('$value->Id', '$value->Name', '$value->Toldescribe', '$value->Tel', '$value->Add', '$value->Picture1', '$value->Px', '$value->Py', '$value->Opentime', '$value->Changetime')";
                if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

            }
            mysqli_close($conn);
        ?>
</body>
</html>