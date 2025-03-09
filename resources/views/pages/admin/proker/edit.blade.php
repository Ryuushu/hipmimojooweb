<x-app-layout>
    <div class="container">

        <h2>Edit Data Pengurus</h2>
        <form action="{{ route('proker.update', $proker->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="devisi_id" value="{{$id}}">
            <div class="mb-3">
                <label for="ajuan_proker" class="form-label">Ajuan Proker</label>
                <input type="text" name="ajuan_proker" class="form-control" value="{{ $proker->ajuan_proker }}" required>
            </div>
            <div class="mb-3">
                <label for="rencana_pelaksanaan" class="form-label">Rencana Pelaksanaan</label>
                <input type="text" name="rencana_pelaksanaan" class="form-control" value="{{ $proker->rencana_pelaksanaan }}" required>
            </div>
            <div class="mb-3">
                <label for="progress" class="form-label">Progress</label>
            
                <textarea type="text" name="progress" id="progress" class="form-control">{{ old('progress', $proker->progress) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="monitoring_evaluasi" class="form-label">Monitoring & Evaluasi</label>
               
                <textarea type="text" name="monitoring_evaluasi" id="monitoring_evaluasi" class="form-control">{{ old('monitoring_evaluasi', $proker->monitoring_evaluasi) }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('proker.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    @section('scripts')
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> -->
    <script>
        let editorInstance; // Simpan editor di variabel global

        ClassicEditor.create(document.querySelector('#progress'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });
            ClassicEditor.create(document.querySelector('#monitoring_evaluasi'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });

        document.querySelector("form").addEventListener("submit", function(event) {
            // Ambil data dari CKEditor dan simpan ke textarea sebelum submit
            document.querySelector("#progress").value = editorInstance.getData();
            document.querySelector("#monitoring_evaluasi").value = editorInstance.getData();
            // Cek jika kosong
            if (!editorInstance.getData().trim()) {
                alert("Rangkaian Acara harus diisi!");
                event.preventDefault(); // Hentikan submit jika kosong
            }
        });
    </script>
    @endsection

</x-app-layout>