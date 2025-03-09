<x-app-layout>
    <div class="container">
        <h2>Data Divisi</h2>
        <a href="{{ route('divisi.create') }}" class="btn btn-primary mb-3">Tambah Devisi</a>

        <div class="table-responsive table  ">
            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Bidang</th>
                        <th>Nama Devisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    @section("scripts")
    <script>
        $(document).ready(function() {
            let table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('divisi.index') }}",
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'bidang'
                    },
                    {
                        data: 'nama_devisi'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $(document).on('click', '.delete-btn', function() {
                let id = $(this).data('id');
                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    $.ajax({
                        url: "/divisi/" + id,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            alert(response.message);
                            table.ajax.reload();
                        }
                    });
                }
            });
        });
    </script>
    @endsection
</x-app-layout>
