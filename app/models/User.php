<?php
class User {
    private $conn;
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }
    public function getByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
