<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaPengurus;
use App\Models\Devisi;
use Yajra\DataTables\Facades\DataTables;

class AnggotaPengurusController extends Controller
{
    public function index()
    {
        $anggota = AnggotaPengurus::with('devisi')->get();
        return view('pages.admin.anggotapengurus.index', compact('anggota'));
    }
    public function show(Request $request,$id)
    {
        if ($request->ajax()) {
            $data = AnggotaPengurus::where('devisi_id',$id)->with('devisi')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('divisi.edit', $row->id) . '" class="btn btn-primary btn-sm m-1">Edit</a>';
                    $btn .= ' <form action="' . route('divisi.destroy', $row->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\')">Hapus</button>
                        </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
       
        return view('pages.admin.anggotapengurus.index', compact('id',));
    }

    public function create()
    {
        $devisi = AnggotaPengurus::all();
        return view('pages.admin.anggotapengurus.create', compact('devisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'devisi_id' => 'required',
            'nama_anggota' => 'required',
            'jabatan' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $imageName);
        } else {
            $imageName = null;
        }

        AnggotaPengurus::create([
            'devisi_id' => $request->devisi_id,
            'nama_anggota' => $request->nama_anggota,
            'jabatan' => $request->jabatan,
            'img' => $imageName
        ]);

        return redirect()->route('anggota-pengurus.index')->with('success', 'Anggota Pengurus berhasil ditambahkan.');
    }

    public function edit(AnggotaPengurus $anggotaPengurus)
    {
        $devisi = AnggotaPengurus::all();
        return view('anggota-pengurus.edit', compact('anggotaPengurus', 'devisi'));
    }

    public function update(Request $request, AnggotaPengurus $anggotaPengurus)
    {
        $request->validate([
            'devisi_id' => 'required',
            'nama_anggota' => 'required',
            'jabatan' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $imageName);
        } else {
            $imageName = $anggotaPengurus->img;
        }

        $anggotaPengurus->update([
            'devisi_id' => $request->devisi_id,
            'nama_anggota' => $request->nama_anggota,
            'jabatan' => $request->jabatan,
            'img' => $imageName
        ]);

        return redirect()->route('anggota-pengurus.index')->with('success', 'Anggota Pengurus berhasil diperbarui.');
    }

    public function destroy(AnggotaPengurus $anggotaPengurus)
    {
        if ($anggotaPengurus->img) {
            unlink(public_path('uploads/' . $anggotaPengurus->img));
        }
        $anggotaPengurus->delete();
        return redirect()->route('anggota-pengurus.index')->with('success', 'Anggota Pengurus berhasil dihapus.');
    }
}
