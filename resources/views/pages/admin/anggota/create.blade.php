<x-app-layout>
    <div class="container">
        <h2>Tambah Anggota</h2>
        <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="img" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    
    @section('scripts')
    <script>

    </script>
    @endsection
</x-app-layout>
