<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap RTL -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Your CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

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
                <a class="nav-btn" {{ request()->routeIs('dashboard') ? 'active' : '' }}
                    href="{{ route('dashboard') }}">
                    <i class="bi bi-house-fill nav-icon"></i>
                    <span class="nav-label">الرئيسية</span>
                </a>
            </div>

            <div class="nav-item-wrapper">
                <a class="nav-btn {{ request()->routeIs('student') ? 'active' : '' }}" href="{{ route('student') }}"> <i
                        class="bi bi-person-lines-fill"></i>
                    <span class="nav-label">student</span>
                </a>
            </div>



            <div class="nav-item-wrapper">
                <a class="nav-btn {{ request()->routeIs('nationality') ? 'active' : '' }}"
                    href="{{ route('nationality') }}">
                    <span class="nav-icon"><i class="bi bi-person-lines-fill"></i></span>
                    <span class="nav-label">nationality</span>
                </a>
            </div>

            <div class="nav-item-wrapper">
                <a class="nav-btn {{ request()->routeIs('learntype') ? 'active' : '' }}"
                    href="{{ route('learntype') }}">
                    <span class="nav-icon"><i class="bi bi-person-lines-fill"></i></span>
                    <span class="nav-label">جورێ راهێنانێ</span>
                </a>
            </div>

            <!-- إدارة المستخدمين -->
            <div class="nav-item-wrapper">
                <button class="nav-btn" onclick="toggleSub('sub-users', this)">
                    <i class="bi bi-people-fill nav-icon"></i>
                    <span class="nav-label">إدارة المستخدمين</span>
                    <i class="bi bi-chevron-down nav-arrow" id="arrow-users"></i>
                </button>

                <div class="subnav {{ request()->routeIs('coach*') ? 'open' : '' }}" id="sub-users">
                    <a class="sub-btn {{ request()->routeIs('coach') ? 'active' : '' }}" href="{{ route('coach') }}">
                        <span class="nav-label">add driver</span>
                    </a>

                    <button class="sub-btn" onclick="setSubActive(this, 'إضافة مستخدم')">إضافة مستخدم</button>
                    <button class="sub-btn" onclick="setSubActive(this, 'الصلاحيات')">الصلاحيات والأدوار</button>
                    <button class="sub-btn" onclick="setSubActive(this, 'المجموعات')">المجموعات</button>
                </div>
            </div>

            <!-- المنتجات -->
            <div class="nav-item-wrapper">
                <button class="nav-btn" onclick="toggleSub('sub-products', this)">
                    <i class="bi bi-box-seam-fill nav-icon"></i>
                    <span class="nav-label">المنتجات</span>
                    <i class="bi bi-chevron-down nav-arrow" id="arrow-products"></i>
                </button>
                <div class="subnav" id="sub-products">
                    <button class="sub-btn" onclick="setSubActive(this, 'كل المنتجات')">كل المنتجات</button>
                    <button class="sub-btn" onclick="setSubActive(this, 'إضافة منتج')">إضافة منتج</button>
                    <button class="sub-btn" onclick="setSubActive(this, 'الفئات')">الفئات</button>
                    <button class="sub-btn" onclick="setSubActive(this, 'المخزون')">المخزون</button>
                </div>
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

            <!-- التقارير -->
            <div class="nav-item-wrapper">
                <button class="nav-btn" onclick="toggleSub('sub-reports', this)">
                    <i class="bi bi-bar-chart-fill nav-icon"></i>
                    <span class="nav-label">التقارير</span>
                    <i class="bi bi-chevron-down nav-arrow" id="arrow-reports"></i>
                </button>
                <div class="subnav" id="sub-reports">
                    <button class="sub-btn" onclick="setSubActive(this, 'تقرير المبيعات')">تقرير المبيعات</button>
                    <button class="sub-btn" onclick="setSubActive(this, 'تقرير المستخدمين')">تقرير المستخدمين</button>
                    <button class="sub-btn" onclick="setSubActive(this, 'التقارير المالية')">التقارير المالية</button>
                </div>
            </div>

            <div class="section-title">الإعدادات</div>

            <!-- الإشعارات -->
            <div class="nav-item-wrapper">
                <button class="nav-btn" onclick="setActive(this, 'الإشعارات')">
                    <i class="bi bi-bell-fill nav-icon"></i>
                    <span class="nav-label">الإشعارات</span>
                </button>
            </div>

            <!-- الإعدادات -->
            <div class="nav-item-wrapper">
                <button class="nav-btn" onclick="toggleSub('sub-settings', this)">
                    <i class="bi bi-gear-fill nav-icon"></i>
                    <span class="nav-label">الإعدادات</span>
                    <i class="bi bi-chevron-down nav-arrow" id="arrow-settings"></i>
                </button>
                <div class="subnav" id="sub-settings">
                    <button class="sub-btn" onclick="setSubActive(this, 'إعدادات عامة')">إعدادات عامة</button>
                    <button class="sub-btn" onclick="setSubActive(this, 'الأمان')">الأمان والخصوصية</button>
                    <button class="sub-btn" onclick="setSubActive(this, 'المظهر')">المظهر</button>
                </div>
            </div>

            <!-- المساعدة -->
            <div class="nav-item-wrapper">
                <button class="nav-btn" onclick="setActive(this, 'المساعدة')">
                    <i class="bi bi-question-circle-fill nav-icon"></i>
                    <span class="nav-label">المساعدة والدعم</span>
                </button>
            </div>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit">Logout (Admin)</button>
            </form>

        </nav>

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


        </main>
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Barcode Scanner -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Your Script -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @livewireScripts


</body>

</html>
