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
                <label for="rencana_anggaran" class="form-label">Rencana Anggaran</label>
            
                <input type="text" name="rencana_anggaran" class="form-control" value="{{ $proker->rencana_anggaran }}" required>
            </div>
            <div class="mb-3">
                <label for="monitoring_evaluasi" class="form-label">Monitoring & Evaluasi</label>
               
                <input type="text" name="monitoring_evaluasi" class="form-control" value="{{ $proker->monitoring_evaluasi }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('proker.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>



</x-app-layout>