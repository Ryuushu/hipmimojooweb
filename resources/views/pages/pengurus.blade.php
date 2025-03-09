@extends("layouts.branda.appbranda")
@section('konten')
<!-- Hero Section -->

<section class="bg-light mt-5">
    <h1 class="text-center my-3">Setruktur Organisasi</h1>
    <!-- bagian ketua pengurus -->

    <div class="bg-utama" data-aos="fade-up" data-aos-delay="200" style="background-image: url('{{ asset("assets/img/Group-history.png") }}'); background-size: cover; background-repeat: repeat;">
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
    <div class="container">
        @foreach ($divisi as $index=> $d)
        @php
        if($d->anggotaPengurus()->count()== 0){
        continue;
        }
        $tingkatan = [];
        $tingkatan[0] = $d->anggotaPengurus()->where("tingkatan",1)->get();
        $tingkatan[1] = $d->anggotaPengurus()->where("tingkatan",2)->get();
        $tingkatan[2] = $d->anggotaPengurus()->where("tingkatan",3)->get();
        $tingkatan[3] = $d->anggotaPengurus()->where("tingkatan",4)->get();
        $tingkatan[4] = $d->anggotaPengurus()->where("tingkatan",5)->get();
        @endphp
        <div class="row align-items-start">
            @if($index>0)
            <div class="col-md-2">
                <div class="bg-success px-4 py-3  mb-2  d-inline-block ">
                    <h6 class="m-0 text-white">{{ $d->bidang }}</h6>
                </div>
                <p>{{ $d->nama_devisi }}</p>
            </div>
            @endif
            <div class="col">
                @foreach ($tingkatan as $t)
                @php
                if(count($t)==0){
                continue;
                }
                @endphp
                <div class="d-flex {{ $index ==0 ?"justify-content-center":"" }} gap-4 mb-4">
                    @foreach ($t as $s)
                    <article style="width: 250px;">
                        <img class="img-fluid object-fit-cover" style="aspect-ratio: 1/1;" src="{{ asset('assets/uploadimg/pengurus/'.$s->img) }}" alt="">
                        <center>
                            <h6 class="mt-2 ">{{ $s->nama_anggota }}</h6>
                            <span>{{ $s->jabatan }}</span>
                        </center>
                    </article>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        <div class="bg-warning mb-4" style="height: 30px;"></div>

        @endforeach
    </div>
</section>


@endsection
