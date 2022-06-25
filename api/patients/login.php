<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/Functions.php';

if (isset($_GET["cod"]) && isset($_GET["ip"]) && is_auth()) {
    $cod = htmlspecialchars(strip_tags($_GET["cod"]));
    $ip = htmlspecialchars(strip_tags($_GET["ip"]));
    
    $selectArray = array();
    array_push($selectArray , $cod);
    array_push($selectArray , $ip);
    
    $sql = "SELECT * from patient where cod = ? and ip = ? ";
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
