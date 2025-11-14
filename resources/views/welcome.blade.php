<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Monitoring - Diskominfo Purwakarta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --github-dark: #0d1117;
            --github-darker: #010409;
            --github-gray: #21262d;
            --github-border: #30363d;
            --github-text: #f0f6fc;
            --github-text-secondary: #7d8590;
            --github-blue: #58a6ff;
            --github-green: #3fb950;
        }

        body {
            background: var(--github-dark);
            color: var(--github-text);
        }

        .github-container {
            background-image: linear-gradient(135deg, rgba(88, 166, 255, 0.1) 0%, rgba(63, 185, 80, 0.1) 100%),
            radial-gradient(ellipse at top, rgba(88, 166, 255, 0.2), transparent 60%),
            url("{{ asset('assets/bg-welcomepage.jpg') }}");
            background-size:
                100% 100%,
                100% 600px,
                cover;
            background-position:
                center,
                top,
                center;
            background-repeat: no-repeat;
            background-attachment: scroll, scroll, fixed;
        }

        .github-overlay {
            background: linear-gradient(180deg,
                    rgba(13, 17, 23, 0.75) 0%,
                    rgba(13, 17, 23, 0.85) 40%,
                    rgba(13, 17, 23, 0.95) 80%,
                    rgba(13, 17, 23, 0.98) 100%);
        }

        .github-card {
            background: rgba(33, 38, 45, 0.6);
            border: 1px solid var(--github-border);
            backdrop-filter: blur(12px);
        }

        .github-btn-primary {
            background: linear-gradient(180deg, #54aeff 0%, #206bc4 100%);
            border: 1px solid rgba(240, 246, 252, 0.1);
            box-shadow: 0 1px 0 rgba(255, 255, 255, 0.25) inset, 0 1px 6px rgba(0, 0, 0, 0.15);
        }

        .github-btn-primary:hover {
            background: linear-gradient(180deg, #3c90e8 0%, #1f5f99 100%);
            border-color: rgba(240, 246, 252, 0.15);
        }

        .github-btn-secondary {
            background: rgba(33, 38, 45, 0.8);
            border: 1px solid var(--github-border);
        }

        .github-btn-secondary:hover {
            background: rgba(48, 54, 61, 0.8);
            border-color: #6e7681;
        }

        .logo-glow {
            filter: drop-shadow(0 0 20px rgba(88, 166, 255, 0.5));
        }

        .fade-in {
            animation: fadeInUp 0.8s ease-out;
        }

        .fade-in-delay {
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .github-grid-bg {
            background-image:
                linear-gradient(rgba(240, 246, 252, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(240, 246, 252, 0.03) 1px, transparent 1px);
            background-size: 24px 24px;
        }

        .stats-card {
            background: rgba(33, 38, 45, 0.4);
            border: 1px solid rgba(48, 54, 61, 0.6);
            backdrop-filter: blur(8px);
        }

        .feature-icon {
            background: linear-gradient(135deg, var(--github-blue), var(--github-green));
        }

        .wallpaper-blur {
            backdrop-filter: blur(1px);
        }

        .welcome-content {
            background: rgba(13, 17, 23, 0.3);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .hero-glow {
            box-shadow:
                0 0 30px rgba(88, 166, 255, 0.3),
                0 0 60px rgba(88, 166, 255, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .bg-pattern {
            background-image:
                radial-gradient(circle at 25% 25%, rgba(88, 166, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(63, 185, 80, 0.1) 0%, transparent 50%);
        }

        /* Responsive wallpaper adjustments */
        @media (max-width: 768px) {
            .github-container {
                background-attachment: scroll, scroll, scroll;
            }
        }

        /* Wallpaper loading optimization */
        .github-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(13, 17, 23, 0.8), rgba(13, 17, 23, 0.6));
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
            z-index: 1;
        }

        .github-container.loading::before {
            opacity: 1;
        }
    </style>
</head>

<body class="antialiased font-sans">
    <div class="min-h-screen github-container relative">
        <!-- Wallpaper Background Effects -->
        <div class="absolute inset-0 bg-pattern"></div>

        <!-- Grid Background -->
        <div class="absolute inset-0 github-grid-bg opacity-20"></div>

        <!-- Overlay for Content Readability -->
        <div class="absolute inset-0 github-overlay"></div>

        <!-- Header Navigation -->
        <header class="relative z-30 border-b border-gray-700/50">
            <div class="container mx-auto px-6 py-4">
                <nav class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('assets/logo-diskominfo-purwakarta.jpg') }}"
                            alt="Logo Diskominfo Purwakarta"
                            class="h-10 w-10 rounded-full logo-glow">
                        <div>
                            <h1 class="text-lg font-semibold text-white">Diskominfo</h1>
                            <p class="text-xs text-gray-400">Kabupaten Purwakarta</p>
                        </div>
                    </div>
                    <div class="hidden md:flex items-center space-x-6">
                        <a href="#features" class="text-gray-300 hover:text-white transition-colors">
                            Features
                        </a>
                        <a href="#about" class="text-gray-300 hover:text-white transition-colors">
                            About
                        </a>
                        <a href="/admin" class="github-btn-secondary px-4 py-2 rounded-md text-sm font-medium text-white transition-all hover:scale-105">
                            <i class="fas fa-cog mr-2"></i>Admin
                        </a>
                    </div>
                </nav>
            </div>
        </header>

        <!-- Hero Section -->
        <div class="relative z-20 pt-24 pb-16">
            <div class="container mx-auto px-6 text-center relative">
                <!-- Hero Background Enhancement -->
                <div class="absolute inset-0 hero-glow rounded-3xl opacity-20 -z-10"></div>

                <!-- Logo Section -->
                <div class="mb-8 fade-in">
                    <div class="inline-flex items-center justify-center w-24 h-24 mb-6 rounded-full bg-gradient-to-br from-blue-500/20 to-green-500/20 backdrop-blur-sm border border-gray-600/50">
                        <img src="{{ asset('assets/logo-diskominfo-purwakarta.jpg') }}"
                            alt="Logo Diskominfo Purwakarta"
                            class="w-16 h-16 rounded-full logo-glow">
                    </div>
                </div>

                <!-- Main Heading -->
                <div class="mb-12 fade-in-delay">
                    <h1 class="text-6xl md:text-7xl font-bold text-white mb-6 leading-tight">
                        Dashboard
                        <span class="bg-gradient-to-r from-blue-400 to-green-400 bg-clip-text text-transparent">
                            Monitoring
                        </span>
                    </h1>
                    <p class="text-xl md:text-2xl text-gray-300 mb-4 max-w-3xl mx-auto">
                        Sistem monitoring domain dan subdomain OPD Kabupaten Purwakarta
                    </p>
                    <p class="text-md text-gray-400 max-w-2xl mx-auto">
                        Pantau status, performa, dan kelola domain website OPD secara real-time dengan dashboard yang modern dan user-friendly
                    </p>
                </div>

                <!-- CTA Buttons -->
                <div class="mb-16 fade-in-delay">
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        <a href="/dashboard" class="github-btn-primary px-8 py-4 rounded-lg text-lg font-semibold text-white transition-all hover:scale-105 inline-flex items-center">
                            <i class="fas fa-chart-line mr-3"></i>
                            Analytics Dashboard
                        </a>
                        <a href="/dashboard/main" class="github-btn-secondary border border-blue-500 bg-blue-600/20 px-8 py-4 rounded-lg text-lg font-medium text-white transition-all hover:scale-105 hover:bg-blue-600/30 inline-flex items-center">
                            <i class="fab fa-microsoft mr-3"></i>
                            Main Dashboard
                        </a>
                        <a href="/dashboard/server" class="github-btn-secondary border border-purple-500 bg-purple-600/20 px-8 py-4 rounded-lg text-lg font-medium text-white transition-all hover:scale-105 hover:bg-purple-600/30 inline-flex items-center">
                            <i class="fas fa-server mr-3"></i>
                            Server Infrastructure
                        </a>
                        <a href="#features" class="github-btn-secondary px-8 py-4 rounded-lg text-lg font-medium text-white transition-all hover:scale-105 inline-flex items-center">
                            <i class="fas fa-info-circle mr-3"></i>
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto mb-20 fade-in-delay">
                    <div class="stats-card rounded-lg p-6 text-center">
                        <div class="feature-icon w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chart-line text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Real-time</h3>
                        <p class="text-gray-400">Monitoring status secara real-time</p>
                    </div>

                    <div class="stats-card rounded-lg p-6 text-center">
                        <div class="feature-icon w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Secure</h3>
                        <p class="text-gray-400">Keamanan data terjamin</p>
                    </div>

                    <div class="stats-card rounded-lg p-6 text-center">
                        <div class="feature-icon w-12 h-12 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Multi-OPD</h3>
                        <p class="text-gray-400">Mendukung semua OPD</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <section id="features" class="relative z-20 py-20">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-white mb-4">Fitur Unggulan</h2>
                    <p class="text-xl text-gray-400">Semua yang Anda butuhkan untuk monitoring domain</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="github-card rounded-lg p-8 hover:scale-105 transition-transform">
                        <div class="feature-icon w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-tachometer-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-4">Dashboard Analytics</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Visualisasi data yang komprehensif dengan charts dan graphs yang mudah dipahami untuk monitoring performa domain.
                        </p>
                    </div>

                    <div class="github-card rounded-lg p-8 hover:scale-105 transition-transform">
                        <div class="feature-icon w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-bell text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-4">Alert System</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Sistem notifikasi otomatis ketika terjadi gangguan atau perubahan status pada domain yang dimonitor.
                        </p>
                    </div>

                    <div class="github-card rounded-lg p-8 hover:scale-105 transition-transform">
                        <div class="feature-icon w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-file-export text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-4">Export Reports</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Export laporan monitoring dalam berbagai format untuk keperluan dokumentasi dan analisis lebih lanjut.
                        </p>
                    </div>

                    <div class="github-card rounded-lg p-8 hover:scale-105 transition-transform">
                        <div class="feature-icon w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-users-cog text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-4">Multi-User Access</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Sistem manajemen user dengan role-based access control untuk keamanan dan kontrol akses yang tepat.
                        </p>
                    </div>

                    <div class="github-card rounded-lg p-8 hover:scale-105 transition-transform">
                        <div class="feature-icon w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-mobile-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-4">Mobile Responsive</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Interface yang responsive dan mobile-friendly untuk akses monitoring dari berbagai perangkat kapan saja.
                        </p>
                    </div>

                    <div class="github-card rounded-lg p-8 hover:scale-105 transition-transform">
                        <div class="feature-icon w-16 h-16 rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-cloud text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-4">Cloud Integration</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Integrasi dengan cloud services dan API external untuk data synchronization dan backup otomatis.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="relative z-20 border-t border-gray-700/50 py-8">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="flex items-center space-x-3 mb-4 md:mb-0">
                        <img src="{{ asset('assets/logo-diskominfo-purwakarta.jpg') }}"
                            alt="Logo Diskominfo Purwakarta"
                            class="h-8 w-8 rounded-full">
                        <span class="text-gray-400">&copy; 2025 Diskominfo Kabupaten Purwakarta</span>
                    </div>
                    <div class="flex items-center space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Wallpaper loading optimization
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.github-container');
            container.classList.add('loading');

            // Preload wallpaper image
            const wallpaperImg = new Image();
            wallpaperImg.onload = function() {
                setTimeout(() => {
                    container.classList.remove('loading');
                }, 500); // Small delay for smooth transition
            };
            wallpaperImg.src = "{{ asset('assets/bg-welcomepage.jpg') }}";
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Enhanced parallax effect for wallpaper
        let ticking = false;

        function updateParallax() {
            const scrolled = window.pageYOffset;
            const parallaxContainer = document.querySelector('.github-container');
            if (parallaxContainer) {
                // Subtle parallax effect for wallpaper
                const parallaxSpeed = scrolled * 0.3;
                parallaxContainer.style.backgroundPosition = `center ${parallaxSpeed}px, top, center`;
            }
            ticking = false;
        }

        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        });

        // Fade in animation for content
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements with fade-in classes
        document.querySelectorAll('.fade-in, .fade-in-delay').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>

</html>