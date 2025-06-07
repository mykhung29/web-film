<?php
class SearchController {
    public function index($keyword) {
        require_once '../app/models/Movie.php';
        require_once '../app/models/Category.php';
        require_once '../app/models/Country.php';

        $movieModel = new Movie();
        $categoryModel = new Category();
        $countryModel = new Country();

        $keyword = str_replace('-', ' ', $keyword);

        // Trang hiện tại
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $limit = 24;
        $offset = ($page - 1) * $limit;

        // Bộ lọc
        $filters = [];

        if (!empty($_GET['theloai'])) {
            $filters['theloai'] = is_array($_GET['theloai']) ? $_GET['theloai'] : explode(',', $_GET['theloai']);
        }

        if (!empty($_GET['quocgia'])) {
            $filters['quocgia'] = is_array($_GET['quocgia']) ? $_GET['quocgia'] : explode(',', $_GET['quocgia']);
        }

        if (!empty($_GET['year'])) {
            $filters['year'] = is_array($_GET['year']) ? $_GET['year'] : explode(',', $_GET['year']);
        }

        if (!empty($_GET['version'])) {
            $filters['version'] = is_array($_GET['version']) ? $_GET['version'] : explode(',', $_GET['version']);
        }

        // Sort
        $filters['sort_by'] = $_GET['sort_by'] ?? 'year';
        $filters['order'] = $_GET['order'] ?? 'DESC';

        // Gắn keyword vào filter nếu có
        $filters['keyword'] = $keyword;

        // Lấy phim theo bộ lọc và keyword
        $movies_search = $movieModel->getMovies($filters, $limit, $offset);
        $total = $movieModel->countMovies($filters);
        $totalPages = ceil($total / $limit);

        // Dữ liệu khác
       $categories_list = $categoryModel->getAll();
        
        usort($categories_list, function ($a, $b) {
            return strcoll($a['name'], $b['name']);
        });

        //Lây quốc gia
        $countries_list = $countryModel->getAll();
            usort($countries_list, function ($a, $b) {
                return strcoll($a['name'], $b['name']);
        });

        $pageCss = ['search.css'];
        $pageJs = ['search.js'];
        $pageTitle = 'Tìm kiếm: ' . htmlspecialchars($keyword) . ' - Xem phim hay chất lượng cao';
        $pageDescription = 'Kết quả tìm kiếm cho: ' . htmlspecialchars($keyword) . '. Xem phim chất lượng cao, nhanh và miễn phí. Cập nhật phim mới nhất.';
        $pageKeywords = htmlspecialchars($keyword) . ', xem phim ' . htmlspecialchars($keyword) . ', phim ' . htmlspecialchars($keyword);

        require_once '../app/views/layout/head.php';
        require_once '../app/views/layout/header.php';
        require_once '../app/views/search.php';
        require_once '../app/views/layout/footer.php';
    }
}
