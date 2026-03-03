<!-- Menu Section -->
<section id="blog" class="py-24 bg-slate-50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <span
                class="text-red-600 font-bold tracking-wider uppercase text-sm bg-red-50 py-1 px-3 rounded-full">Explore
                Menu</span>
            <h2 class="heading-font text-4xl sm:text-5xl font-bold text-slate-800 mt-4">Our Culinary Delights</h2>
            <p class="mt-4 text-slate-500 max-w-2xl mx-auto text-lg">Taste the finest ingredients prepared by our expert
                chefs.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($data as $item)
            <div
                class="bg-white rounded-3xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition duration-300 flex flex-col group border border-slate-100">
                <div class="relative overflow-hidden aspect-[4/3]">
                    <img src="food_img/{{ $item->image }}" alt="{{ $item->title }}"
                        class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                    <div
                        class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm text-red-600 font-bold px-4 py-2 rounded-full shadow-lg">
                        ${{ $item->price }}
                    </div>
                </div>

                <div class="p-6 sm:p-8 flex flex-col flex-grow">
                    <h3 class="heading-font text-2xl font-bold text-slate-800 mb-3">{{ $item->title }}</h3>
                    <p class="text-slate-500 mb-6 flex-grow">{{ $item->detail }}</p>

                    <form action="{{ url('add_cart', $item->id) }}" method="post" class="mt-auto">
                        @csrf
                        <div class="flex items-center gap-3">
                            <div class="relative w-24">
                                <input name="qty" value="1" type="number" min="1" required
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl px-3 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 transition text-center font-medium">
                            </div>
                            <button type="submit"
                                class="flex-grow bg-slate-900 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-xl transition duration-300 flex justify-center items-center gap-2 group-hover:shadow-md">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>