
    <!-- Main Content -->
    <main class="pt-20 pb-12 overflow-x-hidden">
        <div class="p-8">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl md:text-4xl font-bold mb-4">Phim <?= $taxonomy_info['name'] ?></h1>
                <p class="text-gray-400">Tổng hợp các bộ phim nổi bật thuộc <?= strtolower($taxonomy_info['name']) ?></p>
            </div>

            <!-- Filter Section -->
            <div class="glass-dark rounded-2xl p-6 mb-8">
                <!-- Filter Toggle Button -->
                <button id="filter-toggle" class="flex items-center justify-between w-full mb-4"
                    onclick="toggleFilter()">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-filter text-primary"></i>
                        <span class="font-semibold text-lg">Bộ lọc</span>
                        <div id="active-filters" class="flex flex-wrap gap-2">
                            <!-- Active filter tags will be displayed here -->
                        </div>
                    </div>
                    <i id="filter-arrow" class="fas fa-chevron-down transition-transform"></i>
                </button>

                <!-- Filter Dropdown Content -->
                <div id="filter-dropdown" class="filter-dropdown">
                    <div
                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 pt-4 border-t border-gray-700">
                        <!-- Genre Filter -->
                        <div>
                            <h3 class="font-semibold mb-3">Thể loại</h3>
                            <div class="space-y-2 max-h-48 overflow-y-auto pr-2">
                                <?php foreach ($categories_list as $cat): ?>
                                    <label class="flex items-center gap-2 cursor-pointer hover:text-primary transition">
                                        <input type="checkbox" class="custom-checkbox" name="<?= $cat['slug'] ?>"  value="<?= $cat['slug'] ?>"
                                            <?= $cat['slug'] == $category['slug'] ? 'checked disabled' : '' ?>>
                                        <span><?= $cat['name'] ?></span>
                                    </label>
                                <?php endforeach; ?>
                               
                               
                            </div>
                        </div>

                        <!-- Year Filter -->
                        <div>
                            <h3 class="font-semibold mb-3">Năm</h3>
                            <div class="space-y-2 max-h-48 overflow-y-auto pr-2">
                                <label class="flex items-center gap-2 cursor-pointer hover:text-primary transition">
                                    <input type="checkbox" class="custom-checkbox" value="2025">
                                    <span>2025</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer hover:text-primary transition">
                                    <input type="checkbox" class="custom-checkbox" value="2024">
                                    <span>2024</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer hover:text-primary transition">
                                    <input type="checkbox" class="custom-checkbox" value="2023">
                                    <span>2023</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer hover:text-primary transition">
                                    <input type="checkbox" class="custom-checkbox" value="2022">
                                    <span>2022</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer hover:text-primary transition">
                                    <input type="checkbox" class="custom-checkbox" value="2021">
                                    <span>2021</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer hover:text-primary transition">
                                    <input type="checkbox" class="custom-checkbox" value="2020">
                                    <span>2020</span>
                                </label>
                            </div>
                        </div>

                        <!-- Country Filter -->
                        <div data-group="quocgia">
                            <h3 class="font-semibold mb-3">Quốc gia</h3>
                            <div class="space-y-2 max-h-48 overflow-y-auto pr-2">
                                <?php foreach ($countries_list as $country): ?>
                                    <label class="flex items-center gap-2 cursor-pointer hover:text-primary transition">
                                        <input type="checkbox" class="custom-checkbox" value="<?= $country['slug'] ?>">
                                        <span><?= $country['name'] ?></span>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>


                        <!-- Version Filter -->
                        <div>
                            <h3 class="font-semibold mb-3">Phiên bản</h3>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 cursor-pointer hover:text-primary transition">
                                    <input type="checkbox" class="custom-checkbox" value="Vietsub">
                                    <span>Vietsub</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer hover:text-primary transition">
                                    <input type="checkbox" class="custom-checkbox" value="Thuyết Minh">
                                    <span>Thuyết minh</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer hover:text-primary transition">
                                    <input type="checkbox" class="custom-checkbox" value="Lồng Tiếng">
                                    <span>Lồng tiếng</span>
                                </label>
                            </div>
                        </div>

                      

                        <!-- Sort Options -->
                        <div>
                            <h3 class="font-semibold mb-3">Sắp xếp</h3>
                            <select
                                class="w-full bg-dark border border-gray-700 rounded-lg px-3 py-2 focus:outline-none focus:border-primary transition">
                                <option value="newest">Mới nhất</option>
                                <option value="oldest">Cũ nhất</option>
                                <option value="most-viewed">Lượt xem cao nhất</option>
                                <option value="least-viewed">Lượt xem thấp nhất</option>
                                <option value="rating-high">Đánh giá cao nhất</option>
                                <option value="rating-low">Đánh giá thấp nhất</option>
                            </select>
                        </div>
                    </div>

                    <!-- Filter Actions -->
                    <div class="flex justify-end gap-3 mt-6 pt-4 border-t border-gray-700">
                        <button onclick="clearFilters()" class="px-4 py-2 text-gray-400 hover:text-white transition">
                            Xóa bộ lọc
                        </button>
                        <button onclick="applyFilters()"
                            class="px-6 py-2 bg-primary hover:bg-primary/90 text-white rounded-lg transition">
                            Áp dụng
                        </button>
                    </div>
                </div>
            </div>

            <!-- Results Info -->
            <div class="flex items-center justify-between mb-6">
                <p class="text-gray-400">Tìm thấy <span class="text-white font-semibold"><?= $total ?></span> phim</p>
            </div>

            <!-- Movies Grid -->
              <?php if ($total == 0): ?>
                <div class="text-center text-gray-400 mt-10">
                    <p>Không tìm thấy phim nào phù hợp với yêu cầu của bạn.</p>
                </div>
            <?php else: ?>
            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-8 gap-4 mb-12">

                <?php foreach ($movies as $movie): ?>

                    <div class="movie-card group">
                        <div class="relative overflow-hidden rounded-xl bg-dark">
                            <img src="<?= $movie['poster_url'] ?>" alt="<?= $movie['name'] ?>"
                                class="w-full aspect-[3/4] object-cover group-hover:scale-105 transition duration-300">
                            <div class="absolute top-2 right-2">
                                <span class="bg-primary text-white text-xs px-2 py-1 rounded"><?= $movie['quality'] ?></span>
                            </div>
                        </div>
                        <div class="p-2 text-center">
                            <h3 class="font-medium text-md line-clamp-1"><?= $movie['name'] ?></h3>
                            <h3 class="text-xs text-gray-300 line-clamp-1"><?= $movie['origin_name'] ?></h3>
                        </div>

                        <!-- Hover Tooltip -->

                        <div class="movie-tooltip glass-dark rounded-xl shadow-2xl overflow-hidden">
                            <!-- Thumbnail Section -->
                            <div class="relative h-48 overflow-hidden">
                                <img src="<?= $movie['thumb_url'] ?>" alt="<?= $movie['name'] ?>"
                                    class="w-full h-full object-cover">
                                <div class="tooltip-separator"></div>
                            </div>

                            <!-- Info Section -->
                            <div class="p-4">
                                <h3 class="font-bold text-lg line-clamp-2"><?= $movie['name'] ?></h3>
                                <h3 class="text-sm text-gray-300 mb-2 line-clamp-1"><?= $movie['origin_name'] ?></h3>
                                <div class="flex flex-wrap gap-3 mb-4 text-sm">
                                    <span class="text-gray-300">
                                        <i class="fas fa-film text-primary mr-1"></i>
                                        Hành động, Viễn tưởng, Hài hước, Học đường, Tình cảm
                                    </span>
                                    <span class="text-gray-300">
                                        <i class="far fa-clock text-primary mr-1"></i>
                                        <?= $movie['time'] ?>
                                    </span>
                                </div>

                                <div class="flex gap-2 mb-3">
                                    <a href="/xem/<?= $movie['slug'] ?>"
                                        class="flex-1 bg-primary hover:bg-primary/90 text-white text-center py-2 rounded-lg text-sm transition">
                                        <i class="fas fa-play mr-1"></i> Xem ngay
                                    </a>
                                    <a href="/chi-tiet/<?= $movie['slug'] ?>"
                                        class="flex-1 bg-gray-700 hover:bg-gray-600 text-white text-center py-2 rounded-lg text-sm transition">
                                        <i class="fas fa-info-circle mr-1"></i> Chi tiết
                                    </a>
                                    <button onclick="toggleFavorite(event)"
                                        class="bg-gray-700 hover:bg-gray-600 text-white px-3 py-2 rounded-lg text-sm transition">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>

                <?php endforeach; ?>
                <!-- Add more movie cards as needed -->
            </div>
            <?php endif; ?>
            <!-- Pagination -->
            <div class="flex justify-center mt-8">
                <nav class="flex items-center gap-2">
                    <?php
                    // Lấy lại query string hiện tại, bỏ page
                    $query = $_GET;
                    unset($query['page']);
                    $queryString = http_build_query($query);
                    $queryString = $queryString ? '&' . $queryString : '';

                    $range = 2;
                    $start = max(1, $page - $range);
                    $end = min($totalPages, $page + $range);
                    ?>

                    <?php if ($start > 1): ?>
                        <a href="?page=1<?= $queryString ?>" class="px-4 py-2 rounded-lg bg-dark text-white hover:bg-gray-700">1</a>
                        <?php if ($start > 2): ?>
                            <span class="text-gray-500 px-2">...</span>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php for ($i = $start; $i <= $end; $i++): ?>
                        <a href="?page=<?= $i ?><?= $queryString ?>"
                            class="px-4 py-2 rounded-lg <?= $i == $page ? 'bg-primary text-white font-bold' : 'bg-dark hover:bg-gray-700 text-white' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($end < $totalPages): ?>
                        <?php if ($end < $totalPages - 1): ?>
                            <span class="text-gray-500 px-2">...</span>
                        <?php endif; ?>
                        <a href="?page=<?= $totalPages ?><?= $queryString ?>" class="px-4 py-2 rounded-lg bg-dark text-white hover:bg-gray-700">
                            <?= $totalPages ?>
                        </a>
                    <?php endif; ?>
                </nav>
            </div>


        </div>
    </main>

  