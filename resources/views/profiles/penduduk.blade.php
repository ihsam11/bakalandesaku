@extends('layouts.app')
@section('title', 'Data Penduduk Desa Bakalan')

@section('content')
    <div class="container" style="margin-top:100px;">
        {{-- <canvas id="populate"></canvas> --}}
        <div class="row" style="margin-top:50px;">
            <h1 class="display-4">Data Penduduk th. 2019</h1>
        </div>
        <hr class="border-warning"/>
        <table class="table" id="users" style="width:100%">
            <thead class="thead-light bg-info">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NIK</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">JENIS KELAMIN</th>
                    <th scope="col">USIA</th>
                    <th scope="col">ALAMAT</th>
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
{{-- <script>
    var ctx = document.getElementById("populate").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Bakalan 01", "Bakalan 02", "Banjarsari 01", "Banjarsari 02", "Jamuran", "Kebonjati"],
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
</script> --}}
<script>
    var year = ['2013','2014','2015', '2016'];
    var data_click = ;
    var data_viewer = ;

    var barChartData = {
        labels: year,
        datasets: [{
            label: 'Click',
            backgroundColor: "rgba(220,220,220,0.5)",
            data: data_click
        }, {
            label: 'View',
            backgroundColor: "rgba(151,187,205,0.5)",
            data: data_viewer
        }]
    };


    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: 'rgb(0, 255, 0)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Yearly Website Visitor'
                }
            }
        });
    };
</script>

<script>
$(document).ready(function() {
    var user = $('#users').DataTable( {
        processing: true,
        serverSide: true,
        ajax: "{{ url('penduduk/userdatatable') }}",
        columns: [
            { data: 'id' },
            { data: 'nik' },
            { data: 'name' },
            { data: 'gender' },
            { data: 'usia',
                render: function ( data, type, row ) {
                    return data + ' th';
                },
                searchable: false,
            },{ 
                data: null,
                render: function ( data, type, row ) {
                    return data.address +' RT: '+ data.rt +' RW: '+ data.rw;
                },
                searchable: false,
             }
        ]
    });
});
</script>
@endsection