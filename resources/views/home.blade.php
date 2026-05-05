@extends('layouts.app')

@section('title', 'Beranda')

@section('styles')
<style>
    .hero {
        background: linear-gradient(135deg, var(--lilac-light) 0%, var(--cream-dark) 100%);
        padding: 5rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: -50px; right: -50px;
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(201,184,232,0.4) 0%, transparent 70%);
        border-radius: 50%;
    }

    .hero::after {
        content: '';
        position: absolute;
        bottom: -80px; left: -40px;
        width: 250px; height: 250px;
        background: radial-gradient(circle, rgba(201,184,232,0.3) 0%, transparent 70%);
        border-radius: 50%;
    }

    .hero-inner {
        position: relative;
        z-index: 2;
        max-width: 640px;
        margin: 0 auto;
    }

    .hero-badge {
        display: inline-block;
        background: rgba(124, 92, 191, 0.12);
        color: var(--purple-deep);
        font-size: 0.82rem;
        font-weight: 500;
        padding: 6px 18px;
        border-radius: 50px;
        margin-bottom: 1.5rem;
        border: 1px solid rgba(124, 92, 191, 0.2);
    }

    .hero h1 {
        font-family: 'Playfair Display', serif;
        font-size: clamp(2rem, 5vw, 3.2rem);
        color: var(--text-dark);
        line-height: 1.2;
        margin-bottom: 1rem;
    }

    .hero h1 em {
        font-style: italic;
        color: var(--purple-deep);
    }

    .hero p {
        color: var(--text-mid);
        font-size: 1.05rem;
        line-height: 1.7;
        margin-bottom: 2rem;
    }

    .hero-cta {
        display: inline-flex;
        gap: 12px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .btn {
        padding: 12px 28px;
        border-radius: 50px;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.95rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s;
        cursor: pointer;
        border: none;
    }

    .btn-solid {
        background: var(--purple-deep);
        color: var(--white);
    }

    .btn-solid:hover {
        background: var(--text-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(124, 92, 191, 0.3);
    }

    .btn-outline {
        background: transparent;
        color: var(--purple-deep);
        border: 1.5px solid var(--lilac-mid);
    }

    .btn-outline:hover {
        background: var(--lilac-light);
    }

    /* ── Menu Section ── */
    .section {
        padding: 4rem 2rem;
        max-width: 1100px;
        margin: 0 auto;
    }

    .section-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .section-header h2 {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .section-header p {
        color: var(--text-muted);
        font-size: 0.95rem;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
    }

    .menu-card {
        background: var(--white);
        border-radius: var(--radius);
        overflow: hidden;
        border: 1px solid var(--border);
        transition: all 0.2s;
    }

    .menu-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(124, 92, 191, 0.12);
    }

    .menu-card-img {
        height: 160px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
    }

    .card-cream { background: var(--cream-dark); }
    .card-lilac { background: var(--lilac-light); }
    .card-white { background: #FFF5F5; }
    .card-mint  { background: #EDF7F1; }

    .menu-card-body {
        padding: 1.2rem 1.4rem;
    }

    .menu-card-body .tag {
        font-size: 0.75rem;
        color: var(--purple-deep);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        margin-bottom: 0.3rem;
    }

    .menu-card-body h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        color: var(--text-dark);
        margin-bottom: 0.3rem;
    }

    .menu-card-body p {
        font-size: 0.84rem;
        color: var(--text-muted);
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .price {
        font-weight: 600;
        color: var(--purple-deep);
        font-size: 1rem;
    }

    /* ── Welcome Banner (logged in) ── */
    .welcome-banner {
        background: linear-gradient(135deg, var(--purple-deep), var(--lilac-mid));
        color: var(--white);
        padding: 1.5rem 2rem;
        text-align: center;
        font-size: 0.95rem;
    }

    .welcome-banner strong {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
    }
</style>
@endsection

@section('content')

@auth
<div class="welcome-banner">
    Halo, <strong>{{ Auth::user()->name }}</strong>! 🎉 Selamat datang kembali di Crumb & Co.
</div>
@endauth

<!-- Hero -->
<div class="hero">
    <div class="hero-inner">
        <div class="hero-badge">✦ Artisan Bakery & Pastry</div>
        <h1>Pastry yang dibuat dengan <em>cinta</em> setiap harinya</h1>
        <p>Dari croissant mentega hingga tart buah segar — setiap gigitan adalah pengalaman tersendiri.</p>
        <div class="hero-cta">
            <a href="#menu" class="btn btn-solid">Lihat Menu</a>
            @guest
                <a href="{{ route('register') }}" class="btn btn-outline">Daftar Gratis</a>
            @endguest
        </div>
    </div>
</div>

<!-- Menu -->
<div class="section" id="menu">
    <div class="section-header">
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
            <div class="menu-card-img card-white">🥧</div>
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

@endsection