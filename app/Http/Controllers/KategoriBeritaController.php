<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriBeritaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = KategoriBerita::latest()->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('kategori-berita.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <form action="' . route('kategori-berita.destroy', $row->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\')">Hapus</button>
                        </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.admin.kategori_berita.index');
    }

    public function create()
    {
        return view('pages.admin.kategori_berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_beritas,nama_kategori',
        ]);

        KategoriBerita::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->route('kategori-berita.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategoriBerita = KategoriBerita::where("id", $id)->first();

        return view('pages.admin.kategori_berita.edit', compact('kategoriBerita'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriBerita::findOrFail($id);
        $kategori->update(['nama_kategori' => $request->nama_kategori]);

        return redirect()->route('kategori-berita.index')->with('success', 'Kategori diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = KategoriBerita::where("id", $id)->delete();
        return redirect()->route('kategori-berita.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
