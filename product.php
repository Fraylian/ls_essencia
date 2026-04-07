<?php include 'includes/header.php'; ?>
<?php require 'data/products.php'; ?>

<?php
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if (!isset($products[$id])) {
    echo "
    <div class='min-h-[60vh] flex flex-col items-center justify-center text-center px-4'>
        <h2 class='font-serif text-4xl text-brand font-bold mb-4'>Producto no encontrado</h2>
        <a href='index.php' class='bg-brand text-white px-8 py-3 rounded-full hover:bg-brand-dark transition shadow-lg'>Volver al inicio</a>
    </div>";
    include 'includes/footer.php';
    exit;
}
$product = $products[$id];
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Breadcrumb -->
    <nav class="flex mb-10 text-sm text-gray-500">
        <a href="index.php" class="hover:text-brand">Inicio</a>
        <span class="mx-2">/</span>
        <a href="index.php#catalogo" class="hover:text-brand">Colección</a>
        <span class="mx-2">/</span>
        <span class="text-brand font-medium"><?php echo $product['name']; ?></span>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20">
        <!-- Images Section -->
        <div class="space-y-6">
            <div class="relative bg-white rounded-2xl overflow-hidden shadow-xl aspect-square group">
                <img id="mainImage" src="<?php echo $product['images'][0]; ?>" alt="<?php echo $product['name']; ?>"
                    class="w-full h-full object-cover transition duration-500">
                <div class="absolute inset-0 ring-1 ring-inset ring-black/5 rounded-2xl"></div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <?php foreach ($product['images'] as $index => $img): ?>
                    <div class="relative rounded-xl overflow-hidden cursor-pointer bg-white aspect-square hover:ring-2 ring-brand transition"
                        onclick="changeImage(this.querySelector('img'))">
                        <img src="<?php echo $img; ?>"
                            class="w-full h-full object-cover hover:scale-110 transition duration-300 opacity-80 hover:opacity-100">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Details Section -->
        <div class="flex flex-col justify-center">
            <h1 class="font-serif text-4xl md:text-5xl font-bold text-brand-dark mb-4 leading-tight">
                <?php echo $product['name']; ?></h1>

            <div class="flex items-center space-x-4 mb-8">
                <span class="text-3xl font-light text-brand">RD$
                    <?php echo number_format($product['price'], 2); ?></span>
                <span
                    class="bg-pink-sec/20 text-brand px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">En
                    Stock</span>
            </div>

            <p class="text-lg text-gray-600 leading-relaxed mb-8 font-light">
                <?php echo $product['description']; ?>
            </p>

            <!-- <div class="mb-8 p-6 bg-white/60 rounded-xl border border-white shadow-sm backdrop-blur-sm">
                <h3 class="font-serif text-lg font-bold text-brand mb-3">Ingredientes Clave</h3>
                <p class="text-gray-500 italic text-sm leading-relaxed border-l-2 border-pink-sec pl-4">
                    <?php echo $product['ingredients']; ?>
                </p>
            </div> -->

            <form action="cart_actions.php" method="POST" class="mt-auto pt-6 border-t border-gray-200">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex items-center border border-gray-300 rounded-full px-4 py-2 bg-white w-max">
                        <label for="quantity" class="text-sm font-bold text-gray-500 mr-3">CANT</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="10"
                            class="w-12 text-center text-lg font-bold text-brand focus:outline-none bg-transparent">
                    </div>

                    <button type="submit"
                        class="flex-1 bg-brand text-white text-lg font-bold py-3 px-8 rounded-full shadow-lg hover:bg-brand-dark hover:shadow-brand/30 transition transform hover:-translate-y-1 flex justify-center items-center gap-2">
                        <span>Agregar al Carrito</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                        </svg>
                    </button>
                </div>
            </form>

            <div class="mt-8 flex gap-6 text-sm text-gray-400 justify-center sm:justify-start">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Envío Seguro</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                        </path>
                    </svg>
                    <span>Devolución Garantizada</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changeImage(thumb) {
        const mainImg = document.getElementById('mainImage');
        // Simple fade effect
        mainImg.style.opacity = '0.5';
        setTimeout(() => {
            mainImg.src = thumb.src;
            mainImg.style.opacity = '1';
        }, 150);
    }
</script>

<?php include 'includes/footer.php'; ?>