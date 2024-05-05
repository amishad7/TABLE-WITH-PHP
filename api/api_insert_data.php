<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include "../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $type = $_POST['type'];


    $res = $config->insert($name, $author, $type);

    if ($res) {
        $arr['data'] = "Data inserted Successfully...";
        http_response_code(201);
    } else {
        $arr['data'] = "Data insertion Failed...";
    }
} else {
    $arr['err'] = "Only POST HTTP Request Method is allowed...";
}

echo json_encode($arr);

?>