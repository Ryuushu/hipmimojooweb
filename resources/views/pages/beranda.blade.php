@extends("layouts.branda.appbranda")
@section('konten')
<!-- Hero Section -->
<div class="imgbac">
    <div class="container">
        <div class="header position-relative d-flex align-items-center justify-content-between" style="background-color: rgba(0,0,0,0);">
            <a href="/" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset("assets/img/Logo hip.png") }}" alt="">
                <h2 class="sitename text-light">{{ optional($data)->title_web }}</h2>
            </a>

            <nav id="navmenu" class="navmenu ">
                <ul class="nav nav-underline">
                    <li class="dropdown nav-item"><a href="/tentang-kami"><span class=" active">Tentang Kami</span> <i class="bi bi-chevron-down toggle-dropdown text-light"></i></a>
                        <ul>
                            <li><a href="/tentang-kami/sejarah">Sejarah</a></li>
                            <li><a href="/tentang-kami/pengurus">Organisasi</a></li>
                        </ul>
                    </li>
                    <li><a href="/berita-dan-kegiatan" class="active">Berita dan Kegiatan</a></li>
                    <li><a href="/kontak" class="active">Kontak</a></li>
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
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                <h1 class="text-light">{{ optional($data)->slogan }}</h1>
                <p class="text-light">Bergabunglah bersama organisasi pengusaha muda di kota Mojokerto</p>
                <div class="d-flex">
                    <a href="/tentang-kami" class="btn-get-started">Tentang Kami</a>
                </div>
            </div>
        </div>
    </div>
</div>
@php
// Fungsi untuk memproses statistik
function processStat($stat, $defaultText) {
$stat = $stat ?? "0 $defaultText"; // Nilai default jika null
$parts = explode(' ', trim($stat), 2); // Menghindari spasi ekstra
// Ambil angka termasuk karakter tambahan seperti '+' (contoh: "3000+")
$number = preg_match('/^([\d+]+)\s*(.*)$/', $parts[0]) ? $parts[0] : '0';

$text = $parts[1] ?? $defaultText; // Pastikan ada teks

return ['number' => $number, 'text' => $text];
}


// Proses semua statistik
$stat1 = processStat(optional($data)->stat1, 'Orang');
$stat2 = processStat(optional($data)->stat2, 'Cabang');
$stat3 = processStat(optional($data)->stat3, 'Anggota');
$stat4 = processStat(optional($data)->stat4, 'Pengurus Inti');
@endphp
<!-- Stats Section -->
<section id="stats" class="stats section bg-grey">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-center">
            @if (optional($data)->stat1!=null)
            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="bi bi-emoji-smile"></i>
                <div class="stats-item bg-light">

                    <span data-purecounter-start="0" data-purecounter-end="{{ $stat1['number'] }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>{{ $stat1['text'] }}</p>
                </div>
            </div><!-- End Stats Item -->
            @endif
            @if (optional($data)->stat2!=null)
            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="bi bi-journal-richtext"></i>
                <div class="stats-item bg-light">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $stat2['number'] }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>{{ $stat2['text'] }}</p>
                </div>
            </div><!-- End Stats Item -->
            @endif
            @if (optional($data)->stat3!=null)
            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="bi bi-headset"></i>
                <div class="stats-item bg-light">
                    <span data-purecounter-start="0"
                        data-purecounter-end="{{ preg_replace('/[^0-9]/', '', $stat3['number']) }}"
                        data-purecounter-duration="1"
                        class="purecounter">
                    </span> {{ $stat3['text'] }}

                </div>
            </div><!-- End Stats Item -->
            @endif
            @if (optional($data)->stat4!=null)
            <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                <i class="bi bi-people"></i>
                <div class="stats-item bg-light">
                    <span data-purecounter-start="0" data-purecounter-end="{{ $stat4['number'] }}" data-purecounter-duration="1" class="purecounter"></span>
                    <p>{{ $stat4['text'] }}</p>
                </div>
            </div><!-- End Stats Item -->
            @endif

        </div>

    </div>

