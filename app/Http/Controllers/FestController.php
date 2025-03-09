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
        $request->validate([
            'nama_fest' => 'required|string|max:255',
            'deskripsi_fest' => 'required|string',
            'jadwal_fest' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'rangkaian_acara' => 'required|string',
        ]);

        Fest::create([
            'nama_fest' => $request->nama_fest,
            'deskripsi_fest' => $request->deskripsi_fest,
            'jadwal_fest' => $request->jadwal_fest,
            'lokasi' => $request->lokasi,
            'rangkaian_acara' => $request->rangkaian_acara,
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
        $request->validate([
            'nama_fest' => 'required|string|max:255',
            'deskripsi_fest' => 'required|string',
            'jadwal_fest' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'rangkaian_acara' => 'required|string',
        ]);

        $festival = Fest::findOrFail($id);
        $festival->update([
            'nama_fest' => $request->nama_fest,
            'deskripsi_fest' => $request->deskripsi_fest,
            'jadwal_fest' => $request->jadwal_fest,
            'lokasi' => $request->lokasi,
            'rangkaian_acara' => $request->rangkaian_acara,
        ]);

        return redirect()->route('festad.index')->with('success', 'Festival berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $fest = Fest::findOrFail($id);
        $fest->delete();
        return redirect()->route('festad.index')->with('success', 'Festival berhasil dihapus.');
    }
}
