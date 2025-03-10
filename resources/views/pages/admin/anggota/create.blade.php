<x-app-layout>
    <div class="container">
        <h2>Tambah Logo Anggota HIPMI</h2>
        <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="img" class="form-control" accept="image/*" required>
                @error('img')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>
