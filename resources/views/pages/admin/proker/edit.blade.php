<x-app-layout>
    <div class="container">

        <h2>Edit Data Pengurus</h2>
        <form action="{{ route('proker.update',[$id,$proker->id]) }}" method="POST">
            @csrf
            @method("PUT")
            <input type="hidden" name="devisi_id" value="{{$id}}">
            <div class="mb-3">
                <label for="ajuan_proker" class="form-label">Ajuan Proker</label>
                <input type="text" class="form-control" id="ajuan_proker" name="ajuan_proker" required value="{{ old("ajuan_proker",$proker->ajuan_proker) }}">
                @error("ajuan_proker")
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rencana_pelaksanaan" class="form-label">Rencana Pelaksanaan</label>
                <input type="text" class="form-control" id="rencana_pelaksanaan" value="{{ old("rencana_pelaksanaan",$proker->rencana_pelaksanaan) }}" name="rencana_pelaksanaan">
                @error("rencana_pelaksanaan")
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="rencana_anggaran" class="form-label">Rencana Anggaran</label>
                <input type="text" class="form-control" id="rencana_anggaran" value="{{ old("rencana_anggaran",$proker->rencana_anggaran) }}" name="rencana_anggaran">
                @error("rencana_anggaran")
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="monitoring_evaluasi" class="form-label">Monitoring & Evaluasi</label>
                <input type="text" class="form-control" value="{{ old("monitoring_evaluasi",$proker->monitoring_evaluasi) }}" id="monitoring_evaluasi" name="monitoring_evaluasi">
                @error("monitoring_evaluasi")
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('proker.index',$id) }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>



</x-app-layout>
