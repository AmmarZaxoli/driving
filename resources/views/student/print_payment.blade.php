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
            font-family: 'Scheherazade', serif;
            font-size: 15px;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .page {
            width: 100%;
            max-width: 210mm;
            margin: 0 auto;
        }

        /* Header */
        .header-section {
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 2px solid #2c5282;
            margin-bottom: 20px;
            position: relative;
        }

        .school-name {
            font-size: 22px;
            font-weight: bold;
            color: #2c5282;
            margin: 5px 0;
        }

        .school-subtitle {
            font-size: 16px;
            color: #4a5568;
            margin-bottom: 10px;
        }

        .logo {
            position: absolute;
            left: 0;
            top: 0;
            width: 60px;
            height: auto;
        }

        /* Student Info */
        .student-card {
            background: #f7fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            flex-wrap: wrap;
        }

        .info-label {
            font-weight: bold;
            color: #2d3748;
            min-width: 120px;
        }

        .info-value {
            color: #4a5568;
        }

        /* Table */
        .payments-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .payments-table th {
            background-color: #2c5282;
            color: white;
            padding: 10px;
            font-weight: bold;
            border: 1px solid #2a4365;
        }

        .payments-table td {
            padding: 10px;
            border: 1px solid #e2e8f0;
            text-align: center;
        }

        .payments-table tbody tr:nth-child(even) {
            background-color: #f7fafc;
        }

        .total-section {
            text-align: center;
            padding: 15px;
            background-color: #ebf8ff;
            border: 1px solid #bee3f8;
            border-radius: 6px;
        }

        .total-section .info-label {
            display: inline;
            margin-left: 15px;
        }

        .total-section .total-amount {
            display: inline;
            font-size: 20px;
            font-weight: bold;
            color: #2c5282;
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            color: #718096;
            font-size: 13px;
        }

        @media print {
            body {
                font-size: 14px;
            }

            .student-card {
                border: 1px solid #ccc;
            }

            .payments-table {
                box-shadow: none;
            }
        }
    </style>
</head>

<body>
    <div class="page">

        <!-- Header -->
        <div class="header-section">
            <img class="logo" src="{{ asset('assets/logo.png') }}" alt="Logo">
            <div class="school-name">نڤێسنگەها فێرکرنا شوفیری (خابور)</div>
            <div class="school-subtitle">پسولە - DRIVING SCHOOL</div>
        </div>

        <!-- Student Information -->
        <div class="student-card">
            <div class="info-row">
                <div>
                    <span class="info-label">ناڤێ فیرخازی:</span>
                    <span class="info-value">{{ $student->name }}</span>
                </div>
                <div>
                    <span class="info-label">پسولە:</span>
                    <span class="info-value">{{ $student->invoice }}</span>
                </div>
            </div>
            <div class="info-row">
                <div>
                    <span class="info-label">جورێ خولێ:</span>
                    <span class="info-value">B</span>
                </div>
                <div>
                    <span class="info-label">رێکەفتی:</span>
                    <span class="info-value">{{ $student->data_start }}</span>
                </div>
            </div>
        </div>

        <!-- Payments Table -->
        <table class="payments-table">
            <thead>
                <tr>
                    <th style="width: 100px">دینار</th>
                    <th style="width: 80px">وانە</th>
                    <th>رونکرن</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>63،000</td>
                    <td>21</td>
                    <td>وانێن تیوری</td>
                </tr>
                <tr>
                    <td>240،000</td>
                    <td>12</td>
                    <td>وانێن پراکتیکی</td>
                </tr>
            </tbody>
        </table>

        <!-- Total Amount -->
        <div class="total-section">
            <span class="info-label">کوێ گشتی:</span>
            <span class="total-amount">303,000 دینار</span>
        </div>



    </div>
</body>

</html>
