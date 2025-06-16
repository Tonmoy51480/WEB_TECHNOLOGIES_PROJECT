<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "student_db";
    private $conn;

    
    public function getConnection() {
        $this->conn = null;
        
        try {
            $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);
            
            if (mysqli_connect_errno()) {
                throw new Exception("Failed to connect to MySQL: " . mysqli_connect_error());
            }
        } catch (Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }
        
        return $this->conn;
    }
}
?>
