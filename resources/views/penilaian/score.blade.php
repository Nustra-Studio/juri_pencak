<!DOCTYPE html>
<html lang="en">        
<head>
    <meta charset="UTF-8">
    {{-- <link rel="stylesheet" href="../assets/score/score.css"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Score</title>
    @php
        Use App\score;
        Use App\Setting;
        Use App\KontigenModel;
        Use App\PersertaModel;
        $data = Setting::where('arena',$arena)->first();
        $babak = $data->babak;
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
<div class="d-none" name="{{$babak}}" id="babakid"></div>
  <div class="d-none" name="{{$arena}}" id="arenaid"></div>
    <div id=""name="" class="header-body">
        <div id=""name="" class="header-title">
            SH TERATE CUP 1, Ranting Kota, Cabang Kota Kediri
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
            <div id=""name="" class="blue-player-text text-primary text-start align-self-center mt-2 fw-bold">
				Tim Biru
            </div>
        </div>
        <div id=""name="" class="mid-container mt-2">
            <div id=""name="" class="mid-container-text">
              
                ARENA {{$arena}} <br>
                PENYISIHAN - DEWASA (4 PA) <br>
                <div id=""name="" class="mid-container-timer">
                    <div id=""name="timer" class="py-0 fs-4 px-4 bg-black border border-primary text-light rounded fw-bold">
                        03:00
                    </div>
                </div>
            </div>
        </div>
        <div id=""name="" class="red-container" style="width: 200px;">
            <div id=""name="" class="red-player-text text-danger text-center align-self-center fw-bold">
                Tim Merah
            </div>
            <div id=""name="" class="red-player-img">
                <img src="../assets/Assets/Ellipse 1.png" alt="" style="height: 50px; z-index: 1;">
                <img src="../assets/Assets/karate (1).png" alt="" style="height: 35px; position: absolute; right: 0; left: 10px;top: 5px;">
            </div>
        </div>
    </div>
    <div id=""name="" class="score-section">
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
        <div id=""name="" class="total-point-area" style="width: 27%; height: 370px;">
            <div id="score2" name="{{$id_perserta_1}}" class="total-point-area-text" style="font-size: 23vw"></div>
        </div>
        <div id=""name="" class="babak-area">
            <div id=""name="" class="babak-area-box">
                <div id=""name="" class="babak-area-box-text-babak">BABAK</div>
            </div>
            <div id="babaksatu"name="" class="babak-area-box-ronde ">
                <div id=""name="" class="babak-area-box-text">I</div>
            </div>
            <div id="babakdua"name="" class="babak-area-box-ronde ">
                <div id=""name="" class="babak-area-box-text">II</div>
            </div>
            <div id="babaktiga"name="" class="babak-area-box-ronde ">
                <div id=""name="" class="babak-area-box-text">III</div>
            </div>
        </div>
        <div id=""name="" class="total-point-area-red" style="width: 27%; height: 370px;">
            <div id="score1" name="{{$id_perserta_2}}" class="total-point-area-text" style="font-size: 23vw"></div>
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
    <div class="container d-flex justify-content-center align-items-center gap-5" style="width: 700px;">
        <table class="table table-bordered border-3 border-dark" style="width: 450px;">
            <thead class="table-secondary">
                <tr>
                    <th colspan="3" class="text-center text-primary">Indikator Jatuhan</th>
                </tr>
            </thead>
            <tbody class="text-center fw-bold">
                <tr>
                    <td id="j1" class="">J1</td>
                    <td id="j2" class="">J2</td>
                    <td id="j3" class="">J3</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered rounded  border-3 border-dark" style="width: 450px;">
            <thead class="table-secondary">
                <tr>
                    <th colspan="3" class="text-center text-danger">Indikator Hukuman</th>
                </tr>
            </thead>
            <tbody class="text-center fw-bold">
                <tr>
                  	<td id="h3" class="">J3</td>
                  	<td id="h2" class="">J2</td>
                    <td id="h1" class="">J1</td>
                    
                    
                </tr>
            </tbody>
        </table>
    </div>
    <div id=""name="" class="running-text">
        <img src="../assets/Assets/Ayo Silat.png" alt="" style="width: 70px; background-color: aliceblue; border-radius: 3px; border: 1px solid black;"> 
        <marquee behavior="" direction="Running">
            SH TERATE CUP 1, Ranting Kota, Cabang Kota Kediri Telah Di Mulai || Info Lebih Lanjut kunjungi IG @ayosilat atau menghubungi 0856-4909-2072 || kunjungi ayosilat.com untuk melihat update
        </marquee>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function calldata() {
                var babakDiv =   document.getElementById("babakid");
                var IdBabak = babakDiv.getAttribute("name");
            function jatuh1() {
                var elemenDiv = document.getElementById("jatuh1"); // Mendapatkan elemen dengan ID "jatuh1"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=jatuh&babak='+ IdBabak +'',
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
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=jatuh&babak='+ IdBabak +'',
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
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=binaan&babak='+ IdBabak +'',
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
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=binaan&babak='+ IdBabak +'',
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
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=teguran&babak='+ IdBabak +'',
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
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=teguran&babak='+ IdBabak +'',
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
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=peringatan&babak='+ IdBabak +'',
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
                    url: '/call-data/?tipe=detail&id=' + id + '&kt=peringatan&babak='+ IdBabak +'',
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
                    url: '/call-data/?tipe=score&id=' + id + '&kt=score&babak='+ IdBabak +'',
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
              var arenadiv = document.getElementById("arenaid");
                var arena = arenadiv.getAttribute("name");
                var elemenDiv = document.getElementById("score1"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=check&id=' + id + '&kt=check&babak='+ IdBabak +'&arena'+ arena +'',
                    method: 'GET',
                    success: function (response) {
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function updatescore2 (){
                var arenadiv = document.getElementById("arenaid");
                var arena = arenadiv.getAttribute("name");
                var elemenDiv = document.getElementById("score2"); // Mendapatkan elemen dengan ID "bina2"
                var id = elemenDiv.getAttribute("name"); // Mengambil nilai ID elemen
                $.ajax({
                    url: '/call-data/?tipe=check&id=' + id + '&kt=check&babak='+ IdBabak +'&arena'+ arena +'',
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
                    url: '/call-data/?tipe=score&id=' + id + '&kt=score&babak='+ IdBabak +'',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        $('#score2').text(response.data);
                        console.log(response.data);
                        // Panggil kembali fungsi untuk polling berikutnya
                    }
                });
            }
            function babak1() {
                var babaksatu = document.getElementById('babaksatu');
                var babakdua = document.getElementById('babakdua');
                var babaktiga = document.getElementById('babaktiga');
                babakdua.classList.remove('by');
                babaktiga.classList.remove('by');
                babaksatu.classList.add('by');
            }

            function babak2() {
                var babaksatu = document.getElementById('babaksatu');
                var babakdua = document.getElementById('babakdua');
                var babaktiga = document.getElementById('babaktiga');
                babakdua.classList.add('by');
                babaktiga.classList.remove('by');
                babaksatu.classList.remove('by');
            }

            function babak3() {
                var babaksatu = document.getElementById('babaksatu');
                var babakdua = document.getElementById('babakdua');
                var babaktiga = document.getElementById('babaktiga');
                babakdua.classList.remove('by');
                babaktiga.classList.add('by');
                babaksatu.classList.remove('by');
            }

            function changebabak() {
                var elemenDiv = document.getElementById("arenaid");
                var id = elemenDiv.getAttribute("name");
                $.ajax({
                    url: '/call-data/?tipe=checkbabak&id=' + id + '',
                    method: 'GET',
                    success: function (response) {
                        console.log(response.data);
                        var idbabak = response.data;
                        if (idbabak == 1) {
                            babak1();
                        } else if (idbabak == 2) {
                            babak2();
                        } else if (idbabak == 3) {
                            babak3();
                        }
                    }
                });
            }
			function jatuhan1() {
                var elemenDiv = document.getElementById("arenaid");
                var id = elemenDiv.getAttribute("name");
                $.ajax({
                    url: '/call-data/?tipe=checkjatuhan&arena=' + id + '&juri=juri_1',
                    method: 'GET',
                    success: function (response) {
                        console.log(response.data);
                        var color = response.data;
                        if (color == "merah") {
                           var jatuhan = document.getElementById('j1');
                          	jatuhan.setAttribute('class', '');
                			jatuhan.classList.add('bg-danger');
                        } else if (color == "biru") {
                              var jatuhan = document.getElementById('j1');
                              jatuhan.setAttribute('class', '');
                                jatuhan.classList.add('bg-primary');
                        } else{
                             var jatuhan = document.getElementById('j1');
                			 jatuhan.setAttribute('class', '');
                        }
                    }
                });
            }
          			function jatuhan2() {
                var elemenDiv = document.getElementById("arenaid");
                var id = elemenDiv.getAttribute("name");
                $.ajax({
                    url: '/call-data/?tipe=checkjatuhan&arena=' + id + '&juri=juri_2',
                    method: 'GET',
                    success: function (response) {
                        console.log(response.data);
                        var color = response.data;
                        if (color == "merah") {
                           var jatuhan = document.getElementById('j2');
                          	jatuhan.setAttribute('class', '');
                			jatuhan.classList.add('bg-danger');
                        } else if (color == "biru") {
                              var jatuhan = document.getElementById('j2');
                              jatuhan.setAttribute('class', '');
                                jatuhan.classList.add('bg-primary');
                        } else{
                             var jatuhan = document.getElementById('j2');
                			 jatuhan.setAttribute('class', '');
                        }
                    }
                });
            }
          			function jatuhan3() {
                        var elemenDiv = document.getElementById("arenaid");
                        var id = elemenDiv.getAttribute("name");
                        $.ajax({
                            url: '/call-data/?tipe=checkjatuhan&arena=' + id + '&juri=juri_3',
                            method: 'GET',
                            success: function (response) {
                                console.log(response.data);
                                var color = response.data;
                                if (color == "merah") {
                                   var jatuhan = document.getElementById('j3');
                                    jatuhan.setAttribute('class', '');
                                    jatuhan.classList.add('bg-danger');
                                } else if (color == "biru") {
                                      var jatuhan = document.getElementById('j3');
                                      jatuhan.setAttribute('class', '');
                                        jatuhan.classList.add('bg-primary');
                                } else{
                                     var jatuhan = document.getElementById('j3');
                                     jatuhan.setAttribute('class', '');
                                }
                            }
                        });
            }
            function hukuman1() {
                          var elemenDiv = document.getElementById("arenaid");
                          var id = elemenDiv.getAttribute("name");
                          $.ajax({
                              url: '/call-data/?tipe=checkhukuman&arena=' + id + '&juri=juri_1',
                              method: 'GET',
                              success: function (response) {
                                  console.log(response.data);
                                  var color = response.data;
                                  var jatuhan = document.getElementById('h1');
                                  if (color == "merah") {
                                      jatuhan.setAttribute('class', '');
                                      jatuhan.classList.add('bg-danger');
                                  } else if (color == "biru") {
                                        jatuhan.setAttribute('class', '');
                                          jatuhan.classList.add('bg-primary');
                                  } else{
                                       jatuhan.setAttribute('class', '');
                                  }
                              }
                          });
              }
          function hukuman2() {
                          var elemenDiv = document.getElementById("arenaid");
                          var id = elemenDiv.getAttribute("name");
                          $.ajax({
                              url: '/call-data/?tipe=checkhukuman&arena=' + id + '&juri=juri_2',
                              method: 'GET',
                              success: function (response) {
                                  console.log(response.data);
                                  var color = response.data;
                                  var jatuhan = document.getElementById('h2');
                                  if (color == "merah") {
                                      jatuhan.setAttribute('class', '');
                                      jatuhan.classList.add('bg-danger');
                                  } else if (color == "biru") {
                                        jatuhan.setAttribute('class', '');
                                          jatuhan.classList.add('bg-primary');
                                  } else{
                                       jatuhan.setAttribute('class', '');
                                  }
                              }
                          });
              }
          function hukuman3() {
                          var elemenDiv = document.getElementById("arenaid");
                          var id = elemenDiv.getAttribute("name");
                          $.ajax({
                              url: '/call-data/?tipe=checkhukuman&arena=' + id + '&juri=juri_3',
                              method: 'GET',
                              success: function (response) {
                                  console.log(response.data);
                                  var color = response.data;
                                  var jatuhan = document.getElementById('h3');
                                  if (color == "merah") {
                                      jatuhan.setAttribute('class', '');
                                      jatuhan.classList.add('bg-danger');
                                  } else if (color == "biru") {
                                        jatuhan.setAttribute('class', '');
                                          jatuhan.classList.add('bg-primary');
                                  } else{
                                       jatuhan.setAttribute('class', '');
                                  }
                              }
                          });
              }
            changebabak();
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
        setInterval(calldata, 500);
    </script>
</body>
</html>