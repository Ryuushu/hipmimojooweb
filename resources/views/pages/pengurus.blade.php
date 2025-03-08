@extends("layouts.branda.appbranda")
@section('konten')
<!-- Hero Section -->

<div class="bg-light mt-5">
    <h1 class="text-center my-3">Setruktur Organisasi</h1>
    <div class="bg-primary" data-aos="fade-up" data-aos-delay="200" style="background-image: url('{{ asset("assets/img/Group-history.png") }}'); background-size: cover; background-repeat: repeat;">
        <div class="row">
            <div class="col-lg-7 d-flex flex-column justify-content-center p-5">

                <h3 class="text-yelow">Struktur Oganisasi</h3>
                <div class="text-light">
                    {!! optional($deskripsi_kepengurusan)->deskripsi_kepengurusan !!}
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
                                    <h2><a href="/tentang-kami">Tentang Kami</a></h2>
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
                                    <h2><a href="/tentang-kami/sejarah">Sejarah</a></h2>
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
                                    <h2><a href="/tentang-kami/pengurus">Struktur Organisasi</a></h2>
                                </span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>

</div>


@endsection