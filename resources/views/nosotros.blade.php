{{-- resources/views/nosotros.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiénes Somos — KBR KapitalHaus</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo_redondo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing:border-box; margin:0; padding:0; }
        
        :root {
            --navy:       #0a1a45;
            --gold:       #c9a84c;
            --gold-light: #e4c97e;
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
            padding-top: 152px; /* Para evitar que el contenido quede detrás de la navbar */
        }

        @media (min-width: 1000px) {
            body { padding-top: 110px; }
        }

        /* ─── PAGE HERO ─── */
        .page-hero {
            position:relative;
            background:var(--navy);
            padding: 6rem 0 4rem;
            overflow:hidden;
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

        .page-hero-content { 
            position:relative; 
            z-index:1; 
            max-width:1200px; 
            margin:0 auto; 
            padding:0 2.5rem; 
        }
        .page-hero-label {
            display:inline-flex; align-items:center; gap:10px;
            font-size:.85rem; font-weight:500; letter-spacing:.2em; text-transform:uppercase;
            color:var(--gold); margin-bottom:0.8rem;
        }
        .page-hero-label::before { content:''; display:block; width:28px; height:1.5px; background:var(--gold); }

        .page-hero-title {
            font-family:'Cormorant Garamond',serif;
            font-size:clamp(2.5rem,5vw,4rem); 
            font-weight:300; 
            color:var(--white); 
            line-height:1.1;
        }
        .page-hero-title em { font-style:italic; color:var(--gold-light); }

        /* ─── SECTION BASE ─── */
        .section-wrap { 
            max-width:1200px; 
            margin:0 auto; 
            padding:0 2.5rem; 
        }
        .section-label {
            display:inline-flex; 
            align-items:center; 
            gap:10px;
            font-size:.7rem; 
            font-weight:500; 
            letter-spacing:.2em; 
            text-transform:uppercase; 
            margin-bottom:0.6rem;
            color: var(--gold);
        }
        .section-label::before { 
            content:''; 
            display:block; 
            width:28px; 
            height:1.5px; 
            background:var(--gold); 
        }
        .section-title { 
            font-family:'Cormorant Garamond',serif; 
            font-size:clamp(1.8rem,3.5vw,2.8rem); 
            font-weight:300; 
            line-height:1.15; 
        }
        .section-title em { font-style:italic; color:var(--gold); }

        /* ─── QUIÉNES SOMOS ─── */
        #quienes { 
            background:var(--white); 
            padding: 3.5rem 0 4rem; 
        }
        .qs-grid { 
            display:grid; 
            grid-template-columns:1fr 1fr; 
            gap: 4rem; 
            align-items:center; 
            margin-top: 1.5rem; 
        }
        .qs-text .section-label { 
            color:var(--gold); 
            margin-bottom: 0.6rem;
        }
        .qs-text .section-title { 
            color:var(--navy); 
            margin-bottom: 1.2rem; 
        }
        .qs-text p { 
            font-size:0.95rem; 
            font-weight:300; 
            color:var(--text-mid); 
            line-height:1.8; 
            margin-bottom: 0.8rem; 
        }
        .qs-text p:last-child { 
            margin-bottom: 0; 
        }

        .qs-image {
            position:relative; 
            border-radius: 12px; 
            overflow:hidden;
            aspect-ratio:4/5;
            box-shadow: 0 20px 60px rgba(10,26,69,.15);
        }
        .qs-image img { 
            width:100%; 
            height:100%; 
            object-fit:cover; 
            display:block; 
        }
        .qs-image-overlay {
            position:absolute; 
            inset:0;
            background:linear-gradient(to top, rgba(10,26,69,.7) 0%, transparent 50%);
        }
        .qs-image-tag {
            position:absolute; 
            bottom: 1.5rem; 
            left: 1.5rem; 
            right: 1.5rem;
            background:rgba(10,26,69,.85); 
            backdrop-filter:blur(10px);
            border:1px solid rgba(201,168,76,.25); 
            border-radius: 10px;
            padding: 1rem 1.5rem;
        }
        .qs-image-tag p { 
            font-size:.85rem; 
            font-style:italic; 
            color:var(--gold-light); 
            line-height:1.5; 
            margin-bottom: 0.1rem;
        }
        .qs-image-tag small { 
            font-size:.7rem; 
            color:rgba(255,255,255,.5); 
            margin-top:0.1rem; 
            display:block; 
            letter-spacing: .5px;
        }

        /* ─── MISIÓN VISIÓN VALORES ─── */
        #mvv { 
            background:var(--gray-light); 
            padding: 3.5rem 0 4rem; 
        }
        #mvv .section-label { 
            color:var(--gold); 
            margin-bottom: 0.6rem;
        }
        #mvv .section-title { 
            color:var(--navy); 
            margin-bottom: 2rem; 
        }

        .mvv-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .mvv-card {
            background:var(--white); 
            padding: 2rem 2rem 2.2rem;
            border-radius: 14px;
            position:relative; 
            overflow:hidden;
            transition: box-shadow .3s ease, transform .3s ease;
            box-shadow: 0 4px 20px rgba(10,26,69,.06);
        }
        .mvv-card:hover { 
            box-shadow: 0 12px 50px rgba(10,26,69,.12);
            transform: translateY(-4px);
        }
        .mvv-card::before {
            content:''; 
            position:absolute; 
            top:0; 
            left:0; 
            right:0; 
            height:3px;
            background:linear-gradient(90deg, var(--gold), var(--gold-light));
        }
        .mvv-card-icon { 
            font-size: 1.8rem; 
            color:var(--gold); 
            margin-bottom: 0.8rem; 
            display: block;
        }
        .mvv-card-title { 
            font-family:'Cormorant Garamond',serif; 
            font-size: 1.5rem; 
            font-weight:600; 
            color:var(--navy); 
            margin-bottom: 0.6rem; 
        }
        .mvv-card-text { 
            font-size:.9rem; 
            font-weight:300; 
            color:var(--text-mid); 
            line-height:1.8; 
        }

        /* ─── VALORES ─── */
        .mvv-valores { 
            background:var(--navy); 
            padding: 2.5rem 2.5rem;
            border-radius: 14px;
            margin-top: 0;
        }
        .mvv-valores-title { 
            font-family:'Cormorant Garamond',serif; 
            font-size: 1.6rem; 
            font-weight:600; 
            color:var(--white); 
            margin-bottom: 1.8rem; 
        }
        .valores-grid { 
            display:grid; 
            grid-template-columns: repeat(5,1fr); 
            gap: 1.2rem; 
        }
        .valor-item { 
            display:flex; 
            flex-direction:column; 
            align-items:flex-start; 
            gap: .5rem; 
            padding: 0.9rem 1rem;
            background: rgba(255,255,255,.04);
            border-radius: 10px;
            border: 1px solid rgba(255,255,255,.06);
            transition: all .3s ease;
        }
        .valor-item:hover {
            background: rgba(201,168,76,.08);
            border-color: rgba(201,168,76,.2);
            transform: translateY(-3px);
        }
        .valor-icon { 
            width: 34px; 
            height: 34px; 
            border-radius: 8px; 
            background: rgba(201,168,76,.15); 
            display:flex; 
            align-items:center; 
            justify-content:center; 
            color:var(--gold-light); 
            font-size: 0.85rem; 
            flex-shrink: 0;
        }
        .valor-name { 
            font-size:.82rem; 
            font-weight:700; 
            color:var(--white); 
            letter-spacing: .3px;
        }
        .valor-desc { 
            font-size:.7rem; 
            color:var(--text-muted); 
            line-height:1.5; 
            font-weight:300;
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 1024px) {
            .valores-grid { 
                grid-template-columns: repeat(3,1fr); 
            }
        }

        @media (max-width: 900px) {
            .qs-grid { 
                grid-template-columns:1fr; 
                gap: 2rem;
            }
            .mvv-grid { 
                grid-template-columns:1fr; 
                gap: 1.2rem;
            }
            .valores-grid { 
                grid-template-columns: repeat(2,1fr); 
                gap: 0.8rem;
            }
            .mvv-valores {
                padding: 1.8rem 1.5rem;
            }
        }

        @media (max-width: 600px) {
            body { padding-top: 152px; }
            
            .section-wrap { 
                padding:0 1.2rem; 
            }
            .page-hero-content { 
                padding:0 1.2rem; 
            }
            .page-hero { 
                padding: 2.5rem 0 2.5rem; /* Reducido */
            }
            .valores-grid { 
                grid-template-columns:1fr; 
                gap: 0.6rem;
            }
            .page-hero-circle { 
                display:none; 
            }
            .mvv-card {
                padding: 1.3rem 1.2rem 1.5rem;
            }
            .mvv-valores {
                padding: 1.3rem 1rem;
            }
            .qs-image-tag {
                bottom: 0.8rem;
                left: 0.8rem;
                right: 0.8rem;
                padding: 0.7rem 1rem;
            }
            .qs-image-tag p {
                font-size: .75rem;
            }
            .qs-image-tag small {
                font-size: .6rem;
            }
            .valor-item {
                padding: 0.7rem 0.9rem;
            }
            #quienes { padding: 2rem 0 2.5rem; }
            #mvv { padding: 2rem 0 2.5rem; }
            
            /* Ajustes específicos para móvil */
            .qs-text .section-title { 
                margin-bottom: 1rem; 
            }
            .qs-text p { 
                margin-bottom: 0.6rem; 
            }
            .mvv-card-title { 
                margin-bottom: 0.4rem; 
            }
            .mvv-card-icon { 
                margin-bottom: 0.5rem; 
            }
            .mvv-valores-title { 
                margin-bottom: 1.2rem; 
            }
            #mvv .section-title { 
                margin-bottom: 1.5rem; 
            }
            .qs-grid { 
                gap: 1.5rem; 
                margin-top: 1rem;
            }
        }

        @media (max-width: 480px) {
            .page-hero {
                padding: 2rem 0 2rem; /* Aún más reducido en pantallas muy pequeñas */
            }
            .page-hero-title {
                font-size: clamp(1.8rem, 8vw, 2.2rem);
            }
            #quienes {
                padding: 1.8rem 0 2rem;
            }
            #mvv {
                padding: 1.8rem 0 2rem;
            }
            .qs-grid {
                gap: 1.2rem;
            }
            .mvv-card {
                padding: 1rem 0.9rem 1.2rem;
            }
            .mvv-card-title {
                font-size: 1.1rem;
            }
            .mvv-card-text {
                font-size: .8rem;
            }
            .mvv-card-icon { font-size: 1.4rem; }
            .qs-text p { 
                font-size: .88rem; 
                line-height: 1.7;
            }
            .section-title { 
                font-size: clamp(1.5rem, 7vw, 1.8rem); 
            }
        }
    </style>
