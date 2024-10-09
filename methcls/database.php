<?php
class Database {
    private $host = "localhost";
    private $username = "effism";
    private $password = "admin";
    private $database = "clg_db";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function create($name, $clg_name, $designation, $salary, $skills) {
        $stmt = $this->conn->prepare("INSERT INTO employees (name, clg_name, designation, salary, skills) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $clg_name, $designation, $salary, $skills);
        $stmt->execute();
        $stmt->close();
    }

    public function read() {
        $result = $this->conn->query("SELECT * FROM employees");
        return $result;
    }

    public function readSingle($id) {
        $stmt = $this->conn->prepare("SELECT * FROM employees WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($id, $name, $clg_name, $designation, $salary, $skills) {
        $stmt = $this->conn->prepare("UPDATE employees SET name=?, clg_name=?, designation=?, salary=?, skills=? WHERE id=?");
        $stmt->bind_param("sssssi", $name, $clg_name, $designation, $salary, $skills, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM employees WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>