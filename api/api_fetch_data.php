<?php

header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");


include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $res = $config->fetch_table_data();

    $allData = []; // array
    while ($result = mysqli_fetch_assoc($res)) {
        array_push($allData, $result);
    }

    $arr['data'] = $allData;

} else {
    $arr['err'] = "Only GET HTTP request method is allowed...";
}

echo json_encode($arr);

?>