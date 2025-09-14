<header class="sticky top-0 z-50 bg-dark-cardd/95 backdrop-blur-sm border-b border-primary/20 transition-all duration-300" id="header">
    <div class="p-4">
        <div class="flex items-center justify-between">
            
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <a href="/" class="flex items-center text-2xl font-bold text-primary hover:scale-105 transition-all duration-300 hover:drop-shadow-[0_0_20px_rgba(255,219,137,0.5)]">
                    <i class="fas fa-film mr-2"></i>
                    <span>CineAsia</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden 2xl:flex items-center space-x-8">
                <a href="/" class="relative px-4 py-2 text-white hover:text-primary hover:bg-primary/10 rounded-lg transition-all duration-300 group">
                    <i class="fas fa-home mr-2"></i>Trang Chủ
                    <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-4/5 transform -translate-x-1/2"></span>
                </a>
                
                <!-- Phim Bộ Dropdown -->
                <div class="relative group">
                    <button class="flex items-center px-4 py-2 text-white hover:text-primary hover:bg-primary/10 rounded-lg transition-all duration-300">
                        <i class="fas fa-tv mr-2"></i>Phim Bộ
                        <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute top-full left-0 mt-2 w-56 bg-dark-card border border-primary/30 rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 hover:translate-x-1">
                            <i class="fas fa-fire mr-3 text-accent"></i>Phim bộ hot
                        </a>
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 hover:translate-x-1">
                            <i class="fas fa-star mr-3 text-primary"></i>Phim bộ mới
                        </a>
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 hover:translate-x-1">
                            <i class="fas fa-crown mr-3 text-yellow-500"></i>Phim bộ VIP
                        </a>
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 hover:translate-x-1">
                            <i class="fas fa-heart mr-3 text-red-500"></i>Phim bộ yêu thích
                        </a>
                    </div>
                </div>

                <!-- Phim Lẻ Dropdown -->
                <div class="relative group">
                    <button class="flex items-center px-4 py-2 text-white hover:text-primary hover:bg-primary/10 rounded-lg transition-all duration-300">
                        <i class="fas fa-film mr-2"></i>Phim Lẻ
                        <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute top-full left-0 mt-2 w-56 bg-dark-card border border-primary/30 rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 hover:translate-x-1">
                            <i class="fas fa-fire mr-3 text-accent"></i>Phim chiếu rạp
                        </a>
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 hover:translate-x-1">
                            <i class="fas fa-star mr-3 text-primary"></i>Phim lẻ mới
                        </a>
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 hover:translate-x-1">
                            <i class="fas fa-trophy mr-3 text-yellow-500"></i>Phim đoạt giải
                        </a>
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 hover:translate-x-1">
                            <i class="fas fa-clock mr-3 text-blue-500"></i>Phim kinh điển
                        </a>
                    </div>
                </div>

                <!-- Thể Loại Dropdown -->
                <div class="relative group">
                    <button class="flex items-center px-4 py-2 text-white hover:text-primary hover:bg-primary/10 rounded-lg transition-all duration-300">
                        <i class="fas fa-tags mr-2"></i>Thể Loại
                        <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute top-full left-0 mt-2 w-max bg-dark-card border border-primary/30 rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 w-fit">
                            <?php foreach ($categories_list as $category): ?>
                                <a href="/the-loai/<?= $category['slug'] ?>" 
                                class="w-fit flex items-center p-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 last:border-b-0 sm:last:border-b hover:translate-x-1 text-sm sm:text-base">
                                    <i class="fa <?= $category['icon'] ?> mr-2 sm:mr-3 text-primary flex-shrink-0"></i>
                                    <span class="truncate"><?= $category['name'] ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Quốc Gia Dropdown -->
                <div class="relative group">
                    <button class="flex items-center px-4 py-2 text-white hover:text-primary hover:bg-primary/10 rounded-lg transition-all duration-300">
                        <i class="fas fa-globe mr-2"></i>Quốc Gia
                        <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute top-full left-0 mt-2 w-max bg-dark-card border border-primary/30 rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 w-fit">
                            <?php foreach ($countries_list as $country): ?>
                                <a href="/quoc-gia/<?= $country['slug'] ?>" 
                                class="w-fit flex items-center p-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 last:border-b-0 sm:last:border-b hover:translate-x-1 text-sm sm:text-base">
                                   
                                    <span class="truncate"><?= $country['name'] ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                  
                </div>

                <!-- Năm Dropdown -->
                <div class="relative group">
                    <button class="flex items-center px-4 py-2 text-white hover:text-primary hover:bg-primary/10 rounded-lg transition-all duration-300">
                        <i class="fas fa-calendar mr-2"></i>Năm
                        <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute top-full left-0 mt-2 w-56 bg-dark-card border border-primary/30 rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 hover:translate-x-1">
                            <i class="fas fa-calendar-alt mr-3 text-primary"></i>2024
                        </a>
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 hover:translate-x-1">
                            <i class="fas fa-calendar-alt mr-3 text-primary"></i>2023
                        </a>
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 hover:translate-x-1">
                            <i class="fas fa-calendar-alt mr-3 text-primary"></i>2022
                        </a>
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 hover:translate-x-1">
                            <i class="fas fa-calendar-alt mr-3 text-primary"></i>2021
                        </a>
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10 hover:translate-x-1">
                            <i class="fas fa-calendar-alt mr-3 text-primary"></i>2020
                        </a>
                        <a href="category.html" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 hover:translate-x-1">
                            <i class="fas fa-calendar-alt mr-3 text-primary"></i>Trước 2020
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Search & User Actions -->
            <div class="flex items-center space-x-4">
                <!-- Search Box -->
                <div class="relative hidden md:block group">
                    <input 
                        type="text" 
                        class="w-72 bg-dark-bg/80 border border-primary/30 rounded-full px-5 py-3 pr-12 text-white placeholder-white/50 focus:outline-none focus:border-primary focus:shadow-[0_0_20px_rgba(255,219,137,0.3)] focus:w-80 transition-all duration-300"
                        placeholder="Tìm kiếm phim, diễn viên..."
                        id="searchInput"
                    >
                    <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white/70 hover:text-primary hover:scale-110 transition-all duration-300" onclick="performSearch()">
                        <i class="fas fa-search"></i>
                    </button>
                    
                    <!-- Search Autocomplete -->
                    <div class="absolute top-full left-0 right-0 mt-2 bg-dark-card border border-primary/30 rounded-xl shadow-2xl max-h-80 overflow-y-auto z-50 hidden" id="searchAutocomplete">
                        <div class="flex items-center px-4 py-3 hover:bg-primary/10 cursor-pointer transition-all duration-300 border-b border-primary/10" onclick="selectSearch('squid game')">
                            <i class="fas fa-search mr-3 text-gray-400"></i>
                            <span>squid game</span>
                        </div>
                        <div class="flex items-center px-4 py-3 hover:bg-primary/10 cursor-pointer transition-all duration-300 border-b border-primary/10" onclick="selectSearch('kingdom')">
                            <i class="fas fa-search mr-3 text-gray-400"></i>
                            <span>kingdom</span>
                        </div>
                        <div class="flex items-center px-4 py-3 hover:bg-primary/10 cursor-pointer transition-all duration-300 border-b border-primary/10" onclick="selectSearch('parasite')">
                            <i class="fas fa-search mr-3 text-gray-400"></i>
                            <span>parasite</span>
                        </div>
                        <div class="flex items-center px-4 py-3 hover:bg-primary/10 cursor-pointer transition-all duration-300" onclick="selectSearch('train to busan')">
                            <i class="fas fa-search mr-3 text-gray-400"></i>
                            <span>train to busan</span>
                        </div>
                    </div>
                </div>

                <!-- Notifications -->
                <div class="relative hidden lg:block">
                    <button class="text-gray-400 hover:text-primary transition-all duration-300 relative">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-accent text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">3</span>
                    </button>
                </div>

                <!-- User Menu -->
                <div class="relative group">
                    <button class="w-10 h-10 rounded-full bg-primary/10 border-2 border-primary/30 text-primary flex items-center justify-center hover:bg-primary/20 hover:border-primary hover:scale-110 transition-all duration-300">
                        <i class="fas fa-user"></i>
                    </button>
                    <div class="absolute top-full right-0 mt-2 w-48 bg-dark-card border border-primary/30 rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10">
                            <i class="fas fa-user-circle mr-3"></i>Tài khoản
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10">
                            <i class="fas fa-heart mr-3"></i>Yêu thích
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10">
                            <i class="fas fa-history mr-3"></i>Lịch sử xem
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300 border-b border-primary/10">
                            <i class="fas fa-cog mr-3"></i>Cài đặt
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-primary/10 hover:text-primary transition-all duration-300">
                            <i class="fas fa-sign-out-alt mr-3"></i>Đăng xuất
                        </a>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button class="2xl:hidden flex flex-col cursor-pointer p-1 burger-btn" onclick="toggleMobileMenu()" id="burgerBtn">
                    <div class="w-6 h-0.5 bg-primary mb-1 burger-line"></div>
                    <div class="w-6 h-0.5 bg-primary mb-1 burger-line"></div>
                    <div class="w-6 h-0.5 bg-primary burger-line"></div>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="fixed top-0 left-0 w-4/5 h-full bg-dark-card z-[9999] mobile-menu overflow-y-auto" id="mobileMenu">
    <div class="p-6">
        <div class="flex items-center justify-between mb-8">
            <a href="/" class="flex items-center text-xl font-bold text-primary">
                <i class="fas fa-film mr-2"></i>
                <span>CineAsia</span>
            </a>
            <button onclick="toggleMobileMenu()" class="text-white hover:text-primary transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Mobile Search -->
        <div class="mb-6 md:hidden">
            <div class="relative">
                <input 
                    type="text" 
                    class="w-full bg-dark-bg border border-gray-600 rounded-lg px-4 py-3 pr-12 text-white placeholder-gray-400 focus:outline-none focus:border-primary"
                    placeholder="Tìm kiếm..."
                >
                <button class="absolute right-3 top-3 text-gray-400 hover:text-primary transition-colors">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <nav class="space-y-2">
            <div class="py-3 border-b border-primary/10">
                <a href="/" class="flex items-center text-white text-lg hover:text-primary transition-colors">
                    <i class="fas fa-home mr-3 text-primary"></i>Trang Chủ
                </a>
            </div>

            <div class="py-3 border-b border-primary/10">
                <button onclick="toggleMobileDropdown('series')" class="w-full flex items-center justify-between text-white text-lg hover:text-primary transition-colors">
                    <span><i class="fas fa-tv mr-3 text-primary"></i>Phim Bộ</span>
                    <i class="fas fa-chevron-down transition-transform" id="seriesChevron"></i>
                </button>
                <div class="hidden mt-3 ml-6 space-y-2" id="seriesDropdown">
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Phim bộ hot</a>
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Phim bộ mới</a>
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Phim bộ VIP</a>
                </div>
            </div>

            <div class="py-3 border-b border-primary/10">
                <button onclick="toggleMobileDropdown('movies')" class="w-full flex items-center justify-between text-white text-lg hover:text-primary transition-colors">
                    <span><i class="fas fa-film mr-3 text-primary"></i>Phim Lẻ</span>
                    <i class="fas fa-chevron-down transition-transform" id="moviesChevron"></i>
                </button>
                <div class="hidden mt-3 ml-6 space-y-2" id="moviesDropdown">
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Phim chiếu rạp</a>
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Phim lẻ mới</a>
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Phim đoạt giải</a>
                </div>
            </div>

            <div class="py-3 border-b border-primary/10">
                <button onclick="toggleMobileDropdown('genres')" class="w-full flex items-center justify-between text-white text-lg hover:text-primary transition-colors">
                    <span><i class="fas fa-tags mr-3 text-primary"></i>Thể Loại</span>
                    <i class="fas fa-chevron-down transition-transform" id="genresChevron"></i>
                </button>
                <div class="hidden mt-3 ml-6 space-y-2" id="genresDropdown">
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Hành động</a>
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Tình cảm</a>
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Hài hước</a>
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Kinh dị</a>
                </div>
            </div>

            <div class="py-3 border-b border-primary/10">
                <button onclick="toggleMobileDropdown('countries')" class="w-full flex items-center justify-between text-white text-lg hover:text-primary transition-colors">
                    <span><i class="fas fa-globe mr-3 text-primary"></i>Quốc Gia</span>
                    <i class="fas fa-chevron-down transition-transform" id="countriesChevron"></i>
                </button>
                <div class="hidden mt-3 ml-6 space-y-2" id="countriesDropdown">
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Hàn Quốc</a>
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Nhật Bản</a>
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Trung Quốc</a>
                    <a href="#" class="block text-white/80 hover:text-primary transition-colors py-1">Thái Lan</a>
                </div>
            </div>

            <div class="py-3">
                <a href="#" class="flex items-center text-white text-lg hover:text-primary transition-colors">
                    <i class="fas fa-user mr-3 text-primary"></i>Tài khoản
                </a>
            </div>
        </nav>
    </div>
</div>

<!-- Mobile Overlay -->
<div class="fixed inset-0 bg-black/50 z-[9998] hidden" id="mobileOverlay" onclick="toggleMobileMenu()"></div>