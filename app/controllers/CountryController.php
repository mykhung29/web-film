<?php
class CountryController {
    public function index($slug) {
        require_once '../app/models/Movie.php';
        require_once '../app/models/Category.php';
        require_once '../app/models/Country.php';

        $movieModel = new Movie();
        $categoryModel = new Category();
        $countryModel = new Country();

        // Trang hiện tại
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $limit = 24;
        $offset = ($page - 1) * $limit;

        // Chuẩn bị bộ lọc
        $filters = ['quocgia' => $slug];

        if (!empty($_GET['theloai'])) {
            $filters['theloai'] = is_array($_GET['theloai']) ? $_GET['theloai'] : explode(',', $_GET['theloai']);
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

        // Lấy danh sách phim theo bộ lọc
        $movies = $movieModel->getMovies($filters, $limit, $offset);

        // Đếm tổng để phân trang
        $total = $movieModel->countMovies($filters);
        $totalPages = ceil($total / $limit);

        // Lấy thông tin quốc gia
        $taxonomy_info  = $countryModel->getBySlug($slug);
        $countries_list = $countryModel->getAll();

        usort($countries_list, function ($a, $b) {
            return strcoll($a['name'], $b['name']);
        });

        // Lấy danh sách thể loại
        $categories_list = $categoryModel->getAll();
        usort($categories_list, function ($a, $b) {
            return strcoll($a['name'], $b['name']);
        });

       // Gửi tới view
        $pageCss = ['category.css'];
        $pageJs = ['category.js'];
        $pageTitle = 'Phim ' . $taxonomy_info ['name'] . ' - Xem phim hay chất lượng cao';
        $pageDescription = 'Xem phim ' . $taxonomy_info ['name'] . ' chất lượng cao, nhanh và miễn phí. Cập nhật phim mới nhất sản xuất tại ' . $taxonomy_info ['name'] . '.';
        $pageKeywords = strtolower($taxonomy_info ['name']) . ', xem phim ' . strtolower($taxonomy_info ['name']) . ', phim ' . $taxonomy_info ['name'];

        require_once '../app/views/layout/head.php';
        require_once '../app/views/layout/header.php';
        require_once '../app/views/category.php';
        require_once '../app/views/layout/footer.php';
    }
}
