<?php
class MovieController {
    public function detail($slug) {
        require_once '../app/models/Movie.php';
        $movieModel = new Movie();
        $authorModel = new Author();
        $categoryModel = new Category();
        $countryModel = new Country();

        $movie = $movieModel->getBySlug($slug);
        $author = $movieModel->getBySlug($slug);
        $chapters = $movieModel->getChapters($slug);
        $categories_list = $categoryModel->getAll();
        
        usort($categories_list, function ($a, $b) {
            return strcoll($a['name'], $b['name']);
        });

        $countries_list = $countryModel->getAll();
        usort($countries_list, function ($a, $b) {
            return strcoll($a['name'], $b['name']);
        });
      
        if (!$movie) {
            header("HTTP/1.0 404 Not Found");
            echo "Movie not found";
            exit;
        }

        $pageCss = ['detail.css'];
        $pageJs = ['detail.js'];
        $pageTitle = $movie['name'] . ' - Xem phim hay chất lượng cao';
        $pageDescription = 'Xem phim ' . $movie['name'] . ' (' . $movie['year'] . ') thuộc thể loại ' . $movie['category_name'] . ', quốc gia ' . $movie['country_name'] . '. Phim chất lượng cao, nội dung hấp dẫn.';
        $pageKeywords = strtolower($movie['name']) . ', xem phim ' . strtolower($movie['name']) . ', phim ' . $movie['category_name'] . ', phim ' . $movie['country_name'];


        require_once '../app/views/layout/head.php';
        require_once '../app/views/layout/header.php';
        require_once '../app/views/detail.php';
        require_once '../app/views/layout/footer.php';
    }
    public function watch($movie_slug, $episode_slug) {
        require_once '../app/models/Movie.php';
        $movieModel = new Movie();
        $categoryModel = new Category();
        $countryModel = new Country();

        $movie = $movieModel->getBySlug($movie_slug);
        $chapters = $movieModel->getChapters($movie_slug);
        $chapter = $movieModel->getChapter($movie_slug, $episode_slug);
        $categories_list = $categoryModel->getAll();
        
        usort($categories_list, function ($a, $b) {
            return strcoll($a['name'], $b['name']);
        });

        $countries_list = $countryModel->getAll();
        usort($countries_list, function ($a, $b) {
            return strcoll($a['name'], $b['name']);
        });
      
        if (!$movie) {
            header("HTTP/1.0 404 Not Found");
            echo "Movie not found";
            exit;
        }

        $pageCss = ['watch.css'];
        $pageJs = ['watch.js'];
        $pageTitle ='Xem ' . $movie['name'] . ' - ' . $chapter['name'] . ' Full HD Vietsub | Xem phim chất lượng cao';
        $pageDescription = 'Xem ' . $movie['name'] . ' (' . $movie['year'] . ') full HD, Vietsub/Thuyết minh trực tuyến. Thể loại: ' . $movie['category_name'] . '. Quốc gia: ' . $movie['country_name'] . '. Xem nhanh, không quảng cáo.';
        $pageKeywords = strtolower($movie['name']) . ', xem phim ' . strtolower($movie['name']) . ', ' . $movie['name'] . ' vietsub, phim ' . $movie['category_name'] . ', phim ' . $movie['country_name'];


        require_once '../app/views/layout/head.php';
        require_once '../app/views/layout/header.php';
        require_once '../app/views/watch.php';
        require_once '../app/views/layout/footer.php';
    }
}
