<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnggotaPengurus;
use App\Models\Devisi;
use App\Models\Divisi;
use Yajra\DataTables\Facades\DataTables;

class AnggotaPengurusController extends Controller
{
    public function index($id)
    {
        $anggota = AnggotaPengurus::where('devisi_id', $id)->with('devisi')->orderBy("id", "desc")->get();
        if (request()->ajax()) {
            return DataTables::of($anggota)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($id) {
                    $btn = '<a href="' . route('anggota-pengurus.edit', [$id, $row->id]) . '" class="btn btn-primary btn-sm m-1">Edit</a>';
                    $btn .= ' <form action="' . route('anggota-pengurus.destroy', [$id, $row->id]) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\')">Hapus</button>
                        </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.anggotapengurus.index', compact('anggota', 'id'));
    }
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = AnggotaPengurus::where('devisi_id', $id)->with('devisi')->get();

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

    public function create($id)
    {
        $divisi = Divisi::all();
        return view('pages.admin.anggotapengurus.create', compact('divisi', "id"));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nama_anggota' => 'required',
            'jabatan' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path(path: 'assets/uploadimg/pengurus'), $imageName);
        } else {
            $imageName = null;
        }

        AnggotaPengurus::create([
            'devisi_id' => $id,
            'nama_anggota' => $request->nama_anggota,
            'jabatan' => $request->jabatan,
            'img' => $imageName
        ]);

        return redirect()->route('anggota-pengurus.index', $id)->with('success', 'Anggota Pengurus berhasil ditambahkan.');
    }

    public function edit($id, $idPengurus)
    {
        $pengurus = AnggotaPengurus::find($idPengurus);
        return view('pages.admin.anggotapengurus.edit', compact('pengurus', 'idPengurus', 'id'));
    }

    public function update(Request $request, $id, $idPengurus)
    {
        $request->validate([
            'nama_anggota' => 'required',
            'jabatan' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $anggotaPengurus = AnggotaPengurus::find($idPengurus);
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path(path: 'assets/uploadimg/pengurus'), $imageName);
            $oldPath = public_path("assets/uploadimg/pengurus") . $anggotaPengurus->img;
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        } else {
            $imageName = $anggotaPengurus->img;
        }

        $anggotaPengurus->update([
            'nama_anggota' => $request->nama_anggota,
            'jabatan' => $request->jabatan,
            'img' => $imageName
        ]);

        return redirect()->route('anggota-pengurus.index', $id)->with('success', 'Anggota Pengurus berhasil diperbarui.');
    }

    public function destroy($id, $idPengurus)
    {
        $anggotaPengurus = AnggotaPengurus::find($idPengurus);
        $oldPath = public_path("assets/uploadimg/pengurus") . $anggotaPengurus->img;
        if (file_exists($oldPath)) {
            unlink($oldPath);
        }
        $anggotaPengurus->delete();
        return redirect()->route('anggota-pengurus.index', $id)->with('success', 'Anggota Pengurus berhasil dihapus.');
    }
}
