<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @role('Bidan|Admin')
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
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is(['antenatal_care', 'antenatal_care/*']) ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="bi bi-journal"></i>
                    <span>Antenatal Care</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <li class="nav-item collapse {{ request()->is(['antenatal_care', 'antenatal_care/*']) ? 'show' : '' }}"
                id="collapseExample1">
                <ul class="nav-content">
                    {{-- <li>
                    <a href="{{ route('antenatal_care.tm1') }}"
                        class="{{ request()->is(['antenatal_care.tm1', 'antenatal_care/tm1']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Pemeriksaan Dokter TM1</span>
                    </a>
                </li> --}}
                    <li>
                        <a href="{{ route('antenatal_care.anc') }}"
                            class="{{ request()->is(['antenatal_care.anc', 'antenatal_care/anc', 'antenatal_care.show_anc', 'antenatal_care/anc/show_anc/*']) ? 'active' : '' }}">
                            <i class="bi bi-circle"></i>
                            <span>Perawatan Selama Hamil</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('antenatal_care.ropb') }}"
                            class="{{ request()->is(['antenatal_care.ropb', 'antenatal_care/ropb']) ? 'active' : '' }}">
                            <i class="bi bi-circle"></i>
                            <span>Pemeriksaan Bidan/Dokter Saat K1</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('antenatal_care.rnca_persalinan') }}"
                            class="{{ request()->is(['antenatal_care.rnca', 'antenatal_care/rnca']) ? 'active' : '' }}">
                            <i class="bi bi-circle"></i>
                            <span>Rencana Persalinan</span>
                        </a>
                    </li>
                    {{-- <li>
                    <a href="{{ route('antenatal_care.tm3') }}"
                        class="{{ request()->is(['antenatal_care.tm3', 'antenatal_care/tm3']) ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Pemeriksaan Dokter TM3</span>
                    </a>
                </li> --}}
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is(['intranatal_care', 'intranatal_care/*']) ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="bi bi-journal-text"></i>
                    <span>Intranatal Care</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <li class="nav-item collapse {{ request()->is(['intranatal_care', 'intranatal_care/*']) ? 'show' : '' }}"
                id="collapseExample2">
                <ul class="nav-content">
                    <li>
                        <a href="{{ route('intranatal_care.persalinan') }}"
                            class="{{ request()->is(['intranatal_care.persalinan', 'intranatal_care/persalinan']) ? 'active' : '' }}">
                            <i class="bi bi-circle"></i>
                            <span>Masa Persalinan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is(['postnatal_care', 'postnatal_care/*']) ? '' : 'collapsed' }}"
                    data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <i class="bi bi-journals"></i>
                    <span>Postnatal Care</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
            </li>
            <li class="nav-item collapse {{ request()->is(['postnatal_care', 'postnatal_care/*']) ? 'show' : '' }}"
                id="collapseExample3">
                <ul class="nav-content">
                    <li>
                        <a href="{{ route('postnatal_care.nifas') }}"
                            class="{{ request()->is(['postnatal_care.nifas', 'postnatal_care/nifas', 'postnatal_care.show_nifas', 'postnatal_care/nifas/show_nifas/*']) ? 'active' : '' }}">
                            <i class="bi bi-circle"></i>
                            <span>Masa Nifas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('postnatal_care.ppia') }}"
                            class="{{ request()->is(['postnatal_care.ppia', 'postnatal_care/ppia', 'postnatal_care.show_ppia', 'postnatal_care/ppia/show_ppia/*']) ? 'active' : '' }}">
                            <i class="bi bi-circle"></i>
                            <span>Pemantauan PPIA</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('postnatal_care.pemantauan_bayi') }}"
                            class="{{ request()->is(['postnatal_care.pemantauan_bayi', 'postnatal_care/pemantauan_bayi']) ? 'active' : '' }}">
                            <i class="bi bi-circle"></i>
                            <span>Pemantauan Bayi</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole


        <li class="nav-item">
            <a class="nav-link {{ request()->is(['setting.role', 'setting/role']) ? '' : 'collapsed' }}"
                href="{{ route('setting.role') }}">
                <i class="bi bi-person-badge"></i>  
                <span>Role</span>
            </a>
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
