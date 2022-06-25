<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/Functions.php';

if (isset($_GET["start"]) && is_numeric($_GET["start"]) && isset($_GET["end"]) && is_numeric($_GET["end"]) && is_auth()) {
    $start = $_GET["start"];
    $end = $_GET["end"];
    
    // last $end records
    $sql = "SELECT * FROM `fievre` order by `id_fievre` desc LIMIT $start, $end;";
    $result = dbExec($sql, []);
    $arrJson = array();
    
    if ($result->rowCount() > 0 ) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $arrJson[] = $row;
        }
        // var_dump($arrJson);
        $resJson = array("message" => $arrJson, "result" =>"success", "cod"=> "200");
        echo json_encode($resJson , JSON_UNESCAPED_UNICODE);
    }
    else {
        //bad request
        $resJson =array("message" =>"empty", "result" =>"empty" , "cod"=> "400");
        echo json_encode($resJson , JSON_UNESCAPED_UNICODE);
    }
} else {
    $resJson = array("message" =>"error", "result" =>"faild" , "cod"=> "400");
    echo json_encode($resJson , JSON_UNESCAPED_UNICODE);
}
