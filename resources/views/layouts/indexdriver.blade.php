<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>@yield('title', 'لوحة التحكم المتطورة')</title>  --}}


 
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts - Tajawal -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.rtl.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap"
        rel="stylesheet" />



        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    @livewireStyles
</head>

<body data-theme="light">

    <div id="sidebarBackdrop" class="sidebar-backdrop" onclick="toggleSidebar()"></div>



    <!-- Modern Sidebar -->
    <aside class="sidebar" id="sidebar">

        <div class="sidebar-brand">
            <div class="brand-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
            <span class="brand-text">نظام الإدارة</span>
        </div>

        <nav class="sidebar-nav">

            <div class="section-title">القائمة الرئيسية</div>

            <!-- الرئيسية -->
            <div class="nav-item-wrapper">
                <a class="nav-btn" {{ request()->routeIs('driverlearntime') ? 'active' : '' }}
                    href="{{ route('driverlearntime') }}">
                    <i class="bi bi-house-fill nav-icon"></i>
                    <span class="nav-label">الرئيسية</span>
                </a>
            </div>


            <!-- الطلبات -->
            <div class="nav-item-wrapper">
                <button class="nav-btn" onclick="toggleSub('sub-orders', this)">
                    <i class="bi bi-cart3 nav-icon"></i>
                    <span class="nav-label">الطلبات</span>
                    <i class="bi bi-chevron-down nav-arrow" id="arrow-orders"></i>
                </button>
                <div class="subnav" id="sub-orders">
                    <button class="sub-btn" onclick="setSubActive(this, 'كل الطلبات')">كل الطلبات</button>
                    <button class="sub-btn" onclick="setSubActive(this, 'الطلبات المعلقة')">الطلبات المعلقة</button>
                    <button class="sub-btn" onclick="setSubActive(this, 'الطلبات المكتملة')">الطلبات المكتملة</button>
                    <button class="sub-btn" onclick="setSubActive(this, 'المرتجعات')">المرتجعات</button>
                </div>
            </div>



        </nav>
        <form action="{{ route('driver.logout') }}" method="POST">
            @csrf
           
                <div class="nav-item-wrapper" style="margin-top: 6px;">
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-right-from-bracket"></i>
                        <span class="nav-label">دەرچون</span>
                    </button>
                </div>
        </form>
        <div class="sidebar-footer">
            <div class="user-card">
                <div class="user-avatar">م</div>
                <div class="user-info">
                    <div class="user-name">محمد العلي</div>
                    <div class="user-role">مدير النظام</div>
                </div>
            </div>
        </div>

    </aside>

    <!-- Main Content -->
    <div class="main-wrapper" id="mainWrapper">
        <nav class="topnav">
            <div class="topnav-right">
                <button class="toggle-sidebar-btn" onclick="toggleSidebar()">
                    <i class="bi bi-layout-sidebar-reverse"></i>
                </button>
                <div class="breadcrumb-area">
                    <div class="page-title" id="pageTitle">الرئيسية</div>
                    <div class="page-sub">لوحة التحكم الرئيسية</div>
                </div>
            </div>

            <div class="topnav-left">
                <!-- Theme Toggle -->
                <button class="theme-toggle" onclick="toggleTheme()" id="themeToggle">
                    <i class="bi bi-sun-fill toggle-icon" id="themeIcon"></i>
                    <span id="themeLabel">وضع النهار</span>
                </button>

                <!-- Notifications -->
                <div style="position:relative;">
                    <button class="notif-btn" onclick="toggleNotif()" id="notifBtn">
                        <i class="bi bi-bell-fill"></i>
                        <span class="notif-badge"></span>
                    </button>
                    <div class="notif-dropdown" id="notifDropdown">
                        <div class="notif-header">
                            الإشعارات
                            <span style="font-size:11px;color:var(--primary);cursor:pointer;">تحديد الكل كمقروء</span>
                        </div>
                        <div class="notif-item">
                            <div class="notif-dot" style="background:rgba(34,197,94,0.12);color:#16a34a;"><i
                                    class="bi bi-person-plus-fill"></i></div>
                            <div>
                                <div class="notif-text">تم إضافة مستخدم جديد بنجاح</div>
                                <div class="notif-time">منذ 5 دقائق</div>
                            </div>
                        </div>
                        <div class="notif-item">
                            <div class="notif-dot" style="background:rgba(240,165,0,0.12);color:#b45309;"><i
                                    class="bi bi-cart-fill"></i></div>
                            <div>
                                <div class="notif-text">طلب جديد #ORD-2024-089</div>
                                <div class="notif-time">منذ 18 دقيقة</div>
                            </div>
                        </div>
                        <div class="notif-item">
                            <div class="notif-dot" style="background:rgba(239,68,68,0.12);color:#dc2626;"><i
                                    class="bi bi-exclamation-triangle-fill"></i></div>
                            <div>
                                <div class="notif-text">تحذير: نفاد مخزون منتج #145</div>
                                <div class="notif-time">منذ 45 دقيقة</div>
                            </div>
                        </div>
                        <div class="notif-item">
                            <div class="notif-dot" style="background:rgba(59,130,246,0.12);color:#3b82f6;"><i
                                    class="bi bi-file-earmark-bar-graph-fill"></i></div>
                            <div>
                                <div class="notif-text">تقرير المبيعات الشهري جاهز</div>
                                <div class="notif-time">منذ ساعتين</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <button class="nav-icon-btn" title="الإعدادات" data-bs-toggle="modal"
                    data-bs-target="#settingsModal">
                    <i class="bi bi-gear-fill"></i>
                </button>

                <!-- Profile -->
                <button class="nav-icon-btn" title="الملف الشخصي" data-bs-toggle="modal"
                    data-bs-target="#profileModal">
                    <i class="bi bi-person-circle"></i>
                </button>
            </div>
        </nav>


        <main class="main-content">
            @yield('content')

            @livewireScripts
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>





</body>

</html>
