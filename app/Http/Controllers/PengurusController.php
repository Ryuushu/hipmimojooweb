<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengurusController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pengurus::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('pengurus.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <form action="' . route('pengurus.destroy', $row->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\')">Hapus</button>
                        </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.pengurus.index');
    }

    public function create()
    {
        return view('pages.admin.pengurus.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploadimg/pengurus'), $imageName);
            $validatedData['thumbnail'] = $imageName;
        }

        Pengurus::create($validatedData);
        return redirect()->route('pengurus.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengurus = Pengurus::where("id", $id)->first();
        return view('pages.admin.pengurus.edit', compact('pengurus'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
        $pengurus = Pengurus::findOrFail($id);

        // Cek apakah ada gambar baru yang diunggah
        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama jika ada
            if ($pengurus->thumbnail && file_exists(public_path('assets/uploadimg/pengurus/' . $pengurus->thumbnail))) {
                unlink(public_path('assets/uploadimg/pengurus/' . $pengurus->thumbnail));
            }

            // Simpan gambar baru
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploadimg/pengurus/'), $imageName);

            // Tambahkan nama gambar ke data yang akan diperbarui
            $validatedData['thumbnail'] = $imageName;
        }

        // Perbarui data
        $pengurus->update($validatedData);
        return redirect()->route('pengurus.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        if ($pengurus->thumbnail && file_exists(public_path('assets/uploadimg/pengurus/' . $pengurus->thumbnail))) {
            unlink(public_path('assets/uploadimg/pengurus/' . $pengurus->thumbnail));
        }
        $pengurus->delete();
        return redirect()->route('pengurus.index')->with('success', 'pengurus berhasil dihapus.');
    }
}
