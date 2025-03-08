<x-app-layout>


    <div class="container">
        <h2>Data Beranda</h2>
        <a href="{{ route('beranda.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

        <div class="table-responsive">
            <table id="berandaTable" class="table table-sm table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title Web</th>
                        <th>Slogan</th>
                        <th>Stat 1</th>
                        <th>Stat 2</th>
                        <th>Stat 3</th>
                        <th>Stat 4</th>
                        <th>Deskripsi Hipmi</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>Deskripsi Keanggotaan</th>
                        <th>Deskripsi Sejarah</th>
                        <th>Deskripsi Kepengurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data akan diisi di sini -->
                </tbody>
            </table>
        </div>

    </div>
    @section("scripts")
    <script>
        $(document).ready(function() {
            $('#berandaTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('beranda.data') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title_web',
                        name: 'title_web'
                    },
                    {
                        data: 'slogan',
                        name: 'slogan'
                    },
                    {
                        data: 'stat1',
                        name: 'stat1'
                    },
                    {
                        data: 'stat2',
                        name: 'stat2'
                    },
                    {
                        data: 'stat3',
                        name: 'stat3'
                    }, // Ditambahkan
                    {
                        data: 'stat4',
                        name: 'stat4'
                    }, // Ditambahkan
                    {
                        data: 'deskripsi_hipmi',
                        name: 'deskripsi_hipmi'
                    }, // Ditambahkan
                    {
                        data: 'visi',
                        name: 'visi'
                    }, // Ditambahkan
                    {
                        data: 'misi',
                        name: 'misi'
                    }, // Ditambahkan
                    {
                        data: 'deskripsi_keanggotaan',
                        name: 'deskripsi_keanggotaan'
                    }, // Ditambahkan
                    {
                        data: 'deskripsi_sejarah',
                        name: 'deskripsi_sejarah'
                    }, // Ditambahkan
                    {
                        data: 'deskripsi_kepengurusan',
                        name: 'deskripsi_kepengurusan'
                    },

                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    } // Tetap tidak dapat diurutkan atau dicari
                ]

            });

            $(document).on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                if (confirm("Yakin ingin menghapus?")) {
                    $.ajax({
                        url: "/beranda/" + id,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            alert(response.success);
                            $('#berandaTable').DataTable().ajax.reload();
                        }
                    });
                }
            });
        });
    </script>
    @endsection

</x-app-layout>