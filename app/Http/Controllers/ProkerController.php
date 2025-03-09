<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proker;
use App\Models\Devisi;
use Yajra\DataTables\Facades\DataTables;

class ProkerController extends Controller
{
    public function index($id)
    {

        $proker = Proker::where('devisi_id', $id)->orderBy("id", "desc")->with('devisi')->get();
        if (request()->ajax()) {

            return DataTables::of($proker)
                ->addIndexColumn()
                ->addColumn('action', function ($row) use ($id) {
                    $btn = '<a href="' . route('proker.edit', [$id, $row->id]) . '" class="btn btn-primary btn-sm m-1">Edit</a>';
                    $btn .= ' <form action="' . route('proker.destroy', [$id, $row->id]) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . method_field("DELETE") . '
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\')">Hapus</button>
                    </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.proker.index', compact('proker', 'id'));
    }
    public function show(Request $request, $id)
    {


        return view('pages.admin.proker.index', compact('id'));
    }
    public function create($id)
    {
        return view('pages.admin.proker.create', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'ajuan_proker' => 'required',
            'rencana_pelaksanaan' => 'required',
            'progress' => 'required',
            'monitoring_evaluasi' => 'required'
        ]);
        $data = [...$request->all(), "devisi_id" => $id];
        Proker::create($data);
        return redirect()->route('proker.index', $id)->with('success', 'Proker berhasil ditambahkan.');
    }

    public function edit($id, Proker $proker)
    {
        return view('pages.admin.proker.edit', compact('proker', 'id'));
    }

    public function update(Request $request,  $id, $idProker)
    {
        $request->validate([
            'ajuan_proker' => 'required',
            'rencana_pelaksanaan' => 'required',
            'progress' => 'required',
            'monitoring_evaluasi' => 'required'
        ]);
        $proker = Proker::find($idProker);
        $data = [...$request->all(), "devisi_id" => $id];
        $proker->update($data);
        return redirect()->route('proker.index', $id)->with('success', 'Proker berhasil diperbarui.');
    }

    public function destroy($id, $idProker)
    {
        $proker = Proker::find($idProker);
        $proker->delete();
        return redirect()->route('proker.index', $id)->with('success', 'Proker berhasil dihapus.');
    }
}
