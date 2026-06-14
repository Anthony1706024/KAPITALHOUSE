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
            font-size:.72rem; font-weight:500; letter-spacing:.2em; text-transform:uppercase; color:var(--gold); margin-bottom:1rem;
        }
        .page-hero-label::before { content:''; display:block; width:28px; height:1.5px; background:var(--gold); }
        .page-hero-title { font-family:'Cormorant Garamond',serif; font-size:clamp(2.5rem,5vw,4rem); font-weight:300; color:var(--white); line-height:1.1; }
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

        /* ─── SERVICIO BLOQUE ─── */
        .servicio-bloque { padding:7rem 0; }
        .servicio-bloque:nth-child(even) { background:var(--gray-light); }
        .servicio-bloque:nth-child(odd)  { background:var(--white); }

        .servicio-grid { display:grid; grid-template-columns:1fr 1fr; gap:5rem; align-items:start; }
        .servicio-grid.reverse { direction:rtl; }
        .servicio-grid.reverse > * { direction:ltr; }

        .servicio-header { margin-bottom:2rem; }
        .servicio-num {
            font-family:'Cormorant Garamond',serif; font-size:5rem; font-weight:300;
            color:rgba(10,26,69,.07); line-height:1; margin-bottom:.5rem;
        }
        .servicio-icon-row { display:flex; align-items:center; gap:1rem; margin-bottom:1rem; }
        .servicio-icon {
            width:50px; height:50px; border-radius:12px;
            background:rgba(10,26,69,.07); color:var(--navy);
            display:flex; align-items:center; justify-content:center; font-size:1.2rem;
        }
        .servicio-title { font-family:'Cormorant Garamond',serif; font-size:1.8rem; font-weight:600; color:var(--navy); }
        .servicio-lead { font-size:1rem; color:var(--text-mid); line-height:1.7; margin-bottom:1.8rem; font-weight:300; }

        .servicio-items { display:flex; flex-direction:column; gap:0; }
        .servicio-item {
            display:flex; align-items:flex-start; gap:12px;
            padding:.9rem 0; border-bottom:1px solid rgba(10,26,69,.07);
        }
        .servicio-item:last-child { border-bottom:none; }
        .servicio-check { color:var(--gold); margin-top:3px; font-size:.85rem; flex-shrink:0; }
        .servicio-item-text { font-size:.92rem; color:var(--text-mid); line-height:1.6; }

        .servicio-visual {
            border-radius:4px; overflow:hidden;
            aspect-ratio:3/2; position:relative;
        }
        .servicio-visual img { width:100%; height:100%; object-fit:cover; display:block; }
        .servicio-visual-overlay { position:absolute; inset:0; background:rgba(10,26,69,.2); }

        /* ─── ASESORÍA (bloque especial) ─── */
        #asesoria { background:var(--navy); padding:7rem 0; }
        #asesoria .section-label { color:var(--gold); }
        #asesoria .section-title { color:var(--white); margin-bottom:1rem; }
        #asesoria .section-intro { font-size:1rem; font-weight:300; color:var(--text-muted); max-width:520px; line-height:1.8; margin-bottom:3rem; }
        .asesoria-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:1.5px; background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.06); border-radius:4px; overflow:hidden; }
        .asesoria-card { background:rgba(10,26,69,.5); padding:2.2rem; transition:background .25s; }
        .asesoria-card:hover { background:rgba(201,168,76,.07); }
        .asesoria-card-icon { font-size:1.3rem; color:var(--gold); margin-bottom:1rem; }
        .asesoria-card-title { font-size:1rem; font-weight:600; color:var(--white); margin-bottom:.5rem; }
        .asesoria-card-text  { font-size:.88rem; color:var(--text-muted); line-height:1.7; }

        /* ─── CTA ─── */
        #cta { background:var(--gray-light); padding:7rem 0; }
        .cta-box {
            background:var(--navy); border-radius:8px; padding:5rem;
            display:flex; align-items:center; justify-content:space-between; gap:3rem;
            position:relative; overflow:hidden;
        }
        .cta-box::before {
            content:''; position:absolute; inset:0; pointer-events:none;
            background-image:repeating-linear-gradient(45deg, rgba(201,168,76,.03) 0px, rgba(201,168,76,.03) 1px, transparent 1px, transparent 60px);
        }
        .cta-box-left { position:relative; z-index:1; }
        .cta-box-label { font-size:.72rem; font-weight:500; letter-spacing:.2em; text-transform:uppercase; color:var(--gold); margin-bottom:1rem; }
        .cta-box-title { font-family:'Cormorant Garamond',serif; font-size:clamp(1.8rem,3vw,2.6rem); font-weight:300; color:var(--white); line-height:1.2; }
        .cta-box-title em { font-style:italic; color:var(--gold-light); }
        .cta-box-right { position:relative; z-index:1; flex-shrink:0; }
        .btn-gold-solid {
            display:inline-flex; align-items:center; gap:10px;
            background:var(--gold); color:var(--navy);
            font-size:.9rem; font-weight:700; letter-spacing:.04em;
            padding:16px 36px; border-radius:4px; text-decoration:none; white-space:nowrap;
            transition:background .2s, transform .2s;
        }
        .btn-gold-solid:hover { background:var(--gold-light); transform:translateY(-2px); }

        @media (max-width:900px) {
            .servicio-grid { grid-template-columns:1fr; }
            .servicio-grid.reverse { direction:ltr; }
            .asesoria-grid { grid-template-columns:1fr; }
            .cta-box { flex-direction:column; align-items:flex-start; padding:3rem; }
        }
        @media (max-width:560px) {
            .section-wrap { padding:0 1.5rem; }
            .page-hero-content { padding:0 1.5rem; }
            .page-hero-circle  { display:none; }
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

        {{-- CORRETAJE --}}
        <section class="servicio-bloque">
            <div class="section-wrap">
                <div class="servicio-grid">
                    <div>
                        <div class="servicio-header">
                            <div class="servicio-num">01</div>
                            <div class="servicio-icon-row">
                                <div class="servicio-icon"><i class="fa-solid fa-user-tie"></i></div>
                                <div class="section-label" style="color:var(--gold);">Primer servicio</div>
                            </div>
                            <div class="servicio-title">Corretaje: Colocación de Inquilinos</div>
                        </div>
                        <p class="servicio-lead">
                            Buscamos el inquilino adecuado para tu propiedad mediante un proceso de
                            evaluación que reduce riesgos y asegura estabilidad en los ingresos.
                        </p>
                        <div class="servicio-items">
                            <div class="servicio-item">
                                <i class="fa-solid fa-check servicio-check"></i>
                                <span class="servicio-item-text">Evaluación del precio óptimo de alquiler</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fa-solid fa-check servicio-check"></i>
                                <span class="servicio-item-text">Promoción del inmueble en los canales adecuados</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fa-solid fa-check servicio-check"></i>
                                <span class="servicio-item-text">Selección y evaluación rigurosa de inquilinos</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fa-solid fa-check servicio-check"></i>
                                <span class="servicio-item-text">Elaboración y formalización del contrato de arrendamiento</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fa-solid fa-check servicio-check"></i>
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

        {{-- ADMINISTRACIÓN --}}
        <section class="servicio-bloque">
            <div class="section-wrap">
                <div class="servicio-grid reverse">
                    <div>
                        <div class="servicio-header">
                            <div class="servicio-num">02</div>
                            <div class="servicio-icon-row">
                                <div class="servicio-icon"><i class="fa-solid fa-building-columns"></i></div>
                                <div class="section-label" style="color:var(--gold);">Segundo servicio</div>
                            </div>
                            <div class="servicio-title">Administración del Inmueble</div>
                        </div>
                        <p class="servicio-lead">
                            Gestionamos todos los aspectos operativos, legales y financieros de tu propiedad
                            para que no tengas que preocuparte por nada.
                        </p>
                        <div class="servicio-items">
                            <div class="servicio-item">
                                <i class="fa-solid fa-check servicio-check"></i>
                                <span class="servicio-item-text">Cobranza mensual del alquiler y seguimiento de pagos</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fa-solid fa-check servicio-check"></i>
                                <span class="servicio-item-text">Supervisión del estado del inmueble (visita en el periodo del contrato)</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fa-solid fa-check servicio-check"></i>
                                <span class="servicio-item-text">Alerta registral: monitoreo ante intentos de cambios en el registro de la propiedad</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fa-solid fa-check servicio-check"></i>
                                <span class="servicio-item-text">Coordinación de pagos de tributos municipales</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fa-solid fa-check servicio-check"></i>
                                <span class="servicio-item-text">Pago de impuesto de primera categoría ante SUNAT, en coordinación con el propietario</span>
                            </div>
                            <div class="servicio-item">
                                <i class="fa-solid fa-check servicio-check"></i>
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
        <section id="asesoria">
            <div class="section-wrap">
                <div class="section-label">Tercer servicio</div>
                <h2 class="section-title" style="color:var(--white);">Asesoría <em>Inmobiliaria</em></h2>
                <p class="section-intro">
                    Brindamos asesoría especializada a propietarios e inversionistas para tomar
                    mejores decisiones sobre sus activos inmobiliarios.
                </p>
                <div class="asesoria-grid">
                    <div class="asesoria-card">
                        <div class="asesoria-card-icon"><i class="fa-solid fa-chart-pie"></i></div>
                        <div class="asesoria-card-title">Análisis de rentabilidad</div>
                        <div class="asesoria-card-text">Evaluamos la rentabilidad real de tu propiedad y encontramos oportunidades para mejorarla.</div>
                    </div>
                    <div class="asesoria-card">
                        <div class="asesoria-card-icon"><i class="fa-solid fa-tags"></i></div>
                        <div class="asesoria-card-title">Evaluación del precio de alquiler</div>
                        <div class="asesoria-card-text">Determinamos el precio óptimo de alquiler en base al mercado actual y las condiciones del inmueble.</div>
                    </div>
                    <div class="asesoria-card">
                        <div class="asesoria-card-icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
                        <div class="asesoria-card-title">Análisis del mercado inmobiliario</div>
                        <div class="asesoria-card-text">Informes actualizados sobre tendencias de precios, zonas de mayor demanda y oportunidades.</div>
                    </div>
                    <div class="asesoria-card">
                        <div class="asesoria-card-icon"><i class="fa-solid fa-lightbulb"></i></div>
                        <div class="asesoria-card-title">Oportunidades de inversión</div>
                        <div class="asesoria-card-text">Asesoría personalizada en la identificación y evaluación de oportunidades de inversión inmobiliaria.</div>
                    </div>
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section id="cta">
            <div class="section-wrap">
                <div class="cta-box">
                    <div class="cta-box-left">
                        <div class="cta-box-label">¿Listo para empezar?</div>
                        <h2 class="cta-box-title">Conversemos sobre<br><em>tu propiedad</em></h2>
                    </div>
                    <div class="cta-box-right">
                        <a href="{{ route('contacto') }}" class="btn-gold-solid">
                            <i class="fa-regular fa-paper-plane"></i>
                            Contáctanos
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>