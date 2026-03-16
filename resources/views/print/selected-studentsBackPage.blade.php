<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>چاپکردنی قوتابی هەڵبژێردراوان</title>
    <link href="https://fonts.googleapis.com/css2?family=Scheherazade&display=swap" rel="stylesheet">
    <style>
        @page {
            size: A4;
            margin: 10mm;
        }

        body {
            margin: 0;
            font-family: 'Scheherazade', serif;
            font-size: 12px;
        }

        /* A4 usable area */
        .page {
            display: grid;
            grid-template-columns: repeat(2, 10cm);
            grid-template-rows: repeat(4, 6.4cm);
            justify-content: center;
            align-content: center;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }

        .card {
            margin: 5px;
            width: 10cm;
            height: 6.4cm;
            border: 1px solid #000;
            padding: 6px;
            box-sizing: border-box;
            position: relative;
            display: grid;
            grid-template-rows: auto 1fr;
            row-gap: 4px;
        }

        .photo {
            position: absolute;
            top: 60px;
            left: 20px;
            width: 65px;
            height: 75px;
            border: 2px solid #000;
            border-radius: 6px;
            justify-self: left;
        }

        .content {
            position: relative;
            height: 100%;
        }

        .badge {
            position: relative;
            top: 0;
            right: 0;
            width: 60px;
            height: 20px;
            border: 1px solid #000;
            box-sizing: border-box;
            font-size: 12px;
            font-weight: bold;
            background: linear-gradient(135deg, #ffffff 50%, red 50%);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 6px;
        }

        .badge .label {
            z-index: 2;
        }

        .badge .level {
            z-index: 2;
            color: #fff;
        }



        .lines p {
            margin: 1px 0;
            font-size: 14px;
            line-height: 0.8;
            font-weight: bold;
        }

        .textbackcart p {
            line-height: 1.7;
        }


        .no-print {
            display: none;
        }

        .header-line {
            width: 100%;
            height: 2px;
            background: #000;
            margin: 1mm 0 1mm 0;
        }
        .center{
            text-align: center;
        }
        .left{
            margin-top: 30px;
            margin-left: 10px;
            text-align: left;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                visibility: hidden;
            }

            .page,
            .page * {
                visibility: visible;
            }

            .page {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>

<body>
    <div class="no-print" style="padding: 20px; text-align: center;">
        <h2>چاپکردنی قوتابی هەڵبژێردراوان</h2>
        <p>ژمارەی قوتابیان: {{ count($students) }}</p>
        <button onclick="window.print()"
            style="padding: 10px 20px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
            چاپکردن
        </button>
        <button onclick="window.close()"
            style="padding: 10px 20px; background: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer; margin-left: 10px;">
            داخستن
        </button>
    </div>

    <div class="page">
        @foreach ($students as $student)
        <div class="card">
            <div class="photo"></div>

            <div class="content">
                <div class="badge">
                    <span class="level">L</span>
                    <span class="label">نموذج</span>
                </div>





                <div class="lines">
                    <p style="font-size: 20px;">تێبینی : </p>

                    <span>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span>

                    <div class="textbackcart">
                        <p>1 ئەڤ شوفیرە بمەمەستا مولەتا شوفیری ل خولا فیرکرنێ دایە</p>
                        <p>2 ئەڤ کارتە (تنێ) ل دەمێ راهینانا بکارتیت</p>
                        <p>3 ل دەمێ ئەزمونا پراکتیکی دا ئەڤ کارتە ل ژیر سەرپەرستی ئەفسەرێ هاتن و چوونێ بکار دهیت.</p>

                    </div>
                    <div class="header-line"></div>
                    <div class="center">
                        <p>ریڤەبەریا هاتووچوی ئیدارا سەربەخوی زاخو</p>
                    </div>
                    <div class="left">
                        <p>ریڤەبەریا هاتووچوی ئیدارا سەربەخوی زاخو</p>
                    </div>

                </div>


            </div>
        </div>
        @endforeach
    </div>



</body>

</html>