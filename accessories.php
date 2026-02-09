<?php include 'includes/header.php'; ?>
<?php require 'data/accessories.php'; ?>

<style>
    .font-display { font-family: 'Playfair Display', serif; }
    .letter-spacing-extra { letter-spacing: 0.25em; }
    .line-drawing { position: relative; }
    .line-drawing::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 0;
        height: 1px;
        background: #f97316; /* brOrange */
        transition: width 0.6s cubic-bezier(0.19, 1, 0.22, 1);
    }
    .group:hover .line-drawing::after { width: 100%; }
    
    /* Suavizado de imágenes */
    .img-reveal {
        clip-path: inset(0 0 0 0);
        transition: clip-path 0.8s cubic-bezier(0.77, 0, 0.175, 1);
    }
    .group:hover .img-reveal {
        clip-path: inset(10px 10px 10px 10px);
    }
</style>

<div class="relative min-h-[80vh] flex items-center bg-[#fafafa] overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full opacity-[0.03] pointer-events-none">
        <span class="text-[40rem] font-bold absolute -top-20 -left-20">LS</span>
    </div>

    <div class="max-w-7xl mx-auto px-4 w-full grid lg:grid-cols-12 gap-8 items-center relative z-10">
        <div class="lg:col-span-5 space-y-10" data-aos="fade-up">
            <div class="space-y-4">
                <h2 class="text-brOrange uppercase tracking-[0.4em] text-[10px] font-bold">Essencia Minimalista</h2>
                <h1 class="text-6xl md:text-8xl font-display text-gray-900 leading-[0.9]">
                    Pureza <br> <span class="italic font-light ml-8 md:ml-16 leading-tight text-gray-800">en Oro</span>
                </h1>
            </div>
            <p class="text-gray-500 text-lg font-light max-w-sm leading-relaxed border-l border-brOrange pl-6">
                Colecciones limitadas diseñadas para ser el reflejo de tu luz interior. Calidad artesanal desde el corazón de RD.
            </p>
            <div class="flex items-center space-x-6">
                <a href="#productos" class="group relative py-4 px-8 bg-gray-900 text-white text-xs uppercase tracking-widest overflow-hidden transition-all duration-500 hover:pr-12">
                    <span class="relative z-10">Comprar Ahora</span>
                    <span class="absolute right-4 opacity-0 group-hover:opacity-100 transition-all duration-500 text-lg">→</span>
                </a>
            </div>
        </div>

        <div class="lg:col-span-7 relative flex justify-end">
            <div class="relative w-full max-w-lg">
                <div class="aspect-[4/5] bg-gray-200 overflow-hidden shadow-2xl">
                    <div class="w-full h-full bg-[#f3f3f3] flex items-center justify-center relative">
                        <div class="absolute inset-10 border border-brOrange/20"></div>
                        <span class="text-9xl font-display text-white/50">LS</span>
                    </div>
                </div>
                <div class="absolute -bottom-10 -left-10 bg-white p-8 shadow-xl hidden md:block">
                    <p class="text-xs uppercase tracking-widest text-gray-400 mb-2 font-bold">Destacado</p>
                    <p class="font-display text-xl italic text-gray-800">Anillo "Luz de Luna"</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white border-b border-gray-100 sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 overflow-x-auto">
        <div class="flex space-x-12 py-6 justify-center">
            <a href="#" class="text-[10px] uppercase tracking-[0.3em] font-bold text-brOrange border-b-2 border-brOrange pb-1">Todo</a>
            <a href="#" class="text-[10px] uppercase tracking-[0.3em] font-bold text-gray-400 hover:text-gray-900 transition-colors">Collares</a>
            <a href="#" class="text-[10px] uppercase tracking-[0.3em] font-bold text-gray-400 hover:text-gray-900 transition-colors">Anillos</a>
            <a href="#" class="text-[10px] uppercase tracking-[0.3em] font-bold text-gray-400 hover:text-gray-900 transition-colors">Aretes</a>
        </div>
    </div>
</div>

<section id="productos" class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-20">
        <?php foreach ($accessories as $index => $item): ?>
            <div class="group flex flex-col <?php echo ($index % 2 != 0) ? 'md:mt-12' : ''; ?>">
                <div class="relative overflow-hidden aspect-[3/4] mb-8 bg-[#f9f9f9]">
                    <?php if($index < 2): ?>
                        <span class="absolute top-4 left-4 z-20 bg-brOrange text-white text-[8px] font-bold px-3 py-1 uppercase tracking-widest">Nuevo</span>
                    <?php endif; ?>

                    <img src="<?php echo $item['images'][0]; ?>" 
                         class="img-reveal w-full h-full object-cover grayscale-[0.3] group-hover:grayscale-0 transition-all duration-700" 
                         alt="<?php echo $item['name']; ?>">
                    
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">
                        <a href="accessory.php?id=<?php echo $item['id']; ?>" class="bg-white/90 backdrop-blur-md px-6 py-3 text-[10px] uppercase tracking-widest font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform">
                            Ver Detalles
                        </a>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex justify-between items-start">
                        <h3 class="text-sm tracking-widest uppercase font-medium line-drawing w-fit">
                            <?php echo $item['name']; ?>
                        </h3>
                        <span class="text-xs text-gray-400 font-light italic"><?php echo $item['category'] ?? 'Joyería'; ?></span>
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <p class="text-lg font-display text-gray-900 tracking-tight">
                            RD$ <?php echo number_format($item['price'], 0); ?>
                        </p>
                        <button class="text-brOrange hover:scale-125 transition-transform duration-300">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                           </svg>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>