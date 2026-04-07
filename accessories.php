<?php include 'includes/header.php'; ?>
<?php require 'data/accessories.php'; ?>

<style>
    /* ============================================================
       ACCESSORIES PAGE — PREMIUM REDESIGN
    ============================================================ */
    @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Lato:wght@300;400;700&display=swap');

    :root {
        --gold: #C9A96E;
        --gold-light: #F0D9B0;
        --gold-dark: #A07745;
        --blush: #F5E6E8;
        --blush-deep: #E8C4C9;
        --dark: #1A1010;
        --mid: #3D2B2B;
        --brand-rose: #6E5A5A;
    }

    .font-cormorant { font-family: 'Cormorant Garamond', serif; }

    /* ── Hero ──────────────────────────────────────────────────── */
    .acc-hero {
        position: relative;
        height: 92vh;
        min-height: 600px;
        overflow: hidden;
        display: flex;
        align-items: center;
    }
    .acc-hero__bg {
        position: absolute;
        inset: 0;
        background-image: url('https://images.unsplash.com/photo-1573408301185-9519f94815b9?q=85&w=1800&auto=format&fit=crop');
        background-size: cover;
        background-position: center 30%;
        transform: scale(1.05);
        transition: transform 8s ease;
    }
    .acc-hero__bg.loaded { transform: scale(1); }
    .acc-hero__overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            105deg,
            rgba(26,16,16,.80) 0%,
            rgba(61,43,43,.55) 45%,
            rgba(201,169,110,.10) 100%
        );
    }
    .acc-hero__content {
        position: relative;
        z-index: 10;
        max-width: 56rem;
        padding: 0 2rem;
        margin-left: clamp(2rem, 8vw, 10rem);
    }
    .acc-hero__badge {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        background: rgba(201,169,110,.15);
        border: 1px solid rgba(201,169,110,.40);
        color: var(--gold-light);
        font-size: .65rem;
        letter-spacing: .35em;
        text-transform: uppercase;
        padding: .5rem 1.25rem;
        border-radius: 100px;
        margin-bottom: 1.75rem;
        backdrop-filter: blur(8px);
    }
    .acc-hero__badge::before {
        content: '';
        width: 6px; height: 6px;
        border-radius: 50%;
        background: var(--gold);
        animation: pulse-dot 2s infinite;
    }
    @keyframes pulse-dot {
        0%,100% { opacity:1; transform:scale(1); }
        50% { opacity:.4; transform:scale(.6); }
    }
    .acc-hero__title {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(3.5rem, 8vw, 7rem);
        font-weight: 300;
        color: #fff;
        line-height: .95;
        letter-spacing: -.01em;
        margin-bottom: 1.5rem;
    }
    .acc-hero__title em {
        font-style: italic;
        color: var(--gold-light);
        display: block;
    }
    .acc-hero__desc {
        font-size: 1.1rem;
        color: rgba(255,255,255,.7);
        max-width: 30rem;
        line-height: 1.8;
        font-weight: 300;
        border-left: 2px solid var(--gold);
        padding-left: 1.25rem;
        margin-bottom: 2.5rem;
    }
    .acc-hero__cta-group { display: flex; gap: 1rem; flex-wrap: wrap; }
    .btn-gold {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        background: var(--gold);
        color: var(--dark);
        font-size: .75rem;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        padding: 1rem 2rem;
        border-radius: 100px;
        text-decoration: none;
        transition: all .35s ease;
        box-shadow: 0 8px 24px rgba(201,169,110,.35);
    }
    .btn-gold:hover {
        background: var(--gold-light);
        transform: translateY(-2px);
        box-shadow: 0 14px 32px rgba(201,169,110,.45);
    }
    .btn-outline-white {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        border: 1px solid rgba(255,255,255,.4);
        color: #fff;
        font-size: .75rem;
        font-weight: 600;
        letter-spacing: .2em;
        text-transform: uppercase;
        padding: 1rem 2rem;
        border-radius: 100px;
        text-decoration: none;
        transition: all .35s ease;
        backdrop-filter: blur(4px);
    }
    .btn-outline-white:hover {
        background: rgba(255,255,255,.12);
        border-color: rgba(255,255,255,.7);
    }
    /* Scroll hint */
    .hero-scroll {
        position: absolute;
        bottom: 2.5rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: .5rem;
        color: rgba(255,255,255,.5);
        font-size: .65rem;
        letter-spacing: .3em;
        text-transform: uppercase;
        z-index: 10;
    }
    .hero-scroll__line {
        width: 1px;
        height: 55px;
        background: linear-gradient(to bottom, rgba(201,169,110,.8), transparent);
        animation: scroll-line 2s ease infinite;
    }
    @keyframes scroll-line {
        0% { transform: scaleY(0); transform-origin: top; }
        50% { transform: scaleY(1); transform-origin: top; }
        51% { transform: scaleY(1); transform-origin: bottom; }
        100% { transform: scaleY(0); transform-origin: bottom; }
    }

    /* Floating stat bubbles on hero */
    .stat-bubble {
        position: absolute;
        right: clamp(1rem, 5vw, 6rem);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 1px solid rgba(201,169,110,.3);
        backdrop-filter: blur(12px);
        background: rgba(26,16,16,.4);
        color: #fff;
        text-align: center;
        z-index: 10;
    }
    .stat-bubble--top { top: 22%; }
    .stat-bubble--bot { bottom: 20%; }
    .stat-bubble__num {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2rem;
        font-weight: 600;
        color: var(--gold-light);
        line-height: 1;
    }
    .stat-bubble__label {
        font-size: .55rem;
        letter-spacing: .18em;
        text-transform: uppercase;
        color: rgba(255,255,255,.55);
        margin-top: .3rem;
    }

    /* ── Marquee Strip ─────────────────────────────────────────── */
    .marquee-strip {
        background: var(--dark);
        padding: .8rem 0;
        overflow: hidden;
        white-space: nowrap;
    }
    .marquee-inner {
        display: inline-flex;
        gap: 3rem;
        animation: marquee-loop 22s linear infinite;
    }
    @keyframes marquee-loop {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .marquee-item {
        font-size: .65rem;
        letter-spacing: .3em;
        text-transform: uppercase;
        color: rgba(255,255,255,.5);
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    .marquee-item .dot { color: var(--gold); font-size: .8rem; }

    /* ── Filter Bar ────────────────────────────────────────────── */
    .filter-bar {
        position: sticky;
        top: 80px;
        z-index: 40;
        background: rgba(253,247,248,.92);
        backdrop-filter: blur(16px);
        border-bottom: 1px solid rgba(201,169,110,.18);
        box-shadow: 0 4px 24px rgba(0,0,0,.04);
    }
    .filter-bar__inner {
        max-width: 88rem;
        margin: 0 auto;
        padding: 0 1.5rem;
        display: flex;
        align-items: center;
        gap: 2rem;
        overflow-x: auto;
        scrollbar-width: none;
    }
    .filter-bar__inner::-webkit-scrollbar { display: none; }
    .filter-bar__label {
        font-size: .6rem;
        letter-spacing: .35em;
        text-transform: uppercase;
        color: rgba(110,90,90,.5);
        flex-shrink: 0;
        padding: 1.25rem 0;
    }
    .filter-btn {
        flex-shrink: 0;
        font-size: .65rem;
        letter-spacing: .25em;
        text-transform: uppercase;
        font-weight: 700;
        color: rgba(110,90,90,.55);
        padding: 1.25rem .25rem;
        border: none;
        background: none;
        cursor: pointer;
        border-bottom: 2px solid transparent;
        transition: all .3s ease;
        position: relative;
    }
    .filter-btn:hover { color: var(--brand-rose); }
    .filter-btn.active {
        color: var(--gold-dark);
        border-bottom-color: var(--gold);
    }

    /* ── Promo Banner ──────────────────────────────────────────── */
    .promo-banner {
        background: linear-gradient(135deg, #1A1010 0%, #3D2B2B 100%);
        padding: 3.5rem 1.5rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .promo-banner::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at 60% 50%, rgba(201,169,110,.12) 0%, transparent 65%);
    }
    .promo-banner__tag {
        display: inline-block;
        background: var(--gold);
        color: var(--dark);
        font-size: .6rem;
        font-weight: 700;
        letter-spacing: .3em;
        text-transform: uppercase;
        padding: .4rem 1.2rem;
        border-radius: 100px;
        margin-bottom: 1rem;
    }
    .promo-banner__title {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2rem, 5vw, 3.5rem);
        color: #fff;
        font-style: italic;
        font-weight: 300;
        margin-bottom: .75rem;
    }
    .promo-banner__sub {
        color: rgba(255,255,255,.55);
        font-size: .9rem;
        font-weight: 300;
        margin-bottom: 1.75rem;
    }

    /* ── Catalog Grid ──────────────────────────────────────────── */
    .catalog-section {
        max-width: 90rem;
        margin: 0 auto;
        padding: 5rem 1.5rem;
    }
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 3.5rem;
    }
    .section-header__left {}
    .section-header__eyebrow {
        font-size: .62rem;
        letter-spacing: .38em;
        text-transform: uppercase;
        color: var(--gold-dark);
        margin-bottom: .6rem;
    }
    .section-header__title {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2.2rem, 4vw, 3.2rem);
        font-weight: 400;
        color: var(--dark);
        line-height: 1.1;
    }
    .section-header__count {
        font-size: .7rem;
        color: rgba(110,90,90,.45);
        letter-spacing: .15em;
        text-transform: uppercase;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2.5rem;
    }

    /* ── Product Card ──────────────────────────────────────────── */
    .product-card {
        background: #fff;
        border-radius: 1.25rem;
        overflow: hidden;
        box-shadow: 0 2px 16px rgba(0,0,0,.06);
        transition: all .4s cubic-bezier(.25,.8,.25,1);
        display: flex;
        flex-direction: column;
        position: relative;
    }
    .product-card:hover {
        box-shadow: 0 20px 50px rgba(0,0,0,.13);
        transform: translateY(-6px);
    }

    /* Image wrapper */
    .product-card__img-wrap {
        position: relative;
        overflow: hidden;
        aspect-ratio: 3/3.8;
        background: var(--blush);
    }
    .product-card__img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform .7s cubic-bezier(.25,.8,.25,1);
    }
    .product-card:hover .product-card__img {
        transform: scale(1.08);
    }

    /* Badges */
    .product-card__badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        z-index: 5;
        display: flex;
        flex-direction: column;
        gap: .4rem;
    }
    .badge {
        display: inline-block;
        font-size: .58rem;
        font-weight: 700;
        letter-spacing: .18em;
        text-transform: uppercase;
        padding: .35rem .8rem;
        border-radius: 100px;
    }
    .badge--new { background: var(--dark); color: var(--gold-light); }
    .badge--hot { background: #c0392b; color: #fff; }
    .badge--sale { background: var(--gold); color: var(--dark); }
    .badge--limited { background: var(--mid); color: rgba(255,255,255,.85); }

    /* Wishlist btn */
    .product-card__wish {
        position: absolute;
        top: 1rem;
        right: 1rem;
        z-index: 5;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255,255,255,.85);
        backdrop-filter: blur(6px);
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #aaa;
        transition: all .3s;
        opacity: 0;
        transform: scale(.8);
    }
    .product-card:hover .product-card__wish {
        opacity: 1;
        transform: scale(1);
    }
    .product-card__wish:hover { color: #e74c3c; transform: scale(1.1) !important; }
    .product-card__wish.wished { color: #e74c3c; opacity: 1; transform: scale(1); }

    /* Quick shop overlay */
    .product-card__overlay {
        position: absolute;
        inset: 0;
        background: rgba(26,16,16,.45);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: .75rem;
        opacity: 0;
        transition: opacity .35s ease;
        backdrop-filter: blur(2px);
        z-index: 4;
    }
    .product-card:hover .product-card__overlay {
        opacity: 1;
    }
    .overlay-btn {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        font-size: .65rem;
        font-weight: 700;
        letter-spacing: .22em;
        text-transform: uppercase;
        padding: .75rem 1.75rem;
        border-radius: 100px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all .25s;
    }
    .overlay-btn--primary {
        background: #fff;
        color: var(--dark);
        transform: translateY(8px);
    }
    .product-card:hover .overlay-btn--primary {
        transform: translateY(0);
        transition-delay: .05s;
    }
    .overlay-btn--primary:hover { background: var(--gold-light); }
    .overlay-btn--cart {
        background: var(--gold);
        color: var(--dark);
        transform: translateY(8px);
    }
    .product-card:hover .overlay-btn--cart {
        transform: translateY(0);
        transition-delay: .1s;
    }
    .overlay-btn--cart:hover { background: var(--gold-light); }

    /* Body */
    .product-card__body {
        padding: 1.4rem 1.5rem 1.6rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        border-top: 1px solid rgba(201,169,110,.15);
    }
    .product-card__category {
        font-size: .58rem;
        letter-spacing: .3em;
        text-transform: uppercase;
        color: var(--gold-dark);
        margin-bottom: .4rem;
    }
    .product-card__name {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: .4rem;
        line-height: 1.25;
    }
    .product-card__desc {
        font-size: .82rem;
        color: rgba(61,43,43,.55);
        line-height: 1.6;
        margin-bottom: 1.2rem;
        font-weight: 300;
    }
    .product-card__footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }
    .product-card__price-block {}
    .product-card__price {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.55rem;
        font-weight: 600;
        color: var(--brand-rose);
        line-height: 1;
    }
    .product-card__price-label {
        font-size: .58rem;
        letter-spacing: .15em;
        text-transform: uppercase;
        color: rgba(110,90,90,.45);
        margin-top: .15rem;
    }

    .add-cart-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: var(--dark);
        color: var(--gold-light);
        border: none;
        cursor: pointer;
        transition: all .3s ease;
        flex-shrink: 0;
    }
    .add-cart-btn:hover {
        background: var(--gold);
        color: var(--dark);
        transform: rotate(90deg) scale(1.08);
    }

    /* Mini stars */
    .stars { color: var(--gold); font-size: .7rem; letter-spacing: 1px; }

    /* ── Featured large card ───────────────────────────────────── */
    .featured-card {
        grid-column: span 2;
        display: grid;
        grid-template-columns: 1fr 1fr;
        border-radius: 1.25rem;
        overflow: hidden;
        background: var(--dark);
        color: #fff;
        box-shadow: 0 20px 60px rgba(0,0,0,.2);
        min-height: 480px;
    }
    @media (max-width: 768px) {
        .featured-card { grid-column: span 1; grid-template-columns: 1fr; }
    }
    .featured-card__img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        filter: brightness(.85);
        transition: transform .7s ease;
        min-height: 350px;
    }
    .featured-card:hover .featured-card__img { transform: scale(1.04); }
    .featured-card__content {
        padding: 3.5rem 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
    }
    .featured-card__content::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(201,169,110,.08) 0%, transparent 100%);
    }
    .featured-card__content > * { position: relative; z-index: 1; }
    .featured-card__tag {
        font-size: .6rem;
        letter-spacing: .38em;
        text-transform: uppercase;
        color: var(--gold-light);
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: .75rem;
    }
    .featured-card__tag::before {
        content: '';
        width: 30px;
        height: 1px;
        background: var(--gold);
    }
    .featured-card__name {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(2rem, 3.5vw, 3rem);
        font-style: italic;
        font-weight: 300;
        line-height: 1.1;
        color: #fff;
        margin-bottom: 1.25rem;
    }
    .featured-card__desc {
        font-size: .9rem;
        color: rgba(255,255,255,.55);
        line-height: 1.8;
        font-weight: 300;
        margin-bottom: 2rem;
    }
    .featured-card__price {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.2rem;
        color: var(--gold-light);
        margin-bottom: 1.75rem;
    }
    .featured-card__actions { display: flex; gap: 1rem; flex-wrap: wrap; }
    .btn-gold-sm {
        display: inline-flex;
        align-items: center;
        gap: .4rem;
        background: var(--gold);
        color: var(--dark);
        font-size: .65rem;
        font-weight: 700;
        letter-spacing: .2em;
        text-transform: uppercase;
        padding: .85rem 1.75rem;
        border-radius: 100px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all .3s;
    }
    .btn-gold-sm:hover { background: var(--gold-light); transform: translateY(-2px); }
    .btn-ghost-gold {
        display: inline-flex;
        align-items: center;
        gap: .4rem;
        border: 1px solid rgba(201,169,110,.4);
        color: var(--gold-light);
        font-size: .65rem;
        font-weight: 600;
        letter-spacing: .2em;
        text-transform: uppercase;
        padding: .85rem 1.75rem;
        border-radius: 100px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        background: rgba(201,169,110,.08);
        transition: all .3s;
    }
    .btn-ghost-gold:hover { background: rgba(201,169,110,.18); }

    /* ── Trust Section ─────────────────────────────────────────── */
    .trust-section {
        background: var(--blush);
        padding: 4rem 1.5rem;
    }
    .trust-grid {
        max-width: 72rem;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        text-align: center;
    }
    .trust-item {}
    .trust-item__icon {
        font-size: 1.8rem;
        margin-bottom: .75rem;
    }
    .trust-item__title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: .35rem;
    }
    .trust-item__desc {
        font-size: .8rem;
        color: rgba(61,43,43,.55);
        font-weight: 300;
        line-height: 1.6;
    }

    /* ── Lookbook Row ──────────────────────────────────────────── */
    .lookbook {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        height: 500px;
    }
    @media(max-width:768px) {
        .lookbook { grid-template-columns: 1fr; height: auto; }
        .lookbook-panel { height: 280px; }
    }
    .lookbook-panel {
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }
    .lookbook-panel img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform .7s ease;
        filter: brightness(.75);
    }
    .lookbook-panel:hover img { transform: scale(1.06); filter: brightness(.6); }
    .lookbook-panel__label {
        position: absolute;
        bottom: 1.75rem;
        left: 1.75rem;
        z-index: 5;
        color: #fff;
    }
    .lookbook-panel__cat {
        font-size: .58rem;
        letter-spacing: .35em;
        text-transform: uppercase;
        color: var(--gold-light);
        margin-bottom: .3rem;
    }
    .lookbook-panel__name {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.5rem;
        font-weight: 400;
        line-height: 1.2;
    }
    .lookbook-panel__arrow {
        position: absolute;
        bottom: 2rem;
        right: 1.75rem;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid rgba(255,255,255,.4);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        opacity: 0;
        transform: translateX(-8px);
        transition: all .35s ease;
    }
    .lookbook-panel:hover .lookbook-panel__arrow {
        opacity: 1;
        transform: translateX(0);
    }

    /* Fade-in animation */
    .fade-up {
        opacity: 0;
        transform: translateY(28px);
        transition: opacity .65s ease, transform .65s ease;
    }
    .fade-up.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Hidden items (for filter) */
    .product-card[data-hidden="true"] {
        display: none;
    }
