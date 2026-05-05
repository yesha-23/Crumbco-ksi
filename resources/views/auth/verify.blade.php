@extends('layouts.app')

@section('title', 'Verifikasi Email')

@section('styles')
<style>
    .auth-page {
        min-height: calc(100vh - 148px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1rem;
        background: var(--cream);
    }

    .auth-card {
        max-width: 520px;
        width: 100%;
        background: var(--white);
        border-radius: 24px;
        padding: 3.5rem 3rem;
        box-shadow: 0 8px 48px rgba(124, 92, 191, 0.12);
        border: 1px solid var(--border);
        text-align: center;
    }

    .icon-wrap {
        width: 80px;
        height: 80px;
        background: var(--lilac-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.2rem;
        margin: 0 auto 1.5rem;
    }

    .auth-card h1 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: var(--text-dark);
        margin-bottom: 0.8rem;
    }

    .auth-card p {
        color: var(--text-muted);
        font-size: 0.92rem;
        line-height: 1.7;
        margin-bottom: 2rem;
    }

    .btn-primary {
        display: inline-block;
        padding: 13px 32px;
        background: var(--purple-deep);
        color: var(--white);
        border: none;
        border-radius: 50px;
        font-family: 'DM Sans', sans-serif;
        font-size: 0.95rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
    }

    .btn-primary:hover {
        background: var(--text-dark);
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(124, 92, 191, 0.3);
    }

    .logout-link {
        display: block;
        margin-top: 1rem;
        font-size: 0.85rem;
        color: var(--text-muted);
    }

    .logout-link a {
        color: var(--purple-deep);
        text-decoration: none;
    }
</style>
@endsection

@section('content')
<div class="auth-page">
    <div class="auth-card">
        <div class="icon-wrap">✉️</div>
        <h1>Cek Email Kamu!</h1>
        <p>
            Kami telah mengirimkan tautan verifikasi ke <strong>{{ Auth::user()->email }}</strong>.
            Klik tautan tersebut untuk mengaktifkan akunmu dan mulai menikmati pastry terbaik kami!
        </p>

        @if(session('resent'))
            <div class="alert alert-success" style="margin-bottom: 1.5rem;">
                Email verifikasi baru telah dikirim. Silakan cek kotak masuk kamu.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.resend') }}" style="display:inline;">
            @csrf
            <button type="submit" class="btn-primary">
                Kirim Ulang Email Verifikasi
            </button>
        </form>

        <div class="logout-link">
            Salah akun? <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-vf').submit();">Keluar</a>
            <form id="logout-vf" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
        </div>
    </div>
</div>
@endsection