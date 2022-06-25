<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/Functions.php';

if( isset($_GET["id_etat"]) && is_numeric($_GET["id_etat"]) && is_auth()) {
    $id_etat = $_GET["id_etat"];
    
    $selectArray = array();
    array_push($selectArray , $id_etat);

    $sql = "SELECT * from etat_generale where id_etat = ?";
    $result = dbExec($sql, $selectArray);
    $arrJson = array();
    if($result->rowCount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $arrJson = $row;
        }

        $resJson = array("result" =>"success" , "code"=> "200" , "message" =>$arrJson);
        echo json_encode($resJson , JSON_UNESCAPED_UNICODE);
    } else {
        $resJson = array("message" =>"empty", "result" =>"faild" , "cod"=> "400");
        echo json_encode($resJson , JSON_UNESCAPED_UNICODE);
    }
} else {
    //bad request
    $resJson =array("result" =>"failed" , "code"=> "400" , "message" =>"erreur");
    echo json_encode($resJson , JSON_UNESCAPED_UNICODE);
}
