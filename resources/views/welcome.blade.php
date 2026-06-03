{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBR KapitalHaus — Gestión Inmobiliaria Profesional</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --navy:        #0a1a45;
            --navy-mid:    #0d2260;
            --navy-light:  #132863;
            --gold:        #c9a84c;
            --gold-light:  #e4c97e;
            --gold-dim:    rgba(201,168,76,0.12);
            --white:       #ffffff;
            --gray-light:  #f4f5f7;
            --text-mid:    #4a5568;
            --text-muted:  rgba(255,255,255,0.65);
        }

        html { scroll-behavior: smooth; }
        body { font-family: 'Outfit', sans-serif; background: var(--white); overflow-x: hidden; }

        @keyframes fade-up {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-in  { from { opacity: 0; } to { opacity: 1; } }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(201,168,76,0.4); }
            50%       { box-shadow: 0 0 0 15px rgba(201,168,76,0); }
        }
        @keyframes shine {
            0%   { background-position: -200% 0; }
            100% { background-position:  200% 0; }
        }
        @keyframes subtle-zoom {
            from { transform: scale(1.03); }
            to   { transform: scale(1.08); }
        }

        /* ═══════════════════════════════════
           HERO — imagen full, texto izquierda,
           tarjetas en la zona inferior
        ═══════════════════════════════════ */
        #inicio {
            position: relative;
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background-image: url('{{ asset("img/piscina.png") }}');
            background-size: cover;
            background-position: center 40%;
            animation: subtle-zoom 20s ease-in-out infinite alternate;
        }

        .hero-overlay-left {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to right,
                rgba(10,26,69,0.95) 0%,
                rgba(10,26,69,0.82) 32%,
                rgba(10,26,69,0.45) 58%,
                rgba(10,26,69,0.10) 78%,
                transparent 100%
            );
            z-index: 1;
        }

        .hero-overlay-bottom {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 52%;
            background: linear-gradient(
                to top,
                rgba(9,22,60,0.98) 0%,
                rgba(9,22,60,0.82) 30%,
                rgba(9,22,60,0.52) 55%,
                transparent 100%
            );
            z-index: 1;
        }

        .hero-overlay-top {
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 120px;
            background: linear-gradient(to bottom, rgba(10,26,69,0.55) 0%, transparent 100%);
            z-index: 1;
        }

        /* Texto — parte superior izquierda */
        .hero-content {
            position: relative;
            z-index: 10;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 0 2.5rem;
            padding-top: 200px;  /* Aumentado de 160px a 200px para bajar el texto */
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .hero-title {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(2rem, 4vw, 3.4rem);
            font-weight: 900;
            line-height: 1.08;
            color: var(--white);
            text-transform: uppercase;
            letter-spacing: -0.01em;
            opacity: 0;
            animation: fade-up 0.9s ease forwards 0.3s;
        }

        .hero-title .gold-line-text {
            color: var(--gold);
            display: block;
        }

        .hero-subtitle-script {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.05rem, 2vw, 1.45rem);
            font-weight: 400;
            font-style: italic;
            color: rgba(255,255,255,0.88);
            margin-top: 0.8rem;
            opacity: 0;
            animation: fade-up 0.9s ease forwards 0.5s;
        }

        .hero-subtitle-script em {
            color: var(--gold-light);
            font-style: italic;
        }

        /* ── ZONA TARJETAS — Rediseñada como en la imagen de referencia ── */
        .hero-cards-section {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem 4rem;
            margin-top: 60px;  /* Añadido margen superior para separar del texto */
        }

        /* Grid 4 columnas en desktop */
        .hero-cards-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .hero-card {
            background: rgba(9,22,60,0.75);
            border: 1px solid rgba(201,168,76,0.3);
            border-radius: 20px;
            padding: 2rem 1.5rem;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            transition: all 0.35s ease;
            text-align: left;  /* Cambiado de center a left para mejor legibilidad */
            opacity: 0;
            animation: fade-up 0.8s ease forwards;
        }

        .hero-card:nth-child(1) { animation-delay: 0.7s; }
        .hero-card:nth-child(2) { animation-delay: 0.9s; }
        .hero-card:nth-child(3) { animation-delay: 1.1s; }
        .hero-card:nth-child(4) { animation-delay: 1.3s; }

        .hero-card:hover {
            background: rgba(9,22,60,0.92);
            border-color: rgba(201,168,76,0.7);
            transform: translateY(-6px);
        }

        /* Estilo de los títulos como en la imagen de referencia */
        .hero-card h3 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--white);
            line-height: 1.3;
            margin-bottom: 0.75rem;
        }

        .hero-card h3 span {
            color: var(--gold);
            display: inline;  /* Cambiado de block a inline */
            font-weight: 700;
        }

        .hero-card .card-title-line {
            width: 40px;
            height: 3px;
            background: var(--gold);
            margin: 0.75rem 0 1rem;
            opacity: 0.6;
        }

        .hero-card p {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.7);
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* Ocultar SVG y usar solo texto como en la referencia */
        .hero-card .icon-svg {
            display: none;
        }

        /* Estilo adicional: número de orden */
        .hero-card .card-number {
            font-family: 'Cormorant Garamond', serif;
            font-size: 0.75rem;
            font-weight: 400;
            color: var(--gold);
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            display: block;
        }

        /* Swiper styles */
        .hero-cards-swiper-wrap { display: none; }

        .hero-cards-swiper { 
            overflow: hidden; 
            padding-bottom: 2.5rem !important; 
        }
        
        .hero-cards-swiper .hero-card { 
            opacity: 1; 
            animation: none; 
            text-align: left;
        }
        
        .hero-cards-swiper .swiper-pagination-bullet { 
            background: rgba(201,168,76,0.4); 
            opacity: 1; 
        }
        
        .hero-cards-swiper .swiper-pagination-bullet-active { 
            background: var(--gold); 
        }

        /* Botones de navegación */
        .hero-cards-nav {
            display: flex;
            justify-content: flex-end;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .hero-nav-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(201,168,76,0.4);
            color: var(--gold);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-nav-btn:hover {
            background: var(--gold);
            color: var(--navy);
            border-color: var(--gold);
        }

        /* ═══════════════════════════════════
           SECCIONES GLOBALES
        ═══════════════════════════════════ */
        .section-wrap {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2.5rem;
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            margin-bottom: 1rem;
            color: var(--gold);
        }

        .section-label::before {
            content: '';
            display: block;
            width: 28px;
            height: 1.5px;
            background: var(--gold);
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 300;
            line-height: 1.15;
            color: var(--navy);
        }

        .section-title em { font-style: italic; color: var(--gold); }
        .text-center { text-align: center; }

        /* ═══════════════════════════════════
           QUIÉNES SOMOS
        ═══════════════════════════════════ */
        #quienes-somos { padding: 7rem 0; background: var(--white); }

        .qs-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: center;
            margin-top: 2rem;
        }

        .qs-text p {
            font-size: 1rem;
            font-weight: 300;
            color: var(--text-mid);
            line-height: 1.85;
            margin-bottom: 1.5rem;
        }

        .qs-image {
            position: relative;
            border-radius: 4px;
            overflow: hidden;
            aspect-ratio: 4/5;
        }

        .qs-image img { width: 100%; height: 100%; object-fit: cover; display: block; }

        .qs-image-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(10,26,69,0.6) 0%, transparent 50%);
        }

        .btn-more {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: transparent;
            color: var(--gold);
            font-size: 0.9rem;
            font-weight: 500;
            padding: 12px 28px;
            border-radius: 40px;
            border: 1px solid var(--gold);
            text-decoration: none;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }

        .btn-more:hover {
            background: var(--gold);
            color: var(--navy);
            transform: translateX(5px);
        }

        /* ═══════════════════════════════════
           SERVICIOS
        ═══════════════════════════════════ */
        #servicios { background: var(--gray-light); padding: 7rem 0; }

        .servicios-resumen {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin: 3rem 0 2.5rem;
        }

        .service-card {
            background: var(--white);
            border-radius: 24px;
            padding: 2rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px -12px rgba(0,0,0,0.08);
            text-align: center;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -12px rgba(10,26,69,0.15);
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--gold-dim) 0%, rgba(201,168,76,0.05) 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 1.8rem;
            color: var(--gold);
            transition: all 0.3s ease;
        }

        .service-card:hover .service-icon { transform: scale(1.05); }

        .service-card h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--navy);
            margin-bottom: 0.75rem;
        }

        .service-card p {
            font-size: 0.9rem;
            color: var(--text-mid);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .service-link {
            color: var(--gold);
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: gap 0.3s ease;
        }

        .service-link:hover { gap: 12px; }

        .btn-outline-gold {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            color: var(--gold);
            font-size: 0.85rem;
            font-weight: 500;
            padding: 10px 24px;
            border-radius: 40px;
            border: 1px solid var(--gold);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-outline-gold:hover {
            background: var(--gold);
            color: var(--navy);
            transform: translateY(-2px);
        }

        /* ═══════════════════════════════════
           BENEFICIOS
        ═══════════════════════════════════ */
        #beneficios {
            padding: 7rem 0;
            background: linear-gradient(135deg, #fefcf7 0%, #ffffff 100%);
            position: relative;
            overflow: hidden;
        }

        .benefits-header { text-align: center; margin-bottom: 3.5rem; }

        .benefits-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, rgba(201,168,76,0.15) 0%, rgba(201,168,76,0.05) 100%);
            padding: 0.5rem 1.5rem;
            border-radius: 60px;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #b88b2c;
            margin-bottom: 1.5rem;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(201,168,76,0.2);
        }

        .counter-grid {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin: 3rem 0 4rem;
            flex-wrap: wrap;
        }

        .counter-item {
            text-align: center;
            padding: 1.5rem 2rem;
            background: rgba(201,168,76,0.05);
            border-radius: 24px;
            min-width: 160px;
            border: 1px solid rgba(201,168,76,0.1);
            transition: all 0.3s ease;
        }

        .counter-item:hover {
            transform: translateY(-5px);
            background: rgba(201,168,76,0.1);
            border-color: rgba(201,168,76,0.3);
        }

        .counter-number {
            font-size: 2.8rem;
            font-weight: 700;
            color: #c9a84c;
            font-family: 'Cormorant Garamond', serif;
        }

        .counter-label { font-size: 0.8rem; color: #5a6e7c; letter-spacing: 1px; }

        .flip-row {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
            margin-bottom: 5rem;
        }

        .flip-card {
            background: transparent;
            width: 320px;
            height: 440px;
            perspective: 1500px;
            cursor: pointer;
        }

        .flip-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.7s cubic-bezier(0.23, 1, 0.32, 1);
            transform-style: preserve-3d;
            border-radius: 28px;
        }

        .flip-card:hover .flip-inner { transform: rotateY(180deg); }

        .flip-front, .flip-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 28px;
            padding: 2rem 1.8rem;
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

        .icon-benefit {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(201,168,76,0.15) 0%, rgba(201,168,76,0.05) 100%);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.2rem;
            color: #c9a84c;
        }

        .flip-back {
            background: linear-gradient(135deg, #0a1a45 0%, #102559 100%);
            color: white;
            transform: rotateY(180deg);
            text-align: left;
            justify-content: flex-start;
            gap: 0.8rem;
        }

        .flip-back ul { list-style: none; margin-top: 1rem; }

        .flip-back li {
            margin-bottom: 0.9rem;
            font-size: 0.85rem;
            display: flex;
            gap: 12px;
            align-items: center;
            line-height: 1.4;
        }

        .flip-back li i { color: #c9a84c; font-size: 0.8rem; flex-shrink: 0; }

        .benefit-swiper { overflow: hidden; padding: 1rem 0.5rem; }

        .glass-benefit-card {
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(12px);
            border-radius: 28px;
            padding: 2rem;
            height: 100%;
            transition: all 0.4s ease;
            border: 1px solid rgba(201,168,76,0.2);
        }

        .glass-benefit-card:hover {
            transform: translateY(-10px);
            border-color: rgba(201,168,76,0.6);
        }

        .card-icon-big { font-size: 2.5rem; color: #c9a84c; margin-bottom: 1.2rem; }

        .glass-benefit-card h4 {
            font-size: 1.4rem;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            color: #0a1a45;
            margin-bottom: 0.8rem;
        }

        .glass-benefit-card p { color: #374151; line-height: 1.6; font-size: 0.9rem; }

        .result-gold-banner {
            background: linear-gradient(115deg, #0a1a45 0%, #102559 100%);
            border-radius: 40px;
            padding: 2.5rem;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            margin-top: 3rem;
            position: relative;
            overflow: hidden;
            animation: pulse-glow 3s infinite;
        }

        .result-gold-banner::before {
            content: '';
            position: absolute;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: linear-gradient(45deg, transparent, rgba(201,168,76,0.08), transparent);
            transform: rotate(45deg);
            animation: shine 8s infinite linear;
        }

        .result-gold-banner h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.7rem;
            color: white;
            margin-bottom: 0.5rem;
        }

        .result-gold-banner span { color: #e4c97e; }

        .result-badge-gold {
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(8px);
            padding: 0.8rem 1.8rem;
            border-radius: 60px;
            font-weight: 600;
            border: 1px solid rgba(201,168,76,0.3);
            color: white;
        }

        /* ═══════════════════════════════════
           CONTACTO
        ═══════════════════════════════════ */
        #contacto { background: var(--gray-light); padding: 7rem 0; }

        .contacto-resumen {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-top: 2rem;
        }

        .contact-info {
            background: var(--white);
            border-radius: 28px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.1);
        }

        .contact-info h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            font-weight: 500;
            color: var(--navy);
            margin-bottom: 1rem;
        }

        .contact-detail-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(10,26,69,0.08);
        }

        .contact-detail-item i {
            width: 40px;
            height: 40px;
            background: var(--gold-dim);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gold);
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .contact-detail-item p,
        .contact-detail-item a {
            color: var(--text-mid);
            text-decoration: none;
            font-size: 0.95rem;
        }

        .contact-detail-item a:hover { color: var(--gold); }

        .contact-form-resumen {
            background: var(--white);
            border-radius: 28px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.1);
        }

        .contact-form-resumen h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            font-weight: 500;
            color: var(--navy);
            margin-bottom: 1.5rem;
        }

        .form-group { margin-bottom: 1rem; }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.9rem 1.2rem;
            border: 1.5px solid rgba(10,26,69,0.1);
            border-radius: 16px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201,168,76,0.15);
        }

        .form-group textarea { resize: vertical; min-height: 90px; }

        .btn-submit {
            width: 100%;
            background: var(--navy);
            color: var(--white);
            padding: 0.9rem;
            border: none;
            border-radius: 60px;
            font-size: 0.9rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: var(--gold);
            color: var(--navy);
            transform: translateY(-2px);
        }

        .contact-footer-link { text-align: center; margin-top: 2rem; }

        /* ═══════════════════════════════════
           RESPONSIVE
        ═══════════════════════════════════ */
        @media (max-width: 1024px) {
            .hero-cards-section { margin-top: 40px; }
            .hero-cards-grid { gap: 1rem; }
            .hero-card { padding: 1.5rem 1.2rem; }
            .hero-card h3 { font-size: 1rem; }
        }

        @media (max-width: 768px) {
            .hero-content { padding-top: 140px; }
            .hero-title { font-size: clamp(1.5rem, 5vw, 2.2rem); }
            .hero-cards-section { margin-top: 30px; padding: 0 1.5rem 3rem; }
            .hero-cards-grid { display: none; }
            .hero-cards-swiper-wrap { display: block; }
            .hero-cards-swiper { display: block; }
            .hero-cards-nav { display: none; }
            .qs-grid, .contacto-resumen { grid-template-columns: 1fr; gap: 2rem; }
            .servicios-resumen { grid-template-columns: 1fr; max-width: 400px; margin-left: auto; margin-right: auto; }
            .flip-card { width: 300px; height: 420px; }
            .counter-grid { gap: 1rem; }
        }

        @media (max-width: 560px) {
            .section-wrap, .hero-content { padding-left: 1.5rem; padding-right: 1.5rem; }
            .result-gold-banner { flex-direction: column; text-align: center; gap: 1rem; }
            .hero-cards-section { margin-top: 20px; }
        }
    </style>
