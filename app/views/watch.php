

<!-- Main Content -->
<main class="pt-20 pb-12">
    
    <!-- Video Section -->
    <section class="mb-8">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <!-- Video Player -->
                <div class="bg-black rounded-t-2xl overflow-hidden">
                    <div class="video-wrapper">
                        <iframe src="<?= $chapter['link_embed'] ?>" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>
                
                <!-- Video Controls Bar -->
                <!-- <div class="bg-dark rounded-b-2xl p-4">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center space-x-4">
                            <button class="p-2 hover:bg-gray-800 rounded-lg transition">
                                <i class="fas fa-backward text-xl"></i>
                            </button>
                            <button class="w-12 h-12 bg-primary hover:bg-primary/90 rounded-full flex items-center justify-center transition">
                                <i class="fas fa-play text-xl ml-1"></i>
                            </button>
                            <button class="p-2 hover:bg-gray-800 rounded-lg transition">
                                <i class="fas fa-forward text-xl"></i>
                            </button>
                            <span class="text-sm text-gray-400">00:00 / 45:00</span>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <button class="p-2 hover:bg-gray-800 rounded-lg transition">
                                <i class="fas fa-closed-captioning text-xl"></i>
                            </button>
                            <button class="p-2 hover:bg-gray-800 rounded-lg transition">
                                <i class="fas fa-cog text-xl"></i>
                            </button>
                            <button class="p-2 hover:bg-gray-800 rounded-lg transition">
                                <i class="fas fa-expand text-xl"></i>
                            </button>
                        </div>
                    </div>
                    
                    
                    <div class="progress-bar w-full">
                        <div style="width: 35%"></div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

    <!-- Content Grid -->
    <section class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-8">
                <!-- Movie Info Card -->
                <div class="bg-dark rounded-2xl p-6 mb-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h1 class="text-2xl font-bold mb-2"><?= $movie['name'] ?> - <?= $chapter['name'] ?></h1>
                            <div class="flex items-center space-x-4 text-sm text-gray-400">
                                <span><i class="far fa-eye mr-1"></i> 2.1M lượt xem</span>
                                <span><i class="far fa-calendar mr-1"></i>
                                    <?= date('d/m/Y', strtotime($chapter['updated_at'])) ?>
                                </span>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-2">
                            <button class="p-3 bg-gray-800 hover:bg-gray-700 rounded-xl transition" onclick="toggleLike(this)">
                                <i class="far fa-heart text-lg"></i>
                            </button>
                            <button class="p-3 bg-gray-800 hover:bg-gray-700 rounded-xl transition" onclick="toggleBookmark(this)">
                                <i class="far fa-bookmark text-lg"></i>
                            </button>
                            <button class="p-3 bg-gray-800 hover:bg-gray-700 rounded-xl transition" onclick="shareMovie()">
                                <i class="fas fa-share-alt text-lg"></i>
                            </button>
                        </div>
                    </div>
                    
                    <p class="text-gray-300 leading-relaxed mb-4">
                        <?= $movie['content'] ?>
                    </p>
                    
                    <div class="flex flex-wrap gap-2">
                        <?php
                            $categories = explode(',', $movie['category_name']); // Tách chuỗi bằng dấu phẩy
                            $categories = array_slice($categories, 0, 4);     // Lấy tối đa 4 thể loại

                            foreach ($categories as $cat) {
                                $cat = trim($cat); // Loại bỏ khoảng trắng
                                echo '<a href="#" class="px-3 py-1 bg-primary/20 text-primary rounded-full text-sm">'
                                    . htmlspecialchars($cat) .
                                    '</a>';
                            }
                        ?>
                      
                    </div>
                </div>

                <!-- Server Selection -->
                <div class="bg-dark rounded-2xl p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Chọn Server</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <button class="server-badge bg-gradient-to-r from-primary to-green-600 text-white py-3 px-4 rounded-xl font-medium smooth-transition">
                            <i class="fas fa-crown mr-2"></i>VIP 1
                        </button>
                        <button class="server-badge bg-gray-800 hover:bg-gray-700 py-3 px-4 rounded-xl font-medium smooth-transition">
                            <i class="fas fa-server mr-2"></i>VIP 2
                        </button>
                        <button class="server-badge bg-gray-800 hover:bg-gray-700 py-3 px-4 rounded-xl font-medium smooth-transition">
                            <i class="fas fa-cloud mr-2"></i>Server 3
                        </button>
                        <button class="server-badge bg-gray-800 hover:bg-gray-700 py-3 px-4 rounded-xl font-medium smooth-transition">
                            <i class="fas fa-database mr-2"></i>Dự phòng
                        </button>
                    </div>
                </div>

                <!-- Tabs Section -->
                <div class="bg-dark rounded-2xl overflow-hidden">
                    <!-- Tab Headers -->
                    <div class="relative flex border-b border-gray-800">
                        <button class="flex-1 py-4 px-6 font-medium text-primary transition" onclick="switchTab('episodes')">
                            Danh sách tập
                        </button>
                        <button class="flex-1 py-4 px-6 font-medium text-gray-400 hover:text-white transition" onclick="switchTab('comments')">
                            Bình luận (234)
                        </button>
                        <button class="flex-1 py-4 px-6 font-medium text-gray-400 hover:text-white transition" onclick="switchTab('related')">
                            Phim liên quan
                        </button>
                        <div class="tab-indicator" style="width: 33.33%; left: 0;"></div>
                    </div>
                    
                    <!-- Tab Content -->
                    <div class="p-6">
                        <!-- Episodes Tab -->
                        <div id="episodes-tab" class="tab-content">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold">24 Tập</h3>
                                <div class="flex items-center space-x-2">
                                    <button id="list-view-btn" class="p-2 bg-gray-800 rounded-lg hover:bg-gray-700 transition" onclick="setListView()">
                                        <i class="fas fa-list"></i>
                                    </button>
                                    <button id="grid-view-btn" class="p-2 rounded-lg hover:bg-gray-800 transition" onclick="setGridView()">
                                        <i class="fas fa-th"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div id="episodes-container" class="episodes-list space-y-2 max-h-96 overflow-y-auto pr-2">

                                <?php $i= 1; ?>
                                <?php foreach ($chapters as $chapter): ?>
                                  
                                        <div class="episode-item active bg-gray-800/50 rounded-xl p-4 cursor-pointer h-fit">
                                              <a href="/xem/<?= $movie['slug'] ?>/<?= $chapter['episode_slug'] ?>" >
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-4">
                                                    <span class="text-2xl font-bold text-primary"><?= $i ?></span>
                                                    <div>
                                                        <h4 class="font-medium"><?= $chapter['name'] ?></h4>
                                                        <p class="text-sm text-gray-400"><?= date('d/m/Y', strtotime($chapter['updated_at'])) ?></p>
                                                    </div>
                                                </div>
                                                <i class="fas fa-play-circle text-primary text-xl"></i>
                                            </div>
                                             </a>
                                        </div>
                                   
                                <?php $i++; endforeach; ?>
                                
                            </div>
                        </div>
                        
                        <!-- Comments Tab -->
                        <div id="comments-tab" class="tab-content hidden">
                            <div class="mb-6">
                                <div class="flex items-start space-x-3">
                                    <img src="https://placehold.co/40x40/1E293B/10B981?text=U" alt="User" class="w-10 h-10 rounded-full">
                                    <div class="flex-1">
                                        <textarea placeholder="Viết bình luận..." 
                                                  class="w-full bg-gray-800 rounded-xl p-3 resize-none focus:outline-none focus:ring-2 focus:ring-primary"
                                                  rows="3"></textarea>
                                        <div class="flex justify-end mt-2">
                                            <button class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg transition">
                                                Gửi bình luận
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3">
                                    <img src="https://placehold.co/40x40/1E293B/10B981?text=A" alt="User" class="w-10 h-10 rounded-full">
                                    <div class="flex-1">
                                        <div class="comment-bubble">
                                            <div class="flex items-center justify-between mb-1">
                                                <h4 class="font-medium">Nguyễn Văn A</h4>
                                                <span class="text-xs text-gray-400">2 giờ trước</span>
                                            </div>
                                            <p class="text-gray-300 mb-2">Phim quá hay! Kỹ xảo đỉnh cao, diễn xuất xuất sắc.</p>
                                            <div class="flex items-center space-x-4 text-sm">
                                                <button class="text-gray-400 hover:text-primary transition">
                                                    <i class="far fa-thumbs-up mr-1"></i> 45
                                                </button>
                                                <button class="text-gray-400 hover:text-primary transition">
                                                    <i class="far fa-comment mr-1"></i> Trả lời
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Related Tab -->
                        <div id="related-tab" class="tab-content hidden">
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                <div class="group cursor-pointer">
                                    <div class="relative overflow-hidden rounded-xl mb-2">
                                        <img src="images/movie15.webp" 
                                             alt="Movie" 
                                             class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                                        <div class="absolute top-2 right-2">
                                            <span class="bg-primary text-white text-xs px-2 py-1 rounded">HD</span>
                                        </div>
                                    </div>
                                    <h4 class="font-medium line-clamp-1">Huyền Thoại Rồng</h4>
                                    <p class="text-sm text-gray-400">2024 • 12 tập</p>
                                </div>
                                
                                <div class="group cursor-pointer">
                                    <div class="relative overflow-hidden rounded-xl mb-2">
                                        <img src="images/movie14.webp" 
                                             alt="Movie" 
                                             class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                                        <div class="absolute top-2 right-2">
                                            <span class="bg-primary text-white text-xs px-2 py-1 rounded">HD</span>
                                        </div>
                                    </div>
                                    <h4 class="font-medium line-clamp-1">Chiến Binh Bất Tử</h4>
                                    <p class="text-sm text-gray-400">2023 • Phim lẻ</p>
                                </div>
                                
                                <div class="group cursor-pointer">
                                    <div class="relative overflow-hidden rounded-xl mb-2">
                                        <img src="images/movie13.webp" 
                                             alt="Movie" 
                                             class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                                        <div class="absolute top-2 right-2">
                                            <span class="bg-primary text-white text-xs px-2 py-1 rounded">HD</span>
                                        </div>
                                    </div>
                                    <h4 class="font-medium line-clamp-1">Vũ Trụ Song Song</h4>
                                    <p class="text-sm text-gray-400">2024 • 16 tập</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="lg:col-span-4">
                <!-- Movie Card -->
                <div class="bg-dark rounded-2xl overflow-hidden mb-6">
                    <img src="<?= $movie['thumb_url'] ?>" 
                         alt="Movie Poster" 
                         class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-4"><?= $movie['name'] ?></h3>
                        
                        <div class="flex items-center justify-center mb-4">
                            <div class="text-center">
                                <div class="text-4xl font-bold text-primary mb-1"><?= $movie['vote_average'] ?></div>
                                <div class="flex items-center space-x-1 mb-1">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                </div>
                                <p class="text-sm text-gray-400"><?= $movie['vote_count'] ?> đánh giá</p>
                            </div>
                        </div>
                        
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-400">Trạng thái:</span>
                                <span class="text-primary font-medium">
                                    <?= $movie['status'] === 'completed' ? 'Hoàn thành' : 'Đang phát hành' ?>
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Số tập:</span>
                                <span><?= $movie['episode_total'] ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Năm SX:</span>
                                <span><?= $movie['year'] ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Quốc gia:</span>
                                <span><?= $movie['country_name'] ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-400">Chất lượng:</span>
                                <span class="text-primary font-medium"><?= $movie['quality'] ?></span>
                            </div>
                        </div>
                        
                        <button class="w-full bg-primary hover:bg-primary/90 text-white font-medium py-3 rounded-xl mt-6 transition">
                            <i class="fas fa-info-circle mr-2"></i>
                            Xem chi tiết phim
                        </button>
                    </div>
                </div>
                
                <!-- Quick Actions -->
                <div class="bg-dark rounded-2xl p-6">
                    <h3 class="font-semibold mb-4">Tùy chọn xem phim</h3>
                    <div class="space-y-3">
                        <label class="flex items-center justify-between cursor-pointer">
                            <span class="text-gray-300">Tự động phát tập tiếp</span>
                            <div class="relative">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </div>
                        </label>
                        
                        <!-- <label class="flex items-center justify-between cursor-pointer">
                            <span class="text-gray-300">Tắt đèn</span>
                            <div class="relative">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </div>
                        </label>
                        
                        <label class="flex items-center justify-between cursor-pointer">
                            <span class="text-gray-300">Hiển thị phụ đề</span>
                            <div class="relative">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                            </div>
                        </label> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<!-- Floating Action Button -->
<div class="fab">
    <i class="fas fa-comments text-white text-xl"></i>
</div>

<!-- Toast Notification -->
<div id="toast" class="toast">
    <div class="flex items-center">
        <i class="fas fa-check-circle text-primary mr-3"></i>
        <span id="toast-message">Thông báo</span>
    </div>
</div>



