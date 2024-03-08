<!DOCTYPE html>
<html lang="en">        
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/score/score.css">
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
    
    .total-point-area {
    background-color: var(--biru);
    width: 300px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
    }

    .total-point-area-red {
        background-color: var(--merah);
        width: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
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
        <div id=""name="" class="total-point-area" style="width: 27%; height: 100%;">
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
        <div id=""name="" class="total-point-area-red" style="width: 27%; height: 100%;">
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

    {{-- Modal Section --}}
    {{-- Jatuhan --}}
        <div class="modal" tabindex="-1" role="dialog" id="modalJatuhan">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Keputusan <span class="text-danger">Dewan Juri</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 text-center fs-1 ">
                                    Verifikasi <span class="text-primary">Jatuhan</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>
                                                    <div class="container border ">
                                                        J1 
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="container border ">
                                                        J2
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="container border ">
                                                        J3
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="container biru">
                                                        a
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="container merah">
                                                        a
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="container invalid">
                                                        a
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Indikator</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col d-flex justify-content-center justify-content-lg-end align-items-center">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                        </div>
                                                                        <div class="col ">
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="container biru">a</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col fw-lighter">
                                                                    Jatuhan Sah <br> Untuk sudut Biru
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col d-flex justify-content-center justify-content-lg-end align-items-center">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                        </div>
                                                                        <div class="col ">
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="container merah ">a</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col fw-lighter">
                                                                    Jatuhan Sah <br> Untuk sudut Merah
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col d-flex justify-content-center justify-content-lg-end align-items-center">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                        </div>
                                                                        <div class="col ">
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="container invalid">a</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col fw-lighter">
                                                                    Jatuhan Invalid <br>
                                                                    (Tidak Sah)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    {{-- Hukuman --}}
        <div class="modal" tabindex="-1" role="dialog" id="modalHukuman">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Keputusan <span class="text-danger">Dewan Juri</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 text-center fs-1 ">
                                    Verifikasi <span class="text-danger">Hukuman</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>
                                                    <div class="container border ">
                                                        J1 
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="container border ">
                                                        J2
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="container border ">
                                                        J3
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="container biru">
                                                        a
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="container merah">
                                                        a
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="container invalid">
                                                        a
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Indikator</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col d-flex justify-content-center justify-content-lg-end align-items-center">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                        </div>
                                                                        <div class="col ">
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="container biru">a</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col fw-lighter">
                                                                    Hukuman <br> Untuk sudut Biru
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col d-flex justify-content-center justify-content-lg-end align-items-center">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                        </div>
                                                                        <div class="col ">
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="container merah ">a</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col fw-lighter">
                                                                    Hukuman <br> Untuk sudut Merah
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col d-flex justify-content-center justify-content-lg-end align-items-center">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                        </div>
                                                                        <div class="col ">
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="container invalid">a</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col fw-lighter">
                                                                    Hukuman Invalid <br>
                                                                    (Tidak Sah)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @include('addon.tanding.core')
</body>
</html>