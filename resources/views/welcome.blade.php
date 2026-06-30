<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBR KapitalHaus — Gestión Inmobiliaria Profesional</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo_redondo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* ══ SVG ICON HELPERS ══ */
        .icon-svg {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .icon-svg svg {
            display: block;
            fill: currentColor;
        }

        /* ══ WHATSAPP FLOTANTE ══ */
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
        .whatsapp-button {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #25d366 0%, #128C7E 100%);
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(0,0,0,0.25);
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            animation: pulse-whatsapp 2s infinite;
        }
        .whatsapp-button svg { width: 32px; height: 32px; fill: white; display: block; }
        .whatsapp-button .tooltip {
            position: absolute;
            right: 70px;
            background: rgba(0,0,0,0.85);
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
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            letter-spacing: 0.3px;
            pointer-events: none;
        }
        .whatsapp-button .tooltip::after {
            content: '';
            position: absolute;
            right: -8px;
            top: 50%;
            transform: translateY(-50%);
            border-width: 5px;
            border-style: solid;
            border-color: transparent transparent transparent rgba(0,0,0,0.85);
        }
        .whatsapp-button:hover { transform: scale(1.1); box-shadow: 0 6px 20px rgba(37,211,102,0.4); }
        .whatsapp-button:hover .tooltip { opacity: 1; visibility: visible; right: 80px; }
        @keyframes pulse-whatsapp {
            0%   { box-shadow: 0 0 0 0 rgba(37,211,102,0.4); }
            70%  { box-shadow: 0 0 0 15px rgba(37,211,102,0); }
            100% { box-shadow: 0 0 0 0 rgba(37,211,102,0); }
        }
        @media (max-width: 480px) {
            .whatsapp-button { width: 50px; height: 50px; }
            .whatsapp-button svg { width: 25px; height: 25px; }
            .whatsapp-button .tooltip { font-size: 11px; padding: 5px 10px; right: 60px; }
            .whatsapp-button:hover .tooltip { right: 65px; }
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --navy:        #0a1a45;
            --navy-mid:    #0d2260;
            --navy-light:  #132863;
            --gold:        #f2bd2d;
            --gold-light:  #e4c97e;
            --gold-dim:    rgba(201,168,76,0.12);
            --white:       #ffffff;
            --gray-light:  #f4f5f7;
            --text-mid:    #4a5568;
            --text-muted:  rgba(255,255,255,0.65);
            --kh-navy:     #123489;
            --kh-navy2:    #0f2560;
            --kh-gold:     #E7B133;
            --kh-gold-lt:  #E7B133;
            --navbar-height:   110px;
            --top-bar-height:  42px;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: calc(var(--navbar-height) + var(--top-bar-height));
            overflow-x: hidden;
        }
        body {
            font-family: 'Outfit', sans-serif;
            background: var(--white);
            overflow-x: hidden;
            width: 100%;
            position: relative;
        }

        @keyframes fade-up {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-in  { from { opacity: 0; } to { opacity: 1; } }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(201,168,76,0.4); }
            50%       { box-shadow: 0 0 0 18px rgba(201,168,76,0); }
        }
        @keyframes subtle-zoom {
            from { transform: scale(1.03); }
            to   { transform: scale(1.12); }
        }

        /* ══ TOP BAR ══ */
        .top-bar {
            display: none;
            position: fixed; top: 0; left: 0; right: 0;
            background: var(--kh-navy);
            height: var(--top-bar-height);
            z-index: 1001;
            box-shadow: 0 1px 4px rgba(0,0,0,.2);
            overflow: hidden;
            width: 100%;
            box-sizing: border-box;
        }
        .top-bar__links {
            display: flex; align-items: center; justify-content: center;
            gap: 0; list-style: none; margin: 0; padding: 0; height: 100%;
        }
        .top-bar__links li { display: flex; align-items: center; height: 100%; }
        .top-bar__links li + li::before {
            content: ''; width: 1px; height: 16px;
            background: rgba(255,255,255,.20); margin: 0 .3rem;
        }
        .top-bar__links a {
            color: rgba(255,255,255,.9); text-decoration: none;
            font-size: .88rem; font-weight: 600;
            padding: .3rem .9rem; border-radius: 6px; transition: .25s;
            display: flex; align-items: center; gap: .4rem;
        }
        .top-bar__links a:hover { background: rgba(255,255,255,.10); color: var(--kh-gold-lt); }
        .top-bar__links .tb-wsp svg { width: 1.1rem; height: 1.1rem; fill: rgba(255,255,255,.9); transition: fill .25s; }
        .top-bar__links .tb-wsp:hover svg { fill: var(--kh-gold-lt); }

        /* ══ NAVBAR ══ */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0;
            z-index: 1000; background: var(--kh-navy);
            height: var(--navbar-height);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 2rem;
            box-shadow: 0 2px 12px rgba(0,0,0,.30);
            width: 100%; box-sizing: border-box;
        }
        .navbar__logo {
            display: flex; align-items: center; height: 100%;
            flex-shrink: 0; text-decoration: none; gap: 12px;
            position: relative; z-index: 2;
        }
        .navbar__logo img {
            height: clamp(55px, 7vw, 85px); width: auto;
            object-fit: contain; display: block; transition: height .3s ease;
        }
        .logo-divider {
            width: 1px; height: clamp(40px, 5vw, 60px);
            background: rgba(255,255,255,.35); flex-shrink: 0; align-self: center;
        }
        .logo-text { display: flex; flex-direction: column; line-height: 1.1; }
        .logo-text .kapitalhaus {
            font-size: clamp(1.2rem, 2.5vw, 2rem); font-weight: 700;
            color: #ffffff; letter-spacing: 1.5px; text-transform: uppercase;
        }
        .logo-text .sub-title-wrapper {
            display: flex; flex-direction: column; align-items: flex-start; margin-top: 4px;
        }
        .logo-text .sub-title-line {
            width: 100%; height: 1px; background: rgba(255,255,255,.40); margin-bottom: 4px;
        }
        .logo-text .sub-title {
            font-size: clamp(0.42rem, 0.65vw, 0.62rem); font-weight: 400;
            color: #ffffff; letter-spacing: 1.5px; text-transform: uppercase;
            opacity: .85; white-space: nowrap;
        }

        .navbar__links {
            display: flex; align-items: center; gap: .45rem;
            list-style: none; margin: 0; padding: 0; height: 100%;
        }
        .navbar__links li { display: flex; align-items: center; height: 100%; }
        .navbar__links li a {
            color: rgba(255,255,255,.94); text-decoration: none;
            font-size: 1rem; font-weight: 700; letter-spacing: .4px;
            padding: .65rem 1rem; border-radius: 7px; transition: .25s;
            white-space: nowrap; display: flex; align-items: center; justify-content: center;
        }
        .navbar__links li a:hover,
        .navbar__links li a.active {
            background: rgba(255,255,255,.10); color: var(--kh-gold-lt); transform: translateY(-1px);
        }
        .navbar__links li + li::before {
            content: ''; width: 1px; height: 18px;
            background: rgba(255,255,255,.22); margin-right: .45rem;
        }
        .menu-wsp {
            display: flex !important; align-items: center; justify-content: center;
            width: 52px; height: 46px; padding: 0 !important;
            border-radius: 8px; transition: background .25s;
        }
        .menu-wsp svg { width: 1.65rem; height: 1.65rem; fill: rgba(255,255,255,.94); transition: fill .25s; }
        .menu-wsp:hover { background: rgba(255,255,255,.10); }
        .menu-wsp:hover svg { fill: var(--kh-gold-lt); }

        /* ══ HAMBURGER ══ */
        .navbar__hamburger {
            display: none; flex-direction: column; gap: 5px;
            background: none; border: none; cursor: pointer; padding: .5rem; z-index: 1002;
        }
        .navbar__hamburger span {
            width: 26px; height: 2.5px; background: white; border-radius: 2px; transition: .3s;
        }
        .navbar__hamburger.open span:nth-child(1) { transform: rotate(45deg) translate(5px,5px); }
        .navbar__hamburger.open span:nth-child(2) { opacity: 0; }
        .navbar__hamburger.open span:nth-child(3) { transform: rotate(-45deg) translate(5px,-5px); }

        /* ══ MOBILE MENU ══ */
        .navbar__mobile-menu {
            position: fixed; top: var(--navbar-height); left: 0; right: 0;
            background: var(--kh-navy2); z-index: 999;
            max-height: 0; overflow: hidden; transition: max-height .3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,.2);
        }
        .navbar__mobile-menu.open { max-height: 500px; }
        .navbar__mobile-menu ul { list-style: none; margin: 0; padding: 0; }
        .navbar__mobile-menu li { border-bottom: 1px solid rgba(255,255,255,.08); }
        .navbar__mobile-menu li:last-child { border-bottom: none; }
        .navbar__mobile-menu a {
            display: flex; align-items: center; gap: .8rem;
            color: white; text-decoration: none;
            font-size: 1.1rem; font-weight: 700;
            padding: 1rem 1.5rem; transition: .25s; letter-spacing: .5px;
        }
        .navbar__mobile-menu a:hover {
            background: rgba(255,255,255,.08); color: var(--kh-gold-lt); padding-left: 2rem;
        }
        .navbar__mobile-menu .mobile-wsp-link svg {
            width: 1.3rem; height: 1.3rem; fill: white; transition: fill .25s; flex-shrink: 0;
        }
        .navbar__mobile-menu .mobile-wsp-link:hover svg { fill: var(--kh-gold-lt); }

        /* ══ GLOBALS ══ */
        .section-wrap { max-width: 1400px; width: 100%; margin: 0 auto; padding: 0 2.5rem; box-sizing: border-box; }
        .section-label {
            display: inline-flex; align-items: center; gap: 10px;
            font-size: .72rem; font-weight: 600; letter-spacing: .2em; text-transform: uppercase;
            margin-bottom: .8rem; color: var(--gold);
        }
        .section-label::before { content: ''; display: block; width: 28px; height: 1.5px; background: var(--gold); }
        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.8rem, 3.5vw, 2.8rem); font-weight: 300; line-height: 1.15; color: var(--navy);
        }
        .section-title em { font-style: italic; color: var(--gold); }

        /* ══ HERO ══ */
        #inicio {
            position: relative; width: 100%; max-width: 100%; box-sizing: border-box;
            min-height: 100vh; display: flex; flex-direction: column; overflow: hidden;
        }
        .hero-bg {
            position: absolute; inset: 0;
            background-image: url('{{ asset("img/piscina.png") }}');
            background-size: cover; background-position: center 40%;
            animation: subtle-zoom 12s ease-in-out infinite alternate;
        }
        .hero-overlay-left {
            position: absolute; inset: 0;
            background: linear-gradient(to right, rgba(10,26,69,.65) 0%, rgba(10,26,69,.45) 30%, rgba(10,26,69,.20) 55%, transparent 80%);
            z-index: 1;
        }
        .hero-overlay-bottom {
            position: absolute; bottom: 0; left: 0; right: 0; height: 40%;
            background: linear-gradient(to top, rgba(9,22,60,.85) 0%, rgba(9,22,60,.50) 30%, transparent 100%);
            z-index: 1;
        }
        .hero-overlay-top {
            position: absolute; top: 0; left: 0; right: 0; height: 120px;
            background: linear-gradient(to bottom, rgba(10,26,69,.35) 0%, transparent 100%);
            z-index: 1;
        }
        .hero-content {
            position: relative; z-index: 10;
            width: 100%; max-width: 100%; box-sizing: border-box;
            padding: 0 1.5rem;
            margin: 0; margin-top: 120px; margin-bottom: 1rem;
            flex: 1; display: flex; flex-direction: column; justify-content: center;
        }
        .hero-title-main {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 5vw, 4rem); font-weight: 800;
            line-height: 1.1; color: var(--white); text-transform: uppercase; letter-spacing: -.01em;
            opacity: 0; animation: fade-up .9s ease forwards .3s; max-width: 750px;
        }
        .hero-title-main .gold-text { color: var(--gold); }
        .hero-subtitle-secondary {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.2rem, 2.5vw, 1.8rem); font-weight: 400; font-style: italic;
            color: rgba(255,255,255,.92); margin-top: .5rem;
            opacity: 0; animation: fade-up .9s ease forwards .5s;
        }

        /* ── Hero Cards ── */
        .hero-cards-section {
            position: relative; z-index: 10;
            width: 100%; max-width: 100%; box-sizing: border-box;
            padding: 0 1.5rem 3rem; margin-top: 5px;
        }
        .hero-cards-nav {
            display: none; justify-content: flex-end; gap: .75rem; margin-bottom: 1rem;
        }
        @media (max-width: 1199px) { .hero-cards-nav { display: flex; } }
        .hero-nav-btn {
            width: 36px; height: 36px; border-radius: 50%;
            background: rgba(255,255,255,.15); border: 1px solid rgba(201,168,76,.4);
            color: var(--gold); cursor: pointer; transition: all .3s ease;
            display: flex; align-items: center; justify-content: center;
        }
        .hero-nav-btn svg { width: 14px; height: 14px; fill: var(--gold); transition: fill .3s; }
        .hero-nav-btn:hover { background: var(--gold); }
        .hero-nav-btn:hover svg { fill: var(--navy); }
        .hero-cards-swiper { overflow: hidden; padding-bottom: 2rem !important; }
        .hero-cards-swiper .swiper-pagination-bullet { background: rgba(201,168,76,.4); opacity: 1; width: 6px; height: 6px; }
        .hero-cards-swiper .swiper-pagination-bullet-active { background: var(--gold); width: 20px; border-radius: 10px; }
        .hero-card {
            background: rgba(10,26,69,0.55); border: 1px solid rgba(201,168,76,0.3);
            border-radius: 20px; padding: 1.2rem 1rem; transition: all .3s ease;
            text-align: center; display: flex; flex-direction: column; align-items: center; height: 155px;
        }
        .hero-card:hover { background: rgba(9,22,60,0.85); border-color: rgba(201,168,76,0.7); transform: translateY(-4px); }
        .hero-card .card-icon { margin-bottom: 0.6rem; display: flex; align-items: center; justify-content: center; }
        .hero-card .card-icon svg { width: 1.3rem; height: 1.3rem; fill: var(--gold); }
        .hero-card h3 { font-family: 'Outfit', sans-serif; font-size: 1rem; font-weight: 700; color: var(--white); line-height: 1.3; margin-bottom: 0.3rem; }
        .hero-card h3 .card-accent { color: var(--gold); display: block; margin-top: 0.1rem; font-size: 0.85rem; font-weight: 600; }
        .hero-card .card-title-line { width: 35px; height: 2px; background: var(--gold); margin: 0.5rem auto; opacity: .6; }
        .hero-card p { font-size: 0.75rem; color: rgba(255,255,255,.7); line-height: 1.5; }

        /* ══ SERVICIOS ══ */
        #servicios { background: var(--gray-light); padding: 4.5rem 0; }
        .servicios-header {
            display: flex; align-items: flex-end; justify-content: space-between;
            flex-wrap: wrap; gap: 1rem; margin-bottom: 2rem;
        }
        .svc-nav-wrap { display: flex; gap: .75rem; }
        .svc-nav-btn {
            width: 44px; height: 44px; border-radius: 50%;
            background: var(--white); border: 1px solid rgba(201,168,76,.4);
            color: var(--gold); cursor: pointer; display: flex; align-items: center;
            justify-content: center; transition: all .3s ease;
        }
        .svc-nav-btn svg { width: 16px; height: 16px; fill: var(--gold); transition: fill .3s; }
        .svc-nav-btn:hover { background: var(--gold); }
        .svc-nav-btn:hover svg { fill: var(--navy); }
        .svc-swiper { overflow: hidden; padding-bottom: 2rem !important; }
        .svc-swiper .swiper-pagination-bullet { background: rgba(10,26,69,.25); opacity: 1; }
        .svc-swiper .swiper-pagination-bullet-active { background: var(--gold); }
        .service-card {
            background: var(--white); border-radius: 24px; padding: 2rem;
            border: 1px solid transparent; transition: all .35s ease; height: 100%; cursor: default;
        }
        .service-card:hover {
            transform: translateY(-8px); border-color: rgba(201,168,76,.5);
            box-shadow: 0 24px 50px -12px rgba(10,26,69,.15);
        }
        .service-card:hover .service-icon { transform: scale(1.05); background: var(--navy); }
        .service-card:hover .service-icon svg { fill: var(--gold-light); }
        .service-icon {
            width: 64px; height: 64px; background: var(--gold-dim); border-radius: 18px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.5rem; transition: all .3s ease;
        }
        .service-icon svg { width: 1.6rem; height: 1.6rem; fill: var(--gold); transition: fill .3s; }
        .service-card h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 600; color: var(--navy); margin-bottom: .7rem; }
        .service-card p { font-size: .88rem; color: var(--text-mid); line-height: 1.65; margin-bottom: 1.5rem; }
        .service-tags { display: flex; flex-wrap: wrap; gap: .5rem; margin-bottom: 1.5rem; }
        .service-tag {
            background: var(--gold-dim); padding: .3rem .8rem; border-radius: 40px;
            font-size: .75rem; color: var(--navy); font-weight: 500;
        }
        .service-link {
            color: var(--gold); font-size: .85rem; font-weight: 500; text-decoration: none;
            display: inline-flex; align-items: center; gap: 6px; transition: gap .3s ease;
        }
        .service-link svg { width: 14px; height: 14px; fill: var(--gold); transition: fill .3s; }
        .service-link:hover { gap: 12px; }
        .btn-outline-gold {
            display: inline-flex; align-items: center; gap: 8px;
            color: var(--gold); border: 1.5px solid var(--gold);
            padding: 12px 28px; border-radius: 40px; font-size: .9rem; font-weight: 600;
            text-decoration: none; transition: all .3s ease;
        }
        .btn-outline-gold svg { width: 14px; height: 14px; fill: var(--gold); transition: fill .3s; }
        .btn-outline-gold:hover { background: var(--gold); color: var(--navy); }
        .btn-outline-gold:hover svg { fill: var(--navy); }

        /* ══ BENEFICIOS ══ */
        #beneficios { padding: 4.5rem 0; background: linear-gradient(135deg, #fefcf7 0%, #fff 100%); }
        .benefits-badge {
            display: inline-flex; align-items: center; gap: 10px;
            background: var(--gold-dim); padding: .5rem 1.5rem; border-radius: 60px;
            font-size: .7rem; font-weight: 700; letter-spacing: .15em; text-transform: uppercase;
            color: #b88b2c; margin-bottom: 1.2rem; border: 1px solid rgba(201,168,76,.2);
        }
        .ben-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin: 2rem 0 0; }
        .ben-card {
            background: var(--gray-light); border-radius: 24px; padding: 2rem;
            border: 1px solid transparent; transition: all .35s ease;
        }
        .ben-card:hover {
            transform: translateY(-5px); border-color: rgba(201,168,76,.4);
            box-shadow: 0 16px 40px -12px rgba(10,26,69,.12);
        }
        .ben-card-head { display: flex; align-items: center; gap: .8rem; margin-bottom: 1.5rem; }
        .ben-emoji-wrap {
            width: 48px; height: 48px; background: var(--gold-dim); border-radius: 14px;
            display: flex; align-items: center; justify-content: center; font-size: 1.3rem;
        }
        .ben-card h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; color: var(--navy); }
        .ben-list { list-style: none; display: flex; flex-direction: column; gap: .8rem; }
        .ben-list li { display: flex; align-items: flex-start; gap: .7rem; font-size: .88rem; color: var(--text-mid); }
        .ben-list li svg { width: 14px; height: 14px; fill: var(--gold); flex-shrink: 0; margin-top: 2px; }
        .ben-result {
            margin-top: 1.5rem; background: var(--navy); border-radius: 14px;
            padding: .9rem 1.1rem; font-size: .82rem; color: var(--gold-light); line-height: 1.5;
        }
        .result-banner {
            background: linear-gradient(115deg, var(--navy) 0%, var(--navy-mid) 100%);
            border-radius: 32px; padding: 2rem 2.5rem;
            display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between;
            margin-top: 1.5rem; position: relative; overflow: hidden;
            animation: pulse-glow 3s infinite;
        }
        .result-banner::before {
            content: ''; position: absolute; top: -30%; right: 5%;
            width: 280px; height: 280px; background: rgba(201,168,76,.05); border-radius: 50%;
        }
        .result-banner h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; color: #fff; margin-bottom: .4rem; }
        .result-banner h3 em { color: var(--gold-light); }
        .result-banner p { color: rgba(255,255,255,.65); font-size: .88rem; }
        .result-badge {
            background: rgba(255,255,255,.1); backdrop-filter: blur(8px);
            padding: .9rem 1.8rem; border-radius: 60px; font-weight: 600;
            border: 1px solid rgba(201,168,76,.3); color: #fff; font-size: .9rem; white-space: nowrap;
            display: flex; align-items: center; gap: .5rem;
        }
        .result-badge svg { width: 16px; height: 16px; fill: var(--gold-light); }

        /* ══ CONTACTO HOME ══ */
        #contacto-home {
            background: var(--navy); padding: 4rem 0;
            position: relative; overflow: hidden;
        }
        #contacto-home::before {
            content: ''; position: absolute; top: -50%; right: -20%;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(201,168,76,0.08) 0%, transparent 70%);
            border-radius: 50%;
        }
        .contacto-home-grid {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 3rem; align-items: center;
        }
        .contacto-home-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.8rem, 3vw, 2.5rem); color: #fff;
            line-height: 1.2; margin-bottom: 1rem;
        }
        .contacto-home-title em { color: var(--gold); font-style: italic; }
        .contacto-home-text {
            color: rgba(255,255,255,0.7); font-size: 0.95rem;
            line-height: 1.6; margin-bottom: 1.8rem;
        }
        .contacto-home-buttons { display: flex; flex-wrap: wrap; gap: 1rem; }
        .btn-wsp-home {
            display: inline-flex; align-items: center; gap: 12px;
            background: #25d366; color: #fff;
            padding: 14px 32px; border-radius: 50px;
            text-decoration: none; font-weight: 700; font-size: 1rem;
            transition: all 0.3s ease; border: none; cursor: pointer;
        }
        .btn-wsp-home svg { width: 1.3rem; height: 1.3rem; fill: white; }
        .btn-wsp-home:hover { transform: scale(1.05); box-shadow: 0 10px 25px -5px rgba(37,211,102,0.4); }
        .btn-contact-home {
            display: inline-flex; align-items: center; gap: 10px;
            background: transparent; color: var(--gold);
            padding: 14px 32px; border-radius: 50px;
            text-decoration: none; font-weight: 600; font-size: 1rem;
            border: 1.5px solid var(--gold); transition: all 0.3s ease;
        }
        .btn-contact-home svg { width: 1rem; height: 1rem; fill: var(--gold); transition: fill .3s; }
        .btn-contact-home:hover { background: var(--gold); color: var(--navy); transform: translateX(5px); }
        .btn-contact-home:hover svg { fill: var(--navy); }
        .contacto-home-stats { display: flex; gap: 2rem; justify-content: center; }
        .stat-home-item {
            text-align: center; background: rgba(255,255,255,0.05);
            padding: 1.2rem; border-radius: 20px;
            border: 1px solid rgba(201,168,76,0.2); min-width: 120px;
        }
        .stat-home-number {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem; font-weight: 700; color: var(--gold);
        }
        .stat-home-label { font-size: 0.7rem; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 1px; }

        /* ══ QUIÉNES SOMOS ══ */
        #quienes-somos { padding: 4.5rem 0; background: var(--white); }
        .qs-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; margin-top: 1.5rem; }
        .qs-text p { font-size: 1rem; font-weight: 300; color: var(--text-mid); line-height: 1.85; margin-bottom: 1.2rem; }
        .qs-stats { display: grid; grid-template-columns: repeat(3,1fr); gap: 1rem; margin-top: 2rem; }
        .stat-card {
            background: var(--gray-light); border-radius: 20px; padding: 1.2rem;
            text-align: center; border: 1px solid transparent; transition: all .3s ease; cursor: default;
        }
        .stat-card:hover { background: var(--navy); border-color: rgba(201,168,76,.3); }
        .stat-card:hover .stat-num { color: var(--gold-light) !important; }
        .stat-card:hover .stat-label { color: rgba(255,255,255,.7) !important; }
        .stat-num { font-family: 'Cormorant Garamond', serif; font-size: 2rem; font-weight: 600; color: var(--gold); }
        .stat-label { font-size: .75rem; color: var(--text-mid); margin-top: .3rem; }
        .btn-more {
            display: inline-flex; align-items: center; gap: 10px;
            background: transparent; color: var(--gold); font-size: .9rem; font-weight: 500;
            padding: 12px 28px; border-radius: 40px; border: 1px solid var(--gold);
            text-decoration: none; transition: all .3s ease; margin-top: 1.5rem;
        }
        .btn-more svg { width: 14px; height: 14px; fill: var(--gold); transition: fill .3s; }
        .btn-more:hover { background: var(--gold); color: var(--navy); transform: translateX(5px); }
        .btn-more:hover svg { fill: var(--navy); }
        .qs-image { position: relative; border-radius: 28px; overflow: hidden; aspect-ratio: 4/5; }
        .qs-image img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .6s ease; }
        .qs-image:hover img { transform: scale(1.04); }
        .qs-image-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(10,26,69,.7) 0%, transparent 55%); }
        .qs-badge {
            position: absolute; bottom: 1.5rem; left: 1.5rem; right: 1.5rem;
            background: rgba(9,22,60,.82); backdrop-filter: blur(10px);
            border: 1px solid rgba(201,168,76,.3); border-radius: 16px; padding: 1rem 1.2rem;
            display: flex; align-items: center; gap: 1rem;
        }
        .qs-badge-icon {
            width: 44px; height: 44px; background: var(--gold-dim);
            border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        }
        .qs-badge-icon svg { width: 1.3rem; height: 1.3rem; fill: var(--gold); }
        .qs-badge-title { color: #fff; font-size: .85rem; font-weight: 600; }
        .qs-badge-sub   { color: rgba(255,255,255,.55); font-size: .75rem; }

        /* ══ MISIÓN VISIÓN ══ */
        #mision-vision { background: var(--gray-light); padding: 4.5rem 0; }
        .mv-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.5rem; margin-top: 2rem; }
        .mv-flip { perspective: 1000px; }
        .mv-inner { position: relative; transition: transform .6s ease; transform-style: preserve-3d; min-height: 280px; }
        .mv-flip:hover .mv-inner { transform: rotateY(180deg); }
        .mv-front, .mv-back {
            position: absolute; inset: 0; border-radius: 24px; padding: 2rem;
            backface-visibility: hidden;
        }
        .mv-front { background: var(--white); border: 1px solid rgba(201,168,76,.15); }
        .mv-back  { transform: rotateY(180deg); display: flex; flex-direction: column; justify-content: center; }
        .mv-icon-wrap {
            width: 50px; height: 50px; background: var(--gold-dim); border-radius: 14px;
            display: flex; align-items: center; justify-content: center; margin-bottom: 1.2rem;
        }
        .mv-icon-wrap svg { width: 1.3rem; height: 1.3rem; fill: var(--gold); }
        .mv-front h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; color: var(--navy); margin-bottom: .8rem; }
        .mv-front p { font-size: .85rem; line-height: 1.7; color: var(--text-mid); }
        .mv-hint { margin-top: 1.2rem; font-size: .75rem; color: var(--gold); display: flex; align-items: center; gap: 6px; }
        .mv-hint svg { width: 12px; height: 12px; fill: var(--gold); }
        .mv-back h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; color: #fff; margin-bottom: 1rem; }
        .mv-back p { font-size: .85rem; line-height: 1.7; color: rgba(255,255,255,.75); }
        .mv-back-icon { fill: var(--gold); width: 2rem; height: 2rem; margin-bottom: 1rem; }
        .valores-card {
            background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%);
            border-radius: 24px; padding: 2rem;
        }
        .valores-list { display: flex; flex-direction: column; gap: .7rem; margin-top: 1.2rem; }
        .valor-tag {
            display: flex; align-items: center; gap: .7rem;
            background: rgba(255,255,255,.07); border-radius: 40px;
            padding: .5rem 1rem; border: 1px solid rgba(201,168,76,.2);
            transition: all .3s ease; cursor: default;
        }
        .valor-tag:hover { background: rgba(201,168,76,.18); border-color: rgba(201,168,76,.5); }
        .valor-tag svg { width: .85rem; height: .85rem; fill: var(--gold); flex-shrink: 0; }
        .valor-tag span { color: #fff; font-size: .85rem; font-weight: 500; }

        /* ══ OFERTA DE VALOR ══ */
        #oferta-valor { padding: 4.5rem 0; background: var(--white); }
        .proceso-timeline {
            display: grid; grid-template-columns: repeat(4,1fr);
            gap: 0; margin-top: 2.5rem; position: relative;
        }
        .proceso-timeline::before {
            content: ''; position: absolute; top: 27px; left: 12.5%; right: 12.5%;
            height: 2px; background: linear-gradient(to right, var(--gold), var(--gold-light));
            opacity: .4; z-index: 0;
        }
        .step-card { text-align: center; position: relative; z-index: 1; padding: 0 1rem; }
        .step-num {
            width: 56px; height: 56px; border: 2px solid var(--gold); border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.2rem; transition: all .3s ease;
        }
        .step-num.active { background: var(--gold); animation: pulse-glow 2.5s infinite; }
        .step-num:not(.active) { background: var(--navy); }
        .step-num span { font-weight: 700; font-size: 1.1rem; color: var(--gold); }
        .step-num.active span { color: var(--navy); }
        .step-card h4 { font-size: .95rem; font-weight: 600; color: var(--navy); margin-bottom: .5rem; }
        .step-card p  { font-size: .78rem; color: var(--text-mid); line-height: 1.5; }
        .step-card:hover .step-num:not(.active) { transform: scale(1.1); }
        .propuesta-box {
            background: var(--navy); border-radius: 28px; padding: 2rem 2.5rem;
            margin-top: 2.5rem; display: grid; grid-template-columns: 1fr 1fr;
            gap: 2rem; align-items: center; position: relative; overflow: hidden;
        }
        .propuesta-box::after {
            content: ''; position: absolute; top: -40%; right: -10%;
            width: 300px; height: 300px; background: rgba(201,168,76,.05); border-radius: 50%;
        }
        .propuesta-label { font-size: .7rem; font-weight: 600; letter-spacing: .18em; text-transform: uppercase; color: var(--gold); margin-bottom: .8rem; }
        .propuesta-title { font-family: 'Cormorant Garamond', serif; font-size: 1.8rem; color: #fff; line-height: 1.2; margin-bottom: .8rem; }
        .propuesta-title em { color: var(--gold-light); }
        .propuesta-desc { color: rgba(255,255,255,.65); font-size: .9rem; line-height: 1.6; }
        .gana-list { display: flex; flex-direction: column; gap: .8rem; }
        .gana-item {
            display: flex; align-items: center; gap: .8rem;
            background: rgba(255,255,255,.07); border-radius: 16px; padding: .9rem 1.2rem;
            border: 1px solid rgba(201,168,76,.15); transition: all .3s ease;
        }
        .gana-item:hover { background: rgba(201,168,76,.12); border-color: rgba(201,168,76,.35); }
        .gana-item svg { width: 1rem; height: 1rem; fill: var(--gold); flex-shrink: 0; }
        .gana-item span { color: #fff; font-size: .85rem; }

        /* ══ FOOTER ══ */
        .footer {
            background: #123489; color: #ffffff;
            padding: 3rem 5% 1.5rem; width: 100%;
        }
        .footer__container { max-width: 1300px; margin: 0 auto; }
        .footer__grid {
            display: grid; grid-template-columns: 1.2fr 1fr 1fr 1fr;
            gap: 2rem; padding-bottom: 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .footer__logo { height: 55px; width: auto; margin-bottom: 1rem; }
        .footer__description { color: rgba(255,255,255,0.7); font-size: 0.85rem; line-height: 1.6; margin-bottom: 1.2rem; }
        .footer__social { display: flex; gap: 0.8rem; }
        .footer__social-link {
            width: 38px; height: 38px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            text-decoration: none; transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        .footer__social-link svg { width: 1.1rem; height: 1.1rem; fill: white; display: block; }
        .footer__social-link:hover { transform: translateY(-4px) scale(1.1); }
        .footer__social-link.fb { background: #1877f2; }
        .footer__social-link.wa { background: #25d366; }
        .footer__social-link.ig {
            background: radial-gradient(circle at 30% 107%,
                #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285aeb 90%);
        }
        .footer__title {
            font-size: 0.75rem; font-weight: 800; letter-spacing: 1.5px;
            text-transform: uppercase; color: #e8c97a; margin-bottom: 1.2rem;
        }
        .footer__links { list-style: none; padding: 0; margin: 0; }
        .footer__links li { margin-bottom: 0.6rem; }
        .footer__links li a {
            color: rgba(255,255,255,0.7); text-decoration: none;
            font-size: 0.85rem; transition: all 0.25s ease;
            display: inline-flex; align-items: center; gap: .5rem;
        }
        .footer__links li a svg { width: .85rem; height: .85rem; fill: rgba(255,255,255,0.5); flex-shrink: 0; transition: fill .25s; }
        .footer__links li a:hover { color: #e8c97a; transform: translateX(4px); }
        .footer__links li a:hover svg { fill: #e8c97a; }
        .footer__bottom {
            display: flex; justify-content: space-between; align-items: center;
            flex-wrap: wrap; gap: 1rem; padding-top: 1.5rem;
            font-size: 0.75rem; color: rgba(255,255,255,0.5);
        }
        .footer__badge { display: flex; align-items: center; gap: 0.4rem; }
        .footer__badge svg { width: .85rem; height: .85rem; fill: rgba(255,255,255,0.4); }

        /* ══ RESPONSIVE ══ */
        @media (max-width: 1024px) {
            .mv-grid { grid-template-columns: 1fr 1fr; }
            .footer__grid { grid-template-columns: repeat(2, 1fr); gap: 1.8rem; }
            .contacto-home-grid { grid-template-columns: 1fr; text-align: center; gap: 2rem; }
            .contacto-home-buttons { justify-content: center; }
            .hero-bg {
                background-image: url('{{ asset("img/piscina.png") }}');
                background-size: contain; background-repeat: no-repeat;
                background-position: right top 160px;
                background-color: #0a1a45;
            }
        }

        @media (max-width: 999px) {
            .top-bar { display: block; }
            .navbar {
                top: var(--top-bar-height); padding: 0 1rem;
                width: 100%; box-sizing: border-box;
            }
            .navbar__links { display: none !important; }
            .navbar__hamburger { display: flex; flex-shrink: 0; }
            .navbar__mobile-menu { top: calc(var(--navbar-height) + var(--top-bar-height)); }
            .navbar__logo img { height: clamp(55px, 14vw, 75px); }
            .logo-text .kapitalhaus { font-size: clamp(1.1rem, 4.5vw, 1.6rem); letter-spacing: 1px; }
            .logo-text .sub-title { font-size: clamp(0.38rem, 1.3vw, 0.55rem); letter-spacing: .7px; }
            .logo-divider { height: clamp(38px, 10vw, 55px); }
        }

        @media (min-width: 1000px) {
            .top-bar { display: none !important; }
            .navbar__mobile-menu { display: none; }
        }

        @media (max-width: 768px) {
            .hero-content {
                padding: 0 1.2rem; margin-top: 350px; margin-bottom: 0;
                flex: 0; justify-content: flex-end;
                text-align: center; align-items: center;
            }
            .hero-title-main { font-size: clamp(2.5rem, 12vw, 3.0rem); text-align: center; }
            .hero-subtitle-secondary { font-size: clamp(1.2rem, 5vw, 1.6rem); margin-top: 0.2rem; text-align: center; }
            .hero-cards-nav { display: none !important; }
            .hero-cards-section { padding: 0 1.2rem 2.5rem; margin-top: 0.1rem; }
            .hero-card { height: auto; min-height: 140px; padding: 1rem 0.9rem; }
            .qs-grid, .propuesta-box, .result-banner { grid-template-columns: 1fr; }
            .ben-grid { grid-template-columns: 1fr; }
            .proceso-timeline { grid-template-columns: 1fr 1fr; gap: 1.5rem; }
            .proceso-timeline::before { display: none; }
            .mv-grid { grid-template-columns: 1fr; }
            .section-wrap { padding: 0 1.2rem; box-sizing: border-box; width: 100%; }
            .result-banner { flex-direction: column; text-align: center; gap: 1.2rem; }
            .footer { padding: 2rem 5% 1rem; }
            .footer__grid { grid-template-columns: 1fr; gap: 1.5rem; text-align: center; }
            .footer__brand { text-align: center; }
            .footer__social { justify-content: center; }
            .footer__title { text-align: center; }
            .footer__links li a:hover { transform: translateX(0); }
            .footer__bottom { flex-direction: column; text-align: center; }
            .contacto-home-stats { flex-wrap: wrap; justify-content: center; }
        }

        @media (max-width: 480px) {
            .navbar { padding: 0 0.6rem; }
            .navbar__logo { gap: 8px; }
            .navbar__logo img { height: clamp(48px, 12vw, 62px); }
            .logo-text .kapitalhaus { font-size: clamp(0.95rem, 3.8vw, 1.25rem); letter-spacing: .6px; }
            .logo-text .sub-title { font-size: clamp(0.28rem, 1.1vw, 0.42rem); letter-spacing: .4px; }
            .logo-divider { height: clamp(32px, 9vw, 45px); }
            .top-bar__links a { font-size: .75rem; padding: .2rem .5rem; }
            .top-bar__links .tb-wsp svg { width: .9rem; height: .9rem; }
        }
    </style>
</head>
<body>

    {{-- ════════════ TOP BAR ════════════ --}}
    <div class="top-bar">
        <ul class="top-bar__links">
            <li><a href="{{ url('/nosotros') }}">NOSOTROS</a></li>
            <li><a href="{{ url('/servicios') }}">SERVICIOS</a></li>
            <li><a href="{{ url('/beneficios') }}">BENEFICIOS</a></li>
            <li>
                <a href="https://wa.me/51964285907" target="_blank" rel="noopener" class="tb-wsp" title="WhatsApp">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </a>
            </li>
        </ul>
    </div>

    {{-- ════════════ NAVBAR ════════════ --}}
    <nav class="navbar">
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
        <ul class="navbar__links">
            <li><a href="{{ url('/') }}"          class="{{ request()->is('/')          ? 'active' : '' }}">INICIO</a></li>
            <li><a href="{{ url('/servicios') }}"  class="{{ request()->is('servicios')  ? 'active' : '' }}">SERVICIOS</a></li>
            <li><a href="{{ url('/beneficios') }}" class="{{ request()->is('beneficios') ? 'active' : '' }}">BENEFICIOS</a></li>
            <li><a href="{{ url('/nosotros') }}"   class="{{ request()->is('nosotros')   ? 'active' : '' }}">NOSOTROS</a></li>
            <li><a href="#contacto-home" class="contact-link">CONTÁCTANOS</a></li>
            <li>
                <a href="https://wa.me/51964285907" target="_blank" rel="noopener" class="menu-wsp" title="WhatsApp">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </a>
            </li>
        </ul>
        <button class="navbar__hamburger" id="hamburger" aria-label="Abrir menú">
            <span></span><span></span><span></span>
        </button>
    </nav>

    {{-- ════════════ MOBILE MENU ════════════ --}}
    <div class="navbar__mobile-menu" id="mobileMenu">
        <ul>
            <li><a href="{{ url('/') }}">INICIO</a></li>
            <li><a href="{{ url('/servicios') }}">SERVICIOS</a></li>
            <li><a href="{{ url('/beneficios') }}">BENEFICIOS</a></li>
            <li><a href="{{ url('/nosotros') }}">NOSOTROS</a></li>
            <li><a href="#contacto-home">CONTÁCTANOS</a></li>
            <li>
                <a href="https://wa.me/51964285907" target="_blank" rel="noopener" class="mobile-wsp-link">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    WHATSAPP
                </a>
            </li>
        </ul>
    </div>

    <main>

        {{-- ════════════ HERO ════════════ --}}
        <section id="inicio">
            <div class="hero-bg"></div>
            <div class="hero-overlay-left"></div>
            <div class="hero-overlay-bottom"></div>
            <div class="hero-overlay-top"></div>

            <div class="hero-content">
                <h1 class="hero-title-main">
                    GESTIÓN<br>INTEGRAL DE<br><span class="gold-text">PROPIEDADES</span>
                </h1>
                <p class="hero-subtitle-secondary">
                    <strong>Administra tu propiedad de <span class="gold-text">principio a fin</span></strong>
                </p>
            </div>

            <div class="hero-cards-section">
                <div class="hero-cards-nav">
                    <button class="hero-nav-btn hero-prev" aria-label="Anterior">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z"/></svg>
                    </button>
                    <button class="hero-nav-btn hero-next" aria-label="Siguiente">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
                    </button>
                </div>

                <div class="swiper hero-cards-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="hero-card">
                                <div class="card-icon">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                                </div>
                                <h3>Captamos al <span class="card-accent">inquilino ideal</span></h3>
                                <div class="card-title-line"></div>
                                <p>Seleccionamos inquilinos responsables luego de evaluación de capacidad de pago.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-card">
                                <div class="card-icon">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
                                </div>
                                <h3>Administramos <span class="card-accent">tu alquiler</span></h3>
                                <div class="card-title-line"></div>
                                <p>Nos encargamos de contratos, cobranzas, pago de impuestos.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-card">
                                <div class="card-icon">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/></svg>
                                </div>
                                <h3>Protegemos <span class="card-accent">tu inmueble</span></h3>
                                <div class="card-title-line"></div>
                                <p>Supervisamos mantenimientos, gestión de incidencias y alerta registral.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-card">
                                <div class="card-icon">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/></svg>
                                </div>
                                <h3>Garantizamos <span class="card-accent">continuidad de renta</span></h3>
                                <div class="card-title-line"></div>
                                <p>Minimizamos la vacancia recolocando inquilinos muy rápido.</p>
                            </div>
                        </div>
                    </div>
                    <div class="hero-cards-pagination swiper-pagination" style="margin-top:0.5rem;"></div>
                </div>
            </div>
        </section>

        {{-- ════════════ SERVICIOS ════════════ --}}
        <section id="servicios" data-aos="fade-up">
            <div class="section-wrap">
                <div class="servicios-header">
                    <div>
                        <div class="section-label">Nuestros servicios</div>
                        <h2 class="section-title">Soluciones <em>integrales</em><br>para tu propiedad</h2>
                    </div>
                    <div class="svc-nav-wrap">
                        <button class="svc-nav-btn svc-prev" aria-label="Anterior">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z"/></svg>
                        </button>
                        <button class="svc-nav-btn svc-next" aria-label="Siguiente">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6z"/></svg>
                        </button>
                    </div>
                </div>

                <div class="swiper svc-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-icon">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 6h-2.18c.07-.44.18-.88.18-1.36C18 2.53 15.48 0 12.36 0c-1.73 0-3.24.83-4.22 2.1L12 5.27l3.86-3.18C16.45 2.37 17.15 2.5 17.7 2.9c.55.4.9 1.04.88 1.74-.02.46-.17.9-.4 1.26L18 6h-2.18c-.55 0-1 .45-1 1v7.14c0 .28.11.55.29.75l3.59 4.12A1 1 0 0020 19.5V7c0-.55-.45-1-1-1zM12 7L8.14 3.86C7.55 3.46 6.85 3.33 6.3 3.72c-.55.4-.9 1.04-.88 1.74.02.46.17.9.4 1.26L6 6H4c-.55 0-1 .45-1 1v12.5c0 .38.21.72.55.89.34.17.74.13 1.04-.1L8.18 18H4v-2h8v2H8.18l-2.59 1.89V7h6.41z"/></svg>
                                </div>
                                <h3>Corretaje</h3>
                                <p>Buscamos el inquilino adecuado mediante evaluación rigurosa que reduce riesgos y asegura estabilidad de largo plazo.</p>
                                <div class="service-tags">
                                    <span class="service-tag">Evaluación crediticia</span>
                                    <span class="service-tag">Referencias</span>
                                    <span class="service-tag">Capacidad de pago</span>
                                </div>
                                <a href="{{ url('/servicios') }}" class="service-link">Ver detalle <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-icon">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 7V3H2v18h20V7H12zm-2 12H4v-2h6v2zm0-4H4v-2h6v2zm0-4H4V9h6v2zm0-4H4V5h6v2zm10 12h-8V9h8v10zm-2-8h-4v2h4v-2zm0 4h-4v2h4v-2z"/></svg>
                                </div>
                                <h3>Administración</h3>
                                <p>Gestionamos todos los aspectos operativos, legales y financieros de tu propiedad. Contratos, cobranzas, impuestos y más.</p>
                                <div class="service-tags">
                                    <span class="service-tag">Contratos</span>
                                    <span class="service-tag">Cobranzas</span>
                                    <span class="service-tag">Sunat · Predios</span>
                                </div>
                                <a href="{{ url('/servicios') }}" class="service-link">Ver detalle <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-icon">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/></svg>
                                </div>
                                <h3>Asesoría</h3>
                                <p>Analizamos tu portafolio y te ayudamos a tomar mejores decisiones con datos de mercado y rentabilidad real.</p>
                                <div class="service-tags">
                                    <span class="service-tag">Valorización</span>
                                    <span class="service-tag">Rentabilidad</span>
                                    <span class="service-tag">Análisis de mercado</span>
                                </div>
                                <a href="{{ url('/servicios') }}" class="service-link">Ver detalle <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-icon">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M13.78 15.3L19.78 21.3L21.89 19.14L15.89 13.14L13.78 15.3M17.5 11.5C17.78 11.5 18.08 11.47 18.38 11.41L15.47 8.5L13.06 10.91L11 8.84L13.41 6.44L10.5 3.53C10.21 3.59 9.92 3.66 9.65 3.75C8.2 4.21 7 5.26 6.33 6.62C5.65 7.97 5.61 9.55 6.2 10.94L3.04 14.1C2.65 14.5 2.65 15.12 3.04 15.5L5.03 17.5C5.42 17.88 6.04 17.88 6.43 17.5L9.59 14.34C10.5 14.74 11.5 14.94 12.5 14.94L17.5 11.5Z"/></svg>
                                </div>
                                <h3>Mantenimiento</h3>
                                <p>Supervisamos el estado del inmueble, coordinamos reparaciones y garantizamos que tu propiedad conserve su valor.</p>
                                <div class="service-tags">
                                    <span class="service-tag">Supervisión</span>
                                    <span class="service-tag">Reparaciones</span>
                                    <span class="service-tag">Incidencias</span>
                                </div>
                                <a href="{{ url('/servicios') }}" class="service-link">Ver detalle <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-icon">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                                </div>
                                <h3>Alerta Registral</h3>
                                <p>Seguimiento continuo del estado registral de tu inmueble para detectar cualquier cambio no autorizado a tiempo.</p>
                                <div class="service-tags">
                                    <span class="service-tag">Vigilancia 24/7</span>
                                    <span class="service-tag">SUNARP</span>
                                    <span class="service-tag">Alertas</span>
                                </div>
                                <a href="{{ url('/servicios') }}" class="service-link">Ver detalle <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg></a>
                            </div>
                        </div>
                    </div>
                    <div class="svc-pagination swiper-pagination" style="margin-top:.5rem"></div>
                </div>

                <div style="text-align:center;margin-top:1.5rem">
                    <a href="{{ url('/servicios') }}" class="btn-outline-gold">
                        Ver todos los servicios
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- ════════════ BENEFICIOS ════════════ --}}
        <section id="beneficios" data-aos="fade-up">
            <div class="section-wrap">
                <div class="benefits-badge">👑 EXCLUSIVO · VALOR AGREGADO</div>
                <h2 class="section-title">Beneficios <em>para el Propietario</em></h2>
                <p style="color:var(--text-mid);max-width:520px;margin:.8rem 0 0">Rentabilidad, seguridad y total tranquilidad, todo en un solo lugar.</p>

                <div class="ben-grid">
                    <div class="ben-card">
                        <div class="ben-card-head">
                            <div class="ben-emoji-wrap">💰</div>
                            <h3>Económicos</h3>
                        </div>
                        <ul class="ben-list">
                            <li><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>Optimización del precio de alquiler</li>
                            <li><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>Reducción de vacancias (periodos sin alquilar)</li>
                            <li><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>Evaluación rigurosa de inquilinos</li>
                            <li><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>Mayor estabilidad en los ingresos</li>
                        </ul>
                        <div class="ben-result"><strong>Resultado:</strong> mayor rentabilidad con ingresos constantes y crecientes</div>
                    </div>
                    <div class="ben-card">
                        <div class="ben-card-head">
                            <div class="ben-emoji-wrap">🔒</div>
                            <h3>No Económicos</h3>
                        </div>
                        <ul class="ben-list">
                            <li><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>Respaldo profesional en la administración</li>
                            <li><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>Seguimiento registral ante potenciales cambios</li>
                            <li><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>Control de la morosidad</li>
                            <li><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>Gestión de incidencias y deterioros</li>
                            <li><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>Administración ante ausencia geográfica</li>
                        </ul>
                    </div>
                </div>

                <div class="result-banner" data-aos="zoom-in">
                    <div>
                        <h3>✦ Resultado ✦<br><em>Mayor rentabilidad + tranquilidad absoluta</em></h3>
                        <p>Optimización del alquiler, reducción de vacancias, inquilinos evaluados.</p>
                    </div>
                    <div class="result-badge">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/></svg>
                        +Rentabilidad sostenida
                    </div>
                </div>
            </div>
        </section>

        {{-- ════════════ OFERTA DE VALOR ════════════ --}}
        <section id="oferta-valor" data-aos="fade-up">
            <div class="section-wrap">
                <div class="section-label">Oferta de valor</div>
                <h2 class="section-title">Proceso <em>estratégico</em></h2>
                <p style="color:var(--text-mid);max-width:520px;margin:.8rem 0 0">Cuatro pasos claros para transformar tu inmueble en una inversión rentable y sin complicaciones.</p>

                <div class="proceso-timeline">
                    <div class="step-card"><div class="step-num"><span>1</span></div><h4>Evaluamos</h4><p>Analizamos tu propiedad y su potencial de mercado</p></div>
                    <div class="step-card"><div class="step-num"><span>2</span></div><h4>Estrategia</h4><p>Definimos el plan óptimo de rentabilidad</p></div>
                    <div class="step-card"><div class="step-num"><span>3</span></div><h4>Gestionamos</h4><p>Operamos todo de principio a fin</p></div>
                    <div class="step-card"><div class="step-num active"><span>4</span></div><h4>Resultados</h4><p>Tú recibes rentabilidad y tranquilidad</p></div>
                </div>

                <div class="propuesta-box" data-aos="zoom-in">
                    <div>
                        <div class="propuesta-label">📌 Propuesta de valor</div>
                        <h3 class="propuesta-title">Maximizamos ingresos,<br><em>reducimos riesgos</em></h3>
                        <p class="propuesta-desc">Gestionamos todo por ti con un equipo profesional y tecnología al servicio de tu activo.</p>
                    </div>
                    <div class="gana-list">
                        <div class="gana-item">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/></svg>
                            <span>Más ingresos, mejor rentabilidad</span>
                        </div>
                        <div class="gana-item">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                            <span>Inquilinos evaluados y confiables</span>
                        </div>
                        <div class="gana-item">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/></svg>
                            <span>Seguridad legal y financiera</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ════════════ CONTÁCTANOS ════════════ --}}
        <section id="contacto-home" data-aos="fade-up">
            <div class="section-wrap">
                <div class="contacto-home-grid">
                    <div>
                        <h2 class="contacto-home-title">¿Listo para <em>rentabilizar</em> tu propiedad?</h2>
                        <p class="contacto-home-text">Contáctanos hoy mismo y descubre cómo podemos ayudarte a maximizar el valor de tu inversión inmobiliaria con total seguridad y tranquilidad.</p>
                        <div class="contacto-home-buttons">
                            <a href="https://wa.me/51964285907" target="_blank" rel="noopener" class="btn-wsp-home">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                Escríbenos al WhatsApp
                            </a>
                            <a href="{{ url('/contacto') }}" class="btn-contact-home">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                Formulario de contacto
                            </a>
                        </div>
                    </div>
                    <div class="contacto-home-stats">
                        <div class="stat-home-item">
                            <div class="stat-home-number">+50</div>
                            <div class="stat-home-label">Propiedades administradas</div>
                        </div>
                        <div class="stat-home-item">
                            <div class="stat-home-number">98%</div>
                            <div class="stat-home-label">Clientes satisfechos</div>
                        </div>
                        <div class="stat-home-item">
                            <div class="stat-home-number">24/7</div>
                            <div class="stat-home-label">Soporte continuo</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ════════════ MISIÓN, VISIÓN Y VALORES ════════════ --}}
        <section id="mision-vision" data-aos="fade-up">
            <div class="section-wrap">
                <div class="section-label">Propósito</div>
                <h2 class="section-title">Nuestro <em>propósito</em></h2>
                <div class="mv-grid">
                    <div class="mv-flip">
                        <div class="mv-inner">
                            <div class="mv-front">
                                <div class="mv-icon-wrap">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm8.94 3c-.46-4.17-3.77-7.48-7.94-7.94V1h-2v2.06C6.83 3.52 3.52 6.83 3.06 11H1v2h2.06c.46 4.17 3.77 7.48 7.94 7.94V23h2v-2.06c4.17-.46 7.48-3.77 7.94-7.94H23v-2h-2.06zM12 19c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z"/></svg>
                                </div>
                                <h3>Misión</h3>
                                <p>Brindar soluciones integrales en gestión, administración y comercialización de propiedades, ofreciendo seguridad, tranquilidad y rentabilidad a nuestros clientes.</p>
                                <div class="mv-hint">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 11.24V7.5C9 6.12 10.12 5 11.5 5S14 6.12 14 7.5v3.74c1.21-.81 2-2.18 2-3.74C16 5.01 13.99 3 11.5 3S7 5.01 7 7.5c0 1.56.79 2.93 2 3.74zm9.84 4.63l-4.54-2.26c-.17-.07-.35-.11-.54-.11H13v-6c0-.83-.67-1.5-1.5-1.5S10 6.67 10 7.5v10.74l-3.43-.72c-.08-.01-.15-.03-.24-.03-.31 0-.59.13-.79.33l-.79.8 4.94 4.94c.27.27.65.44 1.06.44h6.79c.75 0 1.33-.55 1.44-1.28l.75-5.27c.01-.07.02-.14.02-.2 0-.62-.38-1.16-.91-1.38z"/></svg>
                                    Pasar el mouse
                                </div>
                            </div>
                            <div class="mv-back" style="background:var(--navy);">
                                <svg class="mv-back-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm8.94 3c-.46-4.17-3.77-7.48-7.94-7.94V1h-2v2.06C6.83 3.52 3.52 6.83 3.06 11H1v2h2.06c.46 4.17 3.77 7.48 7.94 7.94V23h2v-2.06c4.17-.46 7.48-3.77 7.94-7.94H23v-2h-2.06zM12 19c-3.87 0-7-3.13-7-7s3.13-7 7-7 7 3.13 7 7-3.13 7-7 7z"/></svg>
                                <h3>Nuestra Misión</h3>
                                <p>Maximizar el valor de los inmuebles de nuestros clientes mediante una gestión profesional, eficiente y transparente, con foco en la seguridad y la rentabilidad sostenida.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mv-flip">
                        <div class="mv-inner">
                            <div class="mv-front">
                                <div class="mv-icon-wrap">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                                </div>
                                <h3>Visión</h3>
                                <p>Ser reconocidos como empresa líder en administración de inmuebles en la región, destacando por la excelencia de nuestros servicios y la confianza de nuestros clientes.</p>
                                <div class="mv-hint">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 11.24V7.5C9 6.12 10.12 5 11.5 5S14 6.12 14 7.5v3.74c1.21-.81 2-2.18 2-3.74C16 5.01 13.99 3 11.5 3S7 5.01 7 7.5c0 1.56.79 2.93 2 3.74zm9.84 4.63l-4.54-2.26c-.17-.07-.35-.11-.54-.11H13v-6c0-.83-.67-1.5-1.5-1.5S10 6.67 10 7.5v10.74l-3.43-.72c-.08-.01-.15-.03-.24-.03-.31 0-.59.13-.79.33l-.79.8 4.94 4.94c.27.27.65.44 1.06.44h6.79c.75 0 1.33-.55 1.44-1.28l.75-5.27c.01-.07.02-.14.02-.2 0-.62-.38-1.16-.91-1.38z"/></svg>
                                    Pasar el mouse
                                </div>
                            </div>
                            <div class="mv-back" style="background:var(--navy-mid);">
                                <svg class="mv-back-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                                <h3>Nuestra Visión</h3>
                                <p>Liderar el mercado regional de gestión inmobiliaria con soluciones innovadoras que generen valor real y relaciones de largo plazo con nuestros clientes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="valores-card">
                        <div class="mv-icon-wrap">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 1L9 9H1l7 5-3 8 7-5 7 5-3-8 7-5h-8z"/></svg>
                        </div>
                        <h3 style="font-family:'Cormorant Garamond',serif;font-size:1.6rem;color:#fff;margin-top:.5rem">Valores</h3>
                        <div class="valores-list">
                            <div class="valor-tag"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg><span>Transparencia</span></div>
                            <div class="valor-tag"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg><span>Eficiencia</span></div>
                            <div class="valor-tag"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg><span>Integridad</span></div>
                            <div class="valor-tag"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg><span>Orientación al Cliente</span></div>
                            <div class="valor-tag"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg><span>Calidad de Servicio</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ════════════ QUIÉNES SOMOS ════════════ --}}
        <section id="quienes-somos" data-aos="fade-up">
            <div class="section-wrap">
                <div class="section-label">Quiénes somos</div>
                <div class="qs-grid">
                    <div class="qs-text">
                        <h2 class="section-title">Kapital House <em>gestión inmobiliaria &amp; bienes raíces</em></h2>
                        <p>Somos una empresa especializada en gestión y consultoría inmobiliaria, enfocada en la administración de inmuebles, rentabilización de activos y asesoría financiera para inversiones, evaluación y estructuración de proyectos inmobiliarios.</p>
                        <p>Nos enfocamos en maximizar la rentabilidad y el valor de los activos de nuestros clientes. Administramos cada propiedad de manera estratégica, eficiente y responsable, obteniendo el mayor rendimiento posible, mientras nuestros clientes rentan con total tranquilidad.</p>
                        <a href="{{ url('/nosotros') }}" class="btn-more">
                            Conocer más
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
                        </a>
                    </div>
                    <div class="qs-image" data-aos="fade-left">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&auto=format&fit=crop&q=80" alt="Edificio moderno KBR">
                        <div class="qs-image-overlay"></div>
                        <div class="qs-badge">
                            <div class="qs-badge-icon">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                            </div>
                            <div>
                                <div class="qs-badge-sub">Gestión profesional de inmuebles</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    {{-- ════════════ FOOTER ════════════ --}}
    <footer class="footer">
        <div class="footer__container">
            <div class="footer__grid">
                <div class="footer__brand">
                    <img src="{{ asset('img/logo_transparente.png') }}" alt="KBR KapitalHaus" class="footer__logo" />
                    <p class="footer__description">
                        Gestión Inmobiliaria Profesional orientada a maximizar la rentabilidad de tus activos
                        con seguridad y tranquilidad.
                    </p>
                    <div class="footer__social">
                        <a href="https://facebook.com" target="_blank" rel="noopener" class="footer__social-link fb" title="Facebook">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="https://wa.me/51964285907" target="_blank" rel="noopener" class="footer__social-link wa" title="WhatsApp">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                        <a href="https://instagram.com" target="_blank" rel="noopener" class="footer__social-link ig" title="Instagram">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                    </div>
                </div>

                <div class="footer__col">
                    <h4 class="footer__title">NAVEGACIÓN</h4>
                    <ul class="footer__links">
                        <li><a href="#inicio"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg> Inicio</a></li>
                        <li><a href="{{ url('/servicios') }}"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 15.5A3.5 3.5 0 018.5 12 3.5 3.5 0 0112 8.5a3.5 3.5 0 013.5 3.5 3.5 3.5 0 01-3.5 3.5m7.43-2.92c.04-.3.07-.62.07-.96s-.03-.66-.07-1l2.16-1.69c.19-.15.24-.42.12-.64l-2.05-3.56c-.12-.22-.39-.3-.61-.22l-2.55 1.03c-.53-.41-1.1-.75-1.72-.99l-.39-2.71C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.39 2.71c-.62.24-1.19.58-1.72.99L4.85 5.09c-.22-.08-.49 0-.61.22L2.19 8.87c-.12.22-.07.49.12.64l2.16 1.69c-.04.34-.07.67-.07 1s.03.65.07.96l-2.16 1.7c-.19.15-.24.42-.12.64l2.05 3.56c.12.22.39.3.61.22l2.55-1.02c.53.4 1.1.75 1.72.99l.39 2.71c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.39-2.71c.62-.24 1.19-.59 1.72-.99l2.55 1.02c.22.08.49 0 .61-.22l2.05-3.56c.12-.22.07-.49-.12-.64l-2.16-1.7z"/></svg> Servicios</a></li>
                        <li><a href="{{ url('/beneficios') }}"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 1L9 9H1l7 5-3 8 7-5 7 5-3-8 7-5h-8z"/></svg> Beneficios</a></li>
                        <li><a href="{{ url('/nosotros') }}"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg> Quiénes Somos</a></li>
                        <li><a href="#contacto-home"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg> Contáctanos</a></li>
                    </ul>
                </div>

                <div class="footer__col">
                    <h4 class="footer__title">SERVICIOS</h4>
                    <ul class="footer__links">
                        <li><a href="{{ url('/servicios') }}"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 13h6a1 1 0 001-1V4a1 1 0 00-1-1H4a1 1 0 00-1 1v8a1 1 0 001 1zm-1 7a1 1 0 001 1h6a1 1 0 001-1v-4a1 1 0 00-1-1H4a1 1 0 00-1 1v4zm10 0a1 1 0 001 1h6a1 1 0 001-1v-8a1 1 0 00-1-1h-6a1 1 0 00-1 1v8zm1-17a1 1 0 00-1 1v4a1 1 0 001 1h6a1 1 0 001-1V4a1 1 0 00-1-1h-6z"/></svg> Corretaje de Inquilinos</a></li>
                        <li><a href="{{ url('/servicios') }}"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 7V3H2v18h20V7H12zm-2 12H4v-2h6v2zm0-4H4v-2h6v2zm0-4H4V9h6v2zm0-4H4V5h6v2zm10 12h-8V9h8v10zm-2-8h-4v2h4v-2zm0 4h-4v2h4v-2z"/></svg> Administración</a></li>
                        <li><a href="{{ url('/servicios') }}"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3.5 18.49l6-6.01 4 4L22 6.92l-1.41-1.41-7.09 7.97-4-4L2 16.99z"/></svg> Asesoría Inmobiliaria</a></li>
                        <li><a href="{{ url('/servicios') }}"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M13.78 15.3L19.78 21.3L21.89 19.14L15.89 13.14L13.78 15.3M17.5 11.5C17.78 11.5 18.08 11.47 18.38 11.41L15.47 8.5L13.06 10.91L11 8.84L13.41 6.44L10.5 3.53C10.21 3.59 9.92 3.66 9.65 3.75C8.2 4.21 7 5.26 6.33 6.62C5.65 7.97 5.61 9.55 6.2 10.94L3.04 14.1C2.65 14.5 2.65 15.12 3.04 15.5L5.03 17.5C5.42 17.88 6.04 17.88 6.43 17.5L9.59 14.34C10.5 14.74 11.5 14.94 12.5 14.94L17.5 11.5Z"/></svg> Gestión Legal</a></li>
                        <li><a href="https://wa.me/51964285907" target="_blank" rel="noopener"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg> Cotiza Gratis</a></li>
                    </ul>
                </div>

                <div class="footer__col">
                    <h4 class="footer__title">CONTACTO</h4>
                    <ul class="footer__links">
                        <li>
                            <a href="https://wa.me/51964285907" target="_blank" rel="noopener">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                +51 964 285 907
                            </a>
                        </li>
                        <li>
                            <a href="mailto:contacto@kapitalhaus.pe">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                contacto@kapitalhaus.pe
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/></svg>
                                Lima, Perú
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer__bottom">
                <p>&copy; {{ date('Y') }} KBR KapitalHaus — Todos los derechos reservados</p>
                <p class="footer__badge">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/></svg>
                    Tu tranquilidad es nuestra prioridad
                </p>
            </div>
        </div>
    </footer>

    {{-- ════════════ WHATSAPP FLOTANTE ════════════ --}}
    <a href="https://wa.me/51964285907" target="_blank" rel="noopener" class="whatsapp-float">
        <div class="whatsapp-button">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            <span class="tooltip">📱 Contacta con un asesor</span>
        </div>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        (function () {
            AOS.init({ duration: 800, once: true, offset: 100 });

            new Swiper('.hero-cards-swiper', {
                loop: true,
                spaceBetween: 16,
                autoplay: { delay: 2500, disableOnInteraction: false, pauseOnMouseEnter: true },
                navigation: { nextEl: '.hero-next', prevEl: '.hero-prev' },
                pagination: { el: '.hero-cards-pagination', clickable: true },
                breakpoints: {
                    1200: { slidesPerView: 4 },
                    900:  { slidesPerView: 3 },
                    560:  { slidesPerView: 2 },
                    0:    { slidesPerView: 1 }
                }
            });

            new Swiper('.svc-swiper', {
                slidesPerView: 1, spaceBetween: 20, loop: false,
                navigation: { nextEl: '.svc-next', prevEl: '.svc-prev' },
                pagination: { el: '.svc-pagination', clickable: true },
                breakpoints: { 640: { slidesPerView: 2 }, 1000: { slidesPerView: 3 } }
            });

            const hamburger  = document.getElementById('hamburger');
            const mobileMenu = document.getElementById('mobileMenu');
            hamburger.addEventListener('click', function () {
                hamburger.classList.toggle('open');
                mobileMenu.classList.toggle('open');
                document.body.style.overflow = mobileMenu.classList.contains('open') ? 'hidden' : '';
            });
            document.querySelectorAll('.navbar__mobile-menu a, .top-bar__links a, .contact-link').forEach(function (link) {
                link.addEventListener('click', function (e) {
                    if (link.getAttribute('href') === '#contacto-home') {
                        e.preventDefault();
                        document.getElementById('contacto-home').scrollIntoView({ behavior: 'smooth' });
                    }
                    hamburger.classList.remove('open');
                    mobileMenu.classList.remove('open');
                    document.body.style.overflow = '';
                });
            });

            document.querySelectorAll('.mv-flip').forEach(function (c) {
                c.addEventListener('click', function () {
                    var inner = c.querySelector('.mv-inner');
                    inner.style.transform = inner.style.transform === 'rotateY(180deg)' ? '' : 'rotateY(180deg)';
                });
            });
        })();
    </script>
</body>
</html>