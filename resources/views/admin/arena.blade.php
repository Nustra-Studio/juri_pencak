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
        use App\juri;
        $data_kelas = kelas::all();
        $data = arena::all();
        $data_setting = Setting::first();
        $data_perserta = PersertaModel::get();
        $data_juri = juri::get();

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
                                <a class="btn btn-success btn-sm" href="{{url("redirect?arena=$item->id&role=arena")}}">Panel</a>
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
                                <input type="text" name="name" class="form-control" id="exampleInputName" autocomplete="off" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Juri 1</label>
                                <select  name="juri_1" class="form-control" id="exampleInputName">
                                    @foreach ($data_juri as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Juri 2</label>
                                <select  name="juri_2" class="form-control" id="exampleInputName">
                                    @foreach ($data_juri as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Juri 3</label>
                                <select  name="juri_3" class="form-control" id="exampleInputName">
                                    @foreach ($data_juri as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- ... Other form elements ... -->
                            <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Status</label>
                            <select  name="kelas" class="form-control" id="exampleInputName">
                                        <option value="Tanding">Tanding</option>
                                        <option value="Solo_Kreatif">Seni Solo Kreatif</option>
                                        <option value="Ganda_Kreatif">Seni Ganda Kreatif</option>
                                        <option value="Tunggal">Seni Tunggal</option>
                                        <option value="Group">Seni Group</option>
                            </select>
                        </div>

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