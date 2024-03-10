<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/seni/ScoreSeni.css">
    <title>Seni Score</title>
    @php
            use App\score;
            use App\Setting;
            use App\PersertaModel;
            use App\KontigenModel;
            $setting = Setting::where('arena',$arena)->first();
            $perserta = PersertaModel::where('id',$setting->biru)->first(); 
            if(empty($perserta)) {
                echo "<script>window.history.back();</script>";
                exit;
            }
            $id_perserta = $perserta->id;
            $kontigen = KontigenModel::where('id',$perserta->id_kontigen)->value('kontigen');
    @endphp
</head>
<body>
    <!-- Header Section -->
    <div class="container-fluid" style="background-color: #0066FF; height: 60px; color: #F5F5F5;">
        <div class="row " style="height: 100%;">
            <div class="col d-flex justify-content-end align-items-center fs-3">
                <span class="me-3">DEWASA</span>
            </div>
            <div class="col h100">
                <div class="container position-relative h100 d-flex justify-content-center fs-3" style="height: 70%;">
                    <img src="../assets/Assets/header.png" alt="" style="width: 100%;">
                    <div class="text-on-image h100 w100 d-flex justify-content-center ">
                        PENCAK SILAT
                    </div>
                    <!-- PENCAK SILAT -->
                </div>
            </div>
            <div class="col" >
                <div class="row" style="height: 100%;" >  
                    <div class="container-fluid h100">
                        <div class="row h100">
                            <div class="col d-flex justify-content-start align-items-center fs-3">
                                <span class="ms-3">PUTRA</span>
                            </div>
                            <div class="col d-flex justify-content-end align-items-center">
                                <img src="../assets/Assets/psht.png" alt="" style="width: 50px;">
                                <img src="../assets/Assets/IPSI.png" alt="" style="width: 50px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Match Title -->
    <div class="container-fluid d-flex justify-content-center f-cent fs-3">
        ARENA 1 <br>
        PENYISIHAN DEWASA (4PA)
    </div>
    <!-- Container Body Content -->
    <div class="container-fluid ps-5 pe-5">
        <div class="container-fluid ">
            <!-- Player Info -->
            <div class="fs-4 mt-4">
                NAMA : {{$perserta->name}} <br>
                KONTINGEN : {{$kontigen}}
            </div>
            <!-- Point Table -->
            <table class="table table-bordered mt-3 f-cent fs-3 border-black">
                <thead>
                    <tr style="height: 70px;" class="fs-2">
                        <th scope="col" style="background-color: #0066FF; color: #f5f5f5;">JURI 1</th>
                        <th scope="col" style="background-color: #0066FF; color: #f5f5f5;">JURI 2</th>
                        <th scope="col" style="background-color: #0066FF; color: #f5f5f5;">JURI 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="height: 70px;">
                        <td id="attack1"></td>
                        <td id="attack2"></td>
                        <td id="attack3"></td>
                    </tr>
                    <tr style="height: 70px;">
                        <td id="firmness1"></td>
                        <td id="firmness2"></td>
                        <td id="firmness3"></td>
                    </tr>
                    <tr style="height: 70px;">
                        <td id="soulfullness1"></td>
                        <td id="soulfullness2"></td>
                        <td id="soulfullness3"></td>
                    </tr>
                    <tr style="height: 70px;">
                        <td class="bg-dark-subtle" id="total1"></td>
                        <td class="bg-dark-subtle" id="total2"></td>
                        <td class="bg-dark-subtle" id="total3"></td>
                    </tr>
                </tbody>
            </table>
            <!-- Time and Score info -->
            <div class="container-fluid h100">
                <div class="row">
                    <!-- Time Section  -->
                    <div class="col border-blue rounded d-flex justify-content-center flex-column align-items-center fs-2">
                        <span class="mt-5">WAKTU (TIME PERFORMANCE)</span>
                        <div class="border border-black btn-back-blue rounded px-lg-5 py-2 mt-3 mb-5 d-flex justify-content-center" style="width: 15rem;">03:00</div>
                    </div>
                    <!-- mid section -->
                    <div class="col-3 d-flex justify-content-center">
                        <div class="blue-sec">i</div>
                    </div>
                    <!-- Point Section -->
                    <div class="col border-green rounded d-flex justify-content-center flex-column align-items-center fs-2">
                        <span class="mt-2">HASIL PENILAIAN (SCORE)</span>
                        <table class="table table-bordered border-success">
                            <thead >
                                <tr class="text-center">
                                    <th class="w-50 text-danger">
                                        Pelanggaran
                                    </th>
                                    <th class="text-success">
                                        Score
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>
                                        -0.50
                                    </td>
                                    <td>
                                        9.23
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Running Text -->
    <div class="fixed-bottom container-fluid f-white px-0" style="height: 60px;">
        <div class="row d-flex flex-column h100">
            <div class="bg-dark-subtle border rounded border-black" style="width: 100px; height: 100%;">
                <img src="../assets/Assets/Ayo Silat.png" alt="" style="width: 100%;">
            </div> 
            <div class="h100 d-flex align-items-center px-0">
                <div class="w100 bg-black d-flex align-items-center" style="height: 55px;"> 
                    <marquee behavior="" direction="Running">
                        Pertandingan Pencak Silat Kediri Telah dimulai || Pertandingan hari ini dimulai sore Hari || kunjungi ayosilat.com untuk melihat update
                    </marquee>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none" name="{{$id_perserta}}" id="id_perserta"></div>
    <div class="d-none" name="{{$arena}}" id="arena"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function calldata() {
            var elemenDiv = document.getElementById("id_perserta");
            var id = elemenDiv.getAttribute("name");
            var arenaDiv = document.getElementById("arena");
            var arena = arenaDiv.getAttribute("name");
            function requestdata() {
                $.ajax({
                    url: '/call-data/?tipe=seni&kt=ganda&id='+id+'&arena='+arena+'',
                    method: 'GET',
                    success: function (response) {
                     var juri1 = parseFloat(response.firmness1) 
                        + parseFloat(response.attack1)
                        + parseFloat(response.soulfullness1) +parseFloat('9.1').toFixed(2);

                        // Perbarui tampilan dengan data yang diperbarui
                        console.log(juri1);
                        $('#soulfullness1').text(response.soulfullness1);
                        $('#attack1').text(response.attack1);
                        $('#firmness1').text(response.firmness1);
                        $('#total1').text((parseFloat(response.firmness1) 
                        + parseFloat(response.attack1)
                        + parseFloat(response.soulfullness1) +parseFloat('9.1') ).toFixed(2));
                        $('#attack2').text(response.attack2);
                        $('#firmness2').text(response.firmness2);
                        $('#total2').text((parseFloat(response.firmness2) 
                        + parseFloat(response.attack2)
                        + parseFloat(response.soulfullness2) +parseFloat('9.1')).toFixed(2));
                        $('#soulfullness3').text(response.soulfullness3);
                        $('#attack3').text(response.attack3);
                        $('#firmness3').text(response.firmness3);
                        $('#total3').text((parseFloat(response.firmness3) 
                        + parseFloat(response.attack3)
                        + parseFloat(response.soulfullness3) +parseFloat('9.1')).toFixed(2));


                    }
                }); +parseFloat('9.1')
            }
            requestdata();
        }   
        calldata();
        setInterval(calldata, 500);
    </script>
</body>
</html>