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
                  
                  <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $kabkotapilih['id']; ?>">
                     <div class="form-group row">
                       <label for="katkabkot_id" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                        <div class="col-sm-5 float-right">

                          <select class="custom-select mr-sm-2" id="katkabkot_id" name="katkabkot_id">
                            <?php foreach( $kabkotas as $kabkots ) : ?>
                              <?php if ($kabkots == $kabkotapilih['katkabkot_id']) : ?>
                              <option value="<?= $kabkots->kabkot_id; ?> " selected><?= $kabkots->kabkot; ?></option>
                              <?php else : ?>
                              <option value="<?= $kabkots->id; ?>"> <?= $kabkots->kabkot; ?> </option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </select> 

                          <p><?= $kabkotapilih['katkabkot_id']; ?></p>
                          

                          <small class="form-text text-danger"><?= form_error('katkabkot_id'); ?></small>
                        </div>
                        <div class="col-sm-5 float-left">
                          <i class="fas fa-search"></i>  <small class="form-text text-primary">Tombol cari disebelah kanan</small>
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="batas" class="col-sm-2 col-form-label">Nama Kabupaten/Kota</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="batas" name="batas" placeholder="Kab/Kot ... dengan Kab/Kot ..." value="<?= $kabkotapilih['batas']; ?>">                        
                          <small class="form-text text-danger"><?= form_error('batas'); ?></small>
                      </div>
                    </div>



                    <div class="form-group row">
                      <label for="aturan" class="col-sm-2 col-form-label">Aturan</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="aturan" name="aturan" rows="3"><?= $kabkotapilih['aturan']; ?></textarea>
                          <small class="form-text text-danger"><?= form_error('aturan'); ?></small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="file" class="col-sm-2 col-form-label">Upload File Peraturan</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control-file" id="file" name="file_upload" value="#">
                      </div>
                    </div>
                         <hr>
                  <div class="form-group row float-right">
                  <div class="col-lg-12 ">
                    <button type="submit" name="edit" class="btn btn-primary"><i class="fas fa-save"></i> Ubah</button>
                     <a href=" <?= base_url('admin/segmenbatas/Kabkota');?>" class="btn btn btn-danger"><i class="fas fa-undo"></i> Batal</a>
                  </div>
                </div>
                  
                </form>
           
                
                </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

    