  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah </h1>
          <!--   <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->

          <div class="row">


            <div class="col-lg-8">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ubah </h6>
                </div>

                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('assets/back') ?>/img/undraw_posting_photo.svg" alt="">
                  </div>
                  
                    <?= form_open_multipart('admin/master/User/edit'); ?>
                    <input type="hidden" name="id" value="<?= $user['user_id']; ?>">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username <span class="required">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $user['username']; ?>" readonly> 
                            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-password" class="col-sm-2 col-form-label">Password  <span class="required">*</span></label>
                            <div class="col-sm-10">
                               <input type="password" placeholder="Password" name="password" class="form-control"/>
                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-nama" class="col-sm-2 col-form-label">Nama Lengkap <span class="required">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?= $user['nama']; ?>"> 
                              <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="input-jabatan"class="col-sm-2 col-form-label">Jabatan <span class="required">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan" value="<?= $user['jabatan']; ?>"> 
                              <small class="form-text text-danger"><?= form_error('jabatan'); ?></small>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="input-email" class="col-sm-2 col-form-label">Email <span class="required">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?= $user['email']; ?>"> 
                              <small class="form-text text-danger"><?= form_error('email'); ?></small>
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="input-telepon" class="col-sm-2 col-form-label">No. Telp / HP<span class="required">*</span></label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="telepon" name="telepon" placeholder="telepon" value="<?= $user['telepon']; ?>"> 
                              <small class="form-text text-danger"><?= form_error('telepon'); ?></small>
                            </div>
                        </div>
                        
                        <div class="form-group row justify-content-end">
                          <div class=" col-sm-10">
                            <button type="submit" name="add" class="btn btn-primary">Simpan</button>
                          </div>
                        </div>
                    <?= form_close(); ?>
               
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid --> 

<!-- /page content -->