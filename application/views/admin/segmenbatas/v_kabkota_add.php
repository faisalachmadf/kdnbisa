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
            Form Tambah Data
          </div>

          <div class="card-body">
             <?php echo $error;?>
            <?= form_open_multipart('admin/segmenbatas/Kabkota/add'); ?>

            <div class="form-group row">
             <label for="katkabkot_id" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
             <div class="col-sm-5 float-right">

               <select name="katkabkot_id" class="selectpicker" data-live-search="true">
                <option value="">-- Silahkan Pilih--</option>
                <?php foreach ($kabkotas as $kk) { ?>
                <option value="<?=$kk->id;?>" data-tokens="<?= $kk->kabkot;?>"><?= $kk->kabkot;?></option>
                <?php } ?>
              </select> 

              <small class="form-text text-danger"><?= form_error('katkabkot_id'); ?></small>
            </div>
            <div class="col-sm-5 float-left">
              <i class="fas fa-search"></i><small class="form-text text-primary">Tombol cari disebelah kanan</small>
            </div>
          </div>

          <div class="form-group row">
            <label for="batas" class="col-sm-2 col-form-label">Perbatasan Kabupaten/Kota</label>
            <div class="col-sm-10">
              <select name="batas" class="selectpicker" data-live-search="true">
                <option value="">-- Silahkan Pilih--</option>
                <?php foreach ($kabkotass as $kkk) { ?>
                <option value="<?=$kkk->kabkot;?>" data-tokens="<?= $kkk->kabkot;?>"><?= $kkk->kabkot;?></option>
                <?php } ?>
              </select> 

              <!--  <input type="text" class="form-control" id="batas" name="batas" placeholder="Masukan Kab/Kota yang berbatasan" value="<?= set_value('batas'); ?>"> -->
              <small class="form-text text-danger"><?= form_error('batas'); ?></small>
            </div>
          </div>

          <div class="form-group row">
            <label for="aturan" class="col-sm-2 col-form-label">Aturan</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="aturan" name="aturan" rows="3" ><?= set_value('aturan'); ?></textarea>
              <small class="form-text text-danger"><?= form_error('aturan'); ?></small>
            </div>
          </div>

          <div class="form-group row">
            <label for="file" class="col-sm-2 col-form-label">Upload File Peraturan</label>
            <div class="col-sm-10">
              <input type="file" class="form-control-file" id="file" name="file_upload">
              <br><div class="alert alert-danger col-md-5" role="alert" >
                <small><strong>file harus berformat PDF | DOC | DOCX !</strong></small>
              </div>
              <small class="form-text text-danger"> <?= form_error('file_upload'); ?></small>
              <small class="form-text text-danger">  </small>

            </div>
          </div>
                    
          <hr>
          <div class="form-group row float-right">
            <div class="col-lg-12 ">
              <button type="submit" name="add" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              <a href=" <?= base_url('admin/segmenbatas/Kabkota');?>" class="btn btn btn-danger"><i class="fas fa-undo"></i> Batal</a>
            </div>
          </div>

          <?= form_close(); ?>


        </div>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

