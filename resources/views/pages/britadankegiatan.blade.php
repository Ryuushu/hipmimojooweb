@extends("layouts.branda.appbranda")

@section('konten')

<section id="skills" class="skills bg-primary mt-5" style="background-image: url('{{ asset("assets/img/Group-13-1.png") }}'); background-size: cover; background-repeat: repeat;">
    <div class="container">
        <h1 class="text-light">Kabar HIPMI</h1>
        <h2 class="text-yelow">Berita Terakhir dan Kegiatan Terbaru</h2>
    </div>
</section>

<div id="skills" class="skills">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-5">
                @if(!empty($latestNews))
                <div class="card my-2">
                    <img src="{{ url(asset('assets/uploadimg/berita/'.$latestNews->thumbnail)) }}" width="100%" class="img-fluid" alt="HIPMI JAYA">
                    <div class="card-body">
                        <span class="badge rounded-pill text-bg-secondary my-2 py-2">latest news</span>

                        <h5><a href="{{ route('beranda.detail.berita', optional($latestNews)->id) }}" class="text-decoration-none fw-bold">
                                {{ optional($latestNews)->title }}
                            </a></h5>
                        <p>{!! optional($latestNews)->kontent !!}</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-7">
                @foreach($newsList as $news)
                <div class="card my-2">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ url(asset('assets/uploadimg/berita/'.$latestNews->thumbnail)) }}" width="100%" class="img-fluid" alt="HIPMI JAYA">
                        </div>
                        <div class="col-9">
                            <span class="badge rounded-pill text-bg-secondary my-3 py-2">latest news</span>
                            <h5 class="mb-1"><a href="{{ route('beranda.detail.berita', optional($news)->id) }}" class="text-decoration-none fw-bold">
                                    {{ optional($news)->title }}
                                </a></h5>
                            <p>{!! optional($news)->kontent !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div>
    <div class="container">
        <h1 class="text-primary">Kalender Kegiatan</h1>
        <h2 class="text-yellow">Catat jadwal kegiatan kami</h2>

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

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <label for="sort" class="form-label">Urutkan</label>
            <select id="sort" class="form-select">
                <option>None</option>
                <option>Terbaru</option>
                <option>Terlama</option>
            </select>
        </div>
    </div>

    <div class="mb-3">
        <span class="fw-bold">Keyword</span>
        <button class="btn btn-primary btn-sm mx-1">All</button>
        <button class="btn btn-outline-secondary btn-sm mx-1">News</button>
        <button class="btn btn-outline-secondary btn-sm mx-1">Business</button>
        <button class="btn btn-outline-secondary btn-sm mx-1">Olahraga</button>
    </div>

    <div class="row">

        @foreach($newsList as $news)
        <div class="col-md-3">
            <div class="card">
                <img src="{{ url(asset('assets/uploadimg/berita/'.$news->thumbnail)) }}" width="100%" class="img-fluid" alt="HIPMI JAYA">
                <div class="card-body">

                    <h5 class="card-title"><a href="{{ route('beranda.detail.berita', optional($news)->id) }}" class="text-decoration-none fw-bold">
                            {{ optional($news)->title}}
                        </a></h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection