<x-app-layout>
    <div class="container">
        <h2>Edit Data Anggota  </h2>
        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="img" class="form-control">
                <img src="{{ url(asset('assets/uploadimg/anggota/'.$anggota->img ))}}  " width="100" class="mt-2">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</x-app-layout>