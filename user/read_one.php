<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../objects/users.php';


$database = new Database();
$db = $database->getConnection();

$user = new Users($db);  
$user->id = isset($_GET['id']) ? $_GET['id'] : die(); 
$user->readOne();
  
if($user->name!=null){
    $user_arr = array(
        "id" => $user->id,
        "name" => $user->name,
        "username" =>  $user->username,
    );
  
    http_response_code(200);
    echo json_encode($user_arr);
}
  
else{
    http_response_code(404);
    echo json_encode(array("message" => "user does not exist."));
}
?>