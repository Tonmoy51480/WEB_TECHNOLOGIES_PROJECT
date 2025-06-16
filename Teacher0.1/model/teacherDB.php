<?php
class TeacherDB_mysqli {
    private $conn;

    public function __construct() {
        $host = 'localhost';
        $db   = 'your_database_name';
        $user = 'your_db_username';
        $pass = 'your_db_password';

        $this->conn = new mysqli($host, $user, $pass, $db);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        $this->conn->set_charset("utf8mb4");
    }

    public function saveTeacher($data) {
        $stmt = $this->conn->prepare(
            "INSERT INTO teachers (fname, lname, email, birthday, gender, address, teacherid, phone, password, image) 
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "ssssssssss",
            $data['fname'],
            $data['lname'],
            $data['email'],
            $data['birthday'],
            $data['gender'],
            $data['address'],
            $data['teacherid'],
            $data['phone'],
            $data['password'],
            $data['image']
        );
        return $stmt->execute();
    }

    public function emailExists($email) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM teachers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        return $count > 0;
    }

    public function teacherIdExists($teacherid) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM teachers WHERE teacherid = ?");
        $stmt->bind_param("s", $teacherid);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        return $count > 0;
    }

    public function findTeacherByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM teachers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function findTeacherByTeacherId($teacherid) {
        $stmt = $this->conn->prepare("SELECT * FROM teachers WHERE teacherid = ?");
        $stmt->bind_param("s", $teacherid);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateTeacher($teacherid, $data) {
        $stmt = $this->conn->prepare(
            "UPDATE teachers SET fname=?, lname=?, email=?, birthday=?, gender=?, address=?, phone=?, password=? 
             WHERE teacherid=?"
        );
        $stmt->bind_param(
            "sssssssss",
            $data['fname'],
            $data['lname'],
            $data['email'],
            $data['birthday'],
            $data['gender'],
            $data['address'],
            $data['phone'],
            $data['password'],
            $teacherid
        );
        return $stmt->execute();
    }

    public function __destruct() {
        $this->conn->close();
    }
}