</head>
<body>

    @include('layouts.navbar')

    {{-- ════════════════════════════════════════════════════════════ --}}
    {{--  PAGE HERO                                                --}}
    {{-- ════════════════════════════════════════════════════════════ --}}
    <section class="page-hero">
        <div class="page-hero-pattern"></div>
        <div class="page-hero-circle"></div>
        <div class="gold-line"></div>
        <div class="page-hero-content">
            <div class="page-hero-label">KAPITAL HOUSE</div>
            <h1 class="page-hero-title">
                Profesionales al servicio<br>
                de tu <em>patrimonio</em>
            </h1>
        </div>
    </section>

    <main>

        {{-- ════════════════════════════════════════════════════════════ --}}
        {{--  QUIÉNES SOMOS                                            --}}
        {{-- ════════════════════════════════════════════════════════════ --}}
        <section id="quienes">
            <div class="section-wrap">
                <div class="qs-grid">
                    <div class="qs-text">
                        <div class="section-label">Quiénes somos</div>
                        <h2 class="section-title">Kapital House <em><br>gestión inmobiliaria &amp; bienes raíces</em></h2>
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
                        <p>
                            En KBR KapitalHaus, trabajamos para que los propietarios puedan rentabilizar
                            sus activos inmobiliarios con el mínimo esfuerzo, mientras sus propiedades
                            son gestionadas con el máximo cuidado y responsabilidad.
                        </p>
                    </div>

                    <div class="qs-image">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&auto=format&fit=crop&q=80" alt="Edificio moderno" loading="lazy">
                        <div class="qs-image-overlay"></div>
                        <div class="qs-image-tag">
                            <p>"Tratamos cada propiedad como un activo patrimonial"</p>
                            <small>KBR KapitalHaus</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ════════════════════════════════════════════════════════════ --}}
        {{--  MISIÓN, VISIÓN Y VALORES                                 --}}
        {{-- ════════════════════════════════════════════════════════════ --}}
        <section id="mvv">
            <div class="section-wrap">
                <div class="section-label">Nuestra identidad</div>
                <h2 class="section-title">Misión, <em>Visión</em> y Valores</h2>

                <div class="mvv-grid">
                    <div class="mvv-card">
                        <span class="mvv-card-icon"><i class="fas fa-bullseye"></i></span>
                        <div class="mvv-card-title">Misión</div>
                        <div class="mvv-card-text">
                            Brindar soluciones integrales a los propietarios en la gestión de sus inmuebles,
                            ofreciendo servicios de administración, supervisión y comercialización de propiedades,
                            con un enfoque profesional orientado a la seguridad, tranquilidad y rentabilidad.
                            Nuestro propósito es maximizar el valor y la rentabilidad de las propiedades mediante
                            una gestión responsable, eficiente y transparente.
                        </div>
                    </div>
                    <div class="mvv-card">
                        <span class="mvv-card-icon"><i class="fas fa-binoculars"></i></span>
                        <div class="mvv-card-title">Visión</div>
                        <div class="mvv-card-text">
                            Ser reconocidos como una empresa líder en administración de inmuebles en la región,
                            destacándonos por la excelencia en la gestión inmobiliaria, la confianza de nuestros
                            clientes y nuestra capacidad para generar valor en la administración de activos
                            inmobiliarios.
                        </div>
                    </div>
                </div>

                <div class="mvv-valores">
                    <div class="mvv-valores-title">Nuestros Valores</div>
                    <div class="valores-grid">
                        <div class="valor-item">
                            <div class="valor-icon"><i class="fas fa-eye"></i></div>
                            <div class="valor-name">Transparencia</div>
                            <div class="valor-desc">Actuamos con claridad y honestidad en todas nuestras gestiones.</div>
                        </div>
                        <div class="valor-item">
                            <div class="valor-icon"><i class="fas fa-bolt"></i></div>
                            <div class="valor-name">Eficiencia</div>
                            <div class="valor-desc">Administramos de forma organizada y estratégica.</div>
                        </div>
                        <div class="valor-item">
                            <div class="valor-icon"><i class="fas fa-scale-balanced"></i></div>
                            <div class="valor-name">Integridad</div>
                            <div class="valor-desc">Actuamos con ética profesional en cada decisión.</div>
                        </div>
                        <div class="valor-item">
                            <div class="valor-icon"><i class="fas fa-handshake"></i></div>
                            <div class="valor-name">Orientación al cliente</div>
                            <div class="valor-desc">Comprendemos sus necesidades y generamos valor a sus inversiones.</div>
                        </div>
                        <div class="valor-item">
                            <div class="valor-icon"><i class="fas fa-star"></i></div>
                            <div class="valor-name">Calidad de servicio</div>
                            <div class="valor-desc">Comprometidos con la excelencia y el servicio profesional.</div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>