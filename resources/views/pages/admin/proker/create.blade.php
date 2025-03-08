<x-app-layout>
    <div class="container">
        <h2>Tambah Program Kerja</h2>
        <form action="{{ route('proker.store') }}" method="POST">
            @csrf
            <input type="hidden" name="devisi_id" value="{{$id}}">
            <div class="mb-3">
                <label for="ajuan_proker" class="form-label">Ajuan Proker</label>
                <input type="text" class="form-control" id="ajuan_proker" name="ajuan_proker" required>
            </div>
            <div class="mb-3">
                <label for="rencana_pelaksanaan" class="form-label">Rencana Pelaksanaan</label>
                <input type="text" class="form-control" id="rencana_pelaksanaan" name="rencana_pelaksanaan">
            </div>
            <div class="mb-3">
                <label for="rencana_anggaran" class="form-label">Rencana Anggaran</label>
                <input type="text" class="form-control" id="rencana_anggaran" name="rencana_anggaran">
            </div>
            <div class="mb-3">
                <label for="monitoring_evaluasi" class="form-label">Monitoring & Evaluasi</label>
                <input type="text" class="form-control" id="monitoring_evaluasi" name="monitoring_evaluasi">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('proker.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</x-app-layout>
