<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/Functions.php';

if (isset($_GET["email"]) && isset($_GET["password"]) && is_auth()) {
    $email = htmlspecialchars(strip_tags($_GET["email"]));
    $password = htmlspecialchars(strip_tags($_GET["password"]));
    
    $selectArray = array();
    array_push($selectArray , $email);
    array_push($selectArray , $password);
    
    $sql = "SELECT * from medecin where email = ? and password = ? ";
    $result = dbExec($sql, $selectArray);
    $arrJson = array();
    
    if ($result->rowCount() > 0 ) {
        $arrJson = $result->fetchObject();
        $resJson = array("message" => $arrJson, "result" =>"success", "cod"=> "200");
        echo json_encode($resJson , JSON_UNESCAPED_UNICODE);
    }
    else {
        //bad request
        $resJson =array("message" =>"empty", "result" =>"empty" , "cod"=> "400");
        echo json_encode($resJson , JSON_UNESCAPED_UNICODE);
    }
}
else {
    $resJson = array("message" =>"error", "result" =>"faild" , "cod"=> "400");
    echo json_encode($resJson , JSON_UNESCAPED_UNICODE);
}
