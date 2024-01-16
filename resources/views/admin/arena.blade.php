    @extends('layout.master')

    @push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
    @endpush

    @section('content')
    @php
        use App\PersertaModel;
        use App\Setting;
        use App\arena;
        use App\kelas;
        $data_kelas = kelas::all();
        $data = arena::all();
        $data_setting = Setting::first();
        $data_perserta = PersertaModel::get();

    @endphp
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Arena</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adddata">Tambah Data</button>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tb-category">
                            @foreach ($data as $item)
                            
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td> {{$item->name}}</td>
                                <td>
                                <div class="text-end">
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    <form id="form-delete-{{ $item->id }}" action="" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button class="btn btn-danger btn-sm delete-button" data-form-delete="{{ $item->id }}">Delete</button>
                                </div>
                            </tr>
                        @endforeach 
                        
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="adddata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Data Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" method="post" action="{{ route('arena.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleInputName" autocomplete="off" placeholder="Name">
                            </div>
                           <!-- ... Other form elements ... -->
                <div class="mb-3">
                    @foreach ($data_kelas as $item)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="kelasCheckbox{{ $item->id }}" name="kelas[]" value="{{ $item->id }}">
                        <label class="form-check-label" for="kelasCheckbox{{ $item->id }}">{{ $item->name }}</label>
                    </div>
                    @endforeach

                    <!-- Add more checkboxes or adjust the loop limit as needed -->
                </div>
<!-- ... Other form elements ... -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
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