    </main>

    <!-- Footer -->
    <footer class="bg-brand text-pink-light min-h-[300px] py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-12">
            
            <!-- Company Info -->
            <div class="text-center md:text-left space-y-4">
                <h3 class="font-serif text-3xl font-bold tracking-wider">LS Essencia</h3>
                <p class="text-brand-light font-light italic text-lg leading-relaxed">"La belleza de lo natural en tu cabello"</p>
                <div class="flex justify-center md:justify-start space-x-4 pt-4">
                    <!-- Social Icons (using placeholders/text for now as FA might need kit) -->
                    <a href="#" class="hover:text-white transition transform hover:scale-110">Instagram</a>
                    <span class="text-brand-light">|</span>
                    <a href="#" class="hover:text-white transition transform hover:scale-110">Facebook</a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="text-center md:text-left space-y-4">
                <h4 class="font-serif text-xl font-bold mb-4 border-b border-brand-light/20 pb-2 inline-block md:block">Enlaces Rápidos</h4>
                <ul class="space-y-2">
                    <li><a href="index.php" class="text-brand-light hover:text-white transition duration-300 block py-1">Inicio</a></li>
                    <li><a href="index.php#catalogo" class="text-brand-light hover:text-white transition duration-300 block py-1">Colección</a></li>
                    <li><a href="cart.php" class="text-brand-light hover:text-white transition duration-300 block py-1">Carrito</a></li>
                </ul>
            </div>

            <!-- Newsletter / Contact -->
            <div class="text-center md:text-left space-y-4">
               <h4 class="font-serif text-xl font-bold mb-4 border-b border-brand-light/20 pb-2 inline-block md:block">Contáctanos</h4>
               <p class="text-brand-light text-sm mb-4">Suscríbete para recibir consejos de cuidado capilar.</p>
               <form class="flex flex-col space-y-2">
                   <input type="email" placeholder="Tu Email" class="px-4 py-2 bg-brand-dark/50 border border-brand-light/30 rounded focus:outline-none focus:border-pink-sec text-white placeholder-brand-light/50 transition">
                   <button class="bg-pink-sec text-brand font-bold py-2 px-6 rounded hover:bg-white transition duration-300 shadow-md transform active:scale-95">Suscribir</button>
               </form>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-brand-light/10 mt-12 pt-8 text-center">
            <p class="text-brand-light text-sm">&copy; <?php echo date('Y'); ?> LS Essencia - Productos Naturales. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    
    <!-- Smooth Scroll Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
