@extends('layouts.app')

@section('title', 'Beranda')

@section('styles')
<style>
    /* ── Welcome Banner ── */
    .welcome-banner {
        background: linear-gradient(135deg, var(--purple-deep), var(--lilac-mid));
        color: var(--white);
        padding: 1rem 2rem;
        text-align: center;
        font-size: 0.92rem;
    }
    .welcome-banner strong {
        font-family: 'Playfair Display', serif;
        font-size: 1rem;
    }

    /* ── Dashboard ── */
    .dashboard {
        max-width: 1200px;
        margin: 2.5rem auto;
        padding: 0 2rem;
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 2rem;
        align-items: start;
    }

    /* ── Account Card ── */
    .account-card {
        background: var(--white);
        border-radius: 20px;
        border: 1px solid var(--border);
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(124,92,191,0.08);
        position: sticky;
        top: 88px;
    }

    .account-card-header {
        background: linear-gradient(145deg, var(--purple-deep), var(--lilac-mid));
        padding: 2rem 1.5rem;
        text-align: center;
    }

    .avatar {
        width: 64px;
        height: 64px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin: 0 auto 0.8rem;
        border: 2.5px solid rgba(255,255,255,0.35);
    }

    .account-card-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1rem;
        color: var(--white);
        margin-bottom: 0.2rem;
        line-height: 1.3;
    }

    .account-card-header p {
        font-size: 0.78rem;
        color: rgba(255,255,255,0.72);
        word-break: break-all;
    }

    .account-card-body {
        padding: 1.4rem;
    }

    .account-card-body h3 {
        font-family: 'Playfair Display', serif;
        font-size: 0.95rem;
        color: var(--text-dark);
        margin-bottom: 0.8rem;
        padding-bottom: 0.6rem;
        border-bottom: 1px solid var(--border);
    }

    .info-row {
        display: flex;
        flex-direction: column;
        padding: 8px 0;
        border-bottom: 1px solid var(--border);
        gap: 2px;
    }

    .info-row:last-of-type { border-bottom: none; }

    .info-key {
        font-size: 0.72rem;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    .info-val {
        font-size: 0.88rem;
        color: var(--text-dark);
        font-weight: 500;
        word-break: break-all;
    }

    .status-active {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        color: #2D6A30;
        font-size: 0.88rem;
        font-weight: 600;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        background: #4CAF50;
        border-radius: 50%;
        display: inline-block;
    }

    .badge-member {
        display: block;
        background: var(--lilac-light);
        color: var(--purple-deep);
        font-size: 0.78rem;
        font-weight: 600;
        padding: 9px 12px;
        border-radius: 50px;
        margin-top: 1rem;
        text-align: center;
        border: 1px solid rgba(180,159,214,0.4);
    }

    /* ── Right Side ── */
    .dashboard-right {}

    .right-header {
        margin-bottom: 1.4rem;
    }

    .right-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.6rem;
        color: var(--text-dark);
        margin-bottom: 0.2rem;
    }

    .right-header p {
        color: var(--text-muted);
        font-size: 0.88rem;
    }

    /* ── Menu Grid ── */
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.2rem;
    }

    .menu-card {
        background: var(--white);
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid var(--border);
        transition: all 0.2s;
        display: flex;
        flex-direction: column;
    }

    .menu-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 28px rgba(124,92,191,0.12);
    }

    .menu-card-img {
        height: 130px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3.2rem;
        flex-shrink: 0;
    }

    .card-cream { background: var(--cream-dark); }
    .card-lilac { background: var(--lilac-light); }
    .card-rose  { background: #FFF0F0; }
    .card-mint  { background: #EDF7F1; }

    .menu-card-body {
        padding: 1rem 1.1rem 1.1rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .tag {
        font-size: 0.7rem;
        color: var(--purple-deep);
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 4px;
    }

    .menu-card-body h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1rem;
        color: var(--text-dark);
        margin-bottom: 4px;
    }

    .menu-card-body p {
        font-size: 0.8rem;
        color: var(--text-muted);
        line-height: 1.5;
        flex: 1;
        margin-bottom: 8px;
    }

    .price {
        font-weight: 700;
        color: var(--purple-deep);
        font-size: 0.95rem;
    }

    /* ── Hero (guest) ── */
    .hero {
        background: linear-gradient(135deg, var(--lilac-light) 0%, var(--cream-dark) 100%);
        padding: 5rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .hero::before {
        content:''; position:absolute; top:-50px; right:-50px;
        width:300px; height:300px;
        background: radial-gradient(circle, rgba(201,184,232,0.4) 0%, transparent 70%);
        border-radius:50%;
    }
    .hero::after {
        content:''; position:absolute; bottom:-80px; left:-40px;
        width:250px; height:250px;
        background: radial-gradient(circle, rgba(201,184,232,0.3) 0%, transparent 70%);
        border-radius:50%;
    }
    .hero-inner { position:relative; z-index:2; max-width:640px; margin:0 auto; }
    .hero-badge {
        display:inline-block; background:rgba(124,92,191,0.12); color:var(--purple-deep);
        font-size:0.82rem; font-weight:500; padding:6px 18px; border-radius:50px;
        margin-bottom:1.5rem; border:1px solid rgba(124,92,191,0.2);
    }
    .hero h1 {
        font-family:'Playfair Display',serif;
        font-size:clamp(2rem,5vw,3.2rem);
        color:var(--text-dark); line-height:1.2; margin-bottom:1rem;
    }
    .hero h1 em { font-style:italic; color:var(--purple-deep); }
    .hero p { color:var(--text-mid); font-size:1.05rem; line-height:1.7; margin-bottom:2rem; }
    .hero-cta { display:inline-flex; gap:12px; flex-wrap:wrap; justify-content:center; }
    .btn {
        padding:12px 28px; border-radius:50px; font-family:'DM Sans',sans-serif;
        font-size:0.95rem; font-weight:500; text-decoration:none; transition:all 0.2s;
        cursor:pointer; border:none;
    }
    .btn-solid { background:var(--purple-deep); color:var(--white); }
    .btn-solid:hover { background:var(--text-dark); transform:translateY(-2px); box-shadow:0 8px 24px rgba(124,92,191,0.3); }
    .btn-outline { background:transparent; color:var(--purple-deep); border:1.5px solid var(--lilac-mid); }
    .btn-outline:hover { background:var(--lilac-light); }

    .section { padding:4rem 2rem; max-width:1100px; margin:0 auto; }
    .section-header { text-align:center; margin-bottom:2.5rem; }
    .section-header h2 { font-family:'Playfair Display',serif; font-size:2rem; color:var(--text-dark); margin-bottom:0.5rem; }
    .section-header p { color:var(--text-muted); font-size:0.95rem; }
    .guest-grid {
        display:grid; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); gap:1.5rem;
    }

    @media (max-width: 900px) {
        .dashboard { grid-template-columns: 1fr; }
        .account-card { position: static; }
        .menu-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 560px) {
        .menu-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')

{{-- ══════════════════════════════ --}}
{{--   SUDAH LOGIN                 --}}
{{-- ══════════════════════════════ --}}
@auth
<div class="welcome-banner">
    Halo, <strong>{{ Auth::user()->name }}</strong>! 🎉 Selamat datang kembali di Crumb & Co.
</div>

<div class="dashboard">

    {{-- Kolom Kiri: Account Card --}}
    <div class="account-card">
        <div class="account-card-header">
            <div class="avatar">👤</div>
            <h2>{{ Auth::user()->name }}</h2>
            <p>{{ Auth::user()->email }}</p>
        </div>
        <div class="account-card-body">
            <h3>Account Details</h3>

            <div class="info-row">
                <span class="info-key">Name</span>
                <span class="info-val">{{ Auth::user()->name }}</span>
            </div>
            <div class="info-row">
                <span class="info-key">Email</span>
                <span class="info-val">{{ Auth::user()->email }}</span>
            </div>
            <div class="info-row">
                <span class="info-key">Member Since</span>
                <span class="info-val">{{ Auth::user()->created_at->format('F j, Y') }}</span>
            </div>
            <div class="info-row">
                <span class="info-key">Status</span>
                <span class="info-val">
                    <span class="status-active">
                        <span class="status-dot"></span> Active
                    </span>
                </span>
            </div>

            <div class="badge-member">✦ Crumb & Co. Member</div>
        </div>
    </div>

    {{-- Kolom Kanan: Menu --}}
    <div class="dashboard-right">
        <div class="right-header">
            <h2>Menu Pilihan Hari Ini</h2>
            <p>Dipanggang segar setiap pagi, hanya untuk kamu</p>
        </div>

        <div class="menu-grid">
            <div class="menu-card">
                <div class="menu-card-img card-cream">🥐</div>
                <div class="menu-card-body">
                    <div class="tag">Bestseller</div>
                    <h3>Butter Croissant</h3>
                    <p>Lapis demi lapis mentega Perancis, renyah di luar lembut di dalam.</p>
                    <span class="price">Rp 28.000</span>
                </div>
            </div>

            <div class="menu-card">
                <div class="menu-card-img card-lilac">🍰</div>
                <div class="menu-card-body">
                    <div class="tag">Spesial</div>
                    <h3>Lavender Tart</h3>
                    <p>Custard lavender dengan buah-buahan musiman di atas pastri pendek.</p>
                    <span class="price">Rp 42.000</span>
                </div>
            </div>

            <div class="menu-card">
                <div class="menu-card-img card-rose">🥧</div>
                <div class="menu-card-body">
                    <div class="tag">Favorit</div>
                    <h3>Strawberry Danish</h3>
                    <p>Adonan Danish yang lembut dengan selai stroberi buatan sendiri.</p>
                    <span class="price">Rp 35.000</span>
                </div>
            </div>

            <div class="menu-card">
                <div class="menu-card-img card-mint">🧁</div>
                <div class="menu-card-body">
                    <div class="tag">Baru</div>
                    <h3>Earl Grey Cupcake</h3>
                    <p>Cupcake teh Earl Grey dengan buttercream vanilla yang ringan.</p>
                    <span class="price">Rp 30.000</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endauth

{{-- ══════════════════════════════ --}}
{{--   BELUM LOGIN (TAMU)          --}}
{{-- ══════════════════════════════ --}}
@guest
<div class="hero">
    <div class="hero-inner">
        <div class="hero-badge">✦ Artisan Bakery & Pastry</div>
        <h1>Pastry yang dibuat dengan <em>cinta</em> setiap harinya</h1>
        <p>Dari croissant mentega hingga tart buah segar — setiap gigitan adalah pengalaman tersendiri.</p>
        <div class="hero-cta">
            <a href="#menu" class="btn btn-solid">Lihat Menu</a>
            <a href="{{ route('register') }}" class="btn btn-outline">Daftar Gratis</a>
        </div>
    </div>
</div>

<div class="section" id="menu">
    <div class="section-header">
        <h2>Menu Pilihan Hari Ini</h2>
        <p>Dipanggang segar setiap pagi, hanya untuk kamu</p>
    </div>
    <div class="guest-grid">
        <div class="menu-card">
            <div class="menu-card-img card-cream">🥐</div>
            <div class="menu-card-body">
                <div class="tag">Bestseller</div>
                <h3>Butter Croissant</h3>
                <p>Lapis demi lapis mentega Perancis, renyah di luar lembut di dalam.</p>
                <span class="price">Rp 28.000</span>
            </div>
        </div>
        <div class="menu-card">
            <div class="menu-card-img card-lilac">🍰</div>
            <div class="menu-card-body">
                <div class="tag">Spesial</div>
                <h3>Lavender Tart</h3>
                <p>Custard lavender dengan buah-buahan musiman di atas pastri pendek.</p>
                <span class="price">Rp 42.000</span>
            </div>
        </div>
        <div class="menu-card">
            <div class="menu-card-img card-rose">🥧</div>
            <div class="menu-card-body">
                <div class="tag">Favorit</div>
                <h3>Strawberry Danish</h3>
                <p>Adonan Danish yang lembut dengan selai stroberi buatan sendiri.</p>
                <span class="price">Rp 35.000</span>
            </div>
        </div>
        <div class="menu-card">
            <div class="menu-card-img card-mint">🧁</div>
            <div class="menu-card-body">
                <div class="tag">Baru</div>
                <h3>Earl Grey Cupcake</h3>
                <p>Cupcake teh Earl Grey dengan buttercream vanilla yang ringan.</p>
                <span class="price">Rp 30.000</span>
            </div>
        </div>
    </div>
</div>
@endguest

@endsection