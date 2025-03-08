<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FestController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Anggota::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('anggota.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <form action="' . route('anggota.destroy', $row->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\')">Hapus</button>
                        </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.anggota.index');
    }

    public function create()
    {
        return view('pages.admin.anggota.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploadimg/anggota'), $imageName);
            $validatedData['img'] = $imageName;
        }

        Anggota::create($validatedData);
        return redirect()->route('anggota.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $anggota = Anggota::where("id", $id)->first();
        return view('pages.admin.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
        $anggota = Anggota::findOrFail($id);
        if ($request->hasFile('img')) {
            if ($anggota->img && file_exists(public_path('assets/uploadimg/anggota/' . $anggota->img))) {
                unlink(public_path('assets/uploadimg/anggota/' . $anggota->img));
            }
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploadimg/anggota/'), $image);
            $validatedData['img'] = $imageName;
        }

        // Perbarui data
        $anggota->update($validatedData);
        return redirect()->route('anggota.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        if ($anggota->thumbnail && file_exists(public_path('assets/uploadimg/anggota/' . $anggota->img))) {
            unlink(public_path('assets/uploadimg/anggota/' . $anggota->img));
        }
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'pengurus berhasil dihapus.');
    }
}
