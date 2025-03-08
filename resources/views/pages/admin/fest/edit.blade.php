<x-app-layout>
    <div class="container">
        <h2>Edit Festival</h2>
        <form action="{{ route('festad.update', $fest->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Tambahkan metode PUT untuk update --}}
            
            <div class="mb-3">
                <label>Nama Festival</label>
                <input type="text" name="nama_fest" class="form-control" value="{{ old('nama_fest', $fest->nama_fest) }}" required>
                @error('nama_fest')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Jadwal Festival</label>
                <input type="text" name="jadwal_fest" class="form-control" value="{{ old('jadwal_fest', $fest->jadwal_fest) }}" required>
                @error('jadwal_fest')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Lokasi</label>
                <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $fest->lokasi) }}" required>
                @error('lokasi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Rangkaian Acara</label>
                <textarea name="rangkaian_acara" id="rangkaian_acara" class="form-control">{{ old('rangkaian_acara', $fest->rangkaian_acara) }}</textarea>
                @error('rangkaian_acara')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('festad.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    @section('scripts')
    <script>
        let editorInstance;

        ClassicEditor.create(document.querySelector('#rangkaian_acara'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });

        document.querySelector("form").addEventListener("submit", function(event) {
            // Pastikan CKEditor mengisi textarea sebelum submit
            let editorContent = editorInstance.getData().trim();
            document.querySelector("#rangkaian_acara").value = editorContent;

            if (!editorContent) {
                alert("Rangkaian Acara harus diisi!");
                event.preventDefault(); // Hentikan submit jika kosong
            }
        });
    </script>
    @endsection
</x-app-layout>
