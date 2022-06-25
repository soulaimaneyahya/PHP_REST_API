<?php 

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../config/Functions.php';
include_once '../../models/Fievre.php';

if (is_auth()) {
    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate fievre object
    $fievre = new Fievre($db);

    // Get raw data
    $data = json_decode(file_get_contents("php://input"));

    $fievre->id_fievre = $data->id_fievre;
    $fievre->dure = $data->dure;
    $fievre->mesure = $data->mesure;
    $fievre->date_apparition = $data->date_apparition;

    // Create fievre
    if($fievre->create()) {
        $resJson = array("message" => "fievre Created !", "result" =>"success", "cod"=> "200");
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
