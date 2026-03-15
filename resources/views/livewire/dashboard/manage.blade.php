<div>
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card green">
                <div class="stat-top">
                    <div class="stat-icon green"><i class="bi bi-currency-dollar"></i></div>
                    <span class="stat-badge up"><i class="bi bi-arrow-up"></i> 12%</span>
                </div>
                <div class="stat-value">٢٤٧,٥٠٠</div>
                <div class="stat-label">إجمالي الإيرادات (ر.س)</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card blue">
                <div class="stat-top">
                    <div class="stat-icon blue"><i class="bi bi-people-fill"></i></div>
                    <span class="stat-badge up"><i class="bi bi-arrow-up"></i> 8%</span>
                </div>
                <div class="stat-value">١,٢٤٨</div>
                <div class="stat-label">إجمالي المستخدمين</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card yellow">
                <div class="stat-top">
                    <div class="stat-icon yellow"><i class="bi bi-cart3"></i></div>
                    <span class="stat-badge down"><i class="bi bi-arrow-down"></i> 3%</span>
                </div>
                <div class="stat-value">٣٨٤</div>
                <div class="stat-label">الطلبات هذا الشهر</div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="stat-card red">
                <div class="stat-top">
                    <div class="stat-icon red"><i class="bi bi-box-seam-fill"></i></div>
                    <span class="stat-badge down"><i class="bi bi-arrow-down"></i> 5%</span>
                </div>
                <div class="stat-value">٥٦</div>
                <div class="stat-label">منتجات نفدت من المخزون</div>
            </div>
        </div>
    </div>


    <!-- QUICK ACTIONS -->
    <div class="section-header mb-3">
        <div>
            <div class="section-title-main">الإجراءات السريعة</div>
            <div class="section-desc">اختصارات للعمليات الأكثر استخداماً</div>
        </div>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="quick-card" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <div class="quick-icon" style="background:rgba(34,197,94,0.1);color:#16a34a;"><i
                        class="bi bi-person-plus-fill"></i></div>
                <div class="quick-title">إضافة مستخدم</div>
                <div class="quick-desc">إنشاء حساب جديد</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="quick-card" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <div class="quick-icon" style="background:rgba(59,130,246,0.1);color:#3b82f6;"><i
                        class="bi bi-plus-square-fill"></i></div>
                <div class="quick-title">إضافة منتج</div>
                <div class="quick-desc">نشر منتج جديد</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="quick-card" data-bs-toggle="modal" data-bs-target="#reportModal">
                <div class="quick-icon" style="background:rgba(240,165,0,0.1);color:#b45309;"><i
                        class="bi bi-file-earmark-bar-graph-fill"></i></div>
                <div class="quick-title">توليد تقرير</div>
                <div class="quick-desc">إنشاء تقرير مخصص</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="quick-card" data-bs-toggle="modal" data-bs-target="#messageModal">
                <div class="quick-icon" style="background:rgba(168,85,247,0.1);color:#9333ea;"><i
                        class="bi bi-chat-dots-fill"></i></div>
                <div class="quick-title">إرسال رسالة</div>
                <div class="quick-desc">تواصل مع المستخدمين</div>
            </div>
        </div>
    </div>

    <!-- BUTTONS SHOWCASE -->
    <div class="section-header mb-3">
        <div>
            <div class="section-title-main">أزرار النظام</div>
            <div class="section-desc">جميع أنواع الأزرار المتاحة</div>
        </div>
    </div>
    <div class="table-card mb-4 p-4">
        <div class="d-flex flex-wrap gap-3 align-items-center">
            <button class="btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="bi bi-person-plus-fill"></i> إضافة مستخدم
            </button>
            <button class="btn-accent-custom" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="bi bi-plus-square-fill"></i> إضافة منتج
            </button>
            <button class="btn-outline-custom" data-bs-toggle="modal" data-bs-target="#filterModal">
                <i class="bi bi-funnel-fill"></i> تصفية النتائج
            </button>
            <button class="btn-danger-custom" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                <i class="bi bi-trash3-fill"></i> حذف المحدد
            </button>
            <button class="btn-outline-custom" data-bs-toggle="modal" data-bs-target="#reportModal">
                <i class="bi bi-download"></i> تصدير البيانات
            </button>
            <button class="btn-outline-custom" data-bs-toggle="modal" data-bs-target="#messageModal">
                <i class="bi bi-envelope-fill"></i> إرسال إشعار
            </button>
        </div>
    </div>

    <!-- TABLE -->
    <div class="section-header">
        <div>
            <div class="section-title-main">جدول المستخدمين</div>
            <div class="section-desc">إدارة شاملة لبيانات المستخدمين</div>
        </div>
        <button class="btn-primary-custom" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="bi bi-plus-lg"></i> مستخدم جديد
        </button>
    </div>

    <div class="table-card mt-3">
        <div class="table-toolbar">
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="البحث في المستخدمين..."  />
            </div>
            <button class="btn-outline-custom" style="padding:8px 14px;font-size:13px;" data-bs-toggle="modal"
                data-bs-target="#filterModal">
                <i class="bi bi-funnel"></i> تصفية
            </button>
            <button class="btn-outline-custom" style="padding:8px 14px;font-size:13px;" data-bs-toggle="modal"
                data-bs-target="#reportModal">
                <i class="bi bi-download"></i> تصدير
            </button>
        </div>

        <div class="table-responsive">
            <table class="custom-table" id="usersTable">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="form-check-input" onclick="selectAll(this)" /></th>
                        <th>المستخدم</th>
                        <th>الدور</th>
                        <th>القسم</th>
                        <th>الحالة</th>
                        <th>تاريخ الانضمام</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <tr>
                        <td><input type="checkbox" class="form-check-input row-check" /></td>
                        <td>
                            <div class="user-cell">
                                <div class="avatar-cell">م</div>
                                <div>
                                    <div class="user-cell-name">محمد العلي</div>
                                    <div class="user-cell-email">m.ali@company.com</div>
                                </div>
                            </div>
                        </td>
                        <td>مدير النظام</td>
                        <td>تقنية المعلومات</td>
                        <td><span class="badge-status badge-active">نشط</span></td>
                        <td>١ يناير ٢٠٢٤</td>
                        <td>
                            <div class="action-btns">
                                <button class="action-btn view" onclick="viewUser('محمد العلي')" title="عرض"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button class="action-btn edit" onclick="editUser('محمد العلي')" title="تعديل"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button class="action-btn delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteConfirmModal" title="حذف"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="form-check-input row-check" /></td>
                        <td>
                            <div class="user-cell">
                                <div class="avatar-cell" style="background:linear-gradient(135deg,#1d4ed8,#3b82f6)">س
                                </div>
                                <div>
                                    <div class="user-cell-name">سارة الأحمد</div>
                                    <div class="user-cell-email">s.ahmad@company.com</div>
                                </div>
                            </div>
                        </td>
                        <td>محاسب</td>
                        <td>المالية</td>
                        <td><span class="badge-status badge-active">نشط</span></td>
                        <td>١٥ مارس ٢٠٢٤</td>
                        <td>
                            <div class="action-btns">
                                <button class="action-btn view" onclick="viewUser('سارة الأحمد')" title="عرض"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button class="action-btn edit" onclick="editUser('سارة الأحمد')" title="تعديل"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button class="action-btn delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteConfirmModal" title="حذف"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="form-check-input row-check" /></td>
                        <td>
                            <div class="user-cell">
                                <div class="avatar-cell" style="background:linear-gradient(135deg,#b45309,#f0a500)">ع
                                </div>
                                <div>
                                    <div class="user-cell-name">عمر الزهراني</div>
                                    <div class="user-cell-email">o.zahrani@company.com</div>
                                </div>
                            </div>
                        </td>
                        <td>مبيعات</td>
                        <td>التسويق</td>
                        <td><span class="badge-status badge-pending">معلق</span></td>
                        <td>٢٢ أبريل ٢٠٢٤</td>
                        <td>
                            <div class="action-btns">
                                <button class="action-btn view" onclick="viewUser('عمر الزهراني')" title="عرض"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button class="action-btn edit" onclick="editUser('عمر الزهراني')" title="تعديل"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button class="action-btn delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteConfirmModal" title="حذف"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="form-check-input row-check" /></td>
                        <td>
                            <div class="user-cell">
                                <div class="avatar-cell" style="background:linear-gradient(135deg,#7c3aed,#a855f7)">ن
                                </div>
                                <div>
                                    <div class="user-cell-name">نورة المطيري</div>
                                    <div class="user-cell-email">n.mutairi@company.com</div>
                                </div>
                            </div>
                        </td>
                        <td>مصممة</td>
                        <td>الإبداع</td>
                        <td><span class="badge-status badge-active">نشط</span></td>
                        <td>٣ يونيو ٢٠٢٤</td>
                        <td>
                            <div class="action-btns">
                                <button class="action-btn view" onclick="viewUser('نورة المطيري')" title="عرض"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button class="action-btn edit" onclick="editUser('نورة المطيري')" title="تعديل"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button class="action-btn delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteConfirmModal" title="حذف"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="form-check-input row-check" /></td>
                        <td>
                            <div class="user-cell">
                                <div class="avatar-cell" style="background:linear-gradient(135deg,#b91c1c,#ef4444)">ف
                                </div>
                                <div>
                                    <div class="user-cell-name">فيصل القحطاني</div>
                                    <div class="user-cell-email">f.qahtani@company.com</div>
                                </div>
                            </div>
                        </td>
                        <td>مطور</td>
                        <td>تقنية المعلومات</td>
                        <td><span class="badge-status badge-inactive">غير نشط</span></td>
                        <td>١٠ أغسطس ٢٠٢٤</td>
                        <td>
                            <div class="action-btns">
                                <button class="action-btn view" onclick="viewUser('فيصل القحطاني')" title="عرض"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button class="action-btn edit" onclick="editUser('فيصل القحطاني')" title="تعديل"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button class="action-btn delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteConfirmModal" title="حذف"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="form-check-input row-check" /></td>
                        <td>
                            <div class="user-cell">
                                <div class="avatar-cell" style="background:linear-gradient(135deg,#0891b2,#06b6d4)">ر
                                </div>
                                <div>
                                    <div class="user-cell-name">ريم العتيبي</div>
                                    <div class="user-cell-email">r.otaibi@company.com</div>
                                </div>
                            </div>
                        </td>
                        <td>مديرة مشاريع</td>
                        <td>العمليات</td>
                        <td><span class="badge-status badge-active">نشط</span></td>
                        <td>٥ سبتمبر ٢٠٢٤</td>
                        <td>
                            <div class="action-btns">
                                <button class="action-btn view" onclick="viewUser('ريم العتيبي')" title="عرض"><i
                                        class="bi bi-eye-fill"></i></button>
                                <button class="action-btn edit" onclick="editUser('ريم العتيبي')" title="تعديل"><i
                                        class="bi bi-pencil-fill"></i></button>
                                <button class="action-btn delete" data-bs-toggle="modal"
                                    data-bs-target="#deleteConfirmModal" title="حذف"><i
                                        class="bi bi-trash3-fill"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex align-items-center justify-content-between p-3 flex-wrap gap-2"
            style="border-top:1px solid var(--border);">
            <div style="font-size:13px;color:var(--text-secondary);">عرض ١–٦ من أصل ٤٨ مستخدم</div>
            <div class="pager">
                <button class="pager-btn"><i class="bi bi-chevron-right"></i></button>
                <button class="pager-btn active">١</button>
                <button class="pager-btn">٢</button>
                <button class="pager-btn">٣</button>
                <button class="pager-btn">٤</button>
                <button class="pager-btn"><i class="bi bi-chevron-left"></i></button>
            </div>
        </div>
    </div>




    {{--  --}}


    <!-- ADD USER MODAL -->
    <div class="modal fade" id="addUserModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-person-plus-fill me-2"
                            style="color:var(--primary)"></i>إضافة مستخدم جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label">الاسم الأول</label>
                            <input type="text" class="form-control" placeholder="الاسم الأول" />
                        </div>
                        <div class="col-6">
                            <label class="form-label">اسم العائلة</label>
                            <input type="text" class="form-control" placeholder="اسم العائلة" />
                        </div>
                        <div class="col-12">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" placeholder="example@company.com" />
                        </div>
                        <div class="col-6">
                            <label class="form-label">الدور</label>
                            <select class="form-select">
                                <option>مدير النظام</option>
                                <option>محاسب</option>
                                <option>مبيعات</option>
                                <option>مطور</option>
                                <option>مصمم</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">القسم</label>
                            <select class="form-select">
                                <option>تقنية المعلومات</option>
                                <option>المالية</option>
                                <option>التسويق</option>
                                <option>العمليات</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">كلمة المرور</label>
                            <input type="password" class="form-control" placeholder="••••••••" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-custom" data-bs-dismiss="modal"><i
                            class="bi bi-x-lg"></i> إلغاء</button>
                    <button type="button" class="btn-primary-custom"
                        onclick="showSuccess('تم إضافة المستخدم بنجاح!')" data-bs-dismiss="modal"><i
                            class="bi bi-check-lg"></i> حفظ المستخدم</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD PRODUCT MODAL -->
    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-plus-square-fill me-2" style="color:#3b82f6"></i>إضافة
                        منتج جديد</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">اسم المنتج</label>
                            <input type="text" class="form-control" placeholder="أدخل اسم المنتج" />
                        </div>
                        <div class="col-12">
                            <label class="form-label">الوصف</label>
                            <textarea class="form-control" rows="3" placeholder="وصف تفصيلي للمنتج..."></textarea>
                        </div>
                        <div class="col-4">
                            <label class="form-label">السعر (ر.س)</label>
                            <input type="number" class="form-control" placeholder="٠.٠٠" />
                        </div>
                        <div class="col-4">
                            <label class="form-label">الكمية</label>
                            <input type="number" class="form-control" placeholder="٠" />
                        </div>
                        <div class="col-4">
                            <label class="form-label">الفئة</label>
                            <select class="form-select">
                                <option>إلكترونيات</option>
                                <option>ملابس</option>
                                <option>أثاث</option>
                                <option>أغذية</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">صورة المنتج</label>
                            <div
                                style="border:2px dashed var(--border);border-radius:10px;padding:24px;text-align:center;color:var(--text-secondary);cursor:pointer;">
                                <i class="bi bi-cloud-upload-fill"
                                    style="font-size:28px;display:block;margin-bottom:8px;"></i>
                                <div style="font-size:14px;font-weight:600;">اسحب الصورة هنا أو انقر للرفع</div>
                                <div style="font-size:12px;margin-top:4px;">PNG, JPG حتى ١٠ ميجابايت</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-custom" data-bs-dismiss="modal"><i
                            class="bi bi-x-lg"></i> إلغاء</button>
                    <button type="button" class="btn-accent-custom" onclick="showSuccess('تم إضافة المنتج بنجاح!')"
                        data-bs-dismiss="modal"><i class="bi bi-check-lg"></i> نشر المنتج</button>
                </div>
            </div>
        </div>
    </div>

    <!-- VIEW USER MODAL -->
    <div class="modal fade" id="viewUserModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-person-badge-fill me-2" style="color:#3b82f6"></i>بيانات
                        المستخدم</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div
                        style="width:72px;height:72px;border-radius:50%;background:linear-gradient(135deg,var(--primary),var(--accent));display:flex;align-items:center;justify-content:center;color:#fff;font-size:28px;font-weight:900;margin:0 auto 16px;">
                        م</div>
                    <div id="viewUserName"
                        style="font-size:20px;font-weight:800;color:var(--text);margin-bottom:4px;">محمد العلي</div>
                    <div style="font-size:13px;color:var(--text-secondary);margin-bottom:20px;">m.ali@company.com</div>
                    <div class="row g-2 text-start">
                        <div class="col-6">
                            <div style="background:var(--bg);border-radius:10px;padding:12px;">
                                <div style="font-size:11px;color:var(--text-secondary);margin-bottom:4px;">الدور</div>
                                <div style="font-weight:700;font-size:14px;">مدير النظام</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="background:var(--bg);border-radius:10px;padding:12px;">
                                <div style="font-size:11px;color:var(--text-secondary);margin-bottom:4px;">القسم</div>
                                <div style="font-weight:700;font-size:14px;">تقنية المعلومات</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="background:var(--bg);border-radius:10px;padding:12px;">
                                <div style="font-size:11px;color:var(--text-secondary);margin-bottom:4px;">الحالة</div>
                                <span class="badge-status badge-active">نشط</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div style="background:var(--bg);border-radius:10px;padding:12px;">
                                <div style="font-size:11px;color:var(--text-secondary);margin-bottom:4px;">تاريخ
                                    الانضمام</div>
                                <div style="font-weight:700;font-size:14px;">١ يناير ٢٠٢٤</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-custom" data-bs-dismiss="modal">إغلاق</button>
                    <button type="button" class="btn-primary-custom" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#addUserModal"><i class="bi bi-pencil-fill"></i> تعديل</button>
                </div>
            </div>
        </div>
    </div>

    <!-- EDIT USER MODAL -->
    <div class="modal fade" id="editUserModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-pencil-fill me-2" style="color:var(--accent)"></i>تعديل
                        بيانات المستخدم</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">الاسم الكامل</label>
                            <input type="text" class="form-control" id="editUserNameInput" value="محمد العلي" />
                        </div>
                        <div class="col-12">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" value="m.ali@company.com" />
                        </div>
                        <div class="col-6">
                            <label class="form-label">الدور</label>
                            <select class="form-select">
                                <option selected>مدير النظام</option>
                                <option>محاسب</option>
                                <option>مبيعات</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">الحالة</label>
                            <select class="form-select">
                                <option selected>نشط</option>
                                <option>معلق</option>
                                <option>غير نشط</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-custom" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn-accent-custom"
                        onclick="showSuccess('تم تحديث البيانات بنجاح!')" data-bs-dismiss="modal"><i
                            class="bi bi-check-lg"></i> حفظ التغييرات</button>
                </div>
            </div>
        </div>
    </div>

    <!-- DELETE CONFIRM MODAL -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <div
                        style="width:60px;height:60px;background:rgba(239,68,68,0.1);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                        <i class="bi bi-trash3-fill" style="font-size:24px;color:#ef4444;"></i>
                    </div>
                    <div style="font-size:17px;font-weight:800;margin-bottom:8px;">تأكيد الحذف</div>
                    <div style="font-size:13px;color:var(--text-secondary);">هل أنت متأكد من حذف هذا العنصر؟ لا يمكن
                        التراجع عن هذه العملية.</div>
                </div>
                <div class="modal-footer justify-content-center gap-2">
                    <button type="button" class="btn-outline-custom" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn-danger-custom" onclick="showSuccess('تم الحذف بنجاح!')"
                        data-bs-dismiss="modal"><i class="bi bi-trash3-fill"></i> نعم، احذف</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FILTER MODAL -->
    <div class="modal fade" id="filterModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-funnel-fill me-2" style="color:var(--primary)"></i>تصفية
                        النتائج</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">الحالة</label>
                            <select class="form-select">
                                <option value="">الكل</option>
                                <option>نشط</option>
                                <option>معلق</option>
                                <option>غير نشط</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">القسم</label>
                            <select class="form-select">
                                <option value="">الكل</option>
                                <option>تقنية المعلومات</option>
                                <option>المالية</option>
                                <option>التسويق</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">من تاريخ</label>
                            <input type="date" class="form-control" />
                        </div>
                        <div class="col-6">
                            <label class="form-label">إلى تاريخ</label>
                            <input type="date" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-custom" data-bs-dismiss="modal">إعادة ضبط</button>
                    <button type="button" class="btn-primary-custom" data-bs-dismiss="modal"><i
                            class="bi bi-check-lg"></i> تطبيق الفلتر</button>
                </div>
            </div>
        </div>
    </div>

    <!-- REPORT MODAL -->
    <div class="modal fade" id="reportModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-file-earmark-bar-graph-fill me-2"
                            style="color:#b45309"></i>تصدير / توليد تقرير</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">نوع التقرير</label>
                            <select class="form-select">
                                <option>تقرير المستخدمين</option>
                                <option>تقرير المبيعات</option>
                                <option>تقرير المخزون</option>
                                <option>التقرير المالي</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">تنسيق الملف</label>
                            <select class="form-select">
                                <option>Excel (.xlsx)</option>
                                <option>PDF</option>
                                <option>CSV</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label">الفترة الزمنية</label>
                            <select class="form-select">
                                <option>هذا الشهر</option>
                                <option>الربع الأول</option>
                                <option>هذا العام</option>
                                <option>مخصص</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-custom" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn-accent-custom"
                        onclick="showSuccess('جاري تجهيز التقرير للتحميل...')" data-bs-dismiss="modal"><i
                            class="bi bi-download"></i> تحميل التقرير</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MESSAGE MODAL -->
    <div class="modal fade" id="messageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-chat-dots-fill me-2" style="color:#9333ea"></i>إرسال
                        رسالة / إشعار</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">المستلمون</label>
                            <select class="form-select">
                                <option>جميع المستخدمين</option>
                                <option>المدراء فقط</option>
                                <option>مستخدم محدد</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">العنوان</label>
                            <input type="text" class="form-control" placeholder="عنوان الرسالة" />
                        </div>
                        <div class="col-12">
                            <label class="form-label">نص الرسالة</label>
                            <textarea class="form-control" rows="4" placeholder="اكتب رسالتك هنا..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-custom" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn-primary-custom"
                        style="background:linear-gradient(135deg,#7c3aed,#a855f7);"
                        onclick="showSuccess('تم إرسال الرسالة بنجاح!')" data-bs-dismiss="modal"><i
                            class="bi bi-send-fill"></i> إرسال</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SETTINGS MODAL -->
    <div class="modal fade" id="settingsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-gear-fill me-2"
                            style="color:var(--text-secondary)"></i>إعدادات النظام</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">اسم النظام</label>
                            <input type="text" class="form-control" value="نظام إدارة الأعمال" />
                        </div>
                        <div class="col-12">
                            <label class="form-label">اللغة</label>
                            <select class="form-select">
                                <option selected>العربية</option>
                                <option>English</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">المنطقة الزمنية</label>
                            <select class="form-select">
                                <option selected>توقيت الرياض (UTC+3)</option>
                                <option>توقيت دبي (UTC+4)</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <div
                                style="display:flex;justify-content:space-between;align-items:center;padding:14px;background:var(--bg);border-radius:10px;border:1px solid var(--border);">
                                <div>
                                    <div style="font-weight:600;font-size:14px;">الإشعارات البريدية</div>
                                    <div style="font-size:12px;color:var(--text-secondary);">استلام تنبيهات عبر البريد
                                    </div>
                                </div>
                                <div class="form-check form-switch mb-0"><input class="form-check-input"
                                        type="checkbox" checked style="width:40px;height:20px;cursor:pointer;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-custom" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn-primary-custom" onclick="showSuccess('تم حفظ الإعدادات!')"
                        data-bs-dismiss="modal"><i class="bi bi-check-lg"></i> حفظ</button>
                </div>
            </div>
        </div>
    </div>

    <!-- PROFILE MODAL -->
    <div class="modal fade" id="profileModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-person-circle me-2"
                            style="color:var(--primary)"></i>الملف الشخصي</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div
                        style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,var(--primary),var(--accent));display:flex;align-items:center;justify-content:center;color:#fff;font-size:30px;font-weight:900;margin:0 auto 12px;">
                        م</div>
                    <div style="font-size:20px;font-weight:800;margin-bottom:4px;">محمد العلي</div>
                    <div style="font-size:13px;color:var(--text-secondary);margin-bottom:20px;">m.ali@company.com</div>
                    <div class="row g-2 text-start">
                        <div class="col-12"><label class="form-label">الاسم الكامل</label><input type="text"
                                class="form-control" value="محمد العلي" /></div>
                        <div class="col-12"><label class="form-label">البريد الإلكتروني</label><input type="email"
                                class="form-control" value="m.ali@company.com" /></div>
                        <div class="col-12"><label class="form-label">كلمة المرور الجديدة</label><input
                                type="password" class="form-control"
                                placeholder="اتركه فارغاً إذا لم تريد التغيير" /></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-custom" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn-primary-custom" onclick="showSuccess('تم تحديث الملف الشخصي!')"
                        data-bs-dismiss="modal"><i class="bi bi-check-lg"></i> حفظ التغييرات</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SUCCESS TOAST -->
    <div id="successToast"
        style="position:fixed;bottom:24px;left:50%;transform:translateX(-50%) translateY(80px);background:var(--primary);color:#fff;padding:12px 24px;border-radius:50px;font-family:'Cairo',sans-serif;font-weight:700;font-size:14px;z-index:99999;box-shadow:0 8px 24px rgba(26,107,90,0.4);transition:transform 0.35s cubic-bezier(.4,0,.2,1),opacity 0.35s;opacity:0;display:flex;align-items:center;gap:10px;">
        <i class="bi bi-check-circle-fill"></i>
        <span id="toastMsg">تمت العملية بنجاح!</span>
    </div>

    
</div>
