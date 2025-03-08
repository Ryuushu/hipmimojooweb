<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
    <h2>Data Berita</h2>
    <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

    <table id="beritaTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#beritaTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('berita.data') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'judul', name: 'judul' },
                { data: 'isi', name: 'isi' },
                { data: 'created_at', name: 'created_at' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
            ]
        });

        $(document).on('click', '.delete-btn', function() {
            var beritaId = $(this).data('id');
            if (confirm("Yakin ingin menghapus data ini?")) {
                $.ajax({
                    url: "/berita/" + beritaId,
                    type: "DELETE",
                    data: { _token: "{{ csrf_token() }}" },
                    success: function(response) {
                        alert(response.success);
                        $('#beritaTable').DataTable().ajax.reload();
                    }
                });
            }
        });
    });
</script>
</x-app-layout><div class="container"></div>