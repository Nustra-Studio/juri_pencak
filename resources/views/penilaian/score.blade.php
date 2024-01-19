<!DOCTYPE html>
<html lang="en">        
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/score/score.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    @php
        Use App\score;
        Use App\Setting;
        $data = Setting::first();
    @endphp
</head>
<style>
    .by {
        background-color: yellow;
    }
</style>
<body>
    @php
    
    $plus1 = score::where('status','plus')->where('id_perserta','4')->sum('score');
    $minus1 = score::where('status','minus')->where('id_perserta','4')->sum('score'); 
    $score1 = $plus1 - $minus1;
    $plus2 = score::where('status','plus')->where('id_perserta','6')->sum('score');
    $minus2 = score::where('status','minus')->where('id_perserta','6')->sum('score'); 
    $score2 = $plus2 - $minus2;
    $id_perserta_1 = $data->biru ;
    $id_perserta_2 = $data->merah;
@endphp
    <div id=""name="" class="header-body">
        <div id=""name="" class="header-title">
            NUSANTARA CUP
        </div>
        <div id=""name="" class="mid-header">
            <img src="../assets/Assets/header.png" alt="" style="position: relative; left: -50%; height: 40px; margin-bottom: 30px;">
            <div id=""name="" class="mid-text">
                <div id=""name="" class="mid-text-title">Pencak Silat</div>
            </div>
        </div>
        <div id=""name="" class="header-pict">
            <img src="../assets/Assets/psht.png" alt="" style="width: 100%; height: 60px; margin-left: auto;">
            <img src="../assets/Assets/IPSI.png" alt="" style="width: 100%; height: 60px; margin-left: auto;">
        </div>
    </div>
    <div id=""name="" class="player-detail" style="height: 100px;">
        <div id=""name="" class="blue-container">
            <div id=""name="" class="blue-player-img">
                <img src="../assets/Assets/Ellipse 2.png" alt="" style="height: 50px; z-index: 1;">
                <img src="../assets/Assets/karate.png" alt="" style="height: 35px; position: absolute; right: 0; left: 10px;top: 5px;">
            </div>
            <div id=""name="" class="blue-player-text">
                SMKN 1 <br> NGANJUK
            </div>
        </div>
        <div id=""name="" class="mid-container mt-2">
            <div id=""name="" class="mid-container-text">
                ARENA 1 <br>
                PENYISIHAN - DEWASA (4 PA) <br>
                <div id=""name="" class="mid-container-timer">
                    <div id=""name="timer" class="py-0 fs-4 px-4 bg-black border border-primary text-light rounded fw-bold">
                        03:00
                    </div>
                </div>
            </div>
        </div>
        <div id=""name="" class="red-container">
            <div id=""name="" class="red-player-text">
                SMA 1<br> JEMBER
            </div>
            <div id=""name="" class="red-player-img">
                <img src="../assets/Assets/Ellipse 1.png" alt="" style="height: 50px; z-index: 1;">
                <img src="../assets/Assets/karate (1).png" alt="" style="height: 35px; position: absolute; right: 0; left: 10px;top: 5px;">
            </div>
        </div>
    </div>
    <div id=""name="" class="score-section" style="width: 80%;">
        <div id=""name="" class="score-area">
            <div id=""name="" class="score-blue">
                @php
                $jatuh = score::where('keterangan','jatuh')->where('id_perserta','2')->count();
                $bina =  score::where('keterangan','binaan')->where('id_perserta','2')->count();
                $teguran = score::where('keterangan','teguran')->where('id_perserta','2')->count();
                $peringatan = score::where('keterangan','peringatan')->where('id_perserta','2')->count();
            @endphp
                <div id=""name="" class="score-blue-text">
                    BINAAN
                </div>
                <div id=""name="" class="score-blue-point-wrap">
                    <div id="bina2"name="{{$id_perserta_1}}"  class="score-blue-point">
                        x {{$bina}}
                    </div>
                </div>
                <div id=""name="" class="score-blue-image">
                    <img src="../assets/Assets/point blue.png" alt="" class="point-image">
                </div>
            </div>
            <div id=""name="" class="score-blue">
                <div id=""name="" class="score-blue-text">
                    TEGURAN
                </div>
                <div id=""name="" class="score-blue-point-wrap">
                    <div id="teguran2"name="{{$id_perserta_1}}" class="score-blue-point">
                        x {{$teguran}}
                    </div>
                </div>
                <div id=""name="" class="score-blue-image">
                    <img src="../assets/Assets/man blue.png" alt="" class="point-image">
                </div>
            </div>
            <div id=""name="" class="score-blue">
                <div id=""name="" class="score-blue-text">
                    PERINGATAN
                </div>
                <div id=""name="" class="score-blue-point-wrap">
                    <div id="peringatan2"name="{{$id_perserta_1}}" class="score-blue-point">
                        x {{$peringatan}}
                    </div>
                </div>
                <div id=""name="" class="score-blue-image">
                    <img src="../assets/Assets/signal blue.png" alt="" class="point-image">
                </div>
            </div>
            <div id=""name="" class="score-blue">
                <div id=""name="" class="score-blue-text">
                    JATUHAN
                </div>
                <div id=""name="" class="score-blue-point-wrap">
                    <div id="jatuh2"name="{{$id_perserta_1}}" class="score-blue-point">
                        x {{$jatuh}}
                    </div>
                </div>
                <div id=""name="" class="score-blue-image">
                    <img src="../assets/Assets/judo blue.png" alt="" class="point-image">
                </div>
            </div>
        </div>
        <div id=""name="" class="total-point-area" style="width: 400px;">
            <div id="score2" name="{{$id_perserta_1}}" class="total-point-area-text"></div>
        </div>
        <div id=""name="" class="babak-area">
            <div id=""name="" class="babak-area-box">
                <div id=""name="" class="babak-area-box-text-babak">BABAK</div>
            </div>
            <div id=""name="" class="babak-area-box-ronde by">
                <div id=""name="" class="babak-area-box-text">I</div>
            </div>
            <div id=""name="" class="babak-area-box-ronde">
                <div id=""name="" class="babak-area-box-text">II</div>
            </div>
            <div id=""name="" class="babak-area-box-ronde">
                <div id=""name="" class="babak-area-box-text">III</div>
            </div>
        </div>
        <div id=""name="" class="total-point-area-red">
            <div id="score1" name="{{$id_perserta_2}}" class="total-point-area-text"></div>
        </div>
        @php
        $jatuh = score::where('keterangan','jatuh')->where('id_perserta','1')->count();
        $bina =  score::where('keterangan','binaan')->where('id_perserta','1')->count();
        $teguran = score::where('keterangan','teguran')->where('id_perserta','1')->count();
        $peringatan = score::where('keterangan','peringatan')->where('id_perserta','1')->count();
    @endphp
        <div id=""name="" class="score-area">
            <div id=""name="" class="score-red">
                <div id=""name="" class="score-red-point-wrap">
                    <div id="bina1" name="{{$id_perserta_2}}" class="score-red-point">
                        x{{$bina}}
                    </div>
                </div>
                <div id=""name="" class="score-red-image">
                    <img src="../assets/Assets/point red.png" alt="" class="point-image-red">
                </div>
                <div id=""name="" class="score-red-text">
                    BINAAN
                </div>
            </div>
            <div id="" name="" class="score-red">
                <div id="" name="" class="score-red-point-wrap">
                    <div id="teguran1" name="{{$id_perserta_2}}" class="score-red-point">
                        x 
                    </div>
                </div>
                <div id=""name="" class="score-red-image">
                    <img src="../assets/Assets/man red.png" alt="" class="point-image-red">
                </div>
                <div id=""name="" class="score-red-text">
                    TEGURAN
                </div>
            </div>
            <div id=""name="" class="score-red">
                <div id=""name="" class="score-red-point-wrap">
                    <div id="peringatan1"name="{{$id_perserta_2}}" class="score-red-point">
                        x {{$peringatan}}
                    </div>
                </div>
                <div id=""name="" class="score-red-image">
                    <img src="../assets/Assets/signal red.png" alt="" class="point-image-red">
                </div>
                <div id=""name="" class="score-red-text">
                    PERINGATAN
                </div>
            </div>
            <div id=""name="" class="score-red">
                <div id=""name="" class="score-red-point-wrap">
                    <div id="jatuh1"name="{{$id_perserta_2}}" class="score-red-point">
                        
                    </div>
                </div>
                <div id=""name="" class="score-red-image">
                    <img src="../assets/Assets/olympic-judo-couple-silhouette.png" alt="" class="point-image-red">
                </div>
                <div id=""name="" class="score-red-text">
                    JATUHAN
                </div>
            </div>
        </div>
    </div>
    <div id=""name="" class="juri-info-section">
        <div id=""name="" class="juri-info-section-blue">
            <div id=""name="" class="juri-info-item-blue">J3</div>
            <div id=""name="" class="juri-info-item-blue">J2</div>
            <div id=""name="" class="juri-info-item-blue">J1</div>
            <div id=""name="" class="juri-info-item-center">
                <div id=""name="" class="juri-info-item-center-item">
                    PUKULAN <br>
                    <img src="../assets/Assets/fist (2).png" alt="" style="height: 30px;">
                </div>
            </div>
            <div id=""name="" class="juri-info-item-red">J1</div>
            <div id=""name="" class="juri-info-item-red">J2</div>
            <div id=""name="" class="juri-info-item-red">J3</div>

        </div>
        <div id=""name="" class="juri-info-section-blue">
            <div id=""name="" class="juri-info-item-blue">J3</div>
            <div id=""name="" class="juri-info-item-blue">J2</div>
            <div id=""name="" class="juri-info-item-blue">J1</div>
            <div id=""name="" class="juri-info-item-center-2">
                <div id=""name="" class="juri-info-item-center-item">
                    <img src="../assets/Assets/kciks.png" alt="" style="height: 30px;"> <br>
                    Tendangan
                </div>
            </div>
            <div id=""name="" class="juri-info-item-red">J1</div>
            <div id=""name="" class="juri-info-item-red">J3</div>
            <div id=""name="" class="juri-info-item-red">J2</div>
        </div>
    </div>
    <div id=""name="" class="running-text">
        <img src="../assets/Assets/Ayo Silat.png" alt="" style="width: 70px; background-color: aliceblue; border-radius: 3px; border: 1px solid black;"> 
        <marquee behavior="" direction="Running">
            Pertandingan Pencak Silat Kediri Telah dimulai || Pertandingan hari ini dimulai sore Hari || kunjungi ayosilat.com untuk melihat update
        </marquee>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function calldata() {
            function jatuh1() {
                var elemenDiv = document.getElementById("jatuh1"); // Mendapatkan elemen dengan ID "jatuh1"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=jatuh',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#jatuh1').text('x'+' ' + response.data);
                        console.log(response.data);
                    }
                });
            }
            function jatuh2() {
                var elemenDiv = document.getElementById("jatuh2"); // Mendapatkan elemen dengan ID "jatuh2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=jatuh',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#jatuh2').text('x'+' ' + response.data);
                        console.log(response.data);

                    }
                });
            }
            function bina1 (){
                var elemenDiv = document.getElementById("bina1"); // Mendapatkan elemen dengan ID "bina1"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=binaan',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#bina1').text('x'+' ' + response.data);
                        console.log(response.data);

                    }
                });
            }
            function bina2 (){
                var elemenDiv = document.getElementById("bina2"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=binaan',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#bina2').text('x'+' ' + response.data);
                        console.log(response.data);

                    }
                });
            }
            function teguran1 (){
                var elemenDiv = document.getElementById("teguran1"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=teguran',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#teguran1').text('x'+' ' + response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function teguran2 (){
                var elemenDiv = document.getElementById("teguran2"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=teguran',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#teguran2').text('x'+' ' + response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function peringatan1 (){
                var elemenDiv = document.getElementById("peringatan1"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=peringatan',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#peringatan1').text('x'+' ' + response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function peringatan2 (){
                var elemenDiv = document.getElementById("peringatan2"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=peringatan',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#peringatan2').text('x'+' ' + response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function score1 (){
                var elemenDiv = document.getElementById("score1"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=score&id=' + id + '&kt=score',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#score1').text(response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function updatescore1 (){
                var elemenDiv = document.getElementById("score1"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=check&id=' + id + '&kt=check',
                    method: 'GET',
                    success: function (response) {
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function updatescore2 (){
                var elemenDiv = document.getElementById("score2"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=check&id=' + id + '&kt=check',
                    method: 'GET',
                    success: function (response) {
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function score2 (){
                var elemenDiv = document.getElementById("score2"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=score&id=' + id + '&kt=score',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#score2').text(response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            jatuh1();
            jatuh2();
            bina1();
            bina2();
            teguran1();
            teguran2();
            peringatan1();
            peringatan2();
            score1();
            score2();
            updatescore1();
            updatescore2();

        }

        calldata();
        setInterval(calldata, 1500);
    </script>
</body>
</html>