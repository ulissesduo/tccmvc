<?php
require_once('C:\xampp\htdocs\tccmvc\config\config.php');

class Model{
    private $con;
    
    public function __construct($PDO){
        // $con = new db();
        $this->con = $PDO;
    }
    
    //create
    public function create($name) {
        $sql = "INSERT INTO `username`(`name`) VALUES ('$name')";
        if($this->con->query($sql) == TRUE){
            return true;
        }else{        
            return false;
        }
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM username WHERE id = :id LIMIT 1";
        $stmt = $this->con->prepare($sql);
        $stmt->execute(array(":id" => $id));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function verifyUser($username, $password) {
        $sql = "SELECT id, user_type FROM username WHERE nome = :username AND password = :password LIMIT 1";
        $stmt = $this->con->prepare($sql);
        $stmt->execute(array(":username" => $username, ":password" => $password));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    public function getUserId($username, $password) {
        $stmt = $this->con->prepare("SELECT id FROM username WHERE nome = :username AND password = :password");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
          return $result['id'];
        } else {
          return false;
        }
    }

    public function select(){
        $sql = "SELECT * FROM students";
        $stmt = $this->con->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectStudent(){
        $sql = "SELECT * FROM students";
        $stmt = $this->con->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function search($searchTerm) {
        $sql = "SELECT * FROM students WHERE name LIKE :searchTerm";
        $stmt = $this->con->prepare($sql);
        $searchTerm = "%{$searchTerm}%";
        $stmt->execute(array(":searchTerm" => $searchTerm));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update($id, $name){
        $sql = "UPDATE username SET name=:name WHERE id=:id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    
        echo "id: $id\n";
        echo "query: $sql\n";
        if($stmt->execute()){
            return $stmt->rowCount();
        }
        else{
            echo 'edit failed';
            return false;
        }        
    }
    
    public function delete($id){
        $sql = "DELETE FROM students WHERE id=:id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id',$id);
        if($stmt->execute()){
         
            return $stmt->rowCount();   
        }else{
            return false;
        }
    }

    public function inactivate($id){
        $sql = "UPDATE students SET isActive = CASE WHEN isActive = 1 THEN 0 ELSE 1 END WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id',$id);
        if($stmt->execute()){       
            return $stmt->rowCount();   
        }else{
            return false;
        }
    }  
}
?>