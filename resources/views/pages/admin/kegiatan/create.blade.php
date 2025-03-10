<x-app-layout>
    <div class="container">
        <h2>Tambah Jadwal Event HIPMI</h2>
        <form action="{{ route('kegiatan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" id="editor" class="form-control"></textarea>
                @error('deskripsi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" required>
                @error('lokasi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="mb-3">
                        <label>Tanggal</label>
                        <input type="date" name="date" class="form-control" required>
                        @error('date')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label>Jadwal</label>
                        <input type="text" name="jadwal" class="form-control" required>
                        @error('jadwal')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>


    @section('scripts')
    <script>
        ClassicEditor.create(document.querySelector('#editor'));
    </script>
    @endsection

</x-app-layout>