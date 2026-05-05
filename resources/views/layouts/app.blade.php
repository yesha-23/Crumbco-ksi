<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Crumb & Co.') }} — @yield('title', 'Artisan Bakery')</title>

    <!-- Google Fonts -->
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
            --shadow:      0 4px 24px rgba(124, 92, 191, 0.08);
            --radius:      16px;
            --radius-sm:   10px;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--cream);
            color: var(--text-dark);
            min-height: 100vh;
        }

        /* ── Navbar ── */
        .navbar {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 0 2rem;
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--purple-deep);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand span.icon {
            font-size: 1.4rem;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-mid);
            font-size: 0.9rem;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 50px;
            transition: all 0.2s;
        }

        .nav-links a:hover {
            background: var(--lilac-light);
            color: var(--purple-deep);
        }

        .nav-links .btn-nav {
            background: var(--purple-deep);
            color: var(--white) !important;
        }

        .nav-links .btn-nav:hover {
            background: var(--text-dark);
        }

        /* ── Alerts ── */
        .alert {
            padding: 14px 20px;
            border-radius: var(--radius-sm);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .alert-success {
            background: #EDF7EE;
            color: #2D6A30;
            border: 1px solid #B5DDB7;
        }

        .alert-danger {
            background: #FDEAEA;
            color: #7B2020;
            border: 1px solid #F5BABA;
        }

        /* ── Main ── */
        main {
            min-height: calc(100vh - 68px - 80px);
        }

        /* ── Footer ── */
        footer {
            text-align: center;
            padding: 1.5rem;
            color: var(--text-muted);
            font-size: 0.82rem;
            border-top: 1px solid var(--border);
            background: var(--white);
        }
    </style>

    @yield('styles')
</head>
<body>

<nav class="navbar">
    <a class="navbar-brand" href="{{ url('/') }}">
        <span class="icon">🥐</span> Crumb & Co.
    </a>
    <ul class="nav-links">
        @guest
            <li><a href="{{ route('login') }}">Masuk</a></li>
            <li><a href="{{ route('register') }}" class="btn-nav">Daftar</a></li>
        @else
            <li><a href="#">Halo, {{ Auth::user()->name }}</a></li>
            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Keluar
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </li>
        @endguest
    </ul>
</nav>

<main>
    @yield('content')
</main>

<footer>
    <!-- &copy; {{ date('Y') }} Crumb & Co. — Dibuat dengan &hearts; untuk para pecinta pastry. -->
     2026 Crumb & Co. — Yesha Victoria Atmaja (72230624)
</footer>

</body>
</html>