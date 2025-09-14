<?php
class Movie
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
        $query = "SELECT * FROM free_movies ORDER BY $sortBy $sortOrder LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBySlug($slug)
    {
        $stmt = $this->conn->prepare("SELECT * FROM free_details WHERE slug = ?");
        $stmt->execute([$slug]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM free_movies WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByName($keyword) {
        $sql = "SELECT * FROM free_movies WHERE name LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["%" . $keyword . "%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function getChapters($slug)
    {
        $stmt = $this->conn->prepare("SELECT * FROM free_episodes WHERE movie_slug = ?");
        $stmt->execute([$slug]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChapter($slug_movie, $slug_chapter)
    {
        $stmt = $this->conn->prepare("SELECT * FROM free_episodes WHERE movie_slug = ? AND episode_slug = ?");
        $stmt->execute([$slug_movie, $slug_chapter]); // ✅ truyền 1 mảng
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function search($keyword)
    {
        $stmt = $this->conn->prepare("SELECT * FROM free_movies WHERE title LIKE ?");
        $stmt->execute(['%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getByCategorySlug($slug, $limit = 20)
    {
        $like = "%,$slug,%";
        $sql = "SELECT * FROM free_movies WHERE CONCAT(',', categories_slug, ',') LIKE ? LIMIT ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $like, PDO::PARAM_STR);
        $stmt->bindParam(2, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMovies($filters = [], $limit = 20, $offset = 0)
    {
        $where = [];
        $params = [];
        

       // Thể loại (categories_slug)
        if (!empty($filters['theloai'])) {
            $theloaiConditions = [];
            foreach ((array)$filters['theloai'] as $slug) {
                $theloaiConditions[] = "categories_slug LIKE ?";
                $params[] = "%" . $slug . "%";
            }
            if (!empty($theloaiConditions)) {
                $where[] = "(" . implode(" OR ", $theloaiConditions) . ")";
            }
        }

        // Từ khóa tìm kiếm (keyword)
        if (!empty($filters['keyword'])) {
            $where[] = "name LIKE ?";
            $params[] = "%" . $filters['keyword'] . "%";
        }


        // Quốc gia (quocgia)
        if (!empty($filters['quocgia'])) {
            if (is_array($filters['quocgia'])) {
                $placeholders = implode(',', array_fill(0, count($filters['quocgia']), '?'));
                $where[] = "countries_slug IN ($placeholders)";
                $params = array_merge($params, $filters['quocgia']);
            } else {
                $where[] = "countries_slug = ?";
                $params[] = $filters['quocgia'];
            }
        }

    
        // Loại phim (type)
        if (!empty($filters['type'])) {
            if (is_array($filters['type'])) {
                $placeholders = implode(',', array_fill(0, count($filters['type']), '?'));
                $where[] = "type IN ($placeholders)";
                $params = array_merge($params, $filters['type']);
            } else {
                $where[] = "type = ?";
                $params[] = $filters['type'];
            }
        }

        // Năm phát hành (year)
        if (!empty($filters['year'])) {
            if (is_array($filters['year'])) {
                $placeholders = implode(',', array_fill(0, count($filters['year']), '?'));
                $where[] = "year IN ($placeholders)";
                $params = array_merge($params, $filters['year']);
            } else {
                $where[] = "year = ?";
                $params[] = $filters['year'];
            }
        }

        // Phiên bản (version) - nếu bạn có cột `version`
        if (!empty($filters['version'])) {
            if (is_array($filters['version'])) {
                $placeholders = implode(',', array_fill(0, count($filters['version']), '?'));
                $where[] = "lang IN ($placeholders)";
                $params = array_merge($params, $filters['version']);
            } else {
                $where[] = "lang = ?";
                $params[] = $filters['version'];
            }
        }

        // Lứa tuổi (age) - nếu bạn có cột `age`
        if (!empty($filters['age'])) {
            if (is_array($filters['age'])) {
                $placeholders = implode(',', array_fill(0, count($filters['age']), '?'));
                $where[] = "age IN ($placeholders)";
                $params = array_merge($params, $filters['age']);
            } else {
                $where[] = "age = ?";
                $params[] = $filters['age'];
            }
        }

        // Chiếu rạp
        if (isset($filters['chieurap'])) {
            $where[] = "chieurap = ?";
            $params[] = (int)$filters['chieurap'];
        }

        // Bắt đầu truy vấn
        $sql = "SELECT * FROM free_movies";

        if (!empty($where)) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }

        // Hỗ trợ sort_by và order
        $allowedSortFields = ['modified_time', 'title', 'views', 'year'];
        $allowedOrder = ['ASC', 'DESC'];

        $sortBy = $filters['sort_by'] ?? 'modified_time';
        $sortOrder = strtoupper($filters['order'] ?? 'DESC');

        if (!in_array($sortBy, $allowedSortFields)) {
            $sortBy = 'modified_time';
        }
        if (!in_array($sortOrder, $allowedOrder)) {
            $sortOrder = 'DESC';
        }

        $sql .= " ORDER BY $sortBy $sortOrder";

        // LIMIT + OFFSET
        $sql .= " LIMIT ? OFFSET ?";
        $params[] = (int)$limit;
        $params[] = (int)$offset;

        // Chuẩn bị và bind
        $stmt = $this->conn->prepare($sql);
        foreach ($params as $i => $value) {
            $paramType = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue($i + 1, $value, $paramType);
        }

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }


    public function getTopRated($limit = 10)
    {
        $sql = "SELECT * FROM free_movies ORDER BY vote_average DESC, modified_time DESC LIMIT :limit";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countMovies($filters = [])
    {
        $where = [];
        $params = [];

        if (!empty($filters['theloai'])) {
            $theloaiConditions = [];
            foreach ((array)$filters['theloai'] as $slug) {
                $theloaiConditions[] = "categories_slug LIKE ?";
                $params[] = "%" . $slug . "%";
            }
            if (!empty($theloaiConditions)) {
                $where[] = "(" . implode(" OR ", $theloaiConditions) . ")";
            }
        }

         // Từ khóa tìm kiếm (keyword)
        if (!empty($filters['keyword'])) {
            $where[] = "name LIKE ?";
            $params[] = "%" . $filters['keyword'] . "%";
        }

        // Quốc gia (quocgia)
        if (!empty($filters['quocgia'])) {
            if (is_array($filters['quocgia'])) {
                $placeholders = implode(',', array_fill(0, count($filters['quocgia']), '?'));
                $where[] = "countries_slug IN ($placeholders)";
                $params = array_merge($params, $filters['quocgia']);
            } else {
                $where[] = "countries_slug = ?";
                $params[] = $filters['quocgia'];
            }
        }

        // Loại phim (type)
        if (!empty($filters['type'])) {
            if (is_array($filters['type'])) {
                $placeholders = implode(',', array_fill(0, count($filters['type']), '?'));
                $where[] = "type IN ($placeholders)";
                $params = array_merge($params, $filters['type']);
            } else {
                $where[] = "type = ?";
                $params[] = $filters['type'];
            }
        }

        // Năm phát hành (year)
        if (!empty($filters['year'])) {
            if (is_array($filters['year'])) {
                $placeholders = implode(',', array_fill(0, count($filters['year']), '?'));
                $where[] = "year IN ($placeholders)";
                $params = array_merge($params, $filters['year']);
            } else {
                $where[] = "year = ?";
                $params[] = $filters['year'];
            }
        }

        // Phiên bản (version)
        if (!empty($filters['version'])) {
            if (is_array($filters['version'])) {
                $placeholders = implode(',', array_fill(0, count($filters['version']), '?'));
                $where[] = "lang IN ($placeholders)";
                $params = array_merge($params, $filters['version']);
            } else {
                $where[] = "lang = ?";
                $params[] = $filters['version'];
            }
        }

       

        // Chiếu rạp
        if (isset($filters['chieurap'])) {
            $where[] = "chieurap = ?";
            $params[] = (int)$filters['chieurap'];
        }

        // Bắt đầu truy vấn
        $sql = "SELECT COUNT(*) FROM free_movies";

        if (!empty($where)) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }

        // Chuẩn bị và bind
        $stmt = $this->conn->prepare($sql);
        foreach ($params as $i => $value) {
            $paramType = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue($i + 1, $value, $paramType);
        }

        $stmt->execute();
        return (int)$stmt->fetchColumn();
    }
}
