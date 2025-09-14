
   
    <!-- Thumbnail Banner -->
    <section class="relative h-[400px] md:h-[500px] overflow-hidden">
        <img src="<?= htmlspecialchars($movie['thumb_url']) ?>" alt="<?= htmlspecialchars($movie['name']) ?>"
            class="w-full h-full object-cover">
        <div class="absolute inset-0 thumbnail-overlay"></div>

        <!-- Breadcrumb -->
        <!-- <div class="absolute top-4 left-0 w-full z-10">
            <div class="container mx-auto px-4">
                <nav class="flex items-center space-x-2 text-sm">
                    <a href="/" class="text-gray-400 hover:text-white transition">Trang chủ</a>
                    <span class="text-gray-400">/</span>
                    <a href="/phim-le" class="text-gray-400 hover:text-white transition">Phim lẻ</a>
                    <span class="text-gray-400">/</span>
                    <span class="text-white">Đế Chế Rồng</span>
                </nav>
            </div>
        </div> -->
    </section>

    <!-- Main Content -->
    <section class="container mx-auto px-4 -mt-20 relative z-20 pb-12">
        <div class="main-grid grid grid-cols-1 lg:grid-cols-10 gap-6">

            <!-- Left Sidebar (3 parts) -->
            <div class="lg:col-span-3 left-sidebar">
                <!-- Poster Section -->
                <div class="poster-section">
                    <div class="glass-dark rounded-2xl p-4 mb-6">
                        <img src="<?= $movie['poster_url'] ?>" alt="<?= htmlspecialchars($movie['name']) ?>"
                            class="w-full rounded-xl shadow-2xl">

                        <!-- Action Buttons -->
                        <div class="mt-4 space-y-3">
                            <?php if (!empty($chapters)): ?>
                                <a href="/xem/<?= htmlspecialchars($chapters[0]['movie_slug']) ?>/<?= htmlspecialchars($chapters[0]['episode_slug']) ?>">
                                    <button
                                        class="btn-action w-full bg-primary hover:bg-primary/90 text-white font-semibold py-3 px-4 rounded-xl flex items-center justify-center gap-2">
                                        <i class="fas fa-play"></i>
                                        <span>Xem phim</span>
                                    </button>
                                </a>
                            <?php endif; ?>

                            

                            <div class="grid grid-cols-3 gap-2">
                                <button
                                    class="btn-action glass hover:bg-white/10 py-3 rounded-xl flex items-center justify-center"
                                    onclick="toggleLike(this)">
                                    <i class="far fa-heart text-lg"></i>
                                </button>
                                <button
                                    class="btn-action glass hover:bg-white/10 py-3 rounded-xl flex items-center justify-center"
                                    onclick="toggleBookmark(this)">
                                    <i class="far fa-bookmark text-lg"></i>
                                </button>
                                <button
                                    class="btn-action glass hover:bg-white/10 py-3 rounded-xl flex items-center justify-center"
                                    onclick="shareMovie()">
                                    <i class="fas fa-share-alt text-lg"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Rating -->
                        <div class="mt-4 text-center">
                            <div class="flex items-center justify-center gap-1 mb-2">
                                <span class="star filled text-2xl">★</span>
                                <span class="star filled text-2xl">★</span>
                                <span class="star filled text-2xl">★</span>
                                <span class="star filled text-2xl">★</span>
                                <span class="star filled text-2xl">★</span>
                            </div>
                            <p class="text-3xl font-bold gradient-text"><?= htmlspecialchars($movie['vote_average']) ?>/10</p>
                            <p class="text-sm text-gray-400"><?= htmlspecialchars($movie['vote_count']) ?> đánh giá</p>
                        </div>
                    </div>
                </div>

                <!-- Movie Info Section -->
                <div class="info-section">
                    <div class="glass-dark rounded-2xl p-6 mb-6">
                        <h3 class="text-lg font-bold mb-4">Thông tin phim</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Tên gốc:</span>
                                <span><?= htmlspecialchars($movie['name']) ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Đạo diễn:</span>
                                <span>Trần Văn X</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Quốc gia:</span>
                                <span><?= htmlspecialchars($movie['country_name']) ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Năm SX:</span>
                                <span><?= htmlspecialchars($movie['year']) ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Thời lượng:</span>
                                <span><?= htmlspecialchars($movie['time']) ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Chất lượng:</span>
                                <span class="text-primary font-semibold"><?= htmlspecialchars($movie['quality']) ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Ngôn ngữ:</span>
                                <span><?= htmlspecialchars($movie['lang']) ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Lượt xem:</span>
                                <span>2.5M</span>
                            </div>
                        </div>

                        <!-- Genres -->
                        <div class="mt-4 pt-4 border-t border-gray-700">
                            <p class="text-sm text-gray-400 mb-2">Thể loại:</p>
                            <div class="flex flex-wrap gap-2">
                                <?php
                                    $categories = explode(',', $movie['category_name']); // Tách chuỗi bằng dấu phẩy
                                    $categories = array_slice($categories, 0, 4);     // Lấy tối đa 4 thể loại

                                    foreach ($categories as $cat) {
                                        $cat = trim($cat); // Loại bỏ khoảng trắng
                                        echo '<a href="#" class="px-3 py-1 bg-primary/20 text-primary rounded-full text-xs">'
                                            . htmlspecialchars($cat) .
                                            '</a>';
                                    }
                                ?>
                              
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Related Movies -->
                <!-- <div class="related-top">
                <div class="glass-dark rounded-2xl p-6">
                    <h3 class="text-lg font-bold mb-4">Top phim liên quan</h3>
                    <div class="space-y-3">
                        <a href="#" class="related-movie flex gap-3 p-3 rounded-xl hover:bg-white/5">
                            <div class="relative overflow-hidden rounded-lg flex-shrink-0">
                                <img src="https://placehold.co/80x120/0F172A/10B981?text=Movie+1" 
                                     alt="Movie" 
                                     class="movie-poster w-20 h-28 object-cover transition-transform duration-300">
                                <span class="absolute top-1 left-1 bg-primary text-white text-xs px-2 py-1 rounded">TOP 1</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold line-clamp-1">Huyền Thoại Rồng</h4>
                                <p class="text-sm text-gray-400">2024</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-primary text-sm">★ 9.5</span>
                                    <span class="text-gray-400 text-xs">• 1.2M views</span>
                                </div>
                            </div>
                        </a>
                        
                        <a href="#" class="related-movie flex gap-3 p-3 rounded-xl hover:bg-white/5">
                            <div class="relative overflow-hidden rounded-lg flex-shrink-0">
                                <img src="https://placehold.co/80x120/0F172A/10B981?text=Movie+2" 
                                     alt="Movie" 
                                     class="movie-poster w-20 h-28 object-cover transition-transform duration-300">
                                <span class="absolute top-1 left-1 bg-primary text-white text-xs px-2 py-1 rounded">TOP 2</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold line-clamp-1">Chiến Binh Bất Tử</h4>
                                <p class="text-sm text-gray-400">2023</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-primary text-sm">★ 9.2</span>
                                    <span class="text-gray-400 text-xs">• 980K views</span>
                                </div>
                            </div>
                        </a>
                        
                        <a href="#" class="related-movie flex gap-3 p-3 rounded-xl hover:bg-white/5">
                            <div class="relative overflow-hidden rounded-lg flex-shrink-0">
                                <img src="https://placehold.co/80x120/0F172A/10B981?text=Movie+3" 
                                     alt="Movie" 
                                     class="movie-poster w-20 h-28 object-cover transition-transform duration-300">
                                <span class="absolute top-1 left-1 bg-primary text-white text-xs px-2 py-1 rounded">TOP 3</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-semibold line-clamp-1">Vũ Trụ Song Song</h4>
                                <p class="text-sm text-gray-400">2024</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-primary text-sm">★ 9.0</span>
                                    <span class="text-gray-400 text-xs">• 750K views</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> -->
            </div>

            <!-- Right Content (7 parts) -->
            <div class="lg:col-span-7">
                <!-- Movie Title and Description -->
                <div class="glass-dark rounded-2xl p-6 mb-6">
                    <h1 class="text-3xl md:text-4xl font-bold mb-2"><?= htmlspecialchars($movie['name']) ?></h1>
                    <p class="text-xl text-gray-300 mb-4"><?= htmlspecialchars($movie['origin_name']) ?></p>

                    <div class="prose prose-invert max-w-none">
                        <p class="text-gray-300 leading-relaxed">
                           <?= htmlspecialchars($movie['content']) ?>
                        </p>
                    </div>
                </div>

                <!-- Tab Navigation -->
                <div class="glass-dark rounded-2xl p-1 mb-6">
                    <div class="flex flex-wrap">
                        <button class="tab-btn active flex-1 py-3 px-4 text-center font-medium"
                            onclick="switchTab('episodes')">
                            Danh sách tập
                        </button>
                        <button class="tab-btn flex-1 py-3 px-4 text-center font-medium"
                            onclick="switchTab('comments')">
                            Bình luận
                        </button>
                        <button class="tab-btn flex-1 py-3 px-4 text-center font-medium" onclick="switchTab('actors')">
                            Diễn viên
                        </button>
                        <button class="tab-btn flex-1 py-3 px-4 text-center font-medium" onclick="switchTab('related')">
                            Phim liên quan
                        </button>
                    </div>
                </div>

                <!-- Tab Content -->
                <div class="tab-content">
                    <!-- Episodes Tab -->
                    <div id="episodes-tab" class="tab-pane">
                        <div class="glass-dark rounded-2xl p-6">
                            <h3 class="text-xl font-bold mb-4">Danh sách tập phim</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-h-[600px] overflow-y-auto pr-2">

                            <?php foreach ($chapters as $chapter): ?>
                                <a href="/xem/<?= htmlspecialchars($chapter['movie_slug']) ?>/<?= htmlspecialchars($chapter['episode_slug']) ?>"
                                class="block">
                                    <div class="episode-card glass rounded-xl p-4 border border-transparent hover:border-primary transition">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h4 class="font-semibold"><?= htmlspecialchars($chapter['name']) ?></h4>
                                                <p class="text-sm text-gray-400">
                                                    <?php if (!empty($chapter['updated_at'])): ?>
                                                        <?= date("d/m/Y \l\ú\c H:i", strtotime($chapter['updated_at'])) ?>
                                                    <?php else: ?>
                                                        Chưa cập nhật
                                                    <?php endif; ?>                                                </p>
                                            </div>
                                            <div
                                                class="w-10 h-10 bg-primary rounded-full flex items-center justify-center hover:bg-primary/80 transition">
                                                <i class="fas fa-play text-white text-sm"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>

                            </div>
                        </div>
                    </div>

                    <!-- Comments Tab -->
                    <div id="comments-tab" class="tab-pane hidden">
                        <div class="glass-dark rounded-2xl p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-xl font-bold">Bình luận (1,234)</h3>
                                <select class="bg-dark border border-gray-700 rounded-lg px-3 py-2 text-sm">
                                    <option>Mới nhất</option>
                                    <option>Cũ nhất</option>
                                    <option>Phổ biến nhất</option>
                                </select>
                            </div>

                            <!-- Comment Form -->
                            <div class="mb-6">
                                <textarea placeholder="Viết bình luận của bạn..."
                                    class="w-full bg-dark border border-gray-700 rounded-xl p-4 resize-none focus:border-primary focus:outline-none transition"
                                    rows="3"></textarea>
                                <div class="flex justify-end mt-2">
                                    <button
                                        class="btn-action bg-primary hover:bg-primary/90 text-white font-medium py-2 px-6 rounded-lg">
                                        Gửi bình luận
                                    </button>
                                </div>
                            </div>

                            <!-- Comments List -->
                            <div class="space-y-4 max-h-[500px] overflow-y-auto pr-2">
                                <div class="comment-item p-4 rounded-xl">
                                    <div class="flex gap-3">
                                        <img src="https://placehold.co/50x50/0F172A/10B981?text=U1" alt="User"
                                            class="w-10 h-10 rounded-full">
                                        <div class="flex-1">
                                            <div class="flex justify-between items-start mb-2">
                                                <div>
                                                    <h4 class="font-semibold">Nguyễn Văn A</h4>
                                                    <p class="text-xs text-gray-400">2 giờ trước</p>
                                                </div>
                                                <button class="text-gray-400 hover:text-white">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                            </div>
                                            <p class="text-gray-300 mb-3">Phim rất hay! Kỹ xảo đỉnh cao, diễn xuất xuất
                                                sắc. Đặc biệt là cảnh chiến đấu với rồng ở tập 8, quá hoành tráng!</p>
                                            <div class="flex items-center gap-4 text-sm">
                                                <button class="text-gray-400 hover:text-primary transition">
                                                    <i class="far fa-thumbs-up mr-1"></i> 234
                                                </button>
                                                <button class="text-gray-400 hover:text-primary transition">
                                                    <i class="far fa-comment mr-1"></i> Trả lời
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment-item p-4 rounded-xl">
                                    <div class="flex gap-3">
                                        <img src="https://placehold.co/50x50/0F172A/10B981?text=U2" alt="User"
                                            class="w-10 h-10 rounded-full">
                                        <div class="flex-1">
                                            <div class="flex justify-between items-start mb-2">
                                                <div>
                                                    <h4 class="font-semibold">Trần Thị B</h4>
                                                    <p class="text-xs text-gray-400">5 giờ trước</p>
                                                </div>
                                                <button class="text-gray-400 hover:text-white">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                            </div>
                                            <p class="text-gray-300 mb-3">Cảm động quá! Tình cảm giữa Ryu và Mira được
                                                thể hiện rất tự nhiên và chân thực.</p>
                                            <div class="flex items-center gap-4 text-sm">
                                                <button class="text-gray-400 hover:text-primary transition">
                                                    <i class="far fa-thumbs-up mr-1"></i> 156
                                                </button>
                                                <button class="text-gray-400 hover:text-primary transition">
                                                    <i class="far fa-comment mr-1"></i> Trả lời
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button
                                class="w-full mt-4 py-3 text-center text-primary hover:bg-white/5 rounded-xl transition">
                                Xem thêm bình luận
                            </button>
                        </div>
                    </div>

                    <!-- Actors Tab -->
                    <div id="actors-tab" class="tab-pane hidden">
                        <div class="glass-dark rounded-2xl p-6">
                            <h3 class="text-xl font-bold mb-6">Dàn diễn viên</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                <div class="actor-card text-center">
                                    <div class="relative overflow-hidden rounded-xl mb-3">
                                        <img src="images/author1.jpg" alt="Actor"
                                            class="w-full h-40 object-cover transition-transform duration-300">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-end p-3">
                                            <p class="text-xs">Vai: Hoàng tử Ryu</p>
                                        </div>
                                    </div>
                                    <h4 class="font-semibold text-sm">Nguyễn Văn A</h4>
                                </div>

                                <div class="actor-card text-center">
                                    <div class="relative overflow-hidden rounded-xl mb-3">
                                        <img src="images/author2.jpg" alt="Actor"
                                            class="w-full h-40 object-cover transition-transform duration-300">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-end p-3">
                                            <p class="text-xs">Vai: Mira</p>
                                        </div>
                                    </div>
                                    <h4 class="font-semibold text-sm">Trần Thị B</h4>
                                </div>

                                <div class="actor-card text-center">
                                    <div class="relative overflow-hidden rounded-xl mb-3">
                                        <img src="images/author3.jpg" alt="Actor"
                                            class="w-full h-40 object-cover transition-transform duration-300">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-end p-3">
                                            <p class="text-xs">Vai: Vua Drakon</p>
                                        </div>
                                    </div>
                                    <h4 class="font-semibold text-sm">Lê Văn C</h4>
                                </div>

                                <div class="actor-card text-center">
                                    <div class="relative overflow-hidden rounded-xl mb-3">
                                        <img src="images/author4.jpg" alt="Actor"
                                            class="w-full h-40 object-cover transition-transform duration-300">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-end p-3">
                                            <p class="text-xs">Vai: Hoàng hậu</p>
                                        </div>
                                    </div>
                                    <h4 class="font-semibold text-sm">Phạm Thị D</h4>
                                </div>
                            </div>

                            <div class="mt-6 pt-6 border-t border-gray-700">
                                <h4 class="font-semibold mb-3">Đội ngũ sản xuất</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Đạo diễn:</span>
                                        <span>Trần Văn X</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Biên kịch:</span>
                                        <span>Nguyễn Thị Y</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Nhà sản xuất:</span>
                                        <span>Studio ABC</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">Âm nhạc:</span>
                                        <span>Lê Văn Z</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Movies Tab -->
                    <div id="related-tab" class="tab-pane hidden">
                        <div class="glass-dark rounded-2xl p-6">
                            <h3 class="text-xl font-bold mb-6">Phim liên quan</h3>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                <a href="#" class="group">
                                    <div class="relative overflow-hidden rounded-xl mb-2">
                                        <img src="images/thumb11.webp" alt="Movie"
                                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute top-2 left-2">
                                            <span class="bg-primary text-white text-xs px-2 py-1 rounded">HD</span>
                                        </div>
                                        <div
                                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-3">
                                            <p class="text-sm font-semibold">Huyền Thoại Rồng</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-primary">★ 9.5</span>
                                        <span class="text-gray-400">2024</span>
                                    </div>
                                </a>

                                <a href="#" class="group">
                                    <div class="relative overflow-hidden rounded-xl mb-2">
                                        <img src="images/thumb12.webp" alt="Movie"
                                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute top-2 left-2">
                                            <span class="bg-primary text-white text-xs px-2 py-1 rounded">HD</span>
                                        </div>
                                        <div
                                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-3">
                                            <p class="text-sm font-semibold">Chiến Binh Bất Tử</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-primary">★ 9.2</span>
                                        <span class="text-gray-400">2023</span>
                                    </div>
                                </a>

                                <a href="#" class="group">
                                    <div class="relative overflow-hidden rounded-xl mb-2">
                                        <img src="images/thumb13.webp" alt="Movie"
                                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute top-2 left-2">
                                            <span class="bg-primary text-white text-xs px-2 py-1 rounded">HD</span>
                                        </div>
                                        <div
                                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-3">
                                            <p class="text-sm font-semibold">Vũ Trụ Song Song</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-primary">★ 9.0</span>
                                        <span class="text-gray-400">2024</span>
                                    </div>
                                </a>

                                <a href="#" class="group">
                                    <div class="relative overflow-hidden rounded-xl mb-2">
                                        <img src="images/thumb14.webp" alt="Movie"
                                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                        <div class="absolute top-2 left-2">
                                            <span class="bg-primary text-white text-xs px-2 py-1 rounded">HD</span>
                                        </div>
                                        <div
                                            class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-3">
                                            <p class="text-sm font-semibold">Thế Giới Khác</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="text-primary">★ 8.8</span>
                                        <span class="text-gray-400">2025</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
