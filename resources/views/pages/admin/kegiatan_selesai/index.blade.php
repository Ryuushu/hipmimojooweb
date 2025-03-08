<x-app-layout>


    <div class="container">
        <h2>Data Kegiatan Selesai</h2>
        <a href="{{ route('kegiatan-selesai.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

        <div class="table-responsive">
            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th>
                        <th>Title</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
    @section("scripts")
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kegiatan-selesai.index') }}",
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'img',
                        render: function(data) {
                           
                           return `<img src="{{ url(asset('assets/uploadimg/kegiatan_selesai/')) }}/${data}" width="50" height="50">`;
                        }
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'deskripsi'
                    },
                    {
                        data: 'aksi',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $(document).on('click', '.delete-btn', function() {
                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    $.ajax({
                        url: "/kegiatan-selesai/" + $(this).data('id'),
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            alert(response.success);
                            $('#data-table').DataTable().ajax.reload();
                        }
                    });
                }
            });
        });
    </script>
    @endsection

</x-app-layout>