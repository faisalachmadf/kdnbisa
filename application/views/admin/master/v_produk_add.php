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
                  Form Tambah Kategori Produk Hukum
                </div>

                <div class="card-body">
                  
                  <?= form_open_multipart('admin/master/Produk/add'); ?>
                   
                   <div class="form-group row">
                      <label for="produk" class="col-sm-2 col-form-label">Nama Kategori Produk Hukum</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="produk" name="produk" placeholder="Masukan nama Kategori Produk Hukum" value="<?= set_value('produk'); ?>">
                        <small class="form-text text-danger"><?= form_error('produk'); ?></small>
                      </div>
                    </div>
                         <hr>
                  <div class="form-group row float-right">
                  <div class="col-lg-12 ">
                    <button type="submit" name="add" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                     <a href=" <?= base_url('admin/master/Produk');?>" class="btn btn btn-danger"><i class="fas fa-undo"></i> Batal</a>
                  </div>
                </div>
                  
                <?= form_close(); ?>
           
                
                </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

    