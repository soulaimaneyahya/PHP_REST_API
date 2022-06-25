<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
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

$etat->painte = $data->painte;
$etat->fatigue = $data->fatigue;
$etat->travail = $data->travail;
$etat->activites = $data->activites;
$etat->appetit = $data->appetit;
$etat->autonomie = $data->autonomie;
$etat->douleur = $data->douleur;
$etat->depression = $data->depression;
$etat->id_etat = $data->id_etat;

// Create etat
if($etat->create()) {
    $resJson = array("message" => "etat generale Created !", "result" =>"success", "cod"=> "200");
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
