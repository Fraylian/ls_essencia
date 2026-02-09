<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cart_count = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $qty) {
        $cart_count += $qty;
    }
}
?>
<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LS Essencia | Productos Naturales</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (CDN for simplicity as requested) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            DEFAULT: '#6E5A5A',
                            light: '#BFAAAA',
                            dark: '#5c4b4b',
                        },
                        pink: {
                            main: '#EAD1D3',
                            sec: '#D9B6BA',
                            light: '#FDF7F8', // Lighter background
                        },
                        text: {
                            light: '#F4EFEF',
                            dark: '#4A3B3B',
                        }
                    },
                    fontFamily: {
                        sans: ['Lato', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    backgroundImage: {
                        'hero-pattern': "url('assets/img/hero.png')",
                        'texture-pattern': "url('assets/img/natural_bg_texture.png')",
                    }
                }
            }
        }
    </script>

    <!-- Custom CSS (Minimal overrides) -->
    <style>
        body {
            background-color: #FDF7F8;
            background-image: url('assets/img/natural_bg_texture.png');
            background-size: cover; 
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
        /* Glassmorphism utility */
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="font-sans text-brand-dark antialiased min-h-screen flex flex-col">

    <!-- Header / Nav -->
    <header class="fixed w-full top-0 z-50 transition-all duration-300 glass shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button type="button" class="text-brand hover:text-brand-dark focus:outline-none focus:text-brand-dark" aria-label="Toggle menu">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center justify-center md:justify-start w-full md:w-auto">
                    <a href="index.php" class="flex items-center gap-2">
                        <!-- Use the logo image, but constrain height -->
                        <img class="h-12 w-auto" src="assets/img/logoLS.jpeg" alt="Esencia">
                        <span class="font-serif text-2xl font-bold tracking-wide text-brand hidden sm:block">LS Essencia</span>
                    </a>
                </div>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex space-x-8 items-center">
                    <a href="index.php" class="text-brand hover:text-pink-sec font-medium transition duration-300">Inicio</a>
                    <a href="index.php#catalogo" class="text-brand hover:text-pink-sec font-medium transition duration-300">Colección</a>
                    <a href="accessories.php" class="text-brand hover:text-pink-sec font-medium transition duration-300">Accesorios</a>
                    <a href="index.php#about" class="text-brand hover:text-pink-sec font-medium transition duration-300">Nosotros</a>
                </nav>

                <!-- Cart Icon -->
                <div class="flex items-center">
                    <a href="cart.php" class="relative p-2 text-brand hover:text-pink-sec transition duration-300 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <?php if ($cart_count > 0): ?>
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-1.5 py-0.5 text-xs font-bold leading-none text-white transform translate-x-1/4 -translate-y-1/4 bg-pink-sec rounded-full shadow-sm group-hover:bg-brand transition duration-300"><?php echo $cart_count; ?></span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Spacer for fixed header -->
    <div class="h-20"></div> 

    <!-- Main Content Wrapper -->
    <main class="flex-grow">
