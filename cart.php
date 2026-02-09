<?php include 'includes/header.php'; ?>
<?php require 'data/products.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h1 class="font-serif text-4xl font-bold text-brand-dark mb-10 text-center">Tu Carrito de Compras</h1>

    <?php if (empty($_SESSION['cart'])): ?>
        <div class="flex flex-col items-center justify-center py-20 bg-white rounded-3xl shadow-sm border border-gray-50">
            <div class="bg-pink-light p-6 rounded-full mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-brand/50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <p class="text-xl text-gray-500 mb-8 font-light">Tu carrito está esperando por tus favoritos.</p>
            <a href="index.php#catalogo" class="bg-brand text-white px-8 py-3 rounded-full hover:bg-brand-dark transition shadow-lg transform hover:-translate-y-1">Ir a la Colección</a>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Cart Items List -->
            <div class="lg:col-span-2 space-y-6">
                <?php 
                $total = 0;
                foreach ($_SESSION['cart'] as $id => $qty): 
                    if (!isset($products[$id])) continue;
                    $product = $products[$id];
                    $subtotal = $product['price'] * $qty;
                    $total += $subtotal;
                ?>
                <div class="flex flex-col sm:flex-row items-center gap-6 bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-50">
                    <div class="w-full sm:w-24 h-24 flex-shrink-0 bg-gray-100 rounded-xl overflow-hidden">
                        <img src="<?php echo $product['images'][0]; ?>" alt="<?php echo $product['name']; ?>" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="flex-1 text-center sm:text-left">
                        <h3 class="font-serif text-xl font-bold text-brand-dark hover:text-pink-sec transition">
                            <a href="product.php?id=<?php echo $id; ?>"><?php echo $product['name']; ?></a>
                        </h3>
                        <p class="text-sm text-gray-400 mt-1">RD$ <?php echo number_format($product['price'], 2); ?></p>
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="text-gray-500 font-medium bg-gray-50 px-3 py-1 rounded-lg">x<?php echo $qty; ?></span>
                        <p class="font-bold text-lg text-brand w-24 text-right">RD$ <?php echo number_format($subtotal, 0); ?></p>
                    </div>

                    <form action="cart_actions.php" method="POST">
                        <input type="hidden" name="action" value="remove">
                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                        <button type="submit" class="text-gray-400 hover:text-red-500 transition p-2 hover:bg-red-50 rounded-full" title="Eliminar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white p-8 rounded-3xl shadow-lg border border-pink-100 sticky top-24">
                    <h3 class="font-serif text-2xl font-bold text-brand-dark mb-6">Resumen</h3>
                    <div class="space-y-4 mb-8 border-b border-gray-100 pb-8">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span>RD$ <?php echo number_format($total, 2); ?></span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Envío</span>
                            <span class="text-green-500 font-medium">Gratis</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-end mb-8">
                        <span class="text-lg font-bold text-brand-dark">Total Estimado</span>
                        <span class="text-3xl font-serif font-bold text-brand">RD$ <?php echo number_format($total, 2); ?></span>
                    </div>

                    <button onclick="alert('Funcionalidad de pago no implementada en esta demo.');" class="w-full bg-brand text-white py-4 rounded-xl font-bold hover:bg-brand-dark shadow-xl hover:shadow-brand/30 transition transform hover:-translate-y-1 block text-center mb-4">
                        Proceder al Pago
                    </button>
                    
                    <a href="index.php" class="block text-center text-sm text-gray-500 hover:text-brand underline decoration-gray-300 hover:decoration-brand transition">Continuar Comprando</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
