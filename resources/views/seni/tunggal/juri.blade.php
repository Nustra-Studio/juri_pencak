<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/seni/juri_seni.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Juri Seni</title>
</head>
<body>
    @php
            use App\score;
            use App\Setting;
            use App\PersertaModel;
            use App\KontigenModel;
            $setting = Setting::first();
            $perserta = PersertaModel::where('id',$setting->biru)->first(); 
            $id_perserta = $perserta->id;
            $kontigen = KontigenModel::where('id',$perserta->id_kontigen)->value('kontigen');
            $number = 1;
            $scores = score::where('id_perserta',$id_perserta)
                            ->where('id_juri',$id_juri)
                            ->where('status','point_tunggal')->get();
            $score = 0;
            $total_score = 0;
            $dewan = 0;
            $babak = 0;
           if(!empty($scores)){
                foreach ($scores as $item) {
                    if($item->keterangan === "next"){
                        $score += $item->score;
                        $babak = $item->babak; 
                    }
                    elseif($item->keterangan === 'flwo'){
                        $total_score += $item->score;
                        $dewan += $item->score;
                    }
                }
           }
           else{
            $score = 0;
           }
           if($score === 0){
                $score_actual = 9 + $score / 100;
                $score_actual = number_format($score_actual, 2);
            }
            else{
                $score_actual = 9 + $score-10 / 100;
                $score_actual = number_format($score_actual, 2);
            }
            $total_score = number_format($total_score + $score_actual);
           $dewan = number_format($dewan);
    @endphp
        <!-- Match Info Section -->
        <div class="d-flex justify-content-center ">
            <div class="mid-header-text text-center" >
                ARENA {{$arena}} <br>
                PENYISIHAN - DEWASA (TUNGGAL)
            </div>
        </div>
        <!-- Player Info Section -->
        <div class="container mt-3" >   
            <div class="row">
                <div class="col">
                    Nama : <br>
                    <span class="text-primary fw-bold fs-5">{{$perserta->name}}</span>
                </div>
                <div class="col text-end">
                    : Kontingen <br>    
                    <span class="text-primary fw-bold fs-5">{{$kontigen}}</span>
                </div>
            </div>
            <!-- Score Section -->
            <div class="text-center border border-black rounded py-1"></div>
            <div class="row text-center mt-4" style="height: 200px;">
                <div class="col-md-5">
                    <button
                    @if ($babak == 100)
                    disabled
                     @endif
                    name="arena:{{$arena}} juri:{{$id_juri}} id:{{$id_perserta}} status:next p:0 keterangan:seni_tunggal"
                    class="btn btn-danger btn-lg custom-button shadow w-100 h-100 btn-data">Wrong Move</button>
                </div>
                <div class="col-md-2">
                    <div class="container-fluid h-100">
                        <div class=" h-100 d-flex justify-content-between align-items-center">
                            <table class="table table-bordered border-black">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="fw-bold" style="color: rgb(190, 190, 0);">SCORE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-primary fw-bold">{{$score}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-5" >
                    <button
                    @if ($babak == 100)
                        disabled
                    @endif
                     class="btn btn-primary btn-lg custom-button shadow w-100 h-100 btn-data"
                     name="arena:{{$arena}} juri:{{$id_juri}} id:{{$id_perserta}} status:next p:{{$number}} keterangan:seni_tunggal"
                     >Next Move</button>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center direc mt-4">
            <div class=" text-center container " >
                <div class="row">
                    <table class="table table-bordered border-black rounded">
                        <thead>
                            <tr>
                                <th class="bg-dark-subtle">ACCURACY TOTAL SCORE</th>
                                <th class="text-primary fw-bold">{{$score_actual}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"> 
                                    Flow of Movement/Stamina (Range Score : 0,01 - 0,10)
                                    <div></div>
                                    <!-- Increment 0,01 jadi 10 button 0,01 sampai 0,10 -->
                                    @for ($i = 1; $i <= 10; $i++)
                                    @php
                                        $number = number_format($i * 0.01, 2);
            
                                    @endphp
                                        <button
                                        class="btn btn-primary btn-lg mx-1 btn-data"
                                        name="arena:{{$arena}} juri:{{$id_juri}} id:{{$id_perserta}} status:flwo p:{{$number}} keterangan:seni_tunggal"
                                        >{{$number}}</button>
                                    @endfor
                                </td>
                                <td class="text-center align-middle text-primary fw-bold">
                                    {{$dewan}}
                                </td>
                            </tr>
                            <tr>
                                <td class="bg-dark-subtle fw-bold">TOTAL SCORE :</td>
                                <td class="fw-bold text-primary">{{$total_score}}</td>    
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
        <script>
             var tombolDenganKelas = document.querySelectorAll('.btn-data');
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
                    fetch('{{ route('juri.store') }}', {
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
</body>
</html>