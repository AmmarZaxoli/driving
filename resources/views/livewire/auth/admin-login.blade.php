<div>

    <html lang="ar" dir="rtl" data-theme="light">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>چوونەژوورەوە - فێربوونی ئۆتۆمبێل</title>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;600;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <style>
            :root {
                --bg: #0f172a;
                --card: rgba(30, 41, 59, 0.9);
                --text: #f8fafc;
                --muted: #94a3b8;
                --border: rgba(148, 163, 184, 0.2);
                --primary: #10b981;
                --primary-dark: #059669;
                --primary-glow: rgba(16, 185, 129, 0.4);
                --input-bg: rgba(15, 23, 42, 0.6);
            }

            [data-theme="light"] {
                --bg: #f8fafc;
                --card: rgba(255, 255, 255, 0.95);
                --text: #0f172a;
                --muted: #64748b;
                --border: rgba(148, 163, 184, 0.3);
                --primary: #059669;
                --primary-dark: #047857;
                --primary-glow: rgba(5, 150, 105, 0.3);
                --input-bg: rgba(241, 245, 249, 0.8);
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Noto Sans Arabic', sans-serif;
                background: var(--bg);
                min-height: 100vh;
                min-height: 100dvh;
                /* dynamic viewport for mobile browsers */
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px;
                transition: background 0.5s ease;
            }

            /* Subtle animated background */
            body::before {
                content: '';
                position: fixed;
                inset: 0;
                background: radial-gradient(circle at 50% 50%, var(--primary-glow) 0%, transparent 60%);
                opacity: 0.4;
                animation: breathe 8s ease-in-out infinite;
                pointer-events: none;
            }

            @keyframes breathe {

                0%,
                100% {
                    transform: scale(1);
                    opacity: 0.3;
                }

                50% {
                    transform: scale(1.1);
                    opacity: 0.5;
                }
            }

            .container {
                position: relative;
                z-index: 10;
                width: 100%;
                max-width: 400px;
            }

            /* ── Theme Toggle ── */
            .theme-toggle {
                position: absolute;
                top: -60px;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                gap: 8px;
                background: var(--card);
                padding: 6px;
                border-radius: 50px;
                border: 1px solid var(--border);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }

            .theme-btn {
                width: 42px;
                height: 42px;
                border: none;
                border-radius: 50%;
                background: transparent;
                color: var(--muted);
                cursor: pointer;
                font-size: 18px;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                /* Prevent accidental tap activation on touch devices */
                -webkit-tap-highlight-color: transparent;
            }

            .theme-btn.active {
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                color: white;
                box-shadow: 0 4px 15px var(--primary-glow);
            }

            .theme-btn:not(.active):hover {
                color: var(--text);
                background: var(--border);
            }

            /* ── Card ── */
            .card {
                min-width: 400px;
                background: var(--card);
                backdrop-filter: blur(20px);
                -webkit-backdrop-filter: blur(20px);
                border: 1px solid var(--border);
                border-radius: 24px;
                padding: 40px 32px;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                animation: slide-up 0.6s ease-out;
            }

            @keyframes slide-up {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* ── Logo ── */
            .logo {
                width: 72px;
                height: 72px;
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                border-radius: 20px;
                margin: 0 auto 24px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 28px;
                box-shadow: 0 15px 35px var(--primary-glow);
                animation: float 3s ease-in-out infinite;
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            /* ── Header ── */
            .header {
                text-align: center;
                margin-bottom: 32px;
            }

            .title {
                color: var(--text);
                font-size: 24px;
                font-weight: 700;
                margin-bottom: 6px;
            }

            .subtitle {
                color: var(--muted);
                font-size: 14px;
            }

            /* ── Form ── */
            .form-group {
                margin-bottom: 20px;
            }

            .input-wrapper {
                position: relative;
            }

            .input-icon {
                position: absolute;
                right: 16px;
                top: 50%;
                transform: translateY(-50%);
                color: var(--muted);
                font-size: 18px;
                transition: all 0.3s;
                pointer-events: none;
            }

            .form-input {
                width: 100%;
                padding: 16px 48px 16px 16px;
                background: var(--input-bg);
                border: 2px solid var(--border);
                border-radius: 14px;
                color: var(--text);
                font-family: inherit;
                transition: all 0.3s ease;
                outline: none;
                /* Prevent iOS zoom on focus (font-size must stay ≥ 16px on iOS) */
                font-size: 11px;
            }

            .form-input:focus {
                border-color: var(--primary);
                box-shadow: 0 0 0 4px var(--primary-glow);
            }

            .form-input:focus~.input-icon {
                color: var(--primary);
                transform: translateY(-50%) scale(1.1);
            }

            .form-input::placeholder {
                color: var(--muted);
            }

            /* ── Button ── */
            .login-btn {
                width: 100%;
                padding: 16px 24px;
                margin-top: 8px;
                background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
                color: white;
                border: none;
                border-radius: 14px;
                font-size: 16px;
                font-weight: 700;
                font-family: inherit;
                cursor: pointer;
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                -webkit-tap-highlight-color: transparent;
                /* Ensure tappable area on mobile */
                min-height: 52px;
            }

            .login-btn::before {
                content: '';
                position: absolute;
                top: 0;
                right: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
                transition: right 0.6s;
            }

            .login-btn:hover::before {
                right: 100%;
            }

            .login-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 15px 30px var(--primary-glow);
            }

            .login-btn:active {
                transform: translateY(0);
            }

            /* ── Loading spinner ── */
            .spinner {
                width: 18px;
                height: 18px;
                border: 2px solid rgba(255, 255, 255, 0.3);
                border-top-color: white;
                border-radius: 50%;
                animation: spin 0.8s linear infinite;
            }

            @keyframes spin {
                to {
                    transform: rotate(360deg);
                }
            }

            /* ── Status bar ── */
            .status {
                display: flex;
                justify-content: center;
                gap: 24px;
                margin-top: 24px;
                padding-top: 24px;
                border-top: 1px solid var(--border);
                flex-wrap: wrap;
            }

            .status-item {
                display: flex;
                align-items: center;
                gap: 8px;
                color: var(--muted);
                font-size: 12px;
            }

            .status-dot {
                width: 8px;
                height: 8px;
                background: var(--primary);
                border-radius: 50%;
                animation: pulse 2s infinite;
                flex-shrink: 0;
            }

            @keyframes pulse {

                0%,
                100% {
                    opacity: 1;
                    box-shadow: 0 0 0 0 var(--primary-glow);
                }

                50% {
                    opacity: 0.7;
                    box-shadow: 0 0 0 8px transparent;
                }
            }

            /* ════════════════════════════════════════
             RESPONSIVE BREAKPOINTS
             ════════════════════════════════════════ */

            /* ── Extra-small phones (≤ 360px) ── */
            @media (max-width: 360px) {
                body {
                    padding: 12px;
                }

                .container {
                    /* Give room for the theme toggle above */
                    margin-top: 56px;
                }

                .card {
                    padding: 28px 18px;
                    border-radius: 18px;
                }

                .logo {
                    width: 58px;
                    height: 58px;
                    font-size: 22px;
                    border-radius: 16px;
                    margin-bottom: 16px;
                }

                .title {
                    font-size: 20px;
                }

                .header {
                    margin-bottom: 24px;
                }

                .form-input {
                    padding: 13px 44px 13px 12px;
                    border-radius: 11px;
                }

                .login-btn {
                    padding: 13px 18px;
                    font-size: 15px;
                    border-radius: 11px;
                }

                .theme-btn {
                    width: 36px;
                    height: 36px;
                    font-size: 15px;
                }

                .status {
                    gap: 14px;
                }
            }

            /* ── Small phones (361px – 480px) ── */
            @media (min-width: 361px) and (max-width: 480px) {
                body {
                    padding: 16px;
                }

                .container {
                    margin-top: 52px;
                }

                .card {
                    padding: 32px 22px;
                    border-radius: 20px;
                }

                .logo {
                    width: 64px;
                    height: 64px;
                    font-size: 25px;
                    margin-bottom: 20px;
                }

                .title {
                    font-size: 22px;
                }
            }

            /* ── All phones (portrait, ≤ 480px shared rules) ── */
            @media (max-width: 480px) {

                /* Disable float animation to reduce motion on small screens */
                .logo {
                    animation: none;
                }

                /* Slightly reduce glow intensity */
                body::before {
                    opacity: 0.25;
                }
            }

            /* ── Tablets portrait (481px – 767px) ── */
            @media (min-width: 481px) and (max-width: 767px) {
                body {
                    padding: 24px;
                }

                .container {
                    max-width: 420px;
                    margin-top: 56px;
                }

                .card {
                    padding: 40px 36px;
                }
            }

            /* ── Tablets landscape + small laptops (768px – 1023px) ── */
            @media (min-width: 768px) and (max-width: 1023px) {
                .container {
                    max-width: 440px;
                    margin-top: 64px;
                }

                .card {
                    padding: 44px 40px;
                }

                .title {
                    font-size: 26px;
                }
            }

            /* ── Desktops (≥ 1024px) ── */
            @media (min-width: 1024px) {
                .container {
                    max-width: 420px;
                    margin-top: 70px;
                }

                .form-input {
                    padding: 13px 48px 13px 14px;
                }

                .login-btn {
                    padding: 13px 20px;
                }
            }

            /* ── Large desktops (≥ 1440px) ── */
            @media (min-width: 1440px) {
                .container {
                    max-width: 440px;
                }

                .card {
                    padding: 48px 40px;
                }

                .title {
                    font-size: 26px;
                }
            }

            /* ── Landscape phone (short viewport) ── */
            @media (max-height: 500px) and (orientation: landscape) {
                body {
                    align-items: flex-start;
                    padding-top: 70px;
                    padding-bottom: 24px;
                }

                .logo {
                    width: 52px;
                    height: 52px;
                    font-size: 20px;
                    margin-bottom: 12px;
                    animation: none;
                }

                .header {
                    margin-bottom: 20px;
                }

                .form-group {
                    margin-bottom: 14px;
                }

                .title {
                    font-size: 20px;
                }

                .status {
                    margin-top: 16px;
                    padding-top: 16px;
                }
            }

            /* ── Prefer reduced motion ── */
            @media (prefers-reduced-motion: reduce) {

                .logo,
                body::before,
                .status-dot {
                    animation: none;
                }

                .card {
                    animation: none;
                }

                .login-btn::before {
                    display: none;
                }
            }
        </style>
    </head>

    <body >

        <div class="container">

            <!-- Theme Toggle -->
            <div class="theme-toggle">
                <button type="button" class="theme-btn "
                    onclick="document.documentElement.setAttribute('data-theme', 'dark'); this.classList.add('active'); this.nextElementSibling.classList.remove('active');">
                    <i class="fas fa-moon"></i>
                </button>
                <button type="button" class="theme-btn active"
                    onclick="document.documentElement.setAttribute('data-theme', 'light'); this.classList.add('active'); this.previousElementSibling.classList.remove('active');">
                    <i class="fas fa-sun"></i>
                </button>
            </div>

            <!-- Card -->
            <div class="card">

                <!-- Logo -->
                <div class="logo">
                    <i class="fas fa-car"></i>
                </div>

                <!-- Header -->
                <div class="header">
                    <h1 class="title">چوونەژوورەوە</h1>
                    <p class="subtitle">سیستەمی فێربوونی ئۆتۆمبێل</p>
                </div>

                <!-- Livewire Form -->
                <form wire:submit.prevent="login">
                    <!-- Name -->
                    <div class="form-group">
                        <div class="input-wrapper">
                            <input wire:model.defer="name" type="text" class="form-input" placeholder="ناو"
                                autocomplete="off">

                            <i class="fas fa-user input-icon"></i>


                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="input-wrapper">

                            <input wire:model.defer="password" type="password" class="form-input"
                                placeholder="وشەی نهێنی" autocomplete="current-password">

                            <i class="fas fa-lock input-icon"></i>



                        </div>

                        @error('name')
                            <span style="color:red">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Button -->
                    <button type="submit" class="login-btn" wire:loading.attr="disabled">

                        <span wire:loading.remove>چوونەژوورەوە</span>
                        <span wire:loading>چاوەڕێ بکە...</span>

                        <i class="fas fa-arrow-left" wire:loading.remove></i>
                        <div class="spinner" wire:loading></div>

                    </button>

                </form>

                <!-- Status -->
                <div class="status">
                    <div class="status-item">
                        <div class="status-dot"></div>
                        <span>سیستەم چالاکە</span>
                    </div>
                    <div class="status-item">
                        <i class="fas fa-shield-alt" style="color: var(--primary);"></i>
                        <span>پارێزراوە</span>
                    </div>
                </div>

            </div>

        </div>

        <script>
            window.onload = function() {
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            }

            history.pushState(null, null, location.href);
            window.onpopstate = function() {
                history.go(1);
            };
        </script>
    </body>

    </html>

</div>
