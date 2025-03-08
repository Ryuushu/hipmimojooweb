<x-app-layout>
    <div class="container">
        <h2>Data Berita</h2>
        <a href="{{ route('berita.create') }}" class="btn btn-success">Tambah Berita</a>
        <br><br>
        <table class="table table-bordered" id="datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th>Konten</th>
                    <th>Kategori Berita</th>
                    <th>Date</th>
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
                ajax: "{{ route('berita.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'thumbnail',
                        render: function(data) {

                            return `<img src="{{ url(asset('assets/uploadimg/berita/')) }}/${data}" width="50" height="50">`;
                        }
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'kontent',
                        name: 'kontent'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    {
                        data: 'date',
                        name: 'date'
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