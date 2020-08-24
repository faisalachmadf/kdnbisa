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
            Form Tambah Data Permendagri
          </div>
          
          <div class="card-body">
            <?= form_open_multipart('admin/permendagri/Permendagri/add'); ?>

            <div class="form-group row">
              <label for="nomor" class="col-sm-2 col-form-label">Nomor dan Tanggal</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukan Nomor dan  Tanggal" value="<?= set_value('nomor'); ?>">
                <small class="form-text text-danger"><?= form_error('nomor'); ?></small>
              </div>
            </div>

            <div class="form-group row">
              <label for="tentang" class="col-sm-2 col-form-label">Tentang</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="tentang" name="tentang" rows="3"><?= set_value('tentang'); ?></textarea>
                <small class="form-text text-danger"><?= form_error('tentang'); ?></small>
              </div>
            </div>


            <div class="form-group row">
              <label for="segmen" class="col-sm-2 col-form-label">segmen</label>
              <div class="col-sm-10">
                <!-- Jika ingin pake summernote pakai id="summernote" -->
                <textarea type="text" name="segmen" id="summernote"> <?= set_value('segmen'); ?></textarea>

                <small class="form-text text-danger"><?= form_error('segmen'); ?></small>
                <script>

                  $('#summernote').summernote({
                    tabsize: 3,
                    height: 200,
                    toolsbar: [
                    ['style', ['clear', 'bold']],
                    ],
                  });
                  
                </script>
              </div>
            </div>

            <div class="form-group row">
              <label for="file" class="col-sm-2 col-form-label">Upload File Peraturan</label>
              <div class="col-sm-10">
                <input type="file" class="form-control-file" id="file" name="file_upload">
                <br><div class="alert alert-danger col-md-3" role="alert" >
                  <small><strong>file harus berformat PDF !</strong></small>
                </div>
                <small class="form-text text-danger"> <?= form_error('file_upload'); ?></small>
                <small class="form-text text-danger">  <?php echo $error;?> </small>

              </div>
            </div>

            <hr>
            <div class="form-group row float-right">
              <div class="col-lg-12 ">
                <button type="submit" class="btn btn-primary" value="upload"><i class="fas fa-save"></i> Simpan</button>
                <a href=" <?= base_url('admin/permendagri/Permendagri'); ?>" class="btn btn btn-danger"><i class="fas fa-undo"></i> Batal</a>
              </div>
            </div>

         <?= form_close(); ?>


        </div>
      </div>
    </div>

  </div>
    <!-- /.container-fluid -->