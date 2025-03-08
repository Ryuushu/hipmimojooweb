<x-app-layout>


    <div class="container">
        <h2>Data Anggota</h2>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

        <div class="table-responsive">
            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image Anggota</th>
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
                ajax: "{{ route('anggota.index') }}",
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'img',
                        render: function(data) {
                            return `<img src="{{ url(asset('assets/uploadimg/anggota/')) }}/${data}" width="50" height="50">`;
                        }
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $(document).on('click', '.delete-btn', function() {
                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    $.ajax({
                        url: "/pengurus/" + $(this).data('id'),
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