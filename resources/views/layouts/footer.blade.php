{{-- ============================================================
     resources/views/layouts/footer.blade.php
     ============================================================ --}}

<style>
    .footer {
        background: #123489;  /* Mismo color del navbar */
        color: #ffffff;
        padding: 3rem 5% 1.5rem;
        width: 100%;
        margin-top: 2rem;
    }

    .footer__container {
        max-width: 1300px;
        margin: 0 auto;
    }

    .footer__grid {
        display: grid;
        grid-template-columns: 1.2fr 1fr 1fr 1fr;
        gap: 2rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .footer__logo {
        height: 55px;
        width: auto;
        margin-bottom: 1rem;
    }

    .footer__description {
        color: rgba(255,255,255,0.7);
        font-size: 0.85rem;
        line-height: 1.6;
        margin-bottom: 1.2rem;
    }

    .footer__social {
        display: flex;
        gap: 0.8rem;
    }

    .footer__social-link {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    .footer__social-link:hover {
        transform: translateY(-4px) scale(1.1);
    }

    .footer__social-link.fb { background: #1877f2; }
    .footer__social-link.wa { background: #25d366; }
    .footer__social-link.ig {
        background: radial-gradient(circle at 30% 107%,
            #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285aeb 90%);
    }

    .footer__title {
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: #e8c97a;
        margin-bottom: 1.2rem;
    }

    .footer__links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer__links li {
        margin-bottom: 0.6rem;
    }

    .footer__links li a {
        color: rgba(255,255,255,0.7);
        text-decoration: none;
        font-size: 0.85rem;
        transition: all 0.25s ease;
        display: inline-block;
    }

    .footer__links li a:hover {
        color: #e8c97a;
        transform: translateX(4px);
    }

    .footer__bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
        padding-top: 1.5rem;
        font-size: 0.75rem;
        color: rgba(255,255,255,0.5);
    }

    .footer__badge {
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .footer__grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.8rem;
        }
    }

    @media (max-width: 768px) {
        .footer {
            padding: 2rem 5% 1rem;
        }
        .footer__grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
            text-align: center;
        }
        .footer__brand {
            text-align: center;
        }
        .footer__social {
            justify-content: center;
        }
        .footer__title {
            text-align: center;
        }
        .footer__links li a:hover {
            transform: translateX(0);
        }
        .footer__bottom {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<footer class="footer">
    <div class="footer__container">
        <div class="footer__grid">
            <!-- Columna 1: Brand -->
            <div class="footer__brand">
                <img src="{{ asset('img/logo_transparente.png') }}" alt="KBR KapitalHaus" class="footer__logo" />
                <p class="footer__description">
                    Gestión Inmobiliaria Profesional orientada a maximizar la rentabilidad de tus activos 
                    con seguridad y tranquilidad.
                </p>
                <div class="footer__social">
                    <a href="https://facebook.com" target="_blank" class="footer__social-link fb"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://wa.me/51964285907" target="_blank" class="footer__social-link wa"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://instagram.com" target="_blank" class="footer__social-link ig"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Columna 2: Navegación -->
            <div class="footer__col">
                <h4 class="footer__title">NAVEGACIÓN</h4>
                <ul class="footer__links">
                    <li><a href="#inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="{{ url('/nosotros') }}"><i class="fas fa-users"></i> Quiénes Somos</a></li>
                    <li><a href="{{ url('/servicios') }}"><i class="fas fa-cogs"></i> Servicios</a></li>
                    <li><a href="{{ url('/beneficios') }}"><i class="fas fa-gem"></i> Beneficios</a></li>
                    <li><a href="{{ url('/contacto') }}"><i class="fas fa-envelope"></i> Contáctanos</a></li>
                </ul>
            </div>

            <!-- Columna 4: Contacto -->
            <div class="footer__col">
                <h4 class="footer__title">CONTACTO</h4>
                <ul class="footer__links">
                    <li><a href="https://wa.me/51964285907" target="_blank"><i class="fab fa-whatsapp"></i> +51 961 666 679</a></li>
                    <li><a href="mailto:contacto@kapitalhaus.pe"><i class="fas fa-envelope"></i> contacto@kapitalhaus.pe</a></li>
                    <li><a href="#contacto"><i class="fas fa-map-marker-alt"></i> Trujillo, Perú</a></li>
                </ul>
            </div>
        </div>

        <div class="footer__bottom">
            <p>&copy; {{ date('Y') }} KBR KapitalHaus — Todos los derechos reservados</p>
            <p class="footer__badge"><i class="fas fa-shield-alt"></i> Tu tranquilidad es nuestra prioridad</p>
        </div>
    </div>
</footer>