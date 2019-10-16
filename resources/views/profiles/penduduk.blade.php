@extends('layouts.app')
@section('title', 'Data Penduduk Desa Bakalan')

@section('content')
    <div class="container" style="margin-top:100px;">
        <canvas id="populate"></canvas>
        <div class="row" style="margin-top:50px;">
            <h1 class="display-4">Data Penduduk th. 2019</h1>
        </div>
        <hr class="border-warning"/>
        <table class="table" id="users" style="width:100%">
            <thead class="thead-light bg-info">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Usia</th>
                    <th scope="col">Alamat</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item["name"] }}</td>
                    <td>{{ $item["gender"] }}</td>
                    <td>{{ usia($item["birth_date"])." th" }}</td>
                    <td>{{ $item["address"].' RT : '.$item["rt"].' RW : '.$item["rw"] }}</td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
@endsection
@section('script')
<script>
    var ctx = document.getElementById("populate").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni"],
            datasets: [{
                label: '< 5 tahun',
                data: [120, 190, 30, 230, 20, 30],
                backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            },{
                label: '5-17 tahun',
                data: [230, 20, 30, 120, 190, 30],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                ],
                borderWidth: 1
            },{
                label: '17-56 tahun',
                data: [230, 20, 30, 120, 190, 30],
                backgroundColor: [
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                ],
                borderWidth: 1
            },{
                label: '> 56 tahun',
                data: [230, 20, 30, 120, 190, 30],
                backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
<script>
$(document).ready(function() {
    var user = $('#users').DataTable( {
        processing: true,
        serverSide: true,
        ajax: "{{ url('penduduk/userlist') }}",
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'gender' },
            { data: 'birth_date' },
            { data: 'address' }
        ]
    });
    // user.on( 'order.dt search.dt', function () {
    //     user.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
    //         cell.innerHTML = i+1;
    //     } );
    // } ).draw();
});
</script>
@endsection