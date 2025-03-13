@extends("layouts.branda.appbranda")
@section('konten')

<!-- Hero Section -->
<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Kolom utama -->
            <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="text-center"> <!-- Untuk membuat gambar berada di tengah -->
                    <img loading="lazy" src="{{ url(asset('assets/uploadimg/fest/'.$fest->thumbnail)) }}" 
                        class="img-fluid rounded" 
                        alt="Gambar Berita" 
                        style="width: 50%; height: auto;">
                </div>
                <h1 class="fw-bold mt-3">{{ $fest->nama_fest }}</h1>
                <div class="p-3 bg-white rounded shadow-sm">
                    <h5 class="fw-bold">Deskripsi Acara</h5>
                    {!! $fest->deskripsi_fest !!}
                    <h5 class="fw-bold mt-3">Detail Acara</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Waktu:</strong> {{ $fest->jadwal_fest }}</li>
                        <li class="list-group-item"><strong>Lokasi:</strong> {{ $fest->lokasi }}</li>
                        <li class="list-group-item"><strong>Rangkaian Acara:</strong> {!! $fest->lokasi !!}</li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5 col-sm-12 mt-4 mt-md-0">
                <h4 class="fw-bold">Fest Lainnya</h4>
                <div class="list-group">
                    @foreach ($events as $evt)
                    <a href="{{ route('beranda.detail.fest', ['id' => $evt->id, 'slug' => Str::slug($evt->nama_fest)]) }}" class="list-group-item list-group-item-action">{{ $evt->nama_fest }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


@endsection