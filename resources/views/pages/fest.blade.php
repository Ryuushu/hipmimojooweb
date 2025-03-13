@extends("layouts.branda.appbranda")

@section('konten')

<section id="skills" class="skills bg-primary mt-5" style="background-image: url('{{ asset("assets/img/Group-13-1.png") }}'); background-size: cover; background-repeat: repeat;">
    <div class="container">
        <h1 class="text-light">HIPMI Fest</h1>
        <h2 class="text-yelow">Pameran Terbesar</h2>
        <a href="https://www.instagram.com/hipmifestmojokertokota/" class="text-white ">
            <p class="fs-6"><i class="bi bi-instagram"></i> HIPMI Fest</p>
        </a>
    </div>
</section>
<div class="container">
    @foreach($events as $event)
    <div class="card my-2 p-2 position-relative">
        <a href="{{ route('beranda.detail.fest', ['id' => $event->id, 'slug' => Str::slug($event->nama_fest)]) }}" class="stretched-link">
        <div class="row">
            <div class="col-2">
                <img loading="lazy" src="{{ url(asset('assets/uploadimg/fest/'.$event->thumbnail)) }}"
                    width="100%" height="100%" style="object-fit: cover;" alt="berita">
            </div>
            <div class="col-10">
                <h5 class="mb-1 fw-bold">
                    {{ optional($event)->nama_fest }}
                </h5>
                <p class="mb-1 text-muted"><strong>{{ optional($event)->jadwal_fest }}</strong></p>
                <p class="mb-0 text-muted"><i class="bi bi-geo-alt"></i> {{ optional($event)->lokasi }}</p>
            </div>
        </div>
        </a>
    </div>
    @endforeach
</div>




@endsection