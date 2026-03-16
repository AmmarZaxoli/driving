<div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        :root {
            --pr: #1a6b5a;
            --prl: #22896e;
            --prd: #134e42;
            --ac: #f0a500;
            --tr: all 0.3s cubic-bezier(.4, 0, .2, 1);
        }

        .lm {
            --bg: #edf2f0;
            --bgc: #ffffff;
            --bgc2: #f4f8f6;
            --tx: #1c2b28;
            --txs: #6b7c75;
            --bd: #dde5e3;
            --sdw: 0 24px 64px rgba(0, 0, 0, .10);
        }

        .dm {
            --bg: #1e2e2b;
            --bgc: #26403c;
            --bgc2: #2e4d48;
            --tx: #dff0ec;
            --txs: #90b8b0;
            --bd: #38534e;
            --sdw: 0 24px 64px rgba(0, 0, 0, .40);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(26px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-14px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @keyframes slideR {
            from {
                opacity: 0;
                transform: translateX(-16px)
            }

            to {
                opacity: 1;
                transform: translateX(0)
            }
        }

        @keyframes pulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(34, 137, 110, .5)
            }

            65% {
                box-shadow: 0 0 0 16px rgba(34, 137, 110, 0)
            }
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0)
            }

            20%,
            60% {
                transform: translateX(-7px)
            }

            40%,
            80% {
                transform: translateX(7px)
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg)
            }
        }

        @keyframes checkPop {
            0% {
                transform: scale(0) rotate(-20deg)
            }

            65% {
                transform: scale(1.25)
            }

            100% {
                transform: scale(1)
            }
        }

        @keyframes floatY {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-5px)
            }
        }

        @keyframes orbDrift1 {

            0%,
            100% {
                transform: translate(0, 0)
            }

            50% {
                transform: translate(18px, -14px)
            }
        }

        @keyframes orbDrift2 {

            0%,
            100% {
                transform: translate(0, 0)
            }

            50% {
                transform: translate(-14px, 18px)
            }
        }

        @keyframes errIn {
            from {
                opacity: 0;
                transform: translateY(-5px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @keyframes successRoad {
            from {
                background-position: 0 0
            }

            to {
                background-position: -160px 0
            }
        }

        @keyframes licenseShine {

            0%,
            100% {
                opacity: .6
            }

            50% {
                opacity: 1
            }
        }

        @keyframes roadLineDash {
            from {
                stroke-dashoffset: 60
            }

            to {
                stroke-dashoffset: 0
            }
        }

        @keyframes wheelTurn {
            from {
                transform: rotate(0deg)
            }

            to {
                transform: rotate(360deg)
            }
        }

        @keyframes iconFloat {

            0%,
            100% {
                transform: translateY(0) scale(1)
            }

            40% {
                transform: translateY(-4px) scale(1.04)
            }

            70% {
                transform: translateY(-2px) scale(1.01)
            }
        }

        .page {
            background: var(--bg);
           
            min-height: 580px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            font-family: 'Amiri', serif;
            direction: rtl;
            position: relative;
            overflow: hidden;
            transition: background .45s;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(90px);
        }

        .o1 {
            width: 300px;
            height: 300px;
            background: rgba(26, 107, 90, .16);
            top: -90px;
            right: -70px;
            animation: orbDrift1 9s ease-in-out infinite;
        }

        .o2 {
            width: 220px;
            height: 220px;
            background: rgba(240, 165, 0, .10);
            bottom: -60px;
            left: -60px;
            animation: orbDrift2 11s ease-in-out infinite;
        }

        .card {
            width: 100%;
            max-width: 420px;
            background: var(--bgc);
            border: 1px solid var(--bd);
            border-radius: 22px;
            box-shadow: var(--sdw);
            overflow: hidden;
            animation: fadeUp .6s cubic-bezier(.4, 0, .2, 1) both;
            position: relative;
            z-index: 2;
            transition: background .45s, border-color .45s, box-shadow .45s;
        }

        /* ── Header ── */
        .c-head {
            background: linear-gradient(145deg, var(--prd) 0%, var(--pr) 52%, var(--prl) 100%);
            padding: 28px 24px 32px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .c-head::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(255, 255, 255, .07) 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .c-head::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 30px;
            background: var(--bgc);
            clip-path: ellipse(54% 100% at 50% 100%);
            transition: background .45s;
        }

        /* ── Icon: License + Steering wheel ── */
        .head-icon {
            width: 74px;
            height: 74px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .14);
            border: 2.5px solid rgba(255, 255, 255, .28);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 13px;
            animation: pulse 2.8s infinite;
            position: relative;
            z-index: 1;
            cursor: pointer;
            transition: transform .25s, background .25s;
        }

        .head-icon:hover {
            transform: scale(1.07);
            background: rgba(255, 255, 255, .22);
        }

        .head-icon:hover .icon-svg {
            animation: iconFloat .6s ease;
        }

        .icon-svg {
            width: 46px;
            height: 46px;
            transition: transform .25s;
        }

        .h-title {
            font-size: 21px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 6px;
            animation: fadeDown .5s .15s both;
            position: relative;
            z-index: 1;
        }

        .h-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(240, 165, 0, .22);
            border: 1px solid rgba(240, 165, 0, .4);
            color: #fcd34d;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            animation: floatY 3s ease-in-out infinite, fadeDown .5s .28s both;
            position: relative;
            z-index: 1;
        }

        .h-badge svg {
            width: 11px;
            height: 11px;
            fill: currentColor;
            flex-shrink: 0;
        }

        /* ── Theme toggle ── */
        .theme-row {
            display: flex;
            justify-content: center;
            padding: 13px 0 2px;
            animation: fadeUp .5s .05s both;
        }

        .t-tog {
            display: flex;
            align-items: center;
            gap: 7px;
            background: var(--bgc2);
            border: 1px solid var(--bd);
            border-radius: 50px;
            padding: 5px 14px 5px 10px;
            cursor: pointer;
            transition: var(--tr);
            font-size: 12px;
            font-weight: 700;
            color: var(--txs);
            font-family: 'Amiri', serif;
        }

        .t-tog:hover {
            border-color: var(--pr);
            color: var(--pr);
        }

        .t-track {
            width: 34px;
            height: 18px;
            border-radius: 20px;
            background: #c5d0cc;
            position: relative;
            transition: var(--tr);
            flex-shrink: 0;
        }

        .dm .t-track {
            background: var(--prl);
        }

        .t-thumb {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #fff;
            position: absolute;
            top: 2px;
            left: 2px;
            transition: var(--tr);
            box-shadow: 0 1px 4px rgba(0, 0, 0, .22);
        }

        .dm .t-thumb {
            left: 18px;
        }

        .t-icon {
            font-size: 14px;
        }

        /* ── Body ── */
        .c-body {
            padding: 6px 24px 26px;
        }

        .field {
            margin-bottom: 15px;
            animation: slideR .45s both;
        }

        .field:nth-child(1) {
            animation-delay: .1s
        }

        .field:nth-child(2) {
            animation-delay: .2s
        }

        .f-lbl {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 700;
            color: var(--txs);
            margin-bottom: 7px;
            transition: color .3s;
        }

        .f-lbl svg {
            width: 14px;
            height: 14px;
            fill: none;
            stroke: var(--prl);
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        .inp-w {
            position: relative;
        }

        .inp {
            width: 100%;
            background: var(--bgc2);
            border: 1.5px solid var(--bd);
            border-radius: 10px;
            padding: 11px 42px 11px 14px;
            font-size: 15px;
            color: var(--tx);
            font-family: 'Amiri', serif;
            outline: none;
            transition: var(--tr);
        }

        .inp:hover {
            border-color: rgba(34, 137, 110, .45);
        }

        .inp:focus {
            border-color: var(--prl);
            box-shadow: 0 0 0 3px rgba(26, 107, 90, .14);
            background: var(--bgc);
        }

        .inp::placeholder {
            color: var(--txs);
            opacity: .5;
            font-family: 'Amiri', serif;
        }

        .i-ico {
            position: absolute;
            top: 50%;
            right: 13px;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            fill: none;
            stroke: var(--txs);
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
            pointer-events: none;
            opacity: .5;
            transition: var(--tr);
        }

        .inp:focus~.i-ico {
            stroke: var(--prl);
            opacity: 1;
        }

        .eye-b {
            position: absolute;
            top: 50%;
            left: 11px;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            display: flex;
            align-items: center;
            opacity: .45;
            transition: opacity .2s;
        }

        .eye-b:hover {
            opacity: 1;
        }

        .eye-b svg {
            width: 15px;
            height: 15px;
            fill: none;
            stroke: var(--txs);
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .bar-wrap {
            height: 3px;
            border-radius: 3px;
            background: var(--bd);
            margin-top: 4px;
            overflow: hidden;
        }

        .bar-fill {
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, var(--pr), var(--prl));
            transition: width .45s ease;
        }

        .err {
            display: none;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            color: #ef4444;
            margin-top: 5px;
            animation: errIn .3s ease;
        }

        .err svg {
            width: 12px;
            height: 12px;
            fill: none;
            stroke: #ef4444;
            stroke-width: 2.5;
            stroke-linecap: round;
            flex-shrink: 0;
        }

        .field.bad .inp {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, .12) !important;
            animation: shake .38s ease;
        }

        .field.bad .bar-fill {
            background: #ef4444;
            width: 100%;
        }

        .field.bad .err {
            display: flex;
        }

        .btn-s {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, var(--prd), var(--pr), var(--prl));
            background-size: 200% 100%;
            background-position: right;
            border: none;
            color: #fff;
            border-radius: 10px;
            font-size: 17px;
            font-weight: 700;
            font-family: 'Amiri', serif;
            cursor: pointer;
            transition: background-position .5s, transform .2s, box-shadow .2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            overflow: hidden;
            position: relative;
            animation: fadeUp .45s .36s both;
        }

        .btn-s:hover {
            background-position: left;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(26, 107, 90, .42);
        }

        .btn-s:active {
            transform: scale(.99);
        }

        .btn-s svg {
            width: 17px;
            height: 17px;
            fill: none;
            stroke: #fff;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .bsp {
            width: 17px;
            height: 17px;
            border: 2px solid rgba(255, 255, 255, .3);
            border-top-color: #fff;
            border-radius: 50%;
            display: none;
            animation: spin .65s linear infinite;
            flex-shrink: 0;
        }

        .div-line {
            height: 1px;
            background: var(--bd);
            margin: 16px 0;
            animation: fadeUp .4s .44s both;
            transition: background .45s;
        }

        .foot {
            text-align: center;
            font-size: 12px;
            color: var(--txs);
            opacity: .55;
            animation: fadeUp .4s .48s both;
        }



        .s-ring {
            width: 68px;
            height: 68px;
            border-radius: 50%;
            background: linear-gradient(135deg, #16a34a, #22c55e);
            display: flex;
            align-items: center;
            justify-content: center;
            animation: checkPop .4s cubic-bezier(.4, 0, .2, 1);
            box-shadow: 0 0 0 14px rgba(34, 197, 94, .12);
        }

        .s-ring svg {
            width: 30px;
            height: 30px;
            fill: none;
            stroke: #fff;
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .s-t {
            font-size: 19px;
            font-weight: 700;
            color: var(--tx);
            animation: fadeUp .4s .15s both;
        }

        .s-s {
            font-size: 13px;
            color: var(--txs);
            animation: fadeUp .4s .25s both;
        }

        .s-rd {
            width: 75%;
            height: 10px;
            border-radius: 5px;
            background: var(--bd);
            overflow: hidden;
            margin-top: 8px;
            animation: fadeUp .4s .32s both;
        }

        .s-rd-ln {
            height: 100%;
            background: repeating-linear-gradient(90deg, var(--ac) 0, var(--ac) 20px, transparent 20px, transparent 40px);
            animation: successRoad .8s linear infinite;
            width: 200%;
        }

        @media(max-width:480px) {
            .page {
                padding: 1.5rem .75rem;
            }

            .card {
                border-radius: 16px;
            }

            .c-head {
                padding: 22px 18px 28px;
            }

            .c-body {
                padding: 4px 18px 22px;
            }

            .h-title {
                font-size: 18px;
            }

            .head-icon {
                width: 62px;
                height: 62px;
            }

            .icon-svg {
                width: 38px;
                height: 38px;
            }
        }

        @media(max-width:360px) {
            .h-title {
                font-size: 16px;
            }

            .btn-s {
                font-size: 15px;
                padding: 11px;
            }

            .inp {
                font-size: 14px;
            }
        }
    </style>

    <div class="page lm" id="pg">


        <div class="card" id="card">


            <div class="c-head">
                <div class="head-icon" id="hi">
                    <svg class="icon-svg" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- License card body -->
                        <rect x="4" y="10" width="38" height="26" rx="4" fill="rgba(255,255,255,.95)"
                            stroke="rgba(255,255,255,.3)" stroke-width=".5" />
                        <!-- Green header strip -->
                        <rect x="4" y="10" width="38" height="9" rx="4" fill="#22896e" />
                        <rect x="4" y="15" width="38" height="4" fill="#22896e" />
                        <!-- Stars on strip -->
                        <circle cx="10" cy="14.5" r="1.2" fill="rgba(255,255,255,.6)" />
                        <circle cx="14" cy="14.5" r="1.2" fill="rgba(255,255,255,.6)" />
                        <circle cx="18" cy="14.5" r="1.2" fill="rgba(255,255,255,.6)" />
                        <!-- Photo placeholder -->
                        <rect x="8" y="22" width="10" height="11" rx="2" fill="#e2eeeb" />
                        <circle cx="13" cy="25.5" r="2.5" fill="#7ba89f" />
                        <path d="M8 33 C9 29.5 17 29.5 18 33Z" fill="#7ba89f" />
                        <!-- Text lines -->
                        <rect x="22" y="22" width="16" height="2.5" rx="1.2" fill="#1a6b5a"
                            opacity=".7" />
                        <rect x="22" y="27" width="11" height="2" rx="1" fill="#6b7c75"
                            opacity=".5" />
                        <rect x="22" y="31" width="13" height="2" rx="1" fill="#6b7c75"
                            opacity=".4" />
                        <!-- Steering wheel bottom right -->
                        <g transform="translate(30,30) scale(0.72)">
                            <circle cx="8" cy="8" r="7.5" stroke="#1a6b5a" stroke-width="2"
                                fill="none" />
                            <circle cx="8" cy="8" r="2.5" stroke="#1a6b5a" stroke-width="1.5"
                                fill="none" />
                            <line x1="8" y1=".5" x2="8" y2="5.5" stroke="#1a6b5a"
                                stroke-width="1.8" stroke-linecap="round" />
                            <line x1="8" y1="10.5" x2="8" y2="15.5" stroke="#1a6b5a"
                                stroke-width="1.8" stroke-linecap="round" />
                            <line x1=".5" y1="8" x2="5.5" y2="8" stroke="#1a6b5a"
                                stroke-width="1.8" stroke-linecap="round" />
                            <line x1="10.5" y1="8" x2="15.5" y2="8" stroke="#1a6b5a"
                                stroke-width="1.8" stroke-linecap="round" />
                        </g>
                        <!-- Shine on card -->
                        <rect x="4" y="10" width="38" height="26" rx="4" fill="url(#shine)"
                            opacity=".15" />
                        <defs>
                            <linearGradient id="shine" x1="0" y1="0" x2="1"
                                y2="1">
                                <stop offset="0%" stop-color="white" stop-opacity="1" />
                                <stop offset="60%" stop-color="white" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <div class="h-title">چوونەژوورێ</div>
                <div class="h-badge">
                    <svg viewBox="0 0 12 12">
                        <path d="M6 1L7.5 4.5L11 5L8.5 7.5L9 11L6 9.5L3 11L3.5 7.5L1 5L4.5 4.5Z" />
                    </svg>
                    پانێڵی فێرکاری شوفێرێ
                </div>
            </div>

            <div class="theme-row">
                <button class="t-tog" id="tb" type="button">
                    <div class="t-track">
                        <div class="t-thumb"></div>
                    </div>
                    <span id="tl">🌙 دۆخی تاریک</span>
                </button>
            </div>

            <form wire:submit.prevent="login">
                <div class="c-body">
                    <div class="field" id="fn">
                        <div class="f-lbl">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                            </svg>
                            ناڤێ بەکارهێنەر
                        </div>
                        <div class="inp-w">
                            <input class="inp" wire:model="name" type="text" id="ni"
                                placeholder="ناڤێ ئەدمینی">

                            <svg class="i-ico" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                            </svg>
                        </div>
                        <div class="bar-wrap">
                            <div class="bar-fill" id="nb"></div>
                        </div>
                        <div class="err" id="ne">
                            <svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" y1="8" x2="12" y2="12" />
                                <line x1="12" y1="16" x2="12.01" y2="16" />
                            </svg>
                            ناڤ پێویستە تژ بکرێت
                        </div>
                    </div>

                    <div class="field" id="fp">
                        <div class="f-lbl">
                            <svg viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                            پاسۆرد
                        </div>
                        <div class="inp-w">
                            <input class="inp" type="password" wire:model="password" id="pi"
                                placeholder="••••••••" style="padding-left:38px;">

                            <svg class="i-ico" viewBox="0 0 24 24">
                                <rect x="3" y="11" width="18" height="11" rx="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                            <button class="eye-b" id="eb" type="button">
                                <svg id="es" viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>

                            <div class="bar-wrap">
                            <div class="bar-fill" id="pb"></div>
                        </div>
                        
                        </div>

                    </div>

                    
                    @error('name')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror

                    <button class="btn-s" id="sb" type="button">
                        <div class="bsp" id="bsp"></div>
                        <svg id="bi" viewBox="0 0 24 24">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                            <polyline points="10 17 15 12 10 7" />
                            <line x1="15" y1="12" x2="3" y2="12" />
                        </svg>
                        <span id="bt">چوونەژوورێ</span>
                    </button>

                    <div class="div-line"></div>
                    <div class="foot">© 2025 — سیستەمی فێرکاری شوفێرێ</div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const pg = document.getElementById('pg');
        let dark = false;

        // Theme Toggle
        document.getElementById('tb').addEventListener('click', () => {
            dark = !dark;
            pg.className = dark ? 'page dm' : 'page lm';
            document.getElementById('tl').textContent = dark ? '☀️ دۆخی روون' : '🌙 دۆخی تاریک';
        });

        const ni = document.getElementById('ni'),
            pi = document.getElementById('pi'),
            fn = document.getElementById('fn'),
            fp = document.getElementById('fp'),
            nb = document.getElementById('nb'),
            pb = document.getElementById('pb'),
            sb = document.getElementById('sb'),
            bsp = document.getElementById('bsp'),
            bi = document.getElementById('bi'),
            bt = document.getElementById('bt'),
            sl = document.getElementById('sl');

        // Focus Animations
        ni.addEventListener('focus', () => nb.style.width = '100%');
        ni.addEventListener('blur', () => {
            if (!ni.value.trim()) nb.style.width = '0';
        });
        pi.addEventListener('focus', () => pb.style.width = '100%');
        pi.addEventListener('blur', () => {
            if (!pi.value.trim()) pb.style.width = '0';
        });

        // Validation Check & Submit
        sb.addEventListener('click', (e) => {
            let ok = true;

            // پاککردنەوەی کلاسە کۆنەکان
            fn.classList.remove('bad');
            fp.classList.remove('bad');

            if (!ni.value.trim()) {
                fn.classList.add('bad');
                ok = false;
            }
            if (!pi.value.trim()) {
                fp.classList.add('bad');
                ok = false;
            }

            if (!ok) return;

            // ئەگەر هەموو شتێک ڕاست بوو، لێرەدا فۆرمەکە دەنێردرێت بۆ Livewire
            bsp.style.display = 'block';
            bi.style.display = 'none';
            bt.textContent = 'چاوەڕوانبە...';
            sb.disabled = true;

            // بانگکردنی میتۆدی login لە ناو Livewire Component
            @this.login().then(response => {
                // ئەگەر چوونەژوورێ سەرکەوتوو بوو
                bsp.style.display = 'none';
                bi.style.display = 'block';
                bt.textContent = 'چوونەژوورێ';
                sb.disabled = false;
            }).catch(error => {
                // ئەگەر کێشەیەک هەبوو لە سێرڤەر یان یوزەر و پاسۆرد هەڵە بوو
                bsp.style.display = 'none';
                bi.style.display = 'block';
                bt.textContent = 'چوونەژوورێ';
                sb.disabled = false;
            });
        });

       

        // Icon Animation on click
        document.getElementById('hi').addEventListener('click', () => {
            const ic = document.querySelector('.icon-svg');
            ic.style.animation = 'none';
            setTimeout(() => {
                ic.style.animation = 'iconFloat .6s ease';
            }, 10);
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

</div>
