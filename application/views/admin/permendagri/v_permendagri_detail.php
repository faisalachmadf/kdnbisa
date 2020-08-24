  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
          </div>

 
          <!-- Content Row -->

          <div class="row">

            <div class="col-lg-12 ">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  Detail
                </div>

                <div class="card-body">
                  
                  <form action="" method="post">
                    <div class="form-group row">
                       <label for="nomor" class="col-sm-2 col-form-label">Nomor dan Tanggal</label>
                        <div class="col-sm-10">
                        <b><p><?= $permendagri['nomor']; ?></p></b>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="tentang" class="col-sm-2 col-form-label">Tentang</label>
                      <div class="col-sm-10">
                        <small><?= $permendagri['tentang']; ?></small>
                   
                    
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="segmen" class="col-sm-2 col-form-label">Segmen Batas Daerah</label>
                      <div class="col-sm-10">
                      <small><?= $permendagri['segmen']; ?></small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="file" class="col-sm-2 col-form-label">File</label>
                      <div class="col-sm-10">

                        <?php if( $permendagri['file'] != '') : ?>
                         <div class="alert alert-success" role="alert"> 
                          <a href="<?= base_url('assets/permendagri/').$permendagri['file'] ?>" class="btn btn-danger" title="download"><i class="far fa-file-pdf"></i></a>&nbsp&nbsp&nbsp<small><?= $permendagri['file']; ?></small>
                        </div>
                        <?php else : ?>
                          <div class="alert alert-danger" role="alert">
                            <small>File Peraturan tidak ada !</small>
                          </div>
                        <?php endif; ?>

                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="Tanggal Input" class="col-sm-2 col-form-label">Tanggal Input</label>
                      <div class="col-sm-10">
                        <small><?= date('d F Y H:i', strtotime($permendagri['created_at'])); ?></small>
                      </div>
                    </div>
                   
                    <div class="form-group row">
                      <label for="Tanggal Input" class="col-sm-2 col-form-label">Tanggal Perubahan Data</label>
                      <div class="col-sm-10">
                      <?php if($permendagri['edited_at'] != '0000-00-00 00:00:00') : ?>
                      <small><?= date('d F Y H:i', strtotime($permendagri['edited_at'])); ?></small>
                      <?php else : ?>
                        <div class="alert alert-danger" role="alert">
                            <small>Belum ada Perubahan Data !</small>
                          </div>
                      <?php endif; ?>
                      </div>
                    </div>
                         <hr>
                  <div class="form-group row float-right">
                  <div class="col-lg-12 ">
                  
                     <a href=" <?= base_url('admin/permendagri/Permendagri');?>" class="btn btn btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                  </div>
                </div>
                  
                </form>
           
                
                </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

    