<?php
require_once("connDB.php");
if (isset($_POST['btn'])) {
    $_SESSION["id"] = $_POST['city'];
    $_SESSION["id3"] = $_POST['time'];
    
}


//累積雨量
// $url ="https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON&locationName=parameterValue&elementName=HOUR_24¶meterName=CITY";
// $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON&locationName=parameterValue&elementName=HOUR_24&parameterName=CITY";
// $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON&locationName=" . urlencode($_POST["city"]) . "&elementName=" . $_POST["time"] . "&parameterName=CITY";
$url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON&elementName=" . $_POST["time"] . "&parameterName=CITY";
// echo(urldecode($_POST["time"]));
$data = file_get_contents($url);  // PHP get data from url
$json4 = json_decode($data, true);  // Decode json data
// var_dump($json4);
$location4 = $json4['records']['location'];
$locationName4 = $json4['records']['location'][0]['locationName'];
$obsTime4 = $json4['records']['location'][0]['time']['obsTime'];
$elementName4 = $json4['records']['location'][0]['weatherElement'][0]['elementName'];
$elementValue4 = $json4['records']['location'][0]['weatherElement'][0]['elementValue'];
$parameterName4 = $json4['records']['location'][0]['parameter'][0]['parameterName'];
$parameterValue4 = $json4['records']['location'][0]['parameter'][0]['parameterValue'];


// var_dump($json4);
echo "<br>累積雨量<br>";
echo "<br>".$locationName4 . "<br>";

foreach ($location4 as $two) {
    echo "<br>" . $two['locationName'] . "<br>";
    echo "<br>" . $two['time']['obsTime'] . "<br>";
    foreach ($location4[0]['weatherElement'] as $one) {
    echo "<br>" . $two['weatherElement'][0]['elementName'] . "<br>";
    echo "<br>" . $two['weatherElement'][0]['elementValue'] . "<br>";
    }
    foreach ($location4[0]['parameter'] as $three) {

        echo "<br>" . $three['parameterName'] . "<br>";
    }
    foreach ($location4[0]['parameter'] as $three) {

        echo "<br>" . $three['parameterValue'] . "<br>";

        $obT = $two['time']['obsTime'];
        $eleN = $two['weatherElement'][0]['elementName'];
        $eleV = $two['weatherElement'][0]['elementValue'];
        $link = @mysqli_connect("localhost", "root", "root", "OPENDATA", 8889) or die(mysqli_connect_error());
        $result = mysqli_query($link, "set names utf8");
        mysqli_select_db($link, "OPENDATA");
        $sql = "INSERT INTO weatherrain (locationName, obsTime, elementName, elementValue, parameterName, parameterValue) values('$two[locationName]','$obT','$eleN','$eleV','$three[parameterName]','$parameterValue4')";
        mysqli_query($link, $sql);
    }
}

    // $records = $json['records'];
    
      
   /*insert in db but you will have big quantity of queryes*/
                
    // $sql = "INSERT INTO weather (datasetDescription, locationName, elementName, description, startTime, endTime, value) values('$datasetDescription','$locationName','$elementName','$description','$startTime','$endTime','$value')";
