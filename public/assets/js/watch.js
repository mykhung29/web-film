// Tab switching
function switchTab(tabName) {
  // Hide all tabs
  document.querySelectorAll(".tab-content").forEach((tab) => {
    tab.classList.add("hidden");
  });

  // Show selected tab
  document.getElementById(tabName + "-tab").classList.remove("hidden");

  // Update tab indicator
  const tabs = ["episodes", "comments", "related"];
  const index = tabs.indexOf(tabName);
  const indicator = document.querySelector(".tab-indicator");
  indicator.style.left = index * 33.33 + "%";

  // Update tab button styles
  const buttons = document.querySelectorAll('[onclick^="switchTab"]');
  buttons.forEach((btn, i) => {
    if (i === index) {
      btn.classList.add("text-primary");
      btn.classList.remove("text-gray-400");
    } else {
      btn.classList.remove("text-primary");
      btn.classList.add("text-gray-400");
    }
  });
}

// Episode click handler
document.querySelectorAll(".episode-item").forEach((item) => {
  item.addEventListener("click", function () {
    if (!this.classList.contains("active")) {
      // Remove active from all
      document.querySelectorAll(".episode-item").forEach((ep) => {
        ep.classList.remove("active");
      });
      // Add active to clicked
      this.classList.add("active");
      showToast("Đang tải tập phim...");
    }
  });
});

// Like functionality
function toggleLike(button) {
  const icon = button.querySelector("i");
  if (icon.classList.contains("far")) {
    icon.classList.remove("far");
    icon.classList.add("fas", "text-primary");
    showToast("Đã thêm vào danh sách yêu thích");
  } else {
    icon.classList.remove("fas", "text-primary");
    icon.classList.add("far");
    showToast("Đã xóa khỏi danh sách yêu thích");
  }
}

// Bookmark functionality
function toggleBookmark(button) {
  const icon = button.querySelector("i");
  if (icon.classList.contains("far")) {
    icon.classList.remove("far");
    icon.classList.add("fas", "text-primary");
    showToast("Đã lưu vào danh sách xem sau");
  } else {
    icon.classList.remove("fas", "text-primary");
    icon.classList.add("far");
    showToast("Đã xóa khỏi danh sách xem sau");
  }
}

// Share functionality
function shareMovie() {
  if (navigator.share) {
    navigator.share({
      title: "Đế Chế Rồng - Tập 1",
      text: "Xem phim Đế Chế Rồng trên PhimHay",
      url: window.location.href,
    });
  } else {
    navigator.clipboard.writeText(window.location.href);
    showToast("Đã sao chép liên kết!");
  }
}

// Toast notification
function showToast(message) {
  const toast = document.getElementById("toast");
  const toastMessage = document.getElementById("toast-message");
  toastMessage.textContent = message;
  toast.classList.add("show");

  setTimeout(() => {
    toast.classList.remove("show");
  }, 3000);
}

// Toggle switches
document.querySelectorAll('input[type="checkbox"]').forEach((toggle) => {
  toggle.addEventListener("change", function () {
    const label =
      this.parentElement.parentElement.querySelector("span").textContent;
    if (this.checked) {
      showToast(`Đã bật ${label}`);
    } else {
      showToast(`Đã tắt ${label}`);
    }
  });
});

// Floating action button
document.querySelector(".fab").addEventListener("click", function () {
  switchTab("comments");
  window.scrollTo({
    top: document.querySelector("#comments-tab").offsetTop - 100,
    behavior: "smooth",
  });
});

// Keyboard shortcuts
document.addEventListener("keydown", function (e) {
  if (e.code === "Space" && e.target.tagName !== "TEXTAREA") {
    e.preventDefault();
    // Play/pause video
  }
  if (e.code === "ArrowLeft") {
    // Previous episode
  }
  if (e.code === "ArrowRight") {
    // Next episode
  }
});

// Grid/List view toggle
function setListView() {
  const container = document.getElementById("episodes-container");
  const listBtn = document.getElementById("list-view-btn");
  const gridBtn = document.getElementById("grid-view-btn");

  container.classList.remove("episodes-grid");
  container.classList.add("episodes-list", "space-y-2");

  listBtn.classList.add("bg-gray-800");
  gridBtn.classList.remove("bg-gray-800");

  document.querySelectorAll(".episode-item").forEach((item) => {
    item.style.position = "relative";
  });

  saveViewPreference("list");
}

function setGridView() {
  const container = document.getElementById("episodes-container");
  const listBtn = document.getElementById("list-view-btn");
  const gridBtn = document.getElementById("grid-view-btn");

  container.classList.remove("episodes-list", "space-y-2");
  container.classList.add("episodes-grid");

  gridBtn.classList.add("bg-gray-800");
  listBtn.classList.remove("bg-gray-800");

  document.querySelectorAll(".episode-item").forEach((item) => {
    item.style.position = "relative";
  });

  saveViewPreference("grid");
}

// Save view preference
function saveViewPreference(view) {
  localStorage.setItem("episodeViewPreference", view);
}

// Load view preference on page load
document.addEventListener("DOMContentLoaded", function () {
  const savedView = localStorage.getItem("episodeViewPreference");
  if (savedView === "grid") {
    setGridView();
  }
});
