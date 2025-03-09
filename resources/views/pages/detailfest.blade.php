@extends("layouts.branda.appbranda")
@section('konten')
<!-- Hero Section -->

<div class=" py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="fw-bold">{{ $fest->nama_fest }}</h1>
                <!-- <p class="text-muted">Dilaksanakan pada {{ \Carbon\Carbon::parse($fest->date)->translatedFormat('j M Y') }}</p> -->
                <div class="p-3 bg-white rounded shadow-sm">
                    <h5 class="fw-bold">Deskripsi Acara</h5>
                  {!! $fest->deskripsi_fest !!}
                    <h5 class="fw-bold mt-3">Detail Acara</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Waktu:</strong> {{ $fest->jadwal_fest }}</li>
                        <li class="list-group-item"><strong>Lokasi:</strong>  {{ $fest->lokasi }}</li>
                        <li class="list-group-item"><strong>Rangkaian Acara:</strong>  {!!$fest->lokasi !!}</li>
                        
                    </ul>
                </div>
            </div>

            <div class="col-lg-4">
                <h4 class="fw-bold">Kegiatan Lainnya</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">Workshop Digital Marketing - 15 Maret 2025</a>
                    <a href="#" class="list-group-item list-group-item-action">Seminar Kesehatan Mental - 20 Maret 2025</a>
                    <a href="#" class="list-group-item list-group-item-action">Pelatihan UI/UX Design - 25 Maret 2025</a>
                    <a href="#" class="list-group-item list-group-item-action">Webinar Cyber Security - 30 Maret 2025</a>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection