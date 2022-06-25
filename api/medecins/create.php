<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../config/Functions.php';
include_once '../../models/Medecin.php';

if (is_auth()) {
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate medecin object
$medecin = new Medecin($db);

// Get raw data
$data = json_decode(file_get_contents("php://input"));

$medecin->id_medecin = $data->id_medecin;
$medecin->Nom = $data->Nom;
$medecin->Prenom = $data->Prenom;
$medecin->email = $data->email;
$medecin->telephone = $data->telephone;
$medecin->id_admin = $data->id_admin;
$medecin->password = $data->password;
$medecin->token = $data->token;

// Create Medecin
if($medecin->create()) {
    $resJson = array("message" => "medecin Created !", "result" =>"success", "cod"=> "200");
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