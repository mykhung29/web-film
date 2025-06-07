// Redirect with filters as URL parameters
function redirectFilters() {
  console.log("Redirecting with filters...");
  const params = new URLSearchParams();

  const checkboxes = document.querySelectorAll(".custom-checkbox:checked");
  checkboxes.forEach((checkbox) => {
    const group = checkbox.closest("div").previousElementSibling?.textContent?.toLowerCase();
    
    if (group.includes("thể loại")) {
      params.append("theloai[]", checkbox.value);
    } else if (group.includes("năm")) {
      params.append("year[]", checkbox.value);
    } else if (group.includes("quốc gia")) {
      params.append("quocgia[]", checkbox.value);
    } else if (group.includes("phiên bản")) {
      params.append("version[]", checkbox.value);
    } else if (group.includes("lứa tuổi")) {
      params.append("age[]", checkbox.value);
    }
  });

  // Sort
  const sortSelect = document.querySelector("select");
  if (sortSelect) {
    const selected = sortSelect.value;
    switch (selected) {
      case "newest":
        params.set("sort_by", "year");
        params.set("order", "DESC");
        break;
      case "oldest":
        params.set("sort_by", "year");
        params.set("order", "ASC");
        break;
      case "most-viewed":
        params.set("sort_by", "views");
        params.set("order", "DESC");
        break;
      case "least-viewed":
        params.set("sort_by", "views");
        params.set("order", "ASC");
        break;
      case "rating-high":
        params.set("sort_by", "vote_average");
        params.set("order", "DESC");
        break;
      case "rating-low":
        params.set("sort_by", "vote_average");
        params.set("order", "ASC");
        break;
    }
  }

  const baseUrl = window.location.pathname.split("?")[0];
  window.location.href = `${baseUrl}?${params.toString()}`;
}


// Toggle filter dropdown
function toggleFilter() {
  const dropdown = document.getElementById("filter-dropdown");
  const arrow = document.getElementById("filter-arrow");

  dropdown.classList.toggle("open");
  arrow.classList.toggle("rotate-180");
}

function applyFilters() {
  const checkboxes = document.querySelectorAll(".custom-checkbox:checked");

  const filters = {
    theloai: [],
    year: [],
    quocgia: [],
    version: [],
    age: []
  };

  const knownCountries = ['viet-nam', 'trung-quoc', 'thai-lan', 'nhat-ban', 'my', 'han-quoc'];
  const knownVersions = ['Vietsub', 'Thuyết Minh', 'Lồng Tiếng'];
  const knownAges = ['all', '13+', '16+', '18+'];

  checkboxes.forEach((checkbox) => {
    const value = checkbox.value;
    if (!checkbox.disabled) {
      if (/^\d{4}$/.test(value)) {
        filters.year.push(value);
      } else if (knownVersions.includes(value)) {
        filters.version.push(value);
      } else if (knownAges.includes(value)) {
        filters.age.push(value);
      } else if (knownCountries.includes(value)) {
        filters.quocgia.push(value);
      } else {
        filters.theloai.push(value);
      }
    }
  });

  // Lấy từ khóa tìm kiếm từ URL
  const currentPath = window.location.pathname;
  const match = currentPath.match(/\/tim-kiem\/([^\/?]+)/);
  const searchKeyword = match ? match[1] : '';

  // Tạo query string
  const params = new URLSearchParams();
  filters.theloai.forEach(val => params.append("theloai[]", val));
  filters.year.forEach(val => params.append("year[]", val));
  filters.quocgia.forEach(val => params.append("quocgia[]", val));
  filters.version.forEach(val => params.append("version[]", val));
  filters.age.forEach(val => params.append("age[]", val));

  // Thêm sắp xếp nếu có
  const sort = document.querySelector("select")?.value;
  if (sort) {
    switch (sort) {
      case "newest": params.set("sort_by", "year"); params.set("order", "DESC"); break;
      case "oldest": params.set("sort_by", "year"); params.set("order", "ASC"); break;
      case "most-viewed": params.set("sort_by", "views"); params.set("order", "DESC"); break;
      case "least-viewed": params.set("sort_by", "views"); params.set("order", "ASC"); break;
      case "rating-high": params.set("sort_by", "vote_average"); params.set("order", "DESC"); break;
      case "rating-low": params.set("sort_by", "vote_average"); params.set("order", "ASC"); break;
    }
  }

  const finalUrl = `/tim-kiem/${searchKeyword}${params.toString() ? '?' + params.toString() : ''}`;
  window.location.href = finalUrl;
}


// Clear all filters
function clearFilters() {
  const checkboxes = document.querySelectorAll(".custom-checkbox:checked");
  checkboxes.forEach((checkbox) => {
    if (!checkbox.disabled) {
      checkbox.checked = false;
    }
  });

  // Reset sort dropdown
  document.querySelector("select").value = "newest";

  // Clear active filters display
  updateActiveFilters([]);
}

