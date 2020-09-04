<?php
require_once("connDB.php");

if (isset($_POST['btn'])) {
    $_SESSION["id"] = $_POST['city'];
}
//未來兩天天氣預報 
$url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON&locationName=" . urlencode($_POST["city"]) . "&elementName=WeatherDescription&sort=time";

$data = file_get_contents($url);  // PHP get data from url
$json1 = json_decode($data, true);  // Decode json data
// var_dump($json1);

$locations1 = $json1['records']['locations'];
$datasetDescription1 = $json1['records']['locations'][0]['datasetDescription'];
$location1 = $json1['records']['locations'][0]['location'];
$locationName1 = $json1['records']['locations'][0]['location'][0]['locationName'];
$elementName1 = $json1['records']['locations'][0]['location'][0]['weatherElement'][0]['elementName'];
$description1 = $json1['records']['locations'][0]['location'][0]['weatherElement'][0]['description'];
$startTime1 = $json1['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['startTime'];
$endTime1 = $json1['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['endTime'];
$value1 = $json1['records']['locations'][0]['location'][0]['weatherElement'][0]['time'][0]['elementValue'][0]['value'];

foreach ($locations1 as $one) {
    echo "<br>" . $one['datasetDescription'] . "<br>";

    foreach ($location1 as $two) {
        echo "<br>" . $two['locationName'] . "<br>";

        foreach ($location1[0]['weatherElement'] as $three) {

            echo "<br>" . $three['elementName'] . "<br>";

            foreach ($location1[0]['weatherElement'] as $four) {

                echo "<br>" . $four['description'] . "<br>";

                foreach ($location1[0]['weatherElement'][0]['time'] as $five) {

                    echo "<br>" . $five['startTime'] . "<br>";
                    echo "<br>" . $five['endTime'] . "<br>";
                    echo "<br>" . $five['elementValue'][0]['value'] . "<br>";

                    $val = $five['elementValue'][0]['value'];
                    $link = @mysqli_connect("localhost", "root", "root", "OPENDATA", 8889) or die(mysqli_connect_error());
                    $result = mysqli_query($link, "set names utf8");
                    mysqli_select_db($link, "OPENDATA");
                    $sql = "INSERT INTO weathertwodays (datasetDescription, locationName, elementName, description, startTime, endTime, value) values('$one[datasetDescription]','$two[locationName]','$three[elementName]','$four[description]','$five[startTime]','$five[endTime]','$val')";
                    mysqli_query($link, $sql);
                }
            }
        }
    }
}