</section>
<!-- About Section -->
<section id="about" class="about section bg-grey">
    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="about-content ps-0 ps-lg-3">
                    <h1>{{ optional($data)->title_web }}</h1>
                    <h4>Himpunan Pengusaha Muda Indonesia</h4>
                    {!! optional($data)->deskripsi_hipmi !!}
                </div>
                <div class="d-flex mt-4">
                    <a href="#about" class="btn btn-primary text-light rounded-pill bg-primary px-3 py-2 fs-6 m-2 fw-bold">Kenali Lebih Dalam</a>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset("assets/img/as.JPG") }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="skills section bg-grey">
    <div class="container " data-aos="fade-up" data-aos-delay="100">
        <div class="skills-content skills-animation">
            <div class=" p-5 bg-tranparntvisi">
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
</section><!-- /Skills Section -->
<!-- Skills Section -->
<section id="skills" class="skills bg-primary " style="background-image: url('{{ asset("assets/img/Group-13-1.png") }}'); background-size: cover; background-repeat: repeat;">
    <div class="container " data-aos="fade-up" data-aos-delay="100">
        <div class="row skills-content skills-animation">
            <div class="col-lg-6 ">
                <h1 class="text-light">Berita, Cerita, Semua tentang {{ optional($data)->title_web }}</h1>
                <h2 class="text-yelow">Berita, cerita, semua tentang {{ optional($data)->title_web }}</h2>
            </div>

            <div class="col-lg-6">
                <h1 class="text-light">Kegiatan kami</h1>
                <h2 class="text-yelow">Catat jadwal kegiatan kami</h2>

            </div>

        </div>

    </div>

</section><!-- /Skills Section -->

