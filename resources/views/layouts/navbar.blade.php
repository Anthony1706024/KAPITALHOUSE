{{-- ============================================================
     resources/views/layouts/navbar.blade.php
     ============================================================ --}}

<style>
        /* Botón flotante de WhatsApp */
    .whatsapp-float {
        position: fixed;
        bottom: 25px;
        right: 25px;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    /* Contenedor del botón con tooltip */
    .whatsapp-button {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #25d366 0%, #128C7E 100%);
        border-radius: 50%;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
    }

    /* Icono de WhatsApp */
    .whatsapp-button i {
        font-size: 32px;
        color: white;
        transition: all 0.3s ease;
    }

    /* Tooltip que aparece al hacer hover */
    .whatsapp-button .tooltip {
        position: absolute;
        right: 70px;
        background: rgba(0, 0, 0, 0.85);
        color: white;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 500;
        font-family: 'Outfit', sans-serif;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        letter-spacing: 0.3px;
        pointer-events: none;
    }

    /* Flecha del tooltip */
    .whatsapp-button .tooltip::after {
        content: '';
        position: absolute;
        right: -8px;
        top: 50%;
        transform: translateY(-50%);
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent transparent rgba(0, 0, 0, 0.85);
    }

    /* Efecto hover del botón */
    .whatsapp-button:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
    }

    /* Mostrar tooltip al hacer hover */
    .whatsapp-button:hover .tooltip {
        opacity: 1;
        visibility: visible;
        right: 80px;
    }

    /* Animación de pulso para llamar la atención */
    @keyframes pulse-whatsapp {
        0% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.4);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
        }
    }

    .whatsapp-button {
        animation: pulse-whatsapp 2s infinite;
    }

    /* Responsive para móviles */
    @media (max-width: 768px) {
        .whatsapp-button {
            width: 55px;
            height: 55px;
        }
        .whatsapp-button i {
            font-size: 28px;
        }
        .whatsapp-button .tooltip {
            font-size: 12px;
            padding: 6px 12px;
            white-space: nowrap;
        }
        .whatsapp-button .tooltip::after {
            border-width: 4px;
        }
    }

    /* Para pantallas muy pequeñas */
    @media (max-width: 480px) {
        .whatsapp-button {
            width: 50px;
            height: 50px;
        }
        .whatsapp-button i {
            font-size: 25px;
        }
        .whatsapp-button .tooltip {
            font-size: 11px;
            padding: 5px 10px;
            right: 60px;
        }
        .whatsapp-button:hover .tooltip {
            right: 65px;
        }
    }
    :root{
        --kh-navy:#123489;
        --kh-navy2:#0f2560;
        --kh-gold:#E7B133;
        --kh-gold-lt:#E7B133;

        --navbar-height:110px;
        --top-bar-height:50px;
    }

    html{
        scroll-behavior:smooth;
        scroll-padding-top:
            calc(var(--navbar-height) + var(--top-bar-height));
    }

    /* ───────── TOP BAR ───────── */
    .top-bar{
        display:none;
        position:fixed;
        top:0;
        left:0;
        right:0;
        background:var(--kh-navy);
        height:var(--top-bar-height);
        z-index:1001;
        box-shadow:0 1px 4px rgba(0,0,0,.2);
    }

    .top-bar__links{
        display:flex;
        align-items:center;
        justify-content:center;
        gap:1rem;
        list-style:none;
        margin:0;
        padding:0;
        height:100%;
    }

    .top-bar__links a{
        color:rgba(255,255,255,.9);
        text-decoration:none;
        font-size:.95rem;
        font-weight:600;
        padding:.35rem .8rem;
        border-radius:6px;
        transition:.25s;
    }

    .top-bar__links a:hover{
        background:rgba(255,255,255,.10);
        color:var(--kh-gold-lt);
    }

    /* ───────── NAVBAR ───────── */
    .navbar{
        position:fixed;
        top:0;
        left:0;
        right:0;
        z-index:1000;
        background:var(--kh-navy);
        height:var(--navbar-height);
        display:flex;
        align-items:center;
        justify-content:space-between;
        padding:0 2rem;
        box-shadow:0 2px 12px rgba(0,0,0,.30);
    }

    /* LOGO */
    .navbar__logo{
        display:flex;
        align-items:center;
        justify-content:center;
        height:100%;
        flex-shrink:0;
        text-decoration:none;
        overflow:visible;
        position:relative;
        z-index:2;
    }

    /* LOGO RESPONSIVE REAL */
    .navbar__logo img{
        height:clamp(70px,10vw,100px);
        width:auto;
        object-fit:contain;
        display:block;
        position:relative;
        top:2px;
        transition:height .3s ease;
    }

    /* MENU */
    .navbar__links{
        display:flex;
        align-items:center;
        gap:.45rem;
        list-style:none;
        margin:0;
        padding:0;
        height:100%;
    }

    .navbar__links li{
        display:flex;
        align-items:center;
        height:100%;
    }

    .navbar__links li a{
        color:rgba(255,255,255,.94);
        text-decoration:none;
        font-size:1rem;
        font-weight:700;
        letter-spacing:.4px;
        padding:.65rem 1rem;
        border-radius:7px;
        transition:.25s;
        white-space:nowrap;
        display:flex;
        align-items:center;
        justify-content:center;
    }

    /* HOVER */
    .navbar__links li a:hover,
    .navbar__links li a.active{
        background:rgba(255,255,255,.10);
        color:var(--kh-gold-lt);
        transform:translateY(-1px);
    }

    .navbar__links li + li::before{
        content:'';
        width:1px;
        height:18px;
        background:rgba(255,255,255,.22);
        margin-right:.45rem;
    }

    /* WSP */
    .menu-wsp{
        display:flex !important;
        align-items:center;
        justify-content:center;
        width:52px;
        height:46px;
        padding:0 !important;
        border-radius:8px;
        transition:.25s;
    }

    .menu-wsp i{
        font-size:1.65rem;
        color:rgba(255,255,255,.94);
        transition:.25s;
    }

    .menu-wsp:hover{
        background:rgba(255,255,255,.10);
    }

    .menu-wsp:hover i{
        color:var(--kh-gold-lt);
    }

    /* ───────── HAMBURGER ───────── */
    .navbar__hamburger{
        display:none;
        flex-direction:column;
        gap:5px;
        background:none;
        border:none;
        cursor:pointer;
        padding:.5rem;
        z-index:1002;
    }

    .navbar__hamburger span{
        width:26px;
        height:2.5px;
        background:white;
        border-radius:2px;
        transition:.3s;
    }

    .navbar__hamburger.open span:nth-child(1){
        transform:rotate(45deg) translate(5px,5px);
    }

    .navbar__hamburger.open span:nth-child(2){
        opacity:0;
    }

    .navbar__hamburger.open span:nth-child(3){
        transform:rotate(-45deg) translate(5px,-5px);
    }

    /* ───────── MOBILE MENU ───────── */
    .navbar__mobile-menu{
        position:fixed;
        top:var(--navbar-height);
        left:0;
        right:0;
        background:var(--kh-navy2);
        z-index:999;
        max-height:0;
        overflow:hidden;
        transition:max-height .3s ease;
        box-shadow:0 4px 12px rgba(0,0,0,.2);
    }

    .navbar__mobile-menu.open{
        max-height:450px;
    }

    .navbar__mobile-menu ul{
        list-style:none;
        margin:0;
        padding:0;
    }

    .navbar__mobile-menu li{
        border-bottom:1px solid rgba(255,255,255,.1);
    }

    .navbar__mobile-menu a{
        display:block;
        color:white;
        text-decoration:none;
        font-size:1.05rem;
        font-weight:600;
        padding:1rem 1.5rem;
        transition:.25s;
    }

    .navbar__mobile-menu a:hover{
        background:rgba(255,255,255,.10);
        color:var(--kh-gold-lt);
        padding-left:2rem;
    }

    /* ───────── RESPONSIVE ───────── */
    @media (max-width:999px){

        .top-bar{
            display:block;
        }

        .navbar{
            top:var(--top-bar-height);
            padding:0 1rem;
        }

        .navbar__links{
            display:none!important;
        }

        .navbar__hamburger{
            display:flex;
        }

        .navbar__mobile-menu{
            top:calc(
                var(--navbar-height) +
                var(--top-bar-height)
            );
        }

        /* LOGO RESPONSIVE MOVIL */
        .navbar__logo img{
            height:clamp(65px,18vw,95px);
        }
    }

    @media (min-width:1000px){
        .top-bar{
            display:none!important;
        }

        .navbar__mobile-menu{
            display:none;
        }
    }
