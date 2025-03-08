<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Beranda;
use App\Models\Berita;
use App\Models\Kegiatan;
use App\Models\KegiatanSelesai;
use App\Models\Kenapa;
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
        return view('pages.beranda', compact('data', 'why', 'berita', 'kegiatan', 'kegiatansel','anggota'));
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

        $deskripsi_sejarah = Beranda::latest()->first(['deskripsi_sejarah']);

        return view('pages.sejarah', compact('deskripsi_sejarah', 'data'));
    }
    public function kontak()
    {
        $data = Beranda::latest()->first();

        return view('pages.kontak', compact('data'));
    }


    public function organisasi()
    {
        $data = Beranda::latest()->first();

        $deskripsi_kepengurusan = Beranda::latest()->first(['deskripsi_kepengurusan']);
        return view('pages.pengurus', compact("deskripsi_kepengurusan", 'data'));
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
        $berita = Berita::with('kategori')->where('id',$id)->first();
        $beritalain = Berita::latest()->limit(5)->get();
        return view('pages.detailberita', compact( 'data','berita','beritalain'));
    }
    public function kegiatan($id)
    {
        $data = Beranda::latest()->first();
        $kegiatan = Kegiatan::where('id',$id)->first();
        $kegiatanlain = Kegiatan::latest()->limit(5)->get();
        return view('pages.detailkegiatan', compact( 'data','kegiatan','kegiatanlain'));
    }
    public function fest($id)
    {
        $data = Beranda::latest()->first();
        $kegiatan = Kegiatan::where('id',$id)->first();
        $kegiatanlain = Kegiatan::latest()->limit(5)->get();
        return view('pages.detailkegiatan', compact( 'data','kegiatan','kegiatanlain'));
    }
}
