<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');    

        *  {
            margin: 0px;
            padding: 0px;
            font-family: 'Roboto', sans-serif;
        }

        .bg-green {
            background-color: rgb(0, 203, 0);
            color: red;
        }

        .bg-blue-gradient {
            background-image: linear-gradient( rgb(0, 255, 0),rgb(0, 153, 0));
        }
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');    

*  {
    margin: 0px;
    padding: 0px;
    font-family: 'Roboto', sans-serif;
}

.img-full {
    background-image: url('../../assets/Assets/header.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: 100%;
    height: 600px;
    width:  100%;
  }

.red {
    background-color: red;
}

.green {
    background-color: greenyellow;
}

.bg-blue1 {
    background-color: #0066FF;
}

.h100 {
    height: 100%;
}

.w100 {
    width: 100%;
}

.blue-sec {
    background-color: #004DA8;
    color: #004DA8;
}

.center-pos {
    top: -1%;
    left: 44%;
}

.f-cent {
    text-align: center;
}

.border-blue {
    border: 2px solid #0066FF;
}

.border-green {
    border: 2px solid #05FF00;
}

.btn-back-blue {
    background-image: linear-gradient(#5498FF, #B9D5FF)
}

.btn-back-green {
    background-image: linear-gradient(#05FF00, #C9FFC8)
}

.f-white {
    color: #f5f5f5;
}

.text-on-image {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); 
.w-10 {
    width: 10%;
}

.w-5 {
    width: 5%;
}
}

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Recap</title>
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
            <div class="col d-flex justify-content-between align-items-center fs-3">
                <span>A-2</span>
                <span class="me-3">FINAL</span>
            </div>
            <div class="col h100">
                <div class="container position-relative h100 d-flex justify-content-center fs-3" style="height: 70%;">
                    <img src="../../../assets/Assets/header.png" alt="" style="width: 100%;">
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
                                <span class="ms-3">TUNGGAL</span>
                            </div>
                            <div class="col d-flex justify-content-end align-items-center">
                                <img src="../../../assets/Assets/psht.png" alt="" style="width: 50px;">
                                <img src="../../../assets/Assets/IPSI.png" alt="" style="width: 50px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Player Info Section -->
    <div class="container-fluid">
        <div class="row mx-2 mt-3">
            <div class="col ">
                <i class="fa-regular fa-circle-user fa-4x mt-4" style="color: #0066FF;"></i>
                <div class="mt-3 fs-4">{{$kontigen}}</div>
                <div class="fs-3 text-primary">{{$perserta->name}}</div>
            </div>
            <div class="col">
                <div class="container border border-primary border-3 rounded text-center p-3 fs-2">
                    Time Performance
                    <div class="container bg-blue-gradient text-light border border-3 border-black shadow-lg rounded text-center align-middle fs-1">
                        03:00
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Score Section -->
    <div class="container-fluid px-4">
        <table class="table table-bordered border-dark-subtle">
            <thead class="text-center align-middle">
                <tr>
                    <th class="bg-light">Juri 1</td>
                    <th class="bg-light">Juri 2</td>
                    <th class="bg-light">Juri 3</td>
                </tr>
            </thead>
            <tbody class="text-center align-middle">
                <tr>
                   <td class="" id="actual1"></td> 
                   <td class="" id="actual2"></td> 
                   <td class="" id="actual3"></td> 
                </tr>
                <tr>
                    <td class="text-danger" id="flwo1"></td> 
                    <td class="text-danger" id="flwo2"></td> 
                    <td class="text-danger" id="flwo3"></td> 
                 </tr>
                 <tr>
                    <td class="bg-light text-primary" id="total1"></td> 
                    <td class="bg-light text-primary" id="total2"></td> 
                    <td class="bg-light text-primary" id="total3"></td> 
                 </tr>
            </tbody>
        </table>
    </div>
    <!-- Final Score Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>
            <div class="col-6"> 
                <table class="table table-responsive table-bordered border-black">
                    <thead class="text-center align-middle ">
                        <tr>
                            <th class="bg-success text-light">Median</th>
                            <th class="bg-success text-light">Penalty</th>
                            <th class="bg-success text-light">Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-center align-middle ">
                        <tr>
                            <td id="median"></td>
                            <td id="dewan" class="text-danger"></td>
                            <td id="total"></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="bg-success text-light">Standard Deviation</td>
                        </tr>
                        <tr>
                            <td colspan="3" id="deviation"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
        
    </div>

    <!-- Running Text -->
    <div class="fixed-bottom container-fluid f-white px-0" style="height: 60px;">
        <div class="row d-flex flex-column h100">
            <div class="bg-dark-subtle border rounded border-black" style="width: 100px; height: 100%;">
                <img src="../../../assets/Assets/Ayo Silat.png" alt="" style="width: 100%;">
            </div> 
            <div class="h100 d-flex align-items-center px-0">
                <div class="w100 bg-black d-flex align-items-center" style="height: 55px;"> 
                    <marquee behavior="" direction="Running">
                        Pertandingan Pencak Silat Kediri Telah dimulai || Pertandingan hari ini dimulai sore Hari || kunjungi ayosilat.com untuk melihat update  </marquee>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none" name="{{$id_perserta}}" id="id_perserta"></div>
    <div class="d-none" name="{{$arena}}" id="arena"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function calldata() {
            function findMedian(arr) {
            arr.sort((a, b) => a - b);
            const middleIndex = Math.floor(arr.length / 2);

            if (arr.length % 2 === 0) {
                return (arr[middleIndex - 1] + arr[middleIndex]) / 2;
            } else {
                return arr[middleIndex];
            }
        } 
            var elemenDiv = document.getElementById("id_perserta");
            var id = elemenDiv.getAttribute("name");
            var arenaDiv = document.getElementById("arena");
            var arena = arenaDiv.getAttribute("name");
            function requestdata() {
                $.ajax({
                    url: '/call-data/?tipe=seni_tunggal&kt=tunggal&id='+id+'&arena='+arena+'',
                    method: 'GET',
                    success: function (response) {
                        var juri1 = (parseFloat(response.actual1) + parseFloat(response.flwo1)).toFixed(2);
                        var juri2 = (parseFloat(response.actual2) + parseFloat(response.flwo2)).toFixed(2);
                        var juri3 = (parseFloat(response.actual3) + parseFloat(response.flwo3)).toFixed(2);
                        var all_juri = [juri1 , juri2 , juri3];
                        var average = (parseFloat(juri1) + parseFloat(juri2) + parseFloat(juri3)) / 3;
                        var deviations = Math.pow((parseFloat(juri1) - average), 2) + Math.pow((parseFloat(juri2) - average), 2) + Math.pow((parseFloat(juri3) - average), 2);
                        var deviation = Math.sqrt(deviations / 3);
                        var total_score = findMedian(all_juri) - parseFloat(response.dewan);

                        // Perbarui tampilan dengan data yang diperbarui
                        console.log(deviation);
                        $('#actual1').text(response.actual1);
                        $('#actual2').text(response.actual2);
                        $('#actual3').text(response.actual3);
                        $('#total1').text(juri1);
                        $('#flwo1').text(response.flwo1);
                        $('#flwo2').text(response.flwo2);
                        $('#flwo3').text(response.flwo3);
                        $('#total2').text(juri2);
                        $('#total3').text(juri3);
                        $('#total').text(total_score);
                        $('#dewan').text('-'+response.dewan);
                        $('#median').text(findMedian(all_juri));
                        $('#deviation').text(deviation);
                    }
                });
            }
            requestdata();
        }   
        calldata();
        setInterval(calldata, 500);       
    </script>
</body>
</html>