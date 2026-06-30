{{-- resources/views/servicios.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios — KBR KapitalHaus</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo_redondo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing:border-box; margin:0; padding:0; }
        :root {
            --navy:       #0a1a45;
            --navy-light: #132863;
            --gold:       #c9a84c;
            --gold-light: #e4c97e;
            --gold-dim:   rgba(201,168,76,0.15);
            --white:      #ffffff;
            --gray-light: #f4f5f7;
            --text-mid:   #4a5568;
            --text-muted: rgba(255,255,255,.65);
        }
        html { scroll-behavior:smooth; }
        body { 
            font-family:'Outfit',sans-serif; 
            background:var(--white); 
            overflow-x:hidden;
            padding-top: 152px;
        }

        @media (min-width: 1000px) {
            body { padding-top: 110px; }
        }

        /* ─── ANIMACIONES GLOBALES ─── */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(201,168,76,0.4); }
            50% { box-shadow: 0 0 0 15px rgba(201,168,76,0); }
        }
        @keyframes shine {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* ─── PAGE HERO ─── */
        .page-hero {
            position:relative; background:var(--navy);
            padding:4rem 0 3rem; overflow:hidden;
        }
        .page-hero-pattern {
            position:absolute; inset:0; pointer-events:none;
            background-image:repeating-linear-gradient(45deg, rgba(201,168,76,.04) 0px, rgba(201,168,76,.04) 1px, transparent 1px, transparent 60px);
        }
        .page-hero-circle {
            position:absolute; right:-80px; top:50%; transform:translateY(-50%);
            width:450px; height:450px; border-radius:50%;
            border:1px solid rgba(201,168,76,.12);
        }
        .page-hero-circle::before { content:''; position:absolute; inset:40px; border-radius:50%; border:1px solid rgba(201,168,76,.07); }
        .gold-line { position:absolute; left:0; top:0; bottom:0; width:3px; background:linear-gradient(to bottom, transparent, var(--gold), transparent); opacity:.6; }

        .page-hero-content { position:relative; z-index:1; max-width:1200px; margin:0 auto; padding:0 2.5rem; }
        .page-hero-label {
            display:inline-flex; align-items:center; gap:10px;
            font-size:.72rem; font-weight:500; letter-spacing:.2em; text-transform:uppercase; color:var(--gold); margin-bottom:0.8rem;
        }
        .page-hero-label::before { content:''; display:block; width:28px; height:1.5px; background:var(--gold); }
        .page-hero-title { font-family:'Cormorant Garamond',serif; font-size:clamp(2.5rem,5vw,4rem); font-weight:300; color:var(--white); line-height:1.1; }
        .page-hero-title em { font-style:italic; color:var(--gold-light); }

        /* ─── SECTION BASE ─── */
        .section-wrap { max-width:1200px; margin:0 auto; padding:0 2.5rem; }
        .section-label {
            display:inline-flex; align-items:center; gap:10px;
            font-size:.7rem; font-weight:500; letter-spacing:.2em; text-transform:uppercase; margin-bottom:0.6rem;
        }
        .section-label::before { content:''; display:block; width:28px; height:1.5px; background:var(--gold); }
        .section-title { font-family:'Cormorant Garamond',serif; font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:300; line-height:1.15; }
        .section-title em { font-style:italic; color:var(--gold); }

        /* ─── SERVICIO BLOQUE (sin números) ─── */
        .servicio-bloque { padding:4rem 0; }
        .servicio-bloque:nth-child(even) { background:var(--gray-light); }
        .servicio-bloque:nth-child(odd)  { background:var(--white); }

        .servicio-grid { display:grid; grid-template-columns:1fr 1fr; gap:4rem; align-items:start; }
        .servicio-grid.reverse { direction:rtl; }
        .servicio-grid.reverse > * { direction:ltr; }

        .servicio-header { margin-bottom:1.5rem; }
        .servicio-icon-row { display:flex; align-items:center; gap:1rem; margin-bottom:0.8rem; }
        .servicio-icon {
            width:50px; height:50px; border-radius:16px;
            background:linear-gradient(135deg, var(--gold-dim) 0%, rgba(201,168,76,0.05) 100%);
            color:var(--gold);
            display:flex; align-items:center; justify-content:center; font-size:1.3rem;
            transition: all 0.3s ease;
        }
        .servicio-bloque:hover .servicio-icon {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(201,168,76,0.2);
        }
        .servicio-title { font-family:'Cormorant Garamond',serif; font-size:1.8rem; font-weight:600; color:var(--navy); }
        .servicio-lead { font-size:0.95rem; color:var(--text-mid); line-height:1.7; margin-bottom:1.5rem; font-weight:300; }

        .servicio-items { display:flex; flex-direction:column; gap:0; }
        .servicio-item {
            display:flex; align-items:flex-start; gap:12px;
            padding:.7rem 0; border-bottom:1px solid rgba(10,26,69,.07);
            transition: transform 0.2s ease, padding-left 0.2s ease;
        }
        .servicio-item:hover {
            transform: translateX(5px);
            padding-left: 5px;
        }
        .servicio-check { color:var(--gold); margin-top:3px; font-size:.85rem; flex-shrink:0; }
        .servicio-item-text { font-size:.9rem; color:var(--text-mid); line-height:1.6; }

        .servicio-visual {
            border-radius:4px; overflow:hidden;
            aspect-ratio:3/2; position:relative;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }
        .servicio-visual:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 35px -10px rgba(10,26,69,0.2);
        }
        .servicio-visual img { width:100%; height:100%; object-fit:cover; display:block; transition: transform 0.5s ease; }
        .servicio-visual:hover img { transform: scale(1.05); }
        .servicio-visual-overlay { position:absolute; inset:0; background:linear-gradient(135deg, rgba(10,26,69,0.1) 0%, rgba(10,26,69,0.3) 100%); }

        /* ─── ASESORÍA ─── */
        #asesoria { background:var(--navy); padding:4rem 0; position:relative; overflow:hidden; }
        #asesoria::before {
            content: '✦';
            position: absolute;
            font-size: 20rem;
            color: rgba(201,168,76,0.03);
            bottom: -80px;
            right: -80px;
            pointer-events: none;
        }
        #asesoria .section-label { color:var(--gold); }
        #asesoria .section-title { color:var(--white); margin-bottom:0.8rem; }
        #asesoria .section-intro { font-size:1rem; font-weight:300; color:var(--text-muted); max-width:520px; line-height:1.8; margin-bottom:2rem; }
        .asesoria-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:1.5px; background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.06); border-radius:4px; overflow:hidden; }
        .asesoria-card { background:rgba(10,26,69,.5); padding:2rem; transition:all .3s ease; }
        .asesoria-card:hover { background:rgba(201,168,76,.1); transform: translateY(-3px); }
        .asesoria-card-icon { font-size:1.3rem; color:var(--gold); margin-bottom:0.8rem; }
        .asesoria-card-title { font-size:1rem; font-weight:600; color:var(--white); margin-bottom:.4rem; }
        .asesoria-card-text  { font-size:.85rem; color:var(--text-muted); line-height:1.7; }

        /* ─── BENEFICIOS (VERSIÓN PREMIUM) ─── */
        .benefits-section {
            padding: 4rem 0 5rem;
            background: linear-gradient(135deg, #fefcf7 0%, #ffffff 100%);
            position: relative;
            overflow: hidden;
        }
        .benefits-section::before {
            content: '🏠✨';
            position: absolute;
            font-size: 15rem;
            opacity: 0.03;
            bottom: -50px;
            right: -50px;
            pointer-events: none;
        }
        .benefits-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        .benefits-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, rgba(201,168,76,0.15) 0%, rgba(201,168,76,0.05) 100%);
            padding: 0.4rem 1.2rem;
            border-radius: 60px;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #b88b2c;
            margin-bottom: 1rem;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(201,168,76,0.2);
        }
        
        /* Tarjetas Flip 3D mejoradas */
        .flip-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            margin-bottom: 3.5rem;
        }
        .flip-card {
            background: transparent;
            width: 320px;
            height: 430px;
            perspective: 1500px;
            cursor: pointer;
        }
        .flip-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.7s cubic-bezier(0.23, 1, 0.32, 1);
            transform-style: preserve-3d;
            border-radius: 32px;
        }
        .flip-card:hover .flip-inner {
            transform: rotateY(180deg);
        }
        .flip-front, .flip-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 32px;
            padding: 1.8rem;
            display: flex;
            flex-direction: column;
            box-shadow: 0 30px 45px -15px rgba(0,0,0,0.15);
        }
        .flip-front {
            background: linear-gradient(145deg, #ffffff 0%, #fef9ef 100%);
            border: 1px solid rgba(201,168,76,0.3);
            text-align: center;
            justify-content: center;
        }
        .flip-front::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 32px;
            padding: 2px;
            background: linear-gradient(135deg, var(--gold), transparent);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
            pointer-events: none;
            opacity: 0.5;
        }
        .flip-back {
            background: linear-gradient(135deg, #0a1a45 0%, #102559 100%);
            color: white;
            transform: rotateY(180deg);
            text-align: left;
            justify-content: flex-start;
            gap: 0.6rem;
        }
        .flip-back ul {
            list-style: none;
            margin-top: 0.8rem;
        }
        .flip-back li {
            margin-bottom: 0.7rem;
            font-size: 0.82rem;
            display: flex;
            gap: 10px;
            align-items: center;
            line-height: 1.4;
        }
        .flip-back li i {
            color: #c9a84c;
            font-size: 0.8rem;
            flex-shrink: 0;
        }
        .icon-benefit {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, rgba(201,168,76,0.15) 0%, rgba(201,168,76,0.05) 100%);
            border-radius: 26px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.2rem;
            font-size: 2rem;
            color: #c9a84c;
            transition: all 0.3s ease;
        }
        .flip-card:hover .icon-benefit {
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(201,168,76,0.3);
        }

        /* Carrusel mejorado - FLECHAS TRANSPARENTES */
        .carrusel-wrapper {
            margin: 2rem 0 1.5rem;
            position: relative;
        }
        .benefit-swiper {
            overflow: hidden;
            padding: 0.8rem 0.5rem;
        }
        .glass-benefit-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
            border-radius: 28px;
            padding: 1.8rem;
            height: 100%;
            transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            border: 1px solid rgba(201,168,76,0.2);
            box-shadow: 0 15px 35px -12px rgba(0,0,0,0.08);
        }
        .glass-benefit-card:hover {
            transform: translateY(-8px);
            border-color: rgba(201,168,76,0.6);
            background: white;
            box-shadow: 0 25px 40px -12px rgba(10,26,69,0.15);
        }
        .card-icon-big {
            font-size: 2.2rem;
            color: #c9a84c;
            margin-bottom: 1rem;
            transition: transform 0.3s ease;
        }
        .glass-benefit-card:hover .card-icon-big {
            transform: scale(1.1);
        }
        .glass-benefit-card h4 {
            font-size: 1.3rem;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            color: #0a1a45;
            margin-bottom: 0.6rem;
        }
        .glass-benefit-card p {
            color: #374151;
            line-height: 1.6;
            font-size: 0.88rem;
        }

        /* FLECHAS DEL CARRUSEL - TRANSPARENTES */
        .swiper-button-next,
        .swiper-button-prev {
            color: #c9a84c !important;
            background: transparent !important;
            width: 40px !important;
            height: 40px !important;
            border-radius: 50% !important;
            box-shadow: none !important;
            transition: all 0.3s ease !important;
            backdrop-filter: none !important;
        }
        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(201,168,76,0.15) !important;
            transform: scale(1.1);
        }
        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 1.3rem !important;
            font-weight: 700 !important;
        }
        .swiper-button-next {
            right: -10px !important;
        }
        .swiper-button-prev {
            left: -10px !important;
        }
        .swiper-pagination-bullet-active {
            background: #c9a84c !important;
        }

        /* Banner resultado con glow */
        .result-gold-banner {
            background: linear-gradient(115deg, #0a1a45 0%, #102559 100%);
            border-radius: 40px;
            padding: 2.2rem;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            margin-top: 2rem;
            position: relative;
            overflow: hidden;
            animation: pulse-glow 3s infinite;
        }
        .result-gold-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(201,168,76,0.08), transparent);
            transform: rotate(45deg);
            animation: shine 8s infinite linear;
        }
        .result-gold-banner h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.7rem;
            color: white;
            margin-bottom: 0.4rem;
        }
        .result-gold-banner span {
            color: #e4c97e;
        }
        .result-badge-gold {
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(8px);
            padding: 0.6rem 1.5rem;
            border-radius: 60px;
            font-weight: 600;
            letter-spacing: 0.5px;
            border: 1px solid rgba(201,168,76,0.3);
            font-size: 0.85rem;
        }

        /* Contador animado */
        .counter-grid {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 2rem 0 1.5rem;
            flex-wrap: wrap;
        }
        .counter-item {
            text-align: center;
            padding: 1.2rem 1.8rem;
            background: rgba(201,168,76,0.05);
            border-radius: 20px;
            min-width: 140px;
            border: 1px solid rgba(201,168,76,0.1);
            transition: all 0.3s ease;
        }
        .counter-item:hover {
            transform: translateY(-4px);
            background: rgba(201,168,76,0.1);
            border-color: rgba(201,168,76,0.3);
        }
        .counter-number {
            font-size: 2.4rem;
            font-weight: 700;
            color: #c9a84c;
            font-family: 'Cormorant Garamond', serif;
        }
        .counter-label {
            font-size: 0.75rem;
            color: #5a6e7c;
            letter-spacing: 1px;
        }

        /* ─── CTA ─── */
        #cta { background:var(--gray-light); padding:4rem 0; }
        .cta-box {
            background:var(--navy); border-radius:20px; padding:4rem;
            display:flex; align-items:center; justify-content:space-between; gap:3rem;
            position:relative; overflow:hidden;
        }
        .cta-box::before {
            content:'';
            position:absolute;
            width:200px;
            height:200px;
            background: radial-gradient(circle, rgba(201,168,76,0.1) 0%, transparent 70%);
            top:-50px;
            right:-50px;
            border-radius:50%;
        }
        .cta-box-left { position:relative; z-index:1; }
        .cta-box-label { font-size:.7rem; font-weight:500; letter-spacing:.2em; text-transform:uppercase; color:var(--gold); margin-bottom:0.8rem; }
        .cta-box-title { font-family:'Cormorant Garamond',serif; font-size:clamp(1.8rem,3vw,2.6rem); font-weight:300; color:var(--white); line-height:1.2; }
        .cta-box-title em { font-style:italic; color:var(--gold-light); }
        .btn-gold-solid {
            display:inline-flex; align-items:center; gap:10px;
            background:var(--gold); color:var(--navy);
            font-size:.9rem; font-weight:700; letter-spacing:.04em;
            padding:14px 32px; border-radius:40px; text-decoration:none;
            transition:all 0.3s ease;
            position:relative;
            overflow:hidden;
        }
        .btn-gold-solid:hover {
            background:var(--gold-light);
            transform: translateY(-3px);
            box-shadow: 0 15px 25px -10px rgba(201,168,76,0.4);
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width:900px) {
            .servicio-grid { grid-template-columns:1fr; gap:2rem; }
            .servicio-grid.reverse { direction:ltr; }
            .asesoria-grid { grid-template-columns:1fr; }
            .cta-box { flex-direction:column; align-items:flex-start; padding:2.5rem; }
            .flip-card { width: 280px; height: 400px; }
            .counter-grid { gap: 1rem; }
            .counter-item { padding: 0.8rem 1.2rem; min-width: 110px; }
            .swiper-button-next { right: 0 !important; }
            .swiper-button-prev { left: 0 !important; }
        }

        @media (max-width:600px) {
            body { padding-top: 152px; }
            .section-wrap { padding:0 1.2rem; }
            .page-hero-content { padding:0 1.2rem; }
            .page-hero { padding:2.5rem 0 2rem; }
            .page-hero-circle { display:none; }
            .servicio-bloque { padding:2.5rem 0; }
            .servicio-grid { gap:1.5rem; }
            .servicio-title { font-size:1.5rem; }
            .servicio-header { margin-bottom:1rem; }
            #asesoria { padding:2.5rem 0; }
            #asesoria .section-intro { margin-bottom:1.5rem; }
            .asesoria-card { padding:1.5rem; }
            .benefits-section { padding:2.5rem 0 3rem; }
            .flip-row { gap:1.2rem; }
            .flip-card { width: 100%; max-width: 320px; height: 400px; }
            .result-gold-banner { padding:1.5rem; }
            .result-gold-banner h3 { font-size:1.3rem; }
            #cta { padding:2.5rem 0; }
            .cta-box { padding:2rem; }
            .btn-gold-solid { padding:12px 24px; font-size:.85rem; }
            .swiper-button-next,
            .swiper-button-prev {
                width: 32px !important;
                height: 32px !important;
            }
            .swiper-button-next:after,
            .swiper-button-prev:after {
                font-size: 1rem !important;
            }
            .swiper-button-next { right: -5px !important; }
            .swiper-button-prev { left: -5px !important; }
        }

        @media (max-width:480px) {
            .page-hero { padding:2rem 0 1.5rem; }
            .page-hero-title { font-size:clamp(1.8rem,8vw,2.2rem); }
            .servicio-bloque { padding:1.8rem 0; }
            .servicio-grid { gap:1rem; }
            .servicio-item { padding:.5rem 0; }
            .servicio-item-text { font-size:.82rem; }
            .servicio-icon { width:42px; height:42px; font-size:1.1rem; }
            .servicio-title { font-size:1.3rem; }
            .servicio-lead { font-size:.88rem; margin-bottom:1rem; }
            #asesoria { padding:1.8rem 0; }
            .asesoria-card { padding:1rem; }
            .asesoria-card-text { font-size:.8rem; }
            .benefits-section { padding:1.8rem 0 2.5rem; }
            .benefits-header { margin-bottom:1.5rem; }
            .flip-card { height: 380px; }
            .flip-front, .flip-back { padding:1.2rem; }
            .icon-benefit { width:60px; height:60px; font-size:1.6rem; }
            .counter-item { padding:0.6rem 1rem; min-width:90px; }
            .counter-number { font-size:1.8rem; }
            #cta { padding:1.8rem 0; }
            .cta-box { padding:1.5rem; }
            .cta-box-title { font-size:clamp(1.5rem,6vw,1.8rem); }
            .btn-gold-solid { padding:10px 20px; font-size:.78rem; }
            .result-gold-banner { padding:1.2rem; }
            .result-gold-banner h3 { font-size:1.1rem; }
            .result-badge-gold { padding:0.4rem 1rem; font-size:0.75rem; }
            .swiper-button-next,
            .swiper-button-prev {
                width: 28px !important;
                height: 28px !important;
            }
            .swiper-button-next:after,
            .swiper-button-prev:after {
                font-size: 0.8rem !important;
            }
        }
    </style>