// Update active filters display
function updateActiveFilters(filters) {
  const container = document.getElementById("active-filters");
  container.innerHTML = "";

  filters.forEach((filter) => {
    const tag = document.createElement("span");
    tag.className = "filter-tag";
    tag.innerHTML = `
            ${filter.label}
            <button onclick="removeFilter('${filter.value}')" class="ml-1 hover:text-primary">
                <i class="fas fa-times text-xs"></i>
            </button>
        `;
    container.appendChild(tag);
  });
}

// Remove individual filter
function removeFilter(value) {
  const checkbox = document.querySelector(`.custom-checkbox[value="${value}"]`);
  if (checkbox) {
    checkbox.checked = false;
    applyFilters();
  }
}

// Toggle favorite
function toggleFavorite(event) {
  event.preventDefault();
  event.stopPropagation();

  const heartIcon = event.currentTarget.querySelector("i");
  if (heartIcon.classList.contains("far")) {
    heartIcon.classList.remove("far");
    heartIcon.classList.add("fas");
    heartIcon.style.color = "#F43F5E"; // Red color for liked
  } else {
    heartIcon.classList.remove("fas");
    heartIcon.classList.add("far");
    heartIcon.style.color = ""; // Reset to default
  }
}

// Handle checkbox changes
document.querySelectorAll(".custom-checkbox").forEach((checkbox) => {
  checkbox.addEventListener("change", function () {
    // Auto-apply filters when changed (optional)
    // applyFilters();
  });
});

// Pagination
document.querySelectorAll(".pagination-item:not(.disabled)")
.forEach((button) => {
    button.addEventListener("click", function () {
      // Remove active class from all
      document.querySelectorAll(".pagination-item").forEach((btn) => {
        btn.classList.remove("active");
      });

      // Add active class to clicked
      this.classList.add("active");

      // Scroll to top
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
});

//checked
document.addEventListener("DOMContentLoaded", () => {
  const params = new URLSearchParams(window.location.search);
  const activeFiltersContainer = document.getElementById("active-filters");

  const filterKeys = ['theloai[]', 'quocgia[]', 'year[]', 'version[]', 'age[]'];

  filterKeys.forEach(key => {
    const values = params.getAll(key);

    values.forEach(value => {
      const tag = document.createElement('span');
      tag.className = 'filter-tag flex items-center gap-1';

      tag.innerHTML = `
        ${value}
        <button class="ml-1 hover:text-primary" onclick="removeFilter('${key}', '${value}')">
          <i class="fas fa-times text-xs"></i>
        </button>
      `;

      activeFiltersContainer.appendChild(tag);
    });
  });
});
//delete filter
function removeFilter(key, value) {
  const params = new URLSearchParams(window.location.search);

  // Lấy tất cả value hiện tại, loại bỏ `value` được chọn
  const values = params.getAll(key).filter(v => v !== value);

  // Xoá tất cả value cũ
  params.delete(key);

  // Gắn lại các value còn lại
  values.forEach(v => params.append(key, v));

  // Reset lại trang về 1 khi xoá
  params.delete("page");

  // Reload trang với URL mới
  const baseUrl = window.location.pathname;
  const query = params.toString();
  window.location.href = `${baseUrl}${query ? '?' + query : ''}`;
}



// Make tooltips stay visible when hovering over them
document.addEventListener("DOMContentLoaded", function () {
  const movieCards = document.querySelectorAll(".movie-card");

  movieCards.forEach((card) => {
    // Reset any inline styles that might be causing issues
    const tooltip = card.querySelector(".movie-tooltip");
    if (tooltip) {
      tooltip.style = "";
    }

    // Remove any existing event listeners by cloning and replacing elements
    if (tooltip) {
      const newTooltip = tooltip.cloneNode(true);
      tooltip.parentNode.replaceChild(newTooltip, tooltip);
    }

    const newCard = card.cloneNode(true);
    card.parentNode.replaceChild(newCard, card);
  });

  // Re-add event listeners to the favorite buttons after cloning
  document.querySelectorAll(".movie-tooltip button").forEach((button) => {
    button.addEventListener("click", function (event) {
      toggleFavorite(event);
    });
  });
});

// Toggle favorite
function toggleFavorite(event) {
  event.preventDefault();
  event.stopPropagation();

  const heartIcon = event.currentTarget.querySelector("i");
  if (heartIcon.classList.contains("far")) {
    heartIcon.classList.remove("far");
    heartIcon.classList.add("fas");
    heartIcon.style.color = "#F43F5E"; // Red color for liked
  } else {
    heartIcon.classList.remove("fas");
    heartIcon.classList.add("far");
    heartIcon.style.color = ""; // Reset to default
  }
}
