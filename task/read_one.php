<?php

// include database and object files
include_once '../config/database.php';
include_once '../objects/tasks.php';


$database = new Database();
$db = $database->getConnection();

$task = new Tasks($db);  
$task->id = isset($_GET['id']) ? $_GET['id'] : die(); 
$task->readOne();
  
if($task->title!=null){
    $task_arr = array(
        "id" => $task->id,
        "title" =>  $task->title,
        "description" => $task->description,
        "active" => $task->active
    );
  
    http_response_code(200);
    echo json_encode($task_arr);
}
  
else{
    http_response_code(404);
    echo json_encode(array("message" => "Task does not exist."));
}
?>