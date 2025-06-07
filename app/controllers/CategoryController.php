<?php
class CategoryController {
    public function index($slug) {
        require_once '../app/models/Movie.php';
        require_once '../app/models/Category.php';

        $movieModel = new Movie();
        $categoryModel = new Category();
        $countryModel = new Country();

        // Trang hiện tại
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $limit = 24;
        $offset = ($page - 1) * $limit;

        // Chuẩn bị bộ lọc
        $filters = ['theloai' => $slug];

        if (!empty($_GET['quocgia'])) {
            
         $filters['quocgia'] = is_array($_GET['quocgia']) ? $_GET['quocgia'] : explode(',', $_GET['quocgia']);
        }

        if (!empty($_GET['year'])) {
            $filters['year'] = is_array($_GET['year']) ? $_GET['year'] : explode(',', $_GET['year']);
        }

        if (!empty($_GET['version'])) {
            $filters['version'] = is_array($_GET['version']) ? $_GET['version'] : explode(',', $_GET['version']);
        }

        // echo "<pre>";
        // print_r($filters);
        // echo "</pre>";

        // Sort
        $filters['sort_by'] = $_GET['sort_by'] ?? 'year';
        $filters['order'] = $_GET['order'] ?? 'DESC';

        // Lấy danh sách phim theo bộ lọc
        $movies = $movieModel->getMovies($filters, $limit, $offset);

        // Đếm tổng để phân trang
        $total = $movieModel->countMovies($filters);
        
        $totalPages = ceil($total / $limit);

        // Lấy thông tin thể loại
        $category = $categoryModel->getBySlug($slug);
        $categories_list = $categoryModel->getAll();
        
        usort($categories_list, function ($a, $b) {
            return strcoll($a['name'], $b['name']);
        });

        //Lây quốc gia
        $countries_list = $countryModel->getAll();
            usort($countries_list, function ($a, $b) {
                return strcoll($a['name'], $b['name']);
        });
        

        // Gửi tới view
        $pageCss = ['category.css'];
        $pageJs = ['category.js'];
        $pageTitle = 'Phim ' . $category['name'] . ' - Xem phim hay chất lượng cao';
        $pageDescription = 'Xem phim ' . $category['name'] . ' chất lượng cao, nhanh và miễn phí. Cập nhật phim mới nhất thuộc thể loại ' . $category['name'] . '.';
        $pageKeywords = strtolower($category['name']) . ', xem phim ' . strtolower($category['name']) . ', phim ' . $category['name'];

        require_once '../app/views/layout/head.php';
        require_once '../app/views/layout/header.php';
        require_once '../app/views/category.php';
        require_once '../app/views/layout/footer.php';
    }
}
