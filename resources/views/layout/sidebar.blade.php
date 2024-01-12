<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Nustra<span>Studio</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['/admin/panel']) }}">
        <a href="{{ url('/admin/panel') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      @if ($status =="admin")
      <li class="nav-item {{ active_class(['/admin/panel/kelas']) }}">
        <a href="{{ url('/admin/panel/kelas') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">kelas</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['/admin/panel/perserta']) }}">
        <a href="{{ url('/admin/panel/perserta') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Perserta</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['/admin/panel/kontigen']) }}">
        <a href="{{ url('/admin/panel/kontigen') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">kontigen</span>
        </a>
      </li>
      @endif
    </ul>
  </div>
</nav>
<nav class="settings-sidebar">
  <div class="sidebar-body">
    <a href="#" class="settings-sidebar-toggler">
      <i data-feather="settings"></i>
    </a>
    <h6 class="text-muted mb-2">Sidebar:</h6>
    <div class="mb-3 pb-3 border-bottom">
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
          Light
        </label>
      </div>
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
          Dark
        </label>
      </div>
    </div>
  </div>
</nav>