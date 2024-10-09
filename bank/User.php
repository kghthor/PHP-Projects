<?php
require_once 'Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($name, $email, $username, $password, $designation, $income) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (name, email, username, password, designation, income) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssd", $name, $email, $username, $password, $designation, $income);
        return $stmt->execute();
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }

    public function getUser($id) {
        $stmt = $this->db->prepare("SELECT id, name, email, username, designation, income, balance FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateBalance($id, $amount) {
        $stmt = $this->db->prepare("UPDATE users SET balance = ? WHERE id = ?");
        $stmt->bind_param("di", $amount, $id);
        return $stmt->execute();
    }

    public function addTransaction($user_id, $amount, $type, $reason = null) {
        $stmt = $this->db->prepare("INSERT INTO transactions (user_id, amount, type, reason) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("idss", $user_id, $amount, $type, $reason);
        return $stmt->execute();
    }
}
?>
