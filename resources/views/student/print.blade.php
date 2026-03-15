<!DOCTYPE html>
<html lang="ku" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>فورما فێرخازی</title>
    <link href="https://fonts.googleapis.com/css2?family=Scheherazade&display=swap" rel="stylesheet">

    <style>
        @page {
            size: A4;
            margin: 15mm;
        }

        body {

            font-size: 20px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        .page {
            width: 100%;
        }

        /* ===== TOP SECTION ===== */
        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        /* العمود الأيمن: اللوجو + الصورة */
        .right-column {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            /* على اليمين */
        }

        .logo {
            width: 60px;
            height: auto;
        }

        .photo-box {
            margin-top: 115px;
            width: 80px;
            height: 80px;
            border: 2px solid #000;
            border-radius: 5px;
        }

        /* HEADER CENTER */
        .header {
            text-align: center;
            /* في الوسط */
            flex: 1;
            /* يأخذ بقية المساحة */
            line-height: 1.8;
        }

        .header strong {
            font-size: 15px;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px 10px;
        }

        th {
            width: 30%;
            background: #f5f5f5;
            text-align: right;
            font-weight: bold;
        }

        td {
            text-align: right;
        }



        @media print {
            body {
                margin: 0;
            }
        }


        /* FOOTER */
        .footer {
            margin-top: 60px;
            width: 100%;
            display: table;
        }

        .signature {
            display: table-cell;
            width: 50%;
            text-align: center;
        }

        .bottom {
            position: fixed;
            bottom: 15mm;
            left: 15mm;
            right: 15mm;
            text-align: center;
            font-size: 13px;
            line-height: 1.8;
            border-top: 1px solid #000;
            padding-top: 8px;
            direction: rtl;
        }
    </style>
</head>

<body onload="window.print()">

    <div class="page">

        <!-- TOP SECTION: HEADER CENTER + RIGHT COLUMN (Logo + Photo) -->
        <div class="top-section">

            <!-- HEADER CENTER -->
            <div class="header">
                <strong>هەرێمیێ کوردستانا عێراقێ</strong><br>
                وەزارەتاناوخو<br>
                ریفەبەریا گشتی یا هاتن و چوونێ<br>
                <strong>بەشێ مولەتێن شوفیری </strong><br>
                <strong>نڤێسینگەها فیرکرنا شوفیری (خابور)</strong><br>
                <strong>زانیاری یێن کەسێ فێرخاز</strong><br>
                ****************************
            </div>

            <!-- RIGHT COLUMN: LOGO + PHOTO -->
            <div class="right-column">
                <img class="logo" src="{{ asset('assets/logo.png') }}" alt="Logo">

                <!-- صورة الطالب -->
                <div class="photo-box">
                    {{-- 
                    إذا عندك صورة:
                    <img src="{{ asset('storage/'.$student->photo) }}" style="width:100%;height:100%;object-fit:cover;">
                    --}}
                </div>
            </div>

        </div>

        <!-- TABLE -->
        <table>
            <tr>
                <th>ناڤێ فێرخازی</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th>ناڤێ دایکێ</th>
                <td>{{ $student->mother_name }}</td>
            </tr>
            <tr>
                <th>سالا ژ دایکبونێ</th>
                <td>{{ $student->birthday }}</td>
            </tr>
            <tr>
                <th>ناونیشان</th>
                <td>{{ $student->location }}</td>
            </tr>
            <tr>
                <th>ژمارا موبایل</th>
                <td>{{ $student->mobile_number }}</td>
            </tr>
            <tr>
                <th>ناڤێ راهێنەری</th>
                <td>{{ $student->coach->name ?? '-' }}</td>
            </tr>
            <tr>
                <th>جورێ ئوتومبێلێ</th>
                <td>{{ $student->typecar == 0 ? 'ئوتوماتیک' : 'عادی' }}</td>
            </tr>
            <tr>
                <th>فێرکرن</th>
                <td>{{ $student->learn == 0 ? 'فێرکرن' : 'فێرکرن و وانە' }}</td>
            </tr>
            <tr>
                <th>روژا دەستپێکرنێ</th>
                <td>{{ $student->data_start }}</td>
            </tr>
        </table>

        <div class="footer">


            <div class="signature">
                ریڤەبەرێ نڤێسینگەهێ
                <br><br>_____________
            </div>


            <div class="signature">
                  فێرخاز
                <br><br>_____________
            </div>


            <div class="bottom">
                ناڤو نیشان : ئیداراسەربەخویا زاخو . شعبانیکی 07503504090 <br><br>
            </div>

        </div>

    </div>

</body>

</html>
