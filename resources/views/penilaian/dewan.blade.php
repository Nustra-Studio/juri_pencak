<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('assets/dewanJuri/dewan.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dewan</title>
    @php
    use App\score;
        $id_juri = 1;
    @endphp
</head>
<body>
    <div class="header-body">
        <button class="header-button-kembali">Kembali</button>
        <div class="header-title">
            <div class="header-title-2">
                Nusantara Cup
            </div>
        </div>
        <div class="header-pict">
            <img src="../assets/Assets/psht.png" alt="" style="width: 150%; height: 80%; margin-left: auto;">
            <img src="../assets/Assets/Ayo Silat.png" alt="" style="width: 150%; height: 80%; margin-left: auto; background-color: rgb(154, 154, 154); border-radius: 5px; border: 1px solid black;">
        </div>
    </div>
    <div class="header-text">
        <div class="header-text-title">
            Arena 1 <br>
            Penyisihan Remaja
        </div>
    </div>
    <div class="player-detail">
        <div>
            SMKN 1 <br>
            Ngajuk
        </div>
        <div class="player-detail-blue">
            SMA 1 <br>
            Jember
        </div>   
    </div>
    <div class="table-container">
        <table class="table-blue">
            <thead>
            <tr>
            <th>Jatuhan</th>
            <th>Binaan</th>
            <th>Teguran</th>
            <th>Peringatan</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $jatuh = score::where('keterangan','jatuh')->where('id_perserta','1')->count();
                    $bina =  score::where('keterangan','binaan')->where('id_perserta','1')->count();
                    $teguran = score::where('keterangan','teguran')->where('id_perserta','1')->count();
                    $peringatan = score::where('keterangan','peringatan')->where('id_perserta','1')->count();
                @endphp
            <tr>
                <td>{{$jatuh}}x</td>
                <td>{{$bina}}x</td>
                <td>{{$teguran}}x</td>
                <td>{{$peringatan}}x</td>
            </tr>
            <tr>
                <td>0x</td>
                <td>0x</td>
                <td>0x</td>
                <td>0x</td>
            </tr>
            <tr>
                <td>0x</td>
                <td>0x</td>
                <td>0x</td>
                <td>0x</td>
            </tr>
            </tbody>    
        </table>
        <div class="mid-section">
            <div class="babak-box">
                <div class="babak-text">BABAK</div>
            </div>
            <table class="mid-table">
                <tbody>
                    <tr>
                        <td>I</td>
                    </tr>
                    <tr>
                        <td>II</td>
                    </tr>
                    <tr>
                        <td>III</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <table class="table-red">
            <thead>
            <tr>
            <th>Peringatan</th>
            <th>Teguran</th>
            <th>Binaan</th>
            <th>Jatuhan</th>
            </tr>
            </thead>
            @php
            $jatuh = score::where('keterangan','jatuh')->where('id_perserta','2')->count();
            $bina =  score::where('keterangan','binaan')->where('id_perserta','2')->count();
            $teguran = score::where('keterangan','teguran')->where('id_perserta','2')->count();
            $peringatan = score::where('keterangan','peringatan')->where('id_perserta','2')->count();
        @endphp
            <tr>
                <td>{{$peringatan}}x</td>
                <td>{{$teguran}}x</td>
                <td>{{$bina}}x</td>
                <td>{{$jatuh}}x</td>
            </tr>
            <tr>
                <td>0x</td>
                <td>0x</td>
                <td>0x</td>
                <td>0x</td>
            </tr>
            <tr>     
                <td>0x</td>
                <td>0x</td>
                <td>0x</td>
                <td>0x</td>
            </tr>
            </tbody>    
        </table>
    </div>
    <div class="button-section">
        <div class="button-blue-container">
            <button name="juri:{{$id_juri}} id:1 status:jatuh p:5 keterangan:plus" id="kirimData" class="button-blue">JATUHAN</button>
            <button name="juri:{{$id_juri}} id:1 status:binaan p:0 keterangan:plus" id="kirimData" class="button-blue">BINAAN</button>
            <button name="juri:{{$id_juri}} id:1 status:teguran p:3 keterangan:plus" id="kirimData" class="button-blue">TEGURAN</button>
            <button name="juri:{{$id_juri}} id:1 status:peringatan p:5 keterangan:plus" id="kirimData" class="button-blue">PERINGATAN</button>
            <button name="juri:{{$id_juri}} id:1 status:jatuh p:5 keterangan:minus" id="kirimData" class="button-blue-delete">HAPUS JATUHAN</button>
            <button name="juri:{{$id_juri}} id:1 status:binaan p:0 keterangan:minus" id="kirimData" class="button-blue-delete">HAPUS BINAAN</button>
            <button name="juri:{{$id_juri}} id:1 status:teguran p:3 keterangan:minus" id="kirimData" class="button-blue-delete">HAPUS TEGURAN</button>
            <button name="juri:{{$id_juri}} id:1 status:peringatan p:5 keterangan:minus" id="kirimData" class="button-blue-delete">HAPUS PERINGATAN</button>
        </div>
        <div class="mid-container">
            <button class="button-refresh-button">
                <img src="../assets/Assets/refresh.png" alt="" style="width: 20px;height: 20px;float: left; margin-left: 10px;">
                Refresh
            </button>
            <button type="button"  data-bs-toggle="modal" data-bs-target="#vjatuhan" class="button-jatuhan">Verifikasi <br>Jatuhan</button>
            <button type="button"  data-bs-toggle="modal" data-bs-target="#vhukuman" class="button-jatuhan">Verifikasi <br>Hukuman</button>
            <table class="score-table">
                <tbody>
                    @php
                        $plus1 = score::where('status','plus')->where('id_perserta','1')->sum('score');
                        $minus1 = score::where('status','minus')->where('id_perserta','1')->sum('score'); 
                        $score1 = $plus1 - $minus1;
                        $plus2 = score::where('status','plus')->where('id_perserta','2')->sum('score');
                        $minus2 = score::where('status','minus')->where('id_perserta','2')->sum('score'); 
                        $score2 = $plus2 - $minus2;
                    @endphp
                    <tr>
                        <td><span style="color: rgba(0, 102, 255, 1) ;">{{$score1}}</span></td>
                        <td><span style="color: rgba(241, 0, 0, 1);">{{$score2}}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="button-blue-container">
            <button name="juri:{{$id_juri}} id:2 status:jatuh p:5 keterangan:minus" id="kirimData" class="button-blue-delete">HAPUS JATUHAN</button>
            <button name="juri:{{$id_juri}} id:2 status:binaan p:0 keterangan:minus" id="kirimData" class="button-blue-delete">HAPUS BINAAN</button>
            <button name="juri:{{$id_juri}} id:2 status:teguran p:3 keterangan:minus" id="kirimData" class="button-blue-delete">HAPUS TEGURAN</button>
            <button name="juri:{{$id_juri}} id:2 status:peringatan p:5 keterangan:minus" id="kirimData" class="button-blue-delete">HAPUS PERINGATAN</button>
            <button name="juri:{{$id_juri}} id:2 status:jatuh p:5 keterangan:plus" id="kirimData" class="button-red">JATUHAN</button>
            <button name="juri:{{$id_juri}} id:2 status:binaan p:0 keterangan:plus" id="kirimData" class="button-red">BINAAN</button>
            <button name="juri:{{$id_juri}} id:2 status:teguran p:3 keterangan:plus" id="kirimData" class="button-red">TEGURAN</button>
            <button name="juri:{{$id_juri}} id:2 status:peringatan p:5 keterangan:plus" id="kirimData" class="button-red">PERINGATAN</button>
        </div>
        <div class="modal fade" id="vjatuhan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <thead>
                                <tr>
                                    <td>Juri 1</td>
                                    <td>Juri 2</td>
                                    <td>Juri 3</td>
                                </tr>
                            </thead>
                            
                            </tbody>
                        </table>
                    </div>
              </div>
        </div>
    </div>

    <script>
        // Temukan semua tombol dengan kelas "button-blue" atau "button-blue-delete"
        var tombolDenganKelas = document.querySelectorAll('.button-blue, .button-blue-delete , .button-red');
    
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
                setInterval(reload, 4000);
                    });
        });
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>