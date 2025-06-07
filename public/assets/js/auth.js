let isAnimating = false;
let currentTab = "login";

function switchTab(tab) {
  if (isAnimating || currentTab === tab) return;

  isAnimating = true;
  const loginTab = document.getElementById("loginTab");
  const registerTab = document.getElementById("registerTab");
  const loginForm = document.getElementById("loginForm");
  const registerForm = document.getElementById("registerForm");

  // Update tab buttons
  if (tab === "login") {
    loginTab.className =
      "flex-1 py-3 px-6 text-center font-semibold rounded-xl transition-all duration-300 bg-gradient-to-r from-primary to-emerald-600 text-white shadow-lg tab-button active";
    registerTab.className =
      "flex-1 py-3 px-6 text-center font-semibold rounded-xl transition-all duration-300 text-gray-600 hover:text-gray-800 hover:bg-gray-50 tab-button";
  } else {
    registerTab.className =
      "flex-1 py-3 px-6 text-center font-semibold rounded-xl transition-all duration-300 bg-gradient-to-r from-primary to-emerald-600 text-white shadow-lg tab-button active";
    loginTab.className =
      "flex-1 py-3 px-6 text-center font-semibold rounded-xl transition-all duration-300 text-gray-600 hover:text-gray-800 hover:bg-gray-50 tab-button";
  }

  // Animate forms
  const currentForm = currentTab === "login" ? loginForm : registerForm;
  const targetForm = tab === "login" ? loginForm : registerForm;
  const isMovingRight = currentTab === "login" && tab === "register";

  // Slide out current form
  if (isMovingRight) {
    currentForm.classList.add("slide-left");
  } else {
    currentForm.classList.add("slide-right");
  }

  setTimeout(() => {
    currentForm.classList.add("hidden");
    currentForm.classList.remove("slide-left", "slide-right");

    // Prepare target form
    if (isMovingRight) {
      targetForm.style.transform = "translateX(100%)";
    } else {
      targetForm.style.transform = "translateX(-100%)";
    }
    targetForm.style.opacity = "0";
    targetForm.classList.remove("hidden");

    // Animate target form in
    setTimeout(() => {
      targetForm.style.transform = "translateX(0)";
      targetForm.style.opacity = "1";

      currentTab = tab;
      isAnimating = false;
    }, 50);
  }, 200);
}

// Toggle password visibility
function togglePassword(inputId) {
  const input = document.getElementById(inputId);
  const type = input.getAttribute("type") === "password" ? "text" : "password";
  input.setAttribute("type", type);
}

// Password strength checker
function checkPasswordStrength(password) {
  let strength = 0;
  const checks = [
    password.length >= 8,
    /[a-z]/.test(password),
    /[A-Z]/.test(password),
    /[0-9]/.test(password),
    /[^A-Za-z0-9]/.test(password),
  ];

  strength = checks.filter((check) => check).length;
  return Math.min(strength, 4);
}

// Update password strength indicator
function updatePasswordStrength() {
  const password = document.getElementById("registerPassword").value;
  const strength = checkPasswordStrength(password);
  const strengthElements = ["strength1", "strength2", "strength3", "strength4"];
  const strengthText = document.getElementById("strengthText");

  const colors = ["bg-red-500", "bg-orange-500", "bg-yellow-500", "bg-primary"];
  const texts = ["Rất yếu", "Yếu", "Trung bình", "Mạnh"];

  strengthElements.forEach((id, index) => {
    const element = document.getElementById(id);
    if (element) {
      element.className = `h-1 w-1/4 rounded-full transition-colors duration-300 ${
        index < strength ? colors[strength - 1] : "bg-white/20"
      }`;
    }
  });

  if (strengthText) {
    if (password.length > 0) {
      strengthText.textContent = `Độ mạnh: ${texts[strength - 1] || "Rất yếu"}`;
      strengthText.className = `text-xs mt-1 ${
        strength >= 3
          ? "text-primary"
          : strength >= 2
          ? "text-yellow-400"
          : "text-red-400"
      }`;
    } else {
      strengthText.textContent = "Độ mạnh mật khẩu";
      strengthText.className = "text-xs text-white/60 mt-1";
    }
  }
}

