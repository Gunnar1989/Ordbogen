<?php
class Tasks{
  
    private $conn;
    private $table_name = "tasks";
    public $id;
    public $title;
    public $description;
    public $datetime;
    public $active;
    public function __construct($db){
        $this->conn = $db;
    }

function read(){

      $query = " SELECT 
      u1.name as user_name, 
      u1.id as user_id,
    t.id, t.title, t.description, t.datetime, t.active 
       FROM " . $this->table_name . " as t
        LEFT JOIN users_tasks as u ON t.id = u.task_id
        LEFT JOIN users as u1 ON u.user_id = u1.id";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}
function create(){
  
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                title=:title, description=:description, active=:active";
  
    $stmt = $this->conn->prepare($query);
  
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->active=htmlspecialchars(strip_tags($this->active));
  
    // bind values
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":active", $this->active);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}
function readOne(){
     $query = "SELECT
               title, id, description, active
            FROM
                " . $this->table_name . "
            WHERE
                id = ?
            LIMIT
                0,1";

    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    $this->title = $row['title'];
    $this->id = $row['id'];
    $this->description = $row['description'];
    $this->active = $row['active'];

}
function update(){
      $query = "UPDATE
                " . $this->table_name . "
            SET
                title = :title,
                active = :active,
                description = :description
            WHERE
                id = :id";
  
    $stmt = $this->conn->prepare($query);
  
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->active=htmlspecialchars(strip_tags($this->active));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':active', $this->active);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':id', $this->id);
  
    if($stmt->execute()){
        return true;
    }
  
    return false;
}
}

?>