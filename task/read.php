<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
include_once '../config/database.php';
include_once '../objects/tasks.php';
$database = new Database();
$db = $database->getConnection();
//Opna Klassan
$task = new Tasks($db);
$stmt = $task->read();
$num = $stmt->rowCount();
if($num>0){

    $tasks_arr=array();
    $tasks_arr["tasks"]=array();
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
  
        $task_item=array(
            "user_name" => $user_name,
            "id" => $id,
            "title" => $title,
            "description" => $description,
            "datetime" => $datetime,
            "active" => $active,
            "user_id" => $user_id
        );
  
        array_push($tasks_arr["tasks"], $task_item);
    }
  
    http_response_code(200);
    echo json_encode($tasks_arr);
}
?>