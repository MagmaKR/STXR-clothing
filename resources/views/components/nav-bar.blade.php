<div {{ $attributes }}>
 <nav class="fixed w-full z-50 top-4 px-2.5">
    <div class="w-full mx-auto">
        <div class="floating-nav bg-white/80 shadow-lg rounded-full py-4 px-4 md:px-8">
            <div class="flex justify-between items-center">
                <div class="text-xl font-black text-black brand-font tracking-wider">STXR</div>
                <!-- Mobile menu button -->
                <button class="md:hidden" onclick="toggleMobileMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <!-- Desktop menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{route('landing')}}" class="text-black hover:text-gray-600 font-bold">HOME</a>
                    <a href="{{route('shop.all')}}" class="text-black hover:text-gray-600 font-bold">SHOP</a>
                    <a href="#" class="text-black hover:text-gray-600 font-bold">LOGIN</a>
                    <a href="#" class="text-black hover:text-gray-600 relative group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-black text-white text-xs rounded-full h-5 w-5 flex items-center justify-center group-hover:bg-gray-700 transition-colors">
                            0
                        </span>
                    </a>
                </div>
            </div>
            <!-- Mobile menu -->
            <div id="mobileMenu" class="hidden md:hidden mt-4 space-y-4">
                <a href="{{route('landing')}}" class="block text-black hover:text-gray-600 font-bold">HOME</a>
                <a href="{{route('shop.all')}}" class="block text-black hover:text-gray-600 font-bold">SHOP</a>
                <a href="#" class="block text-black hover:text-gray-600 font-bold">LOGIN</a>
            </div>
        </div>
    </div>
 </nav>
</div>