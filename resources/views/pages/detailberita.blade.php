@extends("layouts.branda.appbranda")
@section('meta')
<meta property="og:title" content="{{ $berita->title }}">
<meta property="og:description" content="{{ Str::limit(strip_tags($berita->kontent), 150) }}">
<meta property="og:image" content="{{ url(asset('assets/uploadimg/berita/'.$berita->thumbnail)) }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="article">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $berita->title }}">
<meta name="twitter:description" content="{{ Str::limit(strip_tags($berita->kontent), 150) }}">
<meta name="twitter:image" content="{{ url(asset('assets/uploadimg/berita/'.$berita->thumbnail)) }}">
@endsection


@section('konten')
<!-- Hero Section -->

<section class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8 ">
                <h1 class="fw-bold">{{ $berita->title }}</h1>
                <p class="text-muted">Dipublikasikan pada {{ \Carbon\Carbon::parse($berita->date)->translatedFormat('j M Y') }}</p>
                <img loading="lazy" src="{{ url(asset($berita->thumbnail)) }}" class="img-fluid rounded" alt="Gambar Berita" width="800" height="400">
                <div class="mt-2">
                    {!! $berita->kontent !!}
                </div>
            </div>

            <div class="col-lg-4 ps-3">
                <h4 class="fw-bold">Berita Terkait</h4>
                <div class="row">
                    @foreach ($beritalain as $ber)
                    <div class="col-12 mb-1">
                        <div class="card">
                            <div class="row">
                                <div class="col-4">
                                    <img loading="lazy" src="{{ url(asset($ber->thumbnail)) }}" width="100%" height="100%"
                                        style="object-fit: cover;" alt="berita" alt="Berita 1">
                                </div>
                                <div class="col-8">
                                    <div class="card-body">
                                        <h6 class="card-title"><a href="{{ route('beranda.detail.berita', ['id' => $ber->id, 'slug' => Str::slug($ber->title)]) }}" class="text-decoration-none fw-bold">
                                                {{ $ber->title }}
                                            </a></h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>





@endsection