// Email validation
function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(email);
}

// Notification system
function showNotification(message, type) {
  const notification = document.createElement("div");
  notification.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-xl text-white font-medium transform translate-x-full transition-transform duration-300 ${
    type === "success"
      ? "bg-gradient-to-r from-primary to-emerald-600"
      : "bg-gradient-to-r from-red-500 to-red-600"
  }`;
  notification.textContent = message;

  document.body.appendChild(notification);

  setTimeout(() => {
    notification.classList.remove("translate-x-full");
  }, 100);

  setTimeout(() => {
    notification.classList.add("translate-x-full");
    setTimeout(() => {
      if (document.body.contains(notification)) {
        document.body.removeChild(notification);
      }
    }, 300);
  }, 3000);
}

// Initialize event listeners when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
  // Password strength listener
  const registerPassword = document.getElementById("registerPassword");
  if (registerPassword) {
    registerPassword.addEventListener("input", updatePasswordStrength);
  }

  // Form submission listeners
  const loginForm = document.querySelector("#loginForm form");
  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const email = document.getElementById("loginEmail").value;
      const password = document.getElementById("loginPassword").value;

      if (!email || !password) {
        showNotification("Vui lòng điền đầy đủ thông tin!", "error");
        return;
      }

      if (!validateEmail(email)) {
        showNotification("Email không hợp lệ!", "error");
        return;
      }

      showNotification("Đăng nhập thành công!", "success");
      console.log("Login data:", { email, password });
    });
  }

  const registerForm = document.querySelector("#registerForm form");
  if (registerForm) {
    registerForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const firstName = document.getElementById("firstName").value;
      const lastName = document.getElementById("lastName").value;
      const email = document.getElementById("registerEmail").value;
      const password = document.getElementById("registerPassword").value;
      const confirmPassword = document.getElementById("confirmPassword").value;

      if (!firstName || !lastName || !email || !password || !confirmPassword) {
        showNotification("Vui lòng điền đầy đủ thông tin!", "error");
        return;
      }

      if (!validateEmail(email)) {
        showNotification("Email không hợp lệ!", "error");
        return;
      }

      if (password !== confirmPassword) {
        showNotification("Mật khẩu xác nhận không khớp!", "error");
        return;
      }

      if (checkPasswordStrength(password) < 2) {
        showNotification(
          "Mật khẩu quá yếu! Vui lòng tạo mật khẩu mạnh hơn.",
          "error"
        );
        return;
      }

      showNotification("Đăng ký thành công!", "success");
      console.log("Register data:", { firstName, lastName, email, password });
    });
  }

  // Real-time validation
  const loginEmail = document.getElementById("loginEmail");
  if (loginEmail) {
    loginEmail.addEventListener("blur", function () {
      if (this.value && !validateEmail(this.value)) {
        this.classList.add("border-red-500");
        this.classList.remove("border-white/20");
      } else {
        this.classList.remove("border-red-500");
        this.classList.add("border-white/20");
      }
    });
  }

  const registerEmail = document.getElementById("registerEmail");
  if (registerEmail) {
    registerEmail.addEventListener("blur", function () {
      if (this.value && !validateEmail(this.value)) {
        this.classList.add("border-red-500");
        this.classList.remove("border-white/20");
      } else {
        this.classList.remove("border-red-500");
        this.classList.add("border-white/20");
      }
    });
  }

  const confirmPassword = document.getElementById("confirmPassword");
  if (confirmPassword) {
    confirmPassword.addEventListener("input", function () {
      const password = document.getElementById("registerPassword").value;
      if (this.value && this.value !== password) {
        this.classList.add("border-red-500");
        this.classList.remove("border-white/20");
      } else {
        this.classList.remove("border-red-500");
        this.classList.add("border-white/20");
      }
    });
  }
});
