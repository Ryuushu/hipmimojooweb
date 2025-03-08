<x-app-layout>


    <div class="container">
        <h2>Data HIPMI Fest</h2>
        <a href="{{ route('festad.create') }}" class="btn btn-primary mb-3">Tambah Fest</a>

        <div class="table-responsive">
            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Fest</th>
                        <th>Jadwal</th>
                        <th>Lokasi</th>
                        <th>Rangkaian Acara</th>
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
                ajax: "{{ route('festad.index') }}",
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'nama_fest',
                        name: 'nama_fest'
                    },
                    {
                        data: 'jadwal_fest',
                        name: 'jadwal_fest'
                    },
                    {
                        data: 'lokasi',
                        name: 'lokasi'
                    },
                    {
                        data: 'rangkaian_acara',
                        name: 'rangkaian_acara'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                    
                ]
            });

            $(document).on('click', '.delete-btn', function() {
                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    $.ajax({
                        url: "/fest/" + $(this).data('id'),
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