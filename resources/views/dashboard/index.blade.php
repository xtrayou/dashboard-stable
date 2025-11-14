<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Monitoring - Diskominfo Purwakarta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .carousel-container {
            scroll-behavior: smooth;
        }

        .slide-item {
            min-width: 300px;
            flex-shrink: 0;
        }

        @media (max-width: 640px) {
            .slide-item {
                min-width: 250px;
            }
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Header -->
    <header class="gradient-bg shadow-lg">
        <div class="container mx-auto px-4 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-bar text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Dashboard Monitoring</h1>
                        <p class="text-blue-100">Diskominfo Kabupaten Purwakarta</p>
                    </div>
                </div>
                <nav class="hidden md:flex space-x-6">
                    <a href="/" class="text-white hover:text-blue-200 transition duration-200">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                    <a href="/dashboard" class="text-white hover:text-blue-200 transition duration-200">
                        <i class="fas fa-chart-line mr-2"></i>Analytics
                    </a>
                    <a href="/dashboard/main" class="text-white hover:text-blue-200 transition duration-200">
                        <i class="fas fa-tachometer-alt mr-2"></i>Main Dashboard
                    </a>
                    <a href="/dashboard/server" class="text-white hover:text-blue-200 transition duration-200">
                        <i class="fas fa-server mr-2"></i>Server
                    </a>
                    <a href="/dashboard/old" class="text-white hover:text-blue-200 transition duration-200 border-b-2 border-white pb-1">
                        <i class="fas fa-table mr-2"></i>Classic View
                    </a>
                    <a href="/admin" class="text-white hover:text-blue-200 transition duration-200">
                        <i class="fas fa-cog mr-2"></i>Admin
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Statistics Cards -->
    <section class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6 card-hover animate-fade-in">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-building text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Total OPD</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalOpds ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 card-hover animate-fade-in" style="animation-delay: 0.1s">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-globe text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Total Domain</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $totalDomains ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 card-hover animate-fade-in" style="animation-delay: 0.2s">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Domain Aktif</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $activeDomains ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6 card-hover animate-fade-in" style="animation-delay: 0.3s">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-500 text-sm">Domain Tidak Aktif</p>
                        <p class="text-2xl font-bold text-gray-800">{{ $inactiveDomains ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OPD Carousel Section -->
    <section class="container mx-auto px-4 py-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Daftar Organisasi Perangkat Daerah</h2>
                <p class="text-gray-600">Slide untuk melihat semua OPD</p>
            </div>
            <div class="flex space-x-2">
                <button onclick="slideLeft()" class="w-10 h-10 bg-blue-500 hover:bg-blue-600 text-white rounded-full flex items-center justify-center transition duration-200">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button onclick="slideRight()" class="w-10 h-10 bg-blue-500 hover:bg-blue-600 text-white rounded-full flex items-center justify-center transition duration-200">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="relative overflow-hidden">
            <div id="carousel" class="flex space-x-6 carousel-container overflow-x-auto pb-4" style="scroll-snap-type: x mandatory;">
                @if(isset($opds) && $opds->count() > 0)
                @foreach($opds as $opd)
                <div class="slide-item bg-white rounded-lg shadow-md p-6 card-hover" style="scroll-snap-align: start;">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-building text-white text-2xl"></i>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $opd->nama ?? 'Nama OPD' }}</h3>
                            <p class="text-gray-500 text-sm">{{ $opd->singkatan ?? 'SINGKATAN' }}</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total Domain:</span>
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm font-medium">
                                {{ $opd->domains_count ?? 0 }} domain
                            </span>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Status:</span>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium">
                                <i class="fas fa-check-circle mr-1"></i>Aktif
                            </span>
                        </div>

                        <div class="pt-3 border-t">
                            <a href="/dashboard/opd/{{ $opd->id ?? '#' }}" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200 inline-flex items-center justify-center">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <!-- Sample Data jika belum ada data -->
                @for($i = 1; $i <= 8; $i++)
                    <div class="slide-item bg-white rounded-lg shadow-md p-6 card-hover" style="scroll-snap-align: start;">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-building text-white text-2xl"></i>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">OPD Sample {{ $i }}</h3>
                            <p class="text-gray-500 text-sm">SAMPLE{{ $i }}</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total Domain:</span>
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm font-medium">
                                {{ rand(2, 15) }} domain
                            </span>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Status:</span>
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-medium">
                                <i class="fas fa-check-circle mr-1"></i>Aktif
                            </span>
                        </div>

                        <div class="pt-3 border-t">
                            <a href="/dashboard/opd/{{ $i }}" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-medium py-2 px-4 rounded-lg transition duration-200 inline-flex items-center justify-center">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat Detail
                            </a>
                        </div>
                    </div>
            </div>
            @endfor
            @endif
        </div>
        </div>

        <!-- Indicators -->
        <div class="flex justify-center mt-6">
            <div class="flex space-x-2" id="indicators">
                <!-- Auto-generated by JavaScript -->
            </div>
        </div>
    </section>

    <!-- Recent Activity -->
    <section class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Aktivitas Terbaru</h2>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b">
                <h3 class="text-lg font-medium text-gray-800">Domain Terbaru</h3>
            </div>
            <div class="divide-y divide-gray-200">
                @if(isset($domains) && $domains->count() > 0)
                @foreach($domains as $domain)
                <div class="px-6 py-4 hover:bg-gray-50 transition duration-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-globe text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-800">{{ $domain->nama ?? 'Domain Name' }}</h4>
                                <p class="text-sm text-gray-500">{{ $domain->opd->nama ?? 'OPD Name' }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    {{ ($domain->status ?? 'active') === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($domain->status ?? 'active') }}
                            </span>
                            <p class="text-xs text-gray-500 mt-1">{{ $domain->created_at?->diffForHumans() ?? 'Baru saja' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                @for($j = 1; $j <= 5; $j++)
                    <div class="px-6 py-4 hover:bg-gray-50 transition duration-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-globe text-blue-600"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-800">domain-sample{{ $j }}.purwakartakab.go.id</h4>
                                <p class="text-sm text-gray-500">Sample OPD {{ $j }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Aktif
                            </span>
                            <p class="text-xs text-gray-500 mt-1">{{ $j }} jam yang lalu</p>
                        </div>
                    </div>
            </div>
            @endfor
            @endif
        </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2025 Diskominfo Kabupaten Purwakarta. All rights reserved.</p>
        </div>
    </footer>

    <script>
        const carousel = document.getElementById('carousel');
        const slideWidth = 318; // 300px + 18px gap
        let currentIndex = 0;
        const totalSlides = carousel.children.length;
        const visibleSlides = Math.floor(carousel.parentElement.clientWidth / slideWidth);
        const maxIndex = Math.max(0, totalSlides - visibleSlides);

        function slideLeft() {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        }

        function slideRight() {
            if (currentIndex < maxIndex) {
                currentIndex++;
                updateCarousel();
            }
        }

        function updateCarousel() {
            const translateX = currentIndex * slideWidth;
            carousel.style.transform = `translateX(-${translateX}px)`;
            updateIndicators();
        }

        function createIndicators() {
            const indicatorsContainer = document.getElementById('indicators');
            indicatorsContainer.innerHTML = '';

            const totalIndicators = maxIndex + 1;
            for (let i = 0; i <= maxIndex; i++) {
                const indicator = document.createElement('button');
                indicator.className = 'w-3 h-3 rounded-full transition duration-200';
                indicator.onclick = () => goToSlide(i);
                indicatorsContainer.appendChild(indicator);
            }
        }

        function updateIndicators() {
            const indicators = document.querySelectorAll('#indicators button');
            indicators.forEach((indicator, index) => {
                if (index === currentIndex) {
                    indicator.className = 'w-3 h-3 rounded-full transition duration-200 bg-blue-500';
                } else {
                    indicator.className = 'w-3 h-3 rounded-full transition duration-200 bg-gray-300';
                }
            });
        }

        function goToSlide(index) {
            currentIndex = index;
            updateCarousel();
        }

        // Auto-slide functionality
        let autoSlideInterval;

        function startAutoSlide() {
            autoSlideInterval = setInterval(() => {
                if (currentIndex < maxIndex) {
                    slideRight();
                } else {
                    currentIndex = 0;
                    updateCarousel();
                }
            }, 5000); // 5 seconds
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        // Touch/swipe support for mobile
        let startX = 0;
        let isDragging = false;

        carousel.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
            isDragging = true;
            stopAutoSlide();
        });

        carousel.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
        });

        carousel.addEventListener('touchend', (e) => {
            if (!isDragging) return;

            const endX = e.changedTouches[0].clientX;
            const diff = startX - endX;

            if (Math.abs(diff) > 50) { // Minimum swipe distance
                if (diff > 0) {
                    slideRight();
                } else {
                    slideLeft();
                }
            }

            isDragging = false;
            startAutoSlide();
        });

        // Mouse drag support
        carousel.addEventListener('mousedown', (e) => {
            startX = e.clientX;
            isDragging = true;
            stopAutoSlide();
            carousel.style.cursor = 'grabbing';
        });

        document.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
        });

        document.addEventListener('mouseup', (e) => {
            if (!isDragging) return;

            const endX = e.clientX;
            const diff = startX - endX;

            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    slideRight();
                } else {
                    slideLeft();
                }
            }

            isDragging = false;
            carousel.style.cursor = 'grab';
            startAutoSlide();
        });

        // Hover pause
        carousel.addEventListener('mouseenter', stopAutoSlide);
        carousel.addEventListener('mouseleave', startAutoSlide);

        // Initialize
        window.addEventListener('load', () => {
            createIndicators();
            startAutoSlide();

            // Handle window resize
            window.addEventListener('resize', () => {
                const newVisibleSlides = Math.floor(carousel.parentElement.clientWidth / slideWidth);
                const newMaxIndex = Math.max(0, totalSlides - newVisibleSlides);
                if (currentIndex > newMaxIndex) {
                    currentIndex = newMaxIndex;
                    updateCarousel();
                }
                createIndicators();
            });
        });
    </script>
</body>

</html>