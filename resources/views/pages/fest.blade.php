@extends("layouts.branda.appbranda")

@section('konten')

<section id="skills" class="skills bg-primary mt-5" style="background-image: url('{{ asset("assets/img/Group-13-1.png") }}'); background-size: cover; background-repeat: repeat;">
    <div class="container">
        <h1 class="text-light">HIPMI Fest</h1>
        <h2 class="text-yelow">Pameran Terbesar</h2>
    </div>
</section>
<div>
    <div class="container">
        <!-- <h1 class="text-primary">Kalender Kegiatan</h1>
        <h2 class="text-yellow">Catat jadwal kegiatan kami</h2> -->

        @foreach($events as $event)
        <div class="row my-2 p-2">
            <div class="card shadow-sm event-card">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-center px-4">
                        <div class="fw-bold text-primary">{{ \Carbon\Carbon::parse(optional($event)->date)->translatedFormat('M') }}</div>
                        <div class="display-5 fw-bold">{{ \Carbon\Carbon::parse(optional($event)->date)->format('d') }}</div>
                    </div>
                    <div>
                        <h5 class="mb-1"><a href="{{ route('beranda.detail.kegiatan', $event->id) }}" class="text-decoration-none fw-bold">
                                {{ optional($event)->title }}
                            </a></h5>
                        <p class="mb-1 text-muted"><strong>{{ optional($event)->jadwal }}</strong></p>
                        <p class="mb-0 text-muted"><i class="bi bi-geo-alt"></i> {{ optional($event)->lokasi }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection