<?php
class Users{
  
    private $conn;
    private $table_name = "users";
    public $id;
    public $name;
    public function __construct($db){
        $this->conn = $db;
    }

function read(){
    
      $query = "SELECT
               id, username
            FROM
                " . $this->table_name;

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}
}

?>