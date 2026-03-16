<div>
    <div class="card-wrapper">
        <div class="card">
            <h2 class="card-title">Driver</h2>
            <p class="card-text">Manage your drivers and schedules</p>

            @auth('coach')
                <a href="{{ route('indexdriver') }}" class="card-btn driver-btn">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="card-btn driver-btn">Login as Driver</a>
            @endauth
        </div>

        <div class="card">
            <h2 class="card-title">System</h2>
            <p class="card-text">Configure settings and manage users</p>

            @auth('admin')
                <a href="{{ route('admin.dashboard') }}" class="card-btn system-btn">Go to Admin Panel</a>
            @else
                <a href="{{ route('admin.login') }}" class="card-btn system-btn">Login as Admin</a>
            @endauth
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f0f2f5;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            padding: 20px;
        }

        .card-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 30px;
            max-width: 900px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 30px;
            width: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 12px;
            color: #333;
        }

        .card-text {
            color: #666;
            margin-bottom: 25px;
            line-height: 1.5;
            font-size: 15px;
        }

        .card-btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: all 0.3s ease;
            width: 100%;
            text-align: center;
            border: none;
            cursor: pointer;
        }

        .driver-btn {
            background: #3498db;
            color: white;
        }

        .driver-btn:hover {
            background: #2980b9;
        }

        .system-btn {
            background: #2ecc71;
            color: white;
        }

        .system-btn:hover {
            background: #27ae60;
        }

        @media (max-width: 768px) {
            .card-wrapper {
                gap: 20px;
            }

            .card {
                width: 100%;
                max-width: 350px;
            }
        }
    </style>

</div>
