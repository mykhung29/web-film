// Initialize AOS
AOS.init({
  duration: 800,
  once: true,
});

// Featured Slider
const dotsposter = Array.from(document.querySelectorAll(".featuredSwiper .swiper-slide"))
  .map(slide => slide.getAttribute("data-post"));

const featuredSwiper = new Swiper(".featuredSwiper", {
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".featured-slider .swiper-pagination",
    clickable: true,
    renderBullet: function (index, className) {
      const post = dotsposter[index % dotsposter.length] || '';
      return `<span class="${className}" style="background-image: url('${post}')"></span>`;
    },
  },
});

// Caterogy Slider
const categorySwiper = new Swiper('.categorySwiper', {
  slidesPerView: 2,
  spaceBetween: 16,
  breakpoints: {
    640: { slidesPerView: 4 },
    768: { slidesPerView: 5.5 },
    1024: { slidesPerView: 7.5 }
  },
  loop: false,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev'
  }
});




// Top Movies Slider
const topSwiper = new Swiper(".topSwiper", {
  slidesPerView: 2,
  spaceBetween: 10,
  navigation: {
    nextEl: ".topSwiper .swiper-button-next",
    prevEl: ".topSwiper .swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 6,
      spaceBetween: 20,
    },
  },
});

// Genre Slider
const genreSwiper = new Swiper(".genreSwiper", {
  slidesPerView: 2,
  spaceBetween: 10,
  navigation: {
    nextEl: ".genreSwiper .swiper-button-next",
    prevEl: ".genreSwiper .swiper-button-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 6,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 7,
      spaceBetween: 10,
    },
    
  },
});
// Initialize Upcoming Movies Swiper
const upcomingSwiper = new Swiper(".upcomingSwiper", {
  slidesPerView: 1.5,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next-upcoming",
    prevEl: ".swiper-button-prev-upcoming",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 4,
    },
    1280: {
      slidesPerView: 4,
    },
  },
});

// Initialize Theaters Movies Swiper
const theatersSwiper = new Swiper(".theatersSwiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next-theaters",
    prevEl: ".swiper-button-prev-theaters",
  },
  breakpoints: {
    640: {
      slidesPerView: 3,
    },
    1024: {
      slidesPerView: 4,
    },
    1280: {
      slidesPerView: 4,
    },
  },
});

// Animated Movies Slider
const animeThumbs = Array.from(document.querySelectorAll(".animatedSwiper .swiper-slide"))
  .map(slide => slide.getAttribute("data-thumb"));

const animatedSwiper = new Swiper(".animatedSwiper", {
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".anime-slider .swiper-pagination",
    clickable: true,
    renderBullet: function (index, className) {
      const thumb = animeThumbs[index % animeThumbs.length] || '';
      return `<span class="${className}" style="background-image: url('${thumb}')"></span>`;
    },
  },
});


// Comments Slider
const commentsSwiper = new Swiper(".commentsSwiper", {
  slidesPerView: 1,
  spaceBetween: 20,

  navigation: {
    nextEl: ".swiper-button-next-comments",
    prevEl: ".swiper-button-prev-comments",
  },

  pagination: {
    el: ".commentsSwiper .swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
    1280: {
      slidesPerView: 5,
      spaceBetween: 10,
    },
  },
});

// Toggle between series and movies
const seriesBtn = document.getElementById("series-btn");
const movieBtn = document.getElementById("movie-btn");
const seriesContainer = document.getElementById("series-container");
const movieContainer = document.getElementById("movie-container");

seriesBtn.addEventListener("click", function () {
  seriesBtn.classList.add("bg-primary");
  seriesBtn.classList.remove("bg-darker");
  movieBtn.classList.add("bg-darker");
  movieBtn.classList.remove("bg-primary");
  seriesContainer.classList.remove("hidden");
  movieContainer.classList.add("hidden");
});

movieBtn.addEventListener("click", function () {
  movieBtn.classList.add("bg-primary");
  movieBtn.classList.remove("bg-darker");
  seriesBtn.classList.add("bg-darker");
  seriesBtn.classList.remove("bg-primary");
  movieContainer.classList.remove("hidden");
  seriesContainer.classList.add("hidden");
});

// Live Search
const searchInput = document.getElementById("search-input");
const searchResults = document.getElementById("search-results");

searchInput.addEventListener("focus", function () {
  searchResults.classList.add("active");
});

