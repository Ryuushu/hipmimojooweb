<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\AnggotaPengurus;
use App\Models\Beranda;
use App\Models\Berita;
use App\Models\Divisi;
use App\Models\Fest;
use App\Models\Kegiatan;
use App\Models\KegiatanSelesai;
use App\Models\Kenapa;
use App\Models\Proker;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    public function index()
    {
        $data = Beranda::latest()->first();
        $why = Kenapa::get();
        $berita = Berita::with('kategori')->limit(5)->latest()->get();
        $anggota = Anggota::get();
        $kegiatan = Kegiatan::limit(5)->latest()->get();
        $kegiatansel = KegiatanSelesai::limit(3)->latest()->get();
        return view('pages.beranda', compact('data', 'why', 'berita', 'kegiatan', 'kegiatansel', 'anggota'));
    }
    public function tentang()
    {
        $data = Beranda::latest()->first();
        $why = Kenapa::get();
        return view('pages.tentangkami', compact('data', 'why'));
    }
    public function sejarah()
    {
        $data = Beranda::latest()->first();
        return view('pages.sejarah', compact('data'));
    }
    public function kontak()
    {
        $data = Beranda::latest()->first();

        return view('pages.kontak', compact('data'));
    }


    public function organisasi()
    {

        $data = Beranda::latest()->first();
        $divisi = Divisi::get();
        return view('pages.pengurus', compact('data', "divisi"));
    }
    public function apiDivisi(Request $request)
    {
        $perPage = 1;
        $page = $request->input('page', 1);

        $divisi = Divisi::with(['anggotaPengurus' => function ($q) {
            $q->orderBy('tingkatan');
        }])->paginate($perPage, ['*'], 'page', $page);

        $result = $divisi->getCollection()->map(function ($d) {
            $tingkatan = [];

            for ($i = 1; $i <= 5; $i++) {
                $tingkatan[] = $d->anggotaPengurus->where('tingkatan', $i)->values();
            }

            return [
                'id' => $d->id,
                'bidang' => $d->bidang,
                'nama_devisi' => $d->nama_devisi,
                'tingkatan' => $tingkatan,
            ];
        });

        return Response::json([
            'data' => $result,
            'next_page_url' => $divisi->nextPageUrl(),
        ]);
    }


    public function beritakegiatan()
    {
        $data = Beranda::latest()->first();

        $newsList = Berita::with('kategori')->orderBy("created_at", "DESC")->paginate(8);
        $newsList4 = Berita::with('kategori')->limit(5)->orderBy("created_at", "DESC")->get();
        $newsList4->shift();
        $latestNews = Berita::with('kategori')->latest()->limit(1)->first();
        // dd($latestNews);
        $events = Kegiatan::limit(5)->latest()->get();
        return view('pages.britadankegiatan', compact('newsList', 'latestNews', 'events', 'data', 'newsList4'));
    }
    public function berita($id, $slug)
    {
        $data = Beranda::latest()->first();
        $berita = Berita::with('kategori')->where('id', $id)->firstOrFail();
        $beritalain = Berita::latest()->limit(5)->get();

        return view('pages.detailberita', compact('data', 'berita', 'beritalain'));
    }
    public function kegiatan($id, $slug)
    {
        $data = Beranda::latest()->first();
        $kegiatan = Kegiatan::where('id', $id)->first();
        $kegiatanlain = Kegiatan::latest()->limit(5)->get();
        return view('pages.detailkegiatan', compact('data', 'kegiatan', 'kegiatanlain'));
    }
    public function fest()
    {
        $data = Beranda::latest()->first();
        $events = Fest::limit(5)->latest()->get();
        return view('pages.fest', compact('events', 'data'));
    }
    public function proker()
    {
        $data = Beranda::latest()->first();
        $datapro = Proker::with('devisi')->get();
        $groupedData = [];

        foreach ($datapro as $item) {
            $nama_devisi = $item->devisi->nama_devisi ?? 'Tanpa Devisi';
            $groupedData[$nama_devisi][] = [
                'ajuan_proker' => $item->ajuan_proker,
                'rencana_pelaksanaan' => $item->rencana_pelaksanaan,
                'progress' => $item->progress,
                'monitoring_evaluasi' => $item->monitoring_evaluasi
            ];
        }
        return view('pages.proker', compact('groupedData', 'data'));
    }
    public function detailfest($id, $slug)
    {
        $data = Beranda::latest()->first();
        $fest = Fest::where('id', $id)->first();
        $events = Fest::limit(5)->latest()->get();
        return view('pages.detailfest', compact('data', 'fest', 'events'));
    }
}
