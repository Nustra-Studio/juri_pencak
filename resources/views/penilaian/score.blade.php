<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/score/score.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @php
        Use App\score;
    @endphp
</head>
<body>
    @php
    $plus1 = score::where('status','plus')->where('id_perserta','1')->sum('score');
    $minus1 = score::where('status','minus')->where('id_perserta','1')->sum('score'); 
    $score1 = $plus1 - $minus1;
    $plus2 = score::where('status','plus')->where('id_perserta','2')->sum('score');
    $minus2 = score::where('status','minus')->where('id_perserta','2')->sum('score'); 
    $score2 = $plus2 - $minus2;
@endphp
    <div class="header-body">
        <div class="header-title">
            NUSANTARA CUP
        </div>
        <div class="mid-header">
            <img src="../assets/Assets/header.png" alt="" style="position: relative; left: -50%; height: 40px; margin-bottom: 30px;">
            <div class="mid-text">
                <div class="mid-text-title">Pencak Silat</div>
            </div>
        </div>
        <div class="header-pict">
            <img src="../assets/Assets/psht.png" alt="" style="width: 100%; height: 80%; margin-left: auto;">
            <img src="../assets/Assets/IPSI.png" alt="" style="width: 100%; height: 80%; margin-left: auto;">
        </div>
    </div>
    <div class="player-detail">
        <div class="blue-container">
            <div class="blue-player-img">
                <img src="../assets/Assets/Ellipse 2.png" alt="" style="height: 50px; z-index: 1;">
                <img src="../assets/Assets/karate.png" alt="" style="height: 35px; position: absolute; right: 0; left: 10px;top: 5px;">
            </div>
            <div class="blue-player-text">
                SMA 1 <br> JEMBER
            </div>
        </div>
        <div class="mid-container">
            <div class="mid-container-text">
                ARENA 1 <br>
                PENYISIHAN - DEWASA (4 PA) <br>
                <div class="mid-container-timer">
                    <div class="timer-box ">
                        03:00
                    </div>
                </div>
            </div>
        </div>
        <div class="red-container">
            <div class="red-player-text">
                SMKN 1<br> NGANJUK
            </div>
            <div class="red-player-img">
                <img src="../assets/Assets/Ellipse 1.png" alt="" style="height: 50px; z-index: 1;">
                <img src="../assets/Assets/karate (1).png" alt="" style="height: 35px; position: absolute; right: 0; left: 10px;top: 5px;">
            </div>
        </div>
    </div>
    <div class="score-section">
        <div class="score-area">
            <div class="score-blue">
                @php
                $jatuh = score::where('keterangan','jatuh')->where('id_perserta','2')->count();
                $bina =  score::where('keterangan','binaan')->where('id_perserta','2')->count();
                $teguran = score::where('keterangan','teguran')->where('id_perserta','2')->count();
                $peringatan = score::where('keterangan','peringatan')->where('id_perserta','2')->count();
            @endphp
                <div class="score-blue-text">
                    BINAAN
                </div>
                <div class="score-blue-point-wrap">
                    <div class="score-blue-point">
                        x {{$bina}}
                    </div>
                </div>
                <div class="score-blue-image">
                    <img src="../assets/Assets/point blue.png" alt="" class="point-image">
                </div>
            </div>
            <div class="score-blue">
                <div class="score-blue-text">
                    TEGURAN
                </div>
                <div class="score-blue-point-wrap">
                    <div class="score-blue-point">
                        x {{$teguran}}
                    </div>
                </div>
                <div class="score-blue-image">
                    <img src="../assets/Assets/man blue.png" alt="" class="point-image">
                </div>
            </div>
            <div class="score-blue">
                <div class="score-blue-text">
                    PERINGATAN
                </div>
                <div class="score-blue-point-wrap">
                    <div class="score-blue-point">
                        x {{$peringatan}}
                    </div>
                </div>
                <div class="score-blue-image">
                    <img src="../assets/Assets/signal blue.png" alt="" class="point-image">
                </div>
            </div>
            <div class="score-blue">
                <div class="score-blue-text">
                    JATUHAN
                </div>
                <div class="score-blue-point-wrap">
                    <div class="score-blue-point">
                        x {{$jatuh}}
                    </div>
                </div>
                <div class="score-blue-image">
                    <img src="../assets/Assets/judo blue.png" alt="" class="point-image">
                </div>
            </div>
        </div>
        <div class="total-point-area">
            <div class="total-point-area-text">{{$score2}}</div>
        </div>
        <div class="babak-area">
            <div class="babak-area-box">
                <div class="babak-area-box-text-babak">BABAK</div>
            </div>
            <div class="babak-area-box-ronde">
                <div class="babak-area-box-text">I</div>
            </div>
            <div class="babak-area-box-ronde">
                <div class="babak-area-box-text">II</div>
            </div>
            <div class="babak-area-box-ronde">
                <div class="babak-area-box-text">III</div>
            </div>
        </div>
        <div class="total-point-area-red">
            <div class="total-point-area-text">{{$score1}}</div>
        </div>
        @php
        $jatuh = score::where('keterangan','jatuh')->where('id_perserta','1')->count();
        $bina =  score::where('keterangan','binaan')->where('id_perserta','1')->count();
        $teguran = score::where('keterangan','teguran')->where('id_perserta','1')->count();
        $peringatan = score::where('keterangan','peringatan')->where('id_perserta','1')->count();
    @endphp
        <div class="score-area">
            <div class="score-red">
                <div class="score-red-point-wrap">
                    <div class="score-red-point">
                        x{{$bina}}
                    </div>
                </div>
                <div class="score-red-image">
                    <img src="../assets/Assets/point red.png" alt="" class="point-image-red">
                </div>
                <div class="score-red-text">
                    BINAAN
                </div>
            </div>
            <div class="score-red">
                <div class="score-red-point-wrap">
                    <div class="score-red-point">
                        x {{$teguran}}
                    </div>
                </div>
                <div class="score-red-image">
                    <img src="../assets/Assets/man red.png" alt="" class="point-image-red">
                </div>
                <div class="score-red-text">
                    TEGURAN
                </div>
            </div>
            <div class="score-red">
                <div class="score-red-point-wrap">
                    <div class="score-red-point">
                        x {{$peringatan}}
                    </div>
                </div>
                <div class="score-red-image">
                    <img src="../assets/Assets/signal red.png" alt="" class="point-image-red">
                </div>
                <div class="score-red-text">
                    PERINGATAN
                </div>
            </div>
            <div class="score-red">
                <div class="score-red-point-wrap">
                    <div class="score-red-point">
                        x {{$jatuh}}
                    </div>
                </div>
                <div class="score-red-image">
                    <img src="../assets/Assets/olympic-judo-couple-silhouette.png" alt="" class="point-image-red">
                </div>
                <div class="score-red-text">
                    JATUHAN
                </div>
            </div>
        </div>
    </div>
    <div class="juri-info-section">
        <div class="juri-info-section-blue">
            <div class="juri-info-item-blue">J3</div>
            <div class="juri-info-item-blue">J2</div>
            <div class="juri-info-item-blue">J1</div>
            <div class="juri-info-item-center">
                <div class="juri-info-item-center-item">
                    PUKULAN <br>
                    <img src="../assets/Assets/fist (2).png" alt="" style="height: 30px;">
                </div>
            </div>
            <div class="juri-info-item-red">J1</div>
            <div class="juri-info-item-red">J2</div>
            <div class="juri-info-item-red">J3</div>

        </div>
        <div class="juri-info-section-blue">
            <div class="juri-info-item-blue">J3</div>
            <div class="juri-info-item-blue">J2</div>
            <div class="juri-info-item-blue">J1</div>
            <div class="juri-info-item-center-2">
                <div class="juri-info-item-center-item">
                    <img src="../assets/Assets/kciks.png" alt="" style="height: 30px;"> <br>
                    Tendangan
                </div>
            </div>
            <div class="juri-info-item-red">J1</div>
            <div class="juri-info-item-red">J3</div>
            <div class="juri-info-item-red">J2</div>
        </div>
    </div>
    <div class="running-text">
        <img src="../assets/Assets/Ayo Silat.png" alt="" style="width: 70px; background-color: aliceblue; border-radius: 3px; border: 1px solid black;"> 
        Pertandingan Pencak Silat Kediri Telah dimulai || Pertandingan hari ini dimulai sore Hari || kunjungi ayosilat.com untuk melihat update
    </div>
</body>
</html>