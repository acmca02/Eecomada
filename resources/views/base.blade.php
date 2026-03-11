<!DOCTYPE html>
<html lang="mg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>EECOMADA | Sustainable Innovation</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@100;300;700&family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary: #7ac74f; /* Maitso Lime Ecomada */
            --dark: #1b5e20;
            --white: #ffffff;
            --gray: #f4f7f6;
            --nav-h: 85px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; -webkit-tap-highlight-color: transparent; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--white);
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* --- NAVIGATION BAR --- */
        nav {
            position: fixed;
            top: 0; width: 100%; height: var(--nav-h);
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(15px);
            z-index: 2000;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 25px rgba(0,0,0,0.05);
        }

        .nav-container {
            width: 100%; max-width: 1400px;
            margin: 0 auto; padding: 0 5%;
            display: flex; justify-content: space-between; align-items: center;
        }

        /* Brand ID (Secret Triple Click inside) */
        .brand {
            display: flex; align-items: center; gap: 15px;
            text-decoration: none; cursor: pointer; user-select: none;
        }

        .logo-nav {
            height: 60px; width: 60px;
            border-radius: 50%; border: 2px solid var(--primary);
            object-fit: cover; transition: 0.3s;
        }

        .brand-name {
            font-family: 'Lexend Exa', sans-serif;
            font-size: 1.8em; font-weight: 100;
            color: var(--dark); letter-spacing: -1.5px;
            text-transform: lowercase;
        }

        /* Menu Desktop */
        .nav-links { display: flex; align-items: center; gap: 25px; }

        .nav-link {
            text-decoration: none; color: #444;
            font-weight: 700; font-size: 0.85em;
            text-transform: uppercase; transition: 0.3s;
            display: flex; align-items: center; gap: 8px;
        }

        .nav-link:hover:not(.btn-client) { color: var(--primary); }

        .btn-client {
            background: var(--primary); color: white !important;
            padding: 14px 35px; border-radius: 50px;
            font-weight: 800; border: none;
            box-shadow: 0 6px 20px rgba(122, 199, 79, 0.3);
        }

        /* Hamburger Mobile */
        .mobile-toggle { display: none; font-size: 1.6em; color: var(--dark); cursor: pointer; }

        /* --- WHATSAPP FLOATING --- */
        .whatsapp-float {
            position: fixed; bottom: 30px; right: 30px;
            background-color: #25d366; color: white;
            width: 60px; height: 60px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 32px; box-shadow: 2px 5px 20px rgba(0,0,0,0.2);
            z-index: 3000; text-decoration: none; transition: 0.3s;
        }
        .whatsapp-float:hover { transform: scale(1.1); }

        /* --- FOOTER STYLÉ --- */
        footer {
            background: var(--gray); padding: 70px 5% 30px;
            border-top: 1px solid #eee; margin-top: 50px;
        }

        .footer-grid {
            max-width: 1400px; margin: 0 auto;
            display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 50px;
        }

        .footer-section h4 {
            font-family: 'Lexend Exa', sans-serif; font-size: 1.2em;
            color: var(--dark); margin-bottom: 25px; position: relative;
        }

        .footer-section h4::after {
            content: ''; position: absolute; left: 0; bottom: -8px;
            width: 40px; height: 3px; background: var(--primary);
        }

        .footer-section p, .footer-section li { font-size: 0.95em; color: #666; margin-bottom: 12px; list-style: none; }
        .footer-section i { color: var(--primary); margin-right: 10px; width: 20px; }
        
        .social-icons { display: flex; gap: 15px; margin-top: 20px; }
        .social-icons a {
            width: 40px; height: 40px; background: white; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: var(--dark); border: 1px solid #ddd; transition: 0.3s; text-decoration: none;
        }
        .social-icons a:hover { background: var(--primary); color: white; border-color: var(--primary); }

        .copyright {
            text-align: center; margin-top: 60px; padding-top: 30px;
            border-top: 1px solid #ddd; font-size: 0.85em; color: #aaa;
        }

        /* --- RESPONSIVE ANDROID --- */
        @media (max-width: 991px) {
            .mobile-toggle { display: block; }
            .nav-links {
                position: fixed; top: 0; right: -100%;
                width: 80%; height: 100vh; background: white;
                flex-direction: column; justify-content: center;
                gap: 35px; transition: 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: -15px 0 35px rgba(0,0,0,0.1);
            }
            .nav-links.active { right: 0; }
            .nav-link { font-size: 1.1em; width: 80%; justify-content: center; }
            .brand-name { font-size: 1.4em; }
            .logo-nav { height: 48px; width: 48px; }
            .whatsapp-float { width: 55px; height: 55px; font-size: 28px; bottom: 20px; right: 20px; }
        }

        .main-wrapper { padding-top: var(--nav-h); min-height: 80vh; }
    </style>
</head>
<body>

    <a href="https://wa.me/261340000000" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <nav>
        <div class="nav-container">
            <div class="brand" id="secret-admin-trigger">
                <img src="https://i.ibb.co/F4Rzn41y/ecomada.jpg" alt="Logo" class="logo-nav">
                <span class="brand-name">Eecomada</span>
            </div>

            <div class="mobile-toggle" id="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </div>

            <div class="nav-links" id="nav-menu">
                <a href="/" class="nav-link"><i class="fas fa-home"></i> <span>Fandraisana</span></a>
                <a href="/tolotra" class="nav-link"><i class="fas fa-leaf"></i> <span>Tolotra</span></a>
                <a href="/info" class="nav-link"><i class="fas fa-info-circle"></i> <span>Info</span></a>
                <a href="/contact" class="nav-link"><i class="fas fa-envelope"></i> <span>Contact</span></a>
                <a href="/fidirana" class="nav-link btn-client">FIDIRANA</a>
            </div>
        </div>
    </nav>

    <div class="main-wrapper">
        @yield('content')
    </div>

    <footer>
        <div class="footer-grid">
            <div class="footer-section" data-aos="fade-up">
                <h4>Momba an'i Eecomada</h4>
                <p>Orinasa mijoro ara-dalana,manao asa fampandrosoana.Misehatra manokana amin'ny fampanofana jiro azo fahanana sy fivarotana,fitaovana maro samihafa mandeha amin'ny herin'ny masoandro.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f" style="margin:0"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in" style="margin:0"></i></a>
                    <a href="#"><i class="fab fa-instagram" style="margin:0"></i></a>
                </div>
            </div>

            <div class="footer-section" data-aos="fade-up" data-aos-delay="100">
                <h4>Rohy Haingana</h4>
                <ul>
                    <li><a href="/tolotra" style="text-decoration:none; color:inherit">Ny Tolotray</a></li>
                    <li><a href="/fidirana" style="text-decoration:none; color:inherit">Fidirana Mpanjifa</a></li>
                    <li><a href="/info" style="text-decoration:none; color:inherit">Momba anay</a></li>
                </ul>
            </div>

            <div class="footer-section" data-aos="fade-up" data-aos-delay="200">
                <h4>Fifandraisana</h4>
                <p><i class="fas fa-map-marker-alt"></i> Antananarivo, Madagascar,Andravoahangy Tsena</p>
                <p><i class="fas fa-phone"></i> +261 34 16 406 29</p>
                <p><i class="fas fa-envelope"></i> ecomada01@gmail.com</p>
                <p><i class="fas fa-clock"></i> Mon - Fri: 08:00 - 17:00</p>
            </div>
        </div>
        <div class="copyright">
            &copy; 2026 <strong>ECOMADA</strong>. All Rights Reserved. Designed for Excellence.
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        // --- SECRET TRIPLE CLICK LOGIC ---
        const trigger = document.getElementById('secret-admin-trigger');
        let clicks = 0;
        let timer;

        trigger.addEventListener('click', () => {
            clicks++;
            if (clicks === 3) {
                const pass = prompt("Access Restricted. Password:");
                if (pass === "eco2026") {
                    window.location.href = "/admin"; // Na ny route admin-nao
                } else if (pass !== null) {
                    alert("Diso ny teny miafina!");
                }
                clicks = 0;
            }
            clearTimeout(timer);
            timer = setTimeout(() => { clicks = 0; }, 1000);
        });

        // --- MOBILE MENU ---
        const menuBtn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('nav-menu');
        menuBtn.addEventListener('click', () => {
            menu.classList.toggle('active');
            menuBtn.querySelector('i').classList.toggle('fa-bars');
            menuBtn.querySelector('i').classList.toggle('fa-times');
        });
    </script>
</body>
</html>
