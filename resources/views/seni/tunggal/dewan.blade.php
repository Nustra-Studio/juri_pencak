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
            use App\Setting;
            use App\PersertaModel;
            use App\KontigenModel;
            // peraturan
            $setting = Setting::where('arena',$arena)->first();
            $perserta = PersertaModel::where('id',$setting->biru)->first(); 
            $a = "PERFOMANCE EXCEDEED BY 10M BY 10M AREA";
            $b = "DROPING OF WEAPON, TOUCHING THE FLOOR";
            $c = "WATTIRE IS NOT ACCORDING TO PRESCRIPTION(TANJAK OR SAMPING FALLS OUT)";
            $d = "ATHLETE STAYING AT ONE MOVE FOR MORE THAN 5 SECONDS";
            $minus = '0.50';
            $id_perserta = $perserta->id;
            $kontigen = KontigenModel::where('id',$perserta->id_kontigen)->value('kontigen');
        @endphp
        <div>
            ARENA {{$arena}} <br>
            PENYISIHAN - DEWASA
        </div>
        <!-- Player Info Section -->
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col fs-2 text-start">
                    <span class="fs-5">NAMA PESERTA :</span> <br> 
                    <span class="text-primary">{{$perserta->name}}</span>
                </div>
                <div class="col text-end fs-2 text-end">
                    <span class="fs-5">: KONTINGEN</span> <br>
                    <span class="text-primary">{{$kontigen}}</span>
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
                        @php
                            $status = str_replace(' ', '', $a);
                        @endphp
                        <td style="height: 6em;">
                            <div class="container-fluid h100">
                                <div class="row h100 ">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <button
                                        name="arena:{{$arena}} juri:{{$id_juri}} id:{{$id_perserta}} status:{{$status}} p:{{$minus}} keterangan:senidewansc"
                                        class="btn btn-primary btn-lg h100 w100 btn-data"
                                        >CLEAR</button>
                                    </div>
                                    <div class="col">
                                        <button
                                        name="arena:{{$arena}} juri:{{$id_juri}} id:{{$id_perserta}} status:{{$status}} p:{{$minus}} keterangan:senidewans"
                                        class="btn btn-danger btn-lg h100 w100 btn-data">
                                            - {{$minus}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @php
                            $score = score::where('keterangan',$status)
                            ->where('status','seni_minus')
                            ->where('id_perserta',$id_perserta)
                            ->sum('score');
                            $score = number_format($score, 2);
                          $score_check = number_format(0, 2);
                        @endphp
                        @if ($score > $score_check)
                        <td class="w-10 fw-bold text-danger align-middle text-center">-{{$score}}</td>
                        @else
                        <td class="w-10 fw-bold text-primary align-middle text-center">{{$score}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="align-middle">
                            {{$b}}
                        </td>
                        @php
                            $status = str_replace(' ', '', $b);
                        @endphp
                        <td style="height: 6em;">
                            <div class="container-fluid h100">
                                <div class="row h100 ">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <button
                                        name="arena:{{$arena}} juri:{{$id_juri}} id:{{$id_perserta}} status:{{$status}} p:{{$minus}} keterangan:senidewansc"
                                        class="btn btn-primary btn-lg h100 w100 btn-data"
                                        >CLEAR</button>
                                    </div>
                                    <div class="col">
                                        <button
                                        name="arena:{{$arena}} juri:{{$id_juri}} id:{{$id_perserta}} status:{{$status}} p:{{$minus}} keterangan:senidewans"
                                        class="btn btn-danger btn-lg h100 w100 btn-data">
                                            - {{$minus}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @php
                           $score = score::where('keterangan',$status)
                            ->where('status','seni_minus')
                            ->where('id_perserta',$id_perserta)
                            ->sum('score');
                            $score = number_format($score, 2);
                          $score_check = number_format(0, 2);
                        @endphp
                        @if ($score > $score_check)
                        <td class="w-10 fw-bold text-danger align-middle text-center">-{{$score}}</td>
                        @else
                        <td class="w-10 fw-bold text-primary align-middle text-center">{{$score}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="align-middle">
                            {{$c}}
                        </td>
                        @php
                            $status = str_replace(' ', '', $c);
                        @endphp
                        <td style="height: 6em;">
                            <div class="container-fluid h100">
                                <div class="row h100 ">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <button
                                        name="arena:{{$arena}} juri:{{$id_juri}} id:{{$id_perserta}} status:{{$status}} p:{{$minus}} keterangan:senidewansc"
                                        class="btn btn-primary btn-lg h100 w100 btn-data"
                                        >CLEAR</button>
                                    </div>
                                    <div class="col">
                                        <button
                                        name="arena:{{$arena}} juri:{{$id_juri}} id:{{$id_perserta}} status:{{$status}} p:{{$minus}} keterangan:senidewans"
                                        class="btn btn-danger btn-lg h100 w100 btn-data">
                                            - {{$minus}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @php
                           $score = score::where('keterangan',$status)
                            ->where('status','seni_minus')
                            ->where('id_perserta',$id_perserta)
                            ->sum('score');
                            $score = number_format($score, 2);
                          $score_check = number_format(0, 2);
                        @endphp
                        @if ($score > $score_check)
                        <td class="w-10 fw-bold text-danger align-middle text-center">-{{$score}}</td>
                        @else
                        <td class="w-10 fw-bold text-primary align-middle text-center">{{$score}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="align-middle">
                            {{$d}}
                        </td>
                        @php
                            $status = str_replace(' ', '', $d);
                        @endphp
                        <td style="height: 6em;">
                            <div class="container-fluid h100">
                                <div class="row h100 ">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <button
                                        name="arena:{{$arena}} juri:{{$id_juri}} id:{{$id_perserta}} status:{{$status}} p:{{$minus}} keterangan:senidewansc"
                                        class="btn btn-primary btn-lg h100 w100 btn-data"
                                        >CLEAR</button>
                                    </div>
                                    <div class="col">
                                        <button
                                        name="arena:{{$arena}} juri:{{$id_juri}} id:{{$id_perserta}} status:{{$status}} p:{{$minus}} keterangan:senidewans"
                                        class="btn btn-danger btn-lg h100 w100 btn-data">
                                            - {{$minus}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @php
                           $score = score::where('keterangan',$status)
                            ->where('status','seni_minus')
                            ->where('id_perserta',$id_perserta)
                            ->sum('score');
                            $score = number_format($score, 2);
                          $score_check = number_format(0, 2);
                        @endphp
                        @if ($score > $score_check)
                        <td class="w-10 fw-bold text-danger align-middle text-center">-{{$score}}</td>
                        @else
                        <td class="w-10 fw-bold text-primary align-middle text-center">{{$score}}</td>
                        @endif
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