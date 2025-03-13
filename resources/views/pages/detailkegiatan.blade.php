@extends("layouts.branda.appbranda")
@section('konten')
<!-- Hero Section -->

<section class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="fw-bold">{{ $kegiatan->title }}</h1>
                <p class="text-muted">Dilaksanakan pada {{ \Carbon\Carbon::parse($kegiatan->date)->translatedFormat('j M Y') }}</p>
                <div class="p-3 bg-white rounded shadow-sm">
                    <h5 class="fw-bold">Deskripsi Kegiatan</h5>
                  {!! $kegiatan->deskripsi !!}
                    <h5 class="fw-bold mt-3">Detail Acara</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Waktu:</strong> {{ $kegiatan->jadwal }}</li>
                        <li class="list-group-item"><strong>Lokasi:</strong>  {{ $kegiatan->lokasi }}</li>
                    </ul>

                  
                </div>
            </div>

            <div class="col-lg-4">
                <h4 class="fw-bold">Kegiatan Lainnya</h4>
                <div class="list-group">
                    @foreach ($kegiatanlain as $keg)
                    <a href="{{ route('beranda.detail.kegiatan', ['id' => $keg->id, 'slug' => Str::slug($keg->title)]) }}" class="list-group-item list-group-item-action">{{ $keg-> title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>






@endsection