</head>
<body>

    @include('layouts.navbar')

    <main>

        {{-- HERO --}}
        <section id="inicio">

            <div class="hero-bg"></div>
            <div class="hero-overlay-left"></div>
            <div class="hero-overlay-bottom"></div>
            <div class="hero-overlay-top"></div>

            <div class="hero-content">
                <h1 class="hero-title">
                    Gestión Integral<br>de
                    <span class="gold-line-text">Propiedades</span>
                </h1>
                <p class="hero-subtitle-script">
                    Administramos tu propiedad de
                    <em>principio a fin</em>
                </p>
            </div>

            {{-- TARJETAS — Diseño como en la imagen de referencia --}}
            <div class="hero-cards-section">
                
                <!-- Botones de navegación (visibles solo en desktop con grid) -->
                <div class="hero-cards-nav">
                    <button class="hero-nav-btn hero-prev" aria-label="Anterior">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="hero-nav-btn hero-next" aria-label="Siguiente">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>

                <!-- Grid para desktop -->
                <div class="hero-cards-grid">
                    <div class="hero-card">
                        <span class="card-number">01</span>
                        <h3>Captamos al <span>inquilino ideal</span></h3>
                        <div class="card-title-line"></div>
                        <p>Seleccionamos inquilinos responsables luego de una evaluación de capacidad de pago, record crediticio y referencias.</p>
                    </div>
                    <div class="hero-card">
                        <span class="card-number">02</span>
                        <h3>Administramos <span>tu alquiler</span></h3>
                        <div class="card-title-line"></div>
                        <p>Nos encargamos de contratos, cobranzas, pago de impuestos (Sunat, predios y arbitrios).</p>
                    </div>
                    <div class="hero-card">
                        <span class="card-number">03</span>
                        <h3>Protegemos <span>tu inmueble</span></h3>
                        <div class="card-title-line"></div>
                        <p>Supervisamos mantenimientos, gestión de incidencias y seguimiento de alerta registral.</p>
                    </div>
                    <div class="hero-card">
                        <span class="card-number">04</span>
                        <h3>Garantizamos <span>continuidad de renta</span></h3>
                        <div class="card-title-line"></div>
                        <p>Minimizamos la vacancia recolocando inquilinos muy rápido.</p>
                    </div>
                </div>

                <!-- Swiper para mobile -->
                <div class="swiper hero-cards-swiper hero-cards-swiper-wrap">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="hero-card">
                                <span class="card-number">01</span>
                                <h3>Captamos al <span>inquilino ideal</span></h3>
                                <div class="card-title-line"></div>
                                <p>Seleccionamos inquilinos responsables luego de una evaluación de capacidad de pago, record crediticio y referencias.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-card">
                                <span class="card-number">02</span>
                                <h3>Administramos <span>tu alquiler</span></h3>
                                <div class="card-title-line"></div>
                                <p>Nos encargamos de contratos, cobranzas, pago de impuestos (Sunat, predios y arbitrios).</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-card">
                                <span class="card-number">03</span>
                                <h3>Protegemos <span>tu inmueble</span></h3>
                                <div class="card-title-line"></div>
                                <p>Supervisamos mantenimientos, gestión de incidencias y seguimiento de alerta registral.</p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-card">
                                <span class="card-number">04</span>
                                <h3>Garantizamos <span>continuidad de renta</span></h3>
                                <div class="card-title-line"></div>
                                <p>Minimizamos la vacancia recolocando inquilinos muy rápido.</p>
                            </div>
                        </div>
                    </div>
                    <div class="hero-cards-pagination swiper-pagination" style="margin-top: 1rem;"></div>
                </div>
            </div>

        </section>

        {{-- QUIÉNES SOMOS --}}
        <section id="quienes-somos" data-aos="fade-up">
            <div class="section-wrap">
                <div class="section-label">Quiénes somos</div>
                <div class="qs-grid">
                    <div class="qs-text">
                        <h2 class="section-title">Kapital House <em>gestión inmobiliaria &amp; bienes raíces</em></h2>
                        <p>
                            Somos profesionales especializados en la gestión de inversiones inmobiliarias,
                            administración de inmuebles y bienes raíces. Brindamos un servicio orientado a
                            maximizar el rendimiento de los activos inmobiliarios de nuestros clientes.
                        </p>
                        <p>
                            Nuestro enfoque combina la gestión inmobiliaria con el análisis financiero,
                            tratando cada propiedad como un activo patrimonial que debe administrarse
                            de manera eficiente, responsable y estratégica.
                        </p>
                        <a href="{{ url('/nosotros') }}" class="btn-more">
                            Conocer más <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="qs-image">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&auto=format&fit=crop&q=80" alt="Edificio moderno">
                        <div class="qs-image-overlay"></div>
                    </div>
                </div>
            </div>
        </section>

        {{-- SERVICIOS --}}
        <section id="servicios" data-aos="fade-up">
            <div class="section-wrap">
                <div class="section-label">Nuestros servicios</div>
                <h2 class="section-title">Soluciones <em>integrales</em> para tu propiedad</h2>

                <div class="servicios-resumen">
                    <div class="service-card">
                        <div class="service-icon"><i class="fa-solid fa-user-tie"></i></div>
                        <h3>Corretaje</h3>
                        <p>Buscamos el inquilino adecuado mediante un proceso de evaluación que reduce riesgos y asegura estabilidad.</p>
                        <a href="{{ url('/servicios') }}" class="service-link">Ver más <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card">
                        <div class="service-icon"><i class="fa-solid fa-building-columns"></i></div>
                        <h3>Administración</h3>
                        <p>Gestionamos todos los aspectos operativos, legales y financieros de tu propiedad sin que te preocupes por nada.</p>
                        <a href="{{ url('/servicios') }}" class="service-link">Ver más <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="service-card">
                        <div class="service-icon"><i class="fa-solid fa-chart-line"></i></div>
                        <h3>Asesoría</h3>
                        <p>Te ayudamos a tomar mejores decisiones sobre tus activos inmobiliarios con análisis de mercado y rentabilidad.</p>
                        <a href="{{ url('/servicios') }}" class="service-link">Ver más <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="text-center">
                    <a href="{{ url('/servicios') }}" class="btn-outline-gold">
                        Ver todos los servicios <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        {{-- BENEFICIOS --}}
        <section id="beneficios" data-aos="fade-up">
            <div class="section-wrap">
                <div class="benefits-header">
                    <div class="benefits-badge"><i class="fas fa-crown"></i> EXCLUSIVO · VALOR AGREGADO</div>
                    <h2 class="section-title" style="color:var(--navy);">Beneficios <em>para el Propietario</em></h2>
                    <p style="color: #5a6e7c; max-width: 580px; margin: 1rem auto 0;">Rentabilidad, seguridad y total tranquilidad, todo en un solo lugar.</p>
                </div>

                <div class="counter-grid">
                    <div class="counter-item"><div class="counter-number"><span class="count-num" data-target="35">0</span>+</div><div class="counter-label">Propiedades gestionadas</div></div>
                    <div class="counter-item"><div class="counter-number"><span class="count-num" data-target="98">0</span>%</div><div class="counter-label">Ocupación garantizada</div></div>
                    <div class="counter-item"><div class="counter-number"><span class="count-num" data-target="24">0</span>/7</div><div class="counter-label">Alertas registrales</div></div>
                </div>

                <div class="flip-row">
                    <div class="flip-card" data-aos="flip-left" data-aos-delay="100">
                        <div class="flip-inner">
                            <div class="flip-front"><div class="icon-benefit"><i class="fas fa-chart-line"></i></div><h3 style="font-size: 1.7rem;">Económicos</h3><p style="color:#4b5563;">Mayor rentabilidad garantizada</p><div style="margin-top: 1rem;"><i class="fas fa-arrow-right" style="color:#c9a84c;"></i> <span style="font-size:0.7rem;">pasa el mouse</span></div></div>
                            <div class="flip-back"><i class="fas fa-coins" style="font-size: 2rem; color:#c9a84c;"></i><ul><li><i class="fas fa-check-circle"></i> Optimización del precio de alquiler</li><li><i class="fas fa-check-circle"></i> Reducción de periodos sin arrendar</li><li><i class="fas fa-check-circle"></i> Evaluación rigurosa de inquilinos</li><li><i class="fas fa-check-circle"></i> Mayor estabilidad en los ingresos</li></ul><div style="margin-top: auto; background: rgba(255,255,255,0.08); border-radius: 30px; padding: 0.7rem; text-align: center;"><strong style="color:#e4c97e;">⬆ mayor rentabilidad</strong></div></div>
                        </div>
                    </div>
                    <div class="flip-card" data-aos="flip-left" data-aos-delay="200">
                        <div class="flip-inner">
                            <div class="flip-front"><div class="icon-benefit"><i class="fas fa-feather-alt"></i></div><h3 style="font-size: 1.7rem;">No Económicos</h3><p style="color:#4b5563;">Tranquilidad + resguardo</p><div style="margin-top: 1rem;"><i class="fas fa-magic"></i> <span style="font-size:0.7rem;">descubre</span></div></div>
                            <div class="flip-back"><i class="fas fa-shield-heart" style="font-size: 2rem; color:#c9a84c;"></i><ul><li><i class="fas fa-check-circle"></i> Seguridad con respaldo profesional</li><li><i class="fas fa-check-circle"></i> Alerta registral anti-fraude</li><li><i class="fas fa-check-circle"></i> Control de morosidad</li><li><i class="fas fa-check-circle"></i> Gestión en ausencia geográfica</li></ul></div>
                        </div>
                    </div>
                </div>

                <div class="carrusel-wrapper">
                    <div style="text-align: center; margin-bottom: 2rem;"><span class="benefits-badge" style="background: #0a1a45; color: #e4c97e;"><i class="fas fa-infinity"></i> TRANQUILIDAD EN CADA DETALLE</span><h3 style="font-size: 1.5rem; font-family: 'Cormorant Garamond', serif;">Más que gestión: <em>experiencia premium</em></h3></div>
                    <div class="swiper benefit-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><div class="glass-benefit-card"><div class="card-icon-big"><i class="fas fa-clipboard-list"></i></div><h4>Supervisión profesional</h4><p>Seguridad por respaldo profesional en la administración, con supervisión a diferentes niveles.</p></div></div>
                            <div class="swiper-slide"><div class="glass-benefit-card"><div class="card-icon-big"><i class="fas fa-file-alt"></i></div><h4>Alerta registral</h4><p>Protegemos tu patrimonio contra fraudes con monitoreo constante ante cambios inescrupulosos.</p></div></div>
                            <div class="swiper-slide"><div class="glass-benefit-card"><div class="card-icon-big"><i class="fas fa-chart-line"></i></div><h4>Control de morosidad</h4><p>Seguimiento ante potenciales deterioros de la propiedad y gestión inmediata de incidencias.</p></div></div>
                            <div class="swiper-slide"><div class="glass-benefit-card"><div class="card-icon-big"><i class="fas fa-globe-americas"></i></div><h4>Ausencia geográfica</h4><p>Tu propiedad bien cuidada y rentable sin importar donde estés.</p></div></div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination" style="position: relative; margin-top: 20px;"></div>
                    </div>
                </div>

                <div class="result-gold-banner" data-aos="zoom-in">
                    <div><h3><span>✦ Resultado ✦</span><br> Mayor rentabilidad + tranquilidad absoluta</h3><p style="color: rgba(255,255,255,0.8); margin-top: 0.3rem;">Optimización del alquiler, reducción de vacancias, inquilinos evaluados.</p></div>
                    <div class="result-badge-gold"><i class="fas fa-chart-simple"></i> +Rentabilidad sostenida</div>
                </div>
            </div>
        </section>

        {{-- CONTACTO --}}
        <section id="contacto" data-aos="fade-up">
            <div class="section-wrap">
                <div class="section-label">Contacto</div>
                <h2 class="section-title">Conversemos sobre <em>tu propiedad</em></h2>

                <div class="contacto-resumen">
                    <div class="contact-info">
                        <h3>¿Listo para <em style="color: var(--gold);">transformar</em> tu propiedad?</h3>
                        <p style="color: var(--text-mid); margin-bottom: 1.5rem;">Estamos aquí para ayudarte a maximizar la rentabilidad de tu inversión inmobiliaria.</p>
                        <div class="contact-detail-item"><i class="fab fa-whatsapp"></i><a href="https://wa.me/51961666679" target="_blank">+51 961 666 679</a></div>
                        <div class="contact-detail-item"><i class="far fa-envelope"></i><a href="mailto:contacto@kapitalhaus.com">contacto@kapitalhaus.com</a></div>
                        <div class="contact-detail-item"><i class="far fa-clock"></i><p>Lun a Vie: 9:00 - 19:00 | Sáb: 10:00 - 14:00</p></div>
                    </div>

                    <div class="contact-form-resumen">
                        <h3>Envíanos un <em style="color: var(--gold);">mensaje</em></h3>
                        <form id="contactForm" action="#" method="POST">
                            @csrf
                            <div class="form-group"><input type="text" name="nombre" placeholder="Nombre completo *" required></div>
                            <div class="form-group"><input type="email" name="email" placeholder="Correo electrónico *" required></div>
                            <div class="form-group"><input type="tel" name="telefono" placeholder="Teléfono / WhatsApp"></div>
                            <div class="form-group"><textarea name="mensaje" placeholder="Cuéntanos sobre tu propiedad..."></textarea></div>
                            <button type="submit" class="btn-submit"><i class="far fa-paper-plane"></i> Enviar mensaje</button>
                        </form>
                    </div>
                </div>

                <div class="contact-footer-link">
                    <a href="{{ url('/contacto') }}" class="btn-outline-gold">
                        Ir a página de contacto <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

    </main>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true, offset: 100 });

        // ── Swiper tarjetas hero ──
        new Swiper('.hero-cards-swiper', {
            slidesPerView: 1,
            spaceBetween: 16,
            loop: false,
            navigation: {
                nextEl: '.hero-next',
                prevEl: '.hero-prev',
            },
            pagination: {
                el: '.hero-cards-pagination',
                clickable: true,
            },
            breakpoints: {
                560:  { slidesPerView: 2, spaceBetween: 16 },
                900:  { slidesPerView: 3, spaceBetween: 20 },
                1100: { slidesPerView: 4, spaceBetween: 20 },
            }
        });

        // ── Swiper beneficios ──
        new Swiper('.benefit-swiper', {
            slidesPerView: 1, spaceBetween: 24, loop: true,
            autoplay: { delay: 4500, disableOnInteraction: false, pauseOnMouseEnter: true },
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
            pagination: { el: '.swiper-pagination', clickable: true },
            breakpoints: { 640: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
        });

        // ── Contadores ──
        const counters = document.querySelectorAll('.count-num');
        const animateCounters = () => {
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = parseInt(counter.dataset.target);
                    const count  = parseInt(counter.innerText);
                    const inc    = Math.ceil(target / 50);
                    if (count < target) { counter.innerText = count + inc; setTimeout(updateCount, 30); }
                    else { counter.innerText = target; }
                };
                updateCount();
            });
        };

        const counterSection = document.querySelector('.counter-grid');
        if (counterSection) {
            new IntersectionObserver((entries) => {
                entries.forEach(e => { if (e.isIntersecting) { animateCounters(); } });
            }, { threshold: 0.5 }).observe(counterSection);
        }

        // ── Formulario ──
        document.getElementById('contactForm')?.addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = this.querySelector('.btn-submit');
            const orig = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
            btn.disabled = true;
            setTimeout(() => {
                alert('¡Mensaje enviado con éxito! Te contactaremos pronto.');
                this.reset();
                btn.innerHTML = orig;
                btn.disabled = false;
            }, 1500);
        });
    </script>
</body>
</html>