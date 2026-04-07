<?php include 'includes/header.php'; ?>
<?php require 'data/all_products.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h1 class="font-serif text-4xl font-bold text-brand-dark mb-10 text-center">Tu Carrito de Compras</h1>

    <?php if (empty($_SESSION['cart'])): ?>
        <div class="flex flex-col items-center justify-center py-20 bg-white rounded-3xl shadow-sm border border-gray-50">
            <div class="bg-pink-light p-6 rounded-full mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-brand/50" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <p class="text-xl text-gray-500 mb-8 font-light">Tu carrito está esperando por tus favoritos.</p>
            <a href="index.php#catalogo"
                class="bg-brand text-white px-8 py-3 rounded-full hover:bg-brand-dark transition shadow-lg transform hover:-translate-y-1">
                Ir a la Colección
            </a>
        </div>
    <?php else: ?>

        <?php
        $total = 0;
        ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- 🛍️ LISTA DE PRODUCTOS -->
            <div class="lg:col-span-2 space-y-6">
                <?php
                foreach ($_SESSION['cart'] as $id => $qty):
                    if (!isset($all_products[$id]))
                        continue;
                    $product = $all_products[$id];
                    $subtotal = $product['price'] * $qty;
                    $total += $subtotal;
                    ?>
                    <div
                        class="flex flex-col sm:flex-row items-center gap-6 bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition border border-gray-50">

                        <div class="w-full sm:w-24 h-24 flex-shrink-0 bg-gray-100 rounded-xl overflow-hidden">
                            <img src="<?php echo $product['images'][0]; ?>" class="w-full h-full object-cover">
                        </div>

                        <div class="flex-1 text-center sm:text-left">
                            <h3 class="font-serif text-xl font-bold text-brand-dark">
                                <?php echo $product['name']; ?>
                            </h3>
                            <p class="text-sm text-gray-400 mt-1">
                                RD$ <?php echo number_format($product['price'], 0); ?>
                            </p>
                        </div>

                        <div class="flex items-center gap-4">
                            <span class="text-gray-500 font-medium bg-gray-50 px-3 py-1 rounded-lg">
                                x<?php echo $qty; ?>
                            </span>
                            <p class="font-bold text-lg text-brand w-24 text-right">
                                RD$ <?php echo number_format($subtotal, 0); ?>
                            </p>
                        </div>

                        <form action="cart_actions.php" method="POST">
                            <input type="hidden" name="action" value="remove">
                            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                            <button type="submit" class="text-red-500 hover:bg-red-50 p-2 rounded-full">
                                ❌
                            </button>
                        </form>

                    </div>
                <?php endforeach; ?>
            </div>

            <!-- 📦 RESUMEN -->
            <div class="lg:col-span-1">
                <div class="bg-white p-8 rounded-3xl shadow-lg border border-pink-100 sticky top-24">

                    <h3 class="font-serif text-2xl font-bold text-brand-dark mb-6">Resumen</h3>

                    <div class="space-y-4 mb-8 border-b pb-8">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>RD$ <?php echo number_format($total, 0); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span>Envío</span>
                            <span class="text-green-500">Gratis</span>
                        </div>
                    </div>

                    <div class="flex justify-between mb-8">
                        <span class="font-bold">Total</span>
                        <span class="text-2xl font-bold text-brand">
                            RD$ <?php echo number_format($total, 0); ?>
                        </span>
                    </div>

                    <!-- 🧾 FORMULARIO -->
                    <div class="mb-6 space-y-4">
                        <input type="text" id="nombre" placeholder="Nombre completo"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand">

                        <input type="text" id="direccion" placeholder="Dirección de entrega"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand">

                        <input type="text" id="telefono" placeholder="Teléfono"
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand">
                    </div>

                    <?php
                    // Generar base del mensaje (productos)
                    $baseMessage = "🛒 *Nuevo pedido - LS Essencia* %0A%0A";

                    foreach ($_SESSION['cart'] as $id => $qty) {
                        if (!isset($all_products[$id]))
                            continue;
                        $product = $all_products[$id];

                        $baseMessage .= "✨ *" . $product['name'] . "*%0A";
                        $baseMessage .= "Cantidad: " . $qty . "%0A%0A";
                    }

                    $baseMessage .= "💰 *Total:* RD$ " . number_format($total, 0) . "%0A%0A";
                    ?>

                    <!-- 📲 BOTÓN -->
                    <button onclick="enviarPedido()"
                        class="w-full bg-green-500 text-white py-4 rounded-xl font-bold hover:bg-green-600 shadow-xl transition mb-4">
                        Pedir por WhatsApp
                    </button>

                    <a href="index.php" class="block text-center text-sm text-gray-500 hover:text-brand">
                        Seguir comprando
                    </a>

                    <script>
                        function enviarPedido() {
                            let nombre = document.getElementById('nombre').value;
                            let direccion = document.getElementById('direccion').value;
                            let telefono = document.getElementById('telefono').value;

                            if (!nombre || !direccion || !telefono) {
                                alert("Por favor completa todos los datos");
                                return;
                            }

                            let mensaje = "<?php echo $baseMessage; ?>";

                            mensaje += "📍 *Datos de entrega*%0A";
                            mensaje += "👤 Nombre: " + nombre + "%0A";
                            mensaje += "📍 Dirección: " + direccion + "%0A";
                            mensaje += "📞 Teléfono: " + telefono + "%0A%0A";
                            mensaje += "✨ Gracias por elegir LS Essencia 💖";

                            let url = "https://wa.me/18296841252?text=" + mensaje;

                            window.open(url, '_blank');
                        }
                    </script>
                </div>
            </div>

        </div>

    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>