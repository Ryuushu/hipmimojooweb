<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        // return response(Berita::with("kategori")->latest()->get());
        if ($request->ajax()) {
            $data = Berita::latest()->get();
            // dd($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('kategori', function ($row) {
                    return $row->kategori ? $row->kategori->nama_kategori : '-';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="'.route('berita.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <form action="'.route('berita.destroy', $row->id).'" method="POST" style="display:inline;">
                        '.csrf_field().method_field("DELETE").'
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus?\')">Hapus</button>
                        </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.admin.berita.index');
    }

    public function create()
    {
        $kategori = KategoriBerita::get();
        return view('pages.admin.berita.create',compact('kategori'));
    }

    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
            'kontent' => 'required',
            'kategori_id'=>'required',
            'date' => 'required|date',
        ]);
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploadimg/berita/'), $imageName);
            $validatedData['thumbnail'] = $imageName;
        }

        Berita::create([
            'thumbnail' => $validatedData['thumbnail'],
            'title' => $validatedData['title'],
            'kontent' => $validatedData['kontent'],
            'kategori_berita_id' => $validatedData['kategori_id'],
            'date' => $validatedData['date'],
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = KategoriBerita::get();
        $berita = Berita::where("id", $id)->first();
        return view('pages.admin.berita.edit', compact('berita','kategori'));
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required',
            'kontent' => 'required',
            'kategori_berita_id'=>'required',
            'date' => 'required|date',
        ]);
        $berita = Berita::findOrFail($id);
        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama jika ada
            if ($berita->thumbnail && file_exists(public_path('assets/uploadimg/berita/' . $berita->thumbnail))) {
                unlink(public_path('assets/uploadimg/berita/' . $berita->thumbnail));
            }

            // Simpan gambar baru
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploadimg/berita/'), $imageName);

            // Tambahkan nama gambar ke data yang akan diperbarui
            $validatedData['thumbnail'] = $imageName;
        }
       
        $berita->update($validatedData);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->thumbnail && file_exists(public_path('assets/uploadimg/berita/' . $berita->thumbnail))) {
            unlink(public_path('assets/uploadimg/berita/' . $berita->thumbnail));
        }

        // Hapus data dari database
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}