</style>

{{-- TOP BAR --}}
<div class="top-bar">
    <ul class="top-bar__links">
        <li><a href="{{ url('/nosotros') }}">NOSOTROS</a></li>
        <li><a href="{{ url('/servicios') }}">SERVICIOS</a></li>
        <li><a href="{{ url('/beneficios') }}">BENEFICIOS</a></li>
    </ul>
</div>

{{-- NAVBAR --}}
<nav class="navbar">

    <a href="{{ url('/') }}" class="navbar__logo">
        <img src="{{ asset('img/logo_transparente.png') }}"
             alt="KBR KapitalHaus">
    </a>

    <ul class="navbar__links">
        <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">INICIO</a></li>
        <li><a href="{{ url('/nosotros') }}" class="{{ request()->is('nosotros') ? 'active' : '' }}">QUIENES SOMOS</a></li>
        <li><a href="{{ url('/servicios') }}" class="{{ request()->is('servicios') ? 'active' : '' }}">SERVICIOS</a></li>
        <li><a href="{{ url('/beneficios') }}" class="{{ request()->is('beneficios') ? 'active' : '' }}">BENEFICIOS</a></li>
        <li><a href="{{ url('/contacto') }}" class="{{ request()->is('contacto') ? 'active' : '' }}">CONTÁCTANOS</a></li>

        <li>
            <a href="https://wa.me/51961666679"
               target="_blank"
               class="menu-wsp"
               title="WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>
        </li>
    </ul>

    <button class="navbar__hamburger" id="hamburger">
        <span></span><span></span><span></span>
    </button>

