<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/seni/JuriSeni.css">
    <link rel="stylesheet" href="../assets/seni/ScoreSeni.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Solo & Ganda</title>
    @php
        $id_juri = 3;
    @endphp
</head>
<body>
    <!-- Match Info Section -->
    <div class="container-fluid f-cent fs-4 mt-3">
        <div>
            ARENA 1 <br>
            PENYISIHAN - DEWASA(GANDA)
        </div>
    </div>
    <!-- Mid Section -->
    <div class="container-fluid px-4">
        <div class="row">
        <!-- Player Info Section -->
            <div class="col fs-2">
                <span class="fs-5">NAMA PESERTA :</span> <br> 
                <span class="text-primary">BRIAN PUTRA IMANUEL</span>
            </div>
            <div class="col text-end fs-2">
                <span class="fs-5">: KONTINGEN</span> <br>
                <span class="text-primary">NGANJUK</span>
            </div>
        </div>
        <table class="table table-bordered border-black">
            <thead >
                <tr >
                    <th colspan="1" class="w-10 bg-dark-subtle text-center">SCORING ELEMENT</th>
                    <th colspan="3" class="text-center bg-dark-subtle w-75">SCORE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-2 py-5 align-middle">
                        ATTACK AND DEFENSE TECHNIQUE <br>
                        (0,01-0,30)
                    </td>
                    <td class="w-25">
                        <!-- LOOP SAMPAI 0,30 -->
                        @for ($i = 1; $i <= 30; $i++)
                        @php
                            $number = number_format($i * 0.01, 2);
                        @endphp
                        <button
                        class="btn btn-light border-black px-3 py-2 my-1 mx-1 btn-data"
                        name="juri:{{$id_juri}} id:3 status:attack p:{{$number}} keterangan:pointseni"
                        >{{$number}}</button>
                        @endfor
                    

                        
                    </td>
                    <td class="w-5 text-center align-middle fw-bold fs-5">
                        SCORE <br>
                        <span class="text-primary">0</span>
                    </td>
                    <td rowspan="3" class="w-10 text-center align-middle">
                        <span class="fs-4">Total Score</span> <br>
                        -Technique <br>
                        -Firmness <br>
                        -Soulfullness <br>
                        <span class="text-primary fs-4 fw-bold">0</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-2 py-5 align-middle">
                        FIRMNESS & HARMONY <br>
                        (0,01-0,30)
                    </td>
                    <td class="w-25">
                        <!-- LOOP SAMPAI 0,03 -->
                        @for ($i = 1; $i <= 30; $i++)
                        @php
                            $number = number_format($i * 0.01, 2);
                        @endphp
                            <button
                            class="btn btn-light border-black px-3 py-2 my-1 mx-1 btn-data"
                            name="juri:{{$id_juri}} id:3 status:firmness p:{{$number}} keterangan:pointseni"
                            >{{$number}}</button>
                        @endfor
                        
                    </td>
                    <td class="w-5 text-center align-middle fw-bold fs-5">
                        SCORE <br>
                        <span class="text-primary">0</span>
                    </td>
                </tr>
                <tr>
                    <td class="px-2 py-5 align-middle">
                        SOULFULLNESS <br>
                        (0,01-0,30)
                    </td>
                    <td class="w-25">
                        <!-- LOOP SAMPAI 0,03 -->
                        @for ($i = 1; $i <= 30; $i++)
                        @php
                            $number = number_format($i * 0.01, 2);
                        @endphp
                            <button
                            class="btn btn-light border-black px-3 py-2 my-1 mx-1 btn-data"
                            name="juri:{{$id_juri}} id:3 status:soulfullness p:{{$number}} keterangan:pointseni"
                            >{{$number}}</button>
                        @endfor
                        
                    </td>
                    <td class="w-5 text-center align-middle fw-bold fs-5">
                        SCORE <br>
                        <span class="text-primary">0</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        // Temukan semua tombol dengan kelas "button-blue" atau "button-blue-delete"
        var tombolDenganKelas = document.querySelectorAll('.btn-data');
    
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
                    fetch('{{ route('juri.store') }}', {
                    method: 'POST',
                    headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                    })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    // Tangani kesalahan jika ada
                });
                function reload(){
                window.location.reload();
                }
                setInterval(reload, 800);
                    });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>