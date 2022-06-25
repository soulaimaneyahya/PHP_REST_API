<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../config/Functions.php';
include_once '../../models/Patient.php';

if (is_auth()) {
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate Patient object
$patient = new Patient($db);

// Get raw data
$data = json_decode(file_get_contents("php://input"));

$patient->Id = $data->Id;
$patient->Nom = $data->Nom;
$patient->Prenom = $data->Prenom;
$patient->tel = $data->tel;
$patient->sexe = $data->sexe;
$patient->datnais = $data->datnais;
$patient->protocole = $data->protocole;
$patient->date_cure = $data->date_cure;
$patient->age = $data->age;
$patient->email = $data->email;
$patient->id_admin = $data->id_admin;
$patient->id_etat = $data->id_etat;
$patient->id_tox = $data->id_tox;
$patient->id_gonadique = $data->id_gonadique;
$patient->code = $data->code;
$patient->id_cu = $data->id_cu;
$patient->id_degestive = $data->id_degestive;
$patient->id_oculaire = $data->id_oculaire;
$patient->token = $data->token;
$patient->ip = $data->ip;
$patient->cod = $data->cod;

// Update User
if($patient->update()) {
    $resJson = array("message" => "Patient Updated !", "result" =>"success", "cod"=> "200");
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