</style>

<!-- ══════════════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════════════ -->
<section class="acc-hero">
    <div class="acc-hero__bg" id="heroBg"></div>
    <div class="acc-hero__overlay"></div>

    <div class="acc-hero__content">
        <div class="acc-hero__badge">Colección 2025 · Edición Limitada</div>
        <h1 class="acc-hero__title">
            Joyería que
            <em>te define</em>
        </h1>
        <p class="acc-hero__desc">
            Piezas artesanales diseñadas para realzar tu luz natural. Oro, plata y gemas cuidadosamente seleccionadas desde el corazón de RD.
        </p>
        <div class="acc-hero__cta-group">
            <a href="#catalogo" class="btn-gold">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 3h14a2 2 0 012 2v3H3V5a2 2 0 012-2zM3 10h18l-2 11H5L3 10z"/></svg>
                Comprar Ahora
            </a>
            <a href="#lookbook" class="btn-outline-white">Ver Lookbook →</a>
        </div>
    </div>

    <!-- Floating stats -->
    <div class="stat-bubble stat-bubble--top" style="display:none">
        <span class="stat-bubble__num">10+</span>
        <span class="stat-bubble__label">Piezas Únicas</span>
    </div>
    <div class="stat-bubble stat-bubble--bot" style="display:none">
        <span class="stat-bubble__num">★ 5</span>
        <span class="stat-bubble__label">Rating</span>
    </div>

    <!-- Scroll hint -->
    <div class="hero-scroll">
        <div class="hero-scroll__line"></div>
        <span>Scroll</span>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════
     MARQUEE STRIP
