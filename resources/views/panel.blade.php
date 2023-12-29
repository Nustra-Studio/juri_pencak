@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
  @php
      use App\PersertaModel;
      $data_perserta = PersertaModel::get();
  @endphp
  <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <form method="post" action="{{ route('admin.store') }}">
              @csrf
              <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Arena</label>
                <input type="text" class="form-control" id="exampleInputText1" name="arena" value="Amiah Burton" placeholder="Enter Name">
              </div>
              <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Judul</label>
                <input type="text" class="form-control" id="exampleInputText1" name="judul" value="Amiah Burton" placeholder="Enter Name">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Babak</label>
                <select class="form-select" name="babak" id="exampleFormControlSelect1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                </select>
              </div>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1" class="form-label">Peserta 1</label>
              <select class="form-select" name="biru"  id="exampleFormControlSelect1">
                  @foreach ($data_perserta as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Perserta 2</label>
            <select class="form-select" name="merah" id="exampleFormControlSelect1">
              @foreach ($data_perserta as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
          </div>
          <button class="btn btn-primary" type="submit">Update</button>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush