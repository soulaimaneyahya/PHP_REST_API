<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../config/Functions.php';
include_once '../../models/Medecin.php';

if (is_auth()) {
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate Medecin object
$medecin = new Medecin($db);

// Get raw data
$data = json_decode(file_get_contents("php://input"));

$medecin->id_medecin = $data->id_medecin;

// DELETE Medecin
if($medecin->delete()) {
    $resJson = array("message" => "Medecin Deleted !", "result" =>"success", "cod"=> "200");
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
