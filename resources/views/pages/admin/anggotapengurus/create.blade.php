<x-app-layout>
    <div class="container">
        <h2>Tambah Data Pengurus</h2>
        <form action="{{ route('anggota-pengurus.store',$id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <input type="file" name="img" value="{{ old("img") }}" class="form-control" accept="image/*" required>
                @error("img")
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" value="{{ old("nama_anggota") }}" name="nama_anggota" class="form-control" required>
                @error("nama_anggota")
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <input type="text" value="{{ old("jabatan") }}" name="jabatan" class="form-control" required>
                @error("jabatan")
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('anggota-pengurus.index',$id) }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    @section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#deskripsi_hipmi'));
        ClassicEditor.create(document.querySelector('#visi'));
        ClassicEditor.create(document.querySelector('#misi'));
        ClassicEditor.create(document.querySelector('#deskripsi_keanggotaan'));
        ClassicEditor.create(document.querySelector('#deskripsi_sejarah'));
        ClassicEditor.create(document.querySelector('#deskripsi_kepengurusan'));
    </script>
    @endsection

</x-app-layout>
