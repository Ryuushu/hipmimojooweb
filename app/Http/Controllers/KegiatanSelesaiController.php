<?php

namespace App\Http\Controllers;

use App\Models\KegiatanSelesai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class KegiatanSelesaiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = KegiatanSelesai::latest()->get();
            return DataTables::of($data)
                ->addColumn('aksi', function ($item) {
                    return '<a href="' . route('kegiatan-selesai.edit', $item->id) . '" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="' . $item->id . '">Hapus</button>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('pages.admin.kegiatan_selesai.index');
    }


    public function create()
    {
        return view('pages.admin.kegiatan_selesai.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'url' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploadimg/kegiatan_selesai'), $imageName);
            $validatedData['img'] = $imageName;
        }

        KegiatanSelesai::create($validatedData);

        return redirect()->route('kegiatan-selesai.index')->with('success', 'Data berhasil ditambahkan');
    }
    public function edit(KegiatanSelesai $kegiatan_selesai)
    {
        return view('pages.admin.kegiatan_selesai.edit', compact('kegiatan_selesai'));
    }

    public function update(Request $request, KegiatanSelesai $kegiatan_selesai)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'url' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        // Cek apakah ada gambar baru yang diunggah
        if ($request->hasFile('img')) {
            // Hapus gambar lama jika ada
            if ($kegiatan_selesai->img && file_exists(public_path('assets/uploadimg/kegiatan_selesai/' . $kegiatan_selesai->img))) {
                unlink(public_path('assets/uploadimg/kegiatan_selesai/' . $kegiatan_selesai->img));
            }

            // Simpan gambar baru
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploadimg/kegiatan_selesai/'), $imageName);

            // Tambahkan nama gambar ke data yang akan diperbarui
            $validatedData['img'] = $imageName;
        }

        // Perbarui data
        $kegiatan_selesai->update($validatedData);

        return redirect()->route('kegiatan-selesai.index')->with('success', 'Data berhasil diperbarui');
    }


    public function destroy(KegiatanSelesai $kegiatan_selesai)
    {
        // Hapus gambar jika ada
        if ($kegiatan_selesai->img && file_exists(public_path('assets/uploadimg/kegiatan_selesai/' . $kegiatan_selesai->img))) {
            unlink(public_path('assets/uploadimg/kegiatan_selesai/' . $kegiatan_selesai->img));
        }

        // Hapus data dari database
        $kegiatan_selesai->delete();

        return redirect()->route('kegiatan-selesai.index')->with('success', 'Data berhasil dihapus');
    }
}
