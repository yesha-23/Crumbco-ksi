@extends('layouts.app')

@section('title', 'Daftar')

@section('styles')
<style>
    .auth-page {
        min-height: calc(100vh - 148px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1rem;
        background:
            radial-gradient(ellipse 60% 50% at 90% 10%, rgba(201,184,232,0.25) 0%, transparent 60%),
            radial-gradient(ellipse 50% 60% at 10% 90%, rgba(240,235,225,0.5) 0%, transparent 60%),
            var(--cream);
    }

    .auth-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        max-width: 960px;
        width: 100%;
        background: var(--white);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 8px 48px rgba(124, 92, 191, 0.12);
        border: 1px solid var(--border);
    }

    .auth-form-area {
        padding: 3rem 2.5rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .auth-form-area h1 {
        font-family: 'Playfair Display', serif;
        font-size: 1.9rem;
        color: var(--text-dark);
        margin-bottom: 0.4rem;
    }

    .auth-form-area .subtitle {
        color: var(--text-muted);
        font-size: 0.88rem;
        margin-bottom: 1.8rem;
    }

    .form-group {
        margin-bottom: 1.1rem;
    }

    .form-group label {
        display: block;
        font-size: 0.82rem;
        font-weight: 500;
        color: var(--text-mid);
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .form-group input {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid var(--border);
        border-radius: var(--radius-sm);
        font-family: 'DM Sans', sans-serif;
        font-size: 0.95rem;
        color: var(--text-dark);
        background: var(--cream);
        transition: all 0.2s;
        outline: none;
    }

    .form-group input:focus {
        border-color: var(--lilac-mid);
        background: var(--white);
        box-shadow: 0 0 0 4px rgba(201, 184, 232, 0.2);
    }

    .form-group input.is-invalid {
        border-color: #E24B4A;
    }

    .invalid-feedback {
        color: #A32D2D;
        font-size: 0.8rem;
        margin-top: 5px;
    }

    .btn-primary {
        width: 100%;
        padding: 13px;
        background: var(--purple-deep);
        color: var(--white);
        border: none;
        border-radius: 50px;
        font-family: 'DM Sans', sans-serif;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        margin-top: 0.4rem;
    }

    .btn-primary:hover {
        background: var(--text-dark);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(124, 92, 191, 0.3);
    }

    .auth-links {
        text-align: center;
        margin-top: 1.2rem;
        font-size: 0.87rem;
        color: var(--text-muted);
    }

    .auth-links a {
        color: var(--purple-deep);
        text-decoration: none;
        font-weight: 500;
    }

    .auth-links a:hover { text-decoration: underline; }

    .auth-illustration {
        background: linear-gradient(145deg, #EDE6F7 0%, #C9B8E8 100%);
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        gap: 1.2rem;
        order: 2;
    }

    .auth-illustration .big-emoji {
        font-size: 5rem;
        line-height: 1;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    .auth-illustration h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.7rem;
        color: var(--text-dark);
        line-height: 1.3;
    }

    .auth-illustration p {
        color: var(--text-mid);
        font-size: 0.9rem;
        line-height: 1.6;
        max-width: 220px;
    }

    .perks {
        list-style: none;
        text-align: left;
        width: 100%;
    }

    .perks li {
        font-size: 0.87rem;
        color: var(--text-mid);
        padding: 6px 0;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .perks li::before {
        content: '✦';
        color: var(--purple-deep);
        font-size: 0.75rem;
    }

    @media (max-width: 640px) {
        .auth-illustration { display: none; }
        .auth-wrapper { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="auth-page">
    <div class="auth-wrapper">
        <!-- Form Side -->
        <div class="auth-form-area">
            <h1>Buat Akun</h1>
            <p class="subtitle">Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" type="text" name="name"
                           value="{{ old('name') }}"
                           class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                           placeholder="Nama kamu" required autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email"
                           value="{{ old('email') }}"
                           class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                           placeholder="nama@email.com" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input id="password" type="password" name="password"
                           class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="Min. 8 karakter" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">Konfirmasi Kata Sandi</label>
                    <input id="password-confirm" type="password"
                           name="password_confirmation"
                           placeholder="Ulangi kata sandi" required>
                </div>

                <button type="submit" class="btn-primary">Buat Akun Sekarang</button>

                <div class="auth-links">
                    Dengan mendaftar, kamu menyetujui <a href="#">Syarat & Ketentuan</a> kami.
                </div>
            </form>
        </div>

        <!-- Illustration Side -->
        <div class="auth-illustration">
            <div class="big-emoji">🧁</div>
            <h2>Bergabunglah dengan kami!</h2>
            <ul class="perks">
                <li>Akses menu eksklusif member</li>
                <li>Notifikasi pastry edisi terbatas</li>
                <li>Poin reward setiap pembelian</li>
                <li>Penawaran ulang tahun spesial</li>
            </ul>
        </div>
    </div>
</div>
@endsection