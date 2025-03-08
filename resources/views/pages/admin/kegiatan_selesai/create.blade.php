<x-app-layout>
    <div class="container">
        <h2>Tambah Data Kegiatan Selesai</h2>
        <form action="{{ route('kegiatan-selesai.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="img" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="sds" class="form-control" style="display: block;" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Url</label>
                <input type="text" name="url" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('kegiatan-selesai.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    @section('scripts')
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script> -->
    <script>
        

        // ClassicEditor.create(document.querySelector('#sds'));
    </script>
    @endsection

</x-app-layout>