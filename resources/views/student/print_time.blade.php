<!DOCTYPE html>
<html lang="ku" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>فورما فێرخازی</title>
    <link href="https://fonts.googleapis.com/css2?family=Scheherazade&display=swap" rel="stylesheet">

    <style>
        @page {
            size: A4;
            margin: 10mm;
        }

        body {
            font-size: 16px;
            /* Reduced from 20px */
            color: #000;
            margin: 0;
            padding: 0;
            font-family: 'Scheherazade', serif;
        }

        .page {
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }

        /* ===== TOP SECTION ===== */
        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
            /* Reduced from 20px */
        }

        /* العمود الأيمن: اللوجو + الصورة */
        .right-column {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .logo {
            width: 50px;
            /* Reduced from 60px */
            height: auto;
        }

        .photo-box {
            margin-top: 50px;
            /* Reduced from 115px */
            margin-left: 35px;
            width: 90px;
            /* Reduced from 100px */
            height: 90px;
            /* Reduced from 100px */
            border: 1px solid #000;
            border-radius: 5px;
        }

        /* HEADER CENTER */
        .header {
            text-align: right;
            flex: 1;
            line-height: 1.6;
            /* Reduced from 1.8 */
            padding-left: 15px;
        }

        .header strong {
            font-size: 18px;
            /* Reduced from 15px */
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            /* Reduced from 20px */
            font-size: 14px;
            /* Added */
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px 6px;
            /* Reduced from 8px 10px */
            height: 30px;
            /* Fixed height */
        }

        th {
            width: 70px;
            text-align: right;
            font-weight: bold;
        }

        td {
            text-align: right;
        }

        @media print {
            body {
                margin: 0;
                font-size: 15px;
            }
        }

        .box {
            margin-top: 8px;
            /* Reduced from 10px */
            width: 170px;
            /* Reduced from 180px */
            height: 35px;
            /* Reduced from 40px */
            border: 1px solid black;
            border-radius: 50px;
        }

        .box1 {
            margin-top: 8px;
            /* Reduced from 10px */
            width: 170px;
            /* Reduced from 180px */
            height: 35px;
            /* Reduced from 40px */
            border: 1px solid black;
        }

        .text {
            position: relative;
            top: 7px;
            /* Adjusted */
            right: 5px;
            font-size: 16px;
            /* Reduced from 18px */
        }

        .left-div {
            position: relative;
            margin: 8px 10px;
            /* Reduced top margin */
        }

        /* Added for compact layout */
        .compact-table th,
        .compact-table td {
            padding: 3px 4px;
            height: 25px;
            text-align: center;
        }

        .compact-table {
            margin-top: 10px;
            font-size: 13px;
        }

        .section-spacing {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        h4 {
            margin: 8px 0;
            /* Reduced margin */
            font-size: 16px;
            /* Smaller font */
        }
    </style>
</head>

<body>

    <div class="page">

        <!-- TOP SECTION: HEADER CENTER + RIGHT COLUMN (Logo + Photo) -->
        <div class="top-section">

            <!-- HEADER CENTER -->
            <div class="header">
                <strong>فورما تایبەت یا فێرخازا ل نڤێسنگەها فیرکرنا شوفیری</strong>
                <br> <strong>نڤێسنگەها : خابور</strong>
                <br> <strong>خورێ خولێ : B</strong> <br>
                <strong>ناڤێ ماموستایێ وانەبێژ : کاروژ سلام محمد / ایفار حمد محی</strong><br>

                <strong>
                    دەمێ دەستپێکرنا خولێ ێ کات ژمێر
                    (
                    <span style="direction:ltr; display:inline-block;">
                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $student->time)->format('h:i') }}

                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $student->time)->format('A') }}
                    </span>
                    )
                    دەمێ دوماهیک هاتنا خولێ کات ژمێر
                    (
                    <span style="direction:ltr; display:inline-block;">
                        {{ \Carbon\Carbon::parse($student->time)->addHours(2)->addMinutes(45)->format('h:i') }}

                        {{ \Carbon\Carbon::parse($student->time)->addHours(2)->addMinutes(45)->format('A') }}
                    </span>
                    )
                </strong>
                <br>
                <strong>
                    روژا دەستپێکرنا خولێ :
                    (<span style="display:inline-block; width:100px; ">&nbsp;</span>)
                    روژا دوماهیک هاتنا خولێ
                    (<span style="display:inline-block; width:80px; ">&nbsp;</span>)
                </strong><br>

            </div>


            <!-- RIGHT COLUMN: LOGO + PHOTO -->
            <div class="right-column">
                <img class="logo" src="{{ asset('assets/logo.png') }}" alt="Logo">

                <div class="photo-box">

                </div>
                <div class="box">
                    <span class="text">ژمارا کارتێ</span>
                </div>
                <div class="box1">
                    <span class="text">ژمارا پسولێ : {{ $student->invoice }}</span>
                </div>

            </div>

        </div>
        <strong style="margin-right: 40%;font-size: 16px;"><b>خشتێ وانەگوتناتیوری</b></strong><br>

        <!-- TABLE 1 -->
        <table class="compact-table">
            <tr>
                <th>روژ</th>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>



            </tr>
            <tr>
                <th>واژویا فیرخازی</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <div class="section-spacing">
            <div style="float: left; margin-left: 20px;">
                <h4>ریکەفتی دەرچوونا ل تاقیکرنێ : {{ $student->name }}</h4>
                <div class="box1">
                    <span class="text">ژمارا پسولێ : {{ $student->invoice }}</span>
                </div>
            </div>

            <div class="left-div">
                <div>
                    <h4>ناڤێ راهینەری : {{ $student->coach->name }}</h4>
                </div>
                <div>
                    <h4> ژمارا ئوتومبێلێ : {{ $student->number_car }} ، جوری ئوتومبێلێ :
                        {{ $student->typecar == 0 ? 'ئوتوماتیک' : 'عادی' }}</h4>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
        <div class="section-spacing">
            <strong style="margin-right: 40%;font-size: 16px;"><b>خشتێ راهێنانێن پراکتیکی</b></strong>
        </div>
        <!-- TABLE 2 -->
        <table class="compact-table">
            <tr>
                <th>روژ</th>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>
                <td style="text-align:center; font-size:18px; line-height:1.2;">
                    <span style="display:block;">شەمب</span>
                    <span style="display:block;">/</span>
                    <span style="display:block;">{{ now()->year }}</span>
                </td>

            </tr>
            <tr>
                <th>واژویا فیرخازی</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th>واژویا راهینەری</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <div class="section-spacing">
            <strong style="margin-right: 40%;font-size: 16px;"><b>خشتێ تاقیکرنا پراکتیکی</b></strong>
        </div>

        <!-- TABLE 3 -->
        <table class="compact-table">
            <tr>
                <th style="width: 13px;">ژ</th>
                <th style="width: 100px;">ریکەفتی تاقیکرنا پراکتیکی</th>
                <th style="width: 70px;">ئەفسەرێ تاقیکرنێ</th>
                <th>ئەنجام</th>
                <th>وانا دیارکری</th>
                <th>تێبینی</th>
            </tr>
            <tr>
                <td>1</td>
                <td style="text-align:center; font-size:18px;">
                    <span style="display:inline-block; width:10px; text-align:center;"></span>
                    <span style="display:inline-block; width:20px;">/</span>

                    <span style="display:inline-block; width:10px; text-align:center;"></span>
                    <span style="display:inline-block; width:20px;">/</span>

                    <span style="display:inline-block; width:30px; text-align:center;">
                        {{ now()->year }}
                    </span>
                </td>


                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td style="text-align:center; font-size:18px;">
                    <span style="display:inline-block; width:10px; text-align:center;"></span>
                    <span style="display:inline-block; width:20px;">/</span>

                    <span style="display:inline-block; width:10px; text-align:center;"></span>
                    <span style="display:inline-block; width:20px;">/</span>

                    <span style="display:inline-block; width:30px; text-align:center;">
                        {{ now()->year }}
                    </span>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td style="text-align:center; font-size:18px;">
                    <span style="display:inline-block; width:10px; text-align:center;"></span>
                    <span style="display:inline-block; width:20px;">/</span>

                    <span style="display:inline-block; width:10px; text-align:center;"></span>
                    <span style="display:inline-block; width:20px;">/</span>

                    <span style="display:inline-block; width:30px; text-align:center;">
                        {{ now()->year }}
                    </span>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td style="text-align:center; font-size:18px;">
                    <span style="display:inline-block; width:10px; text-align:center;"></span>
                    <span style="display:inline-block; width:20px;">/</span>

                    <span style="display:inline-block; width:10px; text-align:center;"></span>
                    <span style="display:inline-block; width:20px;">/</span>

                    <span style="display:inline-block; width:30px; text-align:center;">
                        {{ now()->year }}
                    </span>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td style="text-align:center; font-size:18px;">
                    <span style="display:inline-block; width:10px; text-align:center;"></span>
                    <span style="display:inline-block; width:20px;">/</span>

                    <span style="display:inline-block; width:10px; text-align:center;"></span>
                    <span style="display:inline-block; width:20px;">/</span>

                    <span style="display:inline-block; width:30px; text-align:center;">
                        {{ now()->year }}
                    </span>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6</td>
                <td style="text-align:center; font-size:18px;">
                    <span style="display:inline-block; width:10px; text-align:center;"></span>
                    <span style="display:inline-block; width:20px;">/</span>

                    <span style="display:inline-block; width:10px; text-align:center;"></span>
                    <span style="display:inline-block; width:20px;">/</span>

                    <span style="display:inline-block; width:30px; text-align:center;">
                        {{ now()->year }}
                    </span>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>

</body>

</html>
