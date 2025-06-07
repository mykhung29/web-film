<?php
class Country {
    private $conn;
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }
    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM free_countries");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBySlug($slug) {
        $stmt = $this->conn->prepare("SELECT * FROM free_countries WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
}