</head>
<body>

    @include('layouts.navbar')

    {{-- PAGE HERO --}}
    <section class="page-hero">
        <div class="page-hero-pattern"></div>
        <div class="page-hero-circle"></div>
        <div class="gold-line"></div>
        <div class="page-hero-content">
            <div class="page-hero-label">Nuestros servicios</div>
            <h1 class="page-hero-title">
                Gestión completa de<br>
                tu <em>propiedad</em>
            </h1>
        </div>
    </section>

    <main>

        {{-- CORRETAJE (sin número) --}}
        <section class="servicio-bloque" data-aos="fade-up">
            <div class="section-wrap">
                <div class="servicio-grid">
                    <div>
                        <div class="servicio-header">
                            <div class="servicio-icon-row">
                                <div class="servicio-icon"><i class="fas fa-user-tie"></i></div>
                                <div class="section-label" style="color:var(--gold);">Corretaje</div>
                            </div>
                            <div class="servicio-title">Colocación de Inquilinos</div>
                        </div>
                        <p class="servicio-lead">
                            Buscamos el inquilino adecuado para tu propiedad mediante un proceso de
                            evaluación que reduce riesgos y asegura estabilidad en los ingresos.
                        </p>
                        <div class="servicio-items">
                            <div class="servicio-item">
                                <i class="fas fa-check servicio-check"></i>
                                <span class="servicio-item-text">Evaluación del precio óptimo de alquiler</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fas fa-check servicio-check"></i>
                                <span class="servicio-item-text">Promoción del inmueble en los canales adecuados</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fas fa-check servicio-check"></i>
                                <span class="servicio-item-text">Selección y evaluación rigurosa de inquilinos</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fas fa-check servicio-check"></i>
                                <span class="servicio-item-text">Elaboración y formalización del contrato de arrendamiento</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fas fa-check servicio-check"></i>
                                <span class="servicio-item-text">Gestión de incidencias antes del ingreso del nuevo inquilino</span>
                            </div>
                        </div>
                    </div>
                    <div class="servicio-visual">
                        <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&auto=format&fit=crop&q=80" alt="Colocación de inquilinos">
                        <div class="servicio-visual-overlay"></div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ADMINISTRACIÓN (sin número) --}}
        <section class="servicio-bloque" data-aos="fade-up">
            <div class="section-wrap">
                <div class="servicio-grid reverse">
                    <div>
                        <div class="servicio-header">
                            <div class="servicio-icon-row">
                                <div class="servicio-icon"><i class="fas fa-building-columns"></i></div>
                                <div class="section-label" style="color:var(--gold);">Administración</div>
                            </div>
                            <div class="servicio-title">Administración del Inmueble</div>
                        </div>
                        <p class="servicio-lead">
                            Gestionamos todos los aspectos operativos, legales y financieros de tu propiedad
                            para que no tengas que preocuparte por nada.
                        </p>
                        <div class="servicio-items">
                            <div class="servicio-item">
                                <i class="fas fa-check servicio-check"></i>
                                <span class="servicio-item-text">Cobranza mensual del alquiler y seguimiento de pagos</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fas fa-check servicio-check"></i>
                                <span class="servicio-item-text">Supervisión del estado del inmueble (visita en el periodo del contrato)</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fas fa-check servicio-check"></i>
                                <span class="servicio-item-text">Alerta registral: monitoreo ante intentos de cambios en el registro de la propiedad</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fas fa-check servicio-check"></i>
                                <span class="servicio-item-text">Coordinación de pagos de tributos municipales</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fas fa-check servicio-check"></i>
                                <span class="servicio-item-text">Pago de impuesto de primera categoría ante SUNAT, en coordinación con el propietario</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fas fa-check servicio-check"></i>
                                <span class="servicio-item-text">Gestión de renovación del contrato evaluando al inquilino y revisando condiciones</span>
                            </div>
                        </div>
                    </div>
                    <div class="servicio-visual">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&auto=format&fit=crop&q=80" alt="Administración de inmueble">
                        <div class="servicio-visual-overlay"></div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ASESORÍA --}}
        <section id="asesoria" data-aos="fade-up">
            <div class="section-wrap">
                <div class="section-label">Asesoría</div>
                <h2 class="section-title" style="color:var(--white);">Asesoría <em>Inmobiliaria</em></h2>
                <p class="section-intro">
                    Brindamos asesoría especializada a propietarios e inversionistas para tomar
                    mejores decisiones sobre sus activos inmobiliarios.
                </p>
                <div class="asesoria-grid">
                    <div class="asesoria-card" data-aos="zoom-in" data-aos-delay="100">
                        <div class="asesoria-card-icon"><i class="fas fa-chart-pie"></i></div>
                        <div class="asesoria-card-title">Análisis de rentabilidad</div>
                        <div class="asesoria-card-text">Evaluamos la rentabilidad real de tu propiedad y encontramos oportunidades para mejorarla.</div>
                    </div>
                    <div class="asesoria-card" data-aos="zoom-in" data-aos-delay="200">
                        <div class="asesoria-card-icon"><i class="fas fa-tags"></i></div>
                        <div class="asesoria-card-title">Evaluación del precio de alquiler</div>
                        <div class="asesoria-card-text">Determinamos el precio óptimo de alquiler en base al mercado actual y las condiciones del inmueble.</div>
                    </div>
                    <div class="asesoria-card" data-aos="zoom-in" data-aos-delay="300">
                        <div class="asesoria-card-icon"><i class="fas fa-magnifying-glass-chart"></i></div>
                        <div class="asesoria-card-title">Análisis del mercado inmobiliario</div>
                        <div class="asesoria-card-text">Informes actualizados sobre tendencias de precios, zonas de mayor demanda y oportunidades.</div>
                    </div>
                    <div class="asesoria-card" data-aos="zoom-in" data-aos-delay="400">
                        <div class="asesoria-card-icon"><i class="fas fa-lightbulb"></i></div>
                        <div class="asesoria-card-title">Oportunidades de inversión</div>
                        <div class="asesoria-card-text">Asesoría personalizada en la identificación y evaluación de oportunidades de inversión inmobiliaria.</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ✦ BENEFICIOS PARA EL PROPIETARIO (VERSIÓN PREMIUM) ✦ --}}
        <section class="benefits-section" data-aos="fade-up">
            <div class="section-wrap">
                <div class="benefits-header">
                    <div class="benefits-badge">
                        <i class="fas fa-crown"></i> EXCLUSIVO · VALOR AGREGADO
                    </div>
                    <h2 class="section-title" style="color:var(--navy);">Beneficios <em>para el Propietario</em></h2>
                    <p style="color: #5a6e7c; max-width: 580px; margin: 0.8rem auto 0; font-size:0.95rem;">Rentabilidad, seguridad y total tranquilidad, todo en un solo lugar.</p>
                </div>

                <!-- Contadores animados -->
                <div class="counter-grid">
                    <div class="counter-item">
                        <div class="counter-number"><span class="count-num" data-target="35">0</span>+</div>
                        <div class="counter-label">Propiedades gestionadas</div>
                    </div>
                    <div class="counter-item">
                        <div class="counter-number"><span class="count-num" data-target="98">0</span>%</div>
                        <div class="counter-label">Ocupación garantizada</div>
                    </div>
                    <div class="counter-item">
                        <div class="counter-number"><span class="count-num" data-target="24">0</span>/7</div>
                        <div class="counter-label">Alertas registrales</div>
                    </div>
                </div>

                <!-- Tarjetas 3D Flip -->
                <div class="flip-row">
                    <div class="flip-card" data-aos="flip-left" data-aos-delay="100">
                        <div class="flip-inner">
                            <div class="flip-front">
                                <div class="icon-benefit"><i class="fas fa-chart-line"></i></div>
                                <h3 style="font-size: 1.7rem; font-weight: 600;">Económicos</h3>
                                <p style="color:#4b5563; margin-top: 0.4rem; font-size:0.9rem;">Mayor rentabilidad garantizada</p>
                                <div style="margin-top: 0.8rem;"><i class="fas fa-arrow-right" style="color:#c9a84c;"></i> <span style="font-size:0.7rem;">pasa el mouse</span></div>
                            </div>
                            <div class="flip-back">
                                <i class="fas fa-coins" style="font-size: 1.8rem; color:#c9a84c;"></i>
                                <ul>
                                    <li><i class="fas fa-check-circle"></i> Optimización del precio de alquiler</li>
                                    <li><i class="fas fa-check-circle"></i> Reducción de periodos sin arrendar</li>
                                    <li><i class="fas fa-check-circle"></i> Evaluación rigurosa de inquilinos</li>
                                    <li><i class="fas fa-check-circle"></i> Mayor estabilidad en los ingresos</li>
                                </ul>
                                <div style="margin-top: auto; background: rgba(255,255,255,0.08); border-radius: 30px; padding: 0.6rem; text-align: center;">
                                    <strong style="color:#e4c97e; font-size:0.85rem;">⬆ mayor rentabilidad del inmueble</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flip-card" data-aos="flip-left" data-aos-delay="200">
                        <div class="flip-inner">
                            <div class="flip-front">
                                <div class="icon-benefit"><i class="fas fa-feather-alt"></i></div>
                                <h3 style="font-size: 1.7rem; font-weight: 600;">No Económicos</h3>
                                <p style="color:#4b5563; margin-top: 0.4rem; font-size:0.9rem;">Tranquilidad + resguardo total</p>
                                <div style="margin-top: 0.8rem;"><i class="fas fa-magic"></i> <span style="font-size:0.7rem;">descubre la magia</span></div>
                            </div>
                            <div class="flip-back">
                                <i class="fas fa-shield-heart" style="font-size: 1.8rem; color:#c9a84c;"></i>
                                <ul>
                                    <li><i class="fas fa-check-circle"></i> Seguridad con respaldo profesional</li>
                                    <li><i class="fas fa-check-circle"></i> Alerta registral ante cambios inescrupulosos</li>
                                    <li><i class="fas fa-check-circle"></i> Control de morosidad y gestión de incidencias</li>
                                    <li><i class="fas fa-check-circle"></i> Gestión total en ausencia geográfica</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carrusel detallado -->
                <div class="carrusel-wrapper" data-aos="fade-up">
                    <div style="text-align: center; margin-bottom: 1.5rem;">
                        <span class="benefits-badge" style="background: #0a1a45; color: #e4c97e;"><i class="fas fa-infinity"></i> TRANQUILIDAD EN CADA DETALLE</span>
                        <h3 style="font-size: 1.5rem; font-family: 'Cormorant Garamond', serif;">Más que gestión: <em>experiencia premium</em></h3>
                    </div>
                    <div class="swiper benefit-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="glass-benefit-card">
                                    <div class="card-icon-big"><i class="fas fa-clipboard-list"></i></div>
                                    <h4>Supervisión profesional</h4>
                                    <p>Seguridad por respaldo profesional en la administración, con supervisión a diferentes niveles que garantizan el perfecto estado del inmueble.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="glass-benefit-card">
                                    <div class="card-icon-big"><i class="fas fa-file-registered"></i></div>
                                    <h4>Alerta registral</h4>
                                    <p>Tranquilidad por el seguimiento registral ante potenciales cambios de inescrupulosos. Protegemos tu patrimonio contra fraudes.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="glass-benefit-card">
                                    <div class="card-icon-big"><i class="fas fa-chart-line"></i></div>
                                    <h4>Control de morosidad</h4>
                                    <p>Control de la morosidad, seguimiento ante potenciales deterioros de la propiedad y gestión inmediata de incidencias.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="glass-benefit-card">
                                    <div class="card-icon-big"><i class="fas fa-globe-americas"></i></div>
                                    <h4>Ausencia geográfica</h4>
                                    <p>Gestión y rentabilización del inmueble aunque estés fuera del país. Tu propiedad bien cuidada y altamente rentable sin importar donde estés.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination" style="position: relative; margin-top: 15px;"></div>
                    </div>
                </div>

                <!-- Banner resultado final -->
                <div class="result-gold-banner" data-aos="zoom-in">
                    <div>
                        <h3><span>✦ Resultado ✦</span><br> Mayor rentabilidad del inmueble + tranquilidad absoluta</h3>
                        <p style="color: rgba(255,255,255,0.8); margin-top: 0.4rem; font-size:0.9rem;">Optimización del alquiler, reducción de vacancias, inquilinos evaluados y respaldo continuo.</p>
                    </div>
                    <div class="result-badge-gold">
                        <i class="fas fa-chart-simple"></i> +Rentabilidad sostenida
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section id="cta" data-aos="fade-up">
            <div class="section-wrap">
                <div class="cta-box">
                    <div class="cta-box-left">
                        <div class="cta-box-label">¿Listo para empezar?</div>
                        <h2 class="cta-box-title">Conversemos sobre<br><em>tu propiedad</em></h2>
                    </div>
                    <div class="cta-box-right">
                        <a href="{{ route('contacto') }}" class="btn-gold-solid">
                            <i class="far fa-paper-plane"></i>
                            Contáctanos
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('layouts.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inicializar AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Inicializar carrusel
        const swiper = new Swiper('.benefit-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
            speed: 700,
        });

        // Animación de contadores
        const counters = document.querySelectorAll('.count-num');
        const speed = 200;

        const animateCounters = () => {
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    const count = parseInt(counter.innerText);
                    const increment = Math.ceil(target / 50);
                    if (count < target) {
                        counter.innerText = count + increment;
                        setTimeout(updateCount, 30);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });
        };

        // Intersection Observer para contadores
        const counterSection = document.querySelector('.counter-grid');
        if (counterSection) {
            const observerCounter = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounters();
                        observerCounter.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            observerCounter.observe(counterSection);
        }
    </script>
</body>
</html>