══════════════════════════════════════════════════════════════ -->
<div class="marquee-strip">
    <div class="marquee-inner" aria-hidden="true">
        <?php $marquee = ["Envío en RD", "Calidad Artesanal", "Plata .925", "Oro 18K", "Stock Limitado", "Pagos Seguros", "Piezas Únicas", "Envío en RD", "Calidad Artesanal", "Plata .925", "Oro 18K", "Stock Limitado", "Pagos Seguros", "Piezas Únicas"]; ?>
        <?php foreach ($marquee as $m): ?>
            <span class="marquee-item"><span class="dot">✦</span> <?php echo $m; ?></span>
        <?php endforeach; ?>
    </div>
</div>

<!-- ══════════════════════════════════════════════════════════════
     TRUST BAR
══════════════════════════════════════════════════════════════ -->
<div class="trust-section">
    <div class="trust-grid">
        <div class="trust-item fade-up">
            <div class="trust-item__icon">🚚</div>
            <div class="trust-item__title">Envío a Todo RD</div>
            <div class="trust-item__desc">Entrega segura y rápida en toda la República Dominicana</div>
        </div>
        <div class="trust-item fade-up" style="transition-delay:.1s">
            <div class="trust-item__icon">💎</div>
            <div class="trust-item__title">Calidad Certificada</div>
            <div class="trust-item__desc">Materiales verificados: plata .925, oro 18K auténtico</div>
        </div>
        <div class="trust-item fade-up" style="transition-delay:.2s">
            <div class="trust-item__icon">🔁</div>
            <div class="trust-item__title">Cambios y Devoluciones</div>
            <div class="trust-item__desc">7 días para cambios sin complicaciones</div>
        </div>
        <div class="trust-item fade-up" style="transition-delay:.3s">
            <div class="trust-item__icon">🔒</div>
            <div class="trust-item__title">Compra Segura</div>
            <div class="trust-item__desc">Tus datos y pagos siempre protegidos</div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════════════════════════
     PROMO BANNER
