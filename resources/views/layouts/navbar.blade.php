{{-- ============================================================
     resources/views/layouts/app.blade.php
     Layout principal — incluye el navbar
     ============================================================ --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'KBR KapitalHaus — Gestión Inmobiliaria de Élite')</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('img/logo.jpg') }}" />
    
    {{-- Font Awesome para íconos adicionales --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: #2d3436;
            overflow-x: hidden;
        }

        /* ---------- Hero Section ---------- */
        .hero {
            position: relative;
            min-height: 85vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
            overflow: hidden;
        }

        /* Imagen de fondo abstracta */
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=1600');
            background-size: cover;
            background-position: center;
            opacity: 0.15;
            animation: slowZoom 20s ease-in-out infinite;
        }

        @keyframes slowZoom {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .hero__content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 2rem;
            max-width: 900px;
        }

        .hero__badge {
            display: inline-block;
            background: rgba(201, 168, 76, 0.2);
            backdrop-filter: blur(10px);
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1px;
            color: var(--kh-gold, #c9a84c);
            margin-bottom: 1.5rem;
            border: 1px solid rgba(201, 168, 76, 0.3);
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 1rem;
            line-height: 1.2;
            text-shadow: 0 2px 20px rgba(0,0,0,0.3);
        }

        .hero__highlight {
            color: var(--kh-gold, #c9a84c);
            position: relative;
            display: inline-block;
        }

        .hero__highlight::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--kh-gold, #c9a84c), transparent);
        }

        .hero p {
            font-size: 1.3rem;
            color: rgba(255,255,255,0.9);
            margin-bottom: 2rem;
            line-height: 1.5;
        }

        .hero__btn {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            background: var(--kh-gold, #c9a84c);
            color: #1a1a2e;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        .hero__btn:hover {
            transform: translateY(-3px);
            background: var(--kh-gold-lt, #e8c97a);
            box-shadow: 0 8px 25px rgba(0,0,0,0.4);
        }

        /* ---------- Sección de Beneficios ---------- */
        .benefits {
            padding: 5rem 2rem;
            background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: #123489;
            margin-bottom: 3rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #c9a84c, #e8c97a);
            margin: 1rem auto 0;
            border-radius: 2px;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .benefit-card {
            background: white;
            border-radius: 20px;
            padding: 2rem 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid rgba(201,168,76,0.1);
            cursor: pointer;
        }

        .benefit-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            border-color: rgba(201,168,76,0.3);
        }

        .benefit-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, rgba(201,168,76,0.1), rgba(201,168,76,0.2));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.5rem;
            color: #c9a84c;
        }

        .benefit-card h3 {
            font-size: 1.5rem;
            color: #123489;
            margin-bottom: 1rem;
        }

        .benefit-card p {
            color: #636e72;
            line-height: 1.6;
        }

        /* ---------- CTA Banner ---------- */
        .cta-banner {
            background: linear-gradient(135deg, #123489 0%, #1a4a8a 100%);
            border-radius: 30px;
            padding: 3rem;
            margin: 3rem 0;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-banner::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(201,168,76,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .cta-banner h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .cta-banner p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .cta-banner .btn {
            background: var(--kh-gold, #c9a84c);
            color: #1a1a2e;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            display: inline-block;
            transition: all 0.3s;
            position: relative;
            z-index: 1;
        }

        .cta-banner .btn:hover {
            transform: scale(1.05);
            background: var(--kh-gold-lt, #e8c97a);
        }

        /* ---------- Servicios ---------- */
        .services {
            padding: 4rem 2rem;
            background: white;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .service-item {
            text-align: center;
            padding: 1.5rem;
            transition: all 0.3s;
        }

        .service-item i {
            font-size: 2.5rem;
            color: #c9a84c;
            margin-bottom: 1rem;
        }

        .service-item h4 {
            font-size: 1.1rem;
            color: #123489;
            margin-bottom: 0.5rem;
        }

        .service-item p {
            font-size: 0.9rem;
            color: #636e72;
        }

        /* ---------- Footer ---------- */
        footer {
            background: #0f2027;
            color: white;
            padding: 2rem;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .benefits-grid {
                grid-template-columns: 1fr;
            }
            
            .cta-banner {
                padding: 2rem;
            }
            
            .cta-banner h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    @include('layouts.navbar')

    {{-- Contenido principal --}}
    <main style="padding-top: 90px;">
        
        {{-- Hero Section --}}
        <section class="hero">
            <div class="hero__content">
                <div class="hero__badge">
                    <i class="fas fa-star" style="margin-right: 0.5rem;"></i>
                    Gestión Inmobiliaria Premium
                </div>
                <h1>
                    Maximizamos <span class="hero__highlight">ingresos</span>,<br>
                    reducimos <span class="hero__highlight">riesgos</span> y gestionamos<br>
                    <span class="hero__highlight">todo por ti</span>
                </h1>
                <p>Rentabilidad con tranquilidad — Tu propiedad, nuestro compromiso</p>
                <a href="#contacto" class="hero__btn">
                    <i class="fas fa-calendar-check"></i>
                    Cotiza Gratis
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>

        {{-- Beneficios principales --}}
        <section class="benefits">
            <div class="container">
                <h2 class="section-title">¿Por qué elegirnos?</h2>
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Maximizamos tu rentabilidad</h3>
                        <p>Optimizamos el valor de alquiler y reducimos tiempos de vacancia con estrategias probadas</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Cero estrés</h3>
                        <p>Nos encargamos de absolutamente todo: inquilinos, mantenimiento, cobranzas y legales</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3>Gestión profesional y completa</h3>
                        <p>Equipo especializado disponible 24/7 para resolver cualquier eventualidad</p>
                    </div>
                </div>

                {{-- CTA Banner --}}
                <div class="cta-banner">
                    <h2>
                        <i class="fas fa-home" style="margin-right: 0.5rem;"></i>
                        ¿Tienes una propiedad?
                    </h2>
                    <p>Nos encargamos de todo — desde la primera visita hasta la entrega de llaves</p>
                    <a href="#contacto" class="btn">
                        <i class="fas fa-handshake"></i>
                        Trabajemos juntos
                    </a>
                </div>
            </div>
        </section>

        {{-- Servicios adicionales --}}
        <section class="services">
            <div class="container">
                <h2 class="section-title">Servicios incluidos</h2>
                <div class="services-grid">
                    <div class="service-item">
                        <i class="fas fa-search"></i>
                        <h4>Selección de inquilinos</h4>
                        <p>Estudio crediticio y verificación de antecedentes</p>
                    </div>
                    <div class="service-item">
                        <i class="fas fa-file-signature"></i>
                        <h4>Contratos legales</h4>
                        <p>Documentación profesional y asesoría jurídica</p>
                    </div>
                    <div class="service-item">
                        <i class="fas fa-tools"></i>
                        <h4>Mantenimiento preventivo</h4>
                        <p>Inspecciones y reparaciones sin que te preocupes</p>
                    </div>
                    <div class="service-item">
                        <i class="fas fa-chart-pie"></i>
                        <h4>Reportes mensuales</h4>
                        <p>Dashboard con indicadores de rentabilidad</p>
                    </div>
                    <div class="service-item">
                        <i class="fas fa-gavel"></i>
                        <h4>Gestión de cobranzas</h4>
                        <p>Recaudación y depósito automático</p>
                    </div>
                    <div class="service-item">
                        <i class="fas fa-headset"></i>
                        <h4>Soporte 24/7</h4>
                        <p>Atención a inquilinos y propietarios</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Sección de contacto (placeholder) --}}
        <section id="contacto" style="padding: 4rem 2rem; background: #f8f9fa;">
            <div class="container" style="text-align: center;">
                <h2 class="section-title">¿Listo para maximizar tu inversión?</h2>
                <p style="font-size: 1.2rem; color: #636e72; margin-bottom: 2rem;">
                    Contáctanos hoy y descubre cómo podemos transformar tu propiedad en una fuente de ingresos pasivos
                </p>
                <a href="https://wa.me/51961666679" target="_blank" style="display: inline-flex; align-items: center; gap: 0.8rem; background: #25d366; color: white; padding: 1rem 2rem; border-radius: 50px; text-decoration: none; font-weight: 700;">
                    <i class="fab fa-whatsapp" style="font-size: 1.5rem;"></i>
                    Escríbenos por WhatsApp
                </a>
            </div>
        </section>

    </main>

    <footer>
        <p>&copy; 2024 KBR KapitalHaus — Gestión Inmobiliaria Profesional</p>
        <p style="margin-top: 0.5rem; font-size: 0.8rem; opacity: 0.7;">
            <i class="fas fa-shield-alt"></i> Tu tranquilidad es nuestra prioridad
        </p>
    </footer>

</body>
</html>