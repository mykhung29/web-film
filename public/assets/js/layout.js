
  // Header scroll effect
    window.addEventListener('scroll', function() {
        const header = document.getElementById('header');
        const backToTop = document.getElementById('backToTop');
        
        if (window.scrollY > 50) {
            header.classList.add('shadow-2xl');
        } else {
            header.classList.remove('shadow-2xl');
        }
        
        // Back to top button
        if (window.scrollY > 300) {
            backToTop.classList.remove('opacity-0', 'invisible');
            backToTop.classList.add('opacity-100', 'visible');
        } else {
            backToTop.classList.add('opacity-0', 'invisible');
            backToTop.classList.remove('opacity-100', 'visible');
        }
    });

    // Mobile menu toggle
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const burgerBtn = document.getElementById('burgerBtn');
        
        mobileMenu.classList.toggle('active');
        mobileOverlay.classList.toggle('hidden');
        burgerBtn.classList.toggle('active');
        
        // Prevent body scroll when menu is open
        document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
    }

    // Mobile dropdown toggle
    function toggleMobileDropdown(id) {
        const dropdown = document.getElementById(id + 'Dropdown');
        const chevron = document.getElementById(id + 'Chevron');
        const isHidden = dropdown.classList.contains('hidden');
        
        // Close all dropdowns first
        document.querySelectorAll('[id$="Dropdown"]').forEach(dd => {
            if (dd !== dropdown) {
                dd.classList.add('hidden');
            }
        });
        
        // Reset all chevrons
        document.querySelectorAll('[id$="Chevron"]').forEach(ch => {
            if (ch !== chevron) {
                ch.classList.remove('rotate-180');
            }
        });
        
        // Toggle current dropdown
        if (isHidden) {
            dropdown.classList.remove('hidden');
            chevron.classList.add('rotate-180');
        } else {
            dropdown.classList.add('hidden');
            chevron.classList.remove('rotate-180');
        }
    }

    // Search functionality
  
    function performSearch(event = null) {
    if (event) event.preventDefault(); // Ngăn form nếu gọi từ submit

    const input = document.querySelector('#searchInput');
    const query = input.value.trim();

    if (query) {
        const slug = query
            .toLowerCase()
            .replace(/\s+/g, '-')      // khoảng trắng → dấu gạch
            .replace(/[^\w\-]+/g, '') // xóa ký tự đặc biệt
            .replace(/\-\-+/g, '-')    // nhiều dấu - → 1 dấu
            .replace(/^-+|-+$/g, '');  // xóa - ở đầu/cuối

        window.location.href = `/tim-kiem/${slug}`;
    }

    return false;
}
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('#desktopSearchForm');
    if (form) {
        form.addEventListener('submit', performSearch);
    }
});
    

    function selectSearch(query) {
        document.getElementById('searchInput').value = query;
        hideAutocomplete();
        performSearch();
    }

    // Search autocomplete
    document.getElementById('searchInput').addEventListener('input', function(e) {
        const query = e.target.value;
        const autocomplete = document.getElementById('searchAutocomplete');
        
        if (query.length > 2) {
            autocomplete.classList.remove('hidden');
        } else {
            autocomplete.classList.add('hidden');
        }
    });

    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            hideAutocomplete();
            performSearch();
        }
    });

    function hideAutocomplete() {
        document.getElementById('searchAutocomplete').classList.add('hidden');
    }

    // Back to top functionality
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Newsletter subscription
    function subscribeNewsletter(event) {
        event.preventDefault();
        const email = event.target.querySelector('input[type="email"]').value;
        
        // Simulate API call
        setTimeout(() => {
            alert('Cảm ơn bạn đã đăng ký! Chúng tôi sẽ gửi thông báo phim mới đến email của bạn.');
            event.target.reset();
        }, 500);
    }

    // Animated counter for stats
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current).toLocaleString();
        }, 20);
    }

    // Initialize counters when in viewport
    function initCounters() {
        const statNumbers = document.querySelectorAll('[data-count]');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = parseInt(entry.target.dataset.count);
                    animateCounter(entry.target, target);
                    observer.unobserve(entry.target);
                }
            });
        });

        statNumbers.forEach(stat => {
            observer.observe(stat);
        });
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.relative')) {
            hideAutocomplete();
        }
    });

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K to focus search
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            document.getElementById('searchInput')?.focus();
        }
        
        // Escape to close mobile menu
        if (e.key === 'Escape') {
            const mobileMenu = document.getElementById('mobileMenu');
            if (mobileMenu.classList.contains('active')) {
                toggleMobileMenu();
            }
        }
    });

    // Initialize everything when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
        initCounters();
        
        // Add active class to current page nav link
        const currentPage = window.location.pathname.split('/').pop();
        const navLinks = document.querySelectorAll('nav a');
        
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPage) {
                link.classList.add('text-primary');
            }
        });
    });