══════════════════════════════════════════════════════════════ -->
<div class="promo-banner">
    <div class="promo-banner__tag">✦ Oferta Especial</div>
    <h2 class="promo-banner__title">2 piezas por RD$2,000 — Solo por tiempo limitado</h2>
    <p class="promo-banner__sub">Selecciona cualquier dos accesorios y obtén el precio especial al contactarnos por WhatsApp</p>
    <a href="https://wa.me/18296841252?text=Hola!%20Quiero%20aprovechar%20la%20oferta%202x2000%20en%20accesorios"
       target="_blank" class="btn-gold" style="display:inline-flex;margin:0 auto">
        💬 Pedir por WhatsApp
    </a>
</div>

<!-- ══════════════════════════════════════════════════════════════
     FILTER BAR
══════════════════════════════════════════════════════════════ -->
<div class="filter-bar">
    <div class="filter-bar__inner">
        <span class="filter-bar__label">Filtrar por:</span>
        <button class="filter-btn active" data-filter="all">Todo</button>
        <button class="filter-btn" data-filter="Oro">Oro</button>
        <button class="filter-btn" data-filter="Plata">Plata</button>
        <button class="filter-btn" data-filter="Amuletos">Amuletos</button>
        <button class="filter-btn" data-filter="Tendencia">Tendencia</button>
        <button class="filter-btn" data-filter="Relojería">Relojería</button>
    </div>
