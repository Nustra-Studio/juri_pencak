@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
          .form-floating {
          position: relative;
      }

      .icon {
          position: absolute;
          top: calc(36%);
          left: .8rem;
      }

      .forma {
          width: 400px;
      }

      @media only screen and (max-width: 600px) {
          .forma {
              width: 200px;
          }
        }
  </style>
@endpush

@section('content')
  @php
      use App\PersertaModel;
      use App\Setting;
      $data_setting = Setting::first();
      $data_perserta = PersertaModel::get();
  @endphp
    <!-- Title -->
    <div class="containter-fluid fs-2 fw-bold d-flex justify-content-center align-items-center mt-2">
      Jadwal Pertandigan
  </div>
  <!-- Indicator -->
  <div class="container-fluid mt-2">
      <table class="table table-bordered border-dark shadow">
          <thead class="text-center">
              <tr>
                  <th class="text-primary" colspan="3">Indikator Pertandingan</th>
              </tr>
          </thead>
          <tbody class="">
              <tr>
                  <td class="">
                      <div class="d-flex justify-content-center p-0">
                          <div class="bg-success p-2 text-center text-light rounded shadow" style="width: 75px;">Selesai</div>
                      </div>
                  </td>
                  <td class="">
                      <div class="d-flex justify-content-center p-0">
                          <div class="bg-warning p-2 text-center text-light rounded shadow" style="width: 75px;">Proses</div>
                      </div>
                  </td>
              </tr>
          </tbody>
      </table>
  </div>
  <!-- Status Info -->
  <div class="container-fluid">
      <table class="table table-bordered border-dark shadow">
          <thead class="text-center">
              <tr>
                  <th class="px-1">Total : 10 Pertandingan</th>
                  <th class="px-2">Selesai : 10 Pertandingan</th>
                  <th class="px-2">Sisa : 10 Pertandingan</th>
              </tr>
          </thead>
      </table>
  </div>
  <!-- Search -->
  <div class="container-fluid my-3">
      <form>
          <div class="form-floating forma" >
              <i class="icon fa-solid fa-magnifying-glass" style="font-size: 20px;"></i>
              <input type="text" class="form-control ps-5 border-dark" id="floatingSrc" placeholder="Search">
              <label for="floatingSrc" class="ms-5 px-0">Search</label>
          </div>
      </form>
  </div>
  <!-- Match Info Section -->
  <div class="container-fluid table-responsive-lg">
      <table class="table table-warning table-bordered text-center align-middle">
          <thead>
              <tr>
                  <th>Senin, 15 Oktober 2024</th>
                  <th>08:00-selesai</th>
                  <th>Gelanggang 1</th>
                  <th>Penyisihan</th>
              </tr>
          </thead>
      </table>
  </div>
  <!-- Information Table -->
  <div class="container-fluid table-responsive-lg">
      <table class="table table-bordered border border-dark shadow">
          <thead class="text-center">
              <tr>
                  <th class="bg-dark-subtle">No</th>
                  <th class="bg-dark-subtle">Partai</th>
                  <th class="bg-dark-subtle">Kelas</th>
                  <th class="bg-dark-subtle">Sudut Merah</th>
                  <th class="bg-dark-subtle">Sudut Biru</th>
                  <th class="bg-dark-subtle">Skor</th>
                  <th class="bg-dark-subtle">Skor</th>
                  <th class="bg-dark-subtle">Pemenang</th>
                  <th class="bg-dark-subtle">Kondisi Menang</th>
                  <th class="bg-dark-subtle">Status</th>
              </tr>
          </thead>
          <tbody class="text-center align-middle">
             <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>KELAS D</td>
                  <td class="fw-bold text-danger">Wira</td>
                  <td class="fw-bold text-primary">Galang</td>
                  <td class="fw-bold text-danger">12</td>
                  <td class="fw-bold text-primary">23</td>
                  <td class="fw-bold p-0 h-100">
                    <select class="custom-select w-100 p-0" id="input-winner"  style="height: 70px;">
                        <option value="peserta-1" class="text-primary">Sudut Biru</option>
                        <option value="peserta-2" class="text-danger">Sudut Merah</option>
                        <option value="peserta-3">N/A</option>
                    </select>
                  </td>
                  <td class="h-100 px-0 py-0 w-25">
                    <div class="form-group p-0 d-flex justify-content-start align-items-center flex-row">
                        <select class="custom-select w-100 p-0 me-1" id="input-continent" style="height: 70px;">
                            <option value="menang-1">Point</option>
                            <option value="menang-2"> Teknik</option>
                            <option value="menang-2">Diskualifikasi</option>
                            <option value="menang-3">Lawan Mengundurkan diri</option>
                            <option value="menang-4">Wasit Menghentikan Pertandigan</option>
                        </select>
                        <button class="btn btn-success me-1">
                            <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                        </button>
                    </div>
                  </td>
                  <td>
                      <div class="d-flex justify-content-center p-0 me-1">
                          <div class="bg-success p-2 text-center text-light rounded shadow" style="width: 85px;">Selesai</div>
                      </div>
                  </td>
              </tr>
          </tbody>
      </table>
  </div>    
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush