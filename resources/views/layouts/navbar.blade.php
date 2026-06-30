{{-- ============================================================
     resources/views/layouts/navbar.blade.php
     ============================================================ --}}

<style>
    /* ───────── RESET Y FUENTE ───────── */
    /* ELIMINADO: * { font-family: Arial... } para no romper Font Awesome */
    * {
        box-sizing: border-box;
    }

    /* ───────── VARIABLES ───────── */
    :root {
        --kh-navy:        #123489;
        --kh-navy2:       #0f2560;
        --kh-gold-lt:     #E7B133;
        --navbar-height:  110px;
        --top-bar-height: 42px;
    }

    html {
        scroll-behavior: smooth;
        scroll-padding-top: calc(var(--navbar-height) + var(--top-bar-height));
    }

    /* ───────── NAVBAR ───────── */
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
        padding: 0 2rem;
        box-shadow: 0 2px 12px rgba(0,0,0,.30);
        font-family: Arial, Helvetica, sans-serif; /* Solo para la navbar */
    }

    /* ───────── TOP BAR ───────── */
    .top-bar {
        display: none;
        position: fixed;
        top: var(--navbar-height);
        left: 0;
        right: 0;
        background: var(--kh-navy);
        height: var(--top-bar-height);
        z-index: 999;
        box-shadow: 0 2px 6px rgba(0,0,0,.20);
        border-bottom: 1px solid rgba(255,255,255,.06);
        font-family: Arial, Helvetica, sans-serif; /* Solo para la top-bar */
    }
    .top-bar__links {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0;
        list-style: none;
        margin: 0;
        padding: 0;
        height: 100%;
    }
    .top-bar__links li {
        display: flex;
        align-items: center;
        height: 100%;
    }
    .top-bar__links li + li::before {
        content: '';
        width: 1px;
        height: 16px;
        background: rgba(255,255,255,.20);
        margin: 0 .3rem;
    }
    .top-bar__links a {
        color: rgba(255,255,255,.9);
        text-decoration: none;
        font-size: .92rem;
        font-weight: 600;
        padding: .3rem .9rem;
        border-radius: 6px;
        transition: .25s;
        display: flex;
        align-items: center;
        gap: .4rem;
    }
    .top-bar__links a:hover {
        background: rgba(255,255,255,.10);
        color: var(--kh-gold-lt);
    }
    /* Icono WSP en top-bar */
    .top-bar__links .tb-wsp svg {
        width: 1.15rem;
        height: 1.15rem;
        fill: rgba(255,255,255,.9);
        transition: fill .25s;
        display: block;
    }
    .top-bar__links .tb-wsp:hover svg {
        fill: var(--kh-gold-lt);
    }

    /* ───────── LOGO ───────── */
    .navbar__logo {
        display: flex;
        align-items: center;
        height: 100%;
        flex-shrink: 0;
        text-decoration: none;
        gap: 12px;
        position: relative;
        z-index: 2;
        font-family: Arial, Helvetica, sans-serif; /* Solo para el logo */
    }
    .navbar__logo img {
        height: clamp(55px, 7vw, 85px);
        width: auto;
        object-fit: contain;
        display: block;
        transition: height .3s ease;
    }
    .logo-divider {
        width: 1px;
        height: clamp(40px, 5vw, 60px);
        background: rgba(255,255,255,.35);
        flex-shrink: 0;
        align-self: center;
    }
    .logo-text {
        display: flex;
        flex-direction: column;
        line-height: 1.1;
    }
    .logo-text .kapitalhaus {
        font-family: 'Cinzel', serif;
    font-size: clamp(2rem, 3vw, 3.5rem);
        font-weight: 700;
        color: #ffffff;
        letter-spacing: 1.5px;
        text-transform: none; /* CapitalHaus tiene solo la K y H en mayúscula */
    }
    .logo-text .sub-title-wrapper {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-top: 4px;
    }
    .logo-text .sub-title-line {
        width: 100%;
        height: 1px;
        background: rgba(255,255,255,.40);
        margin-bottom: 4px;
    }
    .logo-text .sub-title {
        font-size: clamp(0.42rem, 0.65vw, 0.62rem);
        font-weight: 400;
        color: #ffffff;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        opacity: .85;
        white-space: nowrap;
    }

    /* ───────── MENÚ DESKTOP ───────── */
    .navbar__links {
        display: flex;
        align-items: center;
        gap: .45rem;
        list-style: none;
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: Arial, Helvetica, sans-serif; /* Solo para el menú */
    }
    .navbar__links li {
        display: flex;
        align-items: center;
        height: 100%;
    }
    .navbar__links li a {
        color: rgba(255,255,255,.94);
        text-decoration: none;
        font-size: 1rem;
        font-weight: 700;
        letter-spacing: .4px;
        padding: .65rem 1rem;
        border-radius: 7px;
        transition: .25s;
        white-space: nowrap;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .navbar__links li a:hover,
    .navbar__links li a.active {
        background: rgba(255,255,255,.10);
        color: var(--kh-gold-lt);
        transform: translateY(-1px);
    }
    .navbar__links li + li::before {
        content: '';
        width: 1px;
        height: 18px;
        background: rgba(255,255,255,.22);
        margin-right: .45rem;
    }
    /* Botón WSP en menú desktop */
    .menu-wsp {
        display: flex !important;
        align-items: center;
        justify-content: center;
        width: 52px;
        height: 46px;
        padding: 0 !important;
        border-radius: 8px;
        transition: background .25s;
    }
    .menu-wsp svg {
        width: 1.65rem;
        height: 1.65rem;
        fill: rgba(255,255,255,.94);
        transition: fill .25s;
        display: block;
    }
    .menu-wsp:hover {
        background: rgba(255,255,255,.10);
    }
    .menu-wsp:hover svg {
        fill: var(--kh-gold-lt);
    }

    /* ───────── HAMBURGER ───────── */
    .navbar__hamburger {
        display: none;
        flex-direction: column;
        gap: 5px;
        background: none;
        border: none;
        cursor: pointer;
        padding: .5rem;
        z-index: 1002;
    }
    .navbar__hamburger span {
        width: 28px;
        height: 3px;
        background: white;
        border-radius: 2px;
        transition: .3s;
        display: block;
    }
    .navbar__hamburger.open span:nth-child(1) {
        transform: rotate(45deg) translate(5px,5px);
    }
    .navbar__hamburger.open span:nth-child(2) {
        opacity: 0;
    }
    .navbar__hamburger.open span:nth-child(3) {
        transform: rotate(-45deg) translate(5px,-5px);
    }

    /* ───────── MENÚ MÓVIL ───────── */
    .navbar__mobile-menu {
        position: fixed;
        top: calc(var(--navbar-height) + var(--top-bar-height));
        left: 0;
        right: 0;
        background: var(--kh-navy);
        z-index: 998;
        max-height: 0;
        overflow: hidden;
        transition: max-height .35s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,.25);
        border-top: 1px solid rgba(255,255,255,.06);
        font-family: Arial, Helvetica, sans-serif; /* Solo para el menú móvil */
    }
    .navbar__mobile-menu.open {
        max-height: 520px;
    }
    .navbar__mobile-menu ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .navbar__mobile-menu li {
        border-bottom: 1px solid rgba(255,255,255,.08);
    }
    .navbar__mobile-menu li:last-child {
        border-bottom: none;
    }
    .navbar__mobile-menu a {
        display: flex;
        align-items: center;
        gap: .8rem;
        color: white;
        text-decoration: none;
        font-size: 1.2rem;
        font-weight: 700;
        padding: 1.1rem 1.8rem;
        transition: background .25s, color .25s, padding-left .25s;
        letter-spacing: .5px;
    }
    .navbar__mobile-menu a:hover {
        background: rgba(255,255,255,.08);
        color: var(--kh-gold-lt);
        padding-left: 2.4rem;
    }
    /* Icono WSP en menú móvil */
    .navbar__mobile-menu .mobile-wsp-link svg {
        width: 1.35rem;
        height: 1.35rem;
        fill: white;
        transition: fill .25s;
        flex-shrink: 0;
        display: block;
    }
    .navbar__mobile-menu .mobile-wsp-link:hover svg {
        fill: var(--kh-gold-lt);
    }

    /* ───────── BOTÓN FLOTANTE WHATSAPP ───────── */
    .whatsapp-float {
        position: fixed;
        bottom: 25px;
        right: 25px;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all .3s ease;
    }
    .whatsapp-button {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #25d366 0%, #128C7E 100%);
        border-radius: 50%;
        box-shadow: 0 4px 15px rgba(0,0,0,.25);
        transition: all .3s ease;
        cursor: pointer;
        border: none;
        animation: pulse-whatsapp 2s infinite;
    }
    .whatsapp-button svg {
        width: 32px;
        height: 32px;
        fill: white;
        display: block;
    }
    .whatsapp-button .tooltip {
        position: absolute;
        right: 70px;
        background: rgba(0,0,0,.85);
        color: white;
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 500;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all .3s ease;
        box-shadow: 0 2px 10px rgba(0,0,0,.2);
        letter-spacing: .3px;
        pointer-events: none;
        font-family: Arial, Helvetica, sans-serif;
    }
    .whatsapp-button .tooltip::after {
        content: '';
        position: absolute;
        right: -8px;
        top: 50%;
        transform: translateY(-50%);
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent transparent rgba(0,0,0,.85);
    }
    .whatsapp-button:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(37,211,102,.4);
    }
    .whatsapp-button:hover .tooltip {
        opacity: 1;
        visibility: visible;
        right: 80px;
    }
    @keyframes pulse-whatsapp {
        0%   { box-shadow: 0 0 0 0 rgba(37,211,102,.4); }
        70%  { box-shadow: 0 0 0 15px rgba(37,211,102,0); }
        100% { box-shadow: 0 0 0 0 rgba(37,211,102,0); }
    }

    /* ───────── RESPONSIVE ───────── */
    @media (max-width: 999px) {
        .top-bar { display: block; }
        .navbar { padding: 0 1rem; }
        .navbar__links { display: none !important; }
        .navbar__hamburger { display: flex; }

        .navbar__logo img { height: clamp(55px, 14vw, 75px); }
        .logo-text .kapitalhaus {
            font-family: 'Cinzel', serif;
            font-size: clamp(2.5rem, 3.2vw, 2rem);
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 1.5px;
            text-transform: none; /* CapitalHaus tiene solo la K y H en mayúscula */
        }
            .logo-text .sub-title {
                font-family: 'Montserrat', sans-serif;
                font-size: clamp(0.5rem, 1vw, 1rem);
                font-weight: 500;
                color: #ffffff;
                letter-spacing: 2px;
                text-transform: uppercase;
                opacity: .9;
                white-space: nowrap;
            }
        .logo-divider { height: clamp(38px, 10vw, 55px); }
    }

    @media (max-width: 480px) {
        .navbar { padding: 0 0.6rem; }
        .navbar__logo { gap: 8px; }
        .navbar__logo img { height: clamp(48px, 12vw, 62px); }
        .logo-text .kapitalhaus {
            font-family: 'Cinzel', serif;
            font-size: clamp(1.2rem, 2.5vw, 2rem);
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 1.5px;
            text-transform: none; /* CapitalHaus tiene solo la K y H en mayúscula */
        }
        .logo-text .sub-title {
            font-family: 'Montserrat', sans-serif;
            font-size: clamp(0.7rem, 1vw, 1rem);
            font-weight: 500;
            color: #ffffff;
            letter-spacing: 2px;
            text-transform: uppercase;
            opacity: .9;
            white-space: nowrap;
        }
        .logo-divider { height: clamp(32px, 9vw, 45px); }
        .top-bar__links a { font-size: .75rem; padding: .2rem .5rem; }
        .top-bar__links .tb-wsp svg { width: .95rem; height: .95rem; }
    }

    @media (min-width: 1000px) {
        .top-bar { display: none !important; }
        .navbar__mobile-menu { display: none; }
    }
</style>

{{-- SVG WhatsApp reutilizable --}}
{{-- Usamos un <template> para no repetir el path SVG en cada icono --}}

{{-- ════════════════════════════════════════════════════════════ --}}
{{--  NAVBAR                                                     --}}
{{-- ════════════════════════════════════════════════════════════ --}}
<nav class="navbar">

    {{-- LOGO --}}
    <a href="{{ url('/') }}" class="navbar__logo">
        <img src="{{ asset('img/logo_transparente.png') }}" alt="KBR KapitalHaus">
        <div class="logo-divider"></div>
        <div class="logo-text">
            <span class="kapitalhaus">KapitalHaus</span>
            <div class="sub-title-wrapper">
                <span class="sub-title-line"></span>
                <span class="sub-title">GESTIÓN INMOBILIARIA &amp; BIENES RAÍCES</span>
            </div>
        </div>
    </a>

    {{-- MENÚ DESKTOP --}}
    <ul class="navbar__links">
        <li><a href="{{ url('/') }}"          class="{{ request()->is('/')          ? 'active' : '' }}">INICIO</a></li>
        <li><a href="{{ url('/servicios') }}"  class="{{ request()->is('servicios')  ? 'active' : '' }}">SERVICIOS</a></li>
        <li><a href="{{ url('/beneficios') }}" class="{{ request()->is('beneficios') ? 'active' : '' }}">BENEFICIOS</a></li>
        <li><a href="{{ url('/nosotros') }}"   class="{{ request()->is('nosotros')   ? 'active' : '' }}">NOSOTROS</a></li>
        <li><a href="{{ url('/contacto') }}"   class="{{ request()->is('contacto')   ? 'active' : '' }}">CONTÁCTANOS</a></li>
        <li>
            <a href="https://wa.me/51964285907" target="_blank" rel="noopener" class="menu-wsp" title="WhatsApp">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
            </a>
        </li>
    </ul>

    {{-- HAMBURGER --}}
    <button class="navbar__hamburger" id="hamburger" aria-label="Abrir menú">
        <span></span><span></span><span></span>
    </button>

</nav>

{{-- ════════════════════════════════════════════════════════════ --}}
{{--  TOP BAR (solo visible en móvil)                           --}}
{{-- ════════════════════════════════════════════════════════════ --}}
<div class="top-bar">
    <ul class="top-bar__links">
        <li><a href="{{ url('/nosotros') }}">NOSOTROS</a></li>
        <li><a href="{{ url('/servicios') }}">SERVICIOS</a></li>
        <li><a href="{{ url('/beneficios') }}">BENEFICIOS</a></li>
        <li>
            <a href="https://wa.me/51964285907" target="_blank" rel="noopener" class="tb-wsp" title="WhatsApp">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
            </a>
        </li>
    </ul>
</div>

{{-- ════════════════════════════════════════════════════════════ --}}
{{--  MENÚ MÓVIL                                                --}}
{{-- ════════════════════════════════════════════════════════════ --}}
<div class="navbar__mobile-menu" id="mobileMenu">
    <ul>
        <li><a href="{{ url('/') }}">INICIO</a></li>
        <li><a href="{{ url('/servicios') }}">SERVICIOS</a></li>
        <li><a href="{{ url('/beneficios') }}">BENEFICIOS</a></li>
        <li><a href="{{ url('/nosotros') }}">NOSOTROS</a></li>
        <li><a href="{{ url('/contacto') }}">CONTÁCTANOS</a></li>
        <li>
            <a href="https://wa.me/51964285907" target="_blank" rel="noopener" class="mobile-wsp-link">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                WHATSAPP
            </a>
        </li>
    </ul>
</div>

{{-- ════════════════════════════════════════════════════════════ --}}
{{--  WHATSAPP FLOTANTE                                         --}}
{{-- ════════════════════════════════════════════════════════════ --}}
<a href="https://wa.me/51964285907" target="_blank" rel="noopener" class="whatsapp-float">
    <div class="whatsapp-button">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
        <span class="tooltip">📱 Contacta con un asesor</span>
    </div>
</a>

{{-- ════════════════════════════════════════════════════════════ --}}
{{--  SCRIPTS                                                   --}}
{{-- ════════════════════════════════════════════════════════════ --}}
<script>
    (function () {
        const hamburger  = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburger.addEventListener('click', function () {
            hamburger.classList.toggle('open');
            mobileMenu.classList.toggle('open');
            document.body.style.overflow =
                mobileMenu.classList.contains('open') ? 'hidden' : '';
        });

        document.querySelectorAll('.navbar__mobile-menu a, .top-bar__links a')
            .forEach(function (link) {
                link.addEventListener('click', function () {
                    hamburger.classList.remove('open');
                    mobileMenu.classList.remove('open');
                    document.body.style.overflow = '';
                });
            });
    })();
</script>