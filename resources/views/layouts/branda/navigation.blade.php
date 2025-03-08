<header id="header" class="header sticky-top ">
    <div class="branding d-flex align-items-center justify-content-center bg-primary ">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset("assets/img/Logo hip.png") }}" alt="">
                <h2 class="sitename text-light">{{ optional($data)->title_web }}</h2>
            </a>

            <nav id="navmenu" class="navmenu ">
                <ul class="nav nav-underline">
                    <li class="dropdown nav-item "><a href="/tentang-kami" class="p-0 text-decoration-none nav-link active text-light"><span class="active ">Tentang Kami</span> <i class="bi bi-chevron-down toggle-dropdown text-light"></i></a>
                        <ul>
                            <li><a href="/tentang-kami/sejarah ">Sejarah</a></li>
                            <li><a href="/tentang-kami/pengurus">Organisasi</a></li>
                        </ul>
                    </li>
                    <li><a href="/berita-dan-kegiatan" class="active p-0 text-decoration-none">Berita dan Kegiatan</a></li>
                    <li><a href="/fest" class="active p-0 text-decoration-none">HIPMI Fest</a></li>
                    <li><a href="/kontak" class="active p-0 text-decoration-none">Kontak</a></li>
                    <li> <a href="https://www.instagram.com/hipmikotamojokerto/" target="_blank" class="text-light ms-3">
                            <i class="bi bi-instagram fs-4"></i>
                        </a></li>
                    <!-- <li><a href="/kontak" class="btn btn-light btn-sm">Join Now</a></li> -->
                </ul>
                <!-- Tambahkan ikon Instagram -->


                <!-- Tambahkan tombol Join Now -->

                <i class="mobile-nav-toggle d-xl-none bi bi-list text-light"></i>
            </nav>

        </div>

    </div>

</header>