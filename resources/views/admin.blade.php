@extends('base')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary: #2ecc71;
        --secondary: #27ae60;
        --dark: #1a1a1a;
        --light-bg: #f4f7f6;
        --white: #ffffff;
        --danger: #ff4757;
        --glass: rgba(255, 255, 255, 0.9);
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: var(--light-bg);
        margin: 0;
        color: var(--dark);
    }

    .admin-layout {
        display: flex;
        min-height: 100vh;
    }

    /* --- SIDEBAR --- */
    .sidebar {
        width: 260px;
        background: var(--dark);
        color: white;
        padding: 30px 20px;
        position: fixed;
        height: 100%;
        z-index: 100;
    }

    .sidebar h2 {
        color: var(--primary);
        font-weight: 800;
        font-size: 1.6rem;
        margin-bottom: 40px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .nav-item {
        padding: 14px 18px;
        color: #adb5bd;
        display: flex;
        align-items: center;
        gap: 15px;
        text-decoration: none;
        transition: all 0.3s ease;
        border-radius: 12px;
        margin-bottom: 8px;
        font-weight: 500;
    }

    .nav-item:hover, .nav-item.active {
        background: rgba(46, 204, 113, 0.15);
        color: var(--primary);
    }

    /* --- MAIN CONTENT --- */
    .main-content {
        margin-left: 260px;
        flex: 1;
        padding: 40px;
    }

    .dashboard-header {
        margin-bottom: 30px;
    }

    /* --- STAT CARDS --- */
    .header-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: var(--white);
        padding: 25px;
        border-radius: 24px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.02);
        display: flex;
        align-items: center;
        gap: 20px;
        border: 1px solid #edf2f7;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    /* --- FORMS & TABLES --- */
    .admin-grid {
        display: grid;
        grid-template-columns: 1.2fr 1.8fr;
        gap: 30px;
    }

    .glass-card {
        background: var(--white);
        padding: 30px;
        border-radius: 28px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.04);
        border: 1px solid #f0f0f0;
    }

    .form-label {
        font-weight: 700;
        margin-bottom: 10px;
        display: block;
        font-size: 0.9rem;
    }

    .input-style {
        width: 100%;
        padding: 14px 18px;
        border: 2px solid #f1f3f5;
        border-radius: 15px;
        margin-bottom: 20px;
        font-family: inherit;
        transition: 0.3s;
        box-sizing: border-box;
    }

    .input-style:focus {
        border-color: var(--primary);
        outline: none;
        background: #fcfdfd;
    }

    .btn-publish {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        border: none;
        padding: 16px;
        border-radius: 15px;
        font-weight: 700;
        cursor: pointer;
        width: 100%;
        box-shadow: 0 8px 20px rgba(46, 204, 113, 0.25);
        transition: 0.3s;
    }

    .btn-publish:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(46, 204, 113, 0.3);
    }

    /* --- CLIENT TABLE --- */
    .table-card {
        background: var(--white);
        border-radius: 28px;
        padding: 25px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.04);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        text-align: left;
        padding: 15px;
        color: #a0aec0;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 2px solid #f7fafc;
    }

    td {
        padding: 18px 15px;
        border-bottom: 1px solid #f7fafc;
        vertical-align: middle;
    }

    .client-info strong { display: block; font-size: 1rem; }
    .client-info small { color: #718096; }

    .badge-msg {
        background: #f1f3f5;
        padding: 8px 12px;
        border-radius: 10px;
        font-size: 0.85rem;
        color: #4a5568;
        max-width: 200px;
        display: inline-block;
    }

    .btn-delete {
        width: 35px;
        height: 35px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--danger);
        background: #fff5f5;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-delete:hover {
        background: var(--danger);
        color: white;
    }

    /* --- POSTS MANAGEMENT --- */
    .posts-section {
        margin-top: 40px;
    }

    .post-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .mini-post-card {
        background: white;
        border-radius: 20px;
        padding: 20px;
        border: 1px solid #f0f0f0;
        position: relative;
    }

    .point-preview {
        color: var(--primary);
        font-size: 0.8rem;
        margin-top: 5px;
    }

    @media (max-width: 1024px) {
        .admin-grid { grid-template-columns: 1fr; }
        .sidebar { width: 80px; padding: 30px 10px; }
        .sidebar h2 span, .nav-item span { display: none; }
        .main-content { margin-left: 80px; }
    }
</style>

