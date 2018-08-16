@extends('admin/template')

@section('content')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
          <h3 class="text-themecolor">Edit Pengguna</h3>
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
            <form action="{{ base_url('admin/pengguna/update/' . $pengguna->id_pengguna) }}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="title">Nama Pengguna</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama', $pengguna->nama) }}">
                @if($errors->has('nama'))
                  <small class="text-danger">{{ $errors->first('nama') }}</small>
                @endif
              </div>
              <div class="form-group">
                <label for="title">Telepon</label>
                <input type="text" class="form-control" name="telp" value="{{ old('telp', $pengguna->telp) }}">
                @if($errors->has('telp'))
                  <small class="text-danger">{{ $errors->first('telp') }}</small>
                @endif
              </div>
              <div class="form-group">
                <label for="title">Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email', $pengguna->email) }}">
                @if($errors->has('email'))
                  <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif
              </div>
              <div class="form-group">
                @if( $pengguna->foto )
                  <center>
                    <img class="card-img-top" src="{{ base_url() .'assets/uploads/pengguna/'. $pengguna->foto }}" alt="Card image cap" style="height: 400px; width: 400px;">
                  </center>
                @endif
                <br>
                <label for="">Foto</label>
                <input type="file" name="foto" class="form-control">
                @if($errors->has('foto'))
                  <small class="text-danger">{{ $errors->first('foto', $pengguna->foto) }}</small>
                @endif
              </div>
              <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Edit">
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
