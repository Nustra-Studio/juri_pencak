    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pencak Silat</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/juri/style3.css">
        @php
            use App\score;
            use App\Setting;
            use App\PersertaModel;
            $setting = Setting::first();
            $id_juri = 2;
            $tim_merah = PersertaModel::where('id',$setting->merah)->first();
            $tim_biru =PersertaModel::where('id',$setting->biru)->first() ;
        @endphp
    </head>
    <body>
        <div class="container d-flex">
            <div class="btn1">
                <span>Kembali</span>
            </div>
        </div>

        <!-- JURI ARENA -->
        <section id="juri">
            <div class="container d-flex justify-content-between">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="text">
                        <span class="team">SMKN 1 NGANJUK</span> <br>
                        <span class="peserta">{{$tim_biru->name}}</span>
                    </div>
                </div>
                <div class="juri d-flex flex-column align-items-center">
                    <h1>JURI 1</h1>
                    <span>ARENA A - 1</span>
                </div>
                <div class="d-flex align-items-center justify-content-center text-end">
                    <div class="text">
                        <span class="team">SMA 1 JEMBER</span><br>
                    <span class="peserta">{{$tim_merah->name}}</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Scorering  -->
        <section id="scorering" class="container d-flex">
            <!-- Kiri -->
            <div class="blueScore table-responsive">
                <table class="table table-bordered border border-black">
                        <!-- <thead>
                        <tr>
                            <th  class=" text-center">Pukulan</th>
                            <th scope="col" class=" text-center">Tendangan</th>
                            <th scope="col" class=" text-center">Jatuhan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">1x</td>
                            <td class="text-center">2x</td>
                            <td class="text-center">3x</td>
                        </tr>
                        </tbody> -->
                        <thead>
                            <tr>
                                <th scope="col" class=" text-center " colspan="3">Riwayat Point</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $data1 = score::where('id_perserta',$tim_biru->id_pesilat)
                            ->where('status','plus')
                            ->where('babak','1')
                            ->get();
                            $data2 = score::where('id_perserta',$tim_biru->id_pesilat)
                            ->where('status','plus')
                            ->where('babak','2')
                            ->get();
                            $data3 = score::where('id_perserta',$tim_biru->id_pesilat)
                            ->where('status','plus')
                            ->where('babak','3')
                            ->get();
                        @endphp
                            <tr>
                            <td colspan="3">
                                @forelse ($data1 as $item)
                                    {{$item->score}},
                                @empty
                                    .
                                @endforelse
                            </td>
                        </tr>
                            <tr>
                                <td colspan="3">
                                    @forelse ($data2 as $item)
                                        {{$item->score}},
                                    @empty
                                        .
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    @forelse ($data3 as $item)
                                        {{$item->score}},
                                    @empty
                                        .
                                    @endforelse
                                </td>
                        </tr>
                        </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <div class="btn-wrap d-flex flex-column">
                        {{-- btnSkill1 --}}
                        <button name="juri:{{$id_juri}} id:{{$tim_biru->id_pesilat}} babak:{{$setting->babak}} status:pukulan p:2 keterangan:plus" class="btnSkill1 d-flex align-items-center justify-content-center btn btn-primary fs-5 py-4 px-0 px-lg-5 px-md-2 me-1 shadow border-black" >
                        <img src="../assets/juri/images/fist.png" style="width: 20px;">
                        <span class="ms-1">Pukulan</span>
                        </button>  
                        
                        <button name="juri:{{$id_juri}} id:{{$tim_biru->id_pesilat}} babak:{{$setting->babak}} status:tendangan p:3 keterangan:plus" class="btnSkill1 d-flex align-items-center justify-content-center btn btn-primary fs-5 py-4 px-0 px-lg-5 px-md-2 me-1 shadow border-black" >
                            <img src="../assets/juri/images/kick.png" style="width: 20px;">
                            <span class="ms-1">Tendangan</span>
                        </button>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        {{-- btnHapus --}}
                        <button name="juri:{{$id_juri}} id:{{$tim_biru->id_pesilat}} babak:{{$setting->babak}} status:terakhir p:2 keterangan:minus" class="btnHapus text-center btn btn-secondary text-center px-0 px-lg-3 px-xl-5 py-5 fs-5 shadow border-black">
                        <span >Hapus <br> Nilai Terakhir</span>
                        </button>
                    </div>
                </div>
                    
            </div>

            <!-- Tengah -->
                <div class="babak d-flex flex-column align-items-center">
                    <table class="table tabelBabak">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">BABAK</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center" style="background-color: #FFD600;">I</td>
                        </tr>
                        <tr>
                            <td class="text-center" >II</td>
                        </tr>
                        <tr>
                            <td class="text-center" >III</td>
                        </tr>
                        </tbody>
                    </table>
        
                    <div class="refersh d-flex align-items-center justify-content-center ">
                        <img src="../assets/juri/images/Icon.png">
                        <span>Refresh</span>
                    </div>
    
                    <button class="btn-jatuhan btn btn-secondary d-flex justify-content-center align-items-center p-3 shadow border-light mx-1 mt-1" data-bs-toggle="modal" data-bs-target="#ModalJatuhan">
                        <img src="../assets/Assets/judo white.png" alt="" class="me-1" style="width: 30px;">
                        Verifikasi Jatuhan
                    </button>
    
                    <button class="btn-jatuhan d-flex btn btn-secondary d-flex justify-content-center align-items-center p-3 shadow border-light mt-2 mx-1" data-bs-toggle="modal" data-bs-target="#ModalHukuman">
                        <img src="../assets/Assets/warning.png" alt="" class="me-1" style="width: 30px;">
                        Verifikasi Hukuman
                    </button>
    
                <!-- Modal Verifikasi Jatuhan -->
                <div class="modal fade" id="ModalJatuhan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h2>Verifikasi Jatuhan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="model-body">
                        <div class="container-fluid mb-3">
                            <div class="col d-flex justify-content-center align-items-center fs-5 fw-bold">
                            Keputusan Juri
                            </div>
                            <div class="col h-100">
                            <div class="row h100">
                                <div class="col">
                                <button
                                name="juri:{{$id_juri}} id:{{$tim_biru->id_pesilat}} babak:{{$setting->babak}} status:jatuhan p:0 keterangan:notif"  
                                class=" bt-notif btn btn-primary w-100 border-black shadow">
                                    Tim Biru
                                </button>
                                </div>
                                <div class="col">
                                <button class="btn btn-warning w-100 border-black shadow">
                                    Invalid
                                </button>
                                </div>
                                <div class="col">
                                <button
                                name="juri:{{$id_juri}} id:{{$tim_merah->id_pesilat}} babak:{{$setting->babak}} status:jatuhan p:0 keterangan:notif" 
                                class="bt-notif btn btn-danger w-100 border-black shadow">
                                    Tim Merah
                                </button>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Modal Verifikasi Hukuman -->
                <div class="modal fade" id="ModalHukuman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h2>Verifikasi Hukuman</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="model-body">
                        <div class="container-fluid mb-3">
                            <div class="col d-flex justify-content-center align-items-center fs-5 fw-bold">
                            Keputusan Juri
                            </div>
                            <div class="col h-100">
                            <div class="row h100">
                                <div class="col">
                                <button
                                name="juri:{{$id_juri}} id:{{$tim_biru->id_pesilat}} babak:{{$setting->babak}} status:hukuman p:0 keterangan:notif"    
                                class="bt-notif btn btn-primary w-100 border-black shadow">
                                    Tim Biru
                                </button>
                                </div>
                                <div class="col">
                                <button class=" bt-notif btn btn-warning w-100 border-black shadow">
                                    Invalid
                                </button>
                                </div>
                                <div class="col">
                                <button
                                name="juri:{{$id_juri}} id:{{$tim_merah->id_pesilat}} babak:{{$setting->babak}} status:hukuman p:0 keterangan:notif"
                                class=" bt-notif btn btn-danger w-100 border-black shadow">
                                    Tim Merah
                                </button>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>

                    <div id="popup" class="black-overlay">
                        <div id="popup2" class="white-content">
                        <div class="pop-header">
                            <div>Verifikasi Juri</div>
                            <a href="javascript:void(0)" onclick="document.getElementById('popup').style.display = 'none';document.getElementById('popup2').style.display = 'none'" style="text-decoration: none; color: red; cursor: pointer;">X</a>
                        </div>
                        <div class="pop-content">
                            <table class="table-juri table-bordered border border-black">
                            <thead>
                                <tr>
                                <td scope="col" class="text-center">
                                    Verifikasi Jatuhan
                                </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td scope="col" class="text-center" style="background-color: rgb(199, 199, 199);" >
                                    Keputusan Juri 2
                                </td>
                                </tr>
                                <tr>
                                <td scope="col" class="text-center" style="background-color: blue; color: #f5f5f5;">
                                    Biru Valid
                                </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <div class="pop-button">
                            <button name="juri:{{$id_juri}} id:{{$tim_biru->id_pesilat}} babak:{{$setting->babak}} status:jatuhan p:0 keterangan:notif" type="button" class="bt-notif btn btn-primary btn-lg" >Tim Biru</button>
                            <button name="juri:{{$id_juri}} id:{{$tim_merah->id_pesilat}} babak:{{$setting->babak}} status:jatuhan p:0 keterangan:notif" type="button" class="bt-notif btn btn-danger btn-lg">Tim Merah</button>
                            <button type="button" class="btn btn-warning btn-lg">Tim Invalid</button>
                        </div>
                        </div>
                    </div>
    
                    <div id="popup-hukuman" class="black-overlay">
                        <div id="popup2-hukuman" class="white-content-2">
                        <div class="pop-header">
                            <div>Verifikasi Juri</div>
                            <a href="javascript:void(0)" onclick="document.getElementById('popup-hukuman').style.display = 'none';document.getElementById('popup2-hukuman').style.display = 'none'" style="text-decoration: none; color: red; cursor: pointer;">X</a>
                        </div>
                        <div class="pop-content">
                            <table class="table-juri table-bordered border border-black">
                            <thead>
                                <tr>
                                <td scope="col" class="text-center"">
                                    Verifikasi Hukuman
                                </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td scope="col" class="text-center" style="background-color: rgb(199, 199, 199);" >
                                    Keputusan Juri 2
                                </td>
                                </tr>
                                <tr>
                                <td scope="col" class="text-center" style="background-color: blue; color: #f5f5f5;">
                                    Biru Valid
                                </td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <div class="pop-button">
                            <button name="juri:{{$id_juri}} id:{{$tim_biru->id_pesilat}} babak:{{$setting->babak}} status:hukuman p:0 keterangan:notif" type="button" class="bt-notif btn btn-primary btn-lg" >Tim Biru</button>
                            <button name="juri:{{$id_juri}} id:{{$tim_merah->id_pesilat}} babak:{{$setting->babak}} status:hukuman p:0 keterangan:notif" type="button" class="bt-notif btn btn-danger btn-lg">Tim Merah</button>
                            <button type="button" class="btn btn-warning btn-lg">Tim Invalid</button>
                        </div>
                        </div>
                    </div>
        
                </div>

            <!-- Kanan -->
                <div class="redScore table-responsive">
                    <table class="table table-bordered border border-black">

                        <thead>
                            <tr>
                                <th scope="col" class=" text-center" colspan="3">Riwayat Point</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $data1 = score::where('id_perserta',$tim_merah->id_pesilat)
                            ->where('status','plus')
                            ->where('babak','1')
                            ->get();
                            $data2 = score::where('id_perserta',$tim_merah->id_pesilat)
                            ->where('status','plus')
                            ->where('babak','2')
                            ->get();
                            $data3 = score::where('id_perserta',$tim_merah->id_pesilat)
                            ->where('status','plus')
                            ->where('babak','3')
                            ->get();
                        @endphp
                        <tr>
                            <td colspan="3">
                                @forelse ($data1 as $item)
                                    {{$item->score}},
                                @empty
                                    .
                                @endforelse
                            </td>
                        </tr>
                            <tr>
                                <td colspan="3">
                                    @forelse ($data2 as $item)
                                        {{$item->score}},
                                    @empty
                                        .
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    @forelse ($data3 as $item)
                                        {{$item->score}},
                                    @empty
                                        .
                                    @endforelse
                                </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-center align-items-center">
                            <button name="juri:{{$id_juri}} id:{{$tim_merah->id_pesilat}} babak:{{$setting->babak}} status:terakhir p:2 keterangan:minus" class="btnHapus text-center btn btn-secondary text-center px-0 px-lg-3 px-xl-5 py-5 fs-5 shadow border-black">
                                <span >Hapus <br> Nilai Terakhir</span>
                            </button>
                        </div>
                        <div class="btn-wrap d-flex flex-column">
                        <button name="juri:{{$id_juri}} id:{{$tim_merah->id_pesilat}} babak:{{$setting->babak}} status:pukulan p:2 keterangan:plus" class="btnSkill2 d-flex align-items-center justify-content-center btn btn-danger fs-5 py-4 px-0 px-lg-5 px-md-2 ms-1 shadow border-black">
                            <img src="../assets/juri/images/fist.png" style="width: 20px;">
                            <span class="ms-1">Pukulan</span>
                        </button>  
                            
                        <button name="juri:{{$id_juri}} id:{{$tim_merah->id_pesilat}} babak:{{$setting->babak}} status:tendangan p:3 keterangan:plus" class="btnSkill2 d-flex align-items-center justify-content-center btn btn-danger fs-5 py-4 px-0 px-lg-5 px-md-2 ms-1 shadow border-black">
                            <img src="../assets/juri/images/kick.png" style="width: 20px;">
                            <span class="ms-1">Tendangan</span>
                        </button>
                    </div>
                    </div>
                </div>
        </section>
        <script>
            // Temukan semua tombol dengan kelas "button-blue" atau "button-blue-delete"
            var tombolDenganKelas = document.querySelectorAll('.btnHapus, .btnSkill1 , .btnSkill2 , .bt-notif');
        
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
                    function reload(){id_perserta
                    window.location.reload();
                    }
                    setInterval(reload, 800);
                        });
            });

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
    </html>