<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        {{-- <li class="nav-item">
            <a class="nav-link {{ request()->is(['/']) ? '' : 'collapsed' }}" href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link {{ request()->is(['pasien', 'pasien/*']) ? '' : 'collapsed' }}" data-bs-toggle="collapse"
                href="#collapseExample5" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="bi bi-people-fill"></i>
                <span>Data Pasien</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
        </li>
        <li class="nav-item collapse {{ request()->is(['pasien', 'pasien/*']) ? 'show' : '' }}" id="collapseExample5">
            <ul class="nav-content">
                <li>
                    <a href="{{ route('pasien.ibu') }}"
                        class="{{ request()->is(['pasien.ibu', 'pasien/ibu']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Ibu</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pasien.anak') }}"
                        class="{{ request()->is(['pasien.anak', 'pasien/anak']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Anak</span>
                    </a>
                </li>
            </ul>
        <li class="nav-item">
            <a class="nav-link {{ request()->is(['rekam_medis', 'rekam_medis/*']) ? '' : 'collapsed' }}"
                data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false"
                aria-controls="collapseExample">
                <i class="bi bi-journal-bookmark"></i>
                <span>Rekam Medis</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
        </li>
        <li class="nav-item collapse {{ request()->is(['rekam_medis', 'rekam_medis/*']) ? 'show' : '' }}"
            id="collapseExample4">
            <ul class="nav-content">
                <li>
                    <a href="{{ route('rekam_medis.persalinan') }}"
                        class="{{ request()->is(['rekam_medis.persalinan', 'rekam_medis/persalinan']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Persalinan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pasien.anak') }}"
                        class="{{ request()->is(['pasien.anak', 'pasien/anak']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>PNC</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is(['master.pasien','master/pasien']) ? '' : 'collapsed' }}" href="{{ route('master.pasien') }}">
                <i class="bi bi-people-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->
