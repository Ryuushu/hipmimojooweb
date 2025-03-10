<x-app-layout>
<div class="container">
    <h2>Tambah Berita</h2>
    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" accept="image/*" required>
            @error('thumbnail')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Kontent</label>
            <textarea name="kontent" id="kontent" class="form-control @error('kontent') is-invalid @enderror">{{ old('kontent') }}</textarea>
            @error('kontent')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 col-md-2">
            <label>Date</label>
            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" required value="{{ old('date') }}">
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

    @section('scripts')
    <script>
        ClassicEditor.create(document.querySelector('#kontent'));
    </script>
    @endsection
</x-app-layout>
