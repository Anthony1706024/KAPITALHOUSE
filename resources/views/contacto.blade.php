{{-- resources/views/contacto.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contáctanos — KBR KapitalHaus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #0a1a45;
            --navy-light: #132863;
            --gold: #c9a84c;
            --gold-light: #e4c97e;
            --gold-dim: rgba(201, 168, 76, 0.12);
            --white: #ffffff;
            --gray-light: #f8f9fc;
            --text-dark: #1e2a3a;
            --text-mid: #5a6e7c;
            --toast-success: #10b981;
            --toast-error: #ef4444;
            --toast-warning: #f59e0b;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--gray-light);
            min-height: 100vh;
        }

        /* Contenedor principal */
        .contacto-page {
            max-width: 1400px;
            margin: 0 auto;
            padding: 5rem 2rem;
            position: relative;
            min-height: 80vh;
            display: flex;
            align-items: center;
            margin-top: 50px;

        }

        /* Imagen decorativa (solo en pantallas grandes) */
        .contacto-bg-decoration {
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 45%;
            max-width: 550px;
            opacity: 0.15;
            pointer-events: none;
            z-index: 0;
        }

        .contacto-bg-decoration svg {
            width: 100%;
            height: auto;
        }

        /* Grid principal */
        .contacto-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            position: relative;
            z-index: 2;
            width: 100%;
        }

        /* Tarjetas con animación de aparición */
        @keyframes fadeSlideUp {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeSlideRight {
            0% {
                opacity: 0;
                transform: translateX(-30px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeSlideLeft {
            0% {
                opacity: 0;
                transform: translateX(30px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .info-card {
            background: var(--white);
            border-radius: 32px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            animation: fadeSlideRight 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
            opacity: 0;
            transform-origin: center;
        }

        .form-card {
            background: var(--white);
            border-radius: 32px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            animation: fadeSlideLeft 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1) forwards;
            opacity: 0;
        }

        /* Badge dorado */
        .contact-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--gold-dim);
            padding: 0.5rem 1.2rem;
            border-radius: 60px;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #b88b2c;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(201, 168, 76, 0.2);
        }

        .info-card h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.2rem;
            font-weight: 500;
            color: var(--navy);
            margin-bottom: 0.5rem;
        }

        .info-card .subtitle {
            color: var(--text-mid);
            font-size: 0.9rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        /* Items de contacto */
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 1.2rem;
            padding: 1.2rem 0;
            border-bottom: 1px solid rgba(10, 26, 69, 0.08);
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            transform: translateX(5px);
            border-bottom-color: var(--gold);
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--gold-dim) 0%, rgba(201, 168, 76, 0.05) 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: var(--gold);
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .contact-item:hover .contact-icon {
            transform: scale(1.05);
            background: var(--gold-dim);
        }

        .contact-detail h4 {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 0.3rem;
        }

        .contact-detail p,
        .contact-detail a {
            font-size: 1rem;
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .contact-detail a:hover {
            color: var(--gold);
        }

        /* Redes sociales */
        .social-section {
            margin-top: 2rem;
            padding-top: 1rem;
        }

        .social-section h4 {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-mid);
            margin-bottom: 1rem;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
        }

        .social-icon {
            width: 44px;
            height: 44px;
            background: rgba(10, 26, 69, 0.05);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--navy);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-icon:hover {
            background: var(--gold);
            color: var(--white);
            transform: translateY(-3px);
        }

        /* Formulario */
        .form-card h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            font-weight: 500;
            color: var(--navy);
            margin-bottom: 0.5rem;
        }

        .form-card .form-subtitle {
            color: var(--text-mid);
            font-size: 0.85rem;
            margin-bottom: 1.8rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 1rem 1.2rem;
            border: 1.5px solid rgba(10, 26, 69, 0.1);
            border-radius: 20px;
            font-family: 'Outfit', sans-serif;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            background: var(--white);
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(201, 168, 76, 0.15);
            transform: translateY(-1px);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn-submit {
            width: 100%;
            background: var(--navy);
            color: var(--white);
            padding: 1rem;
            border: none;
            border-radius: 60px;
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }

        .btn-submit:hover {
            background: var(--gold);
            color: var(--navy);
            transform: translateY(-2px);
            box-shadow: 0 15px 25px -10px rgba(201, 168, 76, 0.4);
        }

        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        /* Estilo del mapa */
        .map-link {
            margin-top: 1.5rem;
            text-align: center;
            padding-top: 1rem;
            border-top: 1px solid rgba(10, 26, 69, 0.08);
        }

        .map-link a {
            color: var(--text-mid);
            text-decoration: none;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s;
        }

        .map-link a:hover {
            color: var(--gold);
        }

        /* Toast / Mensaje flotante */
        .toast-message {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 9999;
            min-width: 280px;
            max-width: 400px;
            padding: 1rem 1.5rem;
            border-radius: 16px;
            background: white;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 12px;
            transform: translateX(120%);
            transition: transform 0.3s ease;
            font-family: 'Outfit', sans-serif;
        }

        .toast-message.show {
            transform: translateX(0);
        }

        .toast-message.success {
            border-left: 5px solid var(--toast-success);
        }

        .toast-message.error {
            border-left: 5px solid var(--toast-error);
        }

        .toast-message.warning {
            border-left: 5px solid var(--toast-warning);
        }

        .toast-icon {
            font-size: 1.5rem;
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-weight: 700;
            margin-bottom: 4px;
            font-size: 0.9rem;
        }

        .toast-text {
            font-size: 0.8rem;
            color: var(--text-mid);
        }

        .toast-close {
            cursor: pointer;
            color: var(--text-mid);
            transition: color 0.2s;
        }

        .toast-close:hover {
            color: var(--text-dark);
        }

        /* Responsive */
        @media (max-width: 1000px) {
            .contacto-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            .contacto-bg-decoration {
                display: none;
            }
                .contacto-page {
                margin-top: 100px;
            }
            .info-card, .form-card {
                animation: fadeSlideUp 0.8s ease forwards;
            }
        }

        @media (max-width: 480px) {
            .info-card, .form-card {
                padding: 1.8rem;
            }
            .info-card h2 {
                font-size: 1.8rem;
            }
            .contact-icon {
                width: 42px;
                height: 42px;
                font-size: 1.1rem;
            }
            .toast-message {
                left: 20px;
                right: 20px;
                min-width: auto;
            }
        }

        /* Efecto ripple en botón */
        .btn-submit {
            position: relative;
            overflow: hidden;
        }

        .btn-submit::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.4s, height 0.4s;
        }

        .btn-submit:active::after {
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>

    @include('layouts.navbar')

    <div class="contacto-page">
        <!-- Imagen decorativa (solo pantallas grandes) -->
        <div class="contacto-bg-decoration">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="var(--gold)" d="M47.1,-57.7C60.7,-48.5,70.9,-32.2,74.9,-14.6C78.9,3,76.7,22,67.9,37.5C59.1,53,43.8,65.1,26.7,71.5C9.6,78,-9.3,78.9,-26.8,72.5C-44.3,66.1,-60.4,52.4,-69.5,35.1C-78.6,17.8,-80.7,-3.1,-74.4,-20.6C-68.1,-38.1,-53.5,-52.2,-37.9,-62.1C-22.3,-72,-11.2,-77.8,3.5,-81.6C18.2,-85.4,33.4,-66.9,47.1,-57.7Z" transform="translate(100 100)" />
            </svg>
        </div>

        <div class="contacto-grid">
            <!-- Columna Izquierda - Información -->
            <div class="info-card">
                <div class="contact-badge">
                    <i class="fas fa-comment-dots"></i> CONÉCTATE CON NOSOTROS
                </div>
                <h2>¿Listo para <br><em style="color: var(--gold); font-style: italic;">transformar</em> tu propiedad?</h2>
                <p class="subtitle">Estamos aquí para ayudarte a maximizar la rentabilidad de tu inversión inmobiliaria con total tranquilidad.</p>

                <!-- Teléfono / WhatsApp -->
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div class="contact-detail">
                        <h4>WHATSAPP / CELULAR</h4>
                        <a href="https://wa.me/51964285907" target="_blank">+51 964 285 907</a>
                    </div>
                </div>

                <!-- Email -->
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="contact-detail">
                        <h4>CORREO ELECTRÓNICO</h4>
                        <a href="mailto:contacto@kapitalhaus.com">contacto@kapitalhaus.com</a>
                    </div>
                </div>

                <!-- Horario -->
                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="far fa-clock"></i>
                    </div>
                    <div class="contact-detail">
                        <h4>HORARIO DE ATENCIÓN</h4>
                        <p>Lunes a Viernes: 9:00 - 19:00<br>Sábados: 10:00 - 14:00</p>
                    </div>
                </div>

                <!-- Redes Sociales -->
                <div class="social-section">
                    <h4>SÍGUENOS EN REDES</h4>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/share/18pAjLhkJ8/" class="social-icon" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/kbrkapitalhaus?igsh=MWV5MnBkY245cjlwdg==" class="social-icon" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@kapitalkaus?_r=1&_t=ZS-97dMekThzHz" class="social-icon" target="_blank"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>

                <!-- Mapa (enlace) -->
                <div class="map-link">
                    <a href="https://www.google.com/maps/place/Av+Prol+Miraflores+2023,+V%C3%ADctor+Larco+Herrera+13001/data=!4m2!3m1!1s0x91ad161e5c7f185f:0x1bc575208312d26a?sa=X&ved=1t:242&ictx=111" target="_blank">
                        <i class="fas fa-map-marker-alt"></i> Ver ubicación en Google Maps
                    </a>
                </div>
            </div>

            <!-- Columna Derecha - Formulario de Contacto -->
            <div class="form-card">
                <h3>Envíanos un <em style="color: var(--gold); font-style: italic;">mensaje</em></h3>
                <p class="form-subtitle">Completa el formulario y te responderemos a la brevedad.</p>

                <form id="contactForm" action="{{ route('contacto.whatsapp') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre completo *" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Correo electrónico *" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="telefono" id="telefono" placeholder="Teléfono / WhatsApp">
                    </div>
                    <div class="form-group">
                        <select name="interes" id="interes">
                            <option value="" disabled selected>¿Qué servicio te interesa?</option>
                            <option value="corretaje">Corretaje / Colocación de inquilinos</option>
                            <option value="administracion">Administración de inmuebles</option>
                            <option value="asesoria">Asesoría inmobiliaria</option>
                            <option value="otro">Otro / Consulta general</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="mensaje" id="mensaje" placeholder="Cuéntanos sobre tu propiedad o consulta..."></textarea>
                    </div>
                    <button type="submit" class="btn-submit" id="submitBtn">
                        <i class="far fa-paper-plane"></i> Enviar mensaje
                    </button>
                </form>
                <p style="font-size: 0.7rem; color: var(--text-mid); text-align: center; margin-top: 1rem;">
                    <i class="fas fa-lock"></i> Tus datos están seguros. No compartimos información.
                </p>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <!-- Contenedor para mensajes flotantes -->
    <div id="toastContainer"></div>

    <script>
        // Función para mostrar mensaje flotante
        function showToast(message, type = 'success', title = '') {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            
            const titles = {
                success: '¡Éxito!',
                error: 'Error',
                warning: 'Atención'
            };
            
            const icons = {
                success: 'fa-check-circle',
                error: 'fa-exclamation-circle',
                warning: 'fa-exclamation-triangle'
            };
            
            toast.className = `toast-message ${type}`;
            toast.innerHTML = `
                <div class="toast-icon" style="color: ${type === 'success' ? 'var(--toast-success)' : (type === 'error' ? 'var(--toast-error)' : 'var(--toast-warning)')}">
                    <i class="fas ${icons[type]}"></i>
                </div>
                <div class="toast-content">
                    <div class="toast-title">${title || titles[type]}</div>
                    <div class="toast-text">${message}</div>
                </div>
                <div class="toast-close">
                    <i class="fas fa-times"></i>
                </div>
            `;
            
            container.appendChild(toast);
            
            // Mostrar toast con animación
            setTimeout(() => toast.classList.add('show'), 10);
            
            // Cerrar toast al hacer clic en la X
            const closeBtn = toast.querySelector('.toast-close');
            closeBtn.addEventListener('click', () => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            });
            
            // Auto-cerrar después de 5 segundos
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.classList.remove('show');
                    setTimeout(() => toast.remove(), 300);
                }
            }, 5000);
        }

        // Animación adicional: efecto de brillo en las tarjetas al cargar
        document.addEventListener('DOMContentLoaded', function() {
            // Pequeña animación de entrada para elementos internos
            const items = document.querySelectorAll('.contact-item');
            items.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateX(-15px)';
                setTimeout(() => {
                    item.style.transition = 'all 0.5s ease';
                    item.style.opacity = '1';
                    item.style.transform = 'translateX(0)';
                }, 200 + (index * 100));
            });

            const socialIcons = document.querySelectorAll('.social-icon');
            socialIcons.forEach((icon, index) => {
                icon.style.opacity = '0';
                icon.style.transform = 'scale(0.8)';
                setTimeout(() => {
                    icon.style.transition = 'all 0.4s ease';
                    icon.style.opacity = '1';
                    icon.style.transform = 'scale(1)';
                }, 500 + (index * 80));
            });
        });

        // Manejo del formulario con AJAX y mensaje flotante
        const form = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        
        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Validación básica
                const nombre = document.getElementById('nombre').value.trim();
                const email = document.getElementById('email').value.trim();
                
                if (!nombre) {
                    showToast('Por favor ingresa tu nombre completo', 'warning', 'Campo requerido');
                    document.getElementById('nombre').focus();
                    return;
                }
                
                if (!email) {
                    showToast('Por favor ingresa tu correo electrónico', 'warning', 'Campo requerido');
                    document.getElementById('email').focus();
                    return;
                }
                
                if (!email.includes('@') || !email.includes('.')) {
                    showToast('Por favor ingresa un correo electrónico válido', 'warning', 'Formato inválido');
                    document.getElementById('email').focus();
                    return;
                }
                
                // Deshabilitar botón y mostrar estado de carga
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
                submitBtn.disabled = true;
                
                try {
                    const formData = new FormData(form);
                    
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        // Mostrar mensaje de éxito
                        showToast(data.message || 'Mensaje preparado correctamente', 'success', '¡Todo listo!');
                        
                        // Redirigir a WhatsApp después de un breve momento
                        setTimeout(() => {
                            window.open(data.url, '_blank');
                        }, 1000);
                        
                        // Resetear formulario
                        form.reset();
                    } else {
                        showToast(data.message || 'Ocurrió un error, intenta nuevamente', 'error', 'Error');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    showToast('Error de conexión. Verifica tu internet e intenta nuevamente', 'error', 'Error');
                } finally {
                    // Restaurar botón
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }
            });
        }
    </script>
</body>
</html>