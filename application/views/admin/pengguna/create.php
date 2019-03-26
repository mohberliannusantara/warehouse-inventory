<div class="content">
  <div class="container-fluid">
    <div class="col-md-8 col-12 mr-auto ml-auto">
      <!--      Wizard container        -->
      <div class="wizard-container">
        <div class="card card-wizard" data-color="rose" id="wizardProfile">
          <form action="<?php echo base_url('admin/pengguna/create') ?>" method="post" enctype="multipart/form-data" >
            <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
            <div class="card-header text-center">
              <h3 class="card-title">
                Form Tambah Pengguna
              </h3>
              <h5 class="card-description">Tambahkan pengguna / admin dengan sertakan informas secara lengkap.</h5>
            </div>
            <div class="wizard-navigation">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                    Data Pengguna
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                    Level
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                    Rayon
                  </a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="about">
                  <h5 class="info-text"> PT. PLN (Persero)</h5>
                  <div class="row justify-content-center">
                    <div class="col-sm-4">
                      <div class="picture-container">
                        <div class="picture">
                          <img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                          <input type="file" name="foto" id="wizard-picture">
                        </div>
                        <h6 class="description">Pilih Foto</h6>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">face</i>
                          </span>
                        </div>
                        <div class="form-group">
                          <label for="exampleInput1" class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" id="exampleInput1" name="username" required autofocus>
                        </div>
                      </div>
                      <div class="input-group form-control-lg">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="material-icons">record_voice_over</i>
                          </span>
                        </div>
                        <div class="form-group">
                          <label for="exampleInput11" class="bmd-label-floating">Password</label>
                          <input id="password-field" type="password" class="form-control" name="password" required>
                          <span toggle="#password-field" onclick="myFunction()" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="account">
                  <h5 class="info-text"> Pilih level untuk pengguna ini! (Click) </h5>
                  <div class="row justify-content-center">
                    <div class="col-lg-10">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="choice" data-toggle="wizard-checkbox">
                            <input type="checkbox" name="level" value="1">
                            <div class="icon">
                              <i class="fa fa-pencil"></i>
                            </div>
                            <h6>Super Admin</h6>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="choice" data-toggle="wizard-checkbox">
                            <input type="checkbox" name="level" value="2">
                            <div class="icon">
                              <i class="fa fa-laptop"></i>
                            </div>
                            <h6>Admin Rayon</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="address">
                  <div class="row justify-content-center">
                    <div class="col-sm-12">
                      <h5 class="info-text"> Area rayon yang dikelola? (Pilih rayon) </h5>
                    </div>
                    <div class="col-sm-10">
                      <div class="form-group select-wizard">
                        <label>Country</label>
                        <div class="form-group">
                          <select class="custom-select" name="rayon" required>
                            <option selected value="">Pilih Rayon </option>
                            <?php foreach ($rayon as $row): ?>
                              <option value="<?php echo $row->id_rayon ?>">
                                <?php echo $row->nama_rayon; ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                          <div class="invalid-feedback">Pilih rayon.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="mr-auto">
                <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="Previous">
              </div>
              <div class="ml-auto">
                <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Next">
                <input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Finish" style="display: none;">
              </div>
              <div class="clearfix"></div>
            </div>
          </form>
        </div>
      </div>
      <!-- wizard container -->
    </div>
  </div>
</div>

<style>
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
</style>
<script type="text/javascript">
function myFunction() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var x = document.getElementById("password-field");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
