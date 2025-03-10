<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
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
        return view('pages.sejarah', compact( 'data'));
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
        return view('pages.pengurus', compact( 'data', "divisi"));
    }

    public function beritakegiatan()
    {
        $data = Beranda::latest()->first();

        $newsList = Berita::with('kategori')->latest()->get();
        $latestNews = Berita::with('kategori')->latest()->limit(1)->first();
        // dd($latestNews);
        $events = Kegiatan::limit(5)->latest()->get();
        return view('pages.britadankegiatan', compact('newsList', 'latestNews', 'events', 'data'));
    }
    public function berita($id)
    {
        $data = Beranda::latest()->first();
        $berita = Berita::with('kategori')->where('id', $id)->first();
        $beritalain = Berita::latest()->limit(5)->get();
        return view('pages.detailberita', compact('data', 'berita', 'beritalain'));
    }
    public function kegiatan($id)
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
    public function detailfest($id)
    {
        $data = Beranda::latest()->first();
        $fest = Fest::where('id', $id)->first();
        return view('pages.detailfest', compact('data', 'fest'));
    }
}
