<header id="header" class="header sticky-top">
    <div class="branding d-flex align-items-center justify-content-center">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center text-decoration-none">
                <img src="{{ asset('assets/img/Logo hip.png') }}" alt="">
                <h2 class="sitename text-light">{{ optional($data)->title_web }}</h2>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul class="nav nav-underline">
                    <!-- Tentang Kami -->
                    <li class="dropdown nav-item">
                        <a href="/tentang-kami"
                            class=" text-decoration-none nav-link {{ Request::is('tentang-kami*') ? 'active' : '' }}">
                            <span class="{{ Request::is('tentang-kami*') ? 'active' : '' }}">Tentang Kami</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul>
                            <li><a href="/tentang-kami/sejarah"
                                    class="{{ Request::is('tentang-kami/sejarah') ? 'active' : '' }}">Sejarah</a></li>
                            <li><a href="/tentang-kami/pengurus"
                                    class="{{ Request::is('tentang-kami/pengurus') ? 'active' : '' }}">Organisasi</a></li>
                            <li><a href="/tentang-kami/proker"
                                    class="{{ Request::is('tentang-kami/proker') ? 'active' : '' }}">Program Kerja</a></li>
                        </ul>
                    </li>

                    <!-- Berita dan Kegiatan -->
                    <li>
                        <a href="/berita-dan-kegiatan"
                            class=" text-decoration-none nav-link {{ Request::is('berita-dan-kegiatan') ? 'active' : '' }}">
                            Berita dan Kegiatan
                        </a>
                    </li>

                    <!-- HIPMI Fest -->
                    <li>
                        <a href="/fest"
                            class=" text-decoration-none nav-link {{ Request::is('fest') ? 'active' : '' }}">
                            HIPMI Fest
                        </a>
                    </li>

                    <!-- Kontak -->
                    <li>
                        <a href="/kontak"
                            class=" text-decoration-none nav-link {{ Request::is('kontak') ? 'active' : '' }}">
                            Kontak
                        </a>
                    </li>

                    <!-- Instagram -->
                    <li>
                        <a href="https://www.instagram.com/hipmikotamojokerto/" target="_blank" class="text-light">
                            <i class="bi bi-instagram fs-4"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/@hipmimojokertokota" target="_blank" class="text-light">
                            <i class="bi bi-youtube fs-4"></i>
                        </a>
                    </li>

                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list text-light"></i>
            </nav>
        </div>
    </div>
</header>
