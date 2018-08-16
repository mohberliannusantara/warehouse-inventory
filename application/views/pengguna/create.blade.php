@extends('admin/template')

@section('content')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
          <h3 class="text-themecolor">Tambah Pengguna</h3>
          {{-- <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol> --}}
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-block">
            <form action="{{ base_url('admin/pengguna/store') }}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="">Nama Pengguna</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" autofocus>
                @if($errors->has('nama'))
                  <small class="text-danger">{{ $errors->first('nama') }}</small>
                @endif
              </div>
              <div class="form-group">
                <label for="">Telepon</label>
                <input type="text" name="telp" class="form-control" value="{{ old('telp') }}">
                @if($errors->has('telp'))
                  <small class="text-danger">{{ $errors->first('telp') }}</small>
                @endif
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                @if($errors->has('email'))
                  <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif
              </div>
              <div class="form-group">
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control">
                @if($errors->has('foto'))
                  <small class="text-danger">{{ $errors->first('foto') }}</small>
                @endif
              </div>
              <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Simpan">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer"> © 2017 MOLI | Admin </footer>
</div>
@endsection
