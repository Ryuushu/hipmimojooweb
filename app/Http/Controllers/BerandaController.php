<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BerandaController extends Controller
{
    public function index()
    {
        return view('pages.admin.beranda.index');
    }

    public function getData()
    {
        $data = Beranda::get();
        return DataTables::of($data)
            ->addColumn('aksi', function ($item) {
                return '<a href="' . route('beranda.edit', $item->id) . '" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="' . $item->id . '">Hapus</button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        return view('pages.admin.beranda.create');
    }

    public function store(Request $request)
    {
        Beranda::create($request->all());
        return redirect()->route('pages.admin.beranda.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Beranda $beranda)
    {
        return view('pages.admin.beranda.edit', compact('beranda'));
    }

    public function update(Request $request, Beranda $beranda)
    {
        $beranda->update($request->all());
        return redirect()->route('pages.admin.beranda.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Beranda $beranda)
    {
        $beranda->delete();
        return response()->json(['success' => 'Data berhasil dihapus']);
    }
    public function createOrEdit()
    {
        $beranda = Beranda::first(); // Ambil data pertama jika ada
        return view('pages.admin.beranda.create', compact('beranda'));
    }

    public function storeOrUpdate(Request $request)
    {
        $data = $request->validate([
            'title_web' => 'required|string',
            'slogan' => 'required|string',
            'stat1' => 'nullable|string',
            'stat2' => 'nullable|string',
            'stat3' => 'nullable|string',
            'stat4' => 'nullable|string',
            'deskripsi_hipmi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'deskripsi_keanggotaan' => 'nullable|string',
            'deskripsi_sejarah' => 'nullable|string',
            'deskripsi_kepengurusan' => 'nullable|string',
            'deskripsi_tentang' => 'nullable|string',

        ]);

        $beranda = Beranda::first(); // Ambil data pertama jika ada
        if ($beranda) {
            $beranda->update($data);
        } else {
            Beranda::create($data);
        }

        return redirect()->route('beranda.form')->with('success', 'Data Beranda berhasil disimpan.');
    }
}
