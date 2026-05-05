@extends('layouts.app')

@section('title', 'Buat Password Baru')

@section('styles')
<style>
    .auth-page {
        min-height: calc(100vh - 148px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1rem;
        background:
            radial-gradient(ellipse 60% 50% at 50% 0%, rgba(201,184,232,0.2) 0%, transparent 70%),
            var(--cream);
    }

    .auth-card {
        max-width: 480px;
        width: 100%;
        background: var(--white);
        border-radius: 24px;
        padding: 3rem;
        box-shadow: 0 8px 48px rgba(124, 92, 191, 0.12);
        border: 1px solid var(--border);
    }

    .auth-card .icon-wrap {
        width: 72px;
        height: 72px;
        background: var(--lilac-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1.5rem;
    }

    .auth-card h1 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: var(--text-dark);
        margin-bottom: 0.4rem;
        text-align: center;
    }

    .auth-card .desc {
        color: var(--text-muted);
        font-size: 0.9rem;
        text-align: center;
        margin-bottom: 2rem;
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

    .form-group input.is-invalid { border-color: #E24B4A; }

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
</style>
@endsection

@section('content')
<div class="auth-page">
    <div class="auth-card">
        <div class="icon-wrap">🔒</div>
        <h1>Buat Password Baru</h1>
        <p class="desc">Masukkan password baru kamu di bawah ini.</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email"
                       value="{{ $email ?? old('email') }}"
                       class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                       placeholder="nama@email.com" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password Baru</label>
                <input id="password" type="password" name="password"
                       class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                       placeholder="Min. 8 karakter" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">Konfirmasi Password Baru</label>
                <input id="password-confirm" type="password"
                       name="password_confirmation"
                       placeholder="Ulangi password baru" required>
            </div>

            <button type="submit" class="btn-primary">
                Simpan Password Baru
            </button>
        </form>
    </div>
</div>
@endsection