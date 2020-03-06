<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
include_once '../config/database.php';
include_once '../objects/tasks.php';
  
$database = new Database();
$db = $database->getConnection();
  
$task = new Tasks($db);
  
$data = json_decode(file_get_contents("php://input"));
if(
    !empty($data->title) &
    !empty($data->description) &
    !empty($data->active) 
){
  
    $task->title = $data->title;
    $task->description = $data->description;
    $task->active = $data->active;
  
    if($task->create()){
  
        http_response_code(201);
        echo json_encode(array("message" => "Task was created."));
    }
      else{
        http_response_code(503);
        echo json_encode(array("message" => "Unable to create Task."));
    }
}
else{
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create Task. Data is incomplete."));
}