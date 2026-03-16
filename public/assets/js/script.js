let sidebarCollapsed = false;
  let currentTheme = 'light';

  function toggleSidebar() {
  const sidebar  = document.getElementById('sidebar');
  const wrapper  = document.getElementById('mainWrapper');
  const backdrop = document.getElementById('sidebarBackdrop');

  if (window.innerWidth <= 768) {
    const isOpen = sidebar.classList.toggle('mobile-open');
    if (backdrop) backdrop.classList.toggle('show', isOpen);
    document.body.style.overflow = isOpen ? 'hidden' : '';
  } else {
    sidebarCollapsed = !sidebarCollapsed;
    sidebar.classList.toggle('collapsed', sidebarCollapsed);
    wrapper.classList.toggle('collapsed', sidebarCollapsed);
    if (backdrop) backdrop.classList.remove('show');
  }
}

  function toggleTheme() {
    currentTheme = currentTheme === 'light' ? 'dark' : 'light';
    document.body.setAttribute('data-theme', currentTheme);
    const icon = document.getElementById('themeIcon');
    const label = document.getElementById('themeLabel');
    if (currentTheme === 'dark') {
      icon.className = 'bi bi-moon-fill toggle-icon';
      label.textContent = 'وضع الليل';
    } else {
      icon.className = 'bi bi-sun-fill toggle-icon';
      label.textContent = 'وضع النهار';
    }
  }

  function toggleSub(id, btn) {
    const sub = document.getElementById(id);
    const arrow = btn.querySelector('.nav-arrow');
    const isOpen = sub.classList.contains('open');
    // Close all
    document.querySelectorAll('.subnav').forEach(s => s.classList.remove('open'));
    document.querySelectorAll('.nav-arrow').forEach(a => a.classList.remove('open'));
    if (!isOpen) {
      sub.classList.add('open');
      if(arrow) arrow.classList.add('open');
    }
    setActive(btn, btn.querySelector('.nav-label')?.textContent);
  }

  function setActive(btn, title) {
    document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    if (title) document.getElementById('pageTitle').textContent = title;
  }

  function setSubActive(btn, title) {
    document.querySelectorAll('.sub-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.getElementById('pageTitle').textContent = title;
  }

  function toggleNotif() {
    document.getElementById('notifDropdown').classList.toggle('show');
  }

  document.addEventListener('click', function(e) {
    const btn = document.getElementById('notifBtn');
    const dd = document.getElementById('notifDropdown');
    if (!btn.contains(e.target) && !dd.contains(e.target)) dd.classList.remove('show');
  });

  function viewUser(name) {
    document.getElementById('viewUserName').textContent = name;
    new bootstrap.Modal(document.getElementById('viewUserModal')).show();
  }

  function editUser(name) {
    document.getElementById('editUserNameInput').value = name;
    new bootstrap.Modal(document.getElementById('editUserModal')).show();
  }

  function selectAll(cb) {
    document.querySelectorAll('.row-check').forEach(c => c.checked = cb.checked);
  }

  function showSuccess(msg) {
    const toast = document.getElementById('successToast');
    document.getElementById('toastMsg').textContent = msg;
    toast.style.transform = 'translateX(-50%) translateY(0)';
    toast.style.opacity = '1';
    setTimeout(() => {
      toast.style.transform = 'translateX(-50%) translateY(80px)';
      toast.style.opacity = '0';
    }, 3000);
  }

  document.querySelectorAll('.pager-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.pager-btn').forEach(b => b.classList.remove('active'));
      if (!this.querySelector('i')) this.classList.add('active');
    });
  });