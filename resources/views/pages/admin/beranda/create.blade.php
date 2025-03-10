<x-app-layout>
    <div class="container">
        <h2>{{ $beranda ? 'Edit Data Beranda' : 'Tambah Data Beranda' }}</h2>
        <form action="{{ route('beranda.save')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Title Web</label>
                    <input type="text" name="title_web" class="form-control" value="{{ old('title_web', $beranda->title_web ?? '') }}" required>
                    @error('title_web')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Slogan</label>
                    <input type="text" name="slogan" class="form-control" value="{{ old('slogan', $beranda->slogan ?? '') }}" required>
                    @error('slogan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Stat 1</label>
                    <input type="text" name="stat1" class="form-control" value="{{ old('stat1', $beranda->stat1 ?? '') }}">
                    @error('stat1')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Stat 2</label>
                    <input type="text" name="stat2" class="form-control" value="{{ old('stat2', $beranda->stat2 ?? '') }}">
                    @error('stat2')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Stat 3</label>
                    <input type="text" name="stat3" class="form-control" value="{{ old('stat3', $beranda->stat3 ?? '') }}">
                    @error('stat3')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Stat 4</label>
                    <input type="text" name="stat4" class="form-control" value="{{ old('stat4', $beranda->stat4 ?? '') }}">
                    @error('stat4')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Deskripsi HIPMI</label>
                <textarea name="deskripsi_hipmi" id="deskripsi_hipmi" class="form-control">{{ old('deskripsi_hipmi', $beranda->deskripsi_hipmi ?? '') }}</textarea>
                @error('deskripsi_hipmi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="fw-bold">Visi</label>
                <textarea name="visi" id="visi" class="form-control">{{ old('visi', $beranda->visi ?? '') }}</textarea>
                @error('visi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="fw-bold">Misi</label>
                <textarea name="misi" id="misi" class="form-control">{{ old('misi', $beranda->misi ?? '') }}</textarea>
                @error('misi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="fw-bold">Deskripsi Keanggotaan</label>
                <textarea name="deskripsi_keanggotaan" id="deskripsi_keanggotaan" class="form-control">{{ old('deskripsi_keanggotaan', $beranda->deskripsi_keanggotaan ?? '') }}</textarea>
                @error('deskripsi_keanggotaan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="fw-bold">Deskripsi Sejarah</label>
                <textarea name="deskripsi_sejarah" id="deskripsi_sejarah" class="form-control">{{ old('deskripsi_sejarah', $beranda->deskripsi_sejarah ?? '') }}</textarea>
                @error('deskripsi_sejarah')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="fw-bold">Deskripsi Setruktur Organisasi</label>
                <textarea name="deskripsi_kepengurusan" id="deskripsi_kepengurusan" class="form-control">{{ old('deskripsi_kepengurusan', $beranda->deskripsi_kepengurusan ?? '') }}</textarea>
                @error('deskripsi_kepengurusan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="fw-bold">Deskripsi Tentang Kami</label>
                <textarea name="deskripsi_tentang" id="deskripsi_tentang" class="form-control">{{ old('deskripsi_kepengurusan', $beranda->deskripsi_kepengurusan ?? '') }}</textarea>
                @error('deskripsi_tentang')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="fw-bold">Deskripsi Periode keanggotaan</label>
                <textarea name="periode_keanggotaan" id="periode_keanggotaan" class="form-control">{{ old('periode_keanggotaan', $beranda->periode_keanggotaan ?? '') }}</textarea>
                @error('periode_keanggotaan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>

        </form>
    </div>

    @section('scripts')
    <script>
        ClassicEditor.create(document.querySelector('#deskripsi_hipmi'));
        ClassicEditor.create(document.querySelector('#visi'));
        ClassicEditor.create(document.querySelector('#misi'));
        ClassicEditor.create(document.querySelector('#deskripsi_keanggotaan'));
        ClassicEditor.create(document.querySelector('#deskripsi_sejarah'));
        ClassicEditor.create(document.querySelector('#deskripsi_kepengurusan'));
        ClassicEditor.create(document.querySelector('#deskripsi_tentang'));
        ClassicEditor.create(document.querySelector('#periode_keanggotaan'));

        
    </script>
    @endsection
</x-app-layout>