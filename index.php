<?php include 'includes/header.php'; ?>
<?php require 'data/products.php';
// Select a featured product (e.g., the first one, or specific ID)
$featured_product = $products[8]; // Gotero as featured
?>

<!-- Hero Section -->
<section class="h-screen relative flex items-center justify-center overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="assets/img/hero.png" alt="Hero Background"
            class="w-full h-full object-cover object-center filter blur-[1px] scale-105">
        <div class="absolute inset-0 bg-gradient-to-r from-brand/40 to-pink-sec/20 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-black/10"></div> <!-- Slight darkening for contrast -->
    </div>

    <!-- Content -->
    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto animate-fade-in-up">
        <h1
            class="font-serif text-5xl md:text-7xl lg:text-8xl text-white font-bold mb-6 drop-shadow-lg tracking-tight leading-tight">
            LS Essencia <br><span class="text-3xl md:text-5xl font-light italic block mt-2">Natural Hair Care</span>
        </h1>
        <p class="text-xl md:text-2xl text-pink-100 mb-10 font-light max-w-2xl mx-auto drop-shadow-md">
            Descubre la fuerza y el brillo natural de tu cabello con nuestros productos capilares 100% naturales.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#featured"
                class="bg-white/90 text-brand px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:shadow-xl transition transform hover:-translate-y-1 backdrop-blur-sm">
                Producto Estrella
            </a>
            <a href="#catalogo"
                class="bg-brand/80 text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-brand hover:shadow-xl transition transform hover:-translate-y-1 backdrop-blur-sm border border-white/20">
                Ver Colección
            </a>
        </div>
    </div>

    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce text-white/80">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</section>