</div>

<!-- ══════════════════════════════════════════════════════════════
     CATALOG
══════════════════════════════════════════════════════════════ -->
<section id="catalogo" class="catalog-section">
    <div class="section-header">
        <div class="section-header__left">
            <div class="section-header__eyebrow">✦ Colección Completa</div>
            <h2 class="section-header__title">Nuestras Joyas</h2>
        </div>
        <div class="section-header__count" id="product-count">
            <?php echo count($accessories); ?> piezas disponibles
        </div>
    </div>

    <div class="product-grid" id="productGrid">

        <?php
        // Enhanced accessories data with better images and badges
        $badge_map = [
            101 => ['new'],
            102 => ['limited'],
            103 => [],
            104 => ['sale'],
            105 => ['hot'],
            106 => [],
            107 => ['new', 'limited'],
            108 => [],
            109 => ['hot'],
            110 => ['sale'],
        ];
        $new_images = [
            101 => 'https://images.unsplash.com/photo-1599643478518-a784e5dc4c8f?q=85&w=800&auto=format&fit=crop',
            102 => 'https://images.unsplash.com/photo-1506439773649-6e0eb8cfb237?q=85&w=800&auto=format&fit=crop',
            103 => 'https://images.unsplash.com/photo-1611591437281-460bfbe1220a?q=85&w=800&auto=format&fit=crop',
            104 => 'https://images.unsplash.com/photo-1605100804763-247f67b3557e?q=85&w=800&auto=format&fit=crop',
            105 => 'https://images.unsplash.com/photo-1629897048514-3dd7414fe72a?q=85&w=800&auto=format&fit=crop',
            106 => 'https://images.unsplash.com/photo-1543294001-f7cd5d7fb516?q=85&w=800&auto=format&fit=crop',
            107 => 'https://images.unsplash.com/photo-1514302240736-b1fee5985889?q=85&w=800&auto=format&fit=crop',
            108 => 'https://images.unsplash.com/photo-1611085797613-71515aa697f6?q=85&w=800&auto=format&fit=crop',
            109 => 'https://images.unsplash.com/photo-1630019852942-f89202989a59?q=85&w=800&auto=format&fit=crop',
            110 => 'https://images.unsplash.com/photo-1573408301185-9519f94815b9?q=85&w=800&auto=format&fit=crop',
        ];

        $idx = 0;
        foreach ($accessories as $item):
            $badges = $badge_map[$item['id']] ?? [];
            $img = $new_images[$item['id']] ?? $item['images'][0];
            $delay = ($idx % 6) * 80;
            $idx++;
        ?>
        <div class="product-card fade-up" data-category="<?php echo htmlspecialchars($item['category']); ?>" style="transition-delay:<?php echo $delay; ?>ms">
            <!-- Image -->
            <div class="product-card__img-wrap">
                <!-- Badges -->
                <?php if (!empty($badges)): ?>
                <div class="product-card__badge">
                    <?php foreach($badges as $b): ?>
                        <?php if($b==='new'): ?><span class="badge badge--new">Nuevo</span>
                        <?php elseif($b==='hot'): ?><span class="badge badge--hot">🔥 Popular</span>
                        <?php elseif($b==='sale'): ?><span class="badge badge--sale">Oferta</span>
                        <?php elseif($b==='limited'): ?><span class="badge badge--limited">Edición Ltda.</span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!-- Wishlist -->
                <button class="product-card__wish" aria-label="Agregar a favoritos" onclick="toggleWish(this)">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 010-6.364z"/></svg>
                </button>

                <img class="product-card__img"
                     src="<?php echo $img; ?>"
                     alt="<?php echo htmlspecialchars($item['name']); ?>"
                     loading="lazy">

                <!-- Overlay quick actions -->
                <div class="product-card__overlay">
                    <a href="accessory.php?id=<?php echo $item['id']; ?>" class="overlay-btn overlay-btn--primary">
                        Ver Detalles
                    </a>
                    <form action="cart_actions.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="overlay-btn overlay-btn--cart">
                            🛍 Agregar al Carrito
                        </button>
                    </form>
                </div>
            </div>

            <!-- Body -->
            <div class="product-card__body">
                <div class="product-card__category"><?php echo htmlspecialchars($item['category']); ?></div>
                <div class="product-card__name"><?php echo htmlspecialchars($item['name']); ?></div>
                <div class="stars">★★★★★</div>
                <div class="product-card__desc" style="margin-top:.5rem"><?php echo htmlspecialchars($item['short_desc']); ?></div>

                <div class="product-card__footer">
                    <div class="product-card__price-block">
                        <div class="product-card__price">RD$ <?php echo number_format($item['price'], 0); ?></div>
                        <div class="product-card__price-label">Precio especial</div>
                    </div>
                    <form action="cart_actions.php" method="POST">
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="add-cart-btn" title="Agregar al carrito">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div><!-- /product-grid -->

    <!-- CTA below grid -->
    <div style="text-align:center; margin-top:4rem;">
        <p style="font-size:.8rem; letter-spacing:.2em; text-transform:uppercase; color:rgba(110,90,90,.5); margin-bottom:1.25rem;">¿No encontraste lo que buscas?</p>
        <a href="https://wa.me/18296841252?text=Hola!%20Quiero%20consultar%20sobre%20accesorios"
           target="_blank" class="btn-gold" style="display:inline-flex">
            💬 Consultar por WhatsApp
        </a>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════
     LOOKBOOK
