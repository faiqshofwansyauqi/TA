<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
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
                    <a href="{{ route('rekam_medis.ropb') }}"
                        class="{{ request()->is(['rekam_medis.ropb', 'rekam_medis/ropb']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Riwayat Obstetrik, Pemeriksaan Bidan dan Rencana Persalinan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('rekam_medis.tm1') }}"
                        class="{{ request()->is(['rekam_medis.tm1', 'rekam_medis/tm1']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Pemeriksaan Dokter TM1</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('rekam_medis.anc') }}"
                        class="{{ request()->is(['rekam_medis.anc', 'rekam_medis/anc', 'rekam_medis.show_anc', 'rekam_medis/anc/show_anc/*']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Antenatal Care</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('rekam_medis.persalinan') }}"
                        class="{{ request()->is(['rekam_medis.persalinan', 'rekam_medis/persalinan']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Persalinan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('errors.404') }}"
                        class="{{ request()->is(['errors.404', 'errors/404']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>PNC</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('errors.404') }}"
                        class="{{ request()->is(['errors.404', 'errors/404']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Pemantauan PPIA dan Pemantauan Dari Ibu Heptasis B</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('errors.404') }}"
                        class="{{ request()->is(['errors.404', 'errors/404']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Pemantauan Bayi Dari Ibu HIV dan Pemantauan Bayi Dari Ibu Sifilis</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is(['master.pasien', 'master/pasien']) ? '' : 'collapsed' }}"
                href="{{ route('master.pasien') }}">
                <i class="bi bi-clipboard2-data"></i>
                <span>Master Data</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->
