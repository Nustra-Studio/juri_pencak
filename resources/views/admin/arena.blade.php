    @extends('layout.master')

    @push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
    @endpush

    @section('content')
    @php
        use App\PersertaModel;
        use App\Setting;
        use App\arena;
        $data = arena::all();
        $data_setting = Setting::first();
        $data_perserta = PersertaModel::get();

    @endphp
    <div class="row">
        <div class="col">
            <div class="card">
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
                                    {{-- <form id="form-delete-{{ $item->id }}" action="{{ route('category.destroy', $item->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form> --}}
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
    @endsection

    @push('plugin-scripts')
    <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    @endpush

    @push('custom-scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    @endpush