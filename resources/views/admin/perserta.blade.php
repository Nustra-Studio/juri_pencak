@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
@php
    use App\PersertaModel;
    use App\KontigenModel;
    use App\kelas;
    use App\category;
    $data = PersertaModel::get();
@endphp
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Perserta</h4>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adddata">Tambah Data</button>
                <button type="button"  data-bs-toggle="modal" data-bs-target="#uploadModal" class="btn btn-success">Tambah Excel</button>
            <div class="card-body">
                <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kontigen</th>
                        <th>Kelas</th>
                        <th>Category</th>
                        <th>team</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="tb-category">
                        @foreach ($data as $item)
                        
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td> {{$item->name}}</td>
                            @php
                              
                                $kontigen = KontigenModel::where('id',$item->id_kontigen)->first();
                                $kelas = kelas::where('id',$item->kelas)->first();
                                $category = category::where('id',$item->category)->first();

                            @endphp
                            <td>{{$kontigen->kontigen}}</td>
                            <td>{{$kelas->name}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$item->status}}</td>
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
        <div class="modal fade" id="uploadModal" tabindex="-1"  aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="{{ url("/admin/add-excel") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadModalLabel">Upload File</h5>
                            </div>
                            <div class="modal-body">
                                <input type="file" name="file">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
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
                        <form class="forms-sample">
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Username</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Password">
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">
                                    Remember me
                                </label>
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
<script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
