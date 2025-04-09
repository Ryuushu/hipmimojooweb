@extends("layouts.branda.appbranda")
@section('konten')
<!-- Hero Section -->

<section class="bg-light mt-5">
    <h1 class="text-center my-3">Struktur Organisasi</h1>
    <!-- bagian ketua pengurus -->

    <div class="bg-utama" data-aos="fade-up" data-aos-delay="200" style="background-image: url('{{ asset("assets/img/Group-history.png") }}'); background-size: cover; background-repeat: repeat;">
        <div class="row">
            <div class="col-lg-7 d-flex flex-column justify-content-center p-5">

                <h3 class="text-yelow">Struktur Oganisasi</h3>
                <div class="text-light">
                    {!! optional($data)->deskripsi_kepengurusan !!}
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
        <h1 class="text-center my-5">Kepengurusan</h1>
        <div class="text-center mb-5">
            {!! optional($data)->periode_keanggotaan !!}
        </div>
        <div id="divisi-container"></div>
        <div id="loading" class="text-center my-4" style="display:none;">
            <div class="spinner-border text-primary" role="status"></div>
        </div>
    </div>
</section>
<script>
    let divisiPage = 1;
    let loading = false;
    let finished = false;

    function loadDivisi() {
        if (loading || finished) return;
        loading = true;
        document.getElementById('loading').style.display = 'block';

        fetch(`/api/pengurus-divisi?page=${divisiPage}`)
            .then(res => res.json())
            .then(data => {
                const container = document.getElementById('divisi-container');

                if (data.data.length === 0) {
                    finished = true;
                    document.getElementById('loading').style.display = 'none';
                    return;
                }

                data.data.forEach((div, index) => {
                    const row = document.createElement('div');
                    row.className = "row align-items-start";

                    let colLeft = "";
                    if (divisiPage > 1 || index > 0) {
                        colLeft = `
                        <div class="col-md-2">
                            <div class="bg-success px-4 py-3  mb-2  d-inline-block ">
                                <h6 class="m-0 text-white">${div.bidang}</h6>
                            </div>
                            <p>${div.nama_devisi}</p>
                        </div>
                        `;
                    }

                    let colRight = `<div class="col">`;

                    div.tingkatan.forEach(t => {
                        if (t.length === 0) return;
                        colRight += `<div class="row ${divisiPage == 1 && index == 0 ? 'justify-content-center' : ''} g-4 mb-5">`;

                        t.forEach(s => {
                            colRight += `
                            <article class="col-4 mt-5">
                                <img src="${window.location.origin}/${s.img}" class="img-fluid object-fit-cover" style="aspect-ratio: 1/1;" alt="">
                                <center>
                                    <h6 class="mt-2 fw-bold fs-6 fs-md-5 fs-lg-2">${s.nama_anggota}</h6>
                                    <span>${s.jabatan}</span>
                                </center>
                            </article>
                        `;
                        });

                        colRight += `</div>`;
                    });

                    colRight += `</div>`;

                    row.innerHTML = colLeft + colRight;
                    container.appendChild(row);

                    container.innerHTML += `<div class="bg-warning mb-4" style="height: 30px;"></div>`;
                });

                divisiPage++;
                loading = false;
                document.getElementById('loading').style.display = 'none';
            });
    }

    // Load first
    loadDivisi();

    window.addEventListener('scroll', () => {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 200) {
            loadDivisi();
        }
    });
</script>


@endsection