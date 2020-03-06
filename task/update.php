<?php

include_once '../config/database.php';
include_once '../objects/tasks.php';
$database = new Database();
$db = $database->getConnection();
//Opna Klassan
$task = new Tasks($db);

$data = json_decode(file_get_contents("php://input"));

$task->id = $data->id;

$task->username = $data->username;
$task->title = $data->title;
$task->description = $data->description;
$task->active = $data->active;

if($task->update()){
  
    http_response_code(200);
      echo json_encode(array("message" => "Task was updated."));
}
else{
      http_response_code(503);
      echo json_encode(array("message" => "Unable to update product."));
}
?>