@extends("layouts.branda.appbranda")
@section('konten')
<!-- Hero Section -->

<section id="about" class="about section mt-5">
    <h1 class="text-center mb-3">Tentang Kami</h1>
    <div class="container" data-aos="fade-up">
        <div class="row gy-3">
            <div class="col-lg-7 d-flex flex-column justify-content-center p-5 bg-yelow" data-aos="fade-up" data-aos-delay="200">
                <div class="about-content ps-0 ps-lg-3">
                    <h1>{{ optional($data)->title_web }}</h1>
                    <h4 class="text-utama">Himpunan Pengusaha Muda Indonesia</h4>
                    {!! optional($data)->deskripsi_tentang !!}
                </div>
            </div>
            <div class="col-lg-5 d-flex justify-content-center align-items-center p-5 bg-grey ">
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <div class="row align-items-center justify-content-center border-bottom">
                            <div class="col-1">
                                <i class="bi bi-chevron-right text-primary"></i>
                            </div>
                            <div class="col-11">
                                <span class="fw-semibold">
                                    <h2><a href="/tentang-kami" class="text-utama text-decoration-none">Tentang Kami</a></h2>
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="row align-items-center justify-content-center border-bottom">
                            <div class="col-1">
                                <i class="bi bi-chevron-right text-primary"></i>
                            </div>
                            <div class="col-11">
                                <span class="fw-semibold ">
                                    <h2><a href="/tentang-kami/sejarah" class="text-utama text-decoration-none">Sejarah</a></h2>
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="row align-items-center justify-content-center border-bottom">
                            <div class="col-1">
                                <i class="bi bi-chevron-right text-primary"></i>
                            </div>
                            <div class="col-11">
                                <span class="fw-semibold">
                                    <h2><a href="/tentang-kami/pengurus" class="text-utama text-decoration-none">Struktur Organisasi</a></h2>
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="row align-items-center justify-content-center border-bottom">
                            <div class="col-1">
                                <i class="bi bi-chevron-right text-primary"></i>
                            </div>
                            <div class="col-11">
                                <span class="fw-semibold">
                                    <h2><a href="/tentang-kami/proker" class="text-utama text-decoration-none">Program Kerja</a></h2>
                                </span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>

</section>

<!-- Skills Section -->
<section id="skills" class="skills section ">
    <div class="container " data-aos="fade-up" data-aos-delay="100">
        <div class="row skills-content skills-animation">
            <div class="p-5 bg-tranparntvisi">
                <h1 class="text-yelow">Visi</h1>
                <div class="text-light">
                    {!! optional($data)->visi !!}

                </div>
            </div>

            <div class="p-5 bg-tranparntmisi">
                <h1 class="text-yelow">Misi</h1>
                <div class="text-light">
                    {!! optional($data)->misi !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light">
    <h1 class="text-center bg-light">Our Value</h1>
    <div class="container py-4 ">
        <div class="row">
            <div class="col bg-body-secondary">
                <div class="p-3">
                    <h5 class="card-title text-primary">Koneksi-Solusi</h5>
                    <p class="card-text">
                        BPC HIPMI Kota Mojokerto akan mempertemukan Anda dengan ribuan anggota lainnya, lintas generasi dan daerah.
                        Perluas jangkauan koneksi Anda untuk menyelesaikan tantangan kewirausahaan Anda.
                    </p>
                </div>
            </div>
            <div class="col bg-yelow-value">
                <div class="p-3">
                    <h5 class="card-title text-primary">Kolaborasi-Kompetisi</h5>
                    <p class="card-text">
                        Petakan pesaing dan mitra usaha Anda melalui BPC HIPMI Kota Mojokerto.
                        Bangun kolaborasi untuk memajukan usaha Anda dalam berkompetisi.
                    </p>
                </div>
            </div>
            <div class="col bg-body-secondary">
                <div class="p-3">
                    <h5 class="card-title text-primary">Aktual-Kapital</h5>
                    <p class="card-text">
                        Dapatkan informasi terbaru dan kesempatan untuk terlibat dalam program-program peningkatan kapasitas
                        khusus anggota, serta akses modal melalui mitra-mitra BPC HIPMI Kota Mojokerto.
                    </p>
                </div>
            </div>
        </div>

</section>

<div class="container bg-grey">
    <div class="row">
        <div class="col-lg-8 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="about-content ps-0 ps-lg-3 py-5">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h1>Why Join {{ optional($data)->title_web }}</h1>
                        @foreach ($why as $kenapa )
                        <div class="d-flex align-items-start mb-4">
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                style="width: 40px; height: 40px;aspect-ratio: 1/1; font-size: 20px;">

                                {{ $loop->iteration }}
                            </div>
                            <div class="ms-3">
                                <h5 class="text-primary fw-bold">{{ $kenapa->title }}</h5>
                                {{ $kenapa->deskripsi }}
                            </div>
                        </div>
                        @endforeach




                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/about.jpg" alt="" class="img-fluid">
        </div>
    </div>
</div>
@endsection
