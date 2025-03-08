<?php

namespace App\Http\Controllers;

use App\Models\Kenapa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KenapaController extends Controller
{
    public function index(Request $request)
    {
       
        if ($request->ajax()) {
            $data = Kenapa::latest()->get();
          
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'.route('kenapa.edit', $row->id).'" class="btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <form action="'.route('kenapa.destroy', $row->id).'" method="POST" style="display:inline;">
                        '.csrf_field().method_field("DELETE").'
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\')">Hapus</button>
                        </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.kenapa.index');
    }

    public function getData()
    {
        return DataTables::of(Kenapa::select(['id', 'title', 'deskripsi']))
            ->addColumn('aksi', function ($kenapa) {
                return '<a href="' . route('kenapa.edit', $kenapa->id) . '" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="' . $kenapa->id . '">Hapus</button>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        return view('pages.admin.kenapa.create');
    }

    public function store(Request $request)
    {
        Kenapa::create($request->all());
        return redirect()->route('kenapa.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Kenapa $kenapa)
    {
        return view('pages.admin.kenapa.edit', compact('kenapa'));
    }

    public function update(Request $request, Kenapa $kenapa)
    {
        $kenapa->update($request->all());
        return redirect()->route('kenapa.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Kenapa $kenapa)
    {
        $kenapa->delete();
        return redirect()->route('kenapa.index')->with('success', 'kenapa berhasil dihapus.');
    }
}