searchInput.addEventListener("input", function () {
  if (this.value.length > 0) {
    searchResults.innerHTML = "";
    // Simulate search results
    const movies = [
      "Đế Chế Rồng: Phần Cuối",
      "Võ Sĩ Đạo: Con Đường Vinh Quang",
      "Chiến Binh Bất Tử",
      "Vũ Trụ Song Song",
      "Huyền Thoại Rồng",
    ];

    const filteredMovies = movies.filter((movie) =>
      movie.toLowerCase().includes(this.value.toLowerCase())
    );

    if (filteredMovies.length > 0) {
      filteredMovies.forEach((movie) => {
        const resultItem = document.createElement("div");
        resultItem.className =
          "p-3 hover:bg-dark cursor-pointer border-b border-gray-700";
        resultItem.innerHTML = `
                        <a href="detail.html" class="flex items-center gap-3">
                            <img src="https://placehold.co/100x150/black/10B981?text=Movie" alt="${movie}" class="w-10 h-14 object-cover rounded">
                            <div>
                                <h4 class="font-bold">${movie}</h4>
                                <p class="text-xs text-gray-400">Phim lẻ</p>
                            </div>
                        </a>
                    `;
        searchResults.appendChild(resultItem);
      });
    } else {
      searchResults.innerHTML =
        '<div class="p-3 text-center text-gray-400">Không tìm thấy kết quả</div>';
    }

    searchResults.classList.add("active");
  } else {
    searchResults.classList.remove("active");
  }
});

document.addEventListener("click", function (e) {
  if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
    searchResults.classList.remove("active");
  }
});

// Action buttons functionality
function toggleLike(button) {
  button.classList.toggle("active");
  if (button.classList.contains("active")) {
    button.innerHTML = '<i class="fas fa-heart"></i>';
  } else {
    button.innerHTML = '<i class="far fa-heart"></i>';
  }
}

function toggleSave(button) {
  button.classList.toggle("active");
  if (button.classList.contains("active")) {
    button.innerHTML = '<i class="fas fa-bookmark"></i>';
  } else {
    button.innerHTML = '<i class="far fa-bookmark"></i>';
  }
}

function toggleNotify(button) {
  button.classList.toggle("active");
  if (button.classList.contains("active")) {
    button.innerHTML = '<i class="fas fa-bell"></i>';
    alert("Bạn sẽ nhận được thông báo khi phim được phát hành!");
  } else {
    button.innerHTML = '<i class="far fa-bell"></i>';
  }
}

function shareMovie(title) {
  if (navigator.share) {
    navigator
      .share({
        title: title,
        text: "Xem phim " + title + " trên PhimHay",
        url: window.location.href,
      })
      .catch(console.error);
  } else {
    alert("Đã sao chép liên kết phim " + title + " vào clipboard!");
  }
}

function likeComment(button) {
  const countSpan = button.querySelector("span");
  let count = parseInt(countSpan.textContent);

  if (button.classList.contains("text-primary")) {
    button.classList.remove("text-primary");
    button.classList.add("text-gray-400");
    countSpan.textContent = count - 1;
  } else {
    button.classList.remove("text-gray-400");
    button.classList.add("text-primary");
    countSpan.textContent = count + 1;
  }
}

function replyComment(button) {
  const commentSection = button.closest("div").parentElement;
  const replyForm = document.createElement("div");
  replyForm.className = "mt-3";
  replyForm.innerHTML = `
            <textarea placeholder="Viết trả lời của bạn..." class="w-full bg-dark border border-gray-700 rounded-lg p-2 text-light text-sm focus:border-primary focus:outline-none"></textarea>
            <div class="flex justify-end mt-2">
                <button class="bg-primary hover:bg-opacity-80 text-white font-bold py-1 px-3 text-sm rounded-full transition">Gửi</button>
            </div>
        `;

  // Check if reply form already exists
  if (!commentSection.querySelector("textarea")) {
    commentSection.appendChild(replyForm);
  }
}


const loadMoreAnime = document.getElementById("load-more-anime");
const animeContainer = document.querySelector(".anime-container");

let currentPage = 1;

loadMoreAnime.addEventListener("click", async function () {
  this.innerHTML = '<span class="loader"></span>';

  try {
    const response = await fetch(`/api/load-anime.php?page=${currentPage + 1}`);
    const data = await response.json();

    data.movies.forEach(movie => {
      const card = document.createElement("div");
      card.className = "card rounded-xl overflow-hidden";
      card.innerHTML = `
        <a href="/chi-tiet/${movie.slug}" class="block">
            <img src="${movie.poster_url}" alt="${movie.name}" class="w-full aspect-[3/4] object-cover rounded-lg">
        </a>
        <div class="p-2 text-center">
            <a href="/chi-tiet/${movie.slug}" class="block">
                <h3 class="font-bold text-lg line-clamp-1">${movie.name}</h3>
                <p class="text-sm text-gray-400 line-clamp-1">${movie.year}</p>
            </a>
        </div>
      `;
      animeContainer.appendChild(card);
    });

    currentPage++;

    if (!data.has_more) {
      loadMoreAnime.style.display = "none";
    } else {
      this.innerHTML = "Xem thêm";
    }
  } catch (err) {
    console.error("Lỗi khi load:", err);
    this.innerHTML = "Thử lại";
  }
});

