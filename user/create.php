<?php

  
// get database connection
include_once '../config/database.php';
  
// instantiate product object
include_once '../objects/users.php';
  
$database = new Database();
$db = $database->getConnection();
  
$user = new Users($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if(
    !empty($data->name) &
    !empty($data->username) &
    !empty($data->password) 
){
  
    // set product property values
    $user->name = $data->name;
    $user->username = $data->username;
    $user->password = $data->password;
  
    // create the product
    if($user->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "Usercc was created."));
    }
  
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create product."));
    }
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create product. Data is incomplete."));
}