<div class="admin-layout">
    <div class="sidebar">
        <h2><i class="fas fa-leaf"></i> <span>ECOMADA</span></h2>
        <a href="#" class="nav-item active"><i class="fas fa-th-large"></i> <span>Dashboard</span></a>
        <a href="{{ route('home') }}" class="nav-item">
            <i class="fas fa-external-link-alt"></i>
            <span>Hijery Site</span>
        </a>        
        <a href="#" class="nav-item"><i class="fas fa-envelope"></i> <span>Hafatra</span></a>
        <div style="position: absolute; bottom: 30px; width: calc(100% - 40px);">
            <a href="/" class="nav-item" style="color: #ff4757;"><i class="fas fa-power-off"></i> <span>Hivoaka</span></a>
        </div>
    </div>

    <div class="main-content">
        <div class="dashboard-header">
            <h1 style="margin:0; font-weight: 800;">Tantana ny Pejy</h1>
            <p style="color: #718096; margin: 5px 0 0 0;">Tongasoa eto amin'ny dashboard-nao.</p>
        </div>

        <div class="header-stats">
            <div class="stat-card">
                <div class="stat-icon" style="background: #eefaf2; color: #2ecc71;"><i class="fas fa-user-friends"></i></div>
                <div>
                    <small style="color: #718096;">Mpanjifa</small>
                        @isset($clients)
                            <h2 style="margin:0;">{{ count($clients) ? count($clients) : 0 }}</h2>
                        @endisset
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #e8f2ff; color: #3b82f6;"><i class="fas fa-paper-plane"></i></div>
                <div>
                    <small style="color: #718096;">Pub Navoaka</small>
                    @isset($posts)
                        <h2 style="margin:0;">{{ count($posts) ? count($posts) : 0 }}</h2>
                    @endisset
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: #fff9db; color: #f59f00;"><i class="fas fa-clock"></i></div>
                <div>
                    <small style="color: #718096;">Daty anio</small>
                    <h2 style="margin:0; font-size: 1.2rem;">{{ \Carbon\Carbon::today()->format('d/m/Y') }}</h2>
                </div>
            </div>
        </div>

        <div class="admin-grid">
            <div class="glass-card">
                <h3 style="margin-top: 0;"><i class="fas fa-pen-nib" style="color: var(--primary);"></i> Hamoaka Pub Vaovao</h3>
                <form action="/admin" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label class="form-label">Lohateny lehibe</label>
                    <input type="text" name="titre" class="input-style" placeholder="Ohatra: Ny tombony amin'ny..." required>

                    <label class="form-label">Sary na Video</label>
                    <input type="file" name="media" class="input-style">

                    <label class="form-label">Andinin-tsoratra & Lisitra</label>
                    <p style="font-size: 0.7rem; color: #a0aec0; margin-top: -10px; margin-bottom: 10px;">
                        <i class="fas fa-lightbulb"></i> Ampiasao ny <b>*</b> eo alohan'ny fehezanteny raha hanao lisitra misy teboka maitso.
                    </p>
                    <textarea name="content" class="input-style" rows="10" placeholder="Soraty eto ny fanazavana...&#10;* Teboka voalohany&#10;* Teboka faharoa" required></textarea>

                    <button type="submit" class="btn-publish">HAMOAKA NY POSTE</button>
                </form>
            </div>

            <div class="table-card">
                <h3 style="margin-top: 0;"><i class="fas fa-bell" style="color: #3b82f6;"></i> Fangatahana Vaovao</h3>
                <div style="overflow-x: auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Mpanjifa</th>
                                <th>Fangatahana</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($clients)
                                @foreach ($clients as $c)
                                <tr>
                                    <td class="client-info">
                                        <strong>{{ $c->anarana }}</strong>
                                        <small>
                                            <i class="fas fa-phone-alt"></i> {{ $c->numero }}
                                        </small>
                                    </td>

                                    <td>
                                        <div class="badge-msg">
                                            {{ \Illuminate\Support\Str::limit($c->fangatahana, 50) }}
                                        </div>
                                    </td>

                                    <td>
                                        <form action="{{ route('delete_client', $c->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn-delete" onclick="return confirm('Tena hamafa ity ve?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="posts-section">
            <h3 style="display: flex; align-items: center; gap: 10px;">
                <i class="fas fa-stream" style="color: var(--primary);"></i> 
                Ireo Pub efa mivoaka
            </h3>
            <div class="post-grid">
                @isset($posts)
                    @foreach ($posts as $post)
                        <div class="mini-post-card">

                            <h4 style="margin: 0 0 10px 0;">
                                {{ $post->titre }}
                            </h4>

                            <p style="font-size: 0.8rem; color: #718096; margin-bottom: 15px;">
                                {{ \Illuminate\Support\Str::limit($post->content, 100) }}
                            </p>

                            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #f1f3f5; pt: 15px; margin-top: 10px; padding-top: 10px;">

                                <span style="font-size: 0.75rem; font-weight: 600; color: #adb5bd;">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($post->date_pub)->format('d/m/Y') }}
                                </span>

                                <a href="{{ route('delete_post', $post->id) }}"
                                style="color: var(--danger); font-size: 0.8rem; text-decoration: none; font-weight: 700;"
                                onclick="return confirm('Hamafa ity pub ity?')">
                                    <i class="fas fa-trash"></i> FAFAFA
                                </a>

                            </div>

                        </div>
                    @endforeach
                        
                @endisset
            </div>
        </div>
    </div>
</div>
@endsection
