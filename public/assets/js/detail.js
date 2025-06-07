// Initialize AOS
AOS.init({
  duration: 800,
  once: true,
});

// Tab switching
function switchTab(tabName) {
  // Hide all tabs
  document.querySelectorAll(".tab-pane").forEach((pane) => {
    pane.classList.add("hidden");
  });

  // Remove active class from all buttons
  document.querySelectorAll(".tab-btn").forEach((btn) => {
    btn.classList.remove("active");
  });

  // Show selected tab
  document.getElementById(tabName + "-tab").classList.remove("hidden");

  // Add active class to clicked button
  event.target.classList.add("active");
}

// Action buttons
function toggleLike(button) {
  const icon = button.querySelector("i");
  if (icon.classList.contains("far")) {
    icon.classList.remove("far");
    icon.classList.add("fas");
    icon.classList.add("text-primary");
  } else {
    icon.classList.remove("fas");
    icon.classList.add("far");
    icon.classList.remove("text-primary");
  }
}

function toggleBookmark(button) {
  const icon = button.querySelector("i");
  if (icon.classList.contains("far")) {
    icon.classList.remove("far");
    icon.classList.add("fas");
    icon.classList.add("text-primary");
  } else {
    icon.classList.remove("fas");
    icon.classList.add("far");
    icon.classList.remove("text-primary");
  }
}

function shareMovie() {
  if (navigator.share) {
    navigator.share({
      title: "Đế Chế Rồng",
      text: "Xem phim Đế Chế Rồng trên PhimHay",
      url: window.location.href,
    });
  } else {
    // Fallback - copy to clipboard
    navigator.clipboard.writeText(window.location.href);
    alert("Đã sao chép liên kết!");
  }
}

// Episode card click
document.querySelectorAll(".episode-card").forEach((card) => {
  card.addEventListener("click", function () {
    // Remove active from all
    document.querySelectorAll(".episode-card").forEach((c) => {
      c.classList.remove("active");
    });
    // Add active to clicked
    this.classList.add("active");
  });
});

// Smooth scroll for mobile
if (window.innerWidth < 768) {
  document.querySelector(".main-grid").scrollIntoView({ behavior: "smooth" });
}
