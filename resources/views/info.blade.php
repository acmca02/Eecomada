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
    .gallery-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 25px; margin-top: 50px; }
    .gallery-item { position: relative; border-radius: 35px; overflow: hidden; height: 350px; cursor: pointer; }
    .gallery-item.large { grid-column: span 2; height: 450px; }
    .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: 0.8s; }
    .gallery-overlay { position: absolute; bottom: 0; left: 0; width: 100%; padding: 40px; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white; transform: translateY(20px); opacity: 0; transition: 0.4s; }
    .gallery-item:hover .gallery-overlay { transform: translateY(0); opacity: 1; }
    .gallery-item:hover img { transform: scale(1.1); }
    .proj-tag { background: var(--primary); padding: 5px 15px; border-radius: 10px; font-size: 0.7rem; font-weight: 900; margin-bottom: 10px; display: inline-block; }
    
    .video-box { background: #000; display: flex; align-items: center; justify-content: center; }
    .video-box img { opacity: 0.5; }
    .play-btn { position: absolute; width: 80px; height: 80px; background: var(--white); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; z-index: 5; box-shadow: 0 0 30px rgba(255,255,255,0.4); transition: 0.3s; }
    .video-box:hover .play-btn { transform: scale(1.2); background: var(--primary); color: white; }

    @media (max-width: 992px) {
        .gallery-grid { grid-template-columns: 1fr; }
        .gallery-item.large { grid-column: span 1; height: 350px; }
        .vision-section { gap: 40px; }
        .info-main-title { font-size: 2.8rem; }
    }
</style>

<div class="info-master-wrapper" style="width: 100%; max-width: 1300px; margin: 0 auto; padding: 0 20px;">

    <div class="info-header" data-aos="zoom-out">
        <span class="info-badge">EecoMada</span>
        <h1 class="info-main-title">NY <span class="txt-green">TANTARANAY</span></h1>
        <div class="info-underline"></div>
        <p class="info-slogan">MIASA HO AN'NY HO AVY MAITSO SY MADIO</p>
    </div>

    <div class="vision-section">
        <div class="vision-img-box" data-aos="fade-right">
            <div class="img-frame"></div>
            <img src="https://i.ibb.co/Vn5JRJX/Gemini-Generated-Image-srvs2srvs2srvs2s.png" alt="Ecomada Vision">
            <div class="floating-stat">
                <span class="stat-num">100%</span>
                <span class="stat-txt">NATURAL ENERGY</span>
            </div>
        </div>
        <div class="vision-text-box" data-aos="fade-left">
            <h2 class="section-h2">Iza moa i<span class="txt-green">EecoMada</span></h2>
            <div class="green-divider"></div>
            <p class="p-story">
                Energie Ecologique de MADAGASCAR na  (EEcoMADA)  dia Orinasa mijoro ara-dalana,manaao asa fampandrosoana.Misehatra manokana amin'ny fampanofana jiro azo fahanana sy fivarotana ,fitaovana maro samihafa mandeha amin'ny herin'ny masoandro. Niorina ny taona 2018 ny orinasa ary efa manana kiosika fampanofana jiro mihaotran'ny50 misandrahaka amin'ny faritra 05 eto Madagasikara ary  mbola manohy ny fanitarana izany tetik'asa izany hatramin'izao ho fanomezana hazavana ho an'ny isan-tokatrano
            </p>
            <div class="feature-item-mini">
                <i class="fas fa-leaf"></i>
                <span>Loharam-bola maharitra.</span>
            </div>
            <div class="feature-item-mini">
                <i class="fas fa-sun"></i>
                <span>Tohana ara-barotra sy fampitaovana.</span>
            </div>
        </div>
    </div>

    <div class="values-grid">
        <div class="value-card" data-aos="fade-up" data-aos-delay="100">
            <div class="value-icon-circle"><i class="fas fa-shield-halved"></i></div>
            <h3>Tohana ara-barotra sy fampitaovana</h3>
            <p>Tazominay foana ny kalitao sy ny fahatokisana amin'ny asa rehetra ataonay.</p>
        </div>
        <div class="value-card active-card" data-aos="fade-up" data-aos-delay="200">
            <div class="value-icon-circle"><i class="fas fa-heart-pulse"></i></div>
            <h3>Loharanom-mbola maharitra</h3>
            <p>Hatramin'ny 1000000ar na mihaotra isam-bolana ny karama raha manao ezaka tsara.</p>
        </div>
        <div class="value-card" data-aos="fade-up" data-aos-delay="300">
            <div class="value-icon-circle"><i class="fas fa-bolt-lightning"></i></div>
            <h3>Fisokafana amin'ny varotra entana</h3>
            <p>Mandeha aminy hery masoandro maro samiafa .</p>
        </div>
    </div>

    <div class="gallery-section">
        <h2 class="section-h2 text-center">Galerian'ny <span class="txt-green">Tetikasa</span></h2>
        <div class="gallery-grid">
            <div class="gallery-item large" data-aos="fade-up">
                <img src="https://i.ibb.co/B5Yqt6fg/Gemini-Generated-Image-7onr6y7onr6y7onr.png" alt="Solaire Project">
                <div class="gallery-overlay">
                    <span class="proj-tag">SOLAIRE 2026</span>
                    <h3>Fampiofanana</h3>
                </div>
            </div>
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                <img src="https://i.ibb.co/GvMCDxQn/Gemini-Generated-Image-cym4f0cym4f0cym4.png" alt="Nature Project">
                <div class="gallery-overlay">
                    <span class="proj-tag">ECOLOGY</span>
                    <h3>Lampe solair Modernina</h3>
                </div>
            </div>
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1466611653911-95282fc3656b?q=80&w=1000" alt="Nature Project">
                <div class="gallery-overlay">
                    <span class="proj-tag">ECOLOGY</span>
                    <h3>Sary </h3>
                </div>
            </div>
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1466611653911-95282fc3656b?q=80&w=1000" alt="Nature Project">
                <div class="gallery-overlay">
                    <span class="proj-tag">ECOLOGY</span>
                    <h3>Sary 2</h3>
                </div>
            </div>
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1466611653911-95282fc3656b?q=80&w=1000" alt="Nature Project">
                <div class="gallery-overlay">
                    <span class="proj-tag">ECOLOGY</span>
                    <h3>Sary 3</h3>
                </div>
            </div>
            <div class="gallery-item" data-aos="fade-up" data-aos-delay="100">
                <img src="https://images.unsplash.com/photo-1466611653911-95282fc3656b?q=80&w=1000" alt="Nature Project">
                <div class="gallery-overlay">
                    <span class="proj-tag">ECOLOGY</span>
                    <h3>Sary 4</h3>
                </div>
            </div>
            {{-- <div class="gallery-item video-box" data-aos="fade-up" data-aos-delay="200">
                <div class="play-btn"><i class="fas fa-play"></i></div>
                <img src="https://images.unsplash.com/photo-1466611653911-95282fc3656b?q=80&w=1000" alt="Video">
                <div class="gallery-overlay">
                    <h3>Jereo ny horonan-tsary</h3>
                </div>
            </div> --}}
        </div>
    </div>

</div>

@endsection