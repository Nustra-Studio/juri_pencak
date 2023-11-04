<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pencak Silat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/juri/style.css">
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
                <div class="btnSkill1 d-flex align-items-center justify-content-center ">
                    <img src="../assets/juri/images/fist (2) 1.png">
                    <span>Pukulan</span>
                </div>
                <div class="btnSkill1 d-flex align-items-center justify-content-center">
                    <img src="../assets/juri/images/kick 1.png">
                    <span>Tendangan</span>
                </div>
              </div>

              <div class="hapus d-flex align-items-center justify-content-center">
                <div class="btnHapus text-center">
                    <span >Hapus <br> Pukulan</span>
                </div>
                <div class="btnHapus text-center">
                    <span>Hapus <br> Tendangan</span>
                </div>
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
                <div class="btnSkill2 d-flex align-items-center justify-content-center ">
                    <img src="../assets/juri/images/fist (2) 1.png">
                    <span>Pukulan</span>
                </div>
                <div class="btnSkill2 d-flex align-items-center justify-content-center">
                    <img src="../assets/juri/images/kick 1.png">
                    <span>Tendangan</span>
                </div>
                
              </div>

              <div class="hapus d-flex align-items-center justify-content-center">
                <div class="btnHapus text-center">
                    <span >Hapus <br> Pukulan</span>
                </div>
                <div class="btnHapus text-center">
                    <span>Hapus <br> Tendangan</span>
                </div>
              </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>