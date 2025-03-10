<x-app-layout>
    <div class="container">
        <h2>Edit Jadwal Event HIPMI</h2>
        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" value="{{ $kegiatan->title }}" class="form-control" required>
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" id="editor" class="form-control">{{ $kegiatan->deskripsi }}</textarea>
                @error('deskripsi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" name="date" value="{{ $kegiatan->date }}" class="form-control" required>
                @error('date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Waktu</label>
                <input type="time" name="jadwal" value="{{ $kegiatan->jadwal }}" class="form-control" required>
                @error('jadwal')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label>Lokasi</label>
                <input type="text" name="lokasi" value="{{ $kegiatan->lokasi }}" class="form-control" required>
                @error('lokasi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>


    @section('scripts')
    <script>
        CKEDITOR.replace('editor');
    </script>
    @endsection

</x-app-layout>