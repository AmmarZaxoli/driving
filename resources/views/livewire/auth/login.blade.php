<div>

    <!DOCTYPE html>
    <html lang="ckb" dir="rtl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>چوونەژوور</title>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;600;700&display=swap"
            rel="stylesheet">
        <style>
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Noto Kufi Arabic', sans-serif;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                position: relative;
                transition: background 1.2s ease;
            }

            body.night {
                background: #0a1628;
            }

            body.day {
                background: #7ec8e3;
            }

            .sky-night,
            .sky-day {
                position: fixed;
                inset: 0;
                pointer-events: none;
                transition: opacity 1.2s ease;
                z-index: 0;
            }

            .sky-night {
                opacity: 1;
            }

            .sky-day {
                opacity: 0;
            }

            body.day .sky-night {
                opacity: 0;
            }

            body.day .sky-day {
                opacity: 1;
            }

            /* stars */
            .stars {
                position: absolute;
                inset: 0 0 80px 0;
                overflow: hidden;
            }

            .star {
                position: absolute;
                background: white;
                border-radius: 50%;
                animation: twinkle 3s ease-in-out infinite;
            }

            @keyframes twinkle {

                0%,
                100% {
                    opacity: 0.2;
                    transform: scale(1);
                }

                50% {
                    opacity: 0.9;
                    transform: scale(1.4);
                }
            }

            /* moon — crescent using two overlapping circles */
            .moon-wrap {
                position: absolute;
                top: 36px;
                right: 90px;
                width: 60px;
                height: 60px;
                animation: moonFloat 6s ease-in-out infinite;
            }

            @keyframes moonFloat {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-8px);
                }
            }

            .moon-wrap svg {
                width: 60px;
                height: 60px;
                filter: drop-shadow(0 0 12px rgba(255, 253, 200, 0.7));
            }

            /* sun */
            .sun-wrap {
                position: absolute;
                top: 28px;
                left: 90px;
            }

            .sun {
                width: 64px;
                height: 64px;
                background: #fbbf24;
                border-radius: 50%;
                box-shadow: 0 0 0 8px rgba(251, 191, 36, 0.25), 0 0 0 16px rgba(251, 191, 36, 0.12);
                animation: sunPulse 3s ease-in-out infinite;
                position: relative;
                z-index: 1;
            }

            @keyframes sunPulse {

                0%,
                100% {
                    box-shadow: 0 0 0 8px rgba(251, 191, 36, 0.25), 0 0 0 16px rgba(251, 191, 36, 0.12);
                }

                50% {
                    box-shadow: 0 0 0 14px rgba(251, 191, 36, 0.3), 0 0 0 28px rgba(251, 191, 36, 0.12);
                }
            }

            .rays {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100px;
                height: 100px;
                transform: translate(-50%, -50%);
                animation: spinRays 10s linear infinite;
                z-index: 0;
            }

            @keyframes spinRays {
                to {
                    transform: translate(-50%, -50%) rotate(360deg);
                }
            }

            .ray {
                position: absolute;
                left: 50%;
                top: 50%;
                width: 3px;
                height: 18px;
                background: rgba(251, 191, 36, 0.6);
                border-radius: 2px;
                transform-origin: 50% 0;
                margin-left: -1.5px;
            }

            /* clouds */
            .cloud {
                position: absolute;
                animation: floatCloud linear infinite;
            }

            @keyframes floatCloud {
                from {
                    transform: translateX(110vw);
                }

                to {
                    transform: translateX(-300px);
                }
            }

            /* ground */
            .ground {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                height: 80px;
                transition: background 1.2s;
                z-index: 1;
            }

            body.night .ground {
                background: #111827;
            }

            body.day .ground {
                background: #374151;
            }

            .ground::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 0;
                right: 0;
                height: 4px;
                background: repeating-linear-gradient(90deg, #f5c518 0, #f5c518 60px, transparent 60px, transparent 120px);
                animation: roadMove 1s linear infinite;
            }

            @keyframes roadMove {
                to {
                    background-position: 120px 0;
                }
            }

            /* trees */
            .tree {
                position: fixed;
                bottom: 74px;
                opacity: 0;
                transition: opacity 1.2s;
                pointer-events: none;
                z-index: 2;
            }

            body.day .tree {
                opacity: 1;
            }

            .tree-trunk {
                width: 10px;
                height: 26px;
                background: #7c5230;
                margin: 0 auto;
            }

            .tree-top {
                background: #16a34a;
                border-radius: 50% 50% 35% 35%;
                margin: 0 auto -4px;
            }

            /* car — facing RIGHT (LTR direction) */
            .car-wrap {
                position: fixed;
                bottom: 18px;
                z-index: 3;
                animation: driveRight 9s linear infinite;
            }

            /* car moves left→right */
            @keyframes driveRight {
                from {
                    left: -130px;
                }

                to {
                    left: calc(100vw + 20px);
                }
            }

            /* toggle */
            .toggle-btn {
                position: fixed;
                top: 18px;
                left: 18px;
                z-index: 100;
                backdrop-filter: blur(10px);
                border-radius: 50px;
                padding: 9px 16px;
                cursor: pointer;
                display: flex;
                align-items: center;
                gap: 10px;
                transition: background 0.3s, border-color 0.3s, transform 0.15s, color 0.3s;
                font-family: 'Noto Kufi Arabic', sans-serif;
                font-size: 13px;
                font-weight: 600;
                border: 1.5px solid rgba(255, 255, 255, 0.25);
            }

            body.night .toggle-btn {
                background: rgba(255, 255, 255, 0.1);
                color: #fff;
            }

            body.day .toggle-btn {
                background: rgba(255, 255, 255, 0.6);
                color: #1e293b;
                border-color: rgba(0, 0, 0, 0.1);
            }

            .toggle-btn:hover {
                transform: scale(1.05);
            }

            .toggle-btn:active {
                transform: scale(0.97);
            }

            .toggle-track {
                width: 42px;
                height: 22px;
                border-radius: 11px;
                position: relative;
                transition: background 0.4s;
                flex-shrink: 0;
            }

            body.night .toggle-track {
                background: #1e3a5f;
            }

            body.day .toggle-track {
                background: #38bdf8;
            }

            .toggle-thumb {
                position: absolute;
                top: 2px;
                width: 18px;
                height: 18px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 11px;
                line-height: 1;
                transition: left 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            }

            body.night .toggle-thumb {
                left: 2px;
                background: #c7d9f5;
            }

            body.day .toggle-thumb {
                left: 22px;
                background: #fbbf24;
            }

            /* card */
            .card {
                background: rgba(255, 255, 255, 0.07);
                backdrop-filter: blur(24px);
                border: 1px solid rgba(255, 255, 255, 0.15);
                border-radius: 24px;
                padding: 40px 36px;
                width: 420px;
                position: relative;
                z-index: 10;
                animation: slideUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
                transition: background 1.2s, border-color 1.2s, box-shadow 1.2s;
            }

            body.day .card {
                background: rgba(255, 255, 255, 0.75);
                border-color: rgba(255, 255, 255, 0.8);
                box-shadow: 0 8px 40px rgba(0, 0, 0, 0.1);
            }

            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(40px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .logo-area {
                text-align: center;
                margin-bottom: 28px;
            }

            .logo-icon {
                width: 64px;
                height: 64px;
                background: linear-gradient(135deg, #f5c518, #e8a200);
                border-radius: 18px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 12px;
                box-shadow: 0 8px 24px rgba(245, 197, 24, 0.3);
            }

            .logo-icon svg {
                width: 36px;
                height: 36px;
            }

            .logo-title {
                font-size: 20px;
                font-weight: 700;
                transition: color 1.2s;
            }

            body.night .logo-title {
                color: #fff;
            }

            body.day .logo-title {
                color: #1e293b;
            }

            .logo-sub {
                font-size: 13px;
                margin-top: 4px;
                transition: color 1.2s;
            }

            body.night .logo-sub {
                color: rgba(255, 255, 255, 0.5);
            }

            body.day .logo-sub {
                color: #64748b;
            }

            .section-title {
                font-size: 15px;
                font-weight: 600;
                text-align: center;
                margin-bottom: 24px;
                padding-bottom: 16px;
                transition: color 1.2s, border-color 1.2s;
            }

            body.night .section-title {
                color: rgba(255, 255, 255, 0.85);
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            body.day .section-title {
                color: #334155;
                border-bottom: 1px solid rgba(0, 0, 0, 0.08);
            }

            .field {
                margin-bottom: 18px;
            }

            label {
                display: flex;
                align-items: center;
                gap: 8px;
                font-size: 13px;
                font-weight: 600;
                margin-bottom: 8px;
                transition: color 1.2s;
            }

            body.night label {
                color: rgba(255, 255, 255, 0.7);
            }

            body.day label {
                color: #475569;
            }

            .input-wrap {
                position: relative;
            }

            input[type=text],
            input[type=password] {
                width: 100%;
                border-radius: 12px;
                padding: 13px 16px;
                font-size: 14px;
                font-family: inherit;
                outline: none;
                transition: border-color 0.2s, background 0.2s, box-shadow 0.2s, color 0.5s;
            }

            body.night input[type=text],
            body.night input[type=password] {
                background: rgba(255, 255, 255, 0.07);
                border: 1px solid rgba(255, 255, 255, 0.12);
                color: #fff;
            }

            body.day input[type=text],
            body.day input[type=password] {
                background: rgba(255, 255, 255, 0.9);
                border: 1px solid rgba(0, 0, 0, 0.12);
                color: #1e293b;
            }

            input::placeholder {
                font-family: inherit;
            }

            body.night input::placeholder {
                color: rgba(255, 255, 255, 0.25);
            }

            body.day input::placeholder {
                color: #94a3b8;
            }

            input:focus {
                border-color: #f5c518;
                box-shadow: 0 0 0 3px rgba(245, 197, 24, 0.2);
            }

            .eye-btn {
                position: absolute;
                left: 12px;
                top: 50%;
                transform: translateY(-50%);
                background: none;
                border: none;
                cursor: pointer;
                padding: 4px;
                transition: color 0.2s;
            }

            body.night .eye-btn {
                color: rgba(255, 255, 255, 0.4);
            }

            body.day .eye-btn {
                color: #94a3b8;
            }

            .eye-btn:hover {
                color: #f5c518 !important;
            }

            .remember-row {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 24px;
            }

            input[type=checkbox] {
                width: 18px;
                height: 18px;
                accent-color: #f5c518;
                cursor: pointer;
            }

            .remember-row label {
                font-size: 13px;
                cursor: pointer;
                margin: 0;
            }

            .btn {
                width: 100%;
                background: linear-gradient(135deg, #f5c518, #e8a200);
                color: #1a1200;
                font-family: inherit;
                font-size: 15px;
                font-weight: 700;
                padding: 14px;
                border: none;
                border-radius: 14px;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                transition: transform 0.15s, box-shadow 0.15s, filter 0.15s;
                box-shadow: 0 6px 20px rgba(245, 197, 24, 0.35);
            }

            .btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 28px rgba(245, 197, 24, 0.45);
                filter: brightness(1.05);
            }

            .btn:active {
                transform: scale(0.98);
            }
        </style>
    </head>

    <body class="night">

        <!-- NIGHT -->
        <div class="sky-night">
            <div class="stars" id="stars"></div>
            <!-- proper crescent moon via SVG -->
            <div class="moon-wrap">
                <svg viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <mask id="crescentMask">
                            <rect width="60" height="60" fill="white" />
                            <circle cx="38" cy="22" r="20" fill="black" />
                        </mask>
                    </defs>
                    <circle cx="28" cy="28" r="24" fill="#fffde7" mask="url(#crescentMask)" />
                </svg>
            </div>
        </div>

        <!-- DAY -->
        <div class="sky-day">
            <div class="sun-wrap">
                <div class="rays" id="sunRays"></div>
                <div class="sun"></div>
            </div>
            <!-- clouds -->
            <div class="cloud" style="top:70px;animation-duration:24s;animation-delay:0s;">
                <svg width="130" height="50" viewBox="0 0 130 50" fill="none">
                    <ellipse cx="65" cy="38" rx="60" ry="18" fill="white"
                        opacity="0.92" />
                    <ellipse cx="45" cy="28" rx="28" ry="20" fill="white"
                        opacity="0.92" />
                    <ellipse cx="80" cy="25" rx="22" ry="18" fill="white"
                        opacity="0.92" />
                </svg>
            </div>
            <div class="cloud" style="top:130px;animation-duration:32s;animation-delay:-14s;">
                <svg width="100" height="42" viewBox="0 0 100 42" fill="none">
                    <ellipse cx="50" cy="32" rx="45" ry="15" fill="white"
                        opacity="0.85" />
                    <ellipse cx="35" cy="22" rx="22" ry="17" fill="white"
                        opacity="0.85" />
                    <ellipse cx="65" cy="20" rx="18" ry="15" fill="white"
                        opacity="0.85" />
                </svg>
            </div>
            <div class="cloud" style="top:55px;animation-duration:28s;animation-delay:-8s;">
                <svg width="110" height="46" viewBox="0 0 110 46" fill="none">
                    <ellipse cx="55" cy="35" rx="50" ry="16" fill="white"
                        opacity="0.9" />
                    <ellipse cx="38" cy="24" rx="25" ry="19" fill="white"
                        opacity="0.9" />
                    <ellipse cx="75" cy="22" rx="20" ry="16" fill="white"
                        opacity="0.9" />
                </svg>
            </div>
        </div>

        <!-- TREES -->
        <div class="tree" style="left:50px">
            <div class="tree-top" style="width:40px;height:52px;"></div>
            <div class="tree-trunk"></div>
        </div>
        <div class="tree" style="left:105px">
            <div class="tree-top" style="width:30px;height:38px;"></div>
            <div class="tree-trunk" style="height:20px;"></div>
        </div>
        <div class="tree" style="right:60px">
            <div class="tree-top" style="width:40px;height:52px;"></div>
            <div class="tree-trunk"></div>
        </div>
        <div class="tree" style="right:115px">
            <div class="tree-top" style="width:28px;height:36px;"></div>
            <div class="tree-trunk" style="height:20px;"></div>
        </div>

        <!-- GROUND -->
        <div class="ground"></div>

        <!-- CAR — drawn facing right, animated left→right -->
        <div class="car-wrap" id="car">
            <svg width="100" height="44" viewBox="0 0 100 44" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <!-- body -->
                <rect x="4" y="20" width="92" height="20" rx="5" fill="#2563eb" />
                <!-- roof -->
                <path d="M24 20 L34 7 L66 7 L78 20 Z" fill="#3b82f6" />
                <!-- windows -->
                <rect x="36" y="9" width="13" height="9" rx="2" fill="#bfdbfe" opacity="0.85" />
                <rect x="51" y="9" width="13" height="9" rx="2" fill="#bfdbfe" opacity="0.85" />
                <!-- wheels -->
                <circle cx="24" cy="40" r="6" fill="#1e293b" stroke="#94a3b8" stroke-width="2" />
                <circle cx="24" cy="40" r="2.5" fill="#94a3b8" />
                <circle cx="74" cy="40" r="6" fill="#1e293b" stroke="#94a3b8" stroke-width="2" />
                <circle cx="74" cy="40" r="2.5" fill="#94a3b8" />
                <!-- headlights (RIGHT side = front when going right) -->
                <rect id="headlightFront" x="90" y="24" width="9" height="5" rx="2.5"
                    fill="#fef08a" />
                <!-- tail lights (LEFT side) -->
                <rect x="1" y="24" width="7" height="5" rx="2.5" fill="#ef4444" opacity="0.75" />
                <!-- door line -->
                <line x1="50" y1="21" x2="50" y2="39" stroke="#1d4ed8"
                    stroke-width="1.2" opacity="0.6" />
            </svg>
        </div>

        <!-- TOGGLE -->
        <button class="toggle-btn" onclick="toggleMode()" id="toggleBtn">
            <span id="toggleLabel">ڕۆژ</span>
            <div class="toggle-track">
                <div class="toggle-thumb" id="toggleThumb">🌙</div>
            </div>
        </button>

        <!-- CARD -->
        <div class="card">
            <div class="logo-area">
                <div class="logo-icon">
                    <svg viewBox="0 0 36 36" fill="none">
                        <circle cx="18" cy="18" r="15" stroke="#1a1200" stroke-width="2.5"
                            fill="none" />
                        <circle cx="18" cy="18" r="3" fill="#1a1200" />
                        <line x1="18" y1="3" x2="18" y2="9" stroke="#1a1200"
                            stroke-width="2.5" stroke-linecap="round" />
                        <line x1="18" y1="27" x2="18" y2="33" stroke="#1a1200"
                            stroke-width="2.5" stroke-linecap="round" />
                        <line x1="3" y1="18" x2="9" y2="18" stroke="#1a1200"
                            stroke-width="2.5" stroke-linecap="round" />
                        <line x1="27" y1="18" x2="33" y2="18" stroke="#1a1200"
                            stroke-width="2.5" stroke-linecap="round" />
                        <line x1="18" y1="18" x2="24" y2="12" stroke="#1a1200"
                            stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <div class="logo-title">مەکتەبی شوفێری</div>
                <div class="logo-sub">سیستەمی ئامۆزگاری</div>
            </div>

            <div class="section-title">چوونەژوور بۆ هەژمارەکەت</div>

            <form wire:submit.prevent="login" class="space-y-5">


                <div class="field">
                    <label>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                        ناڤ
                    </label>
                    <input type="text" id="nameInput" wire:model="name" placeholder="بنووسە ناڤی بەکارهێنەر"
                        autocomplete="off" />

                </div>


                <div class="field">
                    <label>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" />
                            <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                        </svg>
                        پاسۆرد
                    </label>
                    <div class="input-wrap">
                        <input type="password" id="pwInput" wire:model="password" placeholder="••••••••"
                            autocomplete="current-password" />
                        <button type="button" class="eye-btn" onclick="togglePw()">
                            <svg id="eyeIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="18"
                                height="18">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </button>
                    </div>
                    @error('name')
                        <span class="error-message" style="color: red">{{ $message }}</span>
                    @enderror
                </div>




                <div class="remember-row">
                    <input type="checkbox" id="rememberMe" wire:model="remember" />
                    <label for="rememberMe">من لەبیر مەکە</label>
                </div>

                <button type="submit" class="btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                        <polyline points="10 17 15 12 10 7" />
                        <line x1="15" y1="12" x2="3" y2="12" />
                    </svg>
                    چوونەژوور
                </button>

            </form>
        </div>

        <script>
            /* stars */
            const starsEl = document.getElementById('stars');
            for (let i = 0; i < 65; i++) {
                const s = document.createElement('div');
                s.className = 'star';
                const sz = Math.random() * 2.5 + 1;
                s.style.cssText =
                    `width:${sz}px;height:${sz}px;top:${Math.random()*100}%;left:${Math.random()*100}%;animation-delay:${Math.random()*3}s;animation-duration:${2+Math.random()*3}s`;
                starsEl.appendChild(s);
            }

            /* sun rays */
            const raysEl = document.getElementById('sunRays');
            for (let i = 0; i < 12; i++) {
                const r = document.createElement('div');
                r.className = 'ray';
                r.style.transform = `rotate(${i*30}deg) translateY(-46px)`;
                raysEl.appendChild(r);
            }

            /* headlight glow on night */
            const hl = document.getElementById('headlightFront');

            function updateHeadlight(night) {
                hl.style.filter = night ? 'drop-shadow(0 0 6px #fef08a)' : 'none';
            }
            updateHeadlight(true);

            let isNight = true;

            function toggleMode() {
                isNight = !isNight;
                document.body.classList.toggle('night', isNight);
                document.body.classList.toggle('day', !isNight);
                document.getElementById('toggleLabel').textContent = isNight ? 'ڕۆژ' : 'شەو';
                document.getElementById('toggleThumb').textContent = isNight ? '🌙' : '☀️';
                updateHeadlight(isNight);
            }

            function togglePw() {
                const inp = document.getElementById('pwInput');
                const icon = document.getElementById('eyeIcon');
                if (inp.type === 'password') {
                    inp.type = 'text';
                    icon.innerHTML =
                        `<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>`;
                } else {
                    inp.type = 'password';
                    icon.innerHTML = `<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
                }
            }

            function handleLogin(e) {
                e.preventDefault();
                const btn = e.target.querySelector('.btn');
                btn.style.opacity = '0.75';
                btn.innerHTML =
                    `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="animation:spin .8s linear infinite"><path d="M21 12a9 9 0 1 1-6.22-8.56"/></svg> چاوەڕێبە...`;
                setTimeout(() => {
                    btn.style.opacity = '1';
                    btn.innerHTML =
                        `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> بەخێربێیت!`;
                }, 1500);
            }

            const s = document.createElement('style');
            s.textContent = '@keyframes spin{to{transform:rotate(360deg)}}';
            document.head.appendChild(s);

            document.getElementById('nameInput').focus();

            document.addEventListener('livewire:load', function() {

                const input = document.querySelector('[wire\\:model="name"]');

                if (input) {
                    input.focus();
                }

            });

            // ڕێگری لە گەڕانەوە بۆ لاپەڕەی پێشوو دوای لۆگین یان لۆگ ئاوت
            window.onload = function() {
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            }

            // ئەم کۆدە ڕێگری دەکات لەوەی بەکارهێنەر بتوانێت مێژووی وێبگەڕ بەکاربهێنێت بۆ گەڕانەوە
            history.pushState(null, null, location.href);
            window.onpopstate = function() {
                history.go(1);
            };
        </script>
    </body>

    </html>

</div>
