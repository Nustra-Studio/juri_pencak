@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
        .form-floating {
        position: relative;
    }

    .icon {
        position: absolute;
        top: calc(36%);
        left: .8rem;
    }

    .forma {
        width: 400px;
    }

    @media only screen and (max-width: 600px) {
        .forma {
            width: 200px;
        }
        }
</style>
@endpush

@section('content')
@php
    use App\PersertaModel;
    use App\Setting;
    use App\jadwal;
    use App\kelas;
    use App\category;
    use App\arena;
    $tipe_arena = arena::where('id', $arena)->first();
    $data_setting = Setting::first();
    $data_perserta = PersertaModel::get();
    $total_pertandingan = PersertaModel::where('status','pending')->count('id');
    $finish_pertandingan = PersertaModel::where('status','finish')->count('id');
    $data_jadwal = jadwal::where('arena',$arena)->get();
@endphp
<body>
    <!-- Title -->
    <div class="containter-fluid fs-2 fw-bold d-flex justify-content-center align-items-center mt-2">
        Jadwal Pertandigan
    </div>
    <!-- Indicator -->
    <div class="container-fluid mt-2">
        <table class="table table-bordered border-dark shadow">
            <thead class="text-center">
                <tr>
                    <th class="text-primary" colspan="3">Indikator Pertandingan</th>
                </tr>
            </thead>
            <tbody class="">
                <tr>
                    <td class="">
                        <div class="d-flex justify-content-center p-0">
                            <div class="bg-success p-2 text-center text-light rounded shadow" style="width: 75px;">Selesai</div>
                        </div>
                    </td>
                    <td class="">
                        <div class="d-flex justify-content-center p-0">
                            <div class="bg-warning p-2 text-center text-light rounded shadow" style="width: 75px;">Proses</div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Status Info -->
    <div class="container-fluid">
        <table class="table table-bordered border-dark shadow">
            <thead class="text-center">
                <tr>
                    <th class="px-1">Total : {{$total_pertandingan}} Pertandingan</th>
                    <th class="px-2">Selesai : {{$finish_pertandingan}} Pertandingan</th>
                    <th class="px-2">Sisa : {{$total_pertandingan-$finish_pertandingan}} Pertandingan</th>
                </tr>
            </thead>
        </table>
    </div>

    @if ($tipe_arena->status === "Tanding")
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive-lg">
                    <div class="card-body">
                        <table id="example"class="table table-bordered shadow" style="width: 100%;">
                            <thead class="text-center">
                                <tr>
                                    <th class="bg-light text-center">No</th>
                                    <th class="bg-light text-center">Partai</th>
                                    <th class="bg-light text-center">Kelas</th>
                                    <th class="bg-light text-center">Sudut Merah</th>
                                    <th class="bg-light text-center">Sudut Biru</th>
                                    <th class="bg-light text-center">Skor</th>
                                    <th class="bg-light text-center">Skor</th>
                                    <th class="bg-light text-center">Pemenang</th>
                                    <th class="bg-light text-center">Kondisi Menang</th>
                                    <th class="bg-light text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center align-middle">
                                @foreach ($data_perserta as $item)  
                                    @if ($loop->index+1 % 2 != 0)
                                    @php
                                    $kelas = kelas::where('id',$item->kelas)->value('name');
                                    $category = category::where('id',$item->category)->value('name');
                                    $lawan = PersertaModel::skip($loop->index+2)->take(1)->value('name');
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td class="text-center">1</td>
                                        <td>{{ $kelas }}</td>
                                        <td class="fw-bold text-danger">{{ $item->name}}</td>
                                        <td class="fw-bold text-primary">{{$lawan}}</td>
                                        <td class="fw-bold text-danger text-center">N/a</td>
                                        <td class="fw-bold text-primary text-center">N/a</td>
                                        <td class="fw-bold">N/a</td>
                                        <td class="h-100 px-0 py-0 w-25">
                                            <div class="container form-group p-0 " >
                                                <select class="form-select w-100 p-0 text-center"" id="input-continent" style="height: 60px;">
                                                    <option value="menang-1">Menang Point</option>
                                                    <option value="menang-2">Menang Teknik</option>
                                                    <option value="menang-2">Diskualifikasi</option>
                                                    <option value="menang-4">Keputusan wasit</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center p-0">
                                                @if ($item->status === "pending")
                                                <button name="keterangan:jadwal p:{{$item->id}} status:proses arena:{{$arena}}" class="btn btn-data btn-primary px-3 shadow text-light">Pending</button>
                                                @endif
                                                @if ($item->status === "proses")
                                                <button name="keterangan:jadwal p:{{$item->id}} status:finish arena:{{$arena}}" class="btn btn-data btn-warning px-3 shadow text-light">Proses</button>
                                                @endif
                                                @if ($item->status === "finish")
                                                <button name="keterangan:jadwal p:{{$item->id}} status:finish arena:{{$arena}}" class="btn btn-success px-3 shadow text-light">Selesai</button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive-lg">  
                        <div class="card-body">
                            <table id="example" class="table table-bordered shadow" style="width: 100%;">
                                <thead class="text-center">
                                    <tr>    
                                        <th class="bg-light text-center">No</th>
                                        <th class="bg-light text-center">Partai</th>
                                        <th class="bg-light text-center">Kelas</th>
                                        <th class="bg-light text-center">Nama</th>
                                        <th class="bg-light text-center">Kategori</th>
                                        <th class="bg-light text-center">Skor</th>
                                        <th class="bg-light text-center">Waktu</th>
                                        <th class="bg-light text-center">Deviation</th>
                                        <th class="bg-light text-center">Kondisi Menang</th>
                                        <th class="bg-light text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center align-middle">
                                        @foreach ($data_perserta as $item)
                                        <tr>
                                                @php
                                                    $kelas = kelas::where('id',$item->kelas)->value('name');
                                                    $category = category::where('id',$item->category)->value('name')
                                                @endphp
                                            <td class="text-center">{{ $loop->index+1 }}</td>
                                            <td class="text-center">1</td>
                                            <td>{{$kelas}}</td>
                                            <td class="">{{$item->name}}</td>
                                            <td class="">{{$category}}</td>
                                            <td class="text-danger text-center">N/A</td>
                                            <td class="text-primary text-center">N/A</td>
                                            <td class="text-center">N/A</td>
                                            <td class="h-100 px-0 py-0">
                                                <div class="container form-group p-0 " >
                                                    <select class="form-select w-100 p-0 text-center"" id="input-continent" style="height: 60px;">
                                                        <option value="menang-1">Menang Point</option>
                                                        <option value="menang-2">Menang Teknik</option>
                                                        <option value="menang-2">Diskualifikasi</option>
                                                        <option value="menang-4">Keputusan wasit</option>
                                                    </select>
                                                </div>
                                            </td>
                                        <td>
                                            <div class="d-flex justify-content-center p-0">
                                                @if ($item->status === "pending")
                                                <button name="keterangan:jadwal p:{{$item->id}} status:proses arena:{{$arena}}" class="btn btn-data btn-primary px-3 shadow text-light">Pending</button>
                                                @endif
                                                @if ($item->status === "proses")
                                                <button name="keterangan:jadwal p:{{$item->id}} status:finish arena:{{$arena}}" class="btn btn-data btn-warning px-3 shadow text-light">Proses</button>
                                                @endif
                                                @if ($item->status === "finish")
                                                <button name="keterangan:jadwal p:{{$item->id}} status:finish arena:{{$arena}}" class="btn btn-success px-3 shadow text-light">Selesai</button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Information Table -->
    

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>    
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#example')
    </script>
</body>
@endsection

@push('plugin-scripts')
<script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script>
        var tombolDenganKelas = document.querySelectorAll('.btn-data');

// Loop melalui semua tombol dan tambahkan event listener
tombolDenganKelas.forEach(function(tombol) {
    tombol.addEventListener('click', function() {
        var nameAttribute = this.getAttribute('name'); // Mendapatkan nilai atribut "name"
        
        // Membagi nilai atribut "name" menjadi objek JavaScript
        var data = {};
        nameAttribute.split(' ').forEach(function(item) {
            var parts = item.split(':');
            data[parts[0]] = parts[1];
        });

        // Sekarang, Anda memiliki data dalam bentuk objek
        console.log(data);

                // Lanjutkan dengan kode pengiriman permintaan POST jika diperlukan
            fetch('{{ route('dewan.store') }}', {
            method: 'POST',
            headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
            })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            // Tangani kesalahan jika ada
        });
        function reload(){
        window.location.reload();
        }
        setInterval(reload, 800);
            });
});
    </script>
@endpush