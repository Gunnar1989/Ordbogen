<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/users.php';
$database = new Database();
$db = $database->getConnection();
//Opna Klassan
$user = new Users($db);
$stmt = $user->read();
$num = $stmt->rowCount();
if($num>0){

    $users_arr=array();
    $users_arr["users"]=array();
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
  
        $user_item=array(
            "id" => $id,
            "name" => $name,
            "username" => $username,
        );
  
        array_push($users_arr["users"], $user_item);
    }
  
    http_response_code(200);
    echo json_encode($users_arr);
}
?>