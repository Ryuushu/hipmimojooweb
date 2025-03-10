<x-app-layout>
    <div class="container">
        <h2>Tambah Kategori Berita</h2>
        <form action="{{ route('kategori-berita.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" required>
                @error('nama_kategori')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('kategori-berita.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>