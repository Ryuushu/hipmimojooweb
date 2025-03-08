<x-app-layout>
    <div class="container">
        <h2>Edit Data Anggota  </h2>
        <form action="{{ route('divisi.update', $divisi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_devisi" class="form-label">Nama Devisi</label>
                <input type="text" class="form-control" id="nama_devisi" name="nama_devisi" value="{{ old('nama_devisi', $divisi->nama_devisi) }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>