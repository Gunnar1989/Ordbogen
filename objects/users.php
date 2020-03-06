<?php
class Users{
  
    private $conn;
    private $table_name = "users";
    public $id;
    public $name;
    public $username;
    public function __construct($db){
        $this->conn = $db;
    }

function read(){
    
      $query = "SELECT
               id, username, name
            FROM
                " . $this->table_name;

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}

function create(){
  
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, username=:username, password=:password";
  
    $stmt = $this->conn->prepare($query);
  
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->username=htmlspecialchars(strip_tags($this->username));
    $this->password=htmlspecialchars(strip_tags($this->password));
  
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":password", $this->password);
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}
function readOne(){
     $query = "SELECT
               name, id, username
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
  
    $this->name = $row['name'];
    $this->id = $row['id'];
    $this->username = $row['username'];

}
}

?>