<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STXR - Premium Fashion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    @viteReactRefresh
    @vite(['resources/js/app.tsx'])
  
    <style>
        .hero-height {
            height: 100vh;
        }
        .brand-font {
            font-family: 'Montserrat', sans-serif;
        }
        .floating-nav {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        .logo-3d {
            transform-style: preserve-3d;
            transform: perspective(1000px);
        }
        .star-logo {
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
            filter: invert(1) brightness(100);
            width: 180px;
            height: 120px;
            animation: rotateLeftToRight 5s infinite ease-in-out;
        }

        /* Add responsive styles */
        @media (max-width: 768px) {
            .star-logo {
                width: 120px;
                height: 80px;
            }
            
            h1.text-\[200px\] {
                font-size: 100px;
            }
            
            .text-4xl {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 640px) {
            .star-logo {
                width: 90px;
                height: 60px;
            }
            
            h1.text-\[200px\] {
                font-size: 60px;
            }
            
            .text-4xl {
                font-size: 1.5rem;
            }
        }

        @keyframes rotateLeftToRight {
            0% {
                transform: translate(-50%, -50%) rotateY(0deg);
            }
            50% {
                transform: translate(-50%, -50%) rotateY(180deg);
            }
            100% {
                transform: translate(-50%, -50%) rotateY(360deg);
            }
        }
    </style>
</head>
<body class="bg-black overflow-x-hidden">
    <!-- Navigation -->
    <x-nav-bar> 
        
    </x-nav-bar>

    <!-- Hero Section -->
    <div class="relative bg-black hero-height">
        <!-- Star Logo -->
        <img src="/Images/image-removebg.png" class="star-logo justify-center" alt="">
        
        <!-- 3D Text Container -->
        <div class="relative max-w-9xl mx-auto px-4 h-full flex flex-col items-center justify-center">
            <div id="hero-text-root"></div>
        </div>
    </div>

    <!-- Gradient Transition -->
    <div class="h-32 bg-gradient-to-b from-black  to-slate-200"></div>

    <section id="latest-drops">
    <!-- Products Section -->
    <div class="bg-slate-200 py-20">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-black mb-12 brand-font text-center">LATEST DROPS</h2>
            
            <!-- Product Slider with Navigation -->
            <div class="relative max-w-6xl mx-auto px-4 md:px-12">
                <!-- Previous Button -->
                <button id="prevBtn" class="absolute -left-4 md:-left-20 top-1/2 -translate-y-1/2 bg-black text-white p-2 rounded-full hover:bg-gray-800 transition z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- Products Container -->
                <div id="productsContainer" class="flex gap-4 md:gap-8 transition-transform duration-500">
                    @php
                        $latestProducts = App\Models\Product::with(['images', 'StockManagement'])
                            ->latest('id')  // This orders by id desc
                            ->take(6)       // Takes the last 6
                            ->get();
                    @endphp

                    @foreach($latestProducts as $index => $product)
                    <div class="product-card flex-none w-full sm:w-1/2 md:w-1/3 {{ $index >= 3 ? 'hidden' : '' }}">
                        <div class="bg-gray-100 group overflow-hidden rounded-3xl">
                            <div class="aspect-w-3 aspect-h-4 overflow-hidden p-4 border-b border-black">
                                <img src="{{ $product->images->first()->ImageUrl1 ?? '/images/SRXR-TSHIRT-removebg-preview.png' }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-[400px] object-contain transform transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2 brand-font">{{ $product->name }}</h3>
                                <p class="text-gray-800 mb-4 text-lg font-bold">R{{ number_format($product->price, 2) }}</p>
                                <a href="#" class="inline-block bg-black text-white px-6 py-3 font-bold hover:bg-gray-900 transition duration-300">
                                    VIEW DETAILS
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Next Button -->
                <button id="nextBtn" class="absolute -right-4 md:-right-20 top-1/2 -translate-y-1/2 bg-black text-white p-2 rounded-full hover:bg-gray-800 transition z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Dots Navigation -->
            <div class="flex justify-center space-x-2 mt-8">
                @for($i = 0; $i < ceil(count($latestProducts) / 3); $i++)
                    <button class="slider-dot w-3 h-3 rounded-full bg-gray-300 {{ $i === 0 ? 'bg-black' : '' }}" data-index="{{ $i }}"></button>
                @endfor
            </div>
        </div>
    </div>

</section>

<div class="h-32 bg-gradient-to-b from-slate-200 to-black"></div>
    <div class="bg-black py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-wrap items-center">
                <!-- Image Section -->
                <div class="w-full md:w-1/2 -ml-20">
                    <img src="/images/STXRSTORY.jpeg" alt="Cheetah" >
                </div>

                <!-- Text Content Section -->
                <div class="w-full md:w-1/2 text-white pl-12">
                    <h2 class="text-4xl font-black mb-8 brand-font">OUR STORY</h2>
                    <p class="text-gray-300 mb-12 text-lg leading-relaxed">
                        Born from a passion for pushing boundaries, STXR emerged as a fusion of street culture and luxury fashion. 
                        Our journey began with a simple vision: to create clothing that empowers individuals to express their unique identity. 
                        Like the stars that inspire our name, we believe every person has the potential to shine and stand out.
                    </p>

                    <h2 class="text-4xl font-black mb-8 brand-font">WHY CHOOSE STXR</h2>
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-200">Premium Quality</h3>
                            <p class="text-gray-300 leading-relaxed">
                                Every piece in our collection is crafted with meticulous attention to detail, 
                                using only the finest materials to ensure lasting quality and comfort.
                            </p>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-200">Unique Design</h3>
                            <p class="text-gray-300 leading-relaxed">
                                Our designs blend contemporary street style with timeless elegance, 
                                creating pieces that are both bold and sophisticated.
                            </p>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-200">Sustainability</h3>
                            <p class="text-gray-300 leading-relaxed">
                                We're committed to responsible fashion, implementing eco-friendly practices 
                                throughout our production process while maintaining the highest standards of quality.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Horizontal Line -->
    <div class="w-full border-t border-gray-600"></div>

    <!-- Footer Section -->
    <footer class="bg-black text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Brand Section -->
                <div>
                    <h3 class="text-2xl font-black mb-6 brand-font">STXR</h3>
                    <p class="text-gray-400 mb-4">Style that speaks volume. For the people by the people</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/stxr.apparel/" class="text-gray-400 hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Resources Section -->
                <div>
                    <h3 class="text-lg font-bold mb-6">Resources</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition">Customer Support</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition">Contact Us</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition">Shipping & Returns</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition">FAQs</a>
                        </li>
                    </ul>
                </div>

                <!-- Legal Section -->
                <div>
                    <h3 class="text-lg font-bold mb-6">Legal</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition">Terms of Service</a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-400 hover:text-white transition">Cookie Policy</a>
                        </li>
                    </ul>
                </div>

                <!-- Newsletter Section -->
                

            <!-- Copyright Section -->
            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">&copy; 2024 STXR. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Add mobile menu toggle function
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }

        // Update product slider functionality for mobile
        const productsContainer = document.getElementById('productsContainer');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const productCards = document.querySelectorAll('.product-card');
        const dots = document.querySelectorAll('.slider-dot');
        let currentIndex = 0;
        let cardsPerPage = 3;

        // Update cards per page based on screen width
        function updateCardsPerPage() {
            if (window.innerWidth < 640) {
                cardsPerPage = 1;
            } else if (window.innerWidth < 768) {
                cardsPerPage = 2;
            } else {
                cardsPerPage = 3;
            }
            return Math.ceil(productCards.length / cardsPerPage);
        }

        let totalPages = updateCardsPerPage();

        // Update on window resize
        window.addEventListener('resize', () => {
            totalPages = updateCardsPerPage();
            currentIndex = 0;
            updateSlider();
        });

        // Mouse move animation for the text
        const movingText = document.getElementById('moving-text');
        const maxRotation = 10; // Maximum rotation in degrees

        document.addEventListener('mousemove', (e) => {
            const { clientX, clientY } = e;
            const { innerWidth, innerHeight } = window;
            
            // Calculate rotation based on mouse position
            const rotateX = maxRotation * ((clientY - innerHeight / 2) / innerHeight);
            const rotateY = -maxRotation * ((clientX - innerWidth / 2) / innerWidth);
            
            // Apply the transformation
            movingText.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });

        // Reset position when mouse leaves
        document.addEventListener('mouseleave', () => {
            movingText.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
        });

        function updateSlider() {
            productCards.forEach((card, index) => {
                const shouldShow = index >= currentIndex * cardsPerPage && index < (currentIndex + 1) * cardsPerPage;
                card.classList.toggle('hidden', !shouldShow);
            });

            // Update dots
            dots.forEach((dot, index) => {
                dot.classList.toggle('bg-black', index === currentIndex);
                dot.classList.toggle('bg-gray-300', index !== currentIndex);
            });

            // Update button states
            prevBtn.disabled = currentIndex === 0;
            nextBtn.disabled = currentIndex === totalPages - 1;
            prevBtn.style.opacity = prevBtn.disabled ? '0.5' : '1';
            nextBtn.style.opacity = nextBtn.disabled ? '0.5' : '1';
        }

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });

        nextBtn.addEventListener('click', () => {
            if (currentIndex < totalPages - 1) {
                currentIndex++;
                updateSlider();
            }
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentIndex = index;
                updateSlider();
            });
        });

        // Initial update
        updateSlider();
    </script>
</body>
</html>

