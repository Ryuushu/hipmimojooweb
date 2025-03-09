@extends("layouts.branda.appbranda")

@section('konten')

<section id="skills" class="skills bg-primary mt-5" style="background-image: url('{{ asset("assets/img/Group-13-1.png") }}'); background-size: cover; background-repeat: repeat;">
    <div class="container">
        <h1 class="text-light">HIPMI Fest</h1>
        <h2 class="text-yelow">Pameran Terbesar</h2>
    </div>
</section>
<div class="container">
    <!-- <h1 class="text-primary">Kalender Kegiatan</h1>
        <h2 class="text-yellow">Catat jadwal kegiatan kami</h2> -->
    <div class="row my-2 p-2">
        @foreach($events as $event)
        <a href="{{ route('beranda.detail.fest', $event->id) }}" class="card shadow-sm event-card text-decoration-none mt-2">
            <div class="card-body align-items-center">
                <h5 class="mb-1 text-decoration-none fw-bold">
                    {{ optional($event)->nama_fest }}
                </h5>
                <p class="mb-1 text-muted"><strong>{{ optional($event)->jadwal_fest }}</strong></p>
                <p class="mb-0 text-muted"><i class="bi bi-geo-alt"></i> {{ optional($event)->lokasi }}</p>
            </div>
        </a>
        @endforeach
    </div>
</div>



@endsection