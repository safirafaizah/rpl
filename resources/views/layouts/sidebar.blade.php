<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo " id="logo-bkd">
        <a href="{{ route('index') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{asset('assets/img/logo_bkd.png')}}" height="50">
            </span>
            <!-- <span class="demo menu-text fw-bolder text-primary ms-2">Beban Kerja Dosen</span> -->
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Dashboard</span>
        </li>
        <li class="menu-item {{ Route::currentRouteName()=='home' ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Halaman Utama</div>
            </a>
        </li>

        @if(Auth::user()->hasRole('5'))
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Setting</span>
        </li>
        @endif



</ul>



       



</aside>
<!-- / Menu -->
