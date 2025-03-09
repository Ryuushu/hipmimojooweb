@extends("layouts.branda.appbranda")
@section('konten')

<section class="container mt-5">
    <h1 class="text-center my-3">Program Kerja</h1>
    @foreach ($groupedData as $nama_devisi => $prokers)
    <h3 class="mt-4">Divisi : {{ $nama_devisi }}</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ajuan Proker</th>
                <th>Rencana Pelaksanaan</th>
                <th>Progress</th>
                <th>Monitoring Evaluasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prokers as $proker)
            <tr>
                <td>{{ $proker['ajuan_proker'] }}</td>
                <td>{{ $proker['rencana_pelaksanaan'] }}</td>
                <td>{!! $proker['progress'] !!}</td>
                <td>{!! $proker['monitoring_evaluasi'] !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach
</section>
@endsection