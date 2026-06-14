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
        body { font-family:'Outfit',sans-serif; background:var(--white); overflow-x:hidden; }

        /* ─── PAGE HERO ─── */
        .page-hero {
            position:relative; background:var(--navy);
            padding:9rem 0 6rem; overflow:hidden;
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
        .breadcrumb { display:flex; align-items:center; gap:8px; margin-bottom:1.5rem; }
        .breadcrumb a { font-size:.8rem; color:rgba(255,255,255,.45); text-decoration:none; transition:color .2s; }
        .breadcrumb a:hover { color:var(--gold-light); }
        .breadcrumb span { font-size:.8rem; color:rgba(255,255,255,.25); }
        .breadcrumb-current { font-size:.8rem; color:var(--gold-light); }

        .page-hero-label {
            display:inline-flex; align-items:center; gap:10px;
            font-size:.98rem; font-weight:500; letter-spacing:.2em; text-transform:uppercase;
            color:var(--gold); margin-bottom:1rem;
        }
        .page-hero-label::before { content:''; display:block; width:28px; height:1.5px; background:var(--gold); }

        .page-hero-title {
            font-family:'Cormorant Garamond',serif;
            font-size:clamp(2.5rem,5vw,4rem); font-weight:300; color:var(--white); line-height:1.1;
        }
        .page-hero-title em { font-style:italic; color:var(--gold-light); }

        /* ─── SECTION BASE ─── */
        .section-wrap { max-width:1200px; margin:0 auto; padding:0 2.5rem; }
        .section-label {
            display:inline-flex; align-items:center; gap:10px;
            font-size:.72rem; font-weight:500; letter-spacing:.2em; text-transform:uppercase; margin-bottom:1rem;
        }
        .section-label::before { content:''; display:block; width:28px; height:1.5px; background:var(--gold); }
        .section-title { font-family:'Cormorant Garamond',serif; font-size:clamp(1.8rem,3.5vw,2.8rem); font-weight:300; line-height:1.15; }
        .section-title em { font-style:italic; color:var(--gold); }

        /* ─── QUIÉNES SOMOS ─── */
        #quienes { background:var(--white); padding:7rem 0; }
        .qs-grid { display:grid; grid-template-columns:1fr 1fr; gap:5rem; align-items:center; margin-top:3.5rem; }
        .qs-text .section-label { color:var(--gold); }
        .qs-text .section-title { color:var(--navy); margin-bottom:1.5rem; }
        .qs-text p { font-size:1rem; font-weight:300; color:var(--text-mid); line-height:1.85; margin-bottom:1.2rem; }

        .qs-image {
            position:relative; border-radius:4px; overflow:hidden;
            aspect-ratio:4/5;
        }
        .qs-image img { width:100%; height:100%; object-fit:cover; display:block; }
        .qs-image-overlay {
            position:absolute; inset:0;
            background:linear-gradient(to top, rgba(10,26,69,.6) 0%, transparent 50%);
        }
        .qs-image-tag {
            position:absolute; bottom:1.5rem; left:1.5rem; right:1.5rem;
            background:rgba(10,26,69,.8); backdrop-filter:blur(10px);
            border:1px solid rgba(201,168,76,.25); border-radius:4px;
            padding:1rem 1.2rem;
        }
        .qs-image-tag p { font-size:.85rem; font-style:italic; color:var(--gold-light); line-height:1.5; }
        .qs-image-tag small { font-size:.7rem; color:rgba(255,255,255,.45); margin-top:.3rem; display:block; }

        /* ─── MISIÓN VISIÓN VALORES ─── */
        #mvv { background:var(--gray-light); padding:7rem 0; }
        #mvv .section-label { color:var(--gold); }
        #mvv .section-title { color:var(--navy); margin-bottom:3.5rem; }

        .mvv-top { display:grid; grid-template-columns:1fr 1fr; gap:2px; margin-bottom:2px; }
        .mvv-card {
            background:var(--white); padding:2.8rem;
            position:relative; overflow:hidden;
            transition:box-shadow .25s;
        }
        .mvv-card:hover { box-shadow:0 8px 40px rgba(10,26,69,.08); }
        .mvv-card::before {
            content:''; position:absolute; top:0; left:0; right:0; height:3px;
            background:linear-gradient(90deg, var(--gold), transparent);
        }
        .mvv-card-icon { font-size:1.4rem; color:var(--gold); margin-bottom:1.2rem; }
        .mvv-card-title { font-family:'Cormorant Garamond',serif; font-size:1.5rem; font-weight:600; color:var(--navy); margin-bottom:1rem; }
        .mvv-card-text  { font-size:.95rem; font-weight:300; color:var(--text-mid); line-height:1.8; }

        .mvv-valores { background:var(--navy); padding:2.8rem; margin-top:0; }
        .mvv-valores-title { font-family:'Cormorant Garamond',serif; font-size:1.5rem; font-weight:600; color:var(--white); margin-bottom:2rem; }
        .valores-grid { display:grid; grid-template-columns:repeat(5,1fr); gap:1.5rem; }
        .valor-item { display:flex; flex-direction:column; align-items:flex-start; gap:.5rem; }
        .valor-icon { width:36px; height:36px; border-radius:8px; background:rgba(201,168,76,.15); display:flex; align-items:center; justify-content:center; color:var(--gold-light); font-size:.85rem; }
        .valor-name { font-size:.85rem; font-weight:600; color:var(--white); }
        .valor-desc { font-size:.78rem; color:var(--text-muted); line-height:1.5; }

        /* ─── ANIMACIONES ─── */
        @keyframes fade-up { from{opacity:0;transform:translateY(20px)} to{opacity:1;transform:translateY(0)} }

        /* ─── RESPONSIVE ─── */
        @media (max-width:900px) {
            .qs-grid     { grid-template-columns:1fr; }
            .mvv-top     { grid-template-columns:1fr; }
            .valores-grid { grid-template-columns:repeat(2,1fr); }
        }
        @media (max-width:560px) {
            .section-wrap       { padding:0 1.5rem; }
            .page-hero-content  { padding:0 1.5rem; }
            .valores-grid       { grid-template-columns:1fr; }
            .page-hero-circle   { display:none; }
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
            <div class="page-hero-label">KAPITAL HOUSE</div>
            <h1 class="page-hero-title">
                Profesionales al servicio<br>
                de tu <em>patrimonio</em>
            </h1>
        </div>
    </section>

    <main>

        {{-- QUIÉNES SOMOS --}}
        <section id="quienes">
            <div class="section-wrap">
                <div class="qs-grid">
                    <div class="qs-text">
                        <div class="section-label">Quiénes somos</div>
                        <h2 class="section-title">Kapital House <em><br>gestion inmobiliaria & bienes raices</em></h2>
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
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&auto=format&fit=crop&q=80" alt="Edificio moderno">
                        <div class="qs-image-overlay"></div>
                        <div class="qs-image-tag">
                            <p>"Tratamos cada propiedad como un activo patrimonial"</p>
                            <small>KBR KapitalHaus</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- MISIÓN, VISIÓN Y VALORES --}}
        <section id="mvv">
            <div class="section-wrap">
                <div class="section-label">Nuestra identidad</div>
                <h2 class="section-title">Misión, <em>Visión</em> y Valores</h2>

                <div class="mvv-top">
                    <div class="mvv-card">
                        <div class="mvv-card-icon"><i class="fa-solid fa-bullseye"></i></div>
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
                        <div class="mvv-card-icon"><i class="fa-solid fa-binoculars"></i></div>
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
                            <div class="valor-icon"><i class="fa-solid fa-eye"></i></div>
                            <div class="valor-name">Transparencia</div>
                            <div class="valor-desc">Actuamos con claridad y honestidad en todas nuestras gestiones, manteniendo comunicación abierta con nuestros clientes.</div>
                        </div>
                        <div class="valor-item">
                            <div class="valor-icon"><i class="fa-solid fa-bolt"></i></div>
                            <div class="valor-name">Eficiencia</div>
                            <div class="valor-desc">Administramos los inmuebles de forma organizada y estratégica, optimizando recursos y maximizando resultados.</div>
                        </div>
                        <div class="valor-item">
                            <div class="valor-icon"><i class="fa-solid fa-scale-balanced"></i></div>
                            <div class="valor-name">Integridad</div>
                            <div class="valor-desc">Desarrollamos nuestra actividad con ética profesional y responsabilidad en cada decisión.</div>
                        </div>
                        <div class="valor-item">
                            <div class="valor-icon"><i class="fa-solid fa-handshake"></i></div>
                            <div class="valor-name">Orientación al cliente</div>
                            <div class="valor-desc">Nuestros clientes son el centro de nuestra gestión. Comprendemos sus necesidades y generamos valor a sus inversiones.</div>
                        </div>
                        <div class="valor-item">
                            <div class="valor-icon"><i class="fa-solid fa-star"></i></div>
                            <div class="valor-name">Calidad de servicio</div>
                            <div class="valor-desc">Nos comprometemos a brindar un servicio profesional, confiable y orientado a la excelencia.</div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>