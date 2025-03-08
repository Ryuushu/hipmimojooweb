<x-app-layout>
    <div class="container">
        <h2>Edit Kategori Berita</h2>
        <form action="{{ route('kategori-berita.update', $kategoriBerita->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" value="{{ $kategoriBerita->nama_kategori }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kategori-berita.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</x-app-layout>