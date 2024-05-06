<?php

 header "Access-Control-Allow-Methods: POST";
 header "Content-Type: application/json";

 include "../../config/config.php";

  $config = new Config();

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $mail = $_POST['mail'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $res = $config->signUpUser($name,$username,$password);

    if($res){

        arr['response'] = "Data added sucessfully.";
    }else{

        arr['response'] = "could not add the data in table.";

    }


  }else{

    arr['error'] = "IN-VALID HTTP METHOD.";

  }
   
echo json_encode($arr);


?>