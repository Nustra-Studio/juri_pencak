<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/seni/DewanSolo.css">
    <link rel="stylesheet" href="../assets/seni/ScoreSeni.css">
    <link rel="stylesheet" href="../assets/seni/JuriSeni.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dewan Solo</title>
</head>
<body>
    <div class="container-fluid f-cent fs-4 mt-3">
        <!-- Match Info Section -->
        @php
            use App\score;
            // peraturan
            $a = "PERFOMANCE EXCEDEED BY 10M BY 10M AREA";
            $b = "WEAPON DROP DOES NOT MEET SYNOPSIS";
            $c = "WEAPON FALL OUT OF ARENA WHILE TEAM IS STILL REQUIRED TO USE IT";
            $d = "ATHLETE STAYING AT ONE MOVE FOR MORE THAN 5 SECONDS";
            $minus = '0.50';
            $id_juri = 3;
        @endphp
        <div>
            ARENA 1 <br>
            PENYISIHAN - DEWASA(Solo)
        </div>
        <!-- Player Info Section -->
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col fs-2 text-start">
                    <span class="fs-5">NAMA PESERTA :</span> <br> 
                    <span class="text-primary">BRIAN PUTRA IMANUEL</span>
                </div>
                <div class="col text-end fs-2 text-end">
                    <span class="fs-5">: KONTINGEN</span> <br>
                    <span class="text-primary">NGANJUK</span>
                </div>
            </div>
            <table class="table table-bordered border-black">
                <thead>
                    <tr>
                        <th class="w-50 bg-dark-subtle">PENALTY</th>
                        <th class="bg-dark-subtle" colspan="2">SCORE</th>
                    </tr>
                </thead>
                <tbody class="text-start">
                    <tr>
                        <td class="align-middle">
                            {{$a}}
                        </td>
                        <td style="height: 6em;">
                            <div class="container-fluid h100">
                                <div class="row h100 ">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <button class="btn btn-primary btn-lg h100 w100">CLEAR</button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-danger btn-lg h100 w100">
                                            - 0.50
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-10 fw-bold text-primary align-middle text-center">0</td>
                    </tr>
                    <tr>
                        <td class="align-middle">{{$b}}</td>
                        <td style="height: 6em;">
                            <div class="container-fluid h100">
                                <div class="row h100 ">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <button class="btn btn-primary btn-lg h100 w100">CLEAR</button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-danger btn-lg h100 w100">
                                            - 0.50
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="fw-bold text-primary align-middle text-center">0</td>
                    </tr>
                    <tr>
                        <td class="align-middle">
                            {{$c}}
                        </td>
                        <td style="height: 6em;">
                            <div class="container-fluid h100">
                                <div class="row h100 ">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <button class="btn btn-primary btn-lg h100 w100">CLEAR</button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-danger btn-lg h100 w100">
                                            - 0.50
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="w-10 fw-bold text-primary align-middle text-center">0</td>
                    </tr>
                    <tr>
                        <td class="align-middle">
                            {{$d}}
                        </td>
                        <td style="height: 6em;">
                            <div class="container-fluid h100">
                                <div class="row h100 ">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <button
                                        name="juri:{{$id_juri}} id:3 status:{{$d}} p:{{$minus}} keterangan:senidewansc"
                                        class="btn btn-primary btn-lg h100 w100"
                                        >CLEAR</button>
                                    </div>
                                    <div class="col">
                                        <button
                                        name="juri:{{$id_juri}} id:3 status:{{$d}} p:{{$minus}} keterangan:senidewans"
                                        class="btn btn-danger btn-lg h100 w100 btn-data">
                                            - {{$minus}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @php
                            $data = score::where('keterangan',$d)->where('id_perserta',3)->sum('score');
                        @endphp
                        <td class="w-10 fw-bold text-primary align-middle text-center">{{$data}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // Temukan semua tombol dengan kelas "button-blue" atau "button-blue-delete"
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
                    // Lakukan sesuatu dengan respons dari server (opsional)
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
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>