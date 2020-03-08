<?php
header("Access-Control-Allow-Origin: *");
include_once '../config/database.php';
include_once '../objects/users.php';
  
$database = new Database();
$db = $database->getConnection();
  
$user = new Users($db);
$data = json_decode(file_get_contents("php://input"));
  
if(
    !empty($data->name) &
    !empty($data->username) &
    !empty($data->password) 
){
  
    $user->name = $data->name;
    $user->username = $data->username;
    $user->password = $data->password;
  
    if($user->create()){
  
        http_response_code(201);
        echo json_encode(array("message" => "Usercc was created."));
    }
  
    else{
  
        http_response_code(503);
        echo json_encode(array("message" => "Unable to create user."));
    }
}
else{
  
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create user. Data is incomplete."));
}