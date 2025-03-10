<x-app-layout>
    <div class="container">
        <h2>Tambah Data Why Join HIPMI</h2>
        <form action="{{ route('kenapa.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
                @error('deskripsi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('kenapa.index') }}" class="btn btn-secondary">Kembali</a>
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