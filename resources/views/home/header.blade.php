@include('home.navbar')

{{-- Hero Section --}}
<header id="home" class="relative pt-32 pb-12 lg:pt-48 lg:pb-16 overflow-hidden bg-slate-900">
    <div class="absolute inset-0 opacity-40 mix-blend-multiply">
        <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?q=80&w=2000&auto=format&fit=crop"
            alt="Restaurant Interior" class="w-full h-full object-cover" />
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pb-12 md:pb-0">
        <span
            class="inline-block py-1 px-3 rounded-full bg-red-600/20 text-red-400 font-semibold text-sm tracking-wider uppercase mb-4 border border-red-500/30 backdrop-blur-sm">Welcome
            to our restaurant</span>

        <h1
            class="heading-font text-5xl md:text-7xl font-bold text-white mb-6 drop-shadow-lg leading-tight lg:leading-none">
            The Velvet Spoon
        </h1>

        <p class="mt-4 text-xl md:text-2xl text-slate-200 max-w-3xl mx-auto font-light mb-10 drop-shadow-md px-2">
            Always Fresh & Delightful. Experience the finest culinary journey featuring exquisite flavors and remarkable
            ambiance.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center px-6 sm:px-0">
            <a href="#blog"
                class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-full font-semibold text-lg transition duration-300 shadow-[0_0_20px_rgba(220,38,38,0.4)] hover:shadow-[0_0_25px_rgba(220,38,38,0.6)] transform hover:-translate-y-1 w-full sm:w-auto">
                Explore Menu
            </a>
            <a href="#book-table"
                class="bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-full font-semibold text-lg transition duration-300 transform hover:-translate-y-1 w-full sm:w-auto">
                Book a Table
            </a>
        </div>
    </div>

    {{-- Seamless wave transition — two layers so no bleed-through at any wave height --}}
    <div class="absolute bottom-0 left-0 w-full" style="line-height:0;">
        {{-- Back layer: solid bg colour so dark never shows through at wave peaks --}}
        <div class="absolute bottom-0 left-0 w-full bg-slate-50" style="height:60px;"></div>
        {{-- Front layer: the actual wave shape --}}
        <svg class="relative block w-full" style="height:60px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60"
            preserveAspectRatio="none">
            <path d="M0,30 C240,60 480,0 720,30 C960,60 1200,0 1440,30 L1440,60 L0,60 Z" class="fill-slate-900" />
        </svg>
    </div>
</header>