@extends('admin/template')

@section('content')
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Pengguna</h3>
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
            <a href="{{ base_url('/admin/pengguna/create')}}" class="btn btn-outline-success"><i class="mdi mdi-plus"></i>Tambah Pengguna</a>
          </div>
        </div>
        <div class="card">
          <div class="card-block">
            <table id="dataTables" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pengguna as $key => $value)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $value->nama }}</td>
                  <td>{{ $value->telp }}</td>
                  <td>{{ $value->email }}</td>
                  <td>
                    <a href="#" onclick="openModal(<?php echo $value->id_pengguna; ?>)" class="btn btn-sm btn-primary">Info</a>
                    <a href="{{ base_url('/admin/pengguna/edit/') . $value->id_pengguna }}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{ base_url('/admin/pengguna/delete/') . $value->id_pengguna }}" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 150px; ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Info Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-content">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div>
  <footer class="footer"> © 2017 MOLI | Admin </footer>
</div>
<script type="text/javascript">
function openModal(id) {
  $.ajax({
    url:"{{ base_url('admin/pengguna/get/') }}"+id,
    method: 'post',
    data:null
  }).done(function(data) {
    $('#modal-content').html(data);
    $('#exampleModalCenter').modal('show');
  });
}
$(document).ready(function() {
    $('#dataTables').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
@endsection
