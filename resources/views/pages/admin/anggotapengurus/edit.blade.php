<x-app-layout>
    <div class="container">

        <h2>Edit Data Pengurus</h2>
        <form action="{{ route('anggota-pengurus.update',[$id,$idPengurus]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label class="form-label">Thumbnail</label>
                <input type="file" name="img" value="{{ old("img") }}" class="form-control" accept="image/*">
                @error("img")
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" value="{{ old("nama_anggota",$pengurus->nama_anggota) }}" name="nama_anggota" class="form-control" required>
                @error("nama_anggota")
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <input type="text" value="{{ old("jabatan",$pengurus->jabatan) }}" name="jabatan" class="form-control" required>
                @error("jabatan")
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tingkatan</label>
                <select name="tingkatan" class="form-control" id="">
                    <option value="">Pilih tingkatan</option>
                    <option value="1" {{old("tingkatan",$pengurus->tingkatan)==1?"selected":""}}>1</option>
                    <option value="2" {{old("tingkatan",$pengurus->tingkatan)==2?"selected":""}}>2</option>
                    <option value="3" {{old("tingkatan",$pengurus->tingkatan)==3?"selected":""}}>3</option>
                    <option value="4" {{old("tingkatan",$pengurus->tingkatan)==4?"selected":""}}>4</option>
                    <option value="5" {{old("tingkatan",$pengurus->tingkatan)==5?"selected":""}}>5</option>
                </select>
                @error("tingkatan")
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
