<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo " id="logo-bkd">
        <a href="{{ route('index') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{asset('assets/img/rpl_.png')}}" height="35">
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

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Rekognisi</span>
        </li>
        <li class="menu-item {{ Route::currentRouteName()=='rekognisi.index' ? 'active' : '' }}">
            <a href="{{ route('rekognisi.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bxs-receipt"></i>
                <div data-i18n="Dashboards">Pengajuan Rekognisi</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar-exclamation"></i>
                <div data-i18n="Dashboards">Asesmen</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pusat Data</span>
        </li>
        <li class="menu-item ">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-receipt"></i>
                <div data-i18n="Dashboards">Verifikasi Pengajuan Rekoginisi</div>
            </a>
        </li>
        <li class="menu-item ">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-content"></i>
                <div data-i18n="Dashboards">Mata Kuliah</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pengaturan</span>
        </li>

        <li class="menu-item ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-archive"></i>
                <div>Pengaturan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user-circle"></i>
                        <div data-i18n="Dashboards">Akun</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-calendar-exclamation"></i>
                        <div data-i18n="Dashboards">Jadwal Asesmen</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-book"></i>
                        <div data-i18n="Dashboards">Mata Kuliah</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-building-house"></i>
                        <div data-i18n="Dashboards">Ruangan</div>
                    </a>
                </li>
            </ul>
        </li>






    </ul>







</aside>
<!-- / Menu -->
