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
                  Form Rubah Data
                </div>

                <div class="card-body">
                  
                  <?= form_open_multipart('admin/segmenbatas/Provinsi/edit'); ?>
                    <input type="hidden" name="id" value="<?= $provinsi['id']; ?>">
                    <div class="form-group row">
                       <label for="id_katprov" class="col-sm-2 col-form-label">Segmen Perbatasan</label>
                        <div class="col-sm-10">

                          <select class="custom-select mr-sm-2" id="id_katprov" name="id_katprov">
                            <?php foreach( $id_katprov as $katprov ) : ?>
                              <?php if ($katprov == $provinsi['id_katprov']) : ?>
                              <option value="<?= $katprov; ?>" selected><?= $katprov; ?></option>
                              <?php else : ?>
                              <option value="<?= $katprov; ?>"><?= $katprov; ?></option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select>

                          <small class="form-text text-danger"><?= form_error('id_katprov'); ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="kabkot" class="col-sm-2 col-form-label">Nama Kabupaten/Kota</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="kabkot" name="kabkot" placeholder="Kab/Kot ... dengan Kab/Kot ..." value="<?= $provinsi['kabkot']; ?>">
                        <div class="alert alert-primary float-right" role="alert">
                          <i class="fas fa-exclamation"></i><small>Contoh pengisian : Kab. A dengan Kab. B;</small>
                        </div>
                        
                          <small class="form-text text-danger"><?= form_error('kabkot'); ?></small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="aturan" class="col-sm-2 col-form-label">Aturan</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="aturan" name="aturan" rows="3"><?= $provinsi['aturan']; ?></textarea>
                          <small class="form-text text-danger"><?= form_error('aturan'); ?></small>
                      </div>
                    </div>

                     <div class="form-group row">
                      <label for="file" class="col-sm-2 col-form-label">Upload File Peraturan</label>
                      <div class="col-sm-10">

                        <input type="file" class="form-control-file" id="file" name="file_upload">
                        <div class="alert alert-danger col-md-3" role="alert" >
                          <small><strong>file harus berformat PDF !</strong></small>
                        </div>
                         <div class="alert alert-success" role="alert"> 
                         <small>File yang ada :</small> &nbsp<a href="<?= base_url('assets/segmenprovinsi/').$provinsi['file'] ?>" class="btn btn-danger" title="download"><i class="far fa-file-pdf"></i></a>&nbsp&nbsp&nbsp<small>
                          <?= $provinsi['file']; ?></small>
                          <small class="form-text text-danger">  <?php echo $error;?> </small>
                        </div>
                      </div>
                    </div>
                         <hr>
                  <div class="form-group row float-right">
                  <div class="col-lg-12 ">
                    <button type="submit" name="edit" class="btn btn-primary"><i class="fas fa-save"></i> Ubah</button>
                     <a href=" <?= base_url('admin/segmenbatas/Provinsi');?>" class="btn btn btn-danger"><i class="fas fa-undo"></i> Batal</a>
                  </div>
                </div>
                  
                </form>
           
                
                </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

    