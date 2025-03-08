@extends("layouts.branda.appbranda")
@section('konten')
<!-- Hero Section -->

<div class="bg-light mt-5">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 ">
                <h1 class="fw-bold">{{ $berita->title }}</h1>
                <p class="text-muted">Dipublikasikan pada {{ \Carbon\Carbon::parse($berita->date)->translatedFormat('j M Y') }}</p>
                <img src="{{ url(asset('assets/uploadimg/berita/'.$berita->thumbnail)) }}" class="img-fluid rounded" alt="Gambar Berita" width="800" height="400">
                <div class="mt-2">
                    {!! $berita->kontent !!}
                </div>
            </div>

            <div class="col-lg-4 ps-3">
                <h4 class="fw-bold">Berita Terkait</h4>
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="row">
                                @foreach ($beritalain as $ber)
                                <div class="col-lg-4">
                                    <img src="{{ url(asset('assets/uploadimg/berita/'.$ber->thumbnail)) }}" class="card-img-top" alt="Berita 1">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h6 class="card-title"><a href="{{ route('beranda.detail.berita', $ber->id) }}" class="text-decoration-none fw-bold">
                                        {{ $ber->title }}
                                            </a></h6>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection