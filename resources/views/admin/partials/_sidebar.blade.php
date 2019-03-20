<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ asset('theme/StarAdmin/images/faces/face1.jpg') }}" alt="profile image">
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
      <a class="nav-link" data-toggle="collapse1" href="#service" aria-expanded="false" aria-controls="service">
        <i class="menu-icon mdi mdi-currency-usd"></i>
        <span class="menu-title">Service</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse1" id="service">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#digipos" aria-expanded="false" aria-controls="digipos">
              <span class="menu-title">Digipos</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="digipos">
              <ul class="nav flex-column sub-menu" style="padding: 0 0 0 1rem;">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('groups', 'digipos') }}">Groups</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('accounts', 'digipos') }}">Accounts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Reports</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Documentation</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#gojek" aria-expanded="false" aria-controls="gojek">
              <span class="menu-title">GOJEK</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="gojek">
              <ul class="nav flex-column sub-menu" style="padding: 0 0 0 1rem;">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('groups', 'gojek') }}">Groups</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Accounts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Reports</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('product.gojek') }}">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Documentation</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ovo" aria-expanded="false" aria-controls="ovo">
              <span class="menu-title">OVO</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ovo">
              <ul class="nav flex-column sub-menu" style="padding: 0 0 0 1rem;">
                <li class="nav-item">
                  <a class="nav-link" href="">Groups</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Accounts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Reports</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Documentation</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#linkaja" aria-expanded="false" aria-controls="linkaja">
              <span class="menu-title">Link Aja!</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="linkaja">
              <ul class="nav flex-column sub-menu" style="padding: 0 0 0 1rem;">
                <li class="nav-item">
                  <a class="nav-link" href="">Groups</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Accounts</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Reports</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="">Documentation</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#billingbalance" aria-expanded="false" aria-controls="billingbalance">
        <i class="menu-icon mdi mdi-currency-usd"></i>
        <span class="menu-title">Billing & Balance</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="billingbalance">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="">Tambah Deposit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Riwayat Deposit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Riwayat Transaksi</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#support" aria-expanded="false" aria-controls="service">
        <i class="menu-icon mdi mdi-currency-usd"></i>
        <span class="menu-title">Support</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="support">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="">Open Ticket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Term of Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Privacy Policy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Contact Us</a>
          </li>
        </ul>
      </div>
    </li>

<!--     <li class="nav-item">
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
      <a class="nav-link" href="{{ route('groups', 'digipos') }}">
        <i class="menu-icon mdi mdi-account-location"></i>
        <span class="menu-title">Groups</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('accounts', 'digipos') }}">
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
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
        <i class="menu-icon mdi mdi-currency-usd"></i>
        <span class="menu-title">Products</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="product">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('deposit') }}">Pulsa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('deposit') }}">Token</a>
          </li>
        </ul>
      </div>
    </li> -->
  </ul>
</nav>