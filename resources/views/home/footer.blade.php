<!-- Footer -->
<footer class="bg-slate-900 border-t border-slate-800 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">

            <div class="lg:col-span-1">
                <a href="{{ url('/') }}" class="flex items-center gap-3 mb-6">
                    <div
                        class="w-10 h-10 bg-red-600 text-white rounded-xl flex items-center justify-center font-bold text-xl heading-font">
                        VS</div>
                    <span class="heading-font font-bold text-2xl text-white">The Velvet Spoon</span>
                </a>
                <p class="text-slate-400 font-light mb-6">
                    Delivering authentic flavors and remarkable dining experiences straight to your table.
                </p>
                <div class="flex space-x-4">
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-red-600 hover:text-white transition duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-red-600 hover:text-white transition duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 hover:bg-red-600 hover:text-white transition duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-bold text-lg mb-6">Quick Links</h4>
                <ul class="space-y-3">
                    <li><a href="#about" class="text-slate-400 hover:text-red-500 transition">About Us</a></li>
                    <li><a href="#blog" class="text-slate-400 hover:text-red-500 transition">Our Menu</a></li>
                    <li><a href="#gallary" class="text-slate-400 hover:text-red-500 transition">Gallery</a></li>
                    <li><a href="#book-table" class="text-slate-400 hover:text-red-500 transition">Book A Table</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold text-lg mb-6">Opening Hours</h4>
                <ul class="space-y-3 text-slate-400">
                    <li class="flex justify-between"><span>Mon - Fri:</span> <span>09:00 AM - 10:00 PM</span></li>
                    <li class="flex justify-between"><span>Saturday:</span> <span>10:00 AM - 11:00 PM</span></li>
                    <li class="flex justify-between text-red-400"><span>Sunday:</span> <span>Closed</span></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold text-lg mb-6">Newsletter</h4>
                <p class="text-slate-400 mb-4">Subscribe to get latest updates and offers.</p>
                <form action="#" class="relative">
                    <input type="email"
                        class="w-full bg-slate-800 border border-slate-700 rounded-full py-3 px-4 text-white placeholder-slate-500 focus:outline-none focus:border-red-500"
                        placeholder="Your Email">
                    <button type="submit"
                        class="absolute right-1 top-1 bottom-1 bg-red-600 text-white rounded-full px-4 hover:bg-red-700 transition">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>

        </div>

        <div
            class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center text-slate-500 text-sm">
            <p>&copy;
                <script>document.write(new Date().getFullYear())</script> The Velvet Spoon. All Rights Reserved.
            </p>
            <p class="mt-4 md:mt-0">Made with <i class="fas fa-heart text-red-600 mx-1"></i> by Moshiur</p>
        </div>
    </div>
</footer>