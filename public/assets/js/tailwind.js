tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary: "#10B981",
        dark: "#0F172A",
        darker: "#0B1120",
        light: "#E2E8F0",
        "dark-bg": "#1E293B",
        'dark-card': "#334155",
      },
      fontFamily: {
        sans: ["Inter", "sans-serif"],
      },
      animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        }
                    }
    },
  },
};

