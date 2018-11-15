<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ asset('theme/staradmin/images/faces/face1.jpg') }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">{{ Auth::user()->fullname }}</p>
            <div>
              <small class="designation text-muted">{{ Auth::user()->type }}</small>
              <span class="status-indicator online"></span>
            </div>
          </div>
        </div>
        <a href="{{ route('deposit-add') }}" class="btn btn-success btn-block">Deposit
          <i class="mdi mdi-plus"></i>
        </a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="menu-icon mdi mdi-television"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#deposit" aria-expanded="false" aria-controls="deposit">
        <i class="menu-icon mdi mdi-currency-usd"></i>
        <span class="menu-title">Deposit</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="deposit">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('deposit-add') }}">Tambah Deposit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('deposit') }}">Riwayat Deposit</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('accounts') }}">
        <i class="menu-icon mdi mdi-account-location"></i>
        <span class="menu-title">Accounts</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('reports') }}">
        <i class="menu-icon mdi mdi-notebook"></i>
        <span class="menu-title">Reports</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('documentation') }}">
        <i class="menu-icon mdi mdi-book-open-page-variant"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('billing') }}">
        <i class="menu-icon mdi mdi-file-account"></i>
        <span class="menu-title">Billing</span>
      </a>
    </li>
  </ul>
</nav>