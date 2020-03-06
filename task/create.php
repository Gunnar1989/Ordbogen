<?php
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