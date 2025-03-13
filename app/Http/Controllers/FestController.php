<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Fest;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FestController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Fest::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('festad.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <form action="' . route('festad.destroy', $row->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\')">Hapus</button>
                        </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.fest.index');
    }

    public function create()
    {
        return view('pages.admin.fest.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'nama_fest' => 'required|string|max:255',
            'deskripsi_fest' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'jadwal_fest' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'rangkaian_acara' => 'required|string',
        ]);
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploadimg/fest/'), $imageName);
            $validatedData['thumbnail'] = $imageName;
        }
        Fest::create([
            'thumbnail' => $validatedData['thumbnail'],
            'nama_fest' => $validatedData['nama_fest'],
            'deskripsi_fest' => $validatedData['deskripsi_fest'],
            'jadwal_fest' => $validatedData['jadwal_fest'],
            'lokasi' => $validatedData['lokasi'],
            'rangkaian_acara' => $validatedData['rangkaian_acara'],
        ]);

        return redirect()->route('festad.index')->with('success', 'Festival berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $fest = Fest::where("id", $id)->first();
        return view('pages.admin.fest.edit', compact('fest'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_fest' => 'required|string|max:255',
            'deskripsi_fest' => 'required|string',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'jadwal_fest' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'rangkaian_acara' => 'required|string',
        ]);
        $festival = Fest::findOrFail($id);
        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama jika ada
            if ($festival->thumbnail && file_exists(public_path('assets/uploadimg/fest/' . $festival->thumbnail))) {
                unlink(public_path('assets/uploadimg/fest/' . $festival->thumbnail));
            }
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploadimg/fest/'), $imageName);
            $validatedData['thumbnail'] = $imageName;
        }
        $festival->update($validatedData);
        return redirect()->route('festad.index')->with('success', 'Festival berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $fest = Fest::findOrFail($id);
        if ($fest->thumbnail && file_exists(public_path('assets/uploadimg/fest/' . $fest->thumbnail))) {
            unlink(public_path('assets/uploadimg/fest/' . $fest->thumbnail));
        }

        $fest->delete();
        return redirect()->route('festad.index')->with('success', 'Festival berhasil dihapus.');
    }
}
