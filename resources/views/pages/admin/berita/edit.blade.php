<x-app-layout>
    <div class="container">
        <h2>Edit Berita</h2>
        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Thumbnail</label>
                <br>
                <img src="{{ url(asset('assets/uploadimg/berita/'.$berita->thumbnail)) }}" width="100" alt="Thumbnail">
                <input type="file" name="thumbnail" class="form-control mt-2" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                @error('thumbnail')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $berita->title }}" required>
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori_berita_id" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ $kat->id == old('kategori_berita_id', $berita->kategori_berita_id ?? '') ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                    @endforeach
                </select>
                @error('kategori_berita_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Kontent</label>
                <textarea name="kontent" id="kontent" class="form-control">{{ $berita->kontent }}</textarea>
                @error('kontent')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="{{ $berita->date }}" required>
                @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    @section('scripts')
    <script>
        ClassicEditor.create(document.querySelector('#kontent'));
    </script>
    @endsection

</x-app-layout>