<!-- Featured Product Section -->
<section id="featured" class="py-24 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Image Side -->
            <div class="relative group">
                <div
                    class="absolute -inset-4 bg-pink-sec/30 rounded-full blur-xl opacity-70 group-hover:opacity-100 transition duration-500">
                </div>
                <img src="<?php echo $featured_product['images'][0]; ?>" alt="Featured Product"
                    class="relative w-full max-w-md mx-auto rounded-2xl shadow-2xl transform transition duration-500 group-hover:scale-105 z-10 bg-white p-2">
            </div>

            <!-- Text Side -->
            <div class="text-center lg:text-left space-y-8">
                <span class="text-brand uppercase tracking-[0.2em] text-sm font-bold border-b border-brand pb-1">El
                    Favorito de Todas</span>
                <h2 class="font-serif text-5xl md:text-6xl text-brand-dark font-bold leading-tight">
                    <?php echo $featured_product['name']; ?>
                </h2>
                <div class="flex items-center justify-center lg:justify-start space-x-2 text-yellow-500 text-xl">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="text-lg text-gray-600 leading-relaxed max-w-xl">
                    <?php echo $featured_product['description']; ?>
                </p>
                <div class="flex flex-col sm:flex-row items-center gap-6 justify-center lg:justify-start pt-4">
                    <span class="text-4xl font-serif text-brand font-bold">RD$
                        <?php echo number_format($featured_product['price'], 0); ?></span>
                    <a href="product.php?id=<?php echo $featured_product['id']; ?>"
                        class="bg-brand text-white px-10 py-4 rounded-full font-bold text-lg shadow-lg hover:bg-brand-dark hover:shadow-brand/30 transition transform hover:-translate-y-1">
                        Comprar Ahora
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Catalog Section -->
<section id="catalogo" class="py-24 bg-pink-light/50 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <span class="text-brand uppercase tracking-[0.2em] text-sm font-bold block mb-3">Nuestros Productos</span>
            <h2 class="font-serif text-4xl md:text-5xl text-brand-dark font-bold">La Colección Completa</h2>
            <div class="w-24 h-1 bg-brand mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php foreach ($products as $product): ?>
                <!-- Product Card -->
                <div
                    class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col h-full border border-gray-100">
                    <div class="relative overflow-hidden h-80 bg-gray-50 flex items-center justify-center group">
                        <img src="<?php echo $product['images'][0]; ?>" alt="<?php echo $product['name']; ?>"
                            class="h-full w-full object-cover transition duration-700 group-hover:scale-110 group-hover:opacity-90">

                        <!-- Quick Action Overlay -->
                        <div
                            class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <a href="product.php?id=<?php echo $product['id']; ?>"
                                class="bg-white text-brand px-6 py-3 rounded-full font-bold transform translate-y-4 group-hover:translate-y-0 transition duration-300 shadow-lg hover:bg-brand hover:text-white">
                                Ver Detalles
                            </a>
                        </div>
                    </div>

                    <div class="p-8 flex-grow flex flex-col items-center text-center">
                        <h3
                            class="font-serif text-2xl font-bold text-brand-dark mb-2 group-hover:text-pink-sec transition hover:underline decoration-pink-sec underline-offset-4">
                            <a href="product.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                        </h3>
                        <p class="text-sm text-gray-500 mb-6 line-clamp-2"><?php echo $product['short_desc']; ?></p>

                        <div class="mt-auto pt-4 w-full border-t border-gray-100 flex justify-between items-center px-4">
                            <span class="font-bold text-xl text-brand">RD$
                                <?php echo number_format($product['price'], 0); ?></span>
                            <form action="cart_actions.php" method="POST">
                                <input type="hidden" name="action" value="add">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit"
                                    class="text-brand-light hover:text-brand bg-gray-100 hover:bg-pink-sec/20 p-2.5 rounded-full transition duration-300"
                                    title="Agregar al carrito">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section id="about" class="py-24 bg-white relative overflow-hidden">
    <!-- Decorative Elements -->
    <div
        class="absolute top-0 right-0 w-64 h-64 bg-pink-sec/10 rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2">
    </div>
    <div
        class="absolute bottom-0 left-0 w-96 h-96 bg-brand/5 rounded-full blur-3xl transform -translate-x-1/3 translate-y-1/3">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <!-- Content -->
            <div class="order-2 lg:order-1 space-y-8 text-center lg:text-left">

                <span class="text-brand uppercase tracking-[0.2em] text-sm font-bold border-b border-brand pb-1">
                    Nuestra Historia
                </span>

                <h2 class="font-serif text-4xl md:text-5xl text-brand-dark font-bold leading-tight">
                    La Historia Detrás de <span class="text-pink-sec">LS Essencia</span>
                </h2>

                <div class="space-y-6 text-lg text-gray-600 leading-relaxed font-light">

                    <p>
                        Hola, soy <span class="font-bold text-brand">Lorianny</span>, y creé LS Essencia con un
                        propósito claro: devolverle la salud y vitalidad al cabello sin depender de procesos agresivos
                        ni soluciones temporales.
                    </p>

                    <p>
                        Durante mucho tiempo, el cuidado capilar se ha basado en productos que prometen mucho, pero que
                        con el tiempo debilitan la fibra capilar. Entre rutinas complicadas y la frustración de no ver
                        resultados reales, nació una pregunta clave:
                    </p>

                    <p class="italic text-brand font-medium">
                        ¿Es posible tener un cabello sano, hidratado, suave y manejable sin comprometer su estructura
                        natural?
                    </p>

                    <p>
                        Así nace nuestra línea capilar: una propuesta creada desde la intención de transformar no solo
                        el cabello, sino también la relación que tenemos con él.
                    </p>

                    <p>
                        Cada uno de nuestros productos fue diseñado cuidadosamente para trabajar en armonía, formando un
                        sistema completo de 7 pasos que hidrata profundamente, estimula el crecimiento, reduce el frizz
                        y promueve un efecto lacio natural.
                    </p>

                    <p>
                        Nuestra fórmula combina ingredientes seleccionados por sus propiedades nutritivas, reparadoras y
                        fortalecedoras, logrando resultados visibles desde las primeras aplicaciones y, lo más
                        importante, sostenibles en el tiempo.
                    </p>

                    <p class="font-medium text-brand-dark">
                        Más que una línea capilar, somos una experiencia de cuidado consciente.
                    </p>

                    <p>
                        Creemos en la belleza real, en la constancia y en el poder de sentirte segura con tu propio
                        cabello.
                    </p>

                    <p class="font-semibold text-pink-sec">
                        Porque no se trata de cambiar quién eres, sino de potenciar lo mejor de ti.
                    </p>

                </div>

                <!-- Contact -->
                <div class="pt-8">
                    <h3 class="font-serif text-2xl font-bold text-brand mb-6">Contáctanos</h3>
                    <div class="flex flex-col sm:flex-row gap-6 justify-center lg:justify-start">

                        <div class="flex items-center gap-3 text-gray-600">
                            <div
                                class="w-10 h-10 rounded-full bg-pink-light flex items-center justify-center text-brand">
                                <!-- WhatsApp Icon -->
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967..." />
                                </svg>
                            </div>
                            <span class="font-medium">829-684-1252</span>
                        </div>

                        <div class="flex items-center gap-3 text-gray-600">
                            <div
                                class="w-10 h-10 rounded-full bg-pink-light flex items-center justify-center text-brand">
                                <!-- Instagram Icon -->
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07..." />
                                </svg>
                            </div>
                            <span class="font-medium">@ls_essencia</span>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Owner Photo -->
            <div class="order-1 lg:order-2 relative">
                <div
                    class="absolute inset-0 bg-brand rounded-[2rem] transform rotate-6 translate-x-4 translate-y-4 opacity-10">
                </div>

                <div class="relative rounded-[2rem] overflow-hidden shadow-2xl">
                    <img src="assets/img/lorianny.jpeg" alt="Lorianny, Fundadora"
                        class="w-full h-auto object-cover grayscale hover:grayscale-0 transition duration-700">

                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-8">
                        <p class="text-white font-serif text-2xl">"Tu cabello es tu corona."</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>