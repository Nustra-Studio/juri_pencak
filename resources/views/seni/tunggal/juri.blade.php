<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/seni/juri_seni.css">
    <title>Juri Seni</title>
</head>
<body>
        <div class="d-flex justify-content-center ">
            <div class="mid-header-text" >
                Juri Pencak Seni Tunggal
            </div>
        </div>
        <style>
            .custom-button {
            height: 289px;
            width: 100%;
            }
        </style>
        <div class="container mt-5" >   
            <div class="row text-center">
                <div class="col-md-5"  >
                    <button class="btn btn-danger btn-lg custom-button shadow">Wrong Move</button>
                </div>
                <div class="col-md-2 ">
                </div>
                <div class="col-md-5" >
                    <button class="btn btn-primary btn-lg custom-button shadow">Next Move</button>
                </div>
            </div>
        </div>
        
        <div class="d-flex justify-content-center direc mt-5">
            <div class=" text-center " >
                Flow of Movement/Stamina <br>
                (Range Score : 0,01 - 0,10)
            </div>
            <div class=" text-center container " >
                <div class="row">
                    <table class="table table-borderd ">
                        <thead>
                            <tr>
                                <td scope="col"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row" class="d-flex justify-content-start">
                                    <!-- Increment 0,01 jadi 10 button 0,01 sampai 0,10 -->
                                    @for ($i = 1; $i <= 10; $i++)
                                    @php
                                        $number = number_format($i * 0.01, 2);
                                    @endphp
                                    <button class="btn btn-primary btn-lg mx-1">{{$number}}</button>
                                    @endfor
                                    <span class="ms-auto mt-2 span-score ">0,01</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
</body>
</html>