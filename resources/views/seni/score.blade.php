<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/seni/ScoreSeni.css">
    <title>Seni Score</title>
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
                NAMA : Novan <br>
                KONTINGEN : Nganjuk
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
                        <td id="attack"></td>
                        <td ></td>
                        <td ></td>
                    </tr>
                    <tr style="height: 70px;">
                        <td id="firmness"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr style="height: 70px;">
                        <td id="soulfullness"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr style="height: 70px;">
                        <td class="bg-dark-subtle" id="totaljuri"></td>
                        <td class="bg-dark-subtle"></td>
                        <td class="bg-dark-subtle"></td>
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
                        <span class="mt-5">HASIL PENILAIAN (SCORE)</span>
                        <div class="border border-black btn-back-green rounded px-lg-5 py-2 mt-3 mb-5 d-flex justify-content-center" style="width: 15rem;">83</div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function calldata() {
            var attackp;
            var soulp;
            var firmp;
            function attack() {
                var elemenDiv = document.getElementById("attack"); // Mendapatkan elemen dengan ID "jatuh1"
                $.ajax({
                    url: '/call-data/?tipe=seni&kt=attack',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        attackp = parseFloat(response.data);
                        $('#attack').text(response.data);
                        console.log(response.data);
                    }
                });
            }
            function firmness() {
                var elemenDiv = document.getElementById("firmness"); // Mendapatkan elemen dengan ID "jatuh1"
                $.ajax({
                    url: '/call-data/?tipe=seni&kt=firmness',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        firmp = parseFloat(response.data);
                        $('#firmness').text(response.data);
                        console.log(response.data);
                    }
                });
            }
            function soulfullness() {
                var elemenDiv = document.getElementById("soulfullness"); // Mendapatkan elemen dengan ID "jatuh1"
                $.ajax({
                    url: '/call-data/?tipe=seni&kt=soulfullness',
                    method: 'GET',
                    success: function (response) {
                        // Perbarui tampilan dengan data yang diperbarui
                        
                        soulp = parseFloat(response.data);
                        $('#soulfullness').text(response.data);
                        console.log(soulp);
                    }
                });
            }
            attack();
            firmness();
            soulfullness();
        }   

        calldata();
        setInterval(calldata, 1500);
    </script>
</body>
</html>