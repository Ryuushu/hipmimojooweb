<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proker;
use App\Models\Devisi;
use Yajra\DataTables\Facades\DataTables;

class ProkerController extends Controller
{
    public function index()
    {
        $proker = Proker::with('devisi')->get();
        return view('proker.index', compact('proker'));
    }
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Proker::where('devisi_id', $id)->with('devisi')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($id) {
                    $btn = '<a href="' . route('proker.edit', ['id' => $id, 'proker' => $row->id]) . '" class="btn btn-primary btn-sm m-1">Edit</a>';
                    $btn .= ' <form action="' . route('proker.destroy', $row->id) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . method_field("DELETE") . '
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\')">Hapus</button>
                    </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.admin.proker.index', compact('id'));
    }
    public function create($id)
    {
        return view('pages.admin.proker.create', compact('id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'devisi_id' => 'required',
            'ajuan_proker' => 'required',
            'rencana_pelaksanaan' => 'required',
            'progress' => 'required',
            'monitoring_evaluasi' => 'required'
        ]);

        Proker::create($request->all());
        return redirect()->route('divisi.index')->with('success', 'Proker berhasil ditambahkan.');
    }

    public function edit($id, Proker $proker)
    {
        return view('pages.admin.proker.edit', compact('proker', 'id'));
    }

    public function update(Request $request, Proker $proker)
    {
        $request->validate([
            'devisi_id' => 'required',
            'ajuan_proker' => 'required',
            'rencana_pelaksanaan' => 'required',
            'progress' => 'required',
            'monitoring_evaluasi' => 'required'
        ]);

        $proker->update($request->all());
        return redirect()->route('divisi.index')->with('success', 'Proker berhasil diperbarui.');
    }

    public function destroy(Proker $proker)
    {
        $proker->delete();
        return redirect()->route('divisi.index')->with('success', 'Proker berhasil dihapus.');
    }
}
