<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Divisi;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DivisiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Divisi::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('divisi.edit', $row->id) . '" class="btn btn-primary btn-sm m-1">Edit</a>';
                    $btn .= ' <form action="' . route('divisi.destroy', $row->id) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\')">Hapus</button>
                        </form>';
                    $btn .= '<a href="' . route('anggota-pengurus.index', $row->id) . '" class="btn btn-success btn-sm m-1">Anggota Pengurus</a>';
                    $btn .= '<a href="' . route('proker.index', $row->id) . '" class="btn btn-info text-light btn-sm m-1">Proker</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.divisi.index');
    }

    public function store(Request $request)
    {
        $request->validate(['bidang' => 'required', 'nama_devisi' => 'required']);
        Divisi::create($request->all());
        return redirect()->route('divisi.index')->with('success', 'Devisi berhasil ditambahkan.');
    }

    public function create()
    {
        return view('pages.admin.divisi.create');
    }
    public function edit(Divisi $divisi)
    {
        return view('pages.admin.divisi.edit', compact('divisi'));
    }

    public function update(Request $request, Divisi $divisi)
    {
        $request->validate(['bidang' => 'required', 'nama_devisi' => 'required']);
        $divisi->update($request->all());
        return redirect()->route('divisi.index')->with('success', 'Devisi berhasil diperbarui.');
    }
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        return redirect()->route('divisi.index')->with('success', 'Devisi berhasil dihapus.');
    }
}
