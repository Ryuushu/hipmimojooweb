<x-app-layout>
    <div class="container">
        <h2>Edit Data Why Join HIPMI</h2>
        <form action="{{ route('kenapa.update', $kenapa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $kenapa->title }}" required>
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required>{{ $kenapa->deskripsi }}</textarea>
                @error('deskripsi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Update</button>
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