</nav>

{{-- MENU MOVIL --}}
<div class="navbar__mobile-menu" id="mobileMenu">
    <ul>
        <li><a href="{{ url('/') }}">INICIO</a></li>
        <li><a href="{{ url('/nosotros') }}">QUIENES SOMOS</a></li>
        <li><a href="{{ url('/servicios') }}">SERVICIOS</a></li>
        <li><a href="{{ url('/beneficios') }}">BENEFICIOS</a></li>
        <li><a href="{{ url('/contacto') }}">CONTÁCTANOS</a></li>
        <li>
            <a href="https://wa.me/51961666679" target="_blank">
                <i class="fab fa-whatsapp"></i> WhatsApp
            </a>
        </li>
    </ul>
</div>
<a href="https://wa.me/51961666679" target="_blank" class="whatsapp-float">
    <div class="whatsapp-button">
        <i class="fab fa-whatsapp"></i>
        <span class="tooltip">📱 Contacta con un asesor</span>
    </div>
</a>
<script>
const hamburger=document.getElementById('hamburger');
const mobileMenu=document.getElementById('mobileMenu');

hamburger.addEventListener('click',()=>{
    hamburger.classList.toggle('open');
    mobileMenu.classList.toggle('open');

    document.body.style.overflow=
        mobileMenu.classList.contains('open')
        ? 'hidden'
        : '';
});

document.querySelectorAll('.navbar__mobile-menu a,.top-bar__links a')
.forEach(link=>{
    link.addEventListener('click',()=>{
        hamburger.classList.remove('open');
        mobileMenu.classList.remove('open');
        document.body.style.overflow='';
    });
});
</script>