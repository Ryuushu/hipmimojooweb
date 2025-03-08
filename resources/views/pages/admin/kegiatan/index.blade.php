<x-app-layout>
    <div class="container">
        <h2>Data Kegiatan</h2>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-success">Tambah Kegiatan</a>
        <br><br>
        <table class="table table-bordered" id="datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>


    @section('scripts')
  
    <script>
        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kegiatan.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'jadwal',
                        name: 'jadwal'
                    },
                    {
                        data: 'lokasi',
                        name: 'lokasi'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
    @endsection

</x-app-layout>