<main>
    <!-- Featured Movies Slider -->
    <section class="featured-slider mb-16" data-aos="fade-up">
        <div class="swiper featuredSwiper h-fit overflow-hidden">
            <div class="swiper-wrapper">

                <?php foreach ($movies_slider as $movie): ?>
                    <div class="swiper-slide relative" data-post="<?php echo htmlspecialchars($movie['poster_url']) ?>">
                        <div class="relative w-full aspect-[16/7] hidden lg:block">
                            <img src="<?php echo $movie['thumb_url'] ?>" alt="<?php echo $movie['name'] ?>" class="w-full h-full object-cover" />
                            <!-- Lớp phủ chấm liti -->
                            <div class="absolute inset-0 z-10 pointer-events-none bg-[radial-gradient(gray_1px,transparent_2px)] bg-[length:5px_5px] opacity-10"></div>
                        </div>

                        <div class="relative w-full h-full lg:hidden">
                            <img src="<?php echo $movie['poster_url'] ?>" alt="<?php echo $movie['name'] ?>" class="w-full h-full object-cover" />
                            <!-- Lớp phủ chấm liti -->
                            <div class="absolute inset-0 z-10 pointer-events-none bg-[radial-gradient(gray_1px,transparent_2px)] bg-[length:5px_5px] opacity-10"></div>
                        </div>

                        <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-darker to-transparent">
                            <div class="mx-auto">
                                <div class="max-w-2xl">
                                    <span
                                        class="hidden lg:inline-block px-3 py-1 bg-primary text-white text-sm font-medium rounded-full mb-4">Phim
                                        Đặc Sắc</span>

                                    <h2 class="text-3xl md:text-4xl font-bold mb-4 line-clamp-2">
                                        <?php echo $movie['name'] ?>
                                    </h2>

                                    <p class="text-light mb-6 text-md hidden lg:block">
                                        <?php echo $movie['content'] ?>
                                    </p>

                                    <div class="flex flex-wrap gap-4 mb-6">
                                        <div class="flex items-center">
                                            <span class="text-primary mr-1"><i class="fas fa-star"></i></span>
                                            <span class="font-bold">9.8</span>
                                            <span class="text-gray-400 ml-1">/10</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-gray-400 mr-1"><i class="far fa-clock"></i></span>
                                            <span><?php echo $movie['time'] ?></span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-gray-400 mr-1"><i class="far fa-calendar-alt"></i></span>
                                            <span><?php echo $movie['year'] ?></span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-gray-400 mr-1"><i class="fas fa-film"></i></span>
                                            <span><?php echo $movie['quality'] ?></span>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap gap-3 mb-8 hidden hidden lg:block">
                                        <?php
                                        $categories = explode(',', $movie['categories']); // Tách chuỗi bằng dấu phẩy
                                        $categories = array_slice($categories, 0, 4);     // Lấy tối đa 4 thể loại

                                        foreach ($categories as $cat) {
                                            $cat = trim($cat); // Loại bỏ khoảng trắng
                                            echo '<a href="#" class="bg-dark hover:bg-dark/80 px-3 py-1 rounded-full text-sm transition-colors mr-1">'
                                                . htmlspecialchars($cat) .
                                                '</a>';
                                        }
                                        ?>
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <a href="/xem/<?php echo $movie['slug'] ?>/<?php echo $movie['first_chap'] ?>"
                                            class="hidden lg:flex btn-action bg-primary hover:bg-primary/90 text-white font-medium py-3 px-6 rounded-full items-center">
                                            <i class="fas fa-play mr-2"></i> Xem ngay
                                        </a>

                                        <a href="/xem/<?php echo $movie['slug'] ?>"
                                            class="lg:hidden btn-action bg-primary hover:bg-primary/90 text-white font-medium p-6 rounded-full flex items-center w-12 h-12 justify-center">
                                            <i class="fas fa-play"></i>
                                        </a>

                                        <a href="/chi-tiet/<?php echo $movie['slug'] ?>"
                                            class="hidden lg:block btn-action glass hover:bg-white/10 text-white font-medium py-3 px-6 rounded-full">
                                            Chi tiết
                                        </a>
                                        <div
                                            class="flex justify-center items-center lg:hidden border border-white/10 bg-white/5 hover:bg-white/10 text-white font-medium p-2 rounded-full">
                                            <a href="/chi-tiet/<?php echo $movie['slug'] ?>"" class=" px-4 text-gray-400 hover:text-white transition-colors">
                                                <i class="fas fa-info"></i>
                                            </a>
                                            <!-- love icon -->
                                            <a href="#" class="px-4 text-gray-400 hover:text-white transition-colors">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Categories -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <h2 class="text-2xl font-bold mb-6 flex items-center">
            <span class="w-2 h-6 bg-primary mr-2"></span>Thể Loại
        </h2>
        <!-- Swiper Container -->
        <div class="swiper categorySwiper">
            <div class="swiper-wrapper">
                <?php foreach ($categories_list as $category): ?>
                    <div class="swiper-slide">
                        <a href="/the-loai/<?= $category['slug'] ?>"
                            class="bg-darker border border-primary hover:bg-primary transition-all duration-300 rounded-lg p-4 text-center block">
                            <i class="fas <?= $category['icon'] ?> text-2xl mb-2"></i>
                            <p><?= $category['name'] ?></p>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Mũi tên điều hướng -->
            <div class="swiper-button-prev text-primary"></div>
            <div class="swiper-button-next text-primary"></div>
        </div>

    </section>

    <!-- Search -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <div>
            <h2 class="text-2xl font-bold mb-6 flex items-center">
                <span class="w-2 h-6 bg-primary mr-2"></span>Tìm kiếm
            </h2>
        </div>
        <div class="relative">
            <div class="flex items-center bg-darker border border-primary rounded-full overflow-hidden p-2">
                <input type="text" id="search-input" placeholder="Tìm kiếm phim..."
                    class="w-full bg-transparent border-none outline-none px-4 py-2 text-light" />
                <button class="bg-primary text-white p-2 rounded-full w-12 h-12">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div id="search-results"
                class="search-results bg-dark absolute w-full mt-2 bg-darker rounded-xl z-10 shadow-lg">
                <!-- Search results will be populated here -->
            </div>
        </div>
    </section>

    <!-- Top 10 Hot Movies -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <div class="px-4">
            <h2 class="text-2xl font-bold mb-6 flex items-center">
                <span class="w-2 h-6 bg-primary mr-2"></span>Top 10 Phim Hot
            </h2>
        </div>
        <div class="swiper topSwiper">
            <div class="swiper-wrapper">
                <?php $i = 1; ?>
                <?php foreach ($movies_top as $movie): ?>
                    <div class="swiper-slide">
                        <div class="relative card overflow-hidden">
                            <span
                                class="absolute top-0 left-0 bg-primary text-white text-2xl font-bold w-12 h-12 flex items-center justify-center z-20"><?php echo $i ?></span>
                            <a href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                <img src="<?php echo $movie['poster_url'] ?>" alt="<?php echo $movie['name'] ?>"
                                    class="w-full aspect-[3/4] object-cover rounded-lg" />
                            </a>
                            <div class="p-2 text-center">
                                <a href="/chi-tiet/<?php echo $movie['slug'] ?>">
                                    <h3 class="font-bold text-lg line-clamp-1"><?php echo $movie['name'] ?></h3>
                                </a><a href="/chi-tiet/<?php echo $movie['slug'] ?>">
                                    <p class="text-sm text-gray-400 line-clamp-1"><?php echo $movie['origin_name'] ?></p>
                                </a>
                            </div>
                            <!-- Tooltip on hover -->
                            <div class="movie-tooltip rounded-xl">
                                <h3 class="font-semibold text-lg mb-1 line-clamp-2"><?php echo $movie['name'] ?></h3>
                                <p class="text-sm text-gray-300 mb-2 line-clamp-2"><?php echo $movie['origin_name'] ?></p>
                                <div class="mb-1">
                                    <span class="text-primary mr-1"><i class="fas fa-star"></i></span>
                                    <span>9.8</span>
                                </div>

                                <div class="flex flex-wrap gap-2 mb-3">
                                    <?php
                                    $categories = explode(',', $movie['categories']); // Tách chuỗi bằng dấu phẩy
                                    $categories = array_slice($categories, 0, 4);     // Lấy tối đa 4 thể loại

                                    foreach ($categories as $cat) {
                                        $cat = trim($cat); // Loại bỏ khoảng trắng
                                        echo '<a href="#" class="bg-darker text-xs px-2 py-1 rounded">'
                                            . htmlspecialchars($cat) .
                                            '</a>';
                                    }
                                    ?>

                                </div>
                                <p class="text-sm mb-3">
                                    <i class="far fa-clock mr-1"></i> <?php echo $movie['time'] ?>
                                </p>
                                <div class="flex gap-2 mb-4">
                                    <button class="action-btn" onclick="toggleLike(this)">
                                        <i class="far fa-heart"></i>
                                    </button>
                                    <button class="action-btn" onclick="toggleSave(this)">
                                        <i class="far fa-bookmark"></i>
                                    </button>
                                    <button class="action-btn" onclick="shareMovie('Đế Chế Rồng')">
                                        <i class="far fa-share-square"></i>
                                    </button>
                                </div>
                                <div class="flex gap-2">
                                    <a href="/xem/<?php echo $movie['slug'] ?>/<?php echo $movie['first_chap'] ?>"
                                        class="bg-primary hover:bg-opacity-80 text-white text-sm font-bold py-2 px-4 rounded-full transition">Xem
                                        ngay</a>
                                    <a href="/chi-tiet/<?php echo $movie['slug'] ?>"
                                        class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-sm font-bold py-2 px-4 rounded-full transition">Chi
                                        tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $i++;
                endforeach; ?>


            </div>
            <div class="swiper-button-next text-primary"></div>
            <div class="swiper-button-prev text-primary"></div>
        </div>
    </section>

    <!-- Movies by Category -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold flex items-center">
                <span class="w-2 h-6 bg-primary mr-2"></span>Phim Theo Danh Mục
            </h2>
            <div class="flex gap-4">
                <button id="series-btn" class="px-4 py-2 rounded-full bg-primary text-white" data-page="1"
                    data-type="series">
                    Phim Bộ
                </button>
                <button id="movie-btn" class="px-4 py-2 rounded-full bg-darker text-white">
                    Phim Lẻ
                </button>
            </div>
        </div>
        <div id="series-container">

            <div class="swiper genreSwiper">
                <div class="swiper-wrapper">

                    <?php foreach ($movies_bo as $movie): ?>
                        <?php //print_r($movie); 
                        ?>

                        <div class="swiper-slide">
                            <a href="/chi-tiet/<?php echo $movie['slug'] ?>">
                                <div class="card rounded-xl overflow-hidden">
                                    <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                        <img src="<?php echo $movie['poster_url'] ?>" alt="<?php echo $movie['name'] ?>"
                                            class="w-full aspect-[3/4] object-cover rounded-lg" />
                                    </div>
                                    <div class="p-2 text-center">
                                        <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                            <h3 class="font-bold text-lg line-clamp-1"><?php echo $movie['name'] ?></h3>
                                            <p class="text-sm text-gray-400 line-clamp-1"><?php echo $movie['origin_name'] ?></p>
                                        </div>
                                    </div>
                                    <!-- Tooltip on hover -->
                                    <div class="movie-tooltip rounded-xl">
                                        <h3 class="font-semibold text-lg mb-1 line-clamp-2"><?php echo $movie['name'] ?></h3>
                                        <p class="text-sm text-gray-300 mb-2 line-clamp-2"><?php echo $movie['origin_name'] ?></p>
                                        <div class="mb-1">
                                            <span class="text-primary mr-1"><i class="fas fa-star"></i></span>
                                            <span>9.2</span>
                                        </div>
                                        <div class="flex flex-wrap gap-2 mb-3">
                                            <?php
                                            $categories = explode(',', $movie['categories']); // Tách theo dấu phẩy
                                            $categories = array_slice($categories, 0, 2); // Lấy 2 thể loại đầu tiên

                                            foreach ($categories as $cat) {
                                                $cat = trim($cat); // Xóa khoảng trắng dư
                                                echo '<span class="bg-darker text-xs px-2 py-1 rounded mr-1">' . htmlspecialchars($cat) . '</span>';
                                            }
                                            ?>
                                        </div>
                                        <p class="text-sm mb-3">
                                            <i class="far fa-clock mr-1"></i> <?php echo $movie['time'] ?>
                                        </p>
                                        <div class="flex gap-2 mb-4">
                                            <button class="action-btn" onclick="toggleLike(this)">
                                                <i class="far fa-heart"></i>
                                            </button>
                                            <button class="action-btn" onclick="toggleSave(this)">
                                                <i class="far fa-bookmark"></i>
                                            </button>
                                            <button class="action-btn" onclick="shareMovie('Chiến Binh Bất Tử')">
                                                <i class="far fa-share-square"></i>
                                            </button>
                                        </div>
                                        <div class="flex gap-2">
                                            <div href="/xem/<?php echo $movie['slug'] ?>"
                                                class="bg-primary hover:bg-opacity-80 text-white text-sm font-bold py-2 px-4 rounded-full transition">Xem
                                                ngay</div>
                                            <div href="/chi-tiet/<?php echo $movie['slug'] ?>"
                                                class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-sm font-bold py-2 px-4 rounded-full transition">Chi
                                                tiết</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php endforeach; ?>

                </div>
                <div class="swiper-button-next text-primary"></div>
                <div class="swiper-button-prev text-primary"></div>
            </div>

        </div>
        <div id="movie-container" class="hidden">
            <div class="swiper genreSwiper">
                <div class="swiper-wrapper">

                    <?php foreach ($movies_le as $movie): ?>
                        <?php //print_r($movie); 
                        ?>

                        <div class="swiper-slide">
                            <a href="/chi-tiet/<?php echo $movie['slug'] ?>">
                                <div class="card rounded-xl overflow-hidden">
                                    <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                        <img src="<?php echo $movie['poster_url'] ?>" alt="<?php echo $movie['name'] ?>"
                                            class="w-full aspect-[3/4] object-cover rounded-lg" />
                                    </div>
                                    <div class="p-2 text-center">
                                        <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                            <h3 class="font-bold text-lg line-clamp-1"><?php echo $movie['name'] ?></h3>
                                            <p class="text-sm text-gray-400 line-clamp-1"><?php echo $movie['origin_name'] ?></p>
                                        </div>
                                    </div>
                                    <!-- Tooltip on hover -->
                                    <div class="movie-tooltip rounded-xl">
                                        <h3 class="font-semibold text-lg mb-1 line-clamp-2"><?php echo $movie['name'] ?></h3>
                                        <p class="text-sm text-gray-300 mb-2 line-clamp-2"><?php echo $movie['origin_name'] ?></p>
                                        <div class="mb-1">
                                            <span class="text-primary mr-1"><i class="fas fa-star"></i></span>
                                            <span>9.2</span>
                                        </div>
                                        <div class="flex flex-wrap gap-2 mb-3">
                                            <?php
                                            $categories = explode(',', $movie['categories']); // Tách theo dấu phẩy
                                            $categories = array_slice($categories, 0, 2); // Lấy 2 thể loại đầu tiên

                                            foreach ($categories as $cat) {
                                                $cat = trim($cat); // Xóa khoảng trắng dư
                                                echo '<span class="bg-darker text-xs px-2 py-1 rounded mr-1">' . htmlspecialchars($cat) . '</span>';
                                            }
                                            ?>
                                        </div>
                                        <p class="text-sm mb-3">
                                            <i class="far fa-clock mr-1"></i> <?php echo $movie['time'] ?>
                                        </p>
                                        <div class="flex gap-2 mb-4">
                                            <button class="action-btn" onclick="toggleLike(this)">
                                                <i class="far fa-heart"></i>
                                            </button>
                                            <button class="action-btn" onclick="toggleSave(this)">
                                                <i class="far fa-bookmark"></i>
                                            </button>
                                            <button class="action-btn" onclick="shareMovie('Chiến Binh Bất Tử')">
                                                <i class="far fa-share-square"></i>
                                            </button>
                                        </div>
                                        <div class="flex gap-2">
                                            <div href="/xem/<?php echo $movie['slug'] ?>"
                                                class="bg-primary hover:bg-opacity-80 text-white text-sm font-bold py-2 px-4 rounded-full transition">Xem
                                                ngay</div>
                                            <div href="/chi-tiet/<?php echo $movie['slug'] ?>"
                                                class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-sm font-bold py-2 px-4 rounded-full transition">Chi
                                                tiết</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php endforeach; ?>

                </div>
                <div class="swiper-button-next text-primary"></div>
                <div class="swiper-button-prev text-primary"></div>
            </div>
        </div>

    </section>

    <!-- Hành Động Section -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <div class="px-4 flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold flex items-center">
                <span class="w-2 h-6 bg-primary mr-2"></span>
                Phim Hành Động
            </h2>

            <!-- Nút Xem tất cả -->
            <a href="category.html?genre=hanh-dong"
                class="flex items-center text-sm text-green-400 hover:text-green-300 transition">
                Xem tất cả
                <i class="fas fa-chevron-right ml-1 text-xs"></i>
            </a>
        </div>
        <div class="swiper genreSwiper">
            <div class="swiper-wrapper">

                <?php foreach ($movies_hanh_dong as $movie): ?>
                    <?php //print_r($movie); 
                    ?>

                    <div class="swiper-slide">
                        <a href="/chi-tiet/<?php echo $movie['slug'] ?>">
                            <div class="card rounded-xl overflow-hidden">
                                <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                    <img src="<?php echo $movie['poster_url'] ?>" alt="<?php echo $movie['name'] ?>"
                                        class="w-full aspect-[3/4] object-cover rounded-lg" />
                                </div>
                                <div class="p-2 text-center">
                                    <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                        <h3 class="font-bold text-lg line-clamp-1"><?php echo $movie['name'] ?></h3>
                                        <p class="text-sm text-gray-400 line-clamp-1"><?php echo $movie['origin_name'] ?></p>
                                    </div>
                                </div>
                                <!-- Tooltip on hover -->
                                <div class="movie-tooltip rounded-xl">
                                    <h3 class="font-semibold text-lg mb-1 line-clamp-2"><?php echo $movie['name'] ?></h3>
                                    <p class="text-sm text-gray-300 mb-2 line-clamp-2"><?php echo $movie['origin_name'] ?></p>
                                    <div class="mb-1">
                                        <span class="text-primary mr-1"><i class="fas fa-star"></i></span>
                                        <span>9.2</span>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <?php
                                        $allCategories = explode(',', $movie['categories']); // Tách theo dấu phẩy
                                        $categories = array_slice($allCategories, 0, 2); // Lấy 2 thể loại đầu tiên

                                        foreach ($categories as $cat) {
                                            $cat = trim($cat); // Xóa khoảng trắng dư thừa
                                            echo '<span class="bg-darker text-xs px-2 py-1 rounded mr-1">' . htmlspecialchars($cat) . '</span>';
                                        }

                                        ?>
                                    </div>

                                    <p class="text-sm mb-3">
                                        <i class="far fa-clock mr-1"></i> <?php echo $movie['time'] ?>
                                    </p>
                                    <div class="flex gap-2 mb-4">
                                        <button class="action-btn" onclick="toggleLike(this)">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="action-btn" onclick="toggleSave(this)">
                                            <i class="far fa-bookmark"></i>
                                        </button>
                                        <button class="action-btn" onclick="shareMovie('Chiến Binh Bất Tử')">
                                            <i class="far fa-share-square"></i>
                                        </button>
                                    </div>
                                    <div class="flex gap-2">
                                        <div href="/xem/<?php echo $movie['slug'] ?>"
                                            class="bg-primary hover:bg-opacity-80 text-white text-sm font-bold py-2 px-4 rounded-full transition">Xem
                                            ngay</div>
                                        <div href="/chi-tiet/<?php echo $movie['slug'] ?>"
                                            class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-sm font-bold py-2 px-4 rounded-full transition">Chi
                                            tiết</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>

            </div>
            <div class="swiper-button-next text-primary"></div>
            <div class="swiper-button-prev text-primary"></div>
        </div>
    </section>

    <!-- Viễn tưởng Section  -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <div class="px-4 flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold flex items-center">
                <span class="w-2 h-6 bg-primary mr-2"></span>
                Phim Viễn Tưởng
            </h2>

            <!-- Nút Xem tất cả -->
            <a href="category.html?genre=hanh-dong"
                class="flex items-center text-sm text-green-400 hover:text-green-300 transition">
                Xem tất cả
                <i class="fas fa-chevron-right ml-1 text-xs"></i>
            </a>
        </div>
        <div class="swiper genreSwiper">
            <div class="swiper-wrapper">
                <?php foreach ($movies_vien_tuong as $movie): ?>
                    <div class="swiper-slide">
                        <a href="/chi-tiet/<?php echo $movie['slug'] ?>">
                            <div class="card rounded-xl overflow-hidden">
                                <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                    <img src="<?php echo $movie['poster_url'] ?>" alt="<?php echo $movie['name'] ?>"
                                        class="w-full aspect-[3/4] object-cover rounded-lg" />
                                </div>
                                <div class="p-2 text-center">
                                    <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                        <h3 class="font-bold text-lg line-clamp-1"><?php echo $movie['name'] ?></h3>
                                        <p class="text-sm text-gray-400 line-clamp-1"><?php echo $movie['origin_name'] ?></p>
                                    </div>
                                </div>
                                <!-- Tooltip on hover -->
                                <div class="movie-tooltip rounded-xl">
                                    <h3 class="font-semibold text-lg mb-1 line-clamp-2"><?php echo $movie['name'] ?></h3>
                                    <p class="text-sm text-gray-300 mb-2 line-clamp-2"><?php echo $movie['origin_name'] ?></p>
                                    <div class="mb-1">
                                        <span class="text-primary mr-1"><i class="fas fa-star"></i></span>
                                        <span>9.2</span>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <?php
                                        $allCategories = explode(',', $movie['categories']); // Tách theo dấu phẩy
                                        $categories = array_slice($allCategories, 0, 2); // Lấy 2 thể loại đầu tiên

                                        foreach ($categories as $cat) {
                                            $cat = trim($cat); // Xóa khoảng trắng dư thừa
                                            echo '<span class="bg-darker text-xs px-2 py-1 rounded mr-1">' . htmlspecialchars($cat) . '</span>';
                                        }


                                        ?>
                                    </div>

                                    <p class="text-sm mb-3">
                                        <i class="far fa-clock mr-1"></i> <?php echo $movie['time'] ?>
                                    </p>
                                    <div class="flex gap-2 mb-4">
                                        <button class="action-btn" onclick="toggleLike(this)">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="action-btn" onclick="toggleSave(this)">
                                            <i class="far fa-bookmark"></i>
                                        </button>
                                        <button class="action-btn" onclick="shareMovie('Chiến Binh Bất Tử')">
                                            <i class="far fa-share-square"></i>
                                        </button>
                                    </div>
                                    <div class="flex gap-2">
                                        <div href="/xem/<?php echo $movie['slug'] ?>"
                                            class="bg-primary hover:bg-opacity-80 text-white text-sm font-bold py-2 px-4 rounded-full transition">Xem
                                            ngay</div>
                                        <div href="/chi-tiet/<?php echo $movie['slug'] ?>"
                                            class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-sm font-bold py-2 px-4 rounded-full transition">Chi
                                            tiết</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next text-primary"></div>
            <div class="swiper-button-prev text-primary"></div>
        </div>
    </section>

    <!-- Kinh dị Section  -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <div class="px-4 flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold flex items-center">
                <span class="w-2 h-6 bg-primary mr-2"></span>
                Phim Kinh Dị
            </h2>

            <!-- Nút Xem tất cả -->
            <a href="category.html?genre=hanh-dong"
                class="flex items-center text-sm text-green-400 hover:text-green-300 transition">
                Xem tất cả
                <i class="fas fa-chevron-right ml-1 text-xs"></i>
            </a>
        </div>
        <div class="swiper genreSwiper">
            <div class="swiper-wrapper">
                <?php foreach ($movies_kinh_di as $movie): ?>


                    <div class="swiper-slide">
                        <a href="/chi-tiet/<?php echo $movie['slug'] ?>">
                            <div class="card rounded-xl overflow-hidden">
                                <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                    <img src="<?php echo $movie['poster_url'] ?>" alt="<?php echo $movie['name'] ?>"
                                        class="w-full aspect-[3/4] object-cover rounded-lg" />
                                </div>
                                <div class="p-2 text-center">
                                    <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                        <h3 class="font-bold text-lg line-clamp-1"><?php echo $movie['name'] ?></h3>
                                        <p class="text-sm text-gray-400 line-clamp-1"><?php echo $movie['origin_name'] ?></p>
                                    </div>
                                </div>
                                <!-- Tooltip on hover -->
                                <div class="movie-tooltip rounded-xl">
                                    <h3 class="font-semibold text-lg mb-1 line-clamp-2"><?php echo $movie['name'] ?></h3>
                                    <p class="text-sm text-gray-300 mb-2 line-clamp-2"><?php echo $movie['origin_name'] ?></p>
                                    <div class="mb-1">
                                        <span class="text-primary mr-1"><i class="fas fa-star"></i></span>
                                        <span>9.2</span>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <?php
                                        $allCategories = explode(',', $movie['categories']); // Tách theo dấu phẩy
                                        $categories = array_slice($allCategories, 0, 2); // Lấy 2 thể loại đầu tiên

                                        foreach ($categories as $cat) {
                                            $cat = trim($cat); // Xóa khoảng trắng dư thừa
                                            echo '<span class="bg-darker text-xs px-2 py-1 rounded mr-1">' . htmlspecialchars($cat) . '</span>';
                                        }


                                        ?>
                                    </div>

                                    <p class="text-sm mb-3">
                                        <i class="far fa-clock mr-1"></i> <?php echo $movie['time'] ?>
                                    </p>
                                    <div class="flex gap-2 mb-4">
                                        <button class="action-btn" onclick="toggleLike(this)">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="action-btn" onclick="toggleSave(this)">
                                            <i class="far fa-bookmark"></i>
                                        </button>
                                        <button class="action-btn" onclick="shareMovie('Chiến Binh Bất Tử')">
                                            <i class="far fa-share-square"></i>
                                        </button>
                                    </div>
                                    <div class="flex gap-2">
                                        <div href="/xem/<?php echo $movie['slug'] ?>"
                                            class="bg-primary hover:bg-opacity-80 text-white text-sm font-bold py-2 px-4 rounded-full transition">Xem
                                            ngay</div>
                                        <div href="/chi-tiet/<?php echo $movie['slug'] ?>"
                                            class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-sm font-bold py-2 px-4 rounded-full transition">Chi
                                            tiết</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next text-primary"></div>
            <div class="swiper-button-prev text-primary"></div>
        </div>
    </section>

    <!-- Movies in Theaters Section -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold mb-6 flex items-center">
                    <span class="w-2 h-6 bg-primary mr-2"></span>Phim chiếu rạp
                </h2>
            </div>
            <div class="flex gap-2">
                <button
                    class="swiper-button-prev-theaters w-10 h-10 rounded-full bg-dark hover:bg-dark/80 flex items-center justify-center transition-colors">
                    <i class="fas fa-chevron-left text-light"></i>
                </button>
                <button
                    class="swiper-button-next-theaters w-10 h-10 rounded-full bg-dark hover:bg-dark/80 flex items-center justify-center transition-colors">
                    <i class="fas fa-chevron-right text-light"></i>
                </button>
            </div>
        </div>

        <div class="swiper theatersSwiper">
            <div class="swiper-wrapper">
                <?php foreach ($movies_chieu_rap as $movie): ?>

                    <!-- Theater Movie 1 -->
                    <div class="swiper-slide">
                        <a href="/chi-tiet/<?php echo $movie['slug']; ?>">
                            <div class="theater-card bg-dark rounded-xl overflow-hidden">
                                <!-- Horizontal Thumbnail -->
                                <div class="relative overflow-hidden">
                                    <img src="<?php echo $movie['thumb_url']; ?>"
                                        alt="Theater Movie" class="theater-thumbnail w-full h-40 object-cover" />
                                    <div class="absolute top-2 right-2">
                                        <span class="bg-primary text-white text-xs px-2 py-1 rounded"><?php echo $movie['quality']; ?></span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="p-4">
                                    <div class="flex gap-3">
                                        <!-- Poster -->
                                        <div class="relative w-20 h-28 overflow-hidden rounded-lg flex-shrink-0">
                                            <img src="<?php echo $movie['poster_url']; ?>"
                                                alt="Poster" class="theater-poster w-full h-full object-cover" />
                                        </div>

                                        <!-- Info -->
                                        <div class="flex-1">

                                            <h3 class="font-bold text-lg mb-1 line-clamp-1"><?php echo $movie['name']; ?></h3>

                                            <div class="flex items-center gap-2 mb-2">
                                                <span class="text-primary text-sm">★ <?php echo $movie['vote_average']; ?></span>
                                                <span class="text-gray-400 text-xs">• <?php echo $movie['time']; ?></span>
                                            </div>
                                            <div class="flex flex-wrap gap-2 mb-3">
                                                <?php
                                                $categories = explode(',', $movie['categories']); // Tách chuỗi
                                                $categories = array_slice($categories, 0, 2);     // Lấy 3 phần tử đầu tiên

                                                foreach ($categories as $cat) {
                                                    $cat = trim($cat); // Loại bỏ khoảng trắng
                                                    echo '<span class="bg-primary/20 text-primary text-xs px-2 py-1 rounded mr-1">' . htmlspecialchars($cat) . '</span>';
                                                }
                                                ?>
                                            </div>
                                            <div href="/chi-tiet/<?php echo $movie['slug'] ?>"
                                                class="btn-action bg-primary/80 hover:bg-primary text-white py-2 px-4 rounded-lg text-sm w-full block text-center">
                                                Chi tiết
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>

    </section>

    <!-- Võ Thuật Section  -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <div class="px-4 flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold flex items-center">
                <span class="w-2 h-6 bg-primary mr-2"></span>
                Phim Võ Thuật
            </h2>

            <!-- Nút Xem tất cả -->
            <a href="category.html?genre=hanh-dong"
                class="flex items-center text-sm text-green-400 hover:text-green-300 transition">
                Xem tất cả
                <i class="fas fa-chevron-right ml-1 text-xs"></i>
            </a>
        </div>
        <div class="swiper genreSwiper">
            <div class="swiper-wrapper">
                <?php foreach ($movies_vo_thuat as $movie): ?>


                    <div class="swiper-slide">
                        <a href="/chi-tiet/<?php echo $movie['slug'] ?>">
                            <div class="card rounded-xl overflow-hidden">
                                <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                    <img src="<?php echo $movie['poster_url'] ?>" alt="<?php echo $movie['name'] ?>"
                                        class="w-full aspect-[3/4] object-cover rounded-lg" />
                                </div>
                                <div class="p-2 text-center">
                                    <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                        <h3 class="font-bold text-lg line-clamp-1"><?php echo $movie['name'] ?></h3>
                                        <p class="text-sm text-gray-400 line-clamp-1"><?php echo $movie['origin_name'] ?></p>
                                    </div>
                                </div>
                                <!-- Tooltip on hover -->
                                <div class="movie-tooltip rounded-xl">
                                    <h3 class="font-semibold text-lg mb-1 line-clamp-2"><?php echo $movie['name'] ?></h3>
                                    <p class="text-sm text-gray-300 mb-2 line-clamp-2"><?php echo $movie['origin_name'] ?></p>
                                    <div class="mb-1">
                                        <span class="text-primary mr-1"><i class="fas fa-star"></i></span>
                                        <span>9.2</span>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <?php
                                        $allCategories = explode(',', $movie['categories']); // Tách theo dấu phẩy
                                        $categories = array_slice($allCategories, 0, 2); // Lấy 2 thể loại đầu tiên

                                        foreach ($categories as $cat) {
                                            $cat = trim($cat); // Xóa khoảng trắng dư thừa
                                            echo '<span class="bg-darker text-xs px-2 py-1 rounded mr-1">' . htmlspecialchars($cat) . '</span>';
                                        }


                                        ?>
                                    </div>

                                    <p class="text-sm mb-3">
                                        <i class="far fa-clock mr-1"></i> <?php echo $movie['time'] ?>
                                    </p>
                                    <div class="flex gap-2 mb-4">
                                        <button class="action-btn" onclick="toggleLike(this)">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="action-btn" onclick="toggleSave(this)">
                                            <i class="far fa-bookmark"></i>
                                        </button>
                                        <button class="action-btn" onclick="shareMovie('Chiến Binh Bất Tử')">
                                            <i class="far fa-share-square"></i>
                                        </button>
                                    </div>
                                    <div class="flex gap-2">
                                        <div href="/xem/<?php echo $movie['slug'] ?>"
                                            class="bg-primary hover:bg-opacity-80 text-white text-sm font-bold py-2 px-4 rounded-full transition">Xem
                                            ngay</div>
                                        <div href="/chi-tiet/<?php echo $movie['slug'] ?>"
                                            class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-sm font-bold py-2 px-4 rounded-full transition">Chi
                                            tiết</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next text-primary"></div>
            <div class="swiper-button-prev text-primary"></div>
        </div>
    </section>

    <!-- Upcoming Movies -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <div class="flex items-center justify-between">
            <div class="px-4">
                <h2 class="text-2xl font-bold mb-6 flex items-center">
                    <span class="w-2 h-6 bg-primary mr-2"></span>Phim sắp chiếu
                </h2>
            </div>
            <div class="flex gap-2">
                <button
                    class="swiper-button-prev-upcoming w-10 h-10 rounded-full bg-dark hover:bg-dark/80 flex items-center justify-center transition-colors swiper-button-disabled swiper-button-lock"
                    disabled="" tabindex="-1" aria-label="Previous slide" aria-controls="swiper-wrapper-347105c9e95dd462b"
                    aria-disabled="true">
                    <i class="fas fa-chevron-left text-light"></i>
                </button>
                <button
                    class="swiper-button-next-upcoming w-10 h-10 rounded-full bg-dark hover:bg-dark/80 flex items-center justify-center transition-colors swiper-button-disabled swiper-button-lock"
                    disabled="" tabindex="-1" aria-label="Next slide" aria-controls="swiper-wrapper-347105c9e95dd462b"
                    aria-disabled="true">
                    <i class="fas fa-chevron-right text-light"></i>
                </button>
            </div>
        </div>

        <div class="swiper upcomingSwiper swiper-initialized swiper-horizontal swiper-backface-hidden">
            <div class="swiper-wrapper" id="swiper-wrapper-347105c9e95dd462b" aria-live="polite">
                <!-- Upcoming Movie 1 -->
                <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 5"
                    style="width: 284.8px; margin-right: 20px">
                    <div class="upcoming-card rounded-xl overflow-hidden">
                        <div class="relative">
                            <img src="/assets/images/thumb15.webp" alt="Upcoming Movie"
                                class="upcoming-img w-full h-48 object-cover" />
                            <div class="absolute inset-0 upcoming-overlay flex flex-col justify-end p-4">
                                <h3 class="font-bold text-lg mb-1">Vũ Trụ Mới</h3>
                                <span class="bg-primary text-white text-xs px-2 py-1 rounded inline-block mb-2 w-fit">Coming
                                    Soon</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Movie 2 -->
                <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 5"
                    style="width: 284.8px; margin-right: 20px">
                    <div class="upcoming-card rounded-xl overflow-hidden">
                        <div class="relative">
                            <img src="/assets/images/thumb16.webp" alt="Upcoming Movie"
                                class="upcoming-img w-full h-48 object-cover" />
                            <div class="absolute inset-0 upcoming-overlay flex flex-col justify-end p-4">
                                <h3 class="font-bold text-lg mb-1">Chiến Binh Bất Tử 2</h3>
                                <span class="bg-primary text-white text-xs px-2 py-1 rounded inline-block mb-2 w-fit">Coming
                                    Soon</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Movie 3 -->
                <div class="swiper-slide" role="group" aria-label="3 / 5" style="width: 284.8px; margin-right: 20px">
                    <div class="upcoming-card rounded-xl overflow-hidden">
                        <div class="relative">
                            <img src="/assets/images/thumb17.webp" alt="Upcoming Movie"
                                class="upcoming-img w-full h-48 object-cover" />
                            <div class="absolute inset-0 upcoming-overlay flex flex-col justify-end p-4">
                                <h3 class="font-bold text-lg mb-1">
                                    Huyền Thoại Biển Xanh
                                </h3>
                                <span class="bg-primary text-white text-xs px-2 py-1 rounded inline-block mb-2 w-fit">Coming
                                    Soon</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Movie 4 -->
                <div class="swiper-slide" role="group" aria-label="4 / 5" style="width: 284.8px; margin-right: 20px">
                    <div class="upcoming-card rounded-xl overflow-hidden">
                        <div class="relative">
                            <img src="/assets/images/thumb6.webp" alt="Upcoming Movie"
                                class="upcoming-img w-full h-48 object-cover" />
                            <div class="absolute inset-0 upcoming-overlay flex flex-col justify-end p-4">
                                <h3 class="font-bold text-lg mb-1">Đại Chiến Ninja 2</h3>
                                <span class="bg-primary text-white text-xs px-2 py-1 rounded inline-block mb-2 w-fit">Coming
                                    Soon</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Movie 5 -->
                <div class="swiper-slide" role="group" aria-label="5 / 5" style="width: 284.8px; margin-right: 20px">
                    <div class="upcoming-card rounded-xl overflow-hidden">
                        <div class="relative">
                            <img src="/assets/images/thumb8.webp" alt="Upcoming Movie"
                                class="upcoming-img w-full h-48 object-cover" />
                            <div class="absolute inset-0 upcoming-overlay flex flex-col justify-end p-4">
                                <h3 class="font-bold text-lg mb-1">Thế Giới Khác</h3>
                                <span class="bg-primary text-white text-xs px-2 py-1 rounded inline-block mb-2 w-fit">Coming
                                    Soon</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </section>

    <!-- Discussion Area -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <h2 class="text-2xl font-bold mb-6 flex items-center">
            <span class="w-2 h-6 bg-primary mr-2"></span>Khu Thảo Luận
        </h2>
        <div class="rounded-2xl border border-gray-700">
            <div class="bg-dark rounded-2xl p-4">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-xl font-bold flex items-center">
                        <span class="text-yellow-500 mr-2">👑</span>
                        TOP BÌNH LUẬN
                    </h3>
                    <div class="flex gap-2">
                        <button
                            class="swiper-button-prev-comments w-8 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition-colors">
                            <i class="fas fa-chevron-left text-light text-sm"></i>
                        </button>
                        <button
                            class="swiper-button-next-comments w-8 h-8 rounded-full bg-gray-800 hover:bg-gray-700 flex items-center justify-center transition-colors">
                            <i class="fas fa-chevron-right text-light text-sm"></i>
                        </button>
                    </div>
                </div>

                <div class="swiper commentsSwiper">
                    <div class="swiper-wrapper">
                        <!-- Comment 1 -->
                        <div class="swiper-slide">
                            <div class="relative bg-gray-800/50 rounded-xl overflow-hidden">
                                <!-- Background movie poster -->
                                <div class="absolute inset-0 opacity-20">
                                    <img src="/assets/images/thumb18.webp" alt="Movie"
                                        class="w-full h-full object-cover" />
                                </div>

                                <div class="relative p-4">
                                    <div class="flex items-start gap-3 mb-3">
                                        <img src="https://placehold.co/40x40/1E293B/10B981?text=A" alt="User"
                                            class="w-10 h-10 rounded-full border-2 border-yellow-500" />
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <h4 class="font-semibold line-clamp-1">Trần C</h4>
                                                <i class="fas fa-check-circle text-yellow-500 text-xs"></i>
                                            </div>
                                            <p class="text-sm text-gray-300 line-clamp-2 min-h-12">
                                                Quá khứ của mấy đứa em, 2 đã lấy tập 23 về rồi nhé.
                                                Mới up thì đợi lát cho full HD...
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-4 text-xs text-gray-400">
                                        <span><i class="far fa-thumbs-up mr-1"></i> 66</span>
                                        <span><i class="far fa-comment mr-1"></i> 0</span>
                                        <span><i class="far fa-eye mr-1"></i> 13</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comment 2 -->
                        <div class="swiper-slide">
                            <div class="relative bg-gray-800/50 rounded-xl overflow-hidden">
                                <!-- Background movie poster -->
                                <div class="absolute inset-0 opacity-20">
                                    <img src="/assets/images/thumb8.webp" alt="Movie"
                                        class="w-full h-full object-cover" />
                                </div>

                                <div class="relative p-4">
                                    <div class="flex items-start gap-3 mb-3">
                                        <img src="https://placehold.co/40x40/1E293B/10B981?text=B" alt="User"
                                            class="w-10 h-10 rounded-full border-2 border-yellow-500" />
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <h4 class="font-semibold line-clamp-1">Thị D</h4>
                                                <i class="fas fa-check-circle text-yellow-500 text-xs"></i>
                                            </div>
                                            <p class="text-sm text-gray-300 line-clamp-2 min-h-12">
                                                Tập 11 phê, đợi tí cho load full HD. Máy đứa cmt web
                                                khác t ban hết rồi nhé...
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-4 text-xs text-gray-400">
                                        <span><i class="far fa-thumbs-up mr-1"></i> 26</span>
                                        <span><i class="far fa-comment mr-1"></i> 0</span>
                                        <span><i class="far fa-eye mr-1"></i> 11</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comment 3 -->
                        <div class="swiper-slide">
                            <div class="relative bg-gray-800/50 rounded-xl overflow-hidden">
                                <!-- Background movie poster -->
                                <div class="absolute inset-0 opacity-20">
                                    <img src="/assets/images/thumb12.webp" alt="Movie"
                                        class="w-full h-full object-cover" />
                                </div>

                                <div class="relative p-4">
                                    <div class="flex items-start gap-3 mb-3">
                                        <img src="https://placehold.co/40x40/1E293B/10B981?text=C" alt="User"
                                            class="w-10 h-10 rounded-full border-2 border-yellow-500" />
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <h4 class="font-semibold line-clamp-1">
                                                    Văn Chương
                                                </h4>
                                                <i class="fas fa-check-circle text-yellow-500 text-xs"></i>
                                            </div>
                                            <p class="text-sm text-gray-300 line-clamp-2 min-h-12">
                                                Tập 10 rồi nè, đợi tí cho full chất lượng nha
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-4 text-xs text-gray-400">
                                        <span><i class="far fa-thumbs-up mr-1"></i> 40</span>
                                        <span><i class="far fa-comment mr-1"></i> 0</span>
                                        <span><i class="far fa-eye mr-1"></i> 12</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comment 4 -->
                        <div class="swiper-slide">
                            <div class="relative bg-gray-800/50 rounded-xl overflow-hidden">
                                <!-- Background movie poster -->
                                <div class="absolute inset-0 opacity-20">
                                    <img src="/assets/images/thumb1.webp" alt="Movie"
                                        class="w-full h-full object-cover" />
                                </div>

                                <div class="relative p-4">
                                    <div class="flex items-start gap-3 mb-3">
                                        <img src="https://placehold.co/40x40/1E293B/10B981?text=D" alt="User"
                                            class="w-10 h-10 rounded-full border-2 border-yellow-500" />
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <h4 class="font-semibold line-clamp-1">Nước lọc</h4>
                                                <i class="fas fa-check-circle text-yellow-500 text-xs"></i>
                                            </div>
                                            <p class="text-sm text-gray-300 line-clamp-2 min-h-12">
                                                Có tập 23 phê các em, 2 phải dùng mọi cách để lấy về
                                                cho các em đó. Đợi nhé
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-4 text-xs text-gray-400">
                                        <span><i class="far fa-thumbs-up mr-1"></i> 29</span>
                                        <span><i class="far fa-comment mr-1"></i> 0</span>
                                        <span><i class="far fa-eye mr-1"></i> 9</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comment 5 -->
                        <div class="swiper-slide">
                            <div class="relative bg-gray-800/50 rounded-xl overflow-hidden">
                                <!-- Background movie poster -->
                                <div class="absolute inset-0 opacity-20">
                                    <img src="/assets/images/thumb3.webp" alt="Movie"
                                        class="w-full h-full object-cover" />
                                </div>

                                <div class="relative p-4">
                                    <div class="flex items-start gap-3 mb-3">
                                        <img src="https://placehold.co/40x40/1E293B/10B981?text=E" alt="User"
                                            class="w-10 h-10 rounded-full border-2 border-yellow-500" />
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <h4 class="font-semibold line-clamp-1">User Vip</h4>
                                                <i class="fas fa-check-circle text-yellow-500 text-xs"></i>
                                            </div>
                                            <p class="text-sm text-gray-300 line-clamp-2 min-h-12">
                                                Đã lên tập 11. Như nhiều phim hot ra tập mới quá,
                                                chạy muốn tưởt quần...
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-4 text-xs text-gray-400">
                                        <span><i class="far fa-thumbs-up mr-1"></i> 24</span>
                                        <span><i class="far fa-comment mr-1"></i> 0</span>
                                        <span><i class="far fa-eye mr-1"></i> 5</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Comment 6 -->
                        <div class="swiper-slide">
                            <div class="relative bg-gray-800/50 rounded-xl overflow-hidden">
                                <!-- Background movie poster -->
                                <div class="absolute inset-0 opacity-20">
                                    <img src="/assets/images/thumb9.webp" alt="Movie"
                                        class="w-full h-full object-cover" />
                                </div>

                                <div class="relative p-4">
                                    <div class="flex items-start gap-3 mb-3">
                                        <img src="https://placehold.co/40x40/1E293B/10B981?text=F" alt="User"
                                            class="w-10 h-10 rounded-full border-2 border-yellow-500" />
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <h4 class="font-semibold line-clamp-1">Koo Koc</h4>
                                                <i class="fas fa-check-circle text-yellow-500 text-xs"></i>
                                            </div>
                                            <p class="text-sm text-gray-300 line-clamp-2 min-h-12">
                                                Đã update bản 4K
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-4 text-xs text-gray-400">
                                        <span><i class="far fa-thumbs-up mr-1"></i> 35</span>
                                        <span><i class="far fa-comment mr-1"></i> 0</span>
                                        <span><i class="far fa-eye mr-1"></i> 7</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Swiper CSS -->

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 border-t border-gray-700">
                <div class="p-4 border-r border-gray-700">
                    <h3 class="text-lg font-bold mb-4 flex items-center">
                        <i class="fas fa-fire text-primary mr-2"></i>Phim Sôi Nổi
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-2">
                            <span class="text-primary font-bold">1.</span>
                            <a href="/chi-tiet/<?php echo $movie['slug'] ?>" class="hover:text-primary transition">Đế Chế Rồng: Phần Cuối</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">128</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-primary font-bold">2.</span>
                            <a href="/chi-tiet/<?php echo $movie['slug'] ?>" class="hover:text-primary transition">Võ Sĩ Đạo: Con Đường Vinh Quang</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">96</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-primary font-bold">3.</span>
                            <a href="/chi-tiet/<?php echo $movie['slug'] ?>" class="hover:text-primary transition">Chiến Binh Bất Tử</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">87</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-primary font-bold">4.</span>
                            <a href="/chi-tiet/<?php echo $movie['slug'] ?>" class="hover:text-primary transition">Vũ Trụ Song Song</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">65</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-primary font-bold">5.</span>
                            <a href="/chi-tiet/<?php echo $movie['slug'] ?>" class="hover:text-primary transition">Huyền Thoại Rồng</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">52</span>
                        </li>
                    </ul>
                </div>

                <div class="p-4 border-r border-gray-700">
                    <h3 class="text-lg font-bold mb-4 flex items-center">
                        <i class="fas fa-comment text-primary mr-2"></i>Bình Luận Mới
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/100x100/black/10B981?text=User+1" alt="User 1"
                                    class="w-full h-full object-cover" />
                            </div>
                            <div>
                                <a href="#" class="text-sm font-bold hover:text-primary transition">NguyenVanA</a>
                                <p class="text-xs text-gray-400">
                                    Đế Chế Rồng thực sự là một kiệt tác...
                                </p>
                            </div>
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/100x100/black/10B981?text=User+2" alt="User 2"
                                    class="w-full h-full object-cover" />
                            </div>
                            <div>
                                <a href="#" class="text-sm font-bold hover:text-primary transition">TranThiB</a>
                                <p class="text-xs text-gray-400">
                                    Võ Sĩ Đạo: Con Đường Vinh Quang có cảnh quay...
                                </p>
                            </div>
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/100x100/black/10B981?text=User+3" alt="User 3"
                                    class="w-full h-full object-cover" />
                            </div>
                            <div>
                                <a href="#" class="text-sm font-bold hover:text-primary transition">LeVanC</a>
                                <p class="text-xs text-gray-400">
                                    Ai đang mong chờ Thần Thoại Á Đông: Phần 2...
                                </p>
                            </div>
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/100x100/black/10B981?text=User+4" alt="User 4"
                                    class="w-full h-full object-cover" />
                            </div>
                            <div>
                                <a href="#" class="text-sm font-bold hover:text-primary transition">PhamThiD</a>
                                <p class="text-xs text-gray-400">
                                    Tình Yêu Và Chiến Tranh có soundtrack quá hay...
                                </p>
                            </div>
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/100x100/black/10B981?text=User+5" alt="User 5"
                                    class="w-full h-full object-cover" />
                            </div>
                            <div>
                                <a href="#" class="text-sm font-bold hover:text-primary transition">HoangVanE</a>
                                <p class="text-xs text-gray-400">
                                    Đại Chiến Ninja có đáng xem không mọi người?
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="p-4 border-r border-gray-700">
                    <h3 class="text-lg font-bold mb-4 flex items-center">
                        <i class="fas fa-tags text-primary mr-2"></i>Thể Loại Hot
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-2">
                            <span class="text-primary font-bold">1.</span>
                            <a href="#" class="hover:text-primary transition">Hành Động</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">245</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-primary font-bold">2.</span>
                            <a href="#" class="hover:text-primary transition">Viễn Tưởng</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">187</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-primary font-bold">3.</span>
                            <a href="#" class="hover:text-primary transition">Võ Thuật</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">156</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-primary font-bold">4.</span>
                            <a href="#" class="hover:text-primary transition">Tình Cảm</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">124</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-primary font-bold">5.</span>
                            <a href="#" class="hover:text-primary transition">Kinh Dị</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">98</span>
                        </li>
                    </ul>
                </div>

                <div class="p-4 border-r border-gray-700">
                    <h3 class="text-lg font-bold mb-4 flex items-center">
                        <i class="fas fa-users text-primary mr-2"></i>Người Dùng Sôi Nổi
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/100x100/black/10B981?text=User+1" alt="User 1"
                                    class="w-full h-full object-cover" />
                            </div>
                            <a href="#" class="text-sm font-bold hover:text-primary transition">NguyenVanA</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">87</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/100x100/black/10B981?text=User+3" alt="User 3"
                                    class="w-full h-full object-cover" />
                            </div>
                            <a href="#" class="text-sm font-bold hover:text-primary transition">LeVanC</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">76</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/100x100/black/10B981?text=User+5" alt="User 5"
                                    class="w-full h-full object-cover" />
                            </div>
                            <a href="#" class="text-sm font-bold hover:text-primary transition">HoangVanE</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">65</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/100x100/black/10B981?text=User+2" alt="User 2"
                                    class="w-full h-full object-cover" />
                            </div>
                            <a href="#" class="text-sm font-bold hover:text-primary transition">TranThiB</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">54</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                <img src="https://placehold.co/100x100/black/10B981?text=User+4" alt="User 4"
                                    class="w-full h-full object-cover" />
                            </div>
                            <a href="#" class="text-sm font-bold hover:text-primary transition">PhamThiD</a>
                            <span class="bg-primary text-white text-xs px-1 rounded ml-auto">42</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Animated Movies Slider -->
    <section class="mb-16 anime-slider" data-aos="fade-up">
        <div class="px-4">
            <h2 class="text-2xl font-bold mb-6 flex items-center">
                <span class="w-2 h-6 bg-primary mr-2"></span>Phim Hoạt Hình
            </h2>
        </div>
        <div class="swiper animatedSwiper h-fit overflow-hidden">
            <div class="swiper-wrapper">

                <?php foreach ($movies_hoathinh_slider as $movie): ?>

                    <div class="swiper-slide relative " data-thumb="<?php echo htmlspecialchars($movie['thumb_url']) ?>">
                        <!-- Ảnh thumb (hiển thị trên desktop) -->
                        <div class="relative h-full hidden lg:block">
                            <img src="<?php echo $movie['thumb_url'] ?>" alt="<?php echo $movie['name'] ?>"
                                class="h-full aspect-[16/6] object-cover w-full" />
                            
                            <!-- Lớp phủ chấm liti -->
                            <div class="absolute inset-0 z-10 pointer-events-none bg-[radial-gradient(gray_1px,transparent_2px)] bg-[length:5px_5px] opacity-10"></div>
                        </div>

                        <!-- Ảnh poster (hiển thị trên mobile) -->
                        <div class="relative w-full lg:hidden">
                            <img src="<?php echo $movie['poster_url'] ?>" alt="<?php echo $movie['name'] ?>"
                                class="w-full aspect-[3/4] object-cover" />

                            <!-- Lớp phủ chấm liti -->
                            <div class="absolute inset-0 z-10 pointer-events-none bg-[radial-gradient(gray_1px,transparent_2px)] bg-[length:5px_5px] opacity-10"></div>
                        </div>

                        <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-darker to-transparent">
                            <div class="mx-auto">
                                <div class="max-w-2xl">
                                    <span
                                        class="hidden lg:inline-block px-3 py-1 bg-primary text-white text-sm font-medium rounded-full mb-4">Phim
                                        Mới</span>
                                    <h2 class="text-3xl md:text-4xl font-bold mb-4 line-clamp-2">
                                        <?php echo $movie['name'] ?>
                                    </h2>
                                    <p class="text-light mb-6 text-md hidden lg:block">
                                        <?php echo $movie['content'] ?>
                                    </p>
                                    <div class="flex flex-wrap gap-4 mb-6">
                                        <div class="flex items-center">
                                            <span class="text-primary mr-1"><i class="fas fa-star"></i></span>
                                            <span class="font-bold"><?php echo $movie['vote_average'] ?></span>
                                            <span class="text-gray-400 ml-1">/10</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-gray-400 mr-1"><i class="far fa-clock"></i></span>
                                            <span><?php echo $movie['time'] ?></span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-gray-400 mr-1"><i class="far fa-calendar-alt"></i></span>
                                            <span><?php echo $movie['year'] ?></span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-gray-400 mr-1"><i class="fas fa-film"></i></span>
                                            <span><?php echo $movie['quality'] ?></span>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap gap-3 mb-8 hidden lg:flex">
                                        <?php
                                        $categories = explode(',', $movie['categories']); // Tách chuỗi bằng dấu phẩy
                                        $categories = array_slice($categories, 0, 4);     // Lấy tối đa 4 thể loại

                                        foreach ($categories as $cat) {
                                            $cat = trim($cat); // Loại bỏ khoảng trắng
                                            echo '<a href="#" class="bg-dark hover:bg-dark/80 px-3 py-1 rounded-full text-sm transition-colors mr-1">'
                                                . htmlspecialchars($cat) .
                                                '</a>';
                                        }
                                        ?>

                                    </div>

                                    <div class="flex items-center gap-4">
                                        <a href="/xem/<?php echo $movie['slug'] ?>"
                                            class="hidden lg:flex btn-action bg-primary hover:bg-primary/90 text-white font-medium py-3 px-6 rounded-full items-center">
                                            <i class="fas fa-play mr-2"></i> Xem ngay
                                        </a>

                                        <a href="/xem/<?php echo $movie['slug'] ?>"
                                            class="lg:hidden btn-action bg-primary hover:bg-primary/90 text-white font-medium p-6 rounded-full flex items-center w-12 h-12 justify-center">
                                            <i class="fas fa-play"></i>
                                        </a>

                                        <a href="/chi-tiet/<?php echo $movie['slug'] ?>"
                                            class="hidden lg:block btn-action glass hover:bg-white/10 text-white font-medium py-3 px-6 rounded-full">
                                            Chi tiết
                                        </a>
                                        <div
                                            class="flex justify-center items-center lg:hidden border border-white/10 bg-white/5 hover:bg-white/10 text-white font-medium p-2 rounded-full">
                                            <a href="/chi-tiet/<?php echo $movie['slug'] ?>" class="px-4 text-gray-400 hover:text-white transition-colors">
                                                <i class="fas fa-info"></i>
                                            </a>
                                            <!-- love icon -->
                                            <a href="#" class="px-4 text-gray-400 hover:text-white transition-colors">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Cartoon Section  -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <div class="px-4 flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold flex items-center">
                <span class="w-2 h-6 bg-primary mr-2"></span>
                Hoạt hình Mỹ
            </h2>

            <!-- Nút Xem tất cả -->
            <a href="category.html?genre=hanh-dong"
                class="flex items-center text-sm text-green-400 hover:text-green-300 transition">
                Xem tất cả
                <i class="fas fa-chevron-right ml-1 text-xs"></i>
            </a>
        </div>
        <div class="swiper genreSwiper">
            <div class="swiper-wrapper">
                <?php foreach ($movies_hoat_hinh_my as $movie): ?>


                    <div class="swiper-slide">
                        <a href="/chi-tiet/<?php echo $movie['slug'] ?>">
                            <div class="card rounded-xl overflow-hidden">
                                <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                    <img src="<?php echo $movie['poster_url'] ?>" alt="<?php echo $movie['name'] ?>"
                                        class="w-full aspect-[3/4] object-cover rounded-lg" />
                                </div>
                                <div class="p-2 text-center">
                                    <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                        <h3 class="font-bold text-lg line-clamp-1"><?php echo $movie['name'] ?></h3>
                                        <p class="text-sm text-gray-400 line-clamp-1"><?php echo $movie['origin_name'] ?></p>
                                    </div>
                                </div>
                                <!-- Tooltip on hover -->
                                <div class="movie-tooltip rounded-xl">
                                    <h3 class="font-semibold text-lg mb-1 line-clamp-2"><?php echo $movie['name'] ?></h3>
                                    <p class="text-sm text-gray-300 mb-2 line-clamp-2"><?php echo $movie['origin_name'] ?></p>
                                    <div class="mb-1">
                                        <span class="text-primary mr-1"><i class="fas fa-star"></i></span>
                                        <span>9.2</span>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <?php
                                        $allCategories = explode(',', $movie['categories']); // Tách theo dấu phẩy
                                        $categories = array_slice($allCategories, 0, 2); // Lấy 2 thể loại đầu tiên

                                        foreach ($categories as $cat) {
                                            $cat = trim($cat); // Xóa khoảng trắng dư thừa
                                            echo '<span class="bg-darker text-xs px-2 py-1 rounded mr-1">' . htmlspecialchars($cat) . '</span>';
                                        }


                                        ?>
                                    </div>

                                    <p class="text-sm mb-3">
                                        <i class="far fa-clock mr-1"></i> <?php echo $movie['time'] ?>
                                    </p>
                                    <div class="flex gap-2 mb-4">
                                        <button class="action-btn" onclick="toggleLike(this)">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="action-btn" onclick="toggleSave(this)">
                                            <i class="far fa-bookmark"></i>
                                        </button>
                                        <button class="action-btn" onclick="shareMovie('Chiến Binh Bất Tử')">
                                            <i class="far fa-share-square"></i>
                                        </button>
                                    </div>
                                    <div class="flex gap-2">
                                        <div href="/xem/<?php echo $movie['slug'] ?>"
                                            class="bg-primary hover:bg-opacity-80 text-white text-sm font-bold py-2 px-4 rounded-full transition">Xem
                                            ngay</div>
                                        <div href="/chi-tiet/<?php echo $movie['slug'] ?>"
                                            class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-sm font-bold py-2 px-4 rounded-full transition">Chi
                                            tiết</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next text-primary"></div>
            <div class="swiper-button-prev text-primary"></div>
        </div>
    </section>

    <!-- Anime Section  -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <div class="px-4 flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold flex items-center">
                <span class="w-2 h-6 bg-primary mr-2"></span>
                Phim Anime
            </h2>

            <!-- Nút Xem tất cả -->
            <a href="category.html?genre=hanh-dong"
                class="flex items-center text-sm text-green-400 hover:text-green-300 transition">
                Xem tất cả
                <i class="fas fa-chevron-right ml-1 text-xs"></i>
            </a>
        </div>
        <div class="swiper genreSwiper">
            <div class="swiper-wrapper">
                <?php foreach ($movies_hoat_hinh_nhat as $movie): ?>
                    <div class="swiper-slide">
                        <a href="/chi-tiet/<?php echo $movie['slug'] ?>">
                            <div class="card rounded-xl overflow-hidden">
                                <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                    <img src="<?php echo $movie['poster_url'] ?>" alt="<?php echo $movie['name'] ?>"
                                        class="w-full aspect-[3/4] object-cover rounded-lg" />
                                </div>
                                <div class="p-2 text-center">
                                    <div href="/chi-tiet/<?php echo $movie['slug'] ?>" class="block">
                                        <h3 class="font-bold text-lg line-clamp-1"><?php echo $movie['name'] ?></h3>
                                        <p class="text-sm text-gray-400 line-clamp-1"><?php echo $movie['origin_name'] ?></p>
                                    </div>
                                </div>
                                <!-- Tooltip on hover -->
                                <div class="movie-tooltip rounded-xl">
                                    <h3 class="font-semibold text-lg mb-1 line-clamp-2"><?php echo $movie['name'] ?></h3>
                                    <p class="text-sm text-gray-300 mb-2 line-clamp-2"><?php echo $movie['origin_name'] ?></p>
                                    <div class="mb-1">
                                        <span class="text-primary mr-1"><i class="fas fa-star"></i></span>
                                        <span>9.2</span>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <?php
                                        $allCategories = explode(',', $movie['categories']); // Tách theo dấu phẩy
                                        $categories = array_slice($allCategories, 0, 2); // Lấy 2 thể loại đầu tiên

                                        foreach ($categories as $cat) {
                                            $cat = trim($cat); // Xóa khoảng trắng dư thừa
                                            echo '<span class="bg-darker text-xs px-2 py-1 rounded mr-1">' . htmlspecialchars($cat) . '</span>';
                                        }


                                        ?>
                                    </div>

                                    <p class="text-sm mb-3">
                                        <i class="far fa-clock mr-1"></i> <?php echo $movie['time'] ?>
                                    </p>
                                    <div class="flex gap-2 mb-4">
                                        <button class="action-btn" onclick="toggleLike(this)">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="action-btn" onclick="toggleSave(this)">
                                            <i class="far fa-bookmark"></i>
                                        </button>
                                        <button class="action-btn" onclick="shareMovie('Chiến Binh Bất Tử')">
                                            <i class="far fa-share-square"></i>
                                        </button>
                                    </div>
                                    <div class="flex gap-2">
                                        <div href="/xem/<?php echo $movie['slug'] ?>"
                                            class="bg-primary hover:bg-opacity-80 text-white text-sm font-bold py-2 px-4 rounded-full transition">Xem
                                            ngay</div>
                                        <div href="/chi-tiet/<?php echo $movie['slug'] ?>"
                                            class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-sm font-bold py-2 px-4 rounded-full transition">Chi
                                            tiết</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next text-primary"></div>
            <div class="swiper-button-prev text-primary"></div>
        </div>
    </section>

    <!-- Hoạt hình chiếu rạp  -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold mb-6 flex items-center">
                    <span class="w-2 h-6 bg-primary mr-2"></span>Hoạt hình chiếu rạp
                </h2>
            </div>
            <div class="flex gap-2">
                <button
                    class="swiper-button-prev-theaters w-10 h-10 rounded-full bg-dark hover:bg-dark/80 flex items-center justify-center transition-colors">
                    <i class="fas fa-chevron-left text-light"></i>
                </button>
                <button
                    class="swiper-button-next-theaters w-10 h-10 rounded-full bg-dark hover:bg-dark/80 flex items-center justify-center transition-colors">
                    <i class="fas fa-chevron-right text-light"></i>
                </button>
            </div>
        </div>

        <div class="swiper theatersSwiper">
            <div class="swiper-wrapper">
                <?php foreach ($movies_hoat_hinh_rap as $movie): ?>

                    <!-- Theater Movie 1 -->
                    <div class="swiper-slide">
                        <a href="/chi-tiet/<?php echo $movie['slug']; ?>">
                            <div class="theater-card bg-dark rounded-xl overflow-hidden">
                                <!-- Horizontal Thumbnail -->
                                <div class="relative overflow-hidden">
                                    <img src="<?php echo $movie['thumb_url']; ?>"
                                        alt="Theater Movie" class="theater-thumbnail w-full h-40 object-cover" />
                                    <div class="absolute top-2 right-2">
                                        <span class="bg-primary text-white text-xs px-2 py-1 rounded"><?php echo $movie['quality']; ?></span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="p-4">
                                    <div class="flex gap-3">
                                        <!-- Poster -->
                                        <div class="relative w-20 h-28 overflow-hidden rounded-lg flex-shrink-0">
                                            <img src="<?php echo $movie['poster_url']; ?>"
                                                alt="Poster" class="theater-poster w-full h-full object-cover" />
                                        </div>

                                        <!-- Info -->
                                        <div class="flex-1">

                                            <h3 class="font-bold text-lg mb-1 line-clamp-1"><?php echo $movie['name']; ?></h3>

                                            <div class="flex items-center gap-2 mb-2">
                                                <span class="text-primary text-sm">★ <?php echo $movie['vote_average']; ?></span>
                                                <span class="text-gray-400 text-xs">• <?php echo $movie['time']; ?></span>
                                            </div>
                                            <div class="flex flex-wrap gap-2 mb-3">
                                                <?php
                                                $categories = explode(',', $movie['categories']); // Tách chuỗi
                                                $categories = array_slice($categories, 0, 2);     // Lấy 3 phần tử đầu tiên

                                                foreach ($categories as $cat) {
                                                    $cat = trim($cat); // Loại bỏ khoảng trắng
                                                    echo '<span class="bg-primary/20 text-primary text-xs px-2 py-1 rounded mr-1">' . htmlspecialchars($cat) . '</span>';
                                                }
                                                ?>
                                            </div>
                                            <div href="/chi-tiet/<?php echo $movie['slug']; ?>"
                                                class="btn-action bg-primary/80 hover:bg-primary text-white py-2 px-4 rounded-lg text-sm w-full block text-center">
                                                Chi tiết
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- Gợi ý Section -->
    <section class="mb-16 px-4" data-aos="fade-up">
        <h2 class="text-2xl font-bold mb-6 flex items-center">
            <span class="w-2 h-6 bg-primary mr-2"></span>Đề xuất cho bạn
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-6 lg:grid-cols-8 gap-4 anime-container">
            <?php foreach ($movies_new as $movie): ?>
                <a href="/chi-tiet/<?= $movie['slug']; ?>">
                    <div class="card rounded-xl overflow-hidden">
                        <div class="block">
                            <img src="<?= $movie['poster_url']; ?>" alt="<?= $movie['name']; ?>"
                                class="w-full aspect-[3/4] object-cover rounded-lg" />
                        </div>
                        <div class="p-2 text-center">
                            <div class="block">
                                <h3 class="font-bold text-lg line-clamp-1"><?= $movie['name']; ?></h3>
                                <p class="text-sm text-gray-400 line-clamp-1"><?= $movie['origin_name']; ?></p>
                            </div>
                        </div>
                        <!-- Tooltip on hover -->
                        <div class="movie-tooltip rounded-xl">
                            <h3 class="font-semibold text-lg mb-1 line-clamp-2"><?= $movie['name']; ?></h3>
                            <p class="text-sm text-gray-300 mb-2 line-clamp-2"><?= $movie['origin_name']; ?></p>

                            <div class="flex flex-wrap gap-2 mb-3">
                                <span class="bg-darker text-xs px-2 py-1 rounded">Anime</span>
                                <span class="bg-darker text-xs px-2 py-1 rounded">Võ thuật</span>
                            </div>
                            <p class="text-sm mb-3">
                                <i class="far fa-clock mr-1"></i> <?= $movie['time']; ?>
                            </p>
                            <div class="flex gap-2 mb-4">
                                <button class="action-btn" onclick="toggleLike(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button class="action-btn" onclick="toggleSave(this)">
                                    <i class="far fa-bookmark"></i>
                                </button>
                                <button class="action-btn" onclick="shareMovie('Kiếm Sĩ Huyền Thoại')">
                                    <i class="far fa-share-square"></i>
                                </button>
                            </div>
                            <div class="flex gap-2">
                                <div class="bg-primary hover:bg-opacity-80 text-white text-sm font-bold py-2 px-4 rounded-full transition">Xem
                                    ngay</div>
                                <div
                                    class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white text-sm font-bold py-2 px-4 rounded-full transition">Chi
                                    tiết</div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-8">
            <button id="load-more-anime"
                class="bg-darker hover:bg-primary transition-all duration-300 text-white py-3 px-6 rounded-full">
                Xem thêm
            </button>
        </div>
    </section>
</main>




<!-- <script src="/assets/js/index.js"></script> -->