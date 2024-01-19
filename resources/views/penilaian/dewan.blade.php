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
            use App\Setting;
            use App\PersertaModel;
            $id_arena = $arena;
            $setting = Setting::first();
            $id_juri = $id_juri;
            $tim_merah = PersertaModel::where('id',$setting->merah)->first();
            $tim_biru =PersertaModel::where('id',$setting->biru)->first() ;
            $tim_biru = $tim_biru->id;
            $tim_merah = $tim_merah->id;
            $babak = Setting::where('arena',$arena)->first();
            $babak = $babak->babak;
    @endphp
</head>
<style>
    .by {
        background-color: yellow;
    }
</style>
<body>
    <div class="header-body">
        <button class="header-button-kembali">
            <a href="{{url("/login-juri")}}" style="text-decoration: none;" class="text-dark">Log Out</a>
        </button>
        <div class="header-title">
            <div class="header-title-2">
                Nusantara Cup
            </div>
        </div>
        <div class="header-pict">   
            <img src="../assets/Assets/psht.png" alt="" style="width: 150%; height: 50px; margin-left: auto;">
            <img src="../assets/Assets/Ayo Silat.png" alt="" style="width: 150%; height: 50px; margin-left: auto; background-color: rgb(154, 154, 154); border-radius: 5px; border: 1px solid black;">
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
                $jatuh = score::where('keterangan','jatuh')
                ->where('babak','1')
                ->where('id_perserta',$tim_biru)->count();
                $bina =  score::where('keterangan','binaan')
                ->where('babak','1')
                ->where('id_perserta',$tim_biru)->count();
                $teguran = score::where('keterangan','teguran')
                ->where('babak','1')
                ->where('id_perserta',$tim_biru)->count();
                $peringatan = score::where('keterangan','peringatan')
                ->where('babak','1')
                ->where('id_perserta',$tim_biru)->count();
            @endphp
                <tr>
                    <td>{{$jatuh}}x</td>
                    <td>{{$bina}}x</td>
                    <td>{{$teguran}}x</td>
                    <td>{{$peringatan}}x</td>
                </tr>
            @php
                $jatuh = score::where('keterangan','jatuh')
                ->where('babak','2')
                ->where('id_perserta',$tim_biru)->count();
                $bina =  score::where('keterangan','binaan')
                ->where('babak','2')
                ->where('id_perserta',$tim_biru)->count();
                $teguran = score::where('keterangan','teguran')
                ->where('babak','2')
                ->where('id_perserta',$tim_biru)->count();
                $peringatan = score::where('keterangan','peringatan')
                ->where('babak','2')
                ->where('id_perserta',$tim_biru)->count();
            @endphp
                <tr>
                    <td>{{$jatuh}}x</td>
                    <td>{{$bina}}x</td>
                    <td>{{$teguran}}x</td>
                    <td>{{$peringatan}}x</td>
                </tr>
            @php
                $jatuh = score::where('keterangan','jatuh')
                ->where('babak','3')
                ->where('id_perserta',$tim_biru)->count();
                $bina =  score::where('keterangan','binaan')
                ->where('babak','3')
                ->where('id_perserta',$tim_biru)->count();
                $teguran = score::where('keterangan','teguran')
                ->where('babak','3')
                ->where('id_perserta',$tim_biru)->count();
                $peringatan = score::where('keterangan','peringatan')
                ->where('babak','3')
                ->where('id_perserta',$tim_biru)->count();
            @endphp    
                <tr>     
                    <td>{{$jatuh}}x</td>
                    <td>{{$bina}}x</td>
                    <td>{{$teguran}}x</td>
                    <td>{{$peringatan}}x</td>
                </tr>
            </tbody>    
        </table>
        <div class="mid-section">
            <div class="babak-box">
                <div class="babak-text">BABAK</div>
            </div>
            <table class="mid-table">
                <tbody>
                    <tr class="
                    @if($babak =='1') by 
                    @endif">
                        <td>I</td>
                    </tr>
                    <tr class="
                    @if($babak =='2') by 
                    @endif">
                        <td>II</td>
                    </tr>
                    <tr class="
                    @if($babak =='3') by 
                    @endif">
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
            $jatuh = score::where('keterangan','jatuh')
            ->where('babak','1')
            ->where('id_perserta',$tim_merah)->count();
            $bina =  score::where('keterangan','binaan')
            ->where('babak','1')
            ->where('id_perserta',$tim_merah)->count();
            $teguran = score::where('keterangan','teguran')
            ->where('babak','1')
            ->where('id_perserta',$tim_merah)->count();
            $peringatan = score::where('keterangan','peringatan')
            ->where('babak','1')
            ->where('id_perserta',$tim_merah)->count();
        @endphp
            <tr>
                <td>{{$peringatan}}x</td>
                <td>{{$teguran}}x</td>
                <td>{{$bina}}x</td>
                <td>{{$jatuh}}x</td>
            </tr>
        @php
            $jatuh = score::where('keterangan','jatuh')
            ->where('babak','2')
            ->where('id_perserta',$tim_merah)->count();
            $bina =  score::where('keterangan','binaan')
            ->where('babak','2')
            ->where('id_perserta',$tim_merah)->count();
            $teguran = score::where('keterangan','teguran')
            ->where('babak','2')
            ->where('id_perserta',$tim_merah)->count();
            $peringatan = score::where('keterangan','peringatan')
            ->where('babak','2')
            ->where('id_perserta',$tim_merah)->count();
        @endphp
            <tr>
                <td>{{$peringatan}}x</td>
                <td>{{$teguran}}x</td>
                <td>{{$bina}}x</td>
                <td>{{$jatuh}}x</td>
            </tr>
        @php
            $jatuh = score::where('keterangan','jatuh')
            ->where('babak','3')
            ->where('id_perserta',$tim_merah)->count();
            $bina =  score::where('keterangan','binaan')
            ->where('babak','3')
            ->where('id_perserta',$tim_merah)->count();
            $teguran = score::where('keterangan','teguran')
            ->where('babak','3')
            ->where('id_perserta',$tim_merah)->count();
            $peringatan = score::where('keterangan','peringatan')
            ->where('babak','3')
            ->where('id_perserta',$tim_merah)->count();
        @endphp    
            <tr>     
                <td>{{$peringatan}}x</td>
                <td>{{$teguran}}x</td>
                <td>{{$bina}}x</td>
                <td>{{$jatuh}}x</td>
            </tr>
            @php
                $jatuh_babak = score::where('keterangan','jatuh')
                ->where('babak',$setting->babak)
                ->where('id_perserta',$tim_biru)->count();
                $bina_babak =  score::where('keterangan','binaan')
                ->where('babak',$setting->babak)
                ->where('id_perserta',$tim_biru)->count();
                $teguran_babak = score::where('keterangan','teguran')
                ->where('babak',$setting->babak)
                ->where('id_perserta',$tim_biru)->count();
                $peringatan_babak = score::where('keterangan','peringatan')
                ->where('babak',$setting->babak)
                ->where('id_perserta',$tim_biru)->count();
            @endphp
            </tbody>    
        </table>
    </div>
    <div class="button-section">
        <div class="button-blue-container">
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_biru}} babak:{{$setting->babak}} status:jatuh p:3 keterangan:plus" id="kirimData" class="btn btn-primary button-blue">JATUHAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_biru}} babak:{{$setting->babak}} status:binaan p:0 keterangan:plus" id="kirimData" class="btn btn-primary button-blue"@if ($bina_babak === 2)
                disabled
            @endif>BINAAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_biru}} babak:{{$setting->babak}} status:teguran p:1 keterangan:plus" id="kirimData" class="btn btn-primary button-blue"@if ($teguran_babak === 2)
                disabled
            @endif>TEGURAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_biru}} babak:{{$setting->babak}} status:peringatan p:5 keterangan:plus" id="kirimData" class="btn btn-primary button-blue"@if ($peringatan_babak === 3)
                disabled
            @endif>PERINGATAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_biru}} babak:{{$setting->babak}} status:jatuh p:3 keterangan:minus" id="kirimData" class=" btn btn-secondary button-blue-delete">HAPUS JATUHAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_biru}} babak:{{$setting->babak}} status:binaan p:0 keterangan:minus" id="kirimData" class=" btn btn-secondary button-blue-delete">HAPUS BINAAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_biru}} babak:{{$setting->babak}} status:teguran p:1 keterangan:minus" id="kirimData" class=" btn btn-secondary button-blue-delete">HAPUS TEGURAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_biru}} babak:{{$setting->babak}} status:peringatan p:5 keterangan:minus" id="kirimData" class=" btn btn-secondary button-blue-delete">HAPUS PERINGATAN</button>
        </div>
        <div class="mid-container">
            <button type="button"  data-bs-toggle="modal" data-bs-target="#vjatuhan" class="button-jatuhan">Verifikasi <br>Jatuhan</button>
            <button type="button"  data-bs-toggle="modal" data-bs-target="#vhukuman" class="button-jatuhan">Verifikasi <br>Hukuman</button>
            <table class="score-table">
                <tbody>
                    @php
                        $plus1 = score::where('status','plus')->where('id_perserta',$tim_biru)->sum('score');
                        $minus1 = score::where('status','minus')->where('id_perserta',$tim_biru)->sum('score'); 
                        $score1 = $plus1 - $minus1;
                        $plus2 = score::where('status','plus')->where('id_perserta',$tim_merah)->sum('score');
                        $minus2 = score::where('status','minus')->where('id_perserta',$tim_merah)->sum('score'); 
                        $score2 = $plus2 - $minus2;
                    @endphp
                    <tr>
                        <td><span style="color: rgba(0, 102, 255, 1) ;">{{$score1}}</span></td>
                        <td><span style="color: rgba(241, 0, 0, 1);">{{$score2}}</span></td>
                    </tr>
                </tbody>
            </table>
        @php
            $jatuh_babak = score::where('keterangan','jatuh')
            ->where('babak',$setting->babak)
            ->where('id_perserta',$tim_merah)->count();
            $bina_babak =  score::where('keterangan','binaan')
            ->where('babak',$setting->babak)
            ->where('id_perserta',$tim_merah)->count();
            $teguran_babak = score::where('keterangan','teguran')
            ->where('babak',$setting->babak)
            ->where('id_perserta',$tim_merah)->count();
            $peringatan_babak = score::where('keterangan','peringatan')
            ->where('babak',$setting->babak)
            ->where('id_perserta',$tim_merah)->count();
        @endphp
        </div>
        <div class="button-blue-container">
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_merah}} babak:{{$setting->babak}} status:jatuh p:3 keterangan:minus" id="kirimData" class=" btn btn-secondary button-blue-delete">HAPUS JATUHAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_merah}} babak:{{$setting->babak}} status:binaan p:0 keterangan:minus" id="kirimData" class=" btn btn-secondary button-blue-delete">HAPUS BINAAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_merah}} babak:{{$setting->babak}} status:teguran p:1 keterangan:minus" id="kirimData" class=" btn btn-secondary button-blue-delete">HAPUS TEGURAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_merah}} babak:{{$setting->babak}} status:peringatan p:5 keterangan:minus" id="kirimData" class=" btn btn-secondary button-blue-delete">HAPUS PERINGATAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_merah}} babak:{{$setting->babak}} status:jatuh p:3 keterangan:plus" id="kirimData" class="btn btn-danger button-red">JATUHAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_merah}} babak:{{$setting->babak}} status:binaan p:0 keterangan:plus" id="kirimData" class="btn btn-danger button-red"@if ($bina_babak === 2)
            disabled
        @endif>BINAAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_merah}} babak:{{$setting->babak}} status:teguran p:1 keterangan:plus" id="kirimData" class="btn btn-danger button-red"@if ($teguran_babak === 2)
            disabled
        @endif>TEGURAN</button>
            <button name=" arena:{{$id_arena}}juri:{{$id_juri}} id:{{$tim_merah}} babak:{{$setting->babak}} status:peringatan p:5 keterangan:plus" id="kirimData" class="btn btn-danger button-red"@if ($peringatan_babak === 3)
            disabled
        @endif>PERINGATAN</button>
        </div>
        <div class="modal fade" id="vjatuhan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropJatuhan" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Verifikasi Jatuhan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>Juri</th>
                                    <th>Keputusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                   $njatuhan=score::where('keterangan','jatuhan')->where('status','notif')->get();
                                @endphp
                                    @foreach ($njatuhan as $item)
                                    <tr>
                                        <td style="" >{{$item->id_juri}}</td>
                                        @php
                                                $biru = PersertaModel::where('id_pesilat',$item->id_perserta)->value('id');
                                                $biru = Setting::where('biru',$biru)->value('biru');
                                                if (!empty($biru)) {
                                                $color = "color: rgba(0, 102, 255, 1)";
                                                $text = 'tim1';
                                                }
                                            else {
                                                $color = "color: rgba(241, 0, 0, 1)";
                                                $text = 'tim2';
                                            }
                                        @endphp
                                        <td  style="{{ !empty($biru) ? 'color: rgba(0, 102, 255, 1)' : 'color: rgba(241, 0, 0, 1)' }}">{{$text}}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
              </div>
        </div>
    </div>  
        <div class="modal fade" id="vhukuman" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-labelledby="staticBackdropLabelHukuman" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Verifikasi Jatuhan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>Juri</th>
                                    <th>Keputusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                   $njatuhan=score::where('keterangan','hukuman')->where('status','notif')->get();
                                @endphp
                                    @foreach ($njatuhan as $item)
                                    <tr>
                                        <td style="" >{{$item->id_juri}}</td>
                                        @php
                                                $biru = PersertaModel::where('id_pesilat',$item->id_perserta)->value('id');
                                                $biru = Setting::where('biru',$biru)->value('biru');
                                                if (!empty($biru)) {
                                                $color = "color: rgba(0, 102, 255, 1)";
                                                $text = 'tim1';
                                                }
                                            else {
                                                $color = "color: rgba(241, 0, 0, 1)";
                                                $text = 'tim2';
                                            }
                                        @endphp
                                        <td  style="{{ !empty($biru) ? 'color: rgba(0, 102, 255, 1)' : 'color: rgba(241, 0, 0, 1)' }}">{{$text}}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
              </div>
        </div>
    </div>

    <script>
        // Temukan semua tombol dengan kelas "btn btn-primary button-blue" atau "btn btn-primary btn btn-secondary button-blue-delete"
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
                    // window.location.reload();
                }
                setInterval(reload, 800);
                    });
        });
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>