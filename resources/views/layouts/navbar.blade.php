{{-- ============================================================
     resources/views/layouts/navbar.blade.php
     ============================================================ --}}

<style>
    :root {
        --kh-navy:   #123489;
        --kh-navy2:  #0f2560;
        --kh-gold:   #c9a84c;
        --kh-gold-lt:#e8c97a;
        --navbar-height: 70px;
        --top-bar-height: 50px;
    }

    /* Ajuste global para el scroll suave */
    html {
        scroll-behavior: smooth;
        scroll-padding-top: calc(var(--navbar-height) + var(--top-bar-height));
    }

    /* ── BARRA SUPERIOR (solo visible en móvil) ── */
    .top-bar {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        background: var(--kh-navy);
        height: var(--top-bar-height);
        z-index: 1001;
        box-shadow: 0 1px 4px rgba(0,0,0,0.2);
    }

    .top-bar__links {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        list-style: none;
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .top-bar__links li a {
        color: rgba(255,255,255,0.88);
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        padding: 0.3rem 0.8rem;
        border-radius: 6px;
        transition: background 0.2s, color 0.2s;
    }

    .top-bar__links li a:hover {
        background: rgba(255,255,255,0.12);
        color: var(--kh-gold-lt);
    }

    /* ── Navbar base ── */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background: var(--kh-navy);
        height: var(--navbar-height);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1.2rem;
        box-shadow: 0 2px 12px rgba(0,0,0,0.3);
    }

    .navbar__logo {
        display: flex;
        align-items: center;
        text-decoration: none;
        flex-shrink: 0;
    }

    .navbar__logo img {
        height: 55px;
        width: auto;
        object-fit: contain;
        display: block;
    }

    .navbar__links {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar__links li a {
        color: rgba(255,255,255,0.88);
        text-decoration: none;
        font-size: 0.88rem;
        font-weight: 600;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        transition: background 0.2s, color 0.2s;
        white-space: nowrap;
    }

    .navbar__links li a:hover,
    .navbar__links li a.active {
        background: rgba(255,255,255,0.12);
        color: var(--kh-gold-lt);
    }

    .navbar__links li + li::before {
        content: '';
        display: inline-block;
        width: 1px;
        height: 14px;
        background: rgba(255,255,255,0.25);
        vertical-align: middle;
        margin-right: 0.25rem;
    }

    .navbar__hamburger {
        display: none;
        flex-direction: column;
        gap: 5px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.5rem;
        z-index: 1002;
    }

    .navbar__hamburger span {
        display: block;
        width: 25px;
        height: 2.5px;
        background: white;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .navbar__hamburger.open span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }
    .navbar__hamburger.open span:nth-child(2) {
        opacity: 0;
    }
    .navbar__hamburger.open span:nth-child(3) {
        transform: rotate(-45deg) translate(5px, -5px);
    }

    .navbar__mobile-menu {
        position: fixed;
        top: var(--navbar-height);
        left: 0;
        right: 0;
        background: var(--kh-navy2);
        z-index: 999;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-in-out;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .navbar__mobile-menu.open {
        max-height: 400px;
    }

    .navbar__mobile-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .navbar__mobile-menu li {
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .navbar__mobile-menu li a {
        display: block;
        color: white;
        text-decoration: none;
        font-size: 1rem;
        font-weight: 500;
        padding: 1rem 1.5rem;
        transition: background 0.2s, padding-left 0.2s;
    }

    .navbar__mobile-menu li a:hover {
        background: rgba(201,168,76,0.2);
        color: var(--kh-gold-lt);
        padding-left: 2rem;
    }

    /* Burbujas flotantes */
    .social-float {
        position: fixed;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1002;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .social-float a {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        text-decoration: none;
        font-size: 1.2rem;
        color: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.25);
        transition: transform 0.25s;
    }

    .social-float a:hover {
        transform: scale(1.1);
    }

    .social-float .sf-fb { background: #1877f2; }
    .social-float .sf-wa { background: #25d366; }
    .social-float .sf-ig {
        background: radial-gradient(circle at 30% 107%,
            #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285aeb 90%);
    }

    .social-float a::before {
        content: attr(data-tip);
        position: absolute;
        right: 48px;
        background: rgba(0,0,0,0.75);
        color: #fff;
        font-size: 0.7rem;
        font-weight: 600;
        padding: 0.25rem 0.6rem;
        border-radius: 6px;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.2s;
    }

    .social-float a:hover::before { opacity: 1; }

    /* Responsive */
    @media (max-width: 768px) {
        .top-bar { display: block; }
        .navbar { top: var(--top-bar-height); }
        .navbar__links { display: none !important; }
        .navbar__hamburger { display: flex; }
        .navbar__mobile-menu { top: calc(var(--navbar-height) + var(--top-bar-height)); }
        .navbar__logo img { height: 42px; }
        .navbar { padding: 0 1rem; }
        .social-float { right: 8px; gap: 6px; }
        .social-float a { width: 36px; height: 36px; font-size: 1rem; }
        .social-float a::before { display: none; }
    }

    @media (min-width: 769px) {
        .top-bar { display: none !important; }
        .navbar__mobile-menu { display: none; }
    }
</style>

{{-- BARRA SUPERIOR (solo móvil) --}}
<div class="top-bar">
    <ul class="top-bar__links">
        <li><a href="{{ url('/nosotros') }}">NOSOTROS</a></li>
        <li><a href="{{ url('/servicios') }}">SERVICIOS</a></li>
        <li><a href="{{ url('/beneficios') }}">BENEFICIOS</a></li>
    </ul>
</div>

{{-- NAVBAR PRINCIPAL --}}
<nav class="navbar">
    <a href="{{ url('/') }}" class="navbar__logo">
        <img src="{{ asset('img/logo.png') }}" alt="KBR KapitalHaus" />
    </a>

    <ul class="navbar__links">
        <li><a href="{{ url('/') }}">INICIO</a></li>
        <li><a href="{{ url('/nosotros') }}">NOSOTROS</a></li>
        <li><a href="{{ url('/servicios') }}">SERVICIOS</a></li>
        <li><a href="{{ url('/beneficios') }}">BENEFICIOS</a></li>
        <li><a href="{{ url('/contacto') }}">CONTACTO</a></li>
    </ul>

    <button class="navbar__hamburger" id="hamburger" aria-label="Menú">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<div class="navbar__mobile-menu" id="mobileMenu">
    <ul>
        <li><a href="{{ url('/') }}">INICIO</a></li>
        <li><a href="{{ url('/nosotros') }}">NOSOTROS</a></li>
        <li><a href="{{ url('/servicios') }}">SERVICIOS</a></li>
        <li><a href="{{ url('/beneficios') }}">BENEFICIOS</a></li>
        <li><a href="{{ url('/contacto') }}">CONTACTO</a></li>
    </ul>
</div>

<div class="social-float">
    <a href="https://facebook.com" target="_blank" class="sf-fb" title="Facebook" data-tip="Facebook"><i class="fab fa-facebook-f"></i></a>
    <a href="https://wa.me/51961666679" target="_blank" class="sf-wa" title="WhatsApp" data-tip="WhatsApp"><i class="fab fa-whatsapp"></i></a>
    <a href="https://instagram.com" target="_blank" class="sf-ig" title="Instagram" data-tip="Instagram"><i class="fab fa-instagram"></i></a>
</div>

<script>
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    hamburger.addEventListener('click', function() {
        hamburger.classList.toggle('open');
        mobileMenu.classList.toggle('open');
        document.body.style.overflow = mobileMenu.classList.contains('open') ? 'hidden' : '';
    });

    document.querySelectorAll('.navbar__mobile-menu a, .top-bar__links a').forEach(link => {
        link.addEventListener('click', function() {
            hamburger.classList.remove('open');
            mobileMenu.classList.remove('open');
            document.body.style.overflow = '';
        });
    });
</script>