<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
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
            $manager = new ImageManager(new Driver());
            $file = $request->file('thumbnail');
            $fileName = uniqid() . '_' . time() . '.webp';
            $imagePath = public_path('assets/uploadimg/berita/' . $fileName);
            $img = $manager->read($file)
                ->scale(width: 800)
                ->toWebp(60);
            $img->save($imagePath);
            $imagePath = "assets/uploadimg/berita/" . $fileName;
            $imageName = $imagePath;
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
            $manager = new ImageManager(new Driver());
            $file = $request->file('thumbnail');
            if ($berita->thumbnail && file_exists(public_path( $berita->thumbnail))) {
                unlink(public_path($berita->thumbnail));
            }
            $fileName = uniqid() . '_' . time() . '.webp';
            $imagePath = public_path('assets/uploadimg/berita/' . $fileName);
            $img = $manager->read($file)
                ->scale(width: 800)
                ->toWebp(60);
            $img->save($imagePath);
            $imageName = "assets/uploadimg/berita/" . $fileName;
            $validatedData['thumbnail'] = $imageName;
        }
       
        $berita->update($validatedData);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->thumbnail && file_exists(public_path( $berita->thumbnail))) {
            unlink(public_path( $berita->thumbnail));
        }

        // Hapus data dari database
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}

