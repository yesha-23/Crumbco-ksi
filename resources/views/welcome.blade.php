<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crumb & Co. — Artisan Bakery & Pastry</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --lilac:       #C9B8E8;
            --lilac-light: #EDE6F7;
            --lilac-mid:   #B49FD6;
            --purple-deep: #7C5CBF;
            --cream:       #FAF7F2;
            --cream-dark:  #F0EBE1;
            --white:       #FFFFFF;
            --text-dark:   #2D1F4E;
            --text-mid:    #5A4A78;
            --text-muted:  #9B8BB4;
            --border:      rgba(180, 159, 214, 0.3);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            color: var(--text-dark);
            min-height: 100vh;
        }

        /* ── Navbar ── */
        .navbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0 2.5rem;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 16px rgba(124,92,191,0.06);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            color: var(--purple-deep);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand span { font-size: 1.3rem; }

        /* Navbar hanya punya dua tombol — tidak diulang di bawah */
        .nav-auth {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-mid);
            font-size: 0.9rem;
            font-weight: 500;
            padding: 8px 20px;
            border-radius: 50px;
            transition: all 0.2s;
        }

        .nav-link:hover { background: var(--lilac-light); color: var(--purple-deep); }

        .nav-btn {
            text-decoration: none;
            background: var(--purple-deep);
            color: var(--white);
            font-size: 0.9rem;
            font-weight: 500;
            padding: 9px 22px;
            border-radius: 50px;
            transition: all 0.2s;
        }

        .nav-btn:hover { background: var(--text-dark); }

        /* ── Hero ── */
        .hero {
            padding: 5rem 2rem 4rem;
            text-align: center;
            background:
                radial-gradient(ellipse 70% 60% at 15% 20%, rgba(201,184,232,0.25) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 85% 80%, rgba(240,235,225,0.5) 0%, transparent 60%),
                var(--cream);
            position: relative;
            overflow: hidden;
        }

        .hero-inner {
            max-width: 620px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(124,92,191,0.1);
            color: var(--purple-deep);
            font-size: 0.8rem;
            font-weight: 500;
            padding: 5px 18px;
            border-radius: 50px;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(124,92,191,0.2);
        }

        .hero-emoji {
            font-size: 4.5rem;
            display: block;
            margin-bottom: 1rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-10px); }
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4.5vw, 3rem);
            color: var(--text-dark);
            line-height: 1.25;
            margin-bottom: 1rem;
        }

        .hero h1 em { font-style: italic; color: var(--purple-deep); }

        .hero p {
            color: var(--text-mid);
            font-size: 1rem;
            line-height: 1.75;
            max-width: 460px;
            margin: 0 auto 1.5rem;
        }

        /* Feature pills — only visual, no CTA */
        .features {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .feature-pill {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 50px;
            padding: 7px 16px;
            font-size: 0.82rem;
            color: var(--text-mid);
        }

        /* ── Menu Section ── */
        .menu-section {
            padding: 3.5rem 2rem;
            max-width: 1060px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .section-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            color: var(--text-dark);
            margin-bottom: 0.3rem;
        }

        .section-header p {
            color: var(--text-muted);
            font-size: 0.88rem;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
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
            box-shadow: 0 10px 28px rgba(124,92,191,0.1);
        }

        .menu-card-img {
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
        }

        .card-cream { background: var(--cream-dark); }
        .card-lilac { background: var(--lilac-light); }
        .card-rose  { background: #FFF0F0; }
        .card-mint  { background: #EDF7F1; }

        .menu-card-body {
            padding: 0.9rem 1rem 1rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .tag {
            font-size: 0.68rem;
            color: var(--purple-deep);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 3px;
        }

        .menu-card-body h3 {
            font-family: 'Playfair Display', serif;
            font-size: 0.95rem;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .menu-card-body p {
            font-size: 0.78rem;
            color: var(--text-muted);
            line-height: 1.5;
            flex: 1;
            margin-bottom: 8px;
        }

        .price {
            font-weight: 700;
            color: var(--purple-deep);
            font-size: 0.9rem;
        }

        /* ── Footer ── */
        footer {
            text-align: center;
            padding: 1.4rem;
            color: var(--text-muted);
            font-size: 0.8rem;
            border-top: 1px solid var(--border);
            background: var(--white);
        }

        @media (max-width: 768px) {
            .menu-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 480px) {
            .menu-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- Navbar — satu-satunya tempat tombol Login & Daftar -->
<nav class="navbar">
    <a class="navbar-brand" href="/">
        <span>🥐</span> Crumb & Co.
    </a>
    <div class="nav-auth">
        <a href="{{ route('login') }}" class="nav-link">Masuk</a>
        <a href="{{ route('register') }}" class="nav-btn">Daftar</a>
    </div>
</nav>

<!-- Hero — hanya informasi, tanpa tombol CTA berulang -->
<section class="hero">
    <div class="hero-inner">
        <div class="hero-badge">✦ Artisan Bakery & Pastry — Yogyakarta</div>
        <span class="hero-emoji">🥐</span>
        <h1>Pastry yang dibuat dengan <em>cinta</em> setiap harinya</h1>
        <p>Dari croissant mentega hingga tart buah segar — setiap gigitan adalah momen yang tak terlupakan.</p>
        <div class="features">
            <span class="feature-pill">🎂 Dipanggang Setiap Pagi</span>
            <span class="feature-pill">🌿 Bahan Premium Pilihan</span>
            <span class="feature-pill">📦 Tersedia untuk Pickup</span>
        </div>
    </div>
</section>

<!-- Menu — preview tanpa CTA berulang -->
<section class="menu-section">
    <div class="section-header">
        <h2>Menu Unggulan Kami</h2>
        <p>Masuk atau daftar untuk melihat menu lengkap dan penawaran eksklusif member</p>
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
                <p>Adonan Danish lembut dengan selai stroberi buatan sendiri.</p>
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
</section>

<footer>
    <!-- &copy; {{ date('Y') }} Crumb & Co. — Dibuat dengan &hearts; untuk para pecinta pastry. -->
   2026 Crumb & Co. — Yesha Victoria Atmaja (72230624)
</footer>

</body>
</html>