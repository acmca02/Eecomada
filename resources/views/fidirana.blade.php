@extends('base')

@section('content')
<div style="width: 100%; display: flex; justify-content: center; align-items: center; padding: 60px 0; background: linear-gradient(135deg, #f9fbf9 0%, #e8f5e9 100%); min-height: 80vh;">
    
    <div id="login-card" style="width: 100%; max-width: 550px; background: white; padding: 50px 45px; border-radius: 40px; box-shadow: 0 30px 80px rgba(0,0,0,0.1); border: 1px solid #ffffff; text-align: center;" data-aos="zoom-in">
        
        <div style="margin-bottom: 30px;">
            <img src="https://i.ibb.co/F4Rzn41y/ecomada.jpg" alt="Logo" style="width: 100px; border-radius: 25px; box-shadow: 0 10px 20px rgba(0,0,0,0.05);">
        </div>
        
        <h2 style="font-family: 'Playfair Display', serif; font-size: 2.5em; color: #1b5e20; margin-bottom: 10px;">Fidirana Client</h2>
        <p style="color: #666; margin-bottom: 40px; font-size: 1em; line-height: 1.6;">Tena faly izahay handray anao. </p>

        <form action="/fidirana" method="POST" id="requestForm">
            @csrf
            <div style="text-align: left; margin-bottom: 22px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 700; font-size: 0.85em; color: #444; text-transform: uppercase; letter-spacing: 1px;">Anarana feno</label>
                <div style="position: relative;">
                    <i class="fas fa-user" style="position: absolute; left: 20px; top: 18px; color: #2ecc71;"></i>
                    <input type="text" name="anarana" required placeholder="Anaranao..." style="width: 100%; padding: 18px 18px 18px 55px; border-radius: 18px; border: 2px solid #f0f0f0; background: #fcfdfe; outline: none; transition: 0.3s; font-size: 1em;">
                </div>
            </div>

            <div style="text-align: left; margin-bottom: 22px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 700; font-size: 0.85em; color: #444; text-transform: uppercase; letter-spacing: 1px;">Laharana finday</label>
                <div style="position: relative;">
                    <i class="fas fa-phone-alt" style="position: absolute; left: 20px; top: 18px; color: #2ecc71;"></i>
                    <input type="tel" name="numero" required placeholder="034 XX XXX XX" style="width: 100%; padding: 18px 18px 18px 55px; border-radius: 18px; border: 2px solid #f0f0f0; background: #fcfdfe; outline: none; font-size: 1em;">
                </div>
            </div>

            <div style="text-align: left; margin-bottom: 22px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 700; font-size: 0.85em; color: #444; text-transform: uppercase; letter-spacing: 1px;">Toerana fonenana (Adresse)</label>
                <div style="position: relative;">
                    <i class="fas fa-map-marker-alt" style="position: absolute; left: 20px; top: 18px; color: #2ecc71;"></i>
                    <input type="text" name="toerana" required placeholder="Ohatra: Antananarivo, Itaosy..." style="width: 100%; padding: 18px 18px 18px 55px; border-radius: 18px; border: 2px solid #f0f0f0; background: #fcfdfe; outline: none; font-size: 1em;">
                </div>
            </div>

            <div style="text-align: left; margin-bottom: 35px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 700; font-size: 0.85em; color: #444; text-transform: uppercase; letter-spacing: 1px;">Ny fangatahanao</label>
                <textarea name="fangatahana" required rows="4" placeholder="Soraty eto amin'ny antsipiriany ny zavatra ilainao..." style="width: 100%; padding: 20px; border-radius: 18px; border: 2px solid #f0f0f0; background: #fcfdfe; outline: none; font-family: inherit; resize: none; font-size: 1em;"></textarea>
            </div>

            <button type="submit" id="submitBtn" onclick="animateButton()" style="width: 100%; padding: 20px; background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%); color: white; border: none; border-radius: 20px; font-weight: 800; font-size: 1.1em; cursor: pointer; transition: 0.4s; box-shadow: 0 15px 30px rgba(46, 204, 113, 0.3); letter-spacing: 1px;">
                <i class="fas fa-paper-plane" style="margin-right: 12px;"></i> HANDREFA FANGATAHANA
            </button>
        </form>

        

        @if(session('success'))
            <div id="successMessage" style="display: none; margin-top: 30px; background: #e8f5e9; padding: 30px; border-radius: 25px; border: 2px solid #2ecc71;">
                <i class="fas fa-check-circle" style="font-size: 3.5em; color: #2ecc71; margin-bottom: 15px;"></i>
                <h3 style="color: #1b5e20; font-size: 1.5em;">Voaray ny fangatahana!</h3>
                <p style="color: #444; margin-top: 12px; font-size: 1em; line-height: 1.6;">
                    Efa tonga any amin'ny Admin ny hafatrao. Hisy hiantso anao izahay afaka fotoana fohy. Mankasitraka!
                </p>
            </div>
        @endif
    </div>
</div>

<script>
function animateButton() {
    const btn = document.getElementById('submitBtn');
    // Rehefa kitihi'ilay olona dia miova ho toa miandry kely aloha izy mialoha ny hio-refresh
    btn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Eo am-pandefasana...';
    btn.style.opacity = '0.8';
}
</script>

<style>
    input:focus, textarea:focus {
        border-color: #2ecc71 !important;
        background: white !important;
        box-shadow: 0 0 15px rgba(46, 204, 113, 0.1);
    }
</style>
@endsection
