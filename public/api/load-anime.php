<?php
// public/api/load-anime.php

// Khởi động session / kết nối database nếu cần
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/models/Database.php';
require_once __DIR__ . '/../../app/models/Movie.php';

// Lấy tham số page từ URL
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 16;
$offset = ($page - 1) * $limit;

// Lấy dữ liệu từ model
$movieModel = new Movie();
$movies = $movieModel->getMovies([
    'sort_by' => 'year',
    'order'   => 'DESC'
], $limit, $offset);

// Định dạng trả về JSON
header('Content-Type: application/json; charset=utf-8');
echo json_encode([
  'movies'   => $movies,
  'has_more' => count($movies) === $limit
]);
