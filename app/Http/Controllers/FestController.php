<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Fest;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
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
        // dd($request->all());

        $validatedData = $request->validate([
            'nama_fest' => 'required|string|max:255',
            'deskripsi_fest' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'jadwal_fest' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'rangkaian_acara' => 'required|string',
        ]);
        if ($request->hasFile('thumbnail')) {
            $manager = new ImageManager(new Driver());
            $file = $request->file('thumbnail');
            $fileName = uniqid() . '_' . time() . '.webp';
            $imagePath = public_path('assets/uploadimg/fest/' . $fileName);
            $img = $manager->read($file)
                ->scale(width: 800)
                ->toWebp(60);
            $img->save($imagePath);
            $imagePath = "assets/uploadimg/fest/" . $fileName;
            $imageName = $imagePath;
            $validatedData['thumbnail'] = $imageName;
        }
        Fest::create([
            'thumbnail' => $validatedData['thumbnail'],
            'nama_fest' => $validatedData['nama_fest'],
            'deskripsi_fest' => $validatedData['deskripsi_fest'],
            'jadwal_fest' => $validatedData['jadwal_fest'],
            'lokasi' => $validatedData['lokasi'],
            'rangkaian_acara' => $validatedData['rangkaian_acara'],
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
        $validatedData = $request->validate([
            'nama_fest' => 'required|string|max:255',
            'deskripsi_fest' => 'required|string',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'jadwal_fest' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'rangkaian_acara' => 'required|string',
        ]);
        $festival = Fest::findOrFail($id);
        if ($request->hasFile('thumbnail')) {
            $manager = new ImageManager(new Driver());
            $file = $request->file('thumbnail');
            // $oldPath = public_path($anggotaPengurus->img);
            if ($festival->thumbnail && file_exists(public_path( $festival->thumbnail))) {
                unlink(public_path( $festival->thumbnail));
            }
            // Simpan file baru dengan nama unik
            $fileName = uniqid() . '_' . time() . '.webp';
            $imagePath = public_path('assets/uploadimg/fest/' . $fileName);
            $img = $manager->read($file)
                ->scale(width: 800)
                ->toWebp(60);
            $img->save($imagePath);
            // Hapus gambar lama jika ada
            // if ($festival->thumbnail && file_exists(public_path('assets/uploadimg/fest/' . $festival->thumbnail))) {
            //     unlink(public_path('assets/uploadimg/fest/' . $festival->thumbnail));
            // }
            // $image = $request->file('thumbnail');
            // $imageName = time() . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path('assets/uploadimg/fest/'), $imageName);
            // $imagePath = "assets/uploadimg/pengurus/" . $fileName;
            $validatedData['thumbnail'] = "assets/uploadimg/fest/" . $fileName;
        }
        $festival->update($validatedData);
        return redirect()->route('festad.index')->with('success', 'Festival berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $fest = Fest::findOrFail($id);
        if ($fest->thumbnail && file_exists(public_path($fest->thumbnail))) {
            unlink(public_path( $fest->thumbnail));
        }

        $fest->delete();
        return redirect()->route('festad.index')->with('success', 'Festival berhasil dihapus.');
    }
}