══════════════════════════════════════════════════════════════ -->
<section id="lookbook">
    <div class="lookbook">
        <div class="lookbook-panel">
            <img src="https://images.unsplash.com/photo-1535632787350-4e68ef0ac584?q=85&w=800&auto=format&fit=crop" alt="Collares">
            <div class="lookbook-panel__label">
                <div class="lookbook-panel__cat">Collares</div>
                <div class="lookbook-panel__name">Línea<br>Dorada</div>
            </div>
            <a href="#catalogo" class="lookbook-panel__arrow">→</a>
        </div>
        <div class="lookbook-panel">
            <img src="https://images.unsplash.com/photo-1588444837495-c6cfeb53f32d?q=85&w=800&auto=format&fit=crop" alt="Anillos" style="object-position:center top">
            <div class="lookbook-panel__label">
                <div class="lookbook-panel__cat">Anillos</div>
                <div class="lookbook-panel__name">Solitarios<br>& Sets</div>
            </div>
            <a href="#catalogo" class="lookbook-panel__arrow">→</a>
        </div>
        <div class="lookbook-panel">
            <img src="https://images.unsplash.com/photo-1630019852942-f89202989a59?q=85&w=800&auto=format&fit=crop" alt="Aretes">
            <div class="lookbook-panel__label">
                <div class="lookbook-panel__cat">Aretes</div>
                <div class="lookbook-panel__name">Arte<br>Botánico</div>
            </div>
            <a href="#catalogo" class="lookbook-panel__arrow">→</a>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════
     FINAL CTA BANNER
