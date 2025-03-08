<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = Kegiatan::latest()->get();
          
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'.route('kegiatan.edit', $row->id).'" class="btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <form action="'.route('kegiatan.destroy', $row->id).'" method="POST" style="display:inline;">
                        '.csrf_field().method_field("DELETE").'
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\')">Hapus</button>
                        </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.admin.kegiatan.index');
    }

    public function create()
    {
        return view('pages.admin.kegiatan.create');
    }

    public function store(Request $request)
    {
        $validatedata = $request->validate([
            'title' => 'required',
            'deskripsi' => 'required',
            'date' => 'required|date',
            'jadwal' => 'required',
            'lokasi' => 'required',
        ]);

        Kegiatan::create($validatedata);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('pages.admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'title' => 'required',
            'deskripsi' => 'required',
            'date' => 'required|date',
            'jadwal' => 'required',
            'lokasi' => 'required',
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
