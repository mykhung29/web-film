<?php
class HomeController {
    public function index() {
        require_once '../app/models/Movie.php';
        require_once '../app/models/Category.php';
        require_once '../app/models/Country.php';
        
        $movieModel = new Movie();
        $categoryModel = new Category();
        $countryModel = new Country();
        $categories_list = $categoryModel->getAll();
        
        usort($categories_list, function ($a, $b) {
            return strcoll($a['name'], $b['name']);
        });

        $countries_list = $countryModel->getAll();
        usort($countries_list, function ($a, $b) {
            return strcoll($a['name'], $b['name']);
        });



        $movies_slider = $movieModel->getMovies([
            'sort_by'   => 'year',
            'order'     => 'DESC',
        ], 5, 0);
       
        $movies_top = $movieModel->getTopRated();
        $movies_bo = $movieModel->getMovies([
            'type' => 'series',
        ], 16, 0);  
        $movies_le = $movieModel->getMovies([
            'type' => 'single',
        ], 16, 0);   
        $movies_hanh_dong = $movieModel->getByCategorySlug('hanh-dong');
        $movies_vien_tuong = $movieModel->getByCategorySlug('vien-tuong');
        $movies_kinh_di = $movieModel->getByCategorySlug('kinh-di');
        $movies_chieu_rap = $movieModel->getMovies([
            'chieurap' => '1',
        ]);    
        $movies_vo_thuat = $movieModel->getByCategorySlug('vo-thuat');

        $movies_hoathinh_slider = $movieModel->getMovies([
            'type' => 'hoathinh',
            'sort_by'   => 'year',
            'order'     => 'DESC',
        ], 10, 0);

        $movies_hoat_hinh_my = $movieModel->getMovies([
            'type' => 'hoathinh',
            'quocgia'   => 'au-my'
        ]);
        $movies_hoat_hinh_nhat = $movieModel->getMovies([
            'type' => 'hoathinh',
            'quocgia'   => 'nhat-ban'
        ]);

        $movies_hoat_hinh_rap = $movieModel->getMovies([
            'type' => 'hoathinh',
            'chieurap' => '1',
        ]);

        $movies_new = $movieModel->getMovies([
            'sort_by'   => 'modified_time',
            'order'     => 'DESC',
        ], 16, 0);

        $pageCss = ['index.css'];
        $pageJs = ['index.js'];
        $pageTitle = 'Trang chủ xem phim';
        $pageDescription = 'Trang chủ xem phim với kho phim đa dạng và chất lượng cao. Xem phim mới nhất, phim hot, phim hoạt hình và nhiều thể loại khác.';
        $pageKeywords = 'xem phim, phim mới, phim hot, phim hoạt hình, thể loại phim';


      
        require_once '../app/views/layout/head.php';
        require_once '../app/views/layout/header.php';
        require_once '../app/views/home.php';
        require_once '../app/views/layout/footer.php';
    }
}
