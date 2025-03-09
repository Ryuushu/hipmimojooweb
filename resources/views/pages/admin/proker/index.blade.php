<x-app-layout>


    <div class="container">
        <h2>Data Progam Kerja</h2>
        <a href="{{ route('proker.create', $id) }}" class="btn btn-primary mb-3">Tambah Data</a>

        <div class="table-responsive">
            <table id="data-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ajuan Proker</th>
                        <th>Rencana Pelaksanaan</th>
                        <th>Progress</th>
                        <th>Monitoring Evaluasi</th>
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
                ajax: "{{ route('proker.index',$id) }}",
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'ajuan_proker',
                        name: 'ajuan_proker'
                    },
                    {
                        data: 'rencana_pelaksanaan',
                        name: 'rencana_pelaksanaan'
                    },
                    {
                        data: 'progress',
                        name: 'progress'
                    },
                    {
                        data: 'monitoring_evaluasi',
                        name: 'monitoring_evaluasi'
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
                        url: "{{ route("proker.index",$id) }}/" + $(this).data('id'),
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
