<?php
// public/api/load-more.php

header('Content-Type: application/json; charset=utf-8');

try {
    // 1) Include config + Database + Model
    require_once __DIR__ . '/../../config/config.php';
    require_once __DIR__ . '/../../app/models/Database.php';
    require_once __DIR__ . '/../../app/models/Movie.php';

    // 2) Đọc các tham số
    $page   = isset($_GET['page'])   ? max(1, (int)$_GET['page']) : 1;
    $type   = isset($_GET['type'])   ? $_GET['type'] : 'single';   // 'single' hoặc 'series'
    $limit  = isset($_GET['limit'])  ? (int)$_GET['limit'] : 16;
    $offset = ($page - 1) * $limit;

    // 3) Xây filter (chỉ cần 'type' + sort + order; bỏ filter đếm)
    $filters = [
        'type'    => $type,
        'sort_by' => 'year',
        'order'   => 'DESC'
    ];
    // Nếu bạn muốn thêm bộ lọc khác, ví dụ:
    // if (!empty($_GET['theloai'])) $filters['theloai'] = $_GET['theloai'];
    // if (!empty($_GET['quocgia'])) $filters['quocgia'] = $_GET['quocgia'];
    // … v.v.

    // 4) Lấy dữ liệu
    $movieModel = new Movie();
    $movies     = $movieModel->getMovies($filters, $limit, $offset);

    // 5) Xác định has_more chỉ dựa vào số bản ghi trả về
    $has_more = count($movies) === $limit;

    // 6) Trả JSON
    echo json_encode([
        'success'  => true,
        'movies'   => $movies,
        'has_more' => $has_more
    ]);
} catch (\Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
