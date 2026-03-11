@extends('base')

@section('content')

<style>
    /* --- CSS STYLER --- */
    :root { --primary: #7ac74f; --dark-green: #2d5a27; --white: #ffffff; }

    .info-header { text-align: center; margin: 60px 0 100px; }
    .info-badge { background: #e8f5e9; color: var(--primary); padding: 8px 25px; border-radius: 50px; font-weight: 900; font-size: 0.8rem; letter-spacing: 3px; }
    .info-main-title { font-family: 'Lexend Exa', sans-serif; font-size: clamp(2.5em, 8vw, 4.5em); color: #333; margin: 20px 0 10px; }
    .txt-green { color: var(--primary); }
    .info-underline { width: 100px; height: 6px; background: var(--primary); margin: 0 auto; border-radius: 10px; box-shadow: 0 5px 15px rgba(122, 199, 79, 0.3); }
    .info-slogan { margin-top: 25px; color: var(--primary); font-weight: 800; letter-spacing: 5px; font-size: 0.9rem; }

    /* VISION SECTION */
    .vision-section { display: flex; align-items: center; gap: 80px; margin-bottom: 120px; flex-wrap: wrap; }
    .vision-img-box { flex: 1; min-width: 320px; position: relative; }
    .img-frame { position: absolute; top: -25px; left: -25px; width: 100%; height: 100%; border: 3px solid var(--primary); border-radius: 40px; z-index: -1; }
    .vision-img-box img { width: 100%; border-radius: 40px; box-shadow: 0 30px 60px rgba(0,0,0,0.15); }
    .floating-stat { position: absolute; bottom: 30px; right: -20px; background: var(--primary); color: white; padding: 20px; border-radius: 25px; text-align: center; box-shadow: 0 15px 30px rgba(122, 199, 79, 0.4); }
    .stat-num { display: block; font-size: 1.8rem; font-weight: 900; font-family: 'Lexend Exa'; }
    .stat-txt { font-size: 0.6rem; font-weight: 700; letter-spacing: 1px; }

    .vision-text-box { flex: 1.2; min-width: 320px; }
    .section-h2 { font-family: 'Lexend Exa'; font-size: 2.5rem; color: #333; margin-bottom: 20px; }
    .green-divider { width: 60px; height: 4px; background: var(--primary); margin-bottom: 30px; }
    .p-story { font-size: 1.1rem; line-height: 2; color: #555; margin-bottom: 30px; }
    .feature-item-mini { display: flex; align-items: center; gap: 15px; margin-bottom: 15px; font-weight: 700; color: var(--dark-green); }
    .feature-item-mini i { color: var(--primary); font-size: 1.2rem; }

    /* VALUE CARDS */
    .values-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px; margin-bottom: 120px; }
    .value-card { background: #fff; padding: 60px 40px; border-radius: 45px; text-align: center; border: 2px solid #f0f0f0; transition: 0.4s ease; }
    .value-card:hover { transform: translateY(-15px); border-color: var(--primary); box-shadow: 0 30px 60px rgba(122, 199, 79, 0.1); }
    .active-card { background: #f9fdf9; border-color: var(--primary); }
    .value-icon-circle { width: 80px; height: 80px; background: #e8f5e9; color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 30px; font-size: 2rem; transition: 0.3s; }
    .value-card:hover .value-icon-circle { background: var(--primary); color: white; transform: rotateY(180deg); }

    /* GALLERY */
    .gallery-section { margin-bottom: 100px; }
    .gallery-item { position: relative; border-radius: 35px; overflow: hidden; height: 350px; cursor: pointer; }
    .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: 0.8s; }
    .gallery-overlay { position: absolute; bottom: 0; left: 0; width: 100%; padding: 40px; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; transform: translateY(20px); opacity: 0; transition: 0.4s; }
    .gallery-item:hover .gallery-overlay { transform: translateY(0); opacity: 1; }
    .gallery-item:hover img { transform: scale(1.1); }
    .proj-tag { background: var(--primary); padding: 5px 15px; border-radius: 10px; font-size: 0.7rem; font-weight: 900; margin-bottom: 10px; display: inline-block; }
  
</style>
<div style="width: 100%; max-width: 1100px; margin: 50px auto; padding: 0 20px;" data-aos="fade-up">
    
    <div style="text-align: center; margin-bottom: 60px;">
        <h1 style="font-family: 'Playfair Display', serif; font-size: 3.5em; color: var(--dark);">Hifandray Aminay</h1>
        <div style="width: 80px; height: 5px; background: var(--primary); margin: 20px auto; border-radius: 10px;"></div>
        <p style="color: #666; font-size: 1.1em;">Vonona hamaly ny fanontanianao rehetra izahay.</p>
    </div>

    <div style="display: flex; gap: 40px; flex-wrap: wrap; align-items: stretch;">
        <div class="gallery-section">
            <div class="gallery-grid">
                <div style="flex: 1.5; min-width: 320px; background: white; padding: 40px; border-radius: 35px; box-shadow: 0 20px 50px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
                    <div class="gallery-item large" data-aos="fade-up">
                        <img src="https://i.ibb.co/B5Yqt6fg/Gemini-Generated-Image-7onr6y7onr6y7onr.png" alt="Solaire Project">
                        <div class="gallery-overlay">
                            <span class="proj-tag">SOLAIRE 2026</span>
                            <h3>Fampiofanana</h3>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <form action="/contact" method="POST">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                    <div>
                        <label style="display: block; margin-bottom: 10px; font-weight: 700; color: #555;">Anarana</label>
                        <input type="text" name="name" placeholder="Anaranao" required style="width: 100%; padding: 15px; border-radius: 15px; border: 1px solid #eee; background: #f9fbf9; outline: none;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 10px; font-weight: 700; color: #555;">Email</label>
                        <input type="email" name="email" placeholder="mail@example.com" required style="width: 100%; padding: 15px; border-radius: 15px; border: 1px solid #eee; background: #f9fbf9; outline: none;">
                    </div>
                </div>
                <div style="margin-bottom: 25px;">
                    <label style="display: block; margin-bottom: 10px; font-weight: 700; color: #555;">Hafatra</label>
                    <textarea name="message" rows="6" placeholder="Inona ny fanontanianao?" required style="width: 100%; padding: 15px; border-radius: 15px; border: 1px solid #eee; background: #f9fbf9; font-family: inherit; outline: none; resize: none;"></textarea>
                </div>
                <button type="submit" style="width: 100%; padding: 20px; background: var(--primary); color: white; border: none; border-radius: 15px; font-weight: 800; cursor: pointer; transition: 0.3s; box-shadow: 0 10px 20px rgba(76, 175, 80, 0.2);">
                    ALAFASO NY HAFATRA <i class="fas fa-paper-plane" style="margin-left: 10px;"></i>
                </button>
            </form> --}}
        </div>

        <div style="flex: 1; min-width: 300px; display: flex; flex-direction: column; gap: 20px;">
            <div style="background: var(--dark); color: white; padding: 40px; border-radius: 35px; box-shadow: 0 20px 40px rgba(27, 94, 32, 0.15);">
                <h3 style="margin-bottom: 25px; font-family: 'Playfair Display', serif; font-size: 1.8em;">Coordonnées</h3>
                
                <div style="display: flex; flex-direction: column; gap: 20px; margin-bottom: 40px;">
                    <p>
                        <a href="tel:+261340000000" style="color: white; text-decoration: none; transition: 0.3s;" class="contact-link">
                            <i class="fas fa-phone-alt" style="margin-right: 15px; color: var(--primary);"></i> +261 34 00 000 00
                        </a>
                    </p>
                    <p>
                        <a href="mailto:contact@ecomada.mg" style="color: white; text-decoration: none; transition: 0.3s;" class="contact-link">
                            <i class="fas fa-envelope" style="margin-right: 15px; color: var(--primary);"></i> contact@ecomada.mg
                        </a>
                    </p>
                    <p>
                        <i class="fas fa-map-marker-alt" style="margin-right: 15px; color: var(--primary);"></i> Antananarivo, Madagascar
                    </p>
                </div>
                
                <h4 style="margin-bottom: 15px; font-size: 1em; opacity: 0.8; letter-spacing: 1px;">ARAHO IZAHAY:</h4>
                <div style="display: flex; gap: 15px;">
                    <a href="https://facebook.com/ecomada" target="_blank" class="social-btn" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://wa.me/261340000000" target="_blank" class="social-btn" title="WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://linkedin.com/company/ecomada" target="_blank" class="social-btn" title="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Animation ho an'ny bokotra sosialy */
    .social-btn {
        width: 45px; 
        height: 45px; 
        background: rgba(255,255,255,0.1); 
        border-radius: 50%; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        color: white; 
        text-decoration: none; 
        transition: all 0.3s ease;
    }

    .social-btn:hover {
        background: var(--primary);
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .contact-link:hover {
        color: var(--primary) !important;
        padding-left: 5px;
    }

    /* Optimisation ho an'ny finday */
    @media (max-width: 768px) {
        h1 { font-size: 2.5em !important; }
        .social-btn { width: 50px; height: 50px; } /* Lehibe kokoa amin'ny finday */
    }
</style>
@endsection