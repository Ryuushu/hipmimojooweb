<x-app-layout>
    <div class="container">
        
        <h2>Edit Data Pengurus</h2>
        <form action="{{ route('pengurus.update', $pengurus->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control">
            <img src="{{ url(asset('assets/uploadimg/pengurus/'.$pengurus->thumbnail)) }}" class="mt-2" width="50" height="50">
        </div>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $pengurus->nama }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="{{ $pengurus->jabatan }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pengurus.index') }}" class="btn btn-secondary">Kembali</a>
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
