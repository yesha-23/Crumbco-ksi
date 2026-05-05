@extends('layouts.app')

@section('title', 'Masuk')

@section('styles')
<style>
    .auth-page {
        min-height: calc(100vh - 148px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1rem;
        background:
            radial-gradient(ellipse 60% 50% at 10% 20%, rgba(201,184,232,0.25) 0%, transparent 60%),
            radial-gradient(ellipse 50% 60% at 90% 80%, rgba(240,235,225,0.5) 0%, transparent 60%),
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

    .auth-illustration {
        background: linear-gradient(145deg, var(--lilac-light) 0%, var(--lilac) 100%);
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        gap: 1.2rem;
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
        font-size: 1.8rem;
        color: var(--text-dark);
        line-height: 1.3;
    }

    .auth-illustration p {
        color: var(--text-mid);
        font-size: 0.9rem;
        line-height: 1.6;
        max-width: 220px;
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

    .form-check {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 1.4rem;
    }

    .form-check input[type="checkbox"] {
        width: 16px;
        height: 16px;
        accent-color: var(--purple-deep);
    }

    .form-check label {
        font-size: 0.88rem;
        color: var(--text-mid);
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

    .divider {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 1.2rem 0;
    }

    .divider::before, .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--border);
    }

    .divider span {
        font-size: 0.8rem;
        color: var(--text-muted);
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
        <!-- Illustration Side -->
        <div class="auth-illustration">
            <div class="big-emoji">🥐</div>
            <h2>Selamat datang kembali!</h2>
            <p>Masuk dan temukan pastry segar pilihan kami hari ini.</p>
        </div>

        <!-- Form Side -->
        <div class="auth-form-area">
            <h1>Masuk</h1>
            <p class="subtitle">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>

            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email"
                           value="{{ old('email') }}"
                           class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                           placeholder="nama@email.com" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input id="password" type="password" name="password"
                           class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                           placeholder="••••••••" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Ingat saya</label>
                </div>

                <button type="submit" class="btn-primary">Masuk ke Akun</button>

                @if(Route::has('password.request'))
                    <div class="auth-links" style="margin-top: 1rem;">
                        <a href="{{ route('password.request') }}">Lupa kata sandi?</a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection