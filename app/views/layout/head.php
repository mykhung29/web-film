<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- SEO Meta -->
    <title><?= $pageTitle ?? 'PhimHay - Trang chủ xem phim' ?></title>
    <meta name="description" content="<?= $pageDescription ?? 'Trang xem phim chất lượng cao, nhanh và miễn phí.' ?>">
    <meta name="keywords" content="<?= $pageKeywords ?? 'xem phim, phim hay, phim mới, phim hành động, phim tình cảm' ?>">
    <link rel="canonical" href="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">

    <!-- Open Graph (Facebook, Zalo, etc.) -->
    <meta property="og:title" content="<?= $pageTitle ?? 'PhimHay' ?>">
    <meta property="og:description" content="<?= $pageDescription ?? '' ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
    <meta property="og:image" content="<?= $pageImage ?? '/assets/images/logo.png' ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $pageTitle ?? 'PhimHay' ?>">
    <meta name="twitter:description" content="<?= $pageDescription ?? '' ?>">
    <meta name="twitter:image" content="<?= $pageImage ?? '/assets/images/logo.png' ?>">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <script src="/assets/js/tailwind.js"></script>

    <!-- Dynamic CSS -->
    <?php if (!empty($pageCss)): ?>
        <?php foreach ((array)$pageCss as $css): ?>
            <link rel="stylesheet" href="/assets/css/<?= htmlspecialchars($css) ?>">
        <?php endforeach; ?>
    <?php endif; ?>

    <link rel="stylesheet" href="/assets/css/layout.css" />
</head>

<body class="pattern-bg">