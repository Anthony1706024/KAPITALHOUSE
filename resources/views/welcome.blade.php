<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBR KapitalHaus — Gestión Inmobiliaria Profesional</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo_redondo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
        .whatsapp-button i {
            font-size: 32px;
            color: white;
            transition: all 0.3s ease;
        }
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
        .whatsapp-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
        }
        .whatsapp-button:hover .tooltip {
            opacity: 1;
            visibility: visible;
            right: 80px;
        }
        @keyframes pulse-whatsapp {
            0%   { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.4); }
            70%  { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }
        .whatsapp-button { animation: pulse-whatsapp 2s infinite; }

        @media (max-width: 480px) {
            .whatsapp-button { width: 50px; height: 50px; }
            .whatsapp-button i { font-size: 25px; }
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
            --top-bar-height:  50px;
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
            gap: 1rem; list-style: none; margin: 0; padding: 0; height: 100%;
        }
        .top-bar__links a {
            color: rgba(255,255,255,.9); text-decoration: none;
            font-size: .95rem; font-weight: 600;
            padding: .35rem .8rem; border-radius: 6px; transition: .25s;
        }
        .top-bar__links a:hover { background: rgba(255,255,255,.10); color: var(--kh-gold-lt); }

        /* ══ NAVBAR ══ */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0;
            z-index: 1000; background: var(--kh-navy);
            height: var(--navbar-height);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 2rem;
            box-shadow: 0 2px 12px rgba(0,0,0,.30);
            overflow: hidden;
            width: 100%;
            box-sizing: border-box;
        }
        .navbar__logo {
            display: flex; align-items: center; justify-content: center;
            height: 100%; flex-shrink: 0; text-decoration: none;
            overflow: hidden; position: relative; z-index: 2;
            max-width: 60%;
        }
        .navbar__logo img {
            height: clamp(60px, 10vw, 100px); width: auto;
            max-width: 100%;
            object-fit: contain; display: block;
            position: relative; top: 2px; transition: height .3s ease;
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
            border-radius: 8px; transition: .25s;
        }
        .menu-wsp i { font-size: 1.65rem; color: rgba(255,255,255,.94); transition: .25s; }
        .menu-wsp:hover { background: rgba(255,255,255,.10); }
        .menu-wsp:hover i { color: var(--kh-gold-lt); }

        /* ══ HAMBURGER ══ */
        .navbar__hamburger {
            display: none; flex-direction: column; gap: 5px;
            background: none; border: none; cursor: pointer; padding: .5rem; z-index: 1002;
        }
        .navbar__hamburger span {
            width: 26px; height: 2.5px; background: white;
            border-radius: 2px; transition: .3s;
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
        .navbar__mobile-menu.open { max-height: 450px; }
        .navbar__mobile-menu ul { list-style: none; margin: 0; padding: 0; }
        .navbar__mobile-menu li { border-bottom: 1px solid rgba(255,255,255,.1); }
        .navbar__mobile-menu a {
            display: block; color: white; text-decoration: none;
            font-size: 1.05rem; font-weight: 600;
            padding: 1rem 1.5rem; transition: .25s;
        }
        .navbar__mobile-menu a:hover {
            background: rgba(255,255,255,.10); color: var(--kh-gold-lt); padding-left: 2rem;
        }

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
            position: relative;
            width: 100%;
            max-width: 100%;
            box-sizing: border-box;
            min-height: 100vh;
            display: flex; flex-direction: column;
            overflow: hidden;
        }
        .hero-bg {
            position: absolute; inset: 0;
            background-image: url('{{ asset("img/piscina.png") }}');
            background-size: cover;
            background-position: center 40%;
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

        /* ── Hero content: título + subtítulo ── */
        .hero-content {
            position: relative; z-index: 10;
            width: 100%; max-width: 100%; box-sizing: border-box;
            padding: 0 1.5rem;
            margin: 0; margin-top: 120px;
            margin-bottom: 1rem;
            flex: 1; display: flex; flex-direction: column; justify-content: center;
        }
        .hero-title-main {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2.2rem, 5vw, 4rem);
            font-weight: 800; line-height: 1.1;
            color: var(--white); text-transform: uppercase; letter-spacing: -.01em;
            opacity: 0; animation: fade-up .9s ease forwards .3s;
            max-width: 750px;
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
            padding: 0 1.5rem 3rem;
            margin-top: 5px;
        }
        .hero-cards-nav {
            display: none; justify-content: flex-end;
            gap: .75rem; margin-bottom: 1rem;
        }
        @media (max-width: 1199px) { .hero-cards-nav { display: flex; } }

        .hero-nav-btn {
            width: 36px; height: 36px; border-radius: 50%;
            background: rgba(255,255,255,.15); border: 1px solid rgba(201,168,76,.4);
            color: var(--gold); cursor: pointer; transition: all .3s ease;
            display: flex; align-items: center; justify-content: center;
        }
        .hero-nav-btn:hover { background: var(--gold); color: var(--navy); border-color: var(--gold); }
        .hero-cards-swiper { overflow: hidden; padding-bottom: 2rem !important; }
        .hero-cards-swiper .swiper-pagination-bullet { background: rgba(201,168,76,.4); opacity: 1; width: 6px; height: 6px; }
        .hero-cards-swiper .swiper-pagination-bullet-active { background: var(--gold); width: 20px; border-radius: 10px; }

        .hero-card {
            background: rgba(10, 26, 69, 0.55);
            border: 1px solid rgba(201,168,76,0.3);
            border-radius: 20px;
            padding: 1.2rem 1rem;
            transition: all .3s ease;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 155px;
        }
        .hero-card:hover {
            background: rgba(9,22,60,0.85);
            border-color: rgba(201,168,76,0.7);
            transform: translateY(-4px);
        }
        .hero-card .card-icon { font-size: 1.3rem; color: var(--gold); margin-bottom: 0.6rem; display: block; }
        .hero-card h3 { font-family: 'Outfit', sans-serif; font-size: 1rem; font-weight: 700; color: var(--white); line-height: 1.3; margin-bottom: 0.3rem; }
        .hero-card h3 .card-accent { color: var(--gold); display: block; margin-top: 0.1rem; font-size: 0.85rem; font-weight: 600; }
        .hero-card .card-title-line { width: 35px; height: 2px; background: var(--gold); margin: 0.5rem auto; opacity: .6; }
        .hero-card p { font-size: 0.75rem; color: rgba(255,255,255,.7); line-height: 1.5; }

        /* ══ SERVICIOS ══ */
        #servicios { background: var(--gray-light); padding: 7rem 0; }
        .servicios-header {
            display: flex; align-items: flex-end; justify-content: space-between;
            flex-wrap: wrap; gap: 1rem; margin-bottom: 2.5rem;
        }
        .svc-nav-wrap { display: flex; gap: .75rem; }
        .svc-nav-btn {
            width: 44px; height: 44px; border-radius: 50%;
            background: var(--white); border: 1px solid rgba(201,168,76,.4);
            color: var(--gold); cursor: pointer; display: flex; align-items: center;
            justify-content: center; transition: all .3s ease;
        }
        .svc-nav-btn:hover { background: var(--gold); color: var(--navy); border-color: var(--gold); }
        .svc-swiper { overflow: hidden; padding-bottom: 2.5rem !important; }
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
        .service-card:hover .service-icon i { color: var(--gold-light); }
        .service-icon {
            width: 64px; height: 64px; background: var(--gold-dim); border-radius: 18px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 1.5rem; font-size: 1.6rem; color: var(--gold); transition: all .3s ease;
        }
        .service-card h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.5rem; font-weight: 600; color: var(--navy); margin-bottom: .7rem; }
        .service-card p   { font-size: .88rem; color: var(--text-mid); line-height: 1.65; margin-bottom: 1.5rem; }
        .service-tags { display: flex; flex-wrap: wrap; gap: .5rem; margin-bottom: 1.5rem; }
        .service-tag {
            background: var(--gold-dim); padding: .3rem .8rem; border-radius: 40px;
            font-size: .75rem; color: var(--navy); font-weight: 500;
        }
        .service-link {
            color: var(--gold); font-size: .85rem; font-weight: 500; text-decoration: none;
            display: inline-flex; align-items: center; gap: 6px; transition: gap .3s ease;
        }
        .service-link:hover { gap: 12px; }

        /* ══ BENEFICIOS ══ */
        #beneficios { padding: 7rem 0; background: linear-gradient(135deg, #fefcf7 0%, #fff 100%); }
        .benefits-badge {
            display: inline-flex; align-items: center; gap: 10px;
            background: var(--gold-dim); padding: .5rem 1.5rem; border-radius: 60px;
            font-size: .7rem; font-weight: 700; letter-spacing: .15em; text-transform: uppercase;
            color: #b88b2c; margin-bottom: 1.2rem; border: 1px solid rgba(201,168,76,.2);
        }
        .ben-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin: 2.5rem 0 0; }
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
        .ben-list li i { color: var(--gold); flex-shrink: 0; margin-top: 2px; }
        .ben-result {
            margin-top: 1.5rem; background: var(--navy); border-radius: 14px;
            padding: .9rem 1.1rem; font-size: .82rem; color: var(--gold-light); line-height: 1.5;
        }
        .result-banner {
            background: linear-gradient(115deg, var(--navy) 0%, var(--navy-mid) 100%);
            border-radius: 32px; padding: 2.5rem 3rem;
            display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between;
            margin-top: 2rem; position: relative; overflow: hidden;
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
        }

        /* ══ CONTACTO HOME ══ */
        #contacto-home {
            background: var(--navy);
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }
        #contacto-home::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(201,168,76,0.08) 0%, transparent 70%);
            border-radius: 50%;
        }
        .contacto-home-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }
        .contacto-home-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.8rem, 3vw, 2.5rem);
            color: #fff;
            line-height: 1.2;
            margin-bottom: 1rem;
        }
        .contacto-home-title em { color: var(--gold); font-style: italic; }
        .contacto-home-text {
            color: rgba(255,255,255,0.7);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.8rem;
        }
        .contacto-home-buttons { display: flex; flex-wrap: wrap; gap: 1rem; }
        .btn-wsp-home {
            display: inline-flex; align-items: center; gap: 12px;
            background: #25d366; color: #fff;
            padding: 14px 32px; border-radius: 50px;
            text-decoration: none; font-weight: 700; font-size: 1rem;
            transition: all 0.3s ease; border: none; cursor: pointer;
        }
        .btn-wsp-home:hover { transform: scale(1.05); box-shadow: 0 10px 25px -5px rgba(37,211,102,0.4); }
        .btn-wsp-home i { font-size: 1.3rem; }
        .btn-contact-home {
            display: inline-flex; align-items: center; gap: 10px;
            background: transparent; color: var(--gold);
            padding: 14px 32px; border-radius: 50px;
            text-decoration: none; font-weight: 600; font-size: 1rem;
            border: 1.5px solid var(--gold); transition: all 0.3s ease;
        }
        .btn-contact-home:hover { background: var(--gold); color: var(--navy); transform: translateX(5px); }
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
        #quienes-somos { padding: 7rem 0; background: var(--white); }
        .qs-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 4.5rem; align-items: center; margin-top: 1.5rem; }
        .qs-text p { font-size: 1rem; font-weight: 300; color: var(--text-mid); line-height: 1.85; margin-bottom: 1.2rem; }
        .qs-stats { display: grid; grid-template-columns: repeat(3,1fr); gap: 1rem; margin-top: 2.2rem; }
        .stat-card {
            background: var(--gray-light); border-radius: 20px; padding: 1.2rem;
            text-align: center; border: 1px solid transparent; transition: all .3s ease; cursor: default;
        }
        .stat-card:hover { background: var(--navy); border-color: rgba(201,168,76,.3); }
        .stat-card:hover .stat-num,
        .stat-card:hover .stat-label { color: rgba(255,255,255,.7) !important; }
        .stat-card:hover .stat-num { color: var(--gold-light) !important; }
        .stat-num { font-family: 'Cormorant Garamond', serif; font-size: 2rem; font-weight: 600; color: var(--gold); }
        .stat-label { font-size: .75rem; color: var(--text-mid); margin-top: .3rem; }
        .btn-more {
            display: inline-flex; align-items: center; gap: 10px;
            background: transparent; color: var(--gold); font-size: .9rem; font-weight: 500;
            padding: 12px 28px; border-radius: 40px; border: 1px solid var(--gold);
            text-decoration: none; transition: all .3s ease; margin-top: 1.8rem;
        }
        .btn-more:hover { background: var(--gold); color: var(--navy); transform: translateX(5px); }
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
        .qs-badge-title { color: #fff; font-size: .85rem; font-weight: 600; }
        .qs-badge-sub   { color: rgba(255,255,255,.55); font-size: .75rem; }

        /* ══ MISIÓN VISIÓN ══ */
        #mision-vision { background: var(--gray-light); padding: 6rem 0; }
        .mv-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.5rem; margin-top: 2.5rem; }
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
        .mv-icon-wrap i { color: var(--gold); font-size: 1.3rem; }
        .mv-front h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.6rem; color: var(--navy); margin-bottom: .8rem; }
        .mv-front p { font-size: .85rem; line-height: 1.7; color: var(--text-mid); }
        .mv-hint { margin-top: 1.2rem; font-size: .75rem; color: var(--gold); display: flex; align-items: center; gap: 6px; }
        .mv-back h3 { font-family: 'Cormorant Garamond', serif; font-size: 1.4rem; color: #fff; margin-bottom: 1rem; }
        .mv-back p { font-size: .85rem; line-height: 1.7; color: rgba(255,255,255,.75); }
        .mv-back i.back-icon { color: var(--gold); font-size: 2rem; margin-bottom: 1rem; }
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
        .valor-tag i { color: var(--gold); font-size: .8rem; }
        .valor-tag span { color: #fff; font-size: .85rem; font-weight: 500; }

        /* ══ OFERTA DE VALOR ══ */
        #oferta-valor { padding: 6rem 0; background: var(--white); }
        .proceso-timeline {
            display: grid; grid-template-columns: repeat(4,1fr);
            gap: 0; margin-top: 3rem; position: relative;
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
            background: var(--navy); border-radius: 28px; padding: 2.5rem;
            margin-top: 3rem; display: grid; grid-template-columns: 1fr 1fr;
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
        .gana-item i  { color: var(--gold); width: 20px; flex-shrink: 0; }
        .gana-item span { color: #fff; font-size: .85rem; }

        /* ══ FOOTER ══ */
        .footer {
            background: #123489;
            color: #ffffff;
            padding: 3rem 5% 1.5rem;
            width: 100%;
        }
        .footer__container { max-width: 1300px; margin: 0 auto; }
        .footer__grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr 1fr 1fr;
            gap: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .footer__logo { height: 55px; width: auto; margin-bottom: 1rem; }
        .footer__description { color: rgba(255,255,255,0.7); font-size: 0.85rem; line-height: 1.6; margin-bottom: 1.2rem; }
        .footer__social { display: flex; gap: 0.8rem; }
        .footer__social-link {
            width: 38px; height: 38px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            text-decoration: none; font-size: 1.1rem;
            transition: all 0.3s ease; box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
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
            font-size: 0.85rem; transition: all 0.25s ease; display: inline-block;
        }
        .footer__links li a:hover { color: #e8c97a; transform: translateX(4px); }
        .footer__bottom {
            display: flex; justify-content: space-between; align-items: center;
            flex-wrap: wrap; gap: 1rem; padding-top: 1.5rem;
            font-size: 0.75rem; color: rgba(255,255,255,0.5);
        }
        .footer__badge { display: flex; align-items: center; gap: 0.3rem; }

        /* ══════════════════════════════════
           RESPONSIVE
        ══════════════════════════════════ */
        @media (max-width: 1024px) {
            .mv-grid { grid-template-columns: 1fr 1fr; }
            .footer__grid { grid-template-columns: repeat(2, 1fr); gap: 1.8rem; }
            .contacto-home-grid { grid-template-columns: 1fr; text-align: center; gap: 2rem; }
            .contacto-home-buttons { justify-content: center; }
            .hero-bg {
                position: absolute;
                inset: 0;
                background-image: url('{{ asset("img/piscina.png") }}');
                background-size: contain;
                background-repeat: no-repeat;
                background-position: right top 160px;
                animation: subtle-zoom 12s ease-in-out infinite alternate;
                background-color: #0a1a45;
                background-blend-mode: normal;
            }
        }

        @media (max-width: 999px) {
            .top-bar { display: block; }
            .navbar {
                top: var(--top-bar-height);
                padding: 0 1rem;
                overflow: hidden;
                width: 100%;
                box-sizing: border-box;
            }
            .navbar__links { display: none !important; }
            .navbar__hamburger { display: flex; flex-shrink: 0; }
            .navbar__mobile-menu { top: calc(var(--navbar-height) + var(--top-bar-height)); }
            .navbar__logo {
                max-width: calc(100% - 60px);
                overflow: hidden;
            }
            .navbar__logo img { height: clamp(55px, 14vw, 85px); max-width: 100%; }
        }

        @media (min-width: 1000px) {
            .top-bar { display: none !important; }
            .navbar__mobile-menu { display: none; }
        }

        /* ══ MÓVIL (768px) ══ */
        @media (max-width: 768px) {
            /* Hero: título más abajo, más grande y pegado a tarjetas */
            .hero-content {
                padding: 0 1.2rem;
                margin-top: 380px;
                margin-bottom: 0;
                flex: 0;
                justify-content: flex-end;
                text-align: center;
                align-items: center;
            }
            .hero-title-main {
                font-size: clamp(2.5rem, 12vw, 3.0rem);
                text-align: center;
                line-height: 1.1;
            }
            .hero-subtitle-secondary {
                font-size: clamp(1.2rem, 5vw, 1.6rem);
                margin-top: 0.2rem;
                margin-bottom: 0.1rem;
                text-align: center;
            }
            /* Ocultar flechas en móviles */
            .hero-cards-nav {
                display: none !important;
            }
            .hero-cards-section {
                padding: 0 1.2rem 2.5rem;
                margin-top: 0.1rem;
            }
            .hero-card {
                height: auto;
                min-height: 140px;
                padding: 1rem 0.9rem;
            }
            /* Resto de secciones responsive */
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
    </style>
</head>
<body>

    {{-- ════════════ TOP BAR ════════════ --}}
    <div class="top-bar">
        <ul class="top-bar__links">
            <li><a href="{{ url('/nosotros') }}">NOSOTROS</a></li>
            <li><a href="{{ url('/servicios') }}">SERVICIOS</a></li>
            <li><a href="{{ url('/beneficios') }}">BENEFICIOS</a></li>
        </ul>
    </div>

    {{-- ════════════ NAVBAR ════════════ --}}
    <nav class="navbar">
        <a href="{{ url('/') }}" class="navbar__logo">
            <img src="{{ asset('img/logo_transparente.png') }}" alt="KBR KapitalHaus">
        </a>
        <ul class="navbar__links">
            <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">INICIO</a></li>
            <li><a href="{{ url('/servicios') }}" class="{{ request()->is('servicios') ? 'active' : '' }}">SERVICIOS</a></li>
            <li><a href="{{ url('/beneficios') }}" class="{{ request()->is('beneficios') ? 'active' : '' }}">BENEFICIOS</a></li>
            <li><a href="{{ url('/nosotros') }}" class="{{ request()->is('nosotros') ? 'active' : '' }}">NOSOTROS</a></li>
            <li><a href="#contacto-home" class="contact-link">CONTÁCTANOS</a></li>
            <li>
                <a href="https://wa.me/51961666679" target="_blank" class="menu-wsp" title="WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </li>
        </ul>
        <button class="navbar__hamburger" id="hamburger">
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
                <a href="https://wa.me/51961666679" target="_blank">
                    <i class="fab fa-whatsapp"></i> WhatsApp
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
                    <button class="hero-nav-btn hero-prev" aria-label="Anterior"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="hero-nav-btn hero-next" aria-label="Siguiente"><i class="fa-solid fa-chevron-right"></i></button>
                </div>

                <div class="swiper hero-cards-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="hero-card">
                                <i class="fas fa-user-check card-icon"></i>
                                <h3>Captamos al <span class="card-accent">inquilino ideal</span></h3>
                                <div class="card-title-line"></div>
                                <p>Seleccionamos inquilinos responsables luego de evaluación de capacidad de pago.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-card">
                                <i class="fas fa-file-signature card-icon"></i>
                                <h3>Administramos <span class="card-accent">tu alquiler</span></h3>
                                <div class="card-title-line"></div>
                                <p>Nos encargamos de contratos, cobranzas, pago de impuestos.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-card">
                                <i class="fas fa-shield-alt card-icon"></i>
                                <h3>Protegemos <span class="card-accent">tu inmueble</span></h3>
                                <div class="card-title-line"></div>
                                <p>Supervisamos mantenimientos, gestión de incidencias y alerta registral.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-card">
                                <i class="fas fa-chart-line card-icon"></i>
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
                        <button class="svc-nav-btn svc-prev" aria-label="Anterior"><i class="fa-solid fa-chevron-left"></i></button>
                        <button class="svc-nav-btn svc-next" aria-label="Siguiente"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>

                <div class="swiper svc-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-icon"><i class="fa-solid fa-user-tie"></i></div>
                                <h3>Corretaje</h3>
                                <p>Buscamos el inquilino adecuado mediante evaluación rigurosa que reduce riesgos y asegura estabilidad de largo plazo.</p>
                                <div class="service-tags">
                                    <span class="service-tag">Evaluación crediticia</span>
                                    <span class="service-tag">Referencias</span>
                                    <span class="service-tag">Capacidad de pago</span>
                                </div>
                                <a href="{{ url('/servicios') }}" class="service-link">Ver detalle <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-icon"><i class="fa-solid fa-building-columns"></i></div>
                                <h3>Administración</h3>
                                <p>Gestionamos todos los aspectos operativos, legales y financieros de tu propiedad. Contratos, cobranzas, impuestos y más.</p>
                                <div class="service-tags">
                                    <span class="service-tag">Contratos</span>
                                    <span class="service-tag">Cobranzas</span>
                                    <span class="service-tag">Sunat · Predios</span>
                                </div>
                                <a href="{{ url('/servicios') }}" class="service-link">Ver detalle <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-icon"><i class="fa-solid fa-chart-line"></i></div>
                                <h3>Asesoría</h3>
                                <p>Analizamos tu portafolio y te ayudamos a tomar mejores decisiones con datos de mercado y rentabilidad real.</p>
                                <div class="service-tags">
                                    <span class="service-tag">Valorización</span>
                                    <span class="service-tag">Rentabilidad</span>
                                    <span class="service-tag">Análisis de mercado</span>
                                </div>
                                <a href="{{ url('/servicios') }}" class="service-link">Ver detalle <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-icon"><i class="fa-solid fa-wrench"></i></div>
                                <h3>Mantenimiento</h3>
                                <p>Supervisamos el estado del inmueble, coordinamos reparaciones y garantizamos que tu propiedad conserve su valor.</p>
                                <div class="service-tags">
                                    <span class="service-tag">Supervisión</span>
                                    <span class="service-tag">Reparaciones</span>
                                    <span class="service-tag">Incidencias</span>
                                </div>
                                <a href="{{ url('/servicios') }}" class="service-link">Ver detalle <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="service-card">
                                <div class="service-icon"><i class="fa-solid fa-shield-halved"></i></div>
                                <h3>Alerta Registral</h3>
                                <p>Seguimiento continuo del estado registral de tu inmueble para detectar cualquier cambio no autorizado a tiempo.</p>
                                <div class="service-tags">
                                    <span class="service-tag">Vigilancia 24/7</span>
                                    <span class="service-tag">SUNARP</span>
                                    <span class="service-tag">Alertas</span>
                                </div>
                                <a href="{{ url('/servicios') }}" class="service-link">Ver detalle <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="svc-pagination swiper-pagination" style="margin-top:.5rem"></div>
                </div>

                <div style="text-align:center;margin-top:2rem">
                    <a href="{{ url('/servicios') }}" class="btn-outline-gold">Ver todos los servicios <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </section>

        {{-- ════════════ BENEFICIOS ════════════ --}}
        <section id="beneficios" data-aos="fade-up">
            <div class="section-wrap">
                <div class="benefits-badge"><i class="fas fa-crown"></i> EXCLUSIVO · VALOR AGREGADO</div>
                <h2 class="section-title">Beneficios <em>para el Propietario</em></h2>
                <p style="color:var(--text-mid);max-width:520px;margin:.8rem 0 0">Rentabilidad, seguridad y total tranquilidad, todo en un solo lugar.</p>

                <div class="ben-grid">
                    <div class="ben-card">
                        <div class="ben-card-head">
                            <div class="ben-emoji-wrap">💰</div>
                            <h3>Económicos</h3>
                        </div>
                        <ul class="ben-list">
                            <li><i class="fas fa-check-circle"></i>Optimización del precio de alquiler</li>
                            <li><i class="fas fa-check-circle"></i>Reducción de vacancias (periodos sin alquilar)</li>
                            <li><i class="fas fa-check-circle"></i>Evaluación rigurosa de inquilinos</li>
                            <li><i class="fas fa-check-circle"></i>Mayor estabilidad en los ingresos</li>
                        </ul>
                        <div class="ben-result"><strong>Resultado:</strong> mayor rentabilidad con ingresos constantes y crecientes</div>
                    </div>
                    <div class="ben-card">
                        <div class="ben-card-head">
                            <div class="ben-emoji-wrap">🔒</div>
                            <h3>No Económicos</h3>
                        </div>
                        <ul class="ben-list">
                            <li><i class="fas fa-check-circle"></i>Respaldo profesional en la administración</li>
                            <li><i class="fas fa-check-circle"></i>Seguimiento registral ante potenciales cambios</li>
                            <li><i class="fas fa-check-circle"></i>Control de la morosidad</li>
                            <li><i class="fas fa-check-circle"></i>Gestión de incidencias y deterioros</li>
                            <li><i class="fas fa-check-circle"></i>Administración ante ausencia geográfica</li>
                        </ul>
                    </div>
                </div>

                <div class="result-banner" data-aos="zoom-in">
                    <div>
                        <h3>✦ Resultado ✦<br><em>Mayor rentabilidad + tranquilidad absoluta</em></h3>
                        <p>Optimización del alquiler, reducción de vacancias, inquilinos evaluados.</p>
                    </div>
                    <div class="result-badge"><i class="fas fa-chart-simple"></i> +Rentabilidad sostenida</div>
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
                    <div class="step-card">
                        <div class="step-num"><span>1</span></div>
                        <h4>Evaluamos</h4>
                        <p>Analizamos tu propiedad y su potencial de mercado</p>
                    </div>
                    <div class="step-card">
                        <div class="step-num"><span>2</span></div>
                        <h4>Estrategia</h4>
                        <p>Definimos el plan óptimo de rentabilidad</p>
                    </div>
                    <div class="step-card">
                        <div class="step-num"><span>3</span></div>
                        <h4>Gestionamos</h4>
                        <p>Operamos todo de principio a fin</p>
                    </div>
                    <div class="step-card">
                        <div class="step-num active"><span>4</span></div>
                        <h4>Resultados</h4>
                        <p>Tú recibes rentabilidad y tranquilidad</p>
                    </div>
                </div>

                <div class="propuesta-box" data-aos="zoom-in">
                    <div>
                        <div class="propuesta-label">📌 Propuesta de valor</div>
                        <h3 class="propuesta-title">Maximizamos ingresos,<br><em>reducimos riesgos</em></h3>
                        <p class="propuesta-desc">Gestionamos todo por ti con un equipo profesional y tecnología al servicio de tu activo.</p>
                    </div>
                    <div class="gana-list">
                        <div class="gana-item"><i class="fas fa-chart-line"></i><span>Más ingresos, mejor rentabilidad</span></div>
                        <div class="gana-item"><i class="fas fa-user-check"></i><span>Inquilinos evaluados y confiables</span></div>
                        <div class="gana-item"><i class="fas fa-shield-alt"></i><span>Seguridad legal y financiera</span></div>
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
                            <a href="https://wa.me/51961666679" target="_blank" class="btn-wsp-home">
                                <i class="fab fa-whatsapp"></i> Escríbenos al WhatsApp
                            </a>
                            <a href="{{ url('/contacto') }}" class="btn-contact-home">
                                <i class="fas fa-envelope"></i> Formulario de contacto
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
                                <div class="mv-icon-wrap"><i class="fas fa-bullseye"></i></div>
                                <h3>Misión</h3>
                                <p>Brindar soluciones integrales en gestión, administración y comercialización de propiedades, ofreciendo seguridad, tranquilidad y rentabilidad a nuestros clientes.</p>
                                <div class="mv-hint"><i class="fas fa-hand-pointer"></i> Pasar el mouse</div>
                            </div>
                            <div class="mv-back" style="background:var(--navy);">
                                <i class="fas fa-bullseye back-icon"></i>
                                <h3>Nuestra Misión</h3>
                                <p>Maximizar el valor de los inmuebles de nuestros clientes mediante una gestión profesional, eficiente y transparente, con foco en la seguridad y la rentabilidad sostenida.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mv-flip">
                        <div class="mv-inner">
                            <div class="mv-front">
                                <div class="mv-icon-wrap"><i class="fas fa-eye"></i></div>
                                <h3>Visión</h3>
                                <p>Ser reconocidos como empresa líder en administración de inmuebles en la región, destacando por la excelencia de nuestros servicios y la confianza de nuestros clientes.</p>
                                <div class="mv-hint"><i class="fas fa-hand-pointer"></i> Pasar el mouse</div>
                            </div>
                            <div class="mv-back" style="background:var(--navy-mid);">
                                <i class="fas fa-eye back-icon"></i>
                                <h3>Nuestra Visión</h3>
                                <p>Liderar el mercado regional de gestión inmobiliaria con soluciones innovadoras que generen valor real y relaciones de largo plazo con nuestros clientes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="valores-card">
                        <div class="mv-icon-wrap"><i class="fas fa-gem" style="color:var(--gold);font-size:1.3rem"></i></div>
                        <h3 style="font-family:'Cormorant Garamond',serif;font-size:1.6rem;color:#fff;margin-top:.5rem">Valores</h3>
                        <div class="valores-list">
                            <div class="valor-tag"><i class="fas fa-check-circle"></i><span>Transparencia</span></div>
                            <div class="valor-tag"><i class="fas fa-check-circle"></i><span>Eficiencia</span></div>
                            <div class="valor-tag"><i class="fas fa-check-circle"></i><span>Integridad</span></div>
                            <div class="valor-tag"><i class="fas fa-check-circle"></i><span>Orientación al Cliente</span></div>
                            <div class="valor-tag"><i class="fas fa-check-circle"></i><span>Calidad de Servicio</span></div>
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
                            Conocer más <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="qs-image" data-aos="fade-left">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&auto=format&fit=crop&q=80" alt="Edificio moderno KBR">
                        <div class="qs-image-overlay"></div>
                        <div class="qs-badge">
                            <div class="qs-badge-icon"><i class="fas fa-award" style="color:var(--gold)"></i></div>
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
                        <a href="https://facebook.com" target="_blank" class="footer__social-link fb"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://wa.me/51961666679" target="_blank" class="footer__social-link wa"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://instagram.com" target="_blank" class="footer__social-link ig"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="footer__col">
                    <h4 class="footer__title">NAVEGACIÓN</h4>
                    <ul class="footer__links">
                        <li><a href="#inicio"><i class="fas fa-home"></i> Inicio</a></li>
                        <li><a href="{{ url('/servicios') }}"><i class="fas fa-cogs"></i> Servicios</a></li>
                        <li><a href="{{ url('/beneficios') }}"><i class="fas fa-gem"></i> Beneficios</a></li>
                        <li><a href="{{ url('/nosotros') }}"><i class="fas fa-users"></i> Quiénes Somos</a></li>
                        <li><a href="#contacto-home"><i class="fas fa-envelope"></i> Contáctanos</a></li>
                    </ul>
                </div>

                <div class="footer__col">
                    <h4 class="footer__title">SERVICIOS</h4>
                    <ul class="footer__links">
                        <li><a href="{{ url('/servicios') }}"><i class="fas fa-handshake"></i> Corretaje de Inquilinos</a></li>
                        <li><a href="{{ url('/servicios') }}"><i class="fas fa-building"></i> Administración de Inmuebles</a></li>
                        <li><a href="{{ url('/servicios') }}"><i class="fas fa-chart-line"></i> Asesoría Inmobiliaria</a></li>
                        <li><a href="{{ url('/servicios') }}"><i class="fas fa-gavel"></i> Gestión Legal</a></li>
                        <li><a href="https://wa.me/51961666679" target="_blank"><i class="fas fa-dollar-sign"></i> Cotiza Gratis</a></li>
                    </ul>
                </div>

                <div class="footer__col">
                    <h4 class="footer__title">CONTACTO</h4>
                    <ul class="footer__links">
                        <li><a href="https://wa.me/51961666679" target="_blank"><i class="fab fa-whatsapp"></i> +51 961 666 679</a></li>
                        <li><a href="mailto:contacto@kapitalhaus.pe"><i class="fas fa-envelope"></i> contacto@kapitalhaus.pe</a></li>
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Lima, Perú</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer__bottom">
                <p>&copy; {{ date('Y') }} KBR KapitalHaus — Todos los derechos reservados</p>
                <p class="footer__badge"><i class="fas fa-shield-alt"></i> Tu tranquilidad es nuestra prioridad</p>
            </div>
        </div>

        <a href="https://wa.me/51961666679" target="_blank" class="whatsapp-float" id="whatsappFloat">
            <div class="whatsapp-button">
                <i class="fab fa-whatsapp"></i>
                <span class="tooltip">📱 Contacta con un asesor</span>
            </div>
        </a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
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

        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('open');
            mobileMenu.classList.toggle('open');
            document.body.style.overflow = mobileMenu.classList.contains('open') ? 'hidden' : '';
        });
        document.querySelectorAll('.navbar__mobile-menu a, .top-bar__links a, .contact-link').forEach(link => {
            link.addEventListener('click', (e) => {
                if(link.getAttribute('href') === '#contacto-home') {
                    e.preventDefault();
                    document.getElementById('contacto-home').scrollIntoView({ behavior: 'smooth' });
                }
                hamburger.classList.remove('open');
                mobileMenu.classList.remove('open');
                document.body.style.overflow = '';
            });
        });

        document.querySelectorAll('.stat-card').forEach(c => {
            c.addEventListener('mouseenter', () => { c.style.background = 'var(--navy)'; c.style.borderColor = 'rgba(201,168,76,.3)'; });
            c.addEventListener('mouseleave', () => { c.style.background = 'var(--gray-light)'; c.style.borderColor = 'transparent'; });
        });

        document.querySelectorAll('.mv-flip').forEach(c => {
            c.addEventListener('click', () => {
                const inner = c.querySelector('.mv-inner');
                inner.style.transform = inner.style.transform === 'rotateY(180deg)' ? '' : 'rotateY(180deg)';
            });
        });
    </script>
</body>
</html>