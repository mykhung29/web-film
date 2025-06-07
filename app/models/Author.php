<?php
class Author
{
    private $conn;
    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }
    public function getAll($limit = 10, $offset = 0, $sortBy = 'year', $sortOrder = 'DESC')
    {
        // Danh sách các cột cho phép sắp xếp để tránh SQL Injection
        $allowedSorts = ['year', 'title', 'views'];
        $allowedOrder = ['ASC', 'DESC'];

        // Kiểm tra tính hợp lệ
        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'year';
        }
        if (!in_array(strtoupper($sortOrder), $allowedOrder)) {
            $sortOrder = 'DESC';
        }

        // Truy vấn
        $query = "SELECT * FROM free_rel ORDER BY $sortBy $sortOrder LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBySlug($slug)
    {
        $stmt = $this->conn->prepare("SELECT * FROM free_rel WHERE movie_id = ?");
        $stmt->execute([$slug]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   
}
