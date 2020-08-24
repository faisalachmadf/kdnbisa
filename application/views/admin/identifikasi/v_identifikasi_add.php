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
            Form Tambah Identifikasi Produk Hukum
          </div>

          <div class="card-body">
             <?php echo $error;?>
            <?= form_open_multipart('admin/identifikasi/Produk_daerah/add'); ?>

          <a href="#" class="badge badge-danger" title="Isikan Kategori">Urusan dan Jenis Dokumen</a><br/>
          <div class="form-row">
            <div class="form-group row">
              <label for="Kategori" class="col-sm-12 col-form-label">Urusan  <span class="required" style="color: red;">*</span></label>
              <div class="col-sm-10">
                <select name="kat_urusan_id" class="chosen-select form-control" id="form-field-select-3" data-placeholder="-- Silahkan Pilih--">
                  <option value="">-- Silahkan Pilih--</option>
                  <?php foreach ($identifikasis as $kk) { ?>
                    <option value="<?=$kk->id;?>" data-tokens="<?= $kk->name;?>"><?= $kk->name;?></option>
                  <?php } ?>
                </select>
              </div>
              <small class="form-text text-danger"><?= form_error('kat_urusan_id'); ?></small>
            </div>
             <div class="form-group row">
              <label for="Kategori" class="col-sm-12 col-form-label">Kategori Produk Hukum  <span class="required" style="color: red;">*</span></label>
              <div class="col-sm-10">
                <select name="kat_produk_id" class="chosen-select form-control" id="form-field-select-3" data-placeholder="-- Silahkan Pilih--">
                  <option value="">-- Silahkan Pilih--</option>
                 <?php foreach ($identifikasiss as $kk) { ?>
                  <option value="<?=$kk->id;?>" data-tokens="<?= $kk->produk;?>"><?= $kk->produk;?></option>
                <?php } ?>
                </select>
              </div>
              <small class="form-text text-danger"><?= form_error('kat_produk_id'); ?></small>
            </div>
          </div>

          <hr/><a href="#" class="badge badge-primary" title="Isikan Nama Produk Hukum">Nama Produk Hukum</a><br/>

          <div class="form-group row">
            <label for="nomor" class="col-sm-2 col-form-label">Nomor</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor ..." value="<?= set_value('nomor'); ?>" autocomplete="off">
              <small class="form-text text-danger"><?= form_error('nomor'); ?></small>
            </div>
          </div>

           <div class="form-group row">
            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="tahun" name="tahun" placeholder="tahun ..." value="<?= set_value('tahun'); ?>" autocomplete="off">
              <small class="form-text text-danger"><?= form_error('tahun'); ?></small>
            </div>
          </div>

          <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="judul" name="judul" rows="2" placeholder="Judul Produk Hukum . . ." value="<?= set_value('judul'); ?>" autocomplete="off">
              <small class="form-text text-danger"><?= form_error('judul'); ?></small>
            </div>
          </div>

          <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Berita Lembaran<span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">

             <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Berita Lembaran Daerah</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Lembaran Daerah</a>
              </li>
             
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <small class="form-text text-danger">Isikan Jika Pergub</small>
                <div class="form-group row">
                  <label for="lembaran_perda" class="col-sm-1 col-form-label">Nomor :</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="lembaran_perda" name="lembaran_perda" placeholder="Berita Lembaran Daerah . . ." value="<?= set_value('lembaran_perda'); ?>" autocomplete="off">
                    </div>
                </div>
              </div>

              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"> 
                <small class="form-text text-danger">Isikan Jika Perda</small>
                <div class="form-group row">
                  <label for="lembaran_pergub" class="col-sm-1 col-form-label">Nomor :</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="lembaran_pergub" name="lembaran_pergub" placeholder="Lembaran Daerah . . ." value="<?= set_value('lembaran_pergub'); ?>" autocomplete="off">
                    </div>
                </div>
              </div>
            </div>
            </div>
          </div>

          

           <hr/><a href="#" class="badge badge-warning" title="Isikan Abstraksi">Ikhtisar Peraturan</a><br/>
           <!-- <div class="form-group row">
                      <label for="abstraksi" class="col-sm-2 col-form-label">Abstraksi <span class="required" style="color: red;">*</span></label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="abstraksi" name="abstraksi" rows="2" ><?= set_value('abstraksi'); ?></textarea>
                        <small class="form-text text-danger"><?= form_error('abstraksi'); ?></small>
                      </div>
                    </div> -->
           <div class="form-group row">

               <label for="abstraksi" class="col-sm-2 col-form-label">Ikhtisar Peraturan<span class="required" style="color: red;">*</span></label>

              <div class="col-sm-10">
                 <small class="form-text text-danger"><?= form_error('abstraksi'); ?></small>
                <!-- Jika ingin pake summernote pakai id="summernote" -->
                <textarea type="text" name="abstraksi" id="summernote"> <?= set_value('abstraksi'); ?></textarea>

               
                <script>

                  $('#summernote').summernote({
                    tabsize: 3,
                    height: 200,
                    toolsbar: [
                    ['style', ['clear']],
                    ],
                  });
                  
                </script>
              </div>
            </div>


          <hr/> <a href="#" class="badge badge-success" title="Isikan Informasi Pelengkap lainnya">Informasi Pelengkap</a><br/>
          <div class="form-group row">
            <label for="opd" class="col-sm-2 col-form-label" >PD Pemrakarsa <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" id="opd" name="opd" rows="2" value="<?= set_value('opd'); ?>" placeholder="Perangkat Daerah Pemrakarsa . . .">
              <small class="form-text text-danger"><?= form_error('opd'); ?></small>
            </div>
          </div>


          <div class="form-group row">
            <label for="tgl_penetapan" class="col-sm-2 col-form-label">Tanggal Penetapan <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">
             <div class='input-group date col-sm-3' id='myDatepicker'>
                <span><i class="fas fa-calendar-alt"></i></span>
              <input type='text' name="tgl_penetapan" id="tgl_penetapan" class="form-control input-group-addon">
            </div>
              <small class="form-text text-danger"><?= form_error('tgl_penetapan'); ?></small>
            </div>
          </div>

            <script>
              $('#myDatepicker').datetimepicker({
                format: "DD-MMM-YYYY"
              });
            </script>

            <div class="form-group row">
            <label for="tgl_perundangan" class="col-sm-2 col-form-label">Tanggal Perundangan <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">
             <div class='input-group date col-sm-3' id='myDatepicker2'>
                <span><i class="fas fa-calendar-alt"></i></span>
              <input type='text' name="tgl_perundangan" id="tgl_perundangan" class="form-control input-group-addon">
            </div>
              <small class="form-text text-danger"><?= form_error('tgl_perundangan'); ?></small>
            </div>
          </div>

            <script>
              $('#myDatepicker2').datetimepicker({
                format: "DD-MMM-YYYY"
              });
            </script>

            <br/>
          <div class="form-group row">
            <label for="file" class="col-sm-2 col-form-label">Upload File Peraturan</label>
            <div class="col-sm-10">
              <input type="file" class="form-control-file" id="file" name="file_upload">
              <br><div class="alert alert-danger col-md-5" role="alert" >
                <small><strong>file harus berformat PDF | DOC | DOCX | JPG | PNG!</strong></small>
              </div>
              <small class="form-text text-danger"> <?= form_error('file_upload'); ?></small>
              <small class="form-text text-danger">  </small>

            </div>
          </div> 

           <hr/><a href="#" class="badge badge-danger" title="Isikan Keterkaitan">Keterkaitan</a><br/>
          
          <!-- dasdsa -->

          <hr>
          

          <div class="form-group row">
            <label for="keterkaitan" class="col-sm-2 col-form-label"> # keterkaitan <span class="required" style="color: red;">*</span></label>
            <div class="col-sm-10">
             <textarea  class="form-control row" id="keterkaitan" name="keterkaitan" rows="3" placeholder="Keterangan "><?= set_value('keterkaitan'); ?></textarea> 
              <small class="form-text text-danger"><?= form_error('keterkaitan'); ?></small>
            </div>


          </div>

          <input type="hidden" name="jml_tbs" id="ke1" value="1" />

          <div id="fm_bab">
          </div>
          <button type="button" class="btn btn-xs btn-warning" onclick="tbhElemen(); return false;" title="Tambah">
            <i class="fa fa-plus"></i>
            Tambah
          </button>
          <script type="text/javascript"><!--

            function tbhElemen() {
              var ke1 = document.getElementById("ke1").value;

              var stre;
              stre = "<div class='form-group row' id='trow" + ke1 + "'><textarea class='form-control' rows='7' name='bab[]' placeholder='BAB "+ ke1 +", isi ikhtisar... .'></textarea><a href='#' onclick='hps(\"#trow" + ke1 + "\"); return false;' class='btn btn-sm btn-danger' title='Hapus "+ ke1 +"'> <i class='fa fa-minus'></i> </a> </div>";
              $("#fm_bab").append(stre);
              ke1 = (ke1-1) + 2;
              document.getElementById("ke1").value = ke1;
            }

            function hps(ke1) {
              $(ke1).remove();

              var ke4 = document.getElementById("ke1").value;
              ke5 = ke4-1;
              document.getElementById("ke1").value = ke5;
            }

            $('#summernote2').summernote({
                    tabsize: 3,
                    height: 200,
                    toolsbar: [
                    ['style', ['clear', 'bold']],
                    ],
                  });

            //--></script>

         
          <!-- dadsa -->



                    
          <hr>
          <div class="form-group row float-right">
            <div class="col-lg-12 ">
              <button type="submit" name="add" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
              <a href=" <?= base_url('admin/identifikasi/Produk_daerah');?>" class="btn btn btn-danger"><i class="fas fa-undo"></i> Batal</a>
            </div>
          </div>

          <?= form_close(); ?>


        </div>
      </div>
    </div>

  </div>

  <!-- /.container-fluid -->

