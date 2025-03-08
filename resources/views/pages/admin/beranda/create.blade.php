<x-app-layout>
    <div class="container">
        <h2>{{ $beranda ? 'Edit Data Beranda' : 'Tambah Data Beranda' }}</h2>
        <form action="{{ route('beranda.save')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Title Web</label>
                    <input type="text" name="title_web" class="form-control" value="{{ old('title_web', $beranda->title_web ?? '') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Slogan</label>
                    <input type="text" name="slogan" class="form-control" value="{{ old('slogan', $beranda->slogan ?? '') }}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Stat 1</label>
                    <input type="text" name="stat1" class="form-control" value="{{ old('stat1', $beranda->stat1 ?? '') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Stat 2</label>
                    <input type="text" name="stat2" class="form-control" value="{{ old('stat2', $beranda->stat2 ?? '') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Stat 3</label>
                    <input type="text" name="stat3" class="form-control" value="{{ old('stat3', $beranda->stat3 ?? '') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Stat 4</label>
                    <input type="text" name="stat4" class="form-control" value="{{ old('stat4', $beranda->stat4 ?? '') }}">
                </div>
            </div>
            <div class="mb-3">
                <label>Deskripsi HIPMI</label>
                <textarea name="deskripsi_hipmi" id="deskripsi_hipmi" class="form-control">{{ old('deskripsi_hipmi', $beranda->deskripsi_hipmi ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label>Visi</label>
                <textarea name="visi" id="visi" class="form-control">{{ old('visi', $beranda->visi ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label>Misi</label>
                <textarea name="misi" id="misi" class="form-control">{{ old('misi', $beranda->misi ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label>Deskripsi Keanggotaan</label>
                <textarea name="deskripsi_keanggotaan" id="deskripsi_keanggotaan" class="form-control">{{ old('deskripsi_keanggotaan', $beranda->deskripsi_keanggotaan ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label>Deskripsi Sejarah</label>
                <textarea name="deskripsi_sejarah" id="deskripsi_sejarah" class="form-control">{{ old('deskripsi_sejarah', $beranda->deskripsi_sejarah ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label>Deskripsi Kepengurusan</label>
                <textarea name="deskripsi_kepengurusan" id="deskripsi_kepengurusan" class="form-control">{{ old('deskripsi_kepengurusan', $beranda->deskripsi_kepengurusan ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label>Deskripsi Tentang</label>
                <textarea name="deskripsi_tentang" id="deskripsi_tentang" class="form-control">{{ old('deskripsi_kepengurusan', $beranda->deskripsi_kepengurusan ?? '') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
           
        </form>
    </div>

    @section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#deskripsi_hipmi'));
        ClassicEditor.create(document.querySelector('#visi'));
        ClassicEditor.create(document.querySelector('#misi'));
        ClassicEditor.create(document.querySelector('#deskripsi_keanggotaan'));
        ClassicEditor.create(document.querySelector('#deskripsi_sejarah'));
        ClassicEditor.create(document.querySelector('#deskripsi_kepengurusan'));
        ClassicEditor.create(document.querySelector('#deskripsi_tentang'));

    </script>
    @endsection
</x-app-layout>
