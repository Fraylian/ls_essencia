<?php include 'includes/header.php'; ?>
<?php require 'data/accessories.php'; ?>

<?php
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if (!isset($accessories[$id])) {
    echo "<div class='min-h-screen flex flex-col items-center justify-center font-serif text-2xl text-gray-400'>
            <p>La pieza que buscas no está disponible.</p>
            <a href='index.php' class='mt-4 text-sm uppercase tracking-widest text-brOrange'>Volver a la colección</a>
          </div>";
    include 'includes/footer.php';
    exit;
}
$item = $accessories[$id];
?>

<div class="bg-white min-h-screen">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <ol class="flex items-center space-x-2 text-[10px] uppercase tracking-[0.2em] text-gray-400">
            <li><a href="index.php" class="hover:text-brOrange transition-colors">Colección</a></li>
            <li><span class="px-2">/</span></li>
            <li class="text-gray-900"><?php echo $item['category']; ?></li>
        </ol>
    </nav>

    <div class="max-w-7xl mx-auto px-4 pb-24 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-16 items-start">
            
            <div class="lg:col-span-7 space-y-4">
                <div class="aspect-[4/5] bg-[#f9f9f9] overflow-hidden group">
                    <img src="<?php echo $item['images'][0]; ?>" 
                         alt="<?php echo $item['name']; ?>" 
                         class="w-full h-full object-center object-cover hover:scale-105 transition-transform duration-1000">
                </div>
                <div class="grid grid-cols-4 gap-4">
                     <div class="aspect-square bg-gray-50 border border-brOrange/20"></div>
                     <div class="aspect-square bg-gray-50"></div>
                </div>
            </div>

            <div class="mt-12 lg:mt-0 lg:col-span-5 sticky top-24">
                <div class="border-b border-gray-100 pb-8">
                    <span class="text-brOrange font-bold text-[10px] uppercase tracking-[0.3em] block mb-2">Ref. LS-0<?php echo $item['id']; ?></span>
                    <h1 class="text-4xl md:text-5xl font-serif text-gray-900 leading-tight mb-4"><?php echo $item['name']; ?></h1>
                    <p class="text-2xl font-light text-gray-800 tracking-tight">RD$ <?php echo number_format($item['price'], 2); ?></p>
                </div>

                <div class="py-8 space-y-6">
                    <p class="text-gray-500 leading-relaxed font-light italic">
                        "<?php echo $item['short_desc']; ?>"
                    </p>
                    <div class="text-sm text-gray-600 leading-relaxed space-y-4">
                        <p><?php echo $item['description']; ?></p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 py-6 border-y border-gray-50 mb-8 text-[10px] uppercase tracking-widest text-gray-400 font-bold">
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-brOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path></svg>
                        <span>Material Premium</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-4 h-4 text-brOrange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path></svg>
                        <span>Hipoalergénico</span>
                    </div>
                </div>

                <form action="cart_actions.php" method="POST" class="space-y-4">
                    <input type="hidden" name="action" value="add">
                    <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                    <input type="hidden" name="quantity" value="1">
                    
                    <button type="submit" class="group relative w-full bg-gray-900 text-white py-5 px-8 text-xs uppercase tracking-[0.3em] font-bold overflow-hidden transition-all hover:bg-brOrange">
                        <span class="relative z-10">Añadir a la Bolsa</span>
                    </button>
                    
                    <div class="flex flex-col items-center space-y-2 pt-4">
                        <p class="text-[10px] text-gray-400 uppercase tracking-widest">
                            <span class="text-brOrange">●</span> Envío gratuito en pedidos sobre RD$ 3,000
                        </p>
                        <p class="text-[10px] text-gray-400 uppercase tracking-widest">Entrega estimada: 2-4 días hábiles</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>