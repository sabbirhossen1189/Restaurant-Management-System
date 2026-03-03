<!-- Book Table Section -->
<section id="book-table" class="py-24 relative overflow-hidden bg-slate-900 bg-fixed"
    style="background-image: url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&q=80&w=2000'); background-size: cover; background-position: center;">
    <!-- Dark overlay -->
    <div class="absolute inset-0 bg-slate-900/80 mix-blend-multiply border-y border-slate-800"></div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span
                class="text-red-400 font-bold tracking-wider uppercase text-sm border border-red-500/30 bg-red-500/10 py-1 px-3 rounded-full backdrop-blur-sm">Reservation</span>
            <h2 class="heading-font text-4xl sm:text-5xl font-bold text-white mt-4 drop-shadow-md">Book A Table</h2>
            <p class="mt-4 text-slate-300 max-w-2xl mx-auto">Guarantee your spot and let us handle the rest for a
                perfect dining experience.</p>
        </div>

        <div class="bg-white/10 backdrop-blur-md border border-white/20 p-8 sm:p-10 rounded-3xl shadow-2xl">
            <form action="{{ url('book_table') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <input type="text" name="name"
                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                            placeholder="Your Name" required>
                    </div>
                    <div>
                        <input type="email" name="email"
                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                            placeholder="Your Email" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <input type="text" name="phone" id="phone"
                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                            placeholder="Phone Number" required>
                    </div>
                    <div>
                        <input type="number" name="people"
                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                            placeholder="Number Of People" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <input type="date" name="date"
                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                            required>
                    </div>
                    <div>
                        <input type="time" name="time"
                            class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                            required>
                    </div>
                </div>

                <div>
                    <textarea name="message" rows="4"
                        class="w-full bg-slate-900/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-400 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition"
                        placeholder="Additional Requests or Comments"></textarea>
                </div>

                <div class="text-center pt-2">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white w-full md:w-auto px-10 py-4 rounded-xl font-bold text-lg shadow-[0_4px_14px_0_rgba(220,38,38,0.39)] hover:shadow-[0_6px_20px_rgba(220,38,38,0.23)] hover:-translate-y-1 transition duration-300">
                        Book Now
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>