<div class="bg-grey" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <div class="row">
            @if (!empty($berita) && count($berita) > 0)
            <div class="col-lg-6 ">
                <div class="row my-2 p-2">
                    @foreach ($berita as $ber)
                    <div class="card shadow-sm">
                        <div class="card-body row">
                            <div class="col-3">
                                <img src="{{ url(asset('assets/uploadimg/berita/'.$ber->thumbnail)) }}" alt="Gambar" style="width: 100%; height: auto;">
                            </div>
                            <div class="col-9 ">
                                <span class="badge rounded-pill text-bg-secondary mt-2">latest news</span>
                                <h5 class="mb-1"><a href="{{ route('beranda.detail.berita', $ber->id) }}" class="text-decoration-none fw-bold">
                                        {{ $ber->title }}
                                    </a></h5>
                                <p>{!! $ber->kontent !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="d-flex mt-4">
                    <a href="/berita-dan-kegiatan" class="btn btn-primary text-light rounded-pill bg-primary px-3 py-2 fs-6 fw-bold">Baca Artikel Lainnya</a>
                </div>
                @endif
            </div>

            <div class="col-lg-6">
                <div class="row my-2 p-2">
                    @if (!empty($kegiatan) && count($kegiatan) > 0)
                    @foreach ($kegiatan as $keg)
                    <div class="card shadow-sm event-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3 text-center">
                                <div class="fw-bold text-primary">{{ \Carbon\Carbon::parse($keg->date)->translatedFormat('M') }}</div>
                                <div class="display-5 fw-bold">{{ \Carbon\Carbon::parse($keg->date)->format('d') }}</div>
                            </div>
                            <div>
                                <h5 class="mb-1"><a href="{{ route('beranda.detail.kegiatan', $keg->id) }}" class="text-decoration-none fw-bold">
                                        {{ $keg->title }}
                                    </a></h5>
                                <p class="mb-1 text-muted"><strong>{{ $keg->jadwal }}</strong></p>
                                <p class="mb-0 text-muted"><i class="bi bi-geo-alt"></i>{{ $keg->lokasi }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="d-flex">
                    <a href="/berita-dan-kegiatan" class="btn btn-primary text-light rounded-pill bg-primary px-3 py-2 fs-6 fw-bold">Kegiatan Lainnya</a>
                </div>
                @endif
            </div>

        </div>
    </div>

</div>


@if (!empty($kegiatansel) && count($kegiatansel) > 0)

<section id="s" class="skills section bg-grey">
    <div class="container section-title" data-aos="fade-up">
        <p>Kegiatan Kami</p>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row gx-3 gy-4">
            @foreach ($kegiatansel as $sel)

            <div class="col-md-4">
                <div class="card-hover p-3">
                    <div class="image-box">
                        <a href="{{ $sel->url }}">
                            <img src="{{ url(asset('assets/uploadimg/kegiatan_selesai/'.$sel->img)) }}" alt="Image" class="img-fluid">
                        </a>

                    </div>
                    <h2 class="mt-4">
                        <a href="{{ route('kegiatan-selesai.index', $sel->id) }}" class="text-decoration-none text-dark fw-bold">
                            {{ $sel->title }}
                        </a>
                    </h2>
                    <p>{{ $sel->deskripsi }}</p>
                </div>
            </div>

            @endforeach

        </div>


    </div>
</section>
@endif

<section id="about" class="about section bg-grey">

    <div class="" data-aos="fade-up">
        <div class="row gy-3">
            <div class="col-lg-5 d-flex flex-column justify-content-center p-5 bg-yelow" data-aos="fade-up" data-aos-delay="200">
                <div class="about-content ps-0 ps-lg-5">
                    <h1>Keanggotaan</h1>
                    {!! optional($data)->deskripsi_keanggotaan !!}
                    <div class="">
                        <a href="#about" class="badge rounded-pill bg-primary px-4 py-2 fs-6">Daftar Menjadi Anggota</a>
                    </div>
                </div>

            </div>
            <div class="col-lg-7 p-5" data-aos="fade-up" data-aos-delay="100">
                <div class="about-content text-center ps-0 ps-lg-3">
                    <h1>Anggota Kami</h1>
                </div>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    @foreach ($anggota as $agt)
                    <img src="{{ url(asset('assets/uploadimg/anggota/'.$agt->img)) }}" alt="Anggota" class="rounded-circle img-anggota" width="80" height="80">
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</section>
<section class="bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 d-flex flex-column " data-aos="fade-up" data-aos-delay="200">
                <div class="about-content ps-0 ps-lg-3">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h1>Why Join {{ optional($data)->title_web }}</h1>
                            @foreach ($why as $kenapa)
                            <div class="d-flex align-items-start mb-4">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                    style="width: 40px; height: 40px; aspect-ratio: 1/1; font-size: 20px;">
                                    {{ $loop->iteration }}
                                </div>
                                <div class="ms-3">
                                    <h5 class="text-primary fw-bold">{{ $kenapa->title }}</h5>
                                    <p class="text-description mb-0 " style="text-align: justify;">
                                        {{ $kenapa->deskripsi }}
                                    </p>
                                    <button class="btn btn-link p-0 show-more">Show More</button>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="my-2">
                <img src="{{ asset("assets/img/s.JPG") }}" alt="" class="img-fluid">
                </div>
                <div class="my-2">
                <img src="{{ asset("assets/img/s.JPG") }}" alt="" class="img-fluid">
                </div>
                <div class="my-2">
                <img src="{{ asset("assets/img/s.JPG") }}" alt="" class="img-fluid">
                </div>
                <div class="my-2">
                <img src="{{ asset("assets/img/s.JPG") }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
@section("scripts")
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let header = document.getElementById("header");

        // Inisialisasi posisi awal header tersembunyi
        header.style.top = "-100px";

        window.addEventListener("scroll", function() {
            let currentScroll = window.pageYOffset;

            if (currentScroll > 100) { // Jarak sebelum header muncul
                header.style.top = "0";
            } else {
                header.style.top = "-100px";
            }
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".show-more").forEach(button => {
            button.addEventListener("click", function() {
                let deskripsi = this.previousElementSibling;
                if (deskripsi.style.webkitLineClamp === "2") {
                    deskripsi.style.webkitLineClamp = "unset";
                    deskripsi.style.overflow = "visible";
                    this.textContent = "Show Less";
                } else {
                    deskripsi.style.webkitLineClamp = "2";
                    deskripsi.style.overflow = "hidden";
                    this.textContent = "Show More";
                }
            });
        });
    });
</script>
@endsection