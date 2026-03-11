@extends('base')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@400;900&family=Plus+Jakarta+Sans:wght@300;600;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<div class="ecomada-unified-wrapper">

    <section class="hero-section">
        <div class="hero-slideshow">
            <div class="slide-item active" style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.4)), url('https://i.ibb.co/39cNVSfC/sary-ecomada.jpg');"></div>
            <div class="slide-item" style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.4)), url('https://i.ibb.co/sJckNqk7/Gemini-Generated-Image-39q1cl39q1cl39q1.png');"></div>
        </div>
        
        <div class="hero-glass-box" data-aos="zoom-in">
            <div class="hero-logo-container">
                <img src="https://i.ibb.co/F4Rzn41y/ecomada.jpg" alt="Logo Ecomada" class="hero-logo-anim">
            </div>
            <h1 class="hero-main-title">Eecomada</h1>
            <p class="hero-slogan-text">HAZAVANA HO ANTSIKA REHETRA</p>
            
            <div class="hero-cta-group">
                <a href="#vaovao" class="btn-primary-green">NY TOLOTRAY</a>
                <a href="/fidirana" class="btn-outline-crystal">HIDITRA CLIENT</a>
            </div>
        </div>
    </section>

    <section id="vaovao" class="feed-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="title-cyber">Ny <span class="txt-green">Tetikasa</span> Vaovao</h2>
                <div class="title-underline"></div>
            </div>

            <div class="styler-grid">
                @foreach ($posts as $post)
                    <div class="pub-card-modern" data-aos="fade-up">
                        <div class="pub-media-box">
                            <div class="category-badge">VAOVAO</div>

                            @if ($post->file_path)
                                @if ($post->file_type === 'image')
                                    <img src="{{ asset('storage/' . $post->file_path) }}" class="img-responsive" alt="">
                                @elseif ($post->file_type === 'video')
                                    <div class="video-trigger" onclick="openLightbox('{{ asset('storage/' . $post->file_path) }}')">
                                        <video muted loop playsinline autoplay controls preload="metadata"  class="video-preview-bg">
                                            <source src="{{ asset('storage/' . $post->file_path) }}" type="video/mp4">
                                        </video>
                                        <div class="play-overlay-icon">
                                            <div class="icon-circle">
                                                <i class="fas fa-play"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>

                        <div class="pub-content-box">
                            <h3 class="pub-title-green">{{ strtoupper($post->titre) }}</h3>

                            <div class="pub-text-body">
                                @php
                                    $lines = explode("\n", $post->content);
                                @endphp

                                @foreach ($lines as $line)
                                    @php
                                        $trimmed = trim($line);
                                    @endphp

                                    @if (str_starts_with($trimmed, '*'))
                                        <div class="feature-item">
                                            <i class="fas fa-check-circle"></i>
                                            {{ substr($trimmed, 1) }}
                                        </div>
                                    @elseif ($trimmed !== '')
                                        <p>{{ Str::limit($trimmed, 140) }}</p>
                                    @endif
                                @endforeach
                            </div>

                            <div class="pub-meta">
                                <span class="date-label">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ optional($post->date_pub)->format('d.m.Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>

<div id="videoLightbox" class="lightbox-wrapper" onclick="closeLightbox()">
    <div class="lightbox-body" onclick="event.stopPropagation()">
        <span class="btn-close-lightbox" onclick="closeLightbox()">&times;</span>
        <div class="video-responsive-container">
            <video id="lightboxVideo" controls autoplay>
                <source src="" type="video/mp4">
            </video>
        </div>
    </div>
</div>

<style>
    :root { --green-main: #7ac74f; --dark-bg: #121212; }

    body { font-family: 'Plus Jakarta Sans', sans-serif; background: #ffffff; margin: 0; }
    .ecomada-unified-wrapper { margin-top: -85px; }

    /* --- HERO STYLES (NO BLUR) --- */
    .hero-section { height: 100vh; position: relative; display: flex; align-items: center; justify-content: center; overflow: hidden; }
    .hero-slideshow { position: absolute; inset: 0; z-index: 1; }
    .slide-item { position: absolute; inset: 0; background-size: cover; background-position: center; opacity: 0; transition: opacity 2s ease; }
    .slide-item.active { opacity: 1; }

    .hero-glass-box { 
        position: relative; z-index: 10; padding: 50px; border-radius: 40px;
        background: rgba(0, 0, 0, 0.45); /* Mangarahara madio */
        border: 2px solid rgba(122, 199, 79, 0.6);
        text-align: center; box-shadow: 0 20px 60px rgba(0,0,0,0.5);
        max-width: 800px; width: 90%;
    }
    .hero-logo-anim { width: 120px; border-radius: 50%; border: 4px solid var(--green-main); animation: floatAnim 3s infinite ease-in-out; }
    @keyframes floatAnim { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-15px); } }

    .hero-main-title { font-family: 'Lexend Exa'; font-size: clamp(3rem, 8vw, 5.5rem); color: var(--green-main); margin: 15px 0; text-shadow: 0 5px 15px rgba(0,0,0,0.8); font-weight: 900; }
    .hero-slogan-text { color: #fff; letter-spacing: 6px; font-weight: 700; text-transform: uppercase; margin-bottom: 35px; }

    .btn-primary-green { background: var(--green-main); color: white; padding: 16px 45px; border-radius: 50px; text-decoration: none; font-weight: 800; display: inline-block; transition: 0.3s; box-shadow: 0 10px 25px rgba(122, 199, 79, 0.4); }
    .btn-outline-crystal { border: 2px solid #fff; color: #fff; padding: 14px 45px; border-radius: 50px; text-decoration: none; font-weight: 800; display: inline-block; margin-left: 15px; transition: 0.3s; }
    .btn-primary-green:hover, .btn-outline-crystal:hover { transform: translateY(-5px); background: #fff; color: var(--green-main); }

    /* --- PUBLICATIONS GRID --- */
    .feed-section { padding: 100px 0; background: #fafafa; }
    .title-cyber { font-family: 'Lexend Exa'; font-size: 2.4rem; text-align: center; color: #1a1a1a; }
    .txt-green { color: var(--green-main); }
    .title-underline { width: 70px; height: 5px; background: var(--green-main); margin: 15px auto 60px; border-radius: 10px; }

    .styler-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(380px, 1fr)); gap: 40px; }
    .pub-card-modern { 
        background: #fff; border-radius: 40px; overflow: hidden; 
        box-shadow: 0 15px 45px rgba(0,0,0,0.06); transition: 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid #eee;
    }
    .pub-card-modern:hover { transform: translateY(-15px); box-shadow: 0 30px 60px rgba(0,0,0,0.12); border-color: var(--green-main); }

    .pub-media-box { height: 260px; position: relative; overflow: hidden; background: #000; }
    .img-responsive { width: 100%; height: 100%; object-fit: cover; transition: 0.6s; }
    .pub-card-modern:hover .img-responsive { transform: scale(1.1); }
    .category-badge { position: absolute; top: 20px; left: 20px; background: var(--green-main); color: #fff; padding: 6px 18px; border-radius: 12px; font-weight: 900; font-size: 0.7rem; z-index: 5; box-shadow: 0 5px 15px rgba(122, 199, 79, 0.3); }

    .video-trigger { height: 100%; cursor: pointer; position: relative; }
    .video-preview-bg { width: 100%; height: 100%; object-fit: cover; opacity: 0.75; }
    .play-overlay-icon { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,0.2); }
    .icon-circle { width: 65px; height: 65px; background: var(--green-main); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; box-shadow: 0 0 25px var(--green-main); transition: 0.3s; }

    .pub-content-box { padding: 35px; }
    .pub-title-green { font-family: 'Lexend Exa'; font-size: 1.4rem; color: var(--green-main); margin-bottom: 20px; letter-spacing: -0.5px; }
    .feature-item { color: #444; font-size: 0.95rem; margin-bottom: 10px; display: flex; align-items: center; gap: 10px; font-weight: 600; }
    .feature-item i { color: var(--green-main); font-size: 1.1rem; }
    .pub-text-body p { color: #666; line-height: 1.7; font-size: 1rem; }
    .pub-meta { margin-top: 25px; padding-top: 20px; border-top: 1px solid #f0f0f0; }
    .date-label { font-size: 0.85rem; color: #aaa; font-weight: 700; }

    /* --- LIGHTBOX (CENTERED) --- */
    .lightbox-wrapper { position: fixed; inset: 0; background: rgba(0,0,0,0.96); display: none; align-items: center; justify-content: center; z-index: 9999; backdrop-filter: blur(12px); }
    .lightbox-body { width: 92%; max-width: 1100px; position: relative; border-radius: 35px; border: 2px solid var(--green-main); overflow: hidden; box-shadow: 0 0 50px rgba(122, 199, 79, 0.3); animation: zoomIn 0.35s ease; }
    @keyframes zoomIn { from { transform: scale(0.8); opacity: 0; } to { transform: scale(1); opacity: 1; } }
    .video-responsive-container { position: relative; padding-top: 56.25%; background: #000; }
    #lightboxVideo { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
    .btn-close-lightbox { position: absolute; top: 20px; right: 25px; color: #fff; font-size: 3rem; cursor: pointer; z-index: 100; transition: 0.3s; }
    .btn-close-lightbox:hover { color: var(--green-main); transform: rotate(90deg); }
</style>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });

    // Hero Slideshow Logic
    let currentSlide = 0;
    const allSlides = document.querySelectorAll('.slide-item');
    setInterval(() => {
        allSlides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % allSlides.length;
        allSlides[currentSlide].classList.add('active');
    }, 6000);

    // Lightbox Control Functions
    function openLightbox(videoSrc) {
        const wrapper = document.getElementById('videoLightbox');
        const videoElement = document.getElementById('lightboxVideo');
        videoElement.src = videoSrc;
        wrapper.style.display = 'flex';
        videoElement.play();
    }
    function closeLightbox() {
        const wrapper = document.getElementById('videoLightbox');
        const videoElement = document.getElementById('lightboxVideo');
        wrapper.style.display = 'none';
        videoElement.pause();
        videoElement.src = "";
    }
</script>
@endsection