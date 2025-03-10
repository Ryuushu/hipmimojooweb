@extends("layouts.branda.appbranda")
@section('konten')
<!-- Hero Section -->

<section class="bg-light mt-5">
    <h1 class="text-center my-3">Sejarah</h1>
    <div class="bg-utama" data-aos="fade-up" data-aos-delay="200" style="background-image: url('{{ asset("assets/img/Group-history.png") }}'); background-size: cover; background-repeat: repeat;">
        <div class="row">
            <div class="col-lg-7 d-flex flex-column justify-content-center p-5">

                <h3 class="text-yelow">SEJARAH {{ optional($data)->title_web }}</h3>
                <div class="text-light">
                {!! optional($data)->deskripsi_sejarah!!}
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
<div class="bg-light">
    <div class="container  ">
        <h2 class="text-center py-5 ">Timeline</h2>
        <div class="timeline-item">
            <div class="row align-items-center">
                <div class="col-sm-4 text-md-end">
                    <span class="timeline-date">2005-2008</span>
                </div>
                <div class="col-sm-8 bg-body-secondary rounded">
                    <div class="timeline-content">
                        <h5 class="text-utama"><strong>Lahirnya BPC HIPMI Kota Mojokerto</strong></h5>
                        <p>BPC HIPMI Kota Mojokerto resmi didirikan pada tanggal 13 Juni 2005</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="timeline-item">
            <div class="row align-items-center">
                <div class="col-sm-4 text-md-end">
                    <span class="timeline-date">2020-2023</span>
                </div>
                <div class="col-sm-8 bg-body-secondary rounded">
                    <div class="timeline-content">
                        <h5 class="text-utama"><strong>BPC HIPMI Kota Mojokerto</strong></h5>
                        <p>BPC HIPMI Kota Mojokerto aktif dalam menumbuhkan iklim usaha dan mendorong kolaborasi antara pengusaha muda dan pemerintah daerah.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="timeline-item">
            <div class="row align-items-center">
                <div class="col-sm-4 text-md-end">
                    <span class="timeline-date">2024 ~ ....</span>
                </div>
                <div class="col-sm-8 bg-body-secondary rounded">
                    <div class="timeline-content">
                        <h5 class="text-utama"><strong>BPC HIPMI Kota Mojokerto</strong></h5>
                        <p>- BPC HIPMI Kota Mojokerto terlibat dalam acara Business Matching Silaturahmi Kolaborasi 2025. <br>- Kolaborasi dengan HIPMI dari tiga kota/kabupaten di Jawa Timur.<br>Dengan tujuan acara: memperkuat sinergi antar pengusaha muda, memperluas jaringan usaha, dan membangun kolaborasi bisnis.</p>
                       
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection