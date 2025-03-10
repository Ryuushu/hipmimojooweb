<x-app-layout>
    <div class="container">
        <h2>Edit Data Dokumentasi Event Selesai </h2>
        <form action="{{ route('kegiatan-selesai.update', $kegiatan_selesai->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="img" class="form-control" accept="image/*">
                <img src="{{ url(asset('assets/uploadimg/kegiatan_selesai/'.$kegiatan_selesai->img ))}}  " width="100" class="mt-2">
                @error('img')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $kegiatan_selesai->title }}" required>
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required>{{ $kegiatan_selesai->deskripsi }}</textarea>
                @error('deskripsi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Url</label>
                <input type="text" name="url" class="form-control" value="{{ $kegiatan_selesai->url }}" required>
                @error('url')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('kegiatan-selesai.index') }}" class="btn btn-secondary">Kembali</a>
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