══════════════════════════════════════════════════════════════ -->
<div style="background:linear-gradient(135deg,#f5e6e8 0%,#e8c4c9 100%); padding:5rem 1.5rem; text-align:center; position:relative; overflow:hidden;">
    <div style="position:absolute;inset:0;background:url('https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?q=30&w=1200&auto=format&fit=crop') center/cover;opacity:.08;"></div>
    <div style="position:relative;z-index:1;">
        <div style="font-size:.62rem;letter-spacing:.38em;text-transform:uppercase;color:var(--gold-dark);margin-bottom:1rem;">✦ Joyería LS Essencia</div>
        <h2 style="font-family:'Cormorant Garamond',serif;font-size:clamp(2.2rem,5vw,4rem);font-weight:300;color:var(--dark);margin-bottom:1rem;line-height:1.1;">
            Regálate algo que<br><em style="font-style:italic;color:var(--brand-rose)">te haga brillar</em>
        </h2>
        <p style="font-size:.95rem;color:rgba(61,43,43,.6);max-width:30rem;margin:0 auto 2.5rem;font-weight:300;line-height:1.8;">
            Cada pieza es una historia. Encuéntrala hoy y hazla tuya antes de que se agote.
        </p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
            <a href="#catalogo" class="btn-gold">🛍 Ver Colección</a>
            <a href="https://wa.me/18296841252" target="_blank"
               style="display:inline-flex;align-items:center;gap:.5rem;border:2px solid var(--brand-rose);color:var(--brand-rose);font-size:.72rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;padding:1rem 2rem;border-radius:100px;text-decoration:none;transition:all .3s;"
               onmouseover="this.style.background='var(--brand-rose)';this.style.color='#fff';"
               onmouseout="this.style.background='transparent';this.style.color='var(--brand-rose)';">
                💬 WhatsApp
            </a>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════════════════════════
     SCRIPTS
