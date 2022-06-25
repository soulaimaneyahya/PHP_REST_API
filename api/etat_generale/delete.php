<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../config/Functions.php';
include_once '../../models/EtatGenerale.php';

if (is_auth()) {
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate etat object
$etat = new EtatGenerale($db);

// Get raw data
$data = json_decode(file_get_contents("php://input"));

$etat->id_etat = $data->id_etat;

// DELETE etat
if($etat->delete()) {
    $resJson = array("message" => "etat Deleted !", "result" =>"success", "cod"=> "200");
    echo json_encode($resJson , JSON_UNESCAPED_UNICODE);
} 
else {
    $resJson = array("message" =>"error", "result" =>"faild" , "cod"=> "400");
    echo json_encode($resJson , JSON_UNESCAPED_UNICODE);
}

} else {
    $resJson = array("message" =>"error", "result" =>"faild" , "cod"=> "400");
    echo json_encode($resJson , JSON_UNESCAPED_UNICODE);
}
