<x-app-layout>
    <div class="container">
        <h2>Tambah Festival</h2>
        <form action="{{ route('festad.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Festival</label>
                <input type="text" name="nama_fest" class="form-control" value="{{ old('nama_fest') }}" required>
                @error('nama_fest')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Jadwal Festival</label>
                <input type="text" name="jadwal_fest" class="form-control" value="{{ old('jadwal_fest') }}" required>
                @error('jadwal_fest')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" required>
                @error('lokasi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Rangkaian Acara</label>
                <textarea name="rangkaian_acara" id="rangkaian_acara" class="form-control">{{ old('rangkaian_acara') }}</textarea>
                @error('rangkaian_acara')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('festad.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    @section('scripts')
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> -->
    <script>
        let editorInstance; // Simpan editor di variabel global

        ClassicEditor.create(document.querySelector('#rangkaian_acara'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });

        document.querySelector("form").addEventListener("submit", function(event) {
            // Ambil data dari CKEditor dan simpan ke textarea sebelum submit
            document.querySelector("#rangkaian_acara").value = editorInstance.getData();

            // Cek jika kosong
            if (!editorInstance.getData().trim()) {
                alert("Rangkaian Acara harus diisi!");
                event.preventDefault(); // Hentikan submit jika kosong
            }
        });
    </script>
    @endsection
</x-app-layout>