══════════════════════════════════════════════════════════════ -->
<script>
// ── Hero bg parallax / load ─────────────────────────────────────
window.addEventListener('load', () => {
    document.getElementById('heroBg').classList.add('loaded');
    // Show stat bubbles on desktop
    if (window.innerWidth > 900) {
        document.querySelectorAll('.stat-bubble').forEach(b => b.style.display = 'flex');
    }
});

// ── Intersection observer for fade-up ──────────────────────────
const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('visible');
            observer.unobserve(e.target);
        }
    });
}, { threshold: 0.12 });
document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

// ── Filter logic ───────────────────────────────────────────────
const filterBtns = document.querySelectorAll('.filter-btn');
const cards = document.querySelectorAll('#productGrid .product-card');
const countEl = document.getElementById('product-count');

filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const filter = btn.dataset.filter;
        let visible = 0;

        cards.forEach(card => {
            const cat = card.dataset.category;
            const show = filter === 'all' || cat === filter;
            card.setAttribute('data-hidden', show ? 'false' : 'true');
            if (show) {
                visible++;
                card.style.display = '';
                // re-trigger fade
                card.classList.remove('visible');
                setTimeout(() => card.classList.add('visible'), 50);
            } else {
                card.style.display = 'none';
            }
        });

        countEl.textContent = visible + ' piezas disponibles';
    });
});

// ── Wishlist toggle ─────────────────────────────────────────────
function toggleWish(btn) {
    btn.classList.toggle('wished');
    btn.innerHTML = btn.classList.contains('wished')
        ? '<svg width="16" height="16" fill="#e74c3c" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 010-6.364z"/></svg>'
        : '<svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5 4.5 0 116.364 6.364L12 20.364l-7.682-7.682a4.5 4.5 0 010-6.364z"/></svg>';
}

// ── Subtle parallax on hero scroll ─────────────────────────────
const heroBg = document.getElementById('heroBg');
window.addEventListener('scroll', () => {
    const y = window.scrollY;
    if (y < window.innerHeight) {
        heroBg.style.transform = `scale(1) translateY(${y * 0.25}px)`;
    }
}, { passive: true });
</script>

<?php include 'includes/footer.php'; ?>