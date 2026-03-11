@extends('base')

@section('content')
    <div style="width: 100%; max-width: 1300px; margin: 0 auto; padding: 0 20px;">

        <div class="slider-wrapper" data-aos="zoom-in">
            <div class="slider">
                <div class="slides">
                    <div class="slide" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(122, 199, 79, 0.2)), url('https://i.ibb.co/F4Rzn41y/ecomada.jpg'); background-size: cover; background-position: center;">
                        <div class="slide-content">
                            <span class="badge-white">ECOMADA 2026</span>
                            <h2 class="slide-h2">HAZAVANA HO ANTSIKA REHETRA</h2>
                            <div class="line-glow"></div>
                            <p class="slide-p">Vahaolana Solaire maharitra sy azo antoka ho an'ny tokantrano.</p>
                        </div>
                    </div>
                    <div class="slide" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(122, 199, 79, 0.2)), url('https://i.ibb.co/CKm0y800/20210528-104242.jpg'); background-size: cover; background-position: center;">
                        <div class="slide-content">
                            <span class="badge-white">PARTENARIAT</span>
                            <h2 class="slide-h2">TOLOTRA FIARAHA-MIASA</h2>
                            <div class="line-glow"></div>
                            <p class="slide-p">Andao hiara-hiasa hampandroso ny tontolo iainana sy ny toekarena.</p>
                        </div>
                    </div>
                    <div class="slide" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(122, 199, 79, 0.2)), url('https://i.ibb.co/GvMCDxQn/Gemini-Generated-Image-cym4f0cym4f0cym4.png'); background-size: cover; background-position: center;">
                        <div class="slide-content">
                            <span class="badge-white">FORMATION</span>
                            <h2 class="slide-h2">FIOFANANA ARAK'ASA</h2>
                            <div class="line-glow"></div>
                            <p class="slide-p">Ampitomboina ny fahaizana amam-pahalalana eo amin'ny sehatry ny angovo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-header" data-aos="fade-up">
            <div class="title-flex">
                <span class="vertical-text">ECOMADA</span>
                <h1 class="styler-title">NY <span class="green-glow">TOLOTRAY</span></h1>
            </div>
            <p class="subtitle">Ny vahaolana tsara indrindra ho an'ny ho avy mamirapiratra</p>
        </div>

        <div class="services-grid">
            
            <div class="card-item" data-aos="fade-up" data-aos-delay="100">
                <div class="card-img-box">
                    <img src="https://i.ibb.co/cKkSkrCc/sary-fanehona.jpg" alt="Solaire">
                    <div class="card-overlay">HAZAVANA</div>
                </div>
                <div class="card-body">
                    <h3>Hazavana ho antsika rehetra</h3>
                    <p>Fametrahana sy fikojakojana fitaovana solaire manara-penitra sy mateza.</p>
                    <a href="/fidirana" class="btn-styler">Fangatahana <i class="fas fa-bolt"></i></a>
                </div>
            </div>

            <div class="card-item" data-aos="fade-up" data-aos-delay="200">
                <div class="card-img-box">
                    <img src="https://i.ibb.co/Gv5Y95WP/Gemini-Generated-Image-yzishsyzishsyzis.png" alt="Partnership">
                    <div class="card-overlay">COOPERATION</div>
                </div>
                <div class="card-body">
                    <h3>Tolotra fiaraha-miasa</h3>
                    <p>Miaraka amin'ireo orinasa sy fikambanana mitsinjo ny tontolo iainana.</p>
                    <a href="/fidirana" class="btn-styler">Hifandray <i class="fas fa-handshake"></i></a>
                </div>
            </div>

            <div class="card-item" data-aos="fade-up" data-aos-delay="300">
                <div class="card-img-box">
                    <img src="https://i.ibb.co/sJckNqk7/Gemini-Generated-Image-39q1cl39q1cl39q1.png" alt="Training">
                    <div class="card-overlay">EDUCATION</div>
                </div>
                <div class="card-body">
                    <h3>Fiofanana arak'asa</h3>
                    <p>Fampianarana momba ny teknika vaovao sy ny fampiasana ny angovo madio.</p>
                    <a href="/fidirana" class="btn-styler">Hiditra <i class="fas fa-graduation-cap"></i></a>
                </div>
            </div>

        </div>
    </div>

    <style>
        /* SLIDER STYLE */
        .slider-wrapper { position: relative; width: 100%; height: 550px; border-radius: 50px; overflow: hidden; margin-bottom: 70px; box-shadow: 0 30px 60px rgba(122, 199, 79, 0.2); }
        .slides { display: flex; width: 300%; height: 100%; animation: slideFlow 20s infinite ease-in-out; }
        .slide { width: 33.333%; height: 100%; display: flex; align-items: center; justify-content: center; }
        .slide-content { text-align: center; padding: 40px; }
        .badge-white { background: #fff; color: #7ac74f; padding: 6px 20px; border-radius: 30px; font-weight: 900; font-size: 0.8rem; letter-spacing: 2px; }
        .slide-h2 { font-family: 'Lexend Exa', sans-serif; font-size: clamp(2em, 5vw, 4em); color: #fff; margin: 25px 0 15px; font-weight: 900; text-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        .line-glow { width: 120px; height: 4px; background: #7ac74f; margin: 0 auto 20px; box-shadow: 0 0 15px #7ac74f; }
        .slide-p { color: #fff; font-size: 1.2rem; font-weight: 400; max-width: 600px; }

        @keyframes slideFlow {
            0%, 25% { transform: translateX(0%); }
            33%, 58% { transform: translateX(-33.333%); }
            66%, 91% { transform: translateX(-66.666%); }
            100% { transform: translateX(0%); }
        }

        /* HEADER STYLE */
        .main-header { text-align: center; margin-bottom: 60px; position: relative; }
        .title-flex { display: flex; align-items: center; justify-content: center; gap: 20px; }
        .vertical-text { writing-mode: vertical-rl; transform: rotate(180deg); color: #7ac74f; font-weight: 900; font-size: 0.7rem; letter-spacing: 5px; opacity: 0.5; }
        .styler-title { font-family: 'Lexend Exa'; font-size: clamp(2em, 6vw, 3rem); color: #333; margin: 0; }
        .green-glow { color: #7ac74f; font-weight: 900; text-shadow: 0 0 20px rgba(122, 199, 79, 0.3); }
        .subtitle { color: #7ac74f; font-weight: 700; text-transform: uppercase; letter-spacing: 5px; font-size: 0.8rem; margin-top: 10px; }

        /* GRID SERVICES */
        .services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px; margin-bottom: 100px; }
        .card-item { background: #fff; border-radius: 40px; overflow: hidden; border: 2px solid #f0f0f0; transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .card-item:hover { transform: translateY(-20px); border-color: #7ac74f; box-shadow: 0 30px 50px rgba(122, 199, 79, 0.15); }
        
        .card-img-box { height: 260px; position: relative; overflow: hidden; }
        .card-img-box img { width: 100%; height: 100%; object-fit: cover; transition: 0.6s ease; }
        .card-item:hover .card-img-box img { transform: scale(1.15); }
        .card-overlay { position: absolute; top: 20px; left: 20px; background: rgba(122, 199, 79, 0.9); color: #fff; padding: 5px 15px; border-radius: 10px; font-weight: 900; font-size: 0.7rem; letter-spacing: 2px; }

        .card-body { padding: 35px; text-align: left; }
        .card-body h3 { font-family: 'Lexend Exa'; font-size: 1.3rem; color: #333; margin-bottom: 15px; }
        .card-body p { color: #666; line-height: 1.8; margin-bottom: 25px; }

        .btn-styler { 
            display: inline-flex; align-items: center; gap: 10px; background: #7ac74f; color: #fff; 
            text-decoration: none; padding: 12px 30px; border-radius: 20px; font-weight: 800; font-size: 0.85rem;
            box-shadow: 0 10px 20px rgba(122, 199, 79, 0.3); transition: 0.3s;
        }
        .btn-styler:hover { background: #333; transform: scale(1.05); }

        @media (max-width: 768px) {
            .slider-wrapper { height: 400px; border-radius: 30px; }
            .slide-h2 { font-size: 1.8rem; }
            .services-grid { grid-template-columns: 1fr; }
        }
    </style>
@endsection