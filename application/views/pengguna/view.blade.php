<div class="row">
  <div class="col-md-6">
    <img src="{{ base_url() .'assets/uploads/pengguna/'. $pengguna->foto }}" alt="" style="width:100%;">
  </div>
  <div class="col-md-6">
    <table class="table table-striped table-bordered">
      <div class="">
        <label for="title" style="border-bottom: 2px solid currentColor;">Nama Pengguna :</label>
        <h5>{{ $pengguna->nama }}</h5>
      </div>
      <div class="">
        <label for="title" style="border-bottom: 2px solid currentColor;">Telepon</label>
        <h5>{{ $pengguna->telp }}</h5>
      </div>
      <div class="">
        <label for="title" style="border-bottom: 2px solid currentColor;">Email</label>
        <h5>{{ $pengguna->email }}</h5>
      </div>
    </table>
  </div>
</div>
