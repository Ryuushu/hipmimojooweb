<x-app-layout>
    <div class="container">
        <h2>Tambah Data Divisi</h2>
        <form action="{{ route('divisi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="bidang" class="form-label">Bidang</label>
                <input type="text" class="form-control" id="bidang" name="bidang" required>
            </div>
            <div class="mb-3">
                <label for="nama_devisi" class="form-label">Nama Devisi</label>
                <input type="text" class="form-control" id="nama_devisi" name="nama_devisi" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('divisi.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        </form>
    </div>
</x-app-layout>