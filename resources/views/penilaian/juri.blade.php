<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pencak Silat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/juri/style.css">
    @php
        $id_juri = 2;
    @endphp
  </head>
  <body>
    <div class="container d-flex">
        <div class="btn1">
            <span>Kembali</span>
        </div>
    </div>

    <!-- Juri ARENA -->
    <section id="Juri">
        <div class="container d-flex justify-content-between">
            <div class="d-flex align-items-center justify-content-center">
                <div class="text">
                    <span class="team">Nama Team</span> <br>
                    <span class="peserta">Nama Peserta</span>
                </div>
            </div>
            <div class="Juri d-flex flex-column align-items-center">
                <h1>Juri 1</h1>
                <span>ARENA A - 1</span>
            </div>
            <div class="d-flex align-items-center justify-content-center text-end">
                <div class="text">
                    <span class="team">Nama Team</span><br>
                    <span class="peserta">Nama Peserta</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Scorering  -->
    <section id="scorering" class="container d-flex">
        <!-- Kiri -->
        <div class="blueScore table-responsive">
            <table class="table table-bordered border border-black">
                <thead>
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
                </tbody>
                <thead>
                    <tr>
                        <th scope="col" class=" text-center " colspan="3">Riwayat Point</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">1,2,2,2,5,5,5</td>
                    </tr>
                    <tr>
                        <td colspan="3">1,2,2,2,5,5,5</td>
                    </tr>
                </tbody>
              </table>

              <div class="skill d-flex justify-content-center">
                <button name="juri:{{$id_juri}} id:1 status:pukulan p:2 keterangan:plus" class="btnSkill1 d-flex align-items-center justify-content-center ">
                    <img src="../assets/juri/images/fist (2) 1.png">
                    <span>Pukulan</span>
                </button>
                <button name="juri:{{$id_juri}} id:1 status:tendangan p:3 keterangan:plus" class="btnSkill1 d-flex align-items-center justify-content-center">
                    <img src="../assets/juri/images/kick 1.png">
                    <span>Tendangan</span>
                </button>
              </div>

              <div class="hapus d-flex align-items-center justify-content-center">
                <button name="juri:{{$id_juri}} id:1 status:pukulan p:2 keterangan:minus" class="btnHapus text-center">
                    <span >Hapus <br> Pukulan</span>
                </button>
                <button name="juri:{{$id_juri}} id:1 status:tendangan p:3 keterangan:minus" class="btnHapus text-center">
                    <span>Hapus <br> Tendangan</span>
                </button>
              </div>
        </div>

        <!-- Tengah -->
        <div class="babak d-flex flex-column align-items-center">
            <table class="table tabelBabak">
                <thead>
                  <tr>
                    <td scope="col" class="text-center">Penyisihan</td>
                  </tr>
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

              <div class="refersh d-flex align-items-center justify-content-center">
                <img src="../assets/juri/images/Icon.png">
                <span>Refersh</span>
              </div>

              <table class="table point table-bordered border border-black">
                <thead>
                  <tr>
                    <td scope="col" class="text-center " style="background-color: #FFD600;" colspan="2">Total Point</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center ">22</td>
                    <td class="text-center ">16</td>
                  </tr>
                </tbody>
              </table>
        </div>

        <!-- Kanan -->
        <div class="redScore table-responsive">
            <table class="table table-bordered border border-black">
                <thead class="border border-black">
                  <tr>
                    <th scope="col" class=" text-center">Pukulan</th>
                    <th scope="col" class=" text-center">Tendangan</th>
                    <th scope="col" class=" text-center">Jatuhan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1x</td>
                    <td>2x</td>
                    <td>3x</td>
                  </tr>
                </tbody>
                <thead>
                    <tr>
                        <th scope="col" class=" text-center" colspan="3">Riwayat Point</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">1,2,2,2,5,5,5</td>
                    </tr>
                    <tr>
                        <td colspan="3">1,2,2,2,5,5,5</td>
                    </tr>
                </tbody>
              </table>

              <div class="skill d-flex  justify-content-center">
                <button name="juri:{{$id_juri}} id:2 status:pukulan p:2 keterangan:plus" class="btnSkill2 d-flex align-items-center justify-content-center ">
                    <img src="../assets/juri/images/fist (2) 1.png">
                    <span>Pukulan</span>
                </button>
                <button name="juri:{{$id_juri}} id:2 status:tendangan p:3 keterangan:plus" class="btnSkill2 d-flex align-items-center justify-content-center">
                    <img src="../assets/juri/images/kick 1.png">
                    <span>Tendangan</span>
                </button>
                
              </div>

              <div class="hapus d-flex align-items-center justify-content-center">
                <button name="juri:{{$id_juri}} id:2 status:pukulan p:2 keterangan:minus" class="btnHapus text-center">
                    <span >Hapus <br> Pukulan</span>
                </button>
                <button name="juri:{{$id_juri}} id:2 status:tendangan p:3 keterangan:minus" class="btnHapus text-center">
                    <span>Hapus <br> Tendangan</span>
                </button>
              </div>
        </div>
    </section>
    <script>
        // Temukan semua tombol dengan kelas "button-blue" atau "button-blue-delete"
        var tombolDenganKelas = document.querySelectorAll('.btnHapus, .btnSkill1 , .btnSkill2');
    
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
                    // Lakukan sesuatu dengan respons dari server (opsional)
                })
                .catch(error => {
                    // Tangani kesalahan jika ada
                });
                    });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>