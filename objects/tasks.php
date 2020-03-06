<?php
class Tasks{
  
    private $conn;
    private $table_name = "tasks";
    public $id;
    public $name;
    public function __construct($db){
        $this->conn = $db;
    }

function read(){
    
      $query = "SELECT
               title, description, datetime, active
            FROM
                " . $this->table_name;

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}
}

?>