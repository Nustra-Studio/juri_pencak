@extends('layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-4 pe-md-1">
            <div class="auth-side-wrapper" style="background-image: url('../assets/images/auth-img.jpg')">
                @php
                    Use App\juri;
                    Use App\arena;
                    $data = juri::all();
                    $data_arena = arena::all();
                @endphp
            </div>
          </div>
          <div class="col-md-8 ps-md-3">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="/" class="noble-ui-logo d-block mb-2">Login<span>Juri</span></a>
              <form class="forms-sample"
                    method="GET"
                    action="{{url('/redirect')}}"
              >
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Name</label>
                  <select name="name" class="form-control" id="">
                    @foreach ($data as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                  
                </div>
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Arena</label>
                  <select name="arena" class="form-control" id="">
                    @foreach ($data_arena as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                  
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Role</label>
                  <select name="role" class="form-control" id="">
                    <option value="juri-tanding">Juri Tanding</option>
                    <option value="dewan-tanding">Dewan Juri Tanding</option>
                    <option value="juri-ganda">Juri Seni Solo Creative Ganda</option>
                    <option value="dewan-ganda">Dewan Seni Solo Creative Ganda</option>
                    <option value="juri-tunggal">Juri Seni Tunggal Tunggal</option>
                    <option value="dewan-tunggal">Dewan Seni Tunggal Tunggal</option>
                  </select>
                </div>
                <div class="mb-2">
                    <button class="btn btn-primary">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection