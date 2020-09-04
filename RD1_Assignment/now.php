<?php


if (isset($_POST['btn'])) {
  $_SESSION["id"] = $_POST['city'];
}

//當前天氣預報
$url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON&locationName=" . urlencode($_POST["city"]) . "&sort=time";



$data = file_get_contents($url);  // PHP get data from url
$json3 = json_decode($data, true);  // Decode json data

$records3 = $json3['records'];
$datasetDescription3 = $json3['records']['datasetDescription'];
$location3 = $json3['records']['location'];
$locationName3 = $json3['records']['location'][0]['locationName'];
$elementName3 = $json3['records']['location'][0]['weatherElement'][0]['elementName'];
$startTime3 = $json3['records']['location'][0]['weatherElement'][0]['time'][0]['startTime'];
$endTime3 = $json3['records']['location'][0]['weatherElement'][0]['time'][0]['endTime'];
$parameter3 = $json3['records']['location'][0]['weatherElement'][0]['time'][0]['parameter']['parameterName'];
// var_dump($parameter);

// foreach ($json3 as $one) {

echo "<br>" . $datasetDescription3 . "<br>";

foreach ($location3 as $two) {
  echo "<br>" . $two['locationName'] . "<br>";
}
foreach ($location3[0]['weatherElement'] as $three) {
  echo "<br>" . $three['elementName'] . "<br>";
  foreach ($location3[0]['weatherElement'][0]['time'] as $four) {
    echo "<br>" . $four['startTime'] . "<br>";
    echo "<br>" . $four['endTime'] . "<br>";
    echo "<br>" . $three['time'][0]['parameter']['parameterName'] . "<br>";

    $xx=$three['time'][0]['parameter']['parameterName'];

    $link = @mysqli_connect("localhost", "root", "root","OPENDATA",8889) or die(mysqli_connect_error());
    $result = mysqli_query($link, "set names utf8");
    mysqli_select_db($link, "OPENDATA");
    $sql = "INSERT INTO weathernow (datasetDescription, locationName, elementName, startTime, endTime, parameterName) values('$datasetDescription3','$locationName3','$three[elementName]','$four[startTime]','$four[endTime]','$xx')";
    mysqli_query($link, $sql);
  }
  // foreach ($location3[0]['weatherElement'] as $three) {
  // echo "<br>" . $three['time'][0]['parameter']['parameterName'] . "<br>